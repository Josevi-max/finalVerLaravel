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
        $data=[
            
            "names"=>["Básico","Calidad/Precio","Completo"],
            "prices"=>["180€","300€","500€"],
            "texts"=>[
                "5 clases prácticas | 2 oportunidades exámen | Clases intensivas de 2 semanas",
                "10 clases prácticas | 2 oportunidades exámen | Clases intensivas de 2 semanas",
                "15 clases prácticas | 3 oportunidades exámen | Clases intensivas de 2 semanas"
                ]
        ];
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
