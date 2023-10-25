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

        // Menentukan nilai rata-rata kuadrat per-kriteria
        $criteriaAverages = [];
        foreach ($criterias as $criteria) {
            $criteriaId = $criteria->id_criteria;
            $squaredSum = 0;
            foreach ($evaluations as $evaluation) {
                if ($evaluation->id_criteria === $criteriaId) {
                    $squaredSum += pow($evaluation->value, 2);
                }
            }
            $criteriaAverages[$criteriaId] = sqrt($squaredSum);
        }

        // Menormalisasi matriks X menjadi matriks R
        $normalizedMatrix = [];
        foreach ($alternatives as $alternative) {
            $normalizedRow = [];
            foreach ($criterias as $criteria) {
                $evaluation = $evaluations
                    ->where('id_alternative', $alternative->id_alternative)
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

        $n = count($alternatives);

        // Hitung Matriks Concordance (C)
        $concordanceMatrix = [];
        for ($k = 0; $k < $n; $k++) {
            $concordanceRow = [];
            for ($l = 0; $l < $n; $l++) {
                if ($k === $l) {
                    $concordanceRow[] = 0; // Nilai diagonal Ckl
                } else {
                    $Ckl = 0;
                    for ($j = 0; $j < count($criterias); $j++) {
                        if ($weightedMatrix[$k][$j] >= $weightedMatrix[$l][$j]) {
                            $Ckl += $weights[$j]; // Bobot kriteria
                        }
                    }
                    // Hitung Ckl sesuai dengan rumus yang sesuai
                    $concordanceRow[] = $Ckl;
                }
            }
            $concordanceMatrix[] = $concordanceRow;
        }

//        dd($weightedMatrix);

        // Hitung Matriks Discordance (D)
        $discordanceMatrix = [];
        for ($k = 0; $k < $n; $k++) {
            $discordanceRow = [];
            for ($l = 0; $l < $n; $l++) {
                if ($k === $l) {
                    $discordanceRow[] = 0; // Nilai diagonal Dkl
                } else {
                    $Dkl = 0;
                    for ($j = 0; $j < count($criterias); $j++) {
                        $DklValue = abs($weightedMatrix[$k][$j] - $weightedMatrix[$l][$j]);
                        if ($DklValue > $Dkl) {
                            $Dkl = $DklValue;
                        }
                    }
                    // Hitung Dkl sesuai dengan rumus yang sesuai
                    $maxDkl = 0;
                    for ($i = 0; $i < count($alternatives); $i++) {
                        if ($i !== $k && $i !== $l) {
                            $DklValue = abs($weightedMatrix[$k][$i] - $weightedMatrix[$l][$i]);
                            if ($DklValue > $maxDkl) {
                                $maxDkl = $DklValue;
                            }
                        }
                    }
                    $discordanceRow[] = ($maxDkl === 0) ? 0 : ($Dkl / $maxDkl);
                }
            }
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

        // Membentuk Matriks Concordance Dominan (F)
        $fMatrix = [];
        foreach ($concordanceMatrix as $k => $cl) {
            $fMatrix[$k] = [];
            foreach ($cl as $l => $value) {
                $fMatrix[$k][$l] = ($value >= $threshold_c ? 1 : 0);
            }
        }

        // Membentuk Matriks Discordance Dominan (G)
        $gMatrix = [];
        foreach ($discordanceMatrix as $k => $dl) {
            $gMatrix[$k] = [];
            foreach ($dl as $l => $value) {
                $gMatrix[$k][$l] = ($value >= $threshold_d ? 1 : 0);
            }
        }

        // Membentuk Matriks Agregasi Dominan (E)
        $eMatrix = [];
        for ($i = 0; $i < $n; $i++) {
            $eMatrix[$i] = [];
            for ($j = 0; $j < $n; $j++) {
                // Hitung E sesuai dengan rumus E = F * G
                $eValue = $fMatrix[$i][$j] * $gMatrix[$i][$j];
//                print $fMatrix[$i][$j] . ' * ' . $gMatrix[$i][$j] . ' = ';
//                print $eValue;
//                print '<br>';
                $eMatrix[$i][$j] = $eValue;
            }
        }


        return view('index', compact(
                'alternatives',
                'criterias',
                'evaluations',
                'normalizedMatrix',
                'criteriaAverages',
                'weights',
                'weightedMatrix',
                'concordanceMatrix',
                'discordanceMatrix',
                'threshold_c',
                'threshold_d',
                'fMatrix',
                'gMatrix',
                'eMatrix')
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
