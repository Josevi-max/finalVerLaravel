<?php

namespace App\View\Components;

use Illuminate\View\Component;

class indexLog extends Component
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
        "icons"=>["fas fa-credit-card","fas fa-calendar-week","fas fa-check-square","fas fa-chalkboard-teacher"],
        "names"=>["Adquirir clases","Organización","Evaluación","Repasa en casa"],
        "texts"=>[
            "¿Te estas quedando sin clases? !!corre!! aprovecha la multitud de ofertas y oportunidades antes de que se agotén",
            "¿Semana ajetreada de examenes o trabajos?¿Tiempo justo para cada clase de la semana? No te preocupes más por que ahora puedes reservar que día de la semana quieres dar tu clase con un par de simples clicks",
            "Supervisa tus progresos y avances al volante, conoce en detalle tus puntos fuertes y debiles así como las recomendaciones de tu profesor",
            "¿Tienes miedo de que se te olvide algo visto en la clase de hoy?¿No te quedo algo claro durante tu clase? No pasa nada, ahora puedes repasar de manera gratuita cada maniobra posible al volante o las normas de tráfico"
        ],
        "links"=>[
            "buy/create",
            "",
            "evaluation",
            "https://www.youtube.com/channel/UC0I1TYP76RP3E5m2dN07xQQ"
        ]
        ];


        return view('components.log.index-log',compact("data"));
    }
}
