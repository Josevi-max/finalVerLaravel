<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class DataUsers extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user=null)
    {

        $this->user=$user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

     $user=isset($this->user)?$this->user:Auth::user();
        $data=[
            "names"=>["Clases restantes","Clases gastadas","Oportunidades"],
            "icons"=>["fas fa-user-alt","fas fa-car","fas fa-smile"],
            "values"=>[$user->nClases,$user->classesSpent,$user->examAttempts],
            "textColor"=>["text-primary","text-danger","text-warning"]
        ];
        
        return view('components.log.data-users',compact("data"));
    }
}
