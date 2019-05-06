<?php

namespace App\Http\Controllers\Clients\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\{
    UserRepository as User,
    UserProfileRepository as Profile
};


class UserController extends Controller
{
    private $user;
    private $profile;

    public function __construct(User $user, Profile $profile)
    {
        $this->user = $user;
        $this->profile = $profile;
    }

    public function index()
    {
        $users = $this->user->getUsersList()->get()->toArray();

        return view('crm.content_crm.clients.users.info_users', compact('users'));
    }

    public function getUserProfile()
    {
        return view('crm.content_crm.clients.users.profile_info_users');
    }
}
