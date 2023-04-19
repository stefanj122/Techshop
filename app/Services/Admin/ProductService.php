<?php

namespace App\Services\Admin;

use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    public function index(): View|Factory
    {
        $products = Product::query()
            ->where('name', 'like', "%".request()->search."%")
            ->paginate(request()->perPage);
        return view('admin.product.index', ['products'=>$products]);
    }

    public function store(): RedirectResponse
    {
        $validator = Validator::make(
            request()->all(), ['name' => 'required|string',
            'description' => 'string|nullable',
            'price' => 'required|numeric',
            'categoryId' => 'integer|nullable',
            ]
        );
        if($validator->fails()) {
            return redirect()->route('product.create')->with($validator->messages());
        }

        $product = new Product;
        $product->name = request()->name;
        $product->description = request()->description;
        $product->price = request()->price;
        $category = Category::query()->where('id', request()->categoryId)->first();
        $product->category()->associate($category);
        $product->save();
        return redirect()->route('product.index');
    }

    public function show(string $id): View|Factory
    {
        $product = Product::query()->where('id', $id)->first();
        return view('admin.product.show', ['product' => $product]);
    }

    public function update(string $id): View|Factory
    {
        $product = Product::query()->where('id', $id)->first();
        $product->update(
            [
            'name'=>request()->name,
            'description'=>request()->description,
            'price'=>request()->price,
            'category_id'=>request()->category_id
            ]
        );
        return $product;
    }

    public function delete(string $id): RedirectResponse
    {
        $product = Product::query()->where('id', $id)->first();
        $product->delete();
        return redirect()->route('product.index')->with('Succesfuly deeted');
    }

    public function edit(string $id): View|Factory
    {
        $product = Product::query()->where('id', $id)->first();
        return view('admin.product.edit', ['product'=> $product]);
    }
}
