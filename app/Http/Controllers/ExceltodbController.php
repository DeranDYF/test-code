<?php

namespace App\Http\Controllers;

use App\Models\Excels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImport;


class ExceltodbController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['activeMenu'] = 'exceltodb';
        $data['title'] = 'Excel to Database';
        $data['excel'] = Excels::all();
        return view('exceltodb', $data);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'excels' => ['required', 'max:5120'],
        ]);
    }

    protected function create(Request $request)
    {
        
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $validationErrors = $validator->errors()->all();
            Session::flash('failedValidation', $validationErrors);
            return redirect('exceltodb');
        } else {
            if ($request->hasFile('excels')) {
                $file = $request->file('excels');
                if ($file->getSize() > 5 * 1024 * 1024) {
                    Session::flash('failed', 'File size exceeds the limit of 5 MB.');
                    return redirect('exceltodb');
                }
                $extension = $file->getClientOriginalExtension();
                $filename = 'file_' . Str::random(40) . '.' . $extension;
                $path = $file->move(public_path('doc'), $filename);
                if ($path !== false) { 
                    Excel::import(new ExcelImport, public_path('/doc/' . $filename));
                    File::delete(public_path('/doc/' . $filename));
                    Session::flash('success', 'Success Added New Data');
                } else {
                    Session::flash('failed', 'Failed to upload and save the file.');
                }
            } else {
                Session::flash('failed', 'No file uploaded.');
            }
            return redirect('exceltodb');
        }
    }

}