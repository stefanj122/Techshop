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
        if(!request()->isDefault) {
            $isDefault = json_decode('{"id":0}');
        }else{
            $isDefault = json_decode(request()->isDefault);
        }
        $images = request()->file('productImages');
        foreach ($images as $key => $image) {
            $name = $image->storeAs(null, Str::uuid()->toString().'.'.$image->getClientOriginalExtension(), 'productImages');
            ProductImages::create(
                [
                'name' => $name,
                'product_id' => $id,
                'isDefault' => $key == $isDefault->id,
                ]
            );
        }
        return redirect()->route('product.show', $id);
    }

    public function update(string $id)
    {
        $isDefault = json_decode(request()->isDefault);
        if(gettype($isDefault) == 'integer') {
            $defaultImage = ProductImages::query()->where('product_id', '=', $id)->where('isDefault', '=', '1')->first();
            if($defaultImage) {
                $defaultImage->isDefault = false;
                $defaultImage->save();
            }
            $newDefaultImage = ProductImages::query()->where('id', '=', $isDefault)->first();
            $newDefaultImage->isDefault = true;
            $newDefaultImage->save();
            $imageKey = "";
        }elseif(gettype($isDefault) == 'object') {
            $defaultImage = ProductImages::query()->where('product_id', '=', $id)->where('isDefault', '=', '1')->first();
            $defaultImage->isDefault = false;
            $defaultImage->save();
            $imageKey = $isDefault->id;
        }
        $images = request()->file('productImages');
        if($images) {
            foreach ($images as $key => $image) {
                $name = $image->storeAs(null, Str::uuid()->toString().'.'.$image->getClientOriginalExtension(), 'productImages');
                ProductImages::create(
                    [
                    'name' => $name,
                    'product_id' => $id,
                    'isDefault' => $key == $imageKey,
                    ]
                );
            }
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
