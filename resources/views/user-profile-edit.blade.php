@extends('layouts.master')

@section('content')
<div class="c-layout-breadcrumbs-1 c-bgimage-full  c-centered  c-fonts-uppercase c-fonts-bold   c-bg-img-center" style="background-image: url({{asset('assets/base/img/content/backgrounds/bg-48.jpg')}})">
    <div class="container">
        <div class="c-page-title c-pull-left">
            <h3 class="c-font-uppercase c-font-bold c-font-white c-font-20 c-font-slim c-opacity-09">Edit Profile</h3>
            <h4 class="c-font-white c-font-thin c-opacity-09">Lorem Ipsum</h4>
        </div>
        <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
            <li><a href="{{url('/')}}" class="c-font-white">Home</a></li>
            <li class="c-font-white">/</li>
            <li><a href="{{url('/profile')}}" class="c-font-white">Profile</a></li>
            <li class="c-font-white">/</li>
            <li class="c-state_active c-font-white">Edit Profile</li>
        </ul>
    </div>
</div>

<div class="c-content-box c-size-md c-bg-white">
	<div class="container">
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
		
		<div class="row">
			<div class="col-md-12">	
				{!! Form::model($user, ['route' => 'profile.submit', 'class' => 'c-shop-form-1']) !!}
					<div class="row">
						<div class="form-group col-sm-12 col-lg-6">
							{!! Form::label('first_name', 'First Name', ['class' => 'control-label c-font-14']) !!}
							{!! Form::text('first_name', null,
								['required',
									'class'=>'form-control c-square c-theme',
									'placeholder'=>'First Name']) !!}
									<span class="help-block c-font-red">{{$errors->first('first_name')}}</span>
						</div>
						<div class="form-group col-sm-12 col-lg-6">
							{!! Form::label('last_name', 'Last Name', ['class' => 'control-label c-font-14']) !!}
							{!! Form::text('last_name', null,
								['required',
									'class'=>'form-control c-square c-theme',
									'placeholder'=>'Last Name']) !!}
									<span class="help-block c-font-red">{{$errors->first('last_name')}}</span>
						</div>
						<div class="form-group col-sm-12 col-lg-6">
							{!! Form::label('phone', 'Phone', ['class' => 'control-label c-font-14']) !!}
							{!! Form::text('phone', null,
								['class'=>'form-control c-square c-theme',
									'placeholder'=>'Phone']) !!}
									<span class="help-block c-font-red">{{$errors->first('phone')}}</span>
						</div>
						<div class="form-group col-sm-12 col-lg-6">
							{!! Form::label('preferred_contact', 'Preferred Contact Method', ['class' => 'control-label c-font-14']) !!}
							<div class="c-radio-inline">
								<div class="c-radio c-radio-small">
									{!! Form::radio('preferred_contact', 'EMAIL', false, ['class' => 'c-radio', 'id' => 'contact1']) !!}
									<label for="contact1">
										<span></span>
										<span class="check"></span>
										<span class="box"></span> Email
									</label>
								</div>
								<div class="c-radio c-radio-small">
									{!! Form::radio('preferred_contact', 'PHONE', false, ['class' => 'c-radio', 'id' => 'contact2']) !!}
									<label for="contact2">
										<span></span>
										<span class="check"></span>
										<span class="box"></span> Phone
									</label>
								</div>
								<div class="c-radio c-radio-small">
									{!! Form::radio('preferred_contact', 'TEXT', false, ['class' => 'c-radio', 'id' => 'contact3']) !!}
									<label for="contact3">
										<span></span>
										<span class="check"></span>
										<span class="box"></span> Text
									</label>
								</div>
							</div>
							<span class="help-block c-font-red">{{$errors->first('preferred_contact')}}</span>
						</div>
						<div class="form-group col-sm-12 col-lg-6">
							{!! Form::label('operating_system', 'Operating System', ['class' => 'control-label c-font-14']) !!}
							{!! Form::text('operating_system', null,
								['class'=>'form-control c-square c-theme',
									'placeholder'=>'Operating System Being Used']) !!}
									<span class="help-block c-font-red">{{$errors->first('operating_system')}}</span>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-sm-12">
							{!! Form::label('software_issue', 'Software Issue', ['class' => 'control-label c-font-14']) !!}
							{!! Form::text('software_issue', null,
								['class'=>'form-control c-square c-theme',
									'placeholder'=>'Software Issue']) !!}
									<span class="help-block c-font-red">{{$errors->first('software_issue')}}</span>
						</div>
						<div class="form-group col-sm-12">
							{!! Form::label('content', 'Content', ['class' => 'control-label c-font-14']) !!}
							{!! Form::textarea('content', null,
								['class'=>'form-control c-square c-theme noresize',
									'placeholder'=>'Enter your message..',
									'rows' => 7]) !!}
									<span class="help-block c-font-red">{{$errors->first('content')}}</span>
						</div>
					</div>

					<div class="row">
						<div class="form-group c-margin-t-40">
							<div class="col-sm-12">
								{!! Form::submit('Submit', ['class' => 'btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold']) !!}
								<button type="button" class="btn btn-default c-btn-square c-btn-uppercase c-btn-bold">Cancel</button>
							</div>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection