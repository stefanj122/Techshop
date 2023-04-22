<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ProductCategoryService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\MessageBag;

class ProductCategoryController extends Controller
{
    private ProductCategoryService $productCategoryService;

    public function __construct(ProductCategoryService $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }

    public function index(): View|Factory
    {
        return $this->productCategoryService->index();
    }

    public function store(): MessageBag|RedirectResponse
    {
        return $this->productCategoryService->store();
    }

    public function show(string $id): RedirectResponse|View|Factory
    {
        return $this->productCategoryService->show($id);
    }

    public function update(string $id): RedirectResponse
    {
        return $this->productCategoryService->update($id);
    }

    public function delete(string $id): RedirectResponse
    {
        return $this->productCategoryService->delete($id);
    }

    public function create(): View|Factory
    {
        return view('admin.products-category.create');
    }

    public function edit(string $id): RedirectResponse|View|Factory
    {
        return $this->productCategoryService->edit($id);
    }
}
