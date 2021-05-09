@extends('layouts.template_forms')
<main>
    <div class=" row mx-auto " id="form">
        
        <img src={{ asset('images/imgRegister.jpg') }} alt="Presentation">
        <app-template class="col-12 ">
@section('h2')
<h2 class="text-center">Registrate</h2>

@endsection
            @section('password2')
                
           
            <div class="form-group" id="password2">
                <label class="font-weight-bold">Repite tu contraseña:</label>
                <input type="password" class="form-control">
            </div>
            @endsection
            @section('button')
            <a href={{ route('login') }}><button type="submit" class="btn btn-primary mx-auto d-block mb-3"  routerLinkActive="router-link-active">Registrarse</button></a>
      
            @endsection
            

        </app-template>
    </div>
</main>