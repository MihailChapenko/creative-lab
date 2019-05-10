@extends('layouts.crm')

@section('content')
    <div class="wrapper">
        @include('partials.sidebar')
        <div class="main-panel">
            @include('crm.partials_crm.navbar_crm')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <a id="addUserBtn" class="pull-right" href="#">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <p>Add User</p>
                                    </div>
                                </a>
                                <div class="card-content">
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="usersTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Country</th>
                                                <th>City</th>
                                                <th class="disabled-sorting text-right">Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Country</th>
                                                <th>City</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($usersList as $user)
                                                <tr id-user="{{ $user['user_id'] }}">
                                                    <td>{{ $user['name'] }}</td>
                                                    <td>{{ $user['email'] }}</td>
                                                    <td>{{ $user['phone'] }}</td>
                                                    <td>{{ $user['country'] }}</td>
                                                    <td>{{ $user['city'] }}</td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit" id-user="{{ $user['user_id'] }}"><i class="material-icons">edit</i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove" id-user="{{ $user['user_id'] }}"><i class="material-icons">close</i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                    <!-- end row -->
                </div>
            </div>
            @include('partials.footer')
            @include('crm.content_crm.clients.users.users_modals')
        </div>
    </div>
@endsection
