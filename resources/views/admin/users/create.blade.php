@extends('layouts.admin')

@section('content')
  <h3>Create User</h3>
  @include('includes.form-errors')
  {!! Form::open(['url'=>'admin/users', 'method'=>'post']) !!}
  <div class="row">
    <div class="six columns">
      {!! Form::label('name', 'Name') !!}
      {!! Form::text('name', null, ['class'=>'u-full-width']) !!}
    </div>
    <div class="six columns">
      {!! Form::label('email', 'Email Address') !!}
      {!! Form::text('email', null, ['class'=>'u-full-width']) !!}
    </div>
  </div>
  {!! Form::label('password', 'Password') !!}
  {!! Form::password('password') !!}
  <div class="row">
    <div class="four columns">
      {!! Form::label('role', 'Role') !!}
      {!! Form::select('role', $roles, null, ['placeholder'=>'Select a Role']) !!}

    </div>
    <div class="four columns">
      {!! Form::label('status', 'Status') !!}
      {!! Form::select('status', ['0'=>'Not Active', '1'=>'Active'],'0') !!}

    </div>
  </div>
  <div>
    {!! Form::submit('Create User', ['class'=>'button-primary']) !!}
  </div>
  {!! Form::close() !!}

@endsection