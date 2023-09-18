<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;



class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['activeMenu'] = 'user';
        $data['title'] = 'Users';
        $data['users'] = User::all();
        $data['role'] = Role::all();
        return view('admin/user', $data);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'confirmPassword' => ['required', 'string', 'same:password'],
        ]);
    }

    protected function create(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $validationErrors = $validator->errors()->all();
            Session::flash('failedValidation', $validationErrors);
            return redirect('user');
        } else {
            $create = User::create([
                'id_role' => $request->input('role'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
            if ($create) {
                Session::flash('success', 'Success Added New User');
            } else {
                Session::flash('failed', 'Failed Added New User');
            }
            return redirect('user');
        }
    }

    protected function delete(Request $request)
    {

        $delete = User::find($request->id)->delete();
        if ($delete) {
            Session::flash('success', 'Success Deleted User');
        } else {
            Session::flash('failed', 'Failed Deleted User');
        }
        return redirect('user');
    }

    protected function edit(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $validationErrors = $validator->errors()->all();
            Session::flash('failedValidation', $validationErrors);
            return redirect('user');
        } else {
            $update = User::find($request->id)
                ->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'id_role' => $request->input('role')
                ]);

            if ($update) {
                Session::flash('success', 'Success Edit  User');
            } else {
                Session::flash('failed', 'Failed Edit User');
            }
            return redirect('user');
        }
    }
}
