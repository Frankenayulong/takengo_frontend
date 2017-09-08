@extends('layouts.user')
@section('section')
My Profile
@endsection
@section('inner-content')
<div class="row">
    <div class="col-lg-6">
        <div class="row">
        <a href="{{url('/profile/edit')}}" class="btn c-btn-square c-theme-btn c-btn-uppercase c-btn-bold">Edit</a>
            <p style="margin:0" class="c-font-10">First Name</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->first_name}}</h3>
            <p style="margin:0" class="c-font-10">Last Name</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->last_name}}</h3>
            <p style="margin:0" class="c-font-10">Email Address</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->email}}</h3>
            <p style="margin:0" class="c-font-10">Phone</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->phone or $unspecified_field}}</h3>
            <p style="margin:0" class="c-font-10">Birth Date</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->birth_date or $unspecified_field}}</h3>
            <p style="margin:0" class="c-font-10">Gender</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->gender}}</h3>
            <p style="margin:0" class="c-font-10">Home Address</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->address or $unspecified_field}}</h3>
            <p style="margin:0" class="c-font-10">Suburb</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->suburb or $unspecified_field}}</h3>
            <p style="margin:0" class="c-font-10">State</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->state or $unspecified_field}}</h3>
            <p style="margin:0" class="c-font-10">Suburb</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->post_code or $unspecified_field}}</h3>
            <p style="margin:0" class="c-font-10">Driver's License Picture</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->driver_license_picture or $unspecified_field}}</h3>
            <p style="margin:0" class="c-font-10">Driver's License Number</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->driver_license_number or $unspecified_field}}</h3>
            <p style="margin:0" class="c-font-10">Driver's License Expiry Date</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->driver_license_expiry_date or $unspecified_field}}</h3>
            <p style="margin:0" class="c-font-10">Driver's License Country Issuer</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->driver_license_country_issuer or $unspecified_field}}</h3>
            <p style="margin:0" class="c-font-10">Login By</p>
            <h3 class="c-font-25" style="margin-top:0">{{$user->vendor or $unspecified_field}}</h3>
        </div>
    </div>
</div>

@endsection

