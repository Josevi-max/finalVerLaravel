<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class valorationStudent extends Controller
{
    public function index()
    {
       $data= DB::table('user_valorations')->where("studentId","=",Auth::user()->id)->get();

        return view('components.log.valoration-student',compact("data"));
    }
}
