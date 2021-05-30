<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        return view('components.log.managament')->with(session("management")?session("management"):null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $management = null;

        $date = date("Y-m-d H:i", strtotime($request->date));

        $nClass = DB::table('users')->where("id", "=", Auth::id())->get("nClases");
        if($nClass[0]->nClases < 1){
            $management = "Parece que no tienes clases suficientes en tu cartera, aprovecha de nuestras ofertas en la sección de 'clases'";
        }elseif(DB::table('date_class')->where("dayClass", "=", $date)->exists()){
            $management = "El día que has seleccionado ya esta ocupado o no existe, prueba con otra fecha u hora";
        }else{
            $class = --$nClass[0]->nClases ;
            DB::table('users')->where("id", Auth::id())->update(["nClases" => $class]);
            $management = "true";
            DB::table('date_class')->insert([
                "dayClass" => $date,
                "studentId" => Auth::id()
            ]);
        }
       
        return redirect(route("management.create"))->with("management",$management);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
