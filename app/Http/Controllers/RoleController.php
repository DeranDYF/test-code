<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['activeMenu'] = 'role';
        $data['title'] = 'Roles';
        $data['role'] = Role::all();
        return view('admin/role', $data);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function create(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $validationErrors = $validator->errors()->all();
            Session::flash('failedValidation', $validationErrors);
            return redirect('role');
        } else {
            $create =  Role::create([
                'name' => $request->input('name'),
                'descriptions' => $request->input('descriptions'),
            ]);
            if ($create) {
                Session::flash('success', 'Success Added New Role');
            } else {
                Session::flash('failed', 'Failed Added New Role');
            }
            return redirect('role');
        }
    }

    protected function delete(Request $request)
    {

        $delete = Role::find($request->id)->delete();
        if ($delete) {
            Session::flash('success', 'Success Delete Role');
        } else {
            Session::flash('failed', 'Failed Delete Role');
        }
        return redirect('role');
    }

    protected function edit(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $validationErrors = $validator->errors()->all();
            Session::flash('failedValidation', $validationErrors);
            return redirect('role');
        } else {
            $update =  Role::find($request->id)
                ->update([
                    'name' => $request->input('name'),
                    'descriptions' => $request->input('descriptions'),
                ]);

            if ($update) {
                Session::flash('success', 'Success Edit Role');
            } else {
                Session::flash('failed', 'Failed Edit Role');
            }
            return redirect('role');
        }
    }
}
