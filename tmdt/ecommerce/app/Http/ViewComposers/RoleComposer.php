<?php

namespace App\Http\ViewComposers;

use App\Model\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RoleComposer
{
    protected $roles;

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->roles = Role::all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(['roles' => $this->roles]);
    }
}