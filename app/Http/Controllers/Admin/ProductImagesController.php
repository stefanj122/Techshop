<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
