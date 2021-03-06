@extends('layouts.user')
@section('section')
Edit Profile
@endsection
@section('inner-content')
@if(count($errors->all()) > 0)
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-danger">
			<!-- Default panel contents -->
			<div class="panel-heading">Please check your input to satisfy {{count($errors->all()) > 1 ? 'these' : 'this'}} requirement{{count($errors->all()) > 1 ? 's' : ''}}</div>
			<!-- List group -->
			<ul class="list-group">
				@foreach($errors->all() as $error)
					<li class="list-group-item c-font-red c-font-14">{{$error}}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endif
<!-- @if(isset($created) && $created)
<div class="alert alert-success alert-dismissible" role="alert">
	Well done! Your ticket has been successfully submitted.
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
@endif -->

<div class="row" style="margin-left:0;margin-right:0;">
	<div class="col-md-12">	
		<form ng-controller="profileEditController" class="c-shop-form-1" ng-submit="save_profile()">
			<div class="c-content-title-1 c-title-md">
				<h3 class="c-center c-font-uppercase c-font-bold">Personal Information</h3>
				<div class="c-line-center c-bg-theme"></div>
			</div>
			<div class="row">
				<div class="row">
					<div class="form-group col-sm-12 col-lg-6">
						{!! Form::label('first_name', 'First Name', ['class' => 'control-label c-font-14']) !!}
						{!! Form::text('first_name', null,
							['required',
								'class'=>'form-control c-square c-theme',
								'placeholder'=>'First Name',
								'ng-model' => 'profile_form.first_name',
								'ng-init' => "profile_form.first_name = '$user->first_name'"]) !!}
						<span ng-if="profile_error.first_name" class="help-block c-font-red">
							<strong ng-repeat="item in profile_error.message.first_name | limitTo:1">@{{item}}</strong>
						</span>
					</div>
					<div class="form-group col-sm-12 col-lg-6">
						{!! Form::label('last_name', 'Last Name', ['class' => 'control-label c-font-14']) !!}
						{!! Form::text('last_name', null,
							['required',
								'class'=>'form-control c-square c-theme',
								'placeholder'=>'Last Name',
								'ng-model' => 'profile_form.last_name',
								'ng-init' => "profile_form.last_name = '$user->last_name'"]) !!}
						<span ng-if="profile_error.last_name" class="help-block c-font-red">
							<strong ng-repeat="item in profile_error.message.last_name | limitTo:1">@{{item}}</strong>
						</span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-lg-6">
						<div class="form-group">
							{!! Form::label('gender', 'Gender', ['class' => 'control-label c-font-14']) !!}
							<div class="c-radio-inline">
								<div class="c-radio c-radio-small">
									{!! Form::radio('gender', 'M', false, [
									'class' => 'c-radio', 
									'id' => 'gender1',
									'ng-model' => 'profile_form.gender',
									'ng-init' => "profile_form.gender = '$user->gender'"
									]) !!}
									<label for="gender1">
										<span></span>
										<span class="check"></span>
										<span class="box"></span> Male
									</label>
								</div>
								<div class="c-radio c-radio-small">
									{!! Form::radio('gender', 'F', false, [
									'class' => 'c-radio', 
									'id' => 'gender2',
									'ng-model' => 'profile_form.gender'
									]) !!}
									<label for="gender2">
										<span></span>
										<span class="check"></span>
										<span class="box"></span> Female
									</label>
								</div>
							</div>
							<span ng-if="profile_error.gender" class="help-block c-font-red">
								<strong ng-repeat="item in profile_error.message.gender | limitTo:1">@{{item}}</strong>
							</span>
						</div>
						<div class="form-group">
							{!! Form::label('phone', 'Phone', ['class' => 'control-label c-font-14']) !!}
							{!! Form::text('phone', null,
								['class'=>'form-control c-square c-theme',
									'placeholder'=>'Phone',
									'ng-model' => 'profile_form.phone',
									'ng-init' => "profile_form.phone = '$user->phone'"
									]) !!}
							<span ng-if="profile_error.phone" class="help-block c-font-red">
								<strong ng-repeat="item in profile_error.message.phone | limitTo:1">@{{item}}</strong>
							</span>
						</div>
					</div>
					
					<div class="form-group col-sm-12 col-lg-6">
						{!! Form::label('birth_date', 'Birth Date', ['class' => 'control-label c-font-14']) !!}
						<br/>
						{!! Form::text('birth_date', null,
							['class'=>'form-control c-square c-theme',
								'placeholder'=>'Birth Date',
								'id' => 'caleran-header',
								'ng-model' => 'profile_form.birth_date',
								'ng-init' => "init_birth_date('$user->birth_date')"]) !!}
						<span ng-if="profile_error.birth_date" class="help-block c-font-red">
							<strong ng-repeat="item in profile_error.message.birth_date | limitTo:1">@{{item}}</strong>
						</span>
					</div>
				</div>
			</div>

		

			<div class="c-content-title-1 c-title-md" style="margin-top:40px;">
				<h3 class="c-center c-font-uppercase c-font-bold">Additional Information</h3>
				<div class="c-line-center c-bg-theme"></div>
			</div>
			
			<div class="row">
				<div class="row">
					<div class="form-group col-sm-12">
						{!! Form::label('address', 'Home Address', ['class' => 'control-label c-font-14']) !!}
						{!! Form::textarea('address', null,
							['class'=>'form-control c-square c-theme noresize',
								'placeholder'=>'Enter your home address..',
								'rows' => 4,
								'ng-model' => 'profile_form.address',
								'ng-init' => "profile_form.address = '$user->address'"]) !!}
						<span ng-if="profile_error.address" class="help-block c-font-red">
							<strong ng-repeat="item in profile_error.message.address | limitTo:1">@{{item}}</strong>
						</span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-12 col-lg-6">
						{!! Form::label('suburb', 'Suburb', ['class' => 'control-label c-font-14']) !!}
						{!! Form::text('suburb', null,
							['class'=>'form-control c-square c-theme',
								'placeholder'=>'Suburb',
								'ng-model' => 'profile_form.suburb',
								'ng-init' => "profile_form.suburb = '$user->suburb'"]) !!}
						<span ng-if="profile_error.suburb" class="help-block c-font-red">
							<strong ng-repeat="item in profile_error.message.suburb | limitTo:1">@{{item}}</strong>
						</span>
					</div>
					<div class="form-group col-sm-12 col-lg-6">
						{!! Form::label('state', 'State', ['class' => 'control-label c-font-14']) !!}
						{!! Form::select('state', [
							'' => 'Select a state...',
							'ACT' => 'Australian Capital Territory',
							'NSW' => 'New South Wales',
							'NT' => 'Northern Territory',
							'QLD' => 'Queensland',
							'SA' => 'South Australia',
							'TAS' => 'Tasmania',
							'VIC' => 'Victoria',
							'WA' => 'Western Australia'
							], null,
							['class' => 'form-control  c-square c-theme',
							'ng-model' => 'profile_form.state',
							'ng-init' => "profile_form.state = '$user->state'"]) !!}
						<span ng-if="profile_error.state" class="help-block c-font-red">
							<strong ng-repeat="item in profile_error.message.state | limitTo:1">@{{item}}</strong>
						</span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-12 col-lg-6">
						{!! Form::label('post_code', 'Post Code', ['class' => 'control-label c-font-14']) !!}
						{!! Form::text('post_code', null,
							['class'=>'form-control c-square c-theme',
								'placeholder'=>'Post Code',
								'ng-model' => 'profile_form.post_code',
								'ng-init' => "profile_form.post_code = '$user->post_code'"]) !!}
						<span ng-if="profile_error.post_code" class="help-block c-font-red">
							<strong ng-repeat="item in profile_error.message.post_code | limitTo:1">@{{item}}</strong>
						</span>
					</div>
				</div>
				
				
			</div>

			<div class="row">
				<div class="row c-right">
					<div class="form-group c-margin-t-40">
						<div class="col-sm-12">
							<button type="button" class="btn btn-default c-btn-square c-btn-uppercase c-btn-bold">Reset</button>
							{!! Form::submit('Submit', ['class' => 'btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold']) !!}
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<div ng-controller="profileDocumentController">
	<div class="c-content-title-1 c-title-md" style="margin-top:40px;">
		<h3 class="c-left c-font-uppercase c-font-bold">Driver License</h3>
		<div class="c-line-left c-bg-theme"></div>
	</div>
	<form class="c-shop-form-1" ng-submit="save_driver_license()">
	<div class="row">
			<div class="form-group col-sm-12 col-lg-6">
				{!! Form::label('dl-num', 'Number', ['class' => 'control-label c-font-14']) !!}
				{!! Form::text('dl-num', null,
					['required',
						'class'=>'form-control c-square c-theme',
						'placeholder'=>'Number',
						'ng-model' => 'driver_license_form.number',
						'ng-init' => "driver_license_form.number = '$user->driver_license_number'"]) !!}
				<span ng-if="driver_license_error.number" class="help-block c-font-red">
					<strong ng-repeat="item in driver_license_error.message.number | limitTo:1">@{{item}}</strong>
				</span>
			</div>
			<div class="form-group col-sm-12 col-lg-6">
				{!! Form::label('expiry_date', 'Expiry Date', ['class' => 'control-label c-font-14']) !!}
				{!! Form::text('expiry_date', null,
					['required',
						'class'=>'form-control c-square c-theme',
						'placeholder'=>'Expiry Date',
						'ng-model' => 'driver_license_form.exp_date',
						'id' => 'caleran-exp-date',
						'ng-init' => "init_expiry_date('$user->driver_license_expiry_date')"]) !!}
				<span ng-if="driver_license_error.exp_date" class="help-block c-font-red">
					<strong ng-repeat="item in driver_license_error.message.exp_date | limitTo:1">@{{item}}</strong>
				</span>
			</div>
			<div class="form-group col-sm-12 col-lg-6">
				{!! Form::label('country_issuer', 'Country Issuer', ['class' => 'control-label c-font-14']) !!}
				{!! Form::text('country_issuer', null,
					['required',
						'class'=>'form-control c-square c-theme',
						'placeholder'=>'Country Issuer',
						'ng-model' => 'driver_license_form.country_issuer',
						'ng-init' => "driver_license_form.country_issuer = '$user->driver_license_country_issuer'"]) !!}
				<span ng-if="driver_license_error.country_issuer" class="help-block c-font-red">
					<strong ng-repeat="item in driver_license_error.message.country_issuer | limitTo:1">@{{item}}</strong>
				</span>
			</div>
	</div>
	<div class="row">
		<div class="c-right">
			<div class="form-group c-margin-t-40">
				<div class="col-sm-12">
					<button type="button" class="btn btn-default c-btn-square c-btn-uppercase c-btn-bold">Reset</button>
					{!! Form::submit('Submit', ['class' => 'btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold']) !!}
				</div>
			</div>
		</div>
	</div>
	</form>
	<div class="row">
		<div class="form-group col-sm-12 col-lg-6">
		<label class="control-label c-font-17">Upload your driver license below</label>
			<slim id="driver-license-slim" data-ratio="16:9"
				data-size="400,225"
				data-service="slim.api_url"
				data-filter-sharpen="20"
				@if($user->driver_license_picture)
                data-initial-image="{{ Config::get('api.api_base_url') }}/driverlicense/{{$user->uid}}"
                @endif
				data-post="output"
				data-will-request="slim.will_request"
				data-did-upload="slim.upload"
				data-did-init="slim.init">
				<input type="file" name="picture"/>
			</slim>
		</div>
	</div>
</div>
@endsection