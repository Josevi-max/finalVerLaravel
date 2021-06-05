<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserValoration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


function canValoration($id)
{
    $result = false;
    if (DB::table('table_teacher_students')->where('studentId', "=", $id)->where('teacherId', "=", Auth::user()->id)->exists()) {
        $result = true;
    }
    return $result;
}

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
        $can = canValoration($user[0]->id);
        $valorations = UserValoration::where("studentId", $user[0]->id)->get();
        $info = [
            "name" => [
                "Comprobaciones previas",
                "Instalación en el vehiculo",
                "Incorporación a la circulación",
                "Progresión normal",
                "Desplazamiento lateral",
                "Adelantamientos",
                "Intersecciones",
                "Cambio de sentido",
                "Paradas",
                "Estacionamientos",
                "Obediencia de las señales",
                "Utilización de las luces",
                "Manejo de los mandos",
                "Otros controles",
                "Conducción segura",
                "Comentarios"
            ],
            "type" => [
                "preliminaryChecks",
                "installationVehicle",
                "incorporationCirculation",
                "normalProgression",
                "sideShift",
                "overTaking",
                "intersections",
                "changeDirection",
                "stops",
                "parking",
                "obedienceSigns",
                "lights",
                "controlsOperation",
                "otherControls",
                "safeDriving",
                "comments"
            ]

        ];
        return view("components.log.valorations", compact("user", "valorations", "info", "can"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $user = $request->studentId;
            $enviado="false";
        if (canValoration($user)) {
            $enviado="true";

            $note = 0;
            $numberNotes=0;
            foreach ($request->except(['_token', "teacherId", "studentId"]) as $value) {

                if ($value > 0)
                    $numberNotes++;
                    $note += (int)$value;
            }
            
            $note /= $numberNotes;

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
                        "comments" => $request->comments,
                        "note" => $note,
                    ]);
            } else {

                DB::table("user_valorations")
                    ->insert([
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
                        "teacherId" => $request->teacherId,
                        "studentId" => $request->studentId,
                        /* $request->except(['_token',"note"]),*/
                        "note" => $note

                    ]);
            }
        }
        return  redirect()->route("valoration.create", ['id' => $user])->with("enviado",$enviado);
    }
}
