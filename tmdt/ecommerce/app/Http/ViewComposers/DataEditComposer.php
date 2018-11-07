<?php

namespace App\Http\ViewComposers;

use App\Model\Brand;
use App\Model\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DataEditComposer
{
    protected $allBrand;
    protected $allCategory;

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->allBrand = Brand::all();
        $this->allCategory = Category::all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(['allBrand' => $this->allBrand, 'allCategory' => $this->allCategory]);
    }
}