<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
    <!--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
    <div class="logo">
        <a href="{{ url('/') }}" class="simple-text">
            @lang('crm.creative_lab')
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="{{ url('/') }}" class="simple-text">
            Cl
        </a>
    </div>
    <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y" data-ps-id="8696c6e9-2af5-c53a-e8e7-97f9bb83708a">
        <div class="user">
            <div class="photo">
                <img src="{{ $userInfo->img_url }}" alt="avatar">
            </div>
            <div class="info">
                <input type="hidden" id-user="{{ $userInfo->id }}">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    {{ $userInfo->name }}
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/get_user_profile') }}">Edit Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="active">
                <a data-toggle="collapse" href="#clientPages" class="collapsed" aria-expanded="false">
                    <i class="material-icons">account_box</i>
                    <p>@lang('crm.clients')
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="clientPages" aria-expanded="false" style="height: 0px;">
                    <ul class="nav">
                        <li class="active">
                            <a href="{{ url('/') }}">@lang('crm.users')</a>
                        </li>
                        <li>
                            <a href="#">@lang('crm.partners')</a>
                        </li>
                        <li>
                            <a href="#">@lang('crm.admins')</a>
                        </li>
                        <li>
                            <a href="#">@lang('crm.smm')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">
                    <i class="material-icons">info</i>
                    <p>@lang('crm.news')</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="material-icons">monetization_on</i>
                    <p>@lang('crm.finance')</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="material-icons">date_range</i>
                    <p>@lang('crm.calendar')</p>
                </a>
            </li>
        </ul>
        <div class="ps-scrollbar-x-rail" style="left: 0; bottom: -30px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0; width: 0;"></div></div><div class="ps-scrollbar-y-rail" style="top: 30px; right: 0px; height: 641px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 21px; height: 453px;"></div></div></div>
    <div class="sidebar-background"></div></div>
