<?php

namespace App\Http\Controllers\Clients\Users;

use App\Services\Validations\UserCreateValidations;
use App\Services\Validations\UserProfileValidations;
use App\User;
use Faker\Provider\Image;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EloquentModel\{
    UserProfile as Profile,
    Country,
    City
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    private $user;
    private $city;
    private $profile;
    private $country;

    /**
     * UserController constructor.
     * @param User $user
     * @param Profile $profile
     * @param Country $country
     * @param City $city
     */
    public function __construct(User $user, Profile $profile, Country $country, City $city)
    {
        $this->user = $user;
        $this->city = $city;
        $this->country = $country;
        $this->profile = $profile;
    }

    /**
     * Return list of users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $usersList = $this->user->getUsersList()->get();

        return view('crm.content_crm.clients.users.info_users', compact('usersList'));
    }

    /**
     * Return user profile
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUserProfile()
    {
        $profile = $this->profile->getUserProfile()->first();

        return view('crm.content_crm.clients.users.profile_info_users', compact('profile'));
    }

    /**
     * Return list of 10 randoms countries
     *
     * @return mixed
     */
    public function getCountriesList()
    {
        $countries = $this->country->get()->random(10);

        return $countries;
    }

    /**
     * Return searchable country
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchCountry(Request $request)
    {
        $countryName = $request->input('country');

        $countriesList = $this->country->searchCountry($countryName)->get();

        return response()->json(['success' => true, 'countries' => $countriesList]);
    }

    /**
     * Return searchable city
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchCity(Request $request)
    {
        $data = $request->all();

        $citiesList = $this->city->searchCity($data)->take(10)->get();

        return response()->json(['success' => true, 'citiesList' => $citiesList]);
    }

    /**
     * Return list of 10 searchable cities
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCitiesList(Request $request)
    {
        $data = $request->all();
        if (!$data['countryId']) {
            return response()->json(['error' => 'Choose country...']);
        }
        $cities = $this->city->getCitiesList($data)->take(10)->get();

        return $cities;
    }

    /**
     * Update user profile info
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * Change user password
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeUserPass(Request $request)
    {
        $data = $request->all();

        $validation = UserProfileValidations::changeUserPassword($data);
        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()]);
        }

        $passCheck = Hash::check($data['profileOldPass'], Auth::user()->password);

        if(!$passCheck) {
            return response()->json([ 'error' => ['profileOldPass' => 'Wrong old password']]);
        }

        $newPass = [
            'password' => Hash::make($data['profileNewPass'])
        ];

        $this->user->updateUserData(Auth::id())->update($newPass);

        return response()->json(['success' => true]);
    }

    public function updateOwnAvatar(Request $request)
    {
        if ($request->hasFile('photo')) {
            $image      = $request->file('photo');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->stream(); // <-- Key point

            dd(1);
            Storage::disk('local')->put('avatars' . '/' . $fileName, $img, 'public');

            return redirect('crm.content_crm.clients.users.profile_info_users');
        }
        return response()->json([ 'error' => ['image' => 'Wrong image']]);
    }

    public function addNewUser(Request $request)
    {
        $data= $request->all();

        $validation = UserCreateValidations::createUser($data);
        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()]);
        }

        $userData = [
          'name' => $data['userLogin'],
          'email' => $data['userEmail'],
        ];

        $this->user->create($userData);

        return response()->json(['success' => true]);
    }
}
