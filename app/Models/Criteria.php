<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{

    protected $table = 'criterias';

    protected $primaryKey = 'id_criteria';

    protected $fillable = [
        'criteria',
        'weight',
    ];

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'id_criteria', 'id_criteria');
    }
}
