<?php

namespace App\Models;

use Baro\PipelineQueryCollection\Concerns\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Audio extends Model
{
    protected $table = 'audios';
    use Filterable;

    protected $fillable =
        [
            'audio_category_id',
            'title',
            'status',
            'audio'
        ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(AudioCategory::class, 'audio_category_id');
    }
}
