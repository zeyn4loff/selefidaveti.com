<?php

namespace App\Repositories\Admin\Blog;

interface BlogRepositoryInterface
{
    public function getAll();

    public function create($data);

    public function getById($data);

    public function update($data, $id);

    public function status($data);

    public function destroy($data);
}
