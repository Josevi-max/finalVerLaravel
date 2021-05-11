<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class dataUsers extends Component
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
        $user=Auth::user();
        $theoric="Aprobado";
        if($user->theoricExamn==0){
            $theoric="Sin aprobar";
        }
        $data=[
            "names"=>["Clases restantes","Clases tomadas","Oportunidades","Examen teoríco"],
            "icons"=>["fas fa-user-alt","fas fa-car","fas fa-smile","far fa-file-alt"],
            "values"=>[$user->nClases,$user->classesSpent,$user->examAttempts,$theoric]
        ];

        

        return view('components.log.data-users',compact("data"));
    }
}
