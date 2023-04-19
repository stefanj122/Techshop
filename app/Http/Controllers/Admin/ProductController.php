<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\Admin\ProductService;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index(): View|Factory
    {
        return $this->productService->index();
    }

    public function store(): RedirectResponse
    {
        return $this->productService->store();
    }

    public function show(string $id): View|Factory
    {
        return $this->productService->show($id);

    }
    public function update(string $id): View|Factory
    {
        return $this->productService->update($id);
    }
    public function delete(string $id): RedirectResponse
    {
        return $this->productService->delete($id);
    }
    public function create(): View|Factory
    {
        return view('admin.product.create');
    }
    public function edit(string $id): View|Factory
    {
        return $this->productService->edit($id);
    }
}
