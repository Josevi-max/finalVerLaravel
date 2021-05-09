<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
      if(Auth::user()){
        $data=["links"=>["dashboard","#"],
        "texts"=>["Principal","Contactanos"],
        "icons"=>["fas fa-home","fas fa-file-signature"]];
      }else{
        $data=["links"=>["/","register","login"],
        "texts"=>["Contactanos","Registrate","Iniciar sesión"],
        "icons"=>["fas fa-file-signature","far fa-user-circle","far fa-id-card"]];
      }
        return view('components.header',compact("data"));
    }
}
