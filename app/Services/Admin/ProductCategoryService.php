<?php

namespace App\Services\Admin;

use App\Models\Product\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\MessageBag;

class ProductCategoryService
{
    public function index(): View|Factory
    {
        $categorys = Category::query()->where('name', 'like', '%'.request()->search.'%')->paginate(request()->perPage);

        return view('admin.products-category.index', ['categories' => $categorys]);
    }

    public function store(): MessageBag|RedirectResponse
    {
        request()->validate(
            ['name' => 'required|string|min:2',
            'description' => 'string|nullable|max:2000',
            ]
        );
        $category = Category::query()->create(['name' => request()->name, 'description' => request()->description]);

        return redirect()->route('productCategory.index');
    }

    public function show(string $id): RedirectResponse|View|Factory
    {
        $category = Category::query()->where('id', $id)->first();
        if(!$category) {
            return redirect()->route('productCategory.index');
        }

        return view('admin.products-category.show', ['category' => $category]);

    }

    public function update(string $id): RedirectResponse
    {
        request()->validate(
            ['name' => 'required|string|min:2',
             'description' => 'string|nullable|max:2000',
            ]
        );
        $category = Category::query()->where('id', $id)->first();
        $category->name = request()->name;
        $category->description = request()->description;
        $category->save();

        return redirect()->route('productCategory.show', $category->id)->with('status', 'Succesfully updated!');
    }

    public function delete(string $id): RedirectResponse
    {
        Category::destroy($id);
        return redirect()->route('productCategory.index')->with('status', 'Succesfully deleted!');
    }

    public function edit(string $id): RedirectResponse|View|Factory
    {
        $category = Category::query()->where('id', $id)->first();
        if(!$category) {
            return redirect()->route('productCategory.index');
        }
        return view('admin.products-category.edit', ['category' => $category]);
    }

    public function search(): Collection|array
    {
        $categories = Category::query()->where('name', 'LIKE', "%" . request()->search . "%")->get();
        return $categories;
    }
}
