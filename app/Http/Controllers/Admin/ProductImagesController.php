<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use App\Models\Product\ProductImages;

class ProductImagesController extends Controller
{

    public function upload(string $id): View|Factory
    {
        return view('admin.product.images.upload', ['id' => $id]);
    }

    public function edit(string $id): View|Factory
    {
        $product = Product::findOrFail($id);
        return view('admin.product.images.edit', ['product' => $product]);
    }

    public function store(string $id): RedirectResponse
    {
        $images = request()->file('productImages');
        foreach ($images as $key => $image) {
            $name = $image->storeAs(null, Str::uuid()->toString().'.'.$image->getClientOriginalExtension(), 'productImages');
            ProductImages::query()->create(
                [
                'name' => $name,
                'product_id' => $id,
                ]
            );
        }
        return redirect()->route('product.show', $id);
    }

    public function delete(string $id): RedirectResponse
    {
        $image = ProductImages::query()->findOrFail($id);
        $image->delete();

        return back()->with('status', 'Image deleted successfully');
    }
}
