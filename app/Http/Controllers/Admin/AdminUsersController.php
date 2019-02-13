<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Role;
use App\User;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//use Illuminate\Http\UploadedFile;

class AdminUsersController extends Controller
{
    // public function __construct() {
    //     $this->middleware('admin');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
      $users = User::all();
      return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
      $roles = Role::pluck('name','id')->all();
      return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        //
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        Session::flash('message', 'User Created');
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $roles = Role::pluck('name','id')->all();
        $user = User::findOrFail($id);
        
        return view('admin.users.edit', compact('user', 'roles'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        if (trim($request->password) ==='') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
        }

        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
            // $oldPhoto = $user->photo;
        }
        $user->update($input);
        // if (isset($oldPhoto)&&($oldPhoto)) {
        //     unlink($oldPhoto->path);
        //     $oldPhoto->delete();
        // }
        Session::flash('message', 'User updated');
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id)->delete();
        Session::flash('message', 'User deleted successfully');
        return redirect()->route('admin.users.index');
    }
}
