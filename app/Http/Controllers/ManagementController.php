<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dateClass=DB::table('date_class')->where("studentId", Auth::id())->orderBy("dayClass")->get();
        $otherClass=DB::table('date_class')->where("studentId","!=", Auth::id())->orderBy("dayClass")->take(30)->get(); 
        return view('components.log.managament',compact("dateClass","otherClass"))->with(session("management")?session("management"):null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Europe/Madrid');
        
        $validHours=[9,10,11,12,13,16,17,18,19,20];

        $management = null;
        $date = date("Y-m-d H:i", strtotime($request->date));
        $actualDate=date("Y-m-d H:i", strtotime(date("d-m-Y H:i")));
        $nClass = DB::table('users')->where("id", "=", Auth::id())->get("nClases");
        $classesSpent=DB::table('users')->where("id", "=", Auth::id())->get("classesSpent");
        if($nClass[0]->nClases < 1){
            $management = "Parece que no tienes clases suficientes en tu cartera, aprovecha de nuestras ofertas en la sección de <a href=".route('buy.create').">clases</a>" ;
        }elseif(DB::table('date_class')->where("dayClass", "=", $date)->exists()){
            $management = "La fecha que has seleccionado no es válida, prueba con otra fecha u hora";
        }elseif(substr($date, 0,10)==substr($actualDate, 0,10)){
            $management = "No es posible poner una clase sin una antelación de 1 día";
        }elseif(!in_array(substr($date, 10,3),$validHours)){
            $management = "Error la hora elegida no es posible, debe de ser un hora comprendida desde las 9 a las 13 o desde las 16 a las 20";
        }else{
            $class = --$nClass[0]->nClases ;
            DB::table('users')->where("id", Auth::id())->update(["nClases" => $class,"classesSpent"=>++$classesSpent[0]->classesSpent]);
            $management = "true";
            DB::table('date_class')->insert([
                "dayClass" => $date,
                "studentId" => Auth::id()
            ]);
        }
        return redirect(route("management.create"))->with("management",$management);
    }
}
