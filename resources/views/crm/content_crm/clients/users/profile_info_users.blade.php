@extends('layouts.crm')

@section('content')
    <div class="wrapper">
        @include('partials.sidebar')
        <div class="main-panel">
            @include('crm.partials_crm.navbar_crm')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-avatar profile-avatar">
                                    <img class="img" src="{{ $profile->img_url }}" alt="avatar" />
                                    <a href="#" id="changeAvatarBtn">
                                        <i class="material-icons">edit</i>
                                    </a>
                                </div>
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">perm_identity</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Edit Profile</h4>
                                    <form>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div id="profileLoginDiv" class="form-group label-floating">
                                                    <label class="control-label">Name</label>
                                                    <input id="profileLogin" type="text" class="form-control" value="{{ $profile->name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="profileEmailDiv" class="form-group label-floating">
                                                    <label class="control-label">Email</label>
                                                    <input id="profileEmail" type="email" class="form-control" value="{{ $profile->email }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">First Name</label>
                                                    <input id="profileName" type="text" class="form-control" value="{{ $profile->first_name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Last Name</label>
                                                    <input id="profileSurname" type="text" class="form-control" value="{{ $profile->last_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Address</label>
                                                    <input id="profileAddress" type="text" class="form-control" value="{{ $profile->address }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select id="profileCountry" class="selectpicker" data-live-search="true" data-style="select-with-transition" title="Choose Country" data-size="7">
{{--                                                        <option {{($profile->country) ? 'selected' : ''}}>{{ $profile->country }}</option>--}}
                                                        <option value="" disabled>Choose Country</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div id="profileCityDiv" class="form-group">
                                                    <select id="profileCity" class="selectpicker" data-live-search="true" data-style="select-with-transition" title="Choose City" data-size="7">
{{--                                                        <option {{($profile->city) ? 'selected' : ''}}>{{ $profile->city }}</option>--}}
                                                        <option value="" disabled>Choose City</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div id="profilePhoneDiv" class="form-group label-floating">
                                                    <label class="control-label">+38 (123) 456 78 90</label>
                                                    <input id="profilePhone" type="text" class="form-control" value="{{ $profile->phone }}">
                                                </div>
                                            </div>
                                        </div>
                                        <a id="updateProfile" class="btn btn-rose pull-right">Update Profile</a>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">fingerprint</i>
                                </div>
                                <div class="card-content">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="profileOldPassDiv" class="form-group label-floating">
                                                    <label class="control-label">Old Password</label>
                                                    <input id="profileOldPass" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div id="profileNewPassDiv" class="form-group label-floating">
                                                    <label class="control-label">New Password</label>
                                                    <input id="profileNewPass" type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div id="profileNewPassConfirmDiv" class="form-group label-floating">
                                                    <label class="control-label">New Password Confirm</label>
                                                    <input id="profileNewPassConfirm" type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <a id="updateProfile" class="btn btn-rose pull-right">Change Password</a>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials.footer')
        </div>
    </div>
    @include('crm.content_crm.clients.users.users_modals')
@endsection
