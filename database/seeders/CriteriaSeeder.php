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
                'criteria' => 'jarak dengan pusat niaga terdekat(km)',
                'weight' => 6,
            ],
            [
                'criteria' => 'kepadatan penduduk disekitar lokasi (orang/km2)',
                'weight' => 2,
            ],
            [
                'criteria' => 'jarak dari pabrik(km)',
                'weight' => 4,
            ],
            [
                'criteria' => 'jarak dengan gudang yang sudah ada (km)',
                'weight' => 2,
            ],
            [
                'criteria' => 'jarak dengan gudang yang sudah ada (km)',
                'weight' => 4,
            ],
        ];

        foreach ($criterias as $criteria) {
            Criteria::create($criteria);
        }
    }
}
