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
        //INSERT INTO electre_evaluations
        //VALUES
        //(1,1,5),(1,2,5),(1,3,1),(1,4,4),(1,5,4),
        //(2,1,3),(2,2,1),(2,3,5),(2,4,2),(2,5,4),
        //(3,1,3),(3,2,3),(3,3,4),(3,4,1),(3,5,4),
        //(4,1,4),(4,2,4),(4,3,1),(4,4,5),(4,5,1),
        //(5,1,2),(5,2,3),(5,3,3),(5,4,3),(5,5,4),
        //(6,1,5),(6,2,1),(6,3,3),(6,4,4),(6,5,2);
        DB::table('evaluations')->insert([
            [
                'id_alternative' => 1,
                'id_criteria' => 1,
                'value' => 5,
            ],
            [
                'id_alternative' => 1,
                'id_criteria' => 2,
                'value' => 5,
            ],
            [
                'id_alternative' => 1,
                'id_criteria' => 3,
                'value' => 1,
            ],
            [
                'id_alternative' => 1,
                'id_criteria' => 4,
                'value' => 4,
            ],
            [
                'id_alternative' => 1,
                'id_criteria' => 5,
                'value' => 4,
            ],
            [
                'id_alternative' => 2,
                'id_criteria' => 1,
                'value' => 3,
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
                'value' => 4,
            ],
            [
                'id_alternative' => 3,
                'id_criteria' => 1,
                'value' => 3,
            ],
            [
                'id_alternative' => 3,
                'id_criteria' => 2,
                'value' => 3,
            ],
            [
                'id_alternative' => 3,
                'id_criteria' => 3,
                'value' => 4,
            ],
            [
                'id_alternative' => 3,
                'id_criteria' => 4,
                'value' => 1,
            ],
            [
                'id_alternative' => 3,
                'id_criteria' => 5,
                'value' => 4,
            ],
            [
                'id_alternative' => 4,
                'id_criteria' => 1,
                'value' => 4,
            ],
            [
                'id_alternative' => 4,
                'id_criteria' => 2,
                'value' => 4,
            ],
            [
                'id_alternative' => 4,
                'id_criteria' => 3,
                'value' => 1,
            ],
            [
                'id_alternative' => 4,
                'id_criteria' => 4,
                'value' => 5,
            ],
            [
                'id_alternative' => 4,
                'id_criteria' => 5,
                'value' => 1,
            ],
            [
                'id_alternative' => 5,
                'id_criteria' => 1,
                'value' => 2,
            ],
            [
                'id_alternative' => 5,
                'id_criteria' => 2,
                'value' => 3,
            ],
            [
                'id_alternative' => 5,
                'id_criteria' => 3,
                'value' => 3,
            ],
            [
                'id_alternative' => 5,
                'id_criteria' => 4,
                'value' => 3,
            ],
            [
                'id_alternative' => 5,
                'id_criteria' => 5,
                'value' => 4,
            ],
            [
                'id_alternative' => 6,
                'id_criteria' => 1,
                'value' => 5,
            ],
            [
                'id_alternative' => 6,
                'id_criteria' => 2,
                'value' => 1,
            ],
            [
                'id_alternative' => 6,
                'id_criteria' => 3,
                'value' => 3,
            ],
            [
                'id_alternative' => 6,
                'id_criteria' => 4,
                'value' => 4,
            ],
            [
                'id_alternative' => 6,
                'id_criteria' => 5,
                'value' => 2,
            ],
        ]);

