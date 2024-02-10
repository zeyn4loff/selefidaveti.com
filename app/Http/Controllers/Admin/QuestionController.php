<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionRequest;
use App\Repositories\Admin\Question\QuestionRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionController extends Controller
{
    private QuestionRepositoryInterface $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function index(): View
    {
        $results = $this->questionRepository->getAll();
        return view('admin.question.index')->with(['results' => $results]);
    }

    public function edit(int $id): View
    {
        $result = $this->questionRepository->getById($id);
        return view('admin.question.edit')->with(['result' => $result]);
    }

    public function update(QuestionRequest $request, int $id): RedirectResponse
    {
        return $this->questionRepository->update($request->validated(), $id);
    }

    public function status(Request $request): JsonResponse
    {
        return $this->questionRepository->status($request);
    }

    public function destroy(Request $request): JsonResponse
    {
        return $this->questionRepository->destroy($request);
    }
}
