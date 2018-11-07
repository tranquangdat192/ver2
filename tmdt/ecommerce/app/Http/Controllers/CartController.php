<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Validator;

class CartController extends Controller
{

    public function addToCart(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }

        $product = Product::find($data['id']);
        $id = Auth::check() ? Auth::id() : 0;
        $rows = Cart::instance($id)->content()->search(function ($cartItem, $rowId) use ($data) {
            return $cartItem->id == $data['id'];
        });

        if (!$rows) {
            Cart::instance($id)->add($product->id, $product->name, 1, $product->sale_price, ['image' => $product->small_image]);
        } else {
            $item = Cart::get($rows);
            Cart::instance($id)->update($item->rowId, $item->qty + 1);
        }

        $cart = Cart::instance($id)->content();
        $count = str_pad(Cart::instance($id)->count(), 2, '0', STR_PAD_LEFT);
        $total = Cart::instance($id)->subtotal();

        return response()->json(array('cart' => View::make('templates.quick-cart',array('cart', ['count' => $count, 'content' => $cart, 'total' => $total]))->render()));
    }

    public function removeCart(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }

        $id = Auth::check() ? Auth::id() : 0;
        $rows = Cart::instance($id)->content()->search(function ($cartItem, $rowId) use ($data) {
            return $cartItem->id == $data['id'];
        });
        $item = Cart::get($rows);
        Cart::instance($id)->remove($item->rowId);

        $cart = Cart::instance($id)->content();
        $count = str_pad(Cart::instance($id)->count(), 2, '0', STR_PAD_LEFT);
        $total = Cart::instance($id)->subtotal();

        return response()->json(array(
            'cart' => View::make('templates.quick-cart',array('cart', ['count' => $count, 'content' => $cart, 'total' => $total]))->render(),
            'order' => View::make('templates.cart', ['order' => ['count' => $count, 'content' => $cart, 'total' => $total]])->render()
        ));
    }

    public function editCart(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'qty' => 'required|numeric',
            'id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }

        $id = Auth::check() ? Auth::id() : 0;
        $rows = Cart::instance($id)->content()->search(function ($cartItem, $rowId) use ($data) {
            return $cartItem->id == $data['id'];
        });
        $item = Cart::get($rows);
        if ($data['qty'] == 0){
            Cart::instance($id)->remove($item->rowId);
        } else {
            Cart::instance($id)->update($item->rowId, $data['qty']);
        }

        $cart = Cart::instance($id)->content();
        $count = str_pad(Cart::instance($id)->count(), 2, '0', STR_PAD_LEFT);
        $total = Cart::instance($id)->subtotal();

        return response()->json(array(
            'cart' => View::make('templates.quick-cart',array('cart', ['count' => $count, 'content' => $cart, 'total' => $total]))->render(),
            'order' => View::make('templates.cart', ['order' => ['count' => $count, 'content' => $cart, 'total' => $total]])->render()
        ));
    }

    public function index(Request $request){
        $id = Auth::check() ? Auth::id() : 0;
        $cart = Cart::instance($id)->content();
        $count = str_pad(Cart::instance($id)->count(), 2, '0', STR_PAD_LEFT);
        $total = Cart::instance($id)->subtotal();
        return view('components.shopping-cart', ['count' => $count, 'content' => $cart, 'total' => $total]);
    }
}
