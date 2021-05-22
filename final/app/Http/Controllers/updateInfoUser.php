<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $user = User::findOrFail($id);
        /*   $actualUser=User::find(Auth::user()->id);
        $admin=$actualUser->roles()->get();*/

        if ($user->id == Auth::user()->id || roleUser() == "Admin") {
            return view("profile.show", compact("user"));
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
        $actualizado = false;


        //return var_dump($request->input('admin'));



        if ((Hash::check($request->input('actualPassword'), $user->password) || roleUser()) && $request->input('newPassword') == $request->input('newPassword2') && !empty($request->input('newPassword'))) {
            $password = bcrypt($request->input('newPassword'));
            $actualizado = true;
        }
        $user->update([
            "name" => $request->input('name'),
            'email' => $request->input('email'),
            "password" => $password
        ]);

        if ($request->input('admin') != null) {

            $user->assignRole("Admin");
            $user->removeRole("Student");
        } else {
            $user->removeRole("Admin");
            $user->assignRole("Student");
        }

        return redirect(route("profile.edit", $user->id));
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
