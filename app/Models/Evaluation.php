<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';

    protected $primaryKey = ['id_alternative', 'id_criteria'];

    protected $fillable = [
        'id_alternative',
        'id_criteria',
        'value',
    ];
}
