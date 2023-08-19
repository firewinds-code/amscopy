<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\case_detail_infos;
use App\Models\ams_info;
use Illuminate\Support\Facades\Hash;
use Validator;

class TlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role = Auth::user()->role;
        if ($role != 'tl') {
            session()->flush();
            return redirect('/');
        }
        $data['amsDetails']  = ams_info::get();
        return view('admin.dealer', $data);
    }

    public function agent()
    {
        $users  = User::where(['role' => 'agent', 'creater_id' => Auth::user()->id])->get();
        return view('admin.list')->with(compact('users'));
    }

    public function create()
    {
        return view('admin.createagent');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'email' => 'required|string|unique:users,email',
            'role' => 'required',
            'password' => 'required|confirmed|min:8',
            'name' => 'required',

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'creater_id' => Auth::user()->id
        ]);

        session()->flash('success', 'Agent Created Successfully');
        $url = url()->previous();
        return redirect($url);
    }

    public function destroy($id)
    {
        $condtion = User::where('id', $id)->delete();
        if ($condtion) {
            session()->flash('success', 'Agent Deleted Successfully');
        }
        else{
            session()->flash('error', 'Agent Delete Unsuccessfull');
        }
        $url = url()->previous();
        return redirect($url);
    }
}