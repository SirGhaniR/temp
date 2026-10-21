<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimelineCard extends Model
{
    protected $fillable = ['step', 'headline', 'description', 'link', 'image_path', 'order'];

    protected $casts = [
        'step' => 'integer',
        'order' => 'integer',
    ];

    public function imageUrl(): ?string
    {
        return $this->image_path ? asset('storage/'.$this->image_path) : null;
    }
}
