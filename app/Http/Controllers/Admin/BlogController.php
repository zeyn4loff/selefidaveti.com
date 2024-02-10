<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\BlogCategory;
use App\Repositories\Admin\Blog\BlogRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    private BlogRepositoryInterface $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function index(): View
    {
        $results = $this->blogRepository->getAll();
        return view('admin.blog.index')->with(['results' => $results]);
    }

    public function create(): View
    {
        $categories = BlogCategory::getParentCategories();
        return view('admin.blog.create')->with(["categories" => $categories]);
    }

    public function store(BlogRequest $request): RedirectResponse
    {
        return $this->blogRepository->create($request->validated());
    }

    public function edit(int $id): View
    {
        $result = $this->blogRepository->getById($id);
        $categories = BlogCategory::getParentCategories();
        return view('admin.blog.edit')->with(['result' => $result, "categories" => $categories]);
    }

    public function update(BlogRequest $request, int $id): RedirectResponse
    {
        return $this->blogRepository->update($request->validated(), $id);
    }

    public function status(Request $request): JsonResponse
    {
        return $this->blogRepository->status($request);
    }

    public function destroy(Request $request): JsonResponse
    {
        return $this->blogRepository->destroy($request);
    }
}
