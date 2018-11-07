<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public function get(Request $request)
    {
        $data = $request->all();
        $products = Product::whereHas('brandId', function ($query) use ($data) {
            $query->whereHas('categoryId', function ($q) use ($data) {
                $q->where("slug", $data['slug']);
            });
        })->get();

        $count = $products->count();

        return response()->json(array(
            'products' => View::make('templates.add-to-wish-list', ['products' => $products, 'count' => $count])->render()
        ));
    }

    public function detail($slug)
    {
        $product = Product::find($slug);
        return view('components.detail', ['product' => $product]);
    }

    public function search(Request $request){
        $data = $request->all();
        if (isset($data['idBrand'])){
            $idBrand = $data['idBrand'];
            $products = Product::where('brand_id', $idBrand);
        }
        if (isset($data['max-price'])){
            $maxPrice = $data['max-price'];
            $minPrice = $data['min-price'];
            if (isset($products)){
                $products->where([['price', '>=', $minPrice],['price', '<=', $maxPrice]]);
            } else{
                $products = Product::where([['price', '>=', $minPrice],['price', '<=', $maxPrice]])->whereHas('brandId', function ($query) use ($data) {
                    $query->whereHas('categoryId', function ($q) use ($data) {
                        $q->where("slug", $data['slug']);
                    });
                });
            }
        }

        if (!isset($products)){
            $products = Product::whereHas('brandId', function ($query) use ($data) {
                $query->whereHas('categoryId', function ($q) use ($data) {
                    $q->where("slug", $data['slug']);
                });
            });
        }

        $products = $products->get();
        $count = $products->count();

        return response()->json(array(
            'products' => View::make('templates.add-to-cart', ['products' => $products, 'count' => $count])->render()
        ));
    }
}
