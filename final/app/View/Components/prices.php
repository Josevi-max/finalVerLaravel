<?php

namespace App\View\Components;

use Illuminate\View\Component;

class prices extends Component
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
        $infoPrices=[
            "namePacks"=>["Iniciado","Avanzado","Novel"],
            "icons"=>["far fa-grin-stars","fas fa-medal","fas fa-car"],
            "prices"=>[300,400,500],
            "dataA"=>[5,10,15],
            "dataB"=>[2,3,3],
            "dataC"=>["Semana de clases intensivas (teoríco)"]
            ];
        return view('components.log.prices',compact("infoPrices"));
    }
}
