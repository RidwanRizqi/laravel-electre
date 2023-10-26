<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Evaluation;

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
        $n = count($alternatives);

        $criteriaAverages = $this->calculateCriteriaAverages($criterias, $evaluations);
        $normalizedMatrix = $this->calculateNormalizedMatrix($alternatives, $criterias, $evaluations, $criteriaAverages);
        $weights = $criterias->pluck('weight');
        $weightedMatrix = $this->calculateWeightedMatrix($normalizedMatrix, $weights);
        $concordanceMatrix = $this->calculateConcordanceMatrix($weightedMatrix, $weights, $n, $criterias);
        $discordanceMatrix = $this->calculateDiscordanceMatrix($weightedMatrix, $alternatives, $n, $criterias);
        $threshold_c = $this->calculateThreshold($concordanceMatrix, $n);
        $threshold_d = $this->calculateThreshold($discordanceMatrix, $n);
        $fMatrix = $this->calcluateConcordanceDominantMatrix($concordanceMatrix, $threshold_c);
        $gMatrix = $this->calculateDiscordanceDominantMatrix($discordanceMatrix, $threshold_d);
        $eMatrix = $this->calculateAggregationDominantMatrix($fMatrix, $gMatrix, $n);
        $prioritizedAlternativesWithRank = $this->calculatePriorities($eMatrix, $n, $alternatives);

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
                'eMatrix',
                'prioritizedAlternativesWithRank',
            )
        );
    }

    public function calculateCriteriaAverages($criterias, $evaluations)
    {
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
        return $criteriaAverages;
    }

    public function calculateNormalizedMatrix($alternatives, $criterias, $evaluations, $criteriaAverages)
    {
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
        return $normalizedMatrix;
    }

    public function calculateWeightedMatrix($normalizedMatrix, $weights)
    {
        $weightedMatrix = [];
        foreach ($normalizedMatrix as $row) {
            $weightedRow = [];
            for ($i = 0; $i < count($weights); $i++) {
                $weightedRow[] = $row[$i] * $weights[$i];
            }
            $weightedMatrix[] = $weightedRow;
        }
        return $weightedMatrix;
    }

    public function calculateConcordanceMatrix($weightedMatrix, $weights, $n, $criterias)
    {
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
        return $concordanceMatrix;
    }

    public function calculateDiscordanceMatrix($weightedMatrix, $alternatives, $n, $criterias)
    {
        $discordanceMatrix = [];
        for ($k = 0; $k < $n; $k++) {
            $discordanceRow = [];
            for ($l = 0; $l < $n; $l++) {
                if ($k === $l) {
                    $discordanceRow[] = 0; // Nilai diagonal Dkl
                } else {
                    $Dkl = 0;
                    for ($j = 0; $j < count($alternatives) - 1; $j++) {
                        if ($weightedMatrix[$k][$j] < $weightedMatrix[$l][$j]) {
                            $DklValue = abs($weightedMatrix[$k][$j] - $weightedMatrix[$l][$j]);
                            if ($DklValue > $Dkl) {
                                $Dkl = $DklValue;
                            }
                        }
                    }
                    // Hitung Dkl sesuai dengan rumus yang sesuai
                    $maxDkl = 0;
                    for ($i = 0; $i < count($criterias); $i++) {
                        $DklValue = abs($weightedMatrix[$k][$i] - $weightedMatrix[$l][$i]);
                        if ($DklValue > $maxDkl) {
                            $maxDkl = $DklValue;
                        }
                    }
                    $discordanceRow[] = ($maxDkl === 0) ? 0 : ($Dkl / $maxDkl);
                }
            }
            $discordanceMatrix[] = $discordanceRow;
        }
        return $discordanceMatrix;
    }

    public function calculateThreshold($matrix, $n)
    {
        $sigma = 0;
        foreach ($matrix as $row) {
            foreach ($row as $value) {
                $sigma += $value;
            }
        }
        return $sigma / ($n * ($n - 1));
    }

    public function calcluateConcordanceDominantMatrix($concordanceMatrix, $threshold_c)
    {
        $fMatrix = [];
        foreach ($concordanceMatrix as $k => $cl) {
            $fMatrix[$k] = [];
            foreach ($cl as $l => $value) {
                $fMatrix[$k][$l] = ($value >= $threshold_c ? 1 : 0);
            }
        }
        return $fMatrix;
    }

    public function calculateDiscordanceDominantMatrix($discordanceMatrix, $threshold_d)
    {
        $gMatrix = [];
        foreach ($discordanceMatrix as $k => $dl) {
            $gMatrix[$k] = [];
            foreach ($dl as $l => $value) {
                $gMatrix[$k][$l] = ($value >= $threshold_d ? 1 : 0);
            }
        }
        return $gMatrix;
    }

    public function calculateAggregationDominantMatrix($fMatrix, $gMatrix, $n)
    {
        $eMatrix = [];
        for ($i = 0; $i < $n; $i++) {
            $eMatrix[$i] = [];
            for ($j = 0; $j < $n; $j++) {
                // Hitung E sesuai dengan rumus E = F * G
                $eValue = $fMatrix[$i][$j] * $gMatrix[$i][$j];
                $eMatrix[$i][$j] = $eValue;
            }
        }
        return $eMatrix;
    }

    public function calculatePriorities($eMatrix, $n, $alternatives)
    {
        $priorities = [];
        for ($i = 0; $i < $n; $i++) {
            $priorities[$i] = array_sum($eMatrix[$i]); // Menjumlahkan semua nilai dalam baris E
        }

        // Mengurutkan alternatif berdasarkan prioritas (dari tinggi ke rendah)
        arsort($priorities);

        // Mendapatkan daftar alternatif yang menjadi prioritas
        $prioritizedAlternatives = [];
        foreach ($priorities as $key => $value) {
            $prioritizedAlternatives[] = $alternatives[$key];
        }

        // Menggabungkan peringkat dan alternatif menjadi satu array
        return array_map(function ($alternative, $rank) {
            return ['alternative' => $alternative, 'rank' => $rank];
        }, $prioritizedAlternatives, $priorities);
    }
}
