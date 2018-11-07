<?php

namespace App\Http\ViewComposers;

use App\Model\Banner;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BannerComposer
{
    protected $bannerFooters;
    protected $bannerProducts;

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->bannerFooters = Banner::where('position','Footer')->get();
        $this->bannerProducts = Banner::where('position','Product')->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(['bannerFooters' => $this->bannerFooters, 'bannerProducts' => $this->bannerProducts]);
    }
}