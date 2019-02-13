@extends('layouts.admin')
@section('content')
<h1>Posts</h1>
<table class="table">
  <thead>
    <tr>
      <th>Actions</th>
      <th>ID</th>
      <th>Photo</th>
      <th>Title</th>
      <th>Body</th>
      <th>Owner</th>
      <th>Created</th>
      <th>Updated</th>
    </tr>
  </thead>
  <tbody>
      @if(isset($posts) && ($posts))
        @foreach($posts as $post)
        <tr>
        <td>
            {{-- <a href="{{route('admin.users.destroy', $user->id)}}"><i class="fas fa-trash-alt"></i></a> --}}
            {{-- {!! Form::open(['method'=>'delete', 'route'=>['admin.users.destroy', $user->id]])!!}
            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
            <a class="btn btn-primary" href="{{route('admin.users.edit', $user->id)}}"><i class="fas fa-pencil-alt"></i></a>
            {!! Form::close()!!} --}}
        </td>
            <td>{{$post->id}}</td>
            <td><img style="max-height: 3rem" src="{{$post->photo->path}}" alt=""></td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->user->name}}</td>            
            {{-- <td>{{$post->created_at->diffForHumans()}}</td> --}}
            {{-- <td>{{$post->updated_at->diffForHumans()}}</td> --}}
        </tr>
        @endforeach
      @endif
    </tbody>
</table>
@endsection