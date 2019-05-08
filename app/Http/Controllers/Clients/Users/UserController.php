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
        $countries = $this->country->get()->random(10);

        return $countries;
    }

    public function searchCountry(Request $request)
    {
        $countryName = $request->input('country');

        $countriesList = $this->country->searchCountry($countryName)->get();

        return response()->json(['success' => true, 'countries' => $countriesList]);
    }

    public function getCitiesList(Request $request)
    {
        $data = $request['countryId'];
        if (!$data) {
            return response()->json(['error' => 'Choose country...']);
        }
        $cities = $this->city->getCitiesList($request['countryId'])->get()->random(10);

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

        $newUserData = [
            'name' => $data['profileLogin']  ,
            'email' => $data['profileEmail']
        ];

        $newProfileData = [
            'first_name' => $data['profileName'],
            'last_name' => $data['profileSurname'],
            'address' => $data['profileAddress'],
            'city' => $data['profileCity'],
            'country' => $data['profileCountry'],
            'phone' => $data['profilePhone'],
        ];

        $this->user->updateUserData(Auth::id())->update($newUserData);
        $this->profile->updateOwnProfile(Auth::id())->update($newProfileData);

        return response()->json(['success' => true]);
    }

}
