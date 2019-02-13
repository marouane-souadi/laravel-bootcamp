@extends('layouts.admin')

@section('content')
<h3>Create User</h3>
@include('includes.form-errors')
{!! Form::open(['url'=>'admin/users', 'method'=>'post', 'files' => true]) !!}
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
    {!! Form::select('is_active', ['0'=>'Not Active', '1'=>'Active'],'0', ['class'=>'custom-select']) !!}
</div>
<div class="form-group">
  <label for="photo">Choose profil photo file</label>
    {!! Form::file('photo', ['class'=>'form-control-file']) !!}
</div>
{!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection
