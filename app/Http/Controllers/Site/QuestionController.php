<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\QuestionCreateRequest;
use App\Services\QuestionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class QuestionController extends Controller
{
    protected QuestionService $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    public function index(): View
    {
        $questions = $this->questionService->index();
        return view('site.question.index', $questions);
    }

    public function detail($slug): View
    {
        $question = $this->questionService->detail($slug);
        return view('site.question.detail')->with(['question' => $question]);
    }

    public function create(): View
    {
        return view('site.question.create');
    }

    public function store(QuestionCreateRequest $request): RedirectResponse
    {
        return $this->questionService->store($request->validated());
    }
}
