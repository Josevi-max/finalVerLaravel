<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ControlUsersAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin(Request $request){
        date_default_timezone_set('Europe/Madrid');
        $users = User::paginate(9);
        $students=DB::table('table_teacher_students')->where('teacherId', '=', Auth::id() )->get("studentId");

        for ($i=0; $i < count($students); $i++) { 
            $ids[]= $students[$i]->studentId ; 
         }
         if(isset($ids)){
            $nextClass= DB::table('date_class')->orderBy("dayClass","asc")->whereIn("date_class.studentId",$ids)->where("dayClass",">", date("Y-m-d H:i"))->take(20)->get();
         }else{
             $nextClass=null;
         }
        
        $searchs=$request->query("search");
        if($searchs){
            $users=DB::table('users')->where('name', 'like', "%" .$searchs . "%")->orWhere('email', 'like', "%" .$searchs . "%")->paginate(9); 
 
        }elseif(isset($request->myStudents) && isset($ids)){
             $users=DB::table('users')->whereIn('id', $ids )->paginate(9); 
        }
         $nUsers = count(User::all());
         return view("components.log.admin-home", compact("users", "nUsers","nextClass"!=null?"nextClass":null));
    }
}
