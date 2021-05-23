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
          "links" => [route("dashboard"), route("profile.edit",Auth::user()->id), route("contact.index")],
          "texts" => ["Panel", "Tu datos", "Contactanos"],
          "icons" => ["fas fa-home", "fas fa-info-circle", "fas fa-file-signature"]
        ];
      } else {
        $data = [
          "links" => [route("dashboard.admin"), route("profile.edit",Auth::user()->id)],
          "texts" => ["Alumnos", "Tu datos"],
          "icons" => ["fas fa-user-graduate", "fas fa-info-circle"]
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
