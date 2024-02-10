<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AudioList extends Component
{
    public $audios;

    public function __construct($audios)
    {
        $this->audios = $audios;
    }

    public function render()
    {
        return view('components.site.audio-list');
    }
}
