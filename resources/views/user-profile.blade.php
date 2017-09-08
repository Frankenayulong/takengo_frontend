@extends('layouts.user')
@section('section')
My Profile
@endsection
@section('inner-content')
<div class="row">
    <div class="col-lg-12">
        <div class="c-content-title-1">
            <h3 class="c-font-uppercase c-font-bold">My PROFILE</h3>
            <div class="c-line-left"></div>
        <p class="">
            Hello <a href="#" class="c-theme-link">{{$user->first_name}}</a> (not <a href="#" class="c-theme-link">{{$user->first_name}} {{$user->last_name}}</a>? <a href="javascript:;" ng-click="authenticate.sign_out()" class="c-theme-link">Log out</a>). <br />
        </p>
        </div>
        <div class="row">
            <div class="col-lg-12 col-lg-12 col-xs-12 c-margin-b-20">
                <h3 class="c-font-uppercase c-font-bold">Personal Information</h3>
                <hr/>
                <ul class="list-unstyled">
                    <li>
                        <p style="margin:0" class="c-font-16">
                            {{$user->first_name or ''}}{{$user->last_name ? (' '.$user->last_name) : ''}}{{$user->gender == 'U' ? '' : (', '.$user->gender)}}
                        </p>
                    </li>
                    
                    <li>
                        <p style="margin:0" class="c-font-16">{{$user->email}}</p>
                    </li>
                    @if($user->phone)
                    <li>
                        <p style="margin:0" class="c-font-16">{{$user->phone or $unspecified_field}}</p>
                    </li>
                    @endif
                    @if($user->birth_date)
                    <li>
                        <p style="margin:0" class="c-font-16">{{\Carbon\Carbon::parse($user->birth_date)->format('d M Y')}}</p>
                    </li>
                    @endif
                </ul>
                @if($user->address || $user->suburb || $user->state || $user->post_code)
                <br/>
                <h3 class="c-font-uppercase c-font-bold">Address</h3>
                <hr/>
                <ul class="list-unstyled">
                    <li>
                        <p style="margin:0" class="c-font-16">{{$user->address ? $user->address.', ' : ''}}{{$user->suburb ? $user->suburb.', ' : ''}}</p>
                    </li>
                    <li>
                        <p style="margin:0" class="c-font-16">{{$user->state or ''}}</p>
                    </li>
                    <li>
                        <p style="margin:0" class="c-font-16">{{$user->post_code or ''}}</p>
                    </li>
                </ul>
                @endif
                @if($user->driver_license_picture || $user->driver_license_number || $user->driver_license_expiry_date || $user->driver_license_country_issuer)
                <br/>
                <h3 class="c-font-uppercase c-font-bold">Driver License</h3>
                <hr/>
                <ul class="list-unstyled">
                    <li>
                        <img src="{{asset('assets/base/img/content/shop5/02.png')}}" style="height:100px;width:auto"/>
                        <p style="margin:0" class="c-font-16">{{$user->driver_license_picture or $unspecified_field}}</p>
                    </li>
                    <li>
                        <p style="margin:0" class="c-font-16">{{$user->driver_license_number or ''}}</p>
                    </li>
                    <li>
                        <p style="margin:0" class="c-font-16">{{$user->driver_license_expiry_date or ''}}</p>
                    </li>
                    <li>
                        <p style="margin:0" class="c-font-16">{{$user->driver_license_country_issuer or ''}}</p>
                    </li>
                </ul>
                @endif
                <br/>
                <p style="margin:0" class="c-font-16 c-font-bold">Login By: </p>
                <p style="margin:0" class="c-font-16">{{$user->vendor ? ucfirst($user->vendor) : 'Take N Go'}}</p>
                <br/><br/>
                <a href="{{url('/profile/edit')}}" class="btn c-btn-square c-theme-btn c-btn-uppercase c-btn-bold">Edit</a>
            </div>
        </div>
</div>
</div>

@endsection

