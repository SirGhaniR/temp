<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculumItem extends Model
{
    protected $fillable = ['title', 'description', 'order'];

    protected $casts = [
        'order' => 'integer',
    ];
}
