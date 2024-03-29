<?php

namespace App\Http\View\Composers;

use App\User;
use Illuminate\View\View;

class ProfileComposer
{
    /**
     * The user repository implementation.
     *
     * @var User
     */
    protected $user;

    /**
     * Create a new profile composer.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        // Dependencies automatically resolved by service container...
        $this->user = $user;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('userInfo', $this->user->getUserInfo()->first());
    }
}
