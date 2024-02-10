<?php

namespace App\Models;

use Baro\PipelineQueryCollection\Concerns\Filterable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Question extends Model
{
    protected $table = 'questions';
    use  HasSlug, Filterable;

    protected $fillable =
        [
            'title',
            'text',
            'slug',
            'email',
            'name',
            'answer',
            'views',
            'status'
        ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
