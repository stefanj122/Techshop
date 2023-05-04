<?php

namespace App\Http\Controllers;

use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomePageController extends Controller
{
    public function show(): View|Factory
    {
        $products = Product::query()->paginate();
        $categories = Category::query()->get();
        return view('home-page', ['products' => $products,'categories'=> $categories]);
    }
}
