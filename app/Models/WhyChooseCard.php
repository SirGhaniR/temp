<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseCard extends Model
{
    protected $fillable = ['title', 'description', 'order'];

    protected $casts = [
        'order' => 'integer',
    ];
}
