@extends('layouts.admin')

@section('content')
<h3>Edit User</h3>
@include('includes.form-errors')
<div class="row">
    <div class="col-sm-3">
        <img class="img-fluid" src="{{$user->photo->path}}" alt="">
    </div>
    {!! Form::model($user, ['route'=>['admin.users.update', $user->id], 'method'=>'put', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        {!! Form::label('email', 'Email Address') !!}
        {!! Form::email('email', null, ['class'=>'form-control']) !!}

        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
        {!! Form::label('role_id', 'Role') !!}
        {!! Form::select('role_id', $roles, null, ['placeholder'=>'Select a Role', 'class'=>'custom-select']) !!}

        {!! Form::label('is_active', 'Status') !!}
        {!! Form::select('is_active', ['0'=>'Not Active', '1'=>'Active'], null, ['class'=>'custom-select']) !!}
    </div>
    <div class="form-group">
        <label for="photo">Choose profil photo file</label>
        {!! Form::file('photo', ['class'=>'form-control-file']) !!}
    </div>
    {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

</div>
@endsection
