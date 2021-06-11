<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Index extends Component
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
        $infoPer=[
            "names"=>["B (coche)","A","A1","A2","AM"],
            "infos"=>[
            "Automóviles cuya masa máxima autorizada no exceda de 3.500 kg que estén diseñados y construidos para el transporte de no más de ocho pasajeros además del conductor.",
            "Autorizado para conducir motocicletas y triciclos de motor.",
            " El A1 está autorizado para motocicletas con una cilindrada máxima de 125 cm³.",
            "Motocicletas con una potencia máxima de 35 kW",
            "Para conducir ciclomotores de dos o tres ruedas y cuatriciclos ligeros."
            ]
            ];     
  


        return view('components.noLog.index',compact("infoPer"));
    }
}
