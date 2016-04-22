<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use Validator;
use App\Job;
use App\User;
use App\Role;
use Session;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


	/**
	 * Display a listing of the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return View('user.index', ['users' => $users]);
	}

	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
		$roles = Role::lists('name','id');
		return View('user.create', ['roles' => $roles ]);
	}


	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$users = User::all();	
		$this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

		$user = new User;

		$user->name = Input::get('name');
		$user->email      = Input::get('email');
		$user->password   = bcrypt(Input::get('password'));
		$user->save();

		$role = Input::get('roles');
		$user->roles()->attach($role);
		Session::flash('success', 'User was successful added!');
		return redirect('admin/users');
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		$rolelists = Role::lists('name','id');
		return View('user.edit', [ 'user' => $user ],['rolelists' => $rolelists]);
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
		$role = Role::find(Input::get('role'));
		$user->name   = Input::get('name');
		$user->email      = Input::get('email');
		$user->password   = bcrypt(Input::get('password'));
		$user->roles()->detach();
		$user->roles()->attach($role);
		$user->save();
		Session::flash('success', 'User was successful updated!');
		return redirect('admin/users');
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
		Session::flash('success', 'User was successful deleted!');
		return redirect('admin/users');
	}
}
