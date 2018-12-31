<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Validator;

use App\User;
use App\Role;
use App\Image;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allusers = User::all();
        return view('admin.users.allusers', compact('allusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        // New User
        // $user = User::create([
        //     'name'=>$request->name, 
        //     'email'=>$request->email,
        //     'password'=>$request->password,
        //     'role'=>$request->role,
        //     'is_active'=>$request->is_active
        //      ]);


        $input = $request->all();
        $input['password'] = bcrypt($request['password']);

        $user = User::create($input);
    	if($request->file('avatar')){
           $file = $request->file('avatar');
           $filename = time() . '_' . $file->getClientOriginalName();
           $path = 'user_uploads/avatars/' .  kebab_case($request->name);
           $user->image()->create(['path'=> $path . '/' . $filename]);
           $file->move($path, $filename);
	    }else{
            $filename = 'default.jpg';
        }
        // $user->save();
        session()->flash('success','User Created Successfully');
        return redirect()->back();
        // User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
