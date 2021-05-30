<?php

namespace App\View\Components;

use App\Models\User;
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


    if (Auth::user()) {
      //Saco el nombre del rol del usuario que esta ctualmente autentificado
      $userb = User::with('roles')->where('id', Auth::user()->id)->first();

      $role = $userb->roles->first()->name;
      if ($role == 'Student') {
        $data = [
          "links" => [route("dashboard"),  route("contact.index")],
          "texts" => ["Panel", "Contactanos"],
          "icons" => ["fas fa-home",  "fas fa-file-signature"],
          "management" => [
            "texts" => ["Clases", "Organización", "Evaluación", "Multimedía"],
            "icons" => ["fas fa-credit-card", "fas fa-calendar-week", "fas fa-check-square", "fas fa-chalkboard-teacher"],
            "links" => [
              route("buy.create"),
              route("management.create"),
             route("evaluation.index"),
              "https://www.youtube.com/channel/UC0I1TYP76RP3E5m2dN07xQQ"
            ]
          ]
        ];
      } else {
        $data = [
          "links" => [route("dashboard.admin")],
          "texts" => ["Alumnos"],
          "icons" => ["fas fa-user-graduate"]
        ];
      }
    } else {
      $data = [
        "links" => [route("contact.index"), "register", "login"],
        "texts" => ["Contactanos", "Registrate", "Iniciar sesión"],
        "icons" => ["fas fa-file-signature", "far fa-user-circle", "far fa-id-card"]
      ];
    }
    return view('components.header', compact("data"));
  }
}
