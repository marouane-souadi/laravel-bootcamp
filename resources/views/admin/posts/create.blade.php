@extends('layouts.admin')

@section('content')
<h3>Create Post</h3>
@include('includes.form-errors')
{!! Form::open(['route'=>'admin.posts.store', 'method'=>'post', 'files' => true]) !!}
<div class="row">
  <div class="col">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
  </div>
  <div class="col">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', ['0'=>'Cat1', '1'=>'Cat2'],'0', ['class'=>'form-control']) !!}
  </div>
</div>
<div class="form-group">
    {!! Form::label('body', 'Body') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
  <label for="photo">Photo</label>
    {!! Form::file('photo', ['class'=>'form-control-file']) !!}
</div>
{!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection