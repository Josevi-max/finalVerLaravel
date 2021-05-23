<?php

namespace App\Http\Controllers;

use App\Mail\ContactMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("emails.formEmail");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enviado="Mensaje enviado, nuestro personal le contestara en el menor tiempo posible";
        $request->validate([
            "contactEmail" => "required|email",
            "message" => "required"
        ]);
    
        $mail= new ContactMailable($request->all()); 

        Mail::to($request->contactEmail)->send($mail);
        
        return view("emails.formEmail",compact("enviado"));
    }

  
}
