<?php

namespace App\Services;

use App\Models\Question;
use Illuminate\Http\RedirectResponse;

class QuestionService
{
    public function index(): array
    {
        $questions = Question::where('status', config('constants.ACTIVE'))->get();
        return compact('questions');
    }

    public function detail($slug)
    {
        return Question::where('status', config('constants.ACTIVE'))->where('slug', $slug)->firstOrFail();
    }

    public function store($data): RedirectResponse
    {
        $data['views'] = 0;
        Question::create($data);

        return redirect()->back()->with('success', '👍 Sualınız göndərildi. Tez bir zamanada cavablandırılacaq.');
    }

}
