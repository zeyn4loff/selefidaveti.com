<?php

namespace App\View\Components;

use App\Models\Question;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $recentQuestions;

    public function __construct()
    {
        $this->recentQuestions = Question::where('status', config('constants.ACTIVE'))
            ->orderBy('id', 'desc')
            ->take(7)
            ->get();
    }

    public function render()
    {
        return view('components.site.sidebar');
    }
}
