@extends('layouts.admin')

@section('content')
<h1>Users</h1>
@if(isset($users) && ($users))
<table class="table">
    <thead>
        <tr>
            <th>Delete</th>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
        <td>
            {{-- <a href="{{route('admin.users.destroy', $user->id)}}"><i class="fas fa-trash-alt"></i></a> --}}
            {!! Form::open(['method'=>'delete', 'route'=>['admin.users.destroy', $user->id]])!!}
            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
            <a class="btn btn-primary" href="{{route('admin.users.edit', $user->id)}}"><i class="fas fa-pencil-alt"></i></a>
            {!! Form::close()!!}
        </td>
            <td>{{$user->id}}</td>
            <td><img style="max-height: 3rem" src="{{$user->photo->path}}" alt=""></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role? $user->role->name : "User has no role"}}</td>
            <td>
                {{$user->is_active?'true':'false'}}
            </td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
