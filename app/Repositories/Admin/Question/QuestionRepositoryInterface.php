<?php

namespace App\Repositories\Admin\Question;

interface QuestionRepositoryInterface
{
    public function getAll();

    public function getById($data);

    public function update($data, $id);

    public function status($data);

    public function destroy($data);
}
