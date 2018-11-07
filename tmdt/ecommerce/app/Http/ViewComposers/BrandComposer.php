<?php

namespace App\Http\ViewComposers;

use App\Model\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class BrandComposer
{
    protected $brands;

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        if (Request::route('slug')){
            $slug = Request::route('slug');
            $this->brands = Brand::whereHas('categoryId', function ($q) use ($slug) {
                $q->where("slug", $slug);
            })->get();
        } else {
            $this->brands = [];
        }
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $view->with('brands', $this->brands);
    }
}