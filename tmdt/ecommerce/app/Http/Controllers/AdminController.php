<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Invoice;
use App\Model\Product;
use App\Model\Role;
use Illuminate\Support\Facades\Storage;
use Validator;
use Cart;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AdminController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        $category = Category::count();
        $product = Product::count();
        $invoice = Invoice::count();
        return view('admin.index', ['category' => $category, 'product' => $product, 'invoice' => $invoice]);
    }

    public function loginAdmin(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'role_id' => Role::where('name', 'admin')->first()->id])) {
            return redirect()->route('admin');
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin');
        } else {
            return view('admin.auth.login');
        }
    }

    public function detail($slug)
    {
        $baseAppPrefix = 'App\\';
        $appPrefix = 'App\\Model\\';
        if ($slug == 'user') {
            $modelName = $baseAppPrefix . ucwords($slug);
            $models = $modelName::paginate(8);
        } else {
            $modelName = $appPrefix . ucwords($slug);
            $models = $modelName::paginate(8);
        }

        return view('admin.templates.page', ['models' => $models, 'slug' => $slug]);
    }

    public function logout(Request $request)
    {
        Cart::instance(0)->destroy();
        $cart = collect(session()->get('cart'));

        Auth::logout();

        if (!config('cart.destroy_on_logout')) {
            $cart->each(function ($rows, $identifier) {
                session()->put('cart.' . $identifier, $rows);
            });
        }

        return redirect()->route('pageLoginAdmin');
    }

    public function editAdmin($slug, $id)
    {
        $baseAppPrefix = 'App\\';
        $appPrefix = 'App\\Model\\';
        if ($slug == 'user') {
            $modelName = $baseAppPrefix . ucwords($slug);
            $model = $modelName::find($id);
        } else {
            $modelName = $appPrefix . ucwords($slug);
            $model = $modelName::find($id);
        }
        return view('admin.templates.edit', ['slug' => $slug, 'model' => $model]);
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        $baseAppPrefix = 'App\\';
        $appPrefix = 'App\\Model\\';
        if ($data['model'] == 'user') {
            $modelName = $baseAppPrefix . ucwords($data['model']);
            $model = $modelName::find($data['id']);
        } else {
            $modelName = $appPrefix . ucwords($data['model']);
            $model = $modelName::find($data['id']);
        }

        if (isset($data['image'])) {
            if ($this->validatorImage($data)->fails()) {
                return redirect()->back()->withErrors($this->validatorImage($data));
            };
            $data['image'] = $this->uploadImage($data['image'], $data['model']);
        }

        if (isset($data['avatar'])) {
            if ($this->validatorImage($data)->fails()) {
                return redirect()->back()->withErrors($this->validatorImage($data));
            };
            $data['avatar'] = $this->uploadImage($data['avatar'], $data['model']);
        }

        if (isset($data['thumbnail'])) {
            if ($this->validatorThumbnail($data['thumbnail'])->fails()) {
                return redirect()->back()->withErrors($this->validatorThumbnail($data['thumbnail']));
            };

            $thumbnail = [];

            foreach ($data['thumbnail'] as $image) {
                $thumbnail[] = $this->uploadImage($image, $data['model']);
            }
            $data['thumbnail'] = json_encode($thumbnail);
            $data['thumbnail'] = str_replace("\/", "/", $data['thumbnail']);
        }

        $slug = $data['model'];
        unset($data['_token'], $data['model'], $data['id']);
        foreach ($data as $k => $v) {
            $model->$k = $v;
        }
        $model->save();
        return redirect()->route('adminDetail', ['slug' => $slug]);
    }

    public function addAdmin($slug)
    {
        return view('admin.templates.add', ['slug' => $slug]);
    }

    protected function validatorSlug(array $data)
    {
        return Validator::make($data, [
            'slug' => 'required|string|max:255|unique:' . $data['model'],
        ]);
    }

    protected function validatorImage(array $data)
    {
        return Validator::make($data, [
            'image' => 'image'
        ]);
    }

    protected function validatorEmail(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function rulesThumbnail($data)
    {
        $photos = count($data);
        foreach (range(0, $photos) as $index) {
            $rules[$index] = 'image';
        }

        return $rules;
    }

    protected function validatorThumbnail(array $data)
    {
        return Validator::make($data, $this->rulesThumbnail($data));
    }

    public function uploadImage($data, $model)
    {
        $image = $data;
        $path = $image->store($model);
        $name = pathinfo(basename($path), PATHINFO_FILENAME);
        $type = pathinfo(basename($path), PATHINFO_EXTENSION);

        $smallImage = Image::make($image->getRealPath())->resize(80, 80)->stream();
        $mediumImage = Image::make($image->getRealPath())->resize(200, 200)->stream();
        $largerImage = Image::make($image->getRealPath())->resize(500, 500)->stream();

        Storage::put($model . '/' . $name . '-small.' . $type, $smallImage);
        Storage::put($model . '/' . $name . '-medium.' . $type, $mediumImage);
        Storage::put($model . '/' . $name . '-larger.' . $type, $largerImage);
        return $path;
    }

    public function add(Request $request)
    {
        $data = $request->all();
        if (isset($data['email'])) {
            if ($this->validatorEmail($data)->fails()) {
                return redirect()->back()->withErrors($this->validatorEmail($data));
            };
        }

        if (isset($data['slug'])) {
            if ($this->validatorSlug($data)->fails()) {
                return redirect()->back()->withErrors($this->validatorSlug($data));
            };
        }

        if (isset($data['image'])) {
            if ($this->validatorImage($data)->fails()) {
                return redirect()->back()->withErrors($this->validatorImage($data));
            };
            $data['image'] = $this->uploadImage($data['image'], $data['model']);
        }

        if (isset($data['avatar'])) {
            if ($this->validatorImage($data)->fails()) {
                return redirect()->back()->withErrors($this->validatorImage($data));
            };
            $data['avatar'] = $this->uploadImage($data['avatar'], $data['model']);
        }

        if (isset($data['thumbnail'])) {
            if ($this->validatorThumbnail($data['thumbnail'])->fails()) {
                return redirect()->back()->withErrors($this->validatorThumbnail($data['thumbnail']));
            };

            $thumbnail = [];

            foreach ($data['thumbnail'] as $image) {
                $thumbnail[] = $this->uploadImage($image, $data['model']);
            }
            $data['thumbnail'] = json_encode($thumbnail);
            $data['thumbnail'] = str_replace("\/", "/", $data['thumbnail']);
        }

        $baseAppPrefix = 'App\\';
        $appPrefix = 'App\\Model\\';
        if ($data['model'] == 'user') {
            $modelName = $baseAppPrefix . ucwords($data['model']);
        } else {
            $modelName = $appPrefix . ucwords($data['model']);
        }
        $slug = $data['model'];
        unset($data['_token'], $data['model']);
        $modelName::create($data);
        return redirect()->route('adminDetail', ['slug' => $slug]);
    }

    protected function delete(Request $request)
    {
        $data = $request->all();
        $baseAppPrefix = 'App\\';
        $appPrefix = 'App\\Model\\';
        if ($data['model'] == 'user') {
            $modelName = $baseAppPrefix . ucwords($data['model']);
            if ($data['id'] == '1') {
                return response()->json([
                    'error' => false
                ], 200);
            }
        } else {
            $modelName = $appPrefix . ucwords($data['model']);
        }
        $item = $modelName::find($data['id']);
        $item->delete();
        return response()->json([
            'error' => false
        ], 200);
    }

    protected function deleteAll(Request $request)
    {
        $data = $request->all();
        $baseAppPrefix = 'App\\';
        $appPrefix = 'App\\Model\\';

        if ($data['model'] == 'user') {
            $modelName = $baseAppPrefix . ucwords($data['model']);

        } else {
            $modelName = $appPrefix . ucwords($data['model']);
            $modelName::destroy($data['id']);
        }

        $modelName::destroy($data['id']);
        return response()->json([
            'error' => false
        ], 200);
    }
}
