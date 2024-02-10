<?php

namespace App\Models;

use Baro\PipelineQueryCollection\Concerns\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class AudioCategory extends Model
{
    protected $table = 'audio_categories';
    use HasSlug, Filterable;

    protected $fillable =
        [
            'name',
            'slug',
            'status'
        ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(AudioCategory::class, 'audio_category_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
