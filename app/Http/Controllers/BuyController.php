<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BuyController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$hecho = false;
        if (session("hecho")) {
            $hecho = session("hecho");
        }
        return view('components.log.buy', compact( isset($hecho)?"hecho":null));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $hecho = false;


        if (isset($request->examAttempts))
            $exam = $user->examAttempts += $request->examAttempts;
        else
            $exam = 0;

        if (is_numeric($request->nClases)){
            $class = $user->nClases += $request->nClases;
        if (DB::table('users')->where("id", $user->id)->update(["nClases" => $class, "examAttempts" => $exam]))
            $hecho = true;
        }
        return  redirect()->route("buy.create")->with("hecho", $hecho);
    }
}
