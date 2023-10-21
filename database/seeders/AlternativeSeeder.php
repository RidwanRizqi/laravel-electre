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
        $alternatives = [
            [
                'name' => 'Cikarang',
            ],
            [
                'name' => 'Pulo Gadung',
            ],
            [
                'name' => 'Pluit',
            ],
            [
                'name' => 'Cakung',
            ],
            [
                'name' => 'Sunter',
            ],
            [
                'name' => 'Pulomas',
            ],
            [
                'name' => 'Ancol'
            ],
            [
                'name' => 'Kelapa Gading',
            ],
            [
                'name' => 'Cibitung'
            ]
        ];

        foreach ($alternatives as $alternative) {
            Alternative::create($alternative);
        }
    }
}
