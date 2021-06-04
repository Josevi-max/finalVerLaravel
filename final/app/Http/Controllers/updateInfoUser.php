<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


function roleUser()
{
    $result = "Student";
    $actualUser = User::find(Auth::user()->id);
    $admin = $actualUser->roles()->get();
    if ($admin[0]["name"] == "Admin") {
        $result = "Admin";
    }
    return $result;
}
class updateInfoUser extends Controller
{


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $user = User::findOrFail($id);
        /*   $actualUser=User::find(Auth::user()->id);
        $admin=$actualUser->roles()->get();*/


        if ($user->id == Auth::user()->id || roleUser() == "Admin") {
            return view("profile.show", compact("user"))->with(session("enviado") ? session("enviado") : null);
        } else {
            return view("dashboard");
        }
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

        $user = User::find($id);
        $password = $user->password;

        if ((Hash::check($request->input('actualPassword'), $user->password) || roleUser() == "Admin") && $request->input('newPassword') == $request->input('newPassword2') && !empty($request->input('newPassword'))) {
            $password = bcrypt($request->input('newPassword'));
            $request['correctPassword'] = true;
        }
        if ($request->input('actualPassword') == null && $request->input('newPassword') == null && $request->input('newPassword2') == null) {
            $request['correctPassword'] = true;
        }

        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "correctPassword" => "accepted"
        ]);
        $user->update([
            "name" => $request->input('name'),
            'email' => $request->input('email'),
            "password" => $password
        ]);

        

        if ($request->input("studentMana") != null) {
            DB::table('table_teacher_students')->where('studentId', "=", $request->input("studentId"))->delete();
                DB::table('table_teacher_students')->insert([
                    "teacherId" => Auth::user()->id,
                    "studentId" => $request->input("studentId")
                ]);
        }else{
                DB::table('table_teacher_students')->where('studentId', "=", $request->input("studentId"))->delete();
        }
        if ($request->input('admin') != null) {
            $user->assignRole("Admin");
            $user->removeRole("Student");
            DB::table('date_class')->where('studentId', "=", $request->input("studentId"))->delete();
            DB::table('user_valorations')->where('studentId', "=", $request->input("studentId"))->delete();
            DB::table('table_teacher_students')->where('studentId', "=", $request->input("studentId"))->delete();
        } else {
            $user->removeRole("Admin");
            $user->assignRole("Student");
        }
        return redirect(route("profile.edit", $user->id))->with("enviado", "Los datos se han actalizado satisfactoriamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        $user->tokens->each->delete();
        $user->delete();

        if (Auth::user() != $user) {
            return redirect(route("dashboard.admin"));
        } else {
            return   redirect(route("/"));
        }
    }
}
