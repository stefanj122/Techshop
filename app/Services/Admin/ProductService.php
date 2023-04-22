<?php

namespace App\Services\Admin;

use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductService
{
    public function index(): View|Factory
    {
        $products = Product::query()
            ->where('name', 'like', '%'.request()->search.'%')
            ->paginate(request()->perPage);

        return view('admin.product.index', ['products' => $products]);
    }

    public function store(): RedirectResponse
    {
            request()->validate(
                ['name' => 'required|string|min:2',
                'description' => 'string|nullable|max:2000',
                'price' => 'required|numeric',
                'categoryId' => 'integer|nullable',
                 ]
            );

        $product = new Product;
        $product->name = request()->name;
        $product->description = request()->description;
        $product->price = request()->price;
        $category = Category::query()->where('id', request()->categoryId)->first();
        $product->category()->associate($category);
        $product->save();

        return redirect()->route('product.index');
    }

    public function show(string $id): RedirectResponse|View|Factory
    {
        $product = Product::query()->where('id', $id)->first();
        if(!$product) {
            return redirect()->route('product.index');
        }
        return view('admin.product.show', ['product' => $product]);
    }

    public function update(string $id): RedirectResponse
    {
        request()->validate(
            [
            'name' => 'required|min:2',
            'description' => 'nullable|max:2000',
            'price' => 'numeric|required',
            ]
        );
        $product = Product::query()->where('id', $id)->first();
        $product->update(
            [
                'name' => request()->name,
                'description' => request()->description,
                'price' => request()->price,
                'category_id' => request()->category_id,
            ]
        );

        return redirect()->route('product.show', $id)->with('status', 'Succesfuly updated');
    }

    public function delete(string $id): RedirectResponse
    {
        $product = Product::query()->where('id', $id)->first();
        $product->delete();
        return redirect()->route('product.index')->with('status', 'Succesfuly deleted');
    }

    public function edit(string $id): RedirectResponse|View|Factory
    {
        $product = Product::query()->where('id', $id)->first();
        if(!$product) {
            return redirect()->route('product.index');
        }
        return view('admin.product.edit', ['product' => $product]);
    }

    public function create(): View|Factory
    {
        $categories = Category::query()->get();
        return view('admin.product.create', ['categories' => $categories]);
    }
}
