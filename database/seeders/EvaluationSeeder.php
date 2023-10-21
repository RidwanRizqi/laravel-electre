<?php

namespace Database\Seeders;

use App\Models\Evaluation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        insert using db insert
        DB::table('evaluations')->insert([
            [
                'id_alternative' => 1,
                'id_criteria' => 1,
                'value' => 3,
            ],
            [
                'id_alternative' => 1,
                'id_criteria' => 2,
                'value' => 1,
            ],
            [
                'id_alternative' => 1,
                'id_criteria' => 3,
                'value' => 5,
            ],
            [
                'id_alternative' => 1,
                'id_criteria' => 4,
                'value' => 3,
            ],
            [
                'id_alternative' => 1,
                'id_criteria' => 5,
                'value' => 3,
            ],
            [
                'id_alternative' => 2,
                'id_criteria' => 1,
                'value' => 2,
            ],
            [
                'id_alternative' => 2,
                'id_criteria' => 2,
                'value' => 1,
            ],
            [
                'id_alternative' => 2,
                'id_criteria' => 3,
                'value' => 5,
            ],
            [
                'id_alternative' => 2,
                'id_criteria' => 4,
                'value' => 2,
            ],
            [
                'id_alternative' => 2,
                'id_criteria' => 5,
                'value' => 5,
            ],
            [
                'id_alternative' => 3,
                'id_criteria' => 1,
                'value' => 1,
            ],
            [
                'id_alternative' => 3,
                'id_criteria' => 2,
                'value' => 4,
            ],
            [
                'id_alternative' => 3,
                'id_criteria' => 3,
                'value' => 4,
            ],
            [
                'id_alternative' => 3,
                'id_criteria' => 4,
                'value' => 3,
            ],
            [
                'id_alternative' => 3,
                'id_criteria' => 5,
                'value' => 2,
            ],
            [
                'id_alternative' => 4,
                'id_criteria' => 1,
                'value' => 3,
            ],
            [
                'id_alternative' => 4,
                'id_criteria' => 2,
                'value' => 1,
            ],
            [
                'id_alternative' => 4,
                'id_criteria' => 3,
                'value' => 1,
            ],
            [
                'id_alternative' => 4,
                'id_criteria' => 4,
                'value' => 3,
            ],
            [
                'id_alternative' => 4,
                'id_criteria' => 5,
                'value' => 5,
            ],
            [
                'id_alternative' => 5,
                'id_criteria' => 1,
                'value' => 1,
            ],
            [
                'id_alternative' => 5,
                'id_criteria' => 2,
                'value' => 5,
            ],
            [
                'id_alternative' => 5,
                'id_criteria' => 3,
                'value' => 3,
            ],
            [
                'id_alternative' => 5,
                'id_criteria' => 4,
                'value' => 1,
            ],
            [
                'id_alternative' => 5,
                'id_criteria' => 5,
                'value' => 5,
            ],
            [
                'id_alternative' => 6,
                'id_criteria' => 1,
                'value' => 1,
            ],
            [
                'id_alternative' => 6,
                'id_criteria' => 2,
                'value' => 1,
            ],
            [
                'id_alternative' => 6,
                'id_criteria' => 3,
                'value' => 4,
            ],
            [
                'id_alternative' => 6,
                'id_criteria' => 4,
                'value' => 5,
            ],
            [
                'id_alternative' => 6,
                'id_criteria' => 5,
                'value' => 4,
            ],
            [
                'id_alternative' => 7,
                'id_criteria' => 1,
                'value' => 2,
            ],
            [
                'id_alternative' => 7,
                'id_criteria' => 2,
                'value' => 3,
            ],
            [
                'id_alternative' => 7,
                'id_criteria' => 3,
                'value' => 2,
            ],
            [
                'id_alternative' => 7,
                'id_criteria' => 4,
                'value' => 4,
            ],
            [
                'id_alternative' => 7,
                'id_criteria' => 5,
                'value' => 4,
            ],
            [
                'id_alternative' => 8,
                'id_criteria' => 1,
                'value' => 5,
            ],
            [
                'id_alternative' => 8,
                'id_criteria' => 2,
                'value' => 2,
            ],
            [
                'id_alternative' => 8,
                'id_criteria' => 3,
                'value' => 5,
            ],
            [
                'id_alternative' => 8,
                'id_criteria' => 4,
                'value' => 3,
            ],
            [
                'id_alternative' => 8,
                'id_criteria' => 5,
                'value' => 1,
            ],
            [
                'id_alternative' => 9,
                'id_criteria' => 1,
                'value' => 5,
            ],
            [
                'id_alternative' => 9,
                'id_criteria' => 2,
                'value' => 2,
            ],
            [
                'id_alternative' => 9,
                'id_criteria' => 3,
                'value' => 5,
            ],
            [
                'id_alternative' => 9,
                'id_criteria' => 4,
                'value' => 2,
            ],
            [
                'id_alternative' => 9,
                'id_criteria' => 5,
                'value' => 1,
            ],
        ]);
    }
}
