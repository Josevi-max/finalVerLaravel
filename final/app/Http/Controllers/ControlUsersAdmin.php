<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlUsersAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin(Request $request){

        $users = User::paginate(9);
        $searchs=$request->query("search");
        if($searchs){
            $users=DB::table('users')->where('name', 'like', "%" .$searchs . "%")->orWhere('email', 'like', "%" .$searchs . "%")->paginate(9);
            
         }
         
 
         $nUsers = count(User::all());
         return view("components.log.admin-home", compact("users", "nUsers"));
   
    }

 
 
}
