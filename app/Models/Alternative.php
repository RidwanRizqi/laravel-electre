<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{

        protected $table = 'alternatives';

        protected $primaryKey = 'id_alternative';

        protected $fillable = [
            'name',
        ];

        public function evaluations()
        {
            return $this->hasMany(Evaluation::class, 'id_alternative', 'id_alternative');
        }
}
