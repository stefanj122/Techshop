<?php
namespace App\Services\Admin;

use App\Models\Product\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class ProductCategoryService
{
    public function index(): View|Factory
    {
        $categorys = Category::query()->where('name','like', "%".request()->search."%")->paginate(request()->perPage);
        return view('admin.products-category.index', ['categories'=>$categorys]);
    }
    public function store(): MessageBag|RedirectResponse
    {
        $validator = Validator::make(
            request()->all(), ['name' => 'required|string',
            'description' => 'string|nullable',
            ]
        );
        if($validator->fails()) {
            return $validator->messages();
        }
        $category = Category::create(['name'=> request()->name, 'description' => request()->description]);

        return redirect()->route('productCategory.index');
    }

    public function show(string $id): View|Factory
    {
        $category = Category::query()->where('id', $id)->first();
        return view('admin.products-category.show', ['category' => $category]);

    }

    public function update(string $id): View|Factory
    {
        $category = Category::query()->where('id', $id)->first();
        $category->name = request()->name;
        $category->description = request()->description;
        $category->save();
        return view('admin.products-category.show', ['category' => $category]);
    }
    public function delete(string $id): RedirectResponse
    {
        Category::destroy($id);
        return redirect()->route('productCategory.index');
    }
}
