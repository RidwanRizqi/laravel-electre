<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatives = Alternative::all();
        $criterias = Criteria::all();
        $evaluations = Evaluation::all();

        // Hitung rata-rata per kriteria
        $criteriaAverages = [];
        foreach ($criterias as $criteria) {
            $criteriaId = $criteria->id_criteria;
            $criteriaEvaluations = $evaluations->where('id_criteria', $criteriaId)->pluck('value');
            $criteriaAverages[$criteriaId] = $criteriaEvaluations->avg();
        }

        // Hitung matriks R ternomalisasi
        $normalizedMatrix = [];
        foreach ($alternatives as $alternative) {
            $normalizedRow = [];
            foreach ($criterias as $criteria) {
                $evaluation = $evaluations->where('id_alternative', $alternative->id_alternative)
                    ->where('id_criteria', $criteria->id_criteria)
                    ->first();
                if ($evaluation) {
                    $normalizedValue = $evaluation->value / $criteriaAverages[$criteria->id_criteria];
                    $normalizedRow[] = $normalizedValue;
                } else {
                    $normalizedRow[] = 0; // Handle jika tidak ada data evaluasi
                }
            }
            $normalizedMatrix[] = $normalizedRow;
        }

        // Hitung matriks V
        $weights = $criterias->pluck('weight');
        $weightedMatrix = [];
        foreach ($normalizedMatrix as $row) {
            $weightedRow = [];
            for ($i = 0; $i < count($weights); $i++) {
                $weightedRow[] = $row[$i] * $weights[$i];
            }
            $weightedMatrix[] = $weightedRow;
        }

        // Hitung Concordance Index (Ckl) dan Discordance Index (Dkl)
        $concordanceMatrix = [];
        $discordanceMatrix = [];
        $n = count($alternatives);
        for ($i = 0; $i < $n; $i++) {
            $concordanceRow = [];
            $discordanceRow = [];
            for ($j = 0; $j < $n; $j++) {
                if ($i === $j) {
                    $concordanceRow[] = 0; // Nilai diagonal Ckl
                    $discordanceRow[] = 0; // Nilai diagonal Dkl
                } else {
                    $Ckl = 0;
                    $Dkl = 0;
                    for ($k = 0; $k < count($criterias); $k++) {
                        if ($weightedMatrix[$i][$k] >= $weightedMatrix[$j][$k]) {
                            $Ckl++;
                        } else {
                            $Dkl++;
                        }
                    }
                    // Hitung Ckl dan Dkl sesuai dengan rumus yang sesuai
                    $concordanceRow[] = $Ckl / count($criterias);
                    $discordanceRow[] = $Dkl / count($criterias);
                }
            }
            $concordanceMatrix[] = $concordanceRow;
            $discordanceMatrix[] = $discordanceRow;
        }

        // Hitung threshold c
        $sigma_c = 0;
        foreach ($concordanceMatrix as $row) {
            foreach ($row as $value) {
                $sigma_c += $value;
            }
        }
        $threshold_c = $sigma_c / ($n * ($n - 1));

        // Hitung threshold d
        $sigma_d = 0;
        foreach ($discordanceMatrix as $row) {
            foreach ($row as $value) {
                $sigma_d += $value;
            }
        }
        $threshold_d = $sigma_d / ($n * ($n - 1));

        // Hitung matriks dominan f
        $fMatrix = [];
        for ($i = 0; $i < $n; $i++) {
            $fRow = [];
            for ($j = 0; $j < $n; $j++) {
                if ($i === $j) {
                    $fRow[] = 0; // Nilai diagonal f
                } else {
                    if ($concordanceMatrix[$i][$j] >= $threshold_c && $discordanceMatrix[$i][$j] <= $threshold_d) {
                        $fRow[] = 1; // Alternatif i mendominasi alternatif j
                    } else {
                        $fRow[] = 0; // Alternatif i tidak mendominasi alternatif j
                    }
                }
            }
            $fMatrix[] = $fRow;
        }

        // Hitung matriks dominan g
        $gMatrix = [];
        for ($i = 0; $i < $n; $i++) {
            $gRow = [];
            for ($j = 0; $j < $n; $j++) {
                if ($i === $j) {
                    $gRow[] = 0; // Nilai diagonal g
                } else {
                    if ($concordanceMatrix[$i][$j] >= $threshold_c && $discordanceMatrix[$i][$j] > $threshold_d) {
                        $gRow[] = 1; // Alternatif i mendominasi alternatif j
                    } else {
                        $gRow[] = 0; // Alternatif i tidak mendominasi alternatif j
                    }
                }
            }
            $gMatrix[] = $gRow;
        }

        return view('index', compact(
                'alternatives',
                'criterias',
                'evaluations',
                'normalizedMatrix',
                'criteriaAverages',
                'weightedMatrix',
                'concordanceMatrix',
                'discordanceMatrix',
                'threshold_c',
                'threshold_d',
                'fMatrix',
                'gMatrix')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
