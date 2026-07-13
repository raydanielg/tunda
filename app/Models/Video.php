<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'thumbnail_url', 'video_url', 'type', 'is_featured', 'duration', 'views'])]
class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'views' => 'integer',
        ];
    }

    public function scopeVip($query)
    {
        return $query->where('type', 'vip');
    }

    public function scopeRegular($query)
    {
        return $query->where('type', 'regular');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
