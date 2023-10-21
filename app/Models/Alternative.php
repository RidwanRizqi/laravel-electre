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
}
