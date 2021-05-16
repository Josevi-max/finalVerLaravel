<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserValoration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddValoration extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $id)
    {
        $user = User::find($id);
        $valorations = UserValoration::where("studentId",$user[0]->id)->get();
        return view("components.log.valorations", compact("user", "valorations"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $user=$request->studentId;
    
           
       
          if (UserValoration::where('studentId', '=', $user)->exists()) {
            DB::table("user_valorations")->where('studentId', '=', $user)
                ->update([
                    "preliminaryChecks" => $request->preliminaryChecks,
                    "installationVehicle" => $request->installationVehicle,
                    "incorporationCirculation" => $request->incorporationCirculation,
                    "normalProgression" => $request->normalProgression,
                    "sideShift" => $request->sideShift,
                    "overTaking" => $request->overTaking,
                    "intersections" => $request->intersections,
                    "changeDirection" => $request->changeDirection,
                    "stops" => $request->stops,
                    "parking" => $request->parking,
                    "obedienceSigns" => $request->obedienceSigns,
                    "lights" => $request->lights,
                    "controlsOperation" => $request->controlsOperation,
                    "otherControls" => $request->otherControls,

                    "safeDriving" => $request->safeDriving,
                    "comments" => $request->comments

                ]);
        } else {

            DB::table("user_valorations")
                ->insert([
                    "preliminaryChecks" => $request->preliminaryChecks,
                    "preliminaryChecks" => $request->preliminaryChecks,
                    "installationVehicle" => $request->installationVehicle,
                    "incorporationCirculation" => $request->incorporationCirculation,
                    "normalProgression" => $request->normalProgression,
                    "sideShift" => $request->sideShift,
                    "overTaking" => $request->overTaking,
                    "intersections" => $request->intersections,
                    "changeDirection" => $request->changeDirection,
                    "stops" => $request->stops,
                    "parking" => $request->parking,
                    "obedienceSigns" => $request->obedienceSigns,
                    "lights" => $request->lights,
                    "controlsOperation" => $request->controlsOperation,
                    "otherControls" => $request->otherControls,

                    "safeDriving" => $request->safeDriving,
                    "comments" => $request->comments,
                    "studentId" => $user,
                    "teacherId" => Auth::user()->id
                ]);
        }
      


        return  redirect()->route("dashboard.admin");
        
    }
}
