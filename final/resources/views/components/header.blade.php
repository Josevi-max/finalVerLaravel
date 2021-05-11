
<!--Estilo-->
 <link rel="stylesheet" href="{{ asset('css/header.css') }}" />

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 fixed-top " id="nav">
    <a class="navbar-brand col-lg-8 m-2" href="/"><i class="fas fa-traffic-light  fa-1x"></i> AutoApp</a>

    <button class="navbar-toggler" type="button" " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      &#9776;
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  ">
        
            @for ($i = 0; $i < count($data["icons"]); $i++)
            
            <li class="nav-item ">
                <a class="nav-link text-light btn hover " href={{$data["links"][$i]}} ><i class="{{$data["icons"][$i]}}"></i> <br> {{$data["texts"][$i]}}</a>
            </li> 
          
            @endfor
            @if (Auth::user())
       
                  <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

             <li class="nav-link text-light btn hover" href="{{ route('logout') }}"onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="fas fa-sign-out-alt"></i><br>
                Cerrar sesión
             </li>    
            </form>   
     

            @endif

        </ul>
    </div>
</nav>

