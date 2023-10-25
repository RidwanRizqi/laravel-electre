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
                'name' => 'A1',
            ],
            [
                'name' => 'A2',
            ],
            [
                'name' => 'A3',
            ],
            [
                'name' => 'A4',
            ],
            [
                'name' => 'A5',
            ]
        ];

        foreach ($alternatives as $alternative) {
            Alternative::create($alternative);
        }
    }
}