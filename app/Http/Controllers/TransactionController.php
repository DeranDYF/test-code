<?php

namespace App\Http\Controllers;

use App\Models\Transaction_1s;
use App\Models\Transaction_2s;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['activeMenu'] = 'transaction';
        $data['title'] = 'Transaction';
        $data['depan'] = Transaction_1s::all();
        $data['belakang'] = Transaction_2s::all();
        return view('transaction', $data);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_depan' => ['required', 'string', 'max:255'],
            'nama_belakang' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function create(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $validationErrors = $validator->errors()->all();
            Session::flash('failedValidation', $validationErrors);
            return redirect('transaction');
        }

        DB::beginTransaction();

        try {

            $create1 = Transaction_1s::create([
                'nama_depan' => $request->input('nama_depan'),
            ]);

            $create2 = Transaction_2s::create([
                'nama_belakang' => $request->input('nama_belakang'),
            ]);

            if ($create1 && $create2) {
                DB::commit();
                Session::flash('success', 'Success Added New Data');
            } else {
                DB::rollBack();
                Session::flash('failed', 'Failed Added New Data');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('failed', 'Failed Added New Data');
        }

        return redirect('transaction');
    }
}
