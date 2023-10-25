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
//        $criterias = [
//            [
//                'criteria' => 'jarak dengan pusat niaga terdekat(km)',
//                'weight' => 6,
//            ],
//            [
//                'criteria' => 'kepadatan penduduk disekitar lokasi (orang/km2)',
//                'weight' => 2,
//            ],
//            [
//                'criteria' => 'jarak dari pabrik(km)',
//                'weight' => 4,
//            ],
//            [
//                'criteria' => 'jarak dengan gudang yang sudah ada (km)',
//                'weight' => 2,
//            ],
//            [
//                'criteria' => 'jarak dengan gudang yang sudah ada (km)',
//                'weight' => 4,
//            ],
//        ];

        // insertINSERT INTO electre_criterias
        //VALUES
        //(1,'jarak dengan pusat niaga terdekat(km)',6),
        //(2,'kepadatan penduduk disekitar lokasi (orang/km2)',2),
        //(3,'jarak dari pabrik(km)',5),
        //(4,'jarak dengan gudang yang sudah ada (km)',2),
        //(5,'harga tanah untuk lokasi (x1000 Rp/m2)',2);
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
                'weight' => 5,
            ],
            [
                'criteria' => 'jarak dengan gudang yang sudah ada (km)',
                'weight' => 2,
            ],
            [
                'criteria' => 'harga tanah untuk lokasi (x1000 Rp/m2)',
                'weight' => 2,
            ],
        ];

        foreach ($criterias as $criteria) {
            Criteria::create($criteria);
        }
    }
}
