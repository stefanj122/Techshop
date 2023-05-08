<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\Admin\ProductImagesService;

class ProductImagesController extends Controller
{
    private ProductImagesService $productImagesService;

    public function __construct(ProductImagesService $productImagesService)
    {
        $this->productImagesService = $productImagesService;
    }

    public function upload(string $id): View|Factory
    {
        return $this->productImagesService->upload($id);
    }

    public function edit(string $id): View|Factory
    {
        return $this->productImagesService->edit($id);
    }

    public function store(string $id): RedirectResponse
    {
        return $this->productImagesService->store($id);
    }

    public function update(string $id): RedirectResponse
    {
        return $this->productImagesService->update($id);
    }

    public function delete(string $id): RedirectResponse
    {
        return $this->productImagesService->delete($id);
    }
}
