<?php

namespace App\Repositories\Admin\Question;

use App\Helper\Custom;
use App\Http\Controllers\MailController;
use App\Models\Question;
use Baro\PipelineQueryCollection\BooleanFilter;
use Baro\PipelineQueryCollection\RelativeFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Question::query()
            ->filter([
                new RelativeFilter('title'),
                new RelativeFilter('email'),
                new BooleanFilter('status'),
            ])
            ->paginate(config('constants.PAGINATION_COUNT'));
    }

    public function getById($data): Question
    {
        return Question::findOrFail($data);
    }

    public function update($data, $id): RedirectResponse
    {
        $question = Question::findOrFail($id);
        $question->update($data);
        if (Arr::has($data, 'notification') && !is_null($data['notification'])) {
            $mailController = new MailController($question->email, "Sualınız cavablandı");
            $mailController->sendMail();
            return redirect()->route('admin.question.index')->with('success', '👍 Düzəliş edildi və email göndərildi.');
        } else {
            return redirect()->route('admin.question.index')->with('success', '👍 Dəyişilik edildi.');
        }

    }

    public function status($data): JsonResponse
    {
        return Custom::changeStatusByAjax($data, Question::class);
    }

    public function destroy($data): JsonResponse
    {
        return Custom::deleteByAjax($data, Question::class);
    }
}
