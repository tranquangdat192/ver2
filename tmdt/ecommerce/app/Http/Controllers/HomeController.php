<?php

namespace App\Http\Controllers;

use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $categorys = Category::all();
        $firstProduct = Product::whereHas('brandId', function ($query) use ($categorys) {
            $query->whereHas('categoryId', function ($q) use ($categorys) {
                $q->where("slug", $categorys[0]->slug);
            });
        })->get();

        return view('index', ['firstProduct' => $firstProduct]);
    }

    public function showCategory($slug)
    {
        $products = Product::whereHas('brandId', function ($query) use ($slug) {
            $query->whereHas('categoryId', function ($q) use ($slug) {
                $q->where("slug", $slug);
            });
        })->get();
        $category = Category::where('slug', $slug)->first();
        $count = $products->count();
        return view('components.products', ['products' => $products, 'category' => $category, 'count' => $count]);
    }
}
