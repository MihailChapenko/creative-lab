<?php

namespace App\Http\Controllers\Clients\Users;

use App\Services\Validations\UserProfileValidations;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EloquentModel\{
    UserProfile as Profile,
    Country,
    City
};
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    private $user;
    private $city;
    private $profile;
    private $country;

    public function __construct(User $user, Profile $profile, Country $country, City $city)
    {
        $this->user = $user;
        $this->city = $city;
        $this->country = $country;
        $this->profile = $profile;
    }

    public function index()
    {
        $usersList = $this->user->getUsersList()->get();

        return view('crm.content_crm.clients.users.info_users', compact('usersList'));
    }

    public function getUserProfile()
    {
        $profile = $this->profile->getUserProfile()->first();

        return view('crm.content_crm.clients.users.profile_info_users', compact('profile'));
    }

    public function getCountriesList()
    {
        $countries = $this->country->all()->take(15);

        return $countries;
    }

    public function getCitiesList(Request $request)
    {
        $data = $request['countryId'];
        if (!$data) {
            return response()->json(['error' => 'Choose country...']);
        }
        $cities = $this->city->where('country_id', '=', $request['countryId'])->get()->take(15);

        return $cities;
    }

    public function updateOwnProfile(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();

        $validation = UserProfileValidations::updateUserProfile($data);

        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()]);
        }

        $newProfileData = [
            'first_name' => $data['profileName'],
            'last_name' => $data['profileSurname'],
            'address' => $data['profileAddress'],
            'city' => $data['profileCity'],
            'country' => $data['profileCountry'],
            'phone' => $data['profilePhone'],
        ];

        $this->profile->where('user_id', '=', Auth::id())->update($newProfileData);

        return response()->json(['success' => true]);
    }
}
