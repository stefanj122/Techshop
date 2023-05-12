<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ProductImagesService;
use App\Services\Admin\ProductService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller {
    private ProductService $productService;
    private ProductImagesService $productImagesService;

    public function __construct(ProductService $productService, ProductImagesService $productImagesService) {
        $this->productService = $productService;
        $this->productImagesService = $productImagesService;
    }

    public function index(): View|Factory {
        return $this->productService->index();
    }

    public function store(): RedirectResponse {
        $product = $this->productService->store();

        return $this->productImagesService->store($product->id);
    }

    public function show(string $id): RedirectResponse|View|Factory {
        return $this->productService->show($id);
    }

    public function update(string $id): RedirectResponse {
        $this->productService->update($id);

        return $this->productImagesService->update($id);
    }

    public function delete(string $id): RedirectResponse {
        return $this->productService->delete($id);
    }

    public function create(): View|Factory {
        return $this->productService->create();
    }

    public function edit(string $id): RedirectResponse|View|Factory {
        return $this->productService->edit($id);
    }
}
