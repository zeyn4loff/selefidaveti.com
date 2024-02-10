<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogCategoryRequest;
use App\Models\BlogCategory;
use App\Repositories\Admin\BlogCategory\BlogCategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogCategoryController extends Controller
{
    private BlogCategoryRepositoryInterface $blogCategoryRepository;

    public function __construct(BlogCategoryRepositoryInterface $blogCategoryRepository)
    {
        $this->blogCategoryRepository = $blogCategoryRepository;
    }

    public function index(): View
    {
        $results = $this->blogCategoryRepository->getAll();
        return view('admin.blog-category.index')->with(['results' => $results]);
    }

    public function create(): View
    {
        $categories = BlogCategory::getParentCategories();
        return view('admin.blog-category.create')->with(["categories" => $categories]);
    }

    public function store(BlogCategoryRequest $request): RedirectResponse
    {
        return $this->blogCategoryRepository->create($request->validated());
    }

    public function edit(int $id): View
    {
        $result = $this->blogCategoryRepository->getById($id);
        $categories = BlogCategory::getParentCategories();
        return view('admin.blog-category.edit')->with(['result' => $result, 'categories' => $categories]);
    }

    public function update(BlogCategoryRequest $request, int $id): RedirectResponse
    {
        return $this->blogCategoryRepository->update($request->validated(), $id);
    }

    public function status(Request $request): JsonResponse
    {
        return $this->blogCategoryRepository->status($request);
    }

    public function destroy(Request $request): JsonResponse
    {
        return $this->blogCategoryRepository->destroy($request);
    }
}
