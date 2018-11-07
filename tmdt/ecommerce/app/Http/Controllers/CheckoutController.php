<?php

namespace App\Http\Controllers;

use App\Model\Guest;
use App\Model\Invoice;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Cart;

class CheckoutController extends Controller
{
    protected function validator(array $data)
    {
        if (Auth::check()){
            return Validator::make($data, [
                'phone' => 'required|numeric',
                'address' => 'required|string|max:255',
            ]);
        } else {
            if ($data['password']){
                return Validator::make($data, [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
                    'phone' => 'required|numeric',
                    'address' => 'required|string|max:255',
                ]);
            } else {
                return Validator::make($data, [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'phone' => 'required|numeric',
                    'address' => 'required|string|max:255',
                ]);
            }
        }
    }

    protected function validatorInfo(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }

    protected function validatorBilling(array $data)
    {
        return Validator::make($data, [
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
        ]);
    }

    public function checkGuest(Request $request)
    {
        $this->validatorInfo($request->all())->validate();
        return response()->json(['error' => false],200);
    }

    public function checkBilling(Request $request)
    {
        $this->validatorBilling($request->all())->validate();
        return response()->json(['error' => false],200);
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function save(Request $request)
    {
        $this->validator($request->all())->validate();
        $data = $request->all();
        if (Auth::check()){
            $cart = Cart::instance(Auth::id())->content();
            $total = Cart::instance(Auth::id())->subtotal();
            DB::transaction(function() use ($data, $cart, $total)
            {
                $user = Auth::user();
                $user->phone = $data['phone'];
                $user->address = $data['address'];
                $user->save();

                $detail = [];
                foreach ($cart as $item){
                    array_push($detail, ['id' => $item->id, 'name' => $item->name, 'qty' => $item->qty, 'image' => $item->options->image, 'price' => $item->price]);
                }

                Invoice::create([
                    'user_id' => Auth::id(),
                    'total'   => $total,
                    'detail'   => json_encode($detail),
                ]);
            });
            Cart::instance(Auth::id())->destroy();
        } else {
            $cart = Cart::instance(0)->content();
            $total = Cart::instance(0)->subtotal();
            if ($data['password']){

                DB::transaction(function() use ($data, $cart, $total)
                {
                    $user = User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'password' => bcrypt($data['password']),
                        'role_id'  => 2,
                        'phone' => $data['phone'],
                        'address' => $data['address'],
                    ]);

                    $detail = [];
                    foreach ($cart as $item){
                        array_push($detail, ['id' => $item->id, 'name' => $item->name, 'qty' => $item->qty, 'image' => $item->options->image, 'price' => $item->price]);
                    }

                    Invoice::create([
                        'user_id' => $user->id,
                        'total'   => $total,
                        'detail'   => json_encode($detail),
                    ]);
                    $this->guard()->login($user);
                });
            } else {
                DB::transaction(function() use ($data, $cart, $total)
                {
                    $guest = Guest::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'phone' => $data['phone'],
                        'address' => $data['address'],
                    ]);

                    $detail = [];
                    foreach ($cart as $item){
                        array_push($detail, ['id' => $item->id, 'name' => $item->name, 'qty' => $item->qty, 'image' => $item->options->image, 'price' => $item->price]);
                    }

                    Invoice::create([
                        'guest_id' => $guest->id,
                        'total'   => $total,
                        'detail'   => json_encode($detail),
                    ]);
                });
            }
            Cart::instance(0)->destroy();
        }

        return response()->json(['error' => false],200);
    }
}
