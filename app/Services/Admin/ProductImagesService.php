<?php

namespace App\Services\Admin;

use App\Models\Product\Product;
use App\Models\Product\ProductImages;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class ProductImagesService {
    public function upload(string $id): View|Factory {
        return view('admin.product.images.upload', ['id' => $id]);
    }

    public function edit(string $id): View|Factory {
        $product = Product::query()->findOrFail($id);

        return view('admin.product.images.edit', ['product' => $product]);
    }

    public function store(string $id): RedirectResponse {
        if (!request()->isDefault) {
            $isDefault = json_decode('{"id":0}');
        } else {
            $isDefault = json_decode(request()->isDefault);
        }
        $images = request()->file('productImages');
        foreach ($images as $key => $image) {
            $name = $image->storeAs(null, Str::uuid()->toString().'.'.$image->getClientOriginalExtension(), 'productImages');
            ProductImages::query()->create(
                [
                    'name' => $name,
                    'product_id' => $id,
                    'isDefault' => $key == $isDefault->id,
                ]
            );
        }

        return redirect()->route('product.show', $id);
    }

    public function update(string $id): RedirectResponse {
        $isDefault = json_decode(request()->isDefault);
        if ('integer' == gettype($isDefault)) {
            $defaultImage = ProductImages::query()->where('product_id', $id)->where('isDefault', '1')->first();
            if ($defaultImage) {
                $defaultImage->isDefault = false;
                $defaultImage->save();
            }
            $newDefaultImage = ProductImages::query()->where('id', $isDefault)->first();
            $newDefaultImage->isDefault = true;
            $newDefaultImage->save();
            $imageKey = '';
        } elseif ('object' == gettype($isDefault)) {
            $defaultImage = ProductImages::query()->where('product_id', $id)->where('isDefault', '1')->first();
            $defaultImage->isDefault = false;
            $defaultImage->save();
            $imageKey = $isDefault->id;
        } else {
            $imageKey = '';
        }
        $images = request()->file('productImages');
        if ($images) {
            foreach ($images as $key => $image) {
                $name = $image->storeAs(null, Str::uuid()->toString().'.'.$image->getClientOriginalExtension(), 'productImages');
                ProductImages::query()->create(
                    [
                        'name' => $name,
                        'product_id' => $id,
                        'isDefault' => $key == $imageKey,
                    ]
                );
            }
        }
        // dd(request());
        if (request()->deletedImages) {
            $this->delete($id);
        }

        return redirect()->route('product.show', $id);
    }

    public function delete(string $id): RedirectResponse {
        $deleteImages = request()->deletedImages;
        if (!$deleteImages) {
            return back()->withErrors(['error' => 'No images slected to be deleted.']);
        }
        foreach ($deleteImages as $key => $status) {
            if ($status) {
                $image = ProductImages::query()->where('id', $key)->where('isDefault', false)->first();
                unlink(storage_path('app/public/product/images/'.$image->name));
                $image->delete();
            }
        }

        return redirect()->route('product.show', $id)->with('status', 'Images successfully deleted.');
    }
}
