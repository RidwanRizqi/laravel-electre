<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // INSERT INTO electre_alternatives
        //VALUES
        //(1,'Cengkareng'),
        //(2,'Kelapa Gading'),
        //(3,'Pulo Gadung'),
        //(4,'Cakung'),
        //(5,'Pluit'),
        //(6,'Pulomas');
        $alternatives = [
            [
                'name' => 'Cengkareng',
            ],
            [
                'name' => 'Kelapa Gading',
            ],
            [
                'name' => 'Pulo Gadung',
            ],
            [
                'name' => 'Cakung',
            ],
            [
                'name' => 'Pluit',
            ],
            [
                'name' => 'Pulomas',
            ],
        ];

//        $alternatives = [
//            [
//                'name' => 'Cikarang',
//            ],
//            [
//                'name' => 'Pulo Gadung',
//            ],
//            [
//                'name' => 'Pluit',
//            ],
//            [
//                'name' => 'Cakung',
//            ],
//            [
//                'name' => 'Sunter',
//            ],
//            [
//                'name' => 'Pulomas',
//            ],
//            [
//                'name' => 'Ancol'
//            ],
//            [
//                'name' => 'Kelapa Gading',
//            ],
//            [
//                'name' => 'Cibitung'
//            ]
//        ];

        foreach ($alternatives as $alternative) {
            Alternative::create($alternative);
        }
    }
}