//        DB::table('evaluations')->insert([
//            [
//                'id_alternative' => 1,
//                'id_criteria' => 1,
//                'value' => 3,
//            ],
//            [
//                'id_alternative' => 1,
//                'id_criteria' => 2,
//                'value' => 1,
//            ],
//            [
//                'id_alternative' => 1,
//                'id_criteria' => 3,
//                'value' => 5,
//            ],
//            [
//                'id_alternative' => 1,
//                'id_criteria' => 4,
//                'value' => 3,
//            ],
//            [
//                'id_alternative' => 1,
//                'id_criteria' => 5,
//                'value' => 3,
//            ],
//            [
//                'id_alternative' => 2,
//                'id_criteria' => 1,
//                'value' => 2,
//            ],
//            [
//                'id_alternative' => 2,
//                'id_criteria' => 2,
//                'value' => 1,
//            ],
//            [
//                'id_alternative' => 2,
//                'id_criteria' => 3,
//                'value' => 5,
//            ],
//            [
//                'id_alternative' => 2,
//                'id_criteria' => 4,
//                'value' => 2,
//            ],
//            [
//                'id_alternative' => 2,
//                'id_criteria' => 5,
//                'value' => 5,
//            ],
//            [
//                'id_alternative' => 3,
//                'id_criteria' => 1,
//                'value' => 1,
//            ],
//            [
//                'id_alternative' => 3,
//                'id_criteria' => 2,
//                'value' => 4,
//            ],
//            [
//                'id_alternative' => 3,
//                'id_criteria' => 3,
//                'value' => 4,
//            ],
//            [
//                'id_alternative' => 3,
//                'id_criteria' => 4,
//                'value' => 3,
//            ],
//            [
//                'id_alternative' => 3,
//                'id_criteria' => 5,
//                'value' => 2,
//            ],
//            [
//                'id_alternative' => 4,
//                'id_criteria' => 1,
//                'value' => 3,
//            ],
//            [
//                'id_alternative' => 4,
//                'id_criteria' => 2,
//                'value' => 1,
//            ],
//            [
//                'id_alternative' => 4,
//                'id_criteria' => 3,
//                'value' => 1,
//            ],
//            [
//                'id_alternative' => 4,
//                'id_criteria' => 4,
//                'value' => 3,
//            ],
//            [
//                'id_alternative' => 4,
//                'id_criteria' => 5,
//                'value' => 5,
//            ],
//            [
//                'id_alternative' => 5,
//                'id_criteria' => 1,
//                'value' => 1,
//            ],
//            [
//                'id_alternative' => 5,
//                'id_criteria' => 2,
//                'value' => 5,
//            ],
//            [
//                'id_alternative' => 5,
//                'id_criteria' => 3,
//                'value' => 3,
//            ],
//            [
//                'id_alternative' => 5,
//                'id_criteria' => 4,
//                'value' => 1,
//            ],
//            [
//                'id_alternative' => 5,
//                'id_criteria' => 5,
//                'value' => 5,
//            ],
//            [
//                'id_alternative' => 6,
//                'id_criteria' => 1,
//                'value' => 1,
//            ],
//            [
//                'id_alternative' => 6,
//                'id_criteria' => 2,
//                'value' => 1,
//            ],
//            [
//                'id_alternative' => 6,
//                'id_criteria' => 3,
//                'value' => 4,
//            ],
//            [
//                'id_alternative' => 6,
//                'id_criteria' => 4,
//                'value' => 5,
//            ],
//            [
//                'id_alternative' => 6,
//                'id_criteria' => 5,
//                'value' => 4,
//            ],
//            [
//                'id_alternative' => 7,
//                'id_criteria' => 1,
//                'value' => 2,
//            ],
//            [
//                'id_alternative' => 7,
//                'id_criteria' => 2,
//                'value' => 3,
//            ],
//            [
//                'id_alternative' => 7,
//                'id_criteria' => 3,
//                'value' => 2,
//            ],
//            [
//                'id_alternative' => 7,
//                'id_criteria' => 4,
//                'value' => 4,
//            ],
//            [
//                'id_alternative' => 7,
//                'id_criteria' => 5,
//                'value' => 4,
//            ],
//            [
//                'id_alternative' => 8,
//                'id_criteria' => 1,
//                'value' => 5,
//            ],
//            [
//                'id_alternative' => 8,
//                'id_criteria' => 2,
//                'value' => 2,
//            ],
//            [
//                'id_alternative' => 8,
//                'id_criteria' => 3,
//                'value' => 5,
//            ],
//            [
//                'id_alternative' => 8,
//                'id_criteria' => 4,
//                'value' => 3,
//            ],
//            [
//                'id_alternative' => 8,
//                'id_criteria' => 5,
//                'value' => 1,
//            ],
//            [
//                'id_alternative' => 9,
//                'id_criteria' => 1,
//                'value' => 5,
//            ],
//            [
//                'id_alternative' => 9,
//                'id_criteria' => 2,
//                'value' => 2,
//            ],
//            [
//                'id_alternative' => 9,
//                'id_criteria' => 3,
//                'value' => 5,
//            ],
//            [
//                'id_alternative' => 9,
//                'id_criteria' => 4,
//                'value' => 2,
//            ],
//            [
//                'id_alternative' => 9,
//                'id_criteria' => 5,
//                'value' => 1,
//            ],
//        ]);
    }
}
