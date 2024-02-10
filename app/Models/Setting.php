<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable =
        [
            'site_name',
            'logo_white',
            'logo_black',
            'logo',
            'favicon'
        ];
}
