<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Footer extends Component
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
      
        $contactData=["types"=>["Dirección","Teléfono","Email"],
        "infos"=>["Av. de Carlos III, 380, 04720 Aguadulce, Almería","950 04 02 08","josevi@autoapp.com"]];

        $socialNetworks=["icons"=>["fab fa-facebook","fab fa-twitter"],
        "links"=>["https://es-es.facebook.com/autoescuelaquiros/","https://twitter.com/autoescuelalara?lang=es"]];

        return view('components.footer',compact("socialNetworks","contactData"));
    }
}
