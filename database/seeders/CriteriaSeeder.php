<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criterias = [
            [
                'criteria' => 'Pengalaman',
                'weight' => 0.3,
            ],
            [
                'criteria' => 'Kepemimpinan',
                'weight' => 0.2,
            ],
            [
                'criteria' => 'Komunikas',
                'weight' => 0.3,
            ],
            [
                'criteria' => 'Pengembangan',
                'weight' => 0.2,
            ]
        ];

        foreach ($criterias as $criteria) {
            Criteria::create($criteria);
        }
    }
}