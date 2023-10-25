<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';

    protected $primaryKey = ['id_alternative', 'id_criteria'];

    protected $casts = [
        'id_alternative' => 'integer',
        'id_criteria' => 'integer',
        'value' => 'float',
    ];

    protected $fillable = [
        'id_alternative',
        'id_criteria',
        'value',
    ];

    public function alternative()
    {
        return $this->belongsTo(Alternative::class, 'id_alternative', 'id_alternative');
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class, 'id_criteria', 'id_criteria');
    }
}
