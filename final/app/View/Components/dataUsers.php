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
        
        $data=[
            "names"=>["Clases restantes","Clases gastadas","Oportunidades"],
            "icons"=>["fas fa-user-alt","fas fa-car","fas fa-smile"],
            "values"=>[$user->nClases,$user->classesSpent,$user->examAttempts],
            "textColor"=>["text-primary","text-danger","text-warning"]
        ];

        

        return view('components.log.data-users',compact("data"));
    }
}
