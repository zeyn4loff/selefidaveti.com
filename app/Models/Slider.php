<?php

namespace App\Models;

use Baro\PipelineQueryCollection\Concerns\Filterable;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    use  Filterable;

    protected $fillable =
        [
            'title',
            'url',
            'status',
            'image'
        ];
}
