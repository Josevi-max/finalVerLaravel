<!--Estilo-->
<link rel="stylesheet" href="{{ asset('css/header.css') }}" />

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container px-5">
        <a class="navbar-brand h1" href="/"><i class="fas fa-traffic-light"></i> AutoApp <i class="fas fa-traffic-light"></i></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if (Auth::user() && Auth::user()->hasRole('Student'))
                <div class="dropdown text-center">
                    <button class="btn text-light dropdown-toggle" type="text" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-tasks"></i><br>
                        Gestión
                    </button>
                    <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton1">
                        @for ($i = 0; $i < count($data['management']['texts']); $i++)
                            <li><a class="dropdown-item" href="{{ $data['management']['links'][$i] }}">
                                    <i class="{{ $data['management']['icons'][$i] }}"></i><br>
                                    {{ $data['management']['texts'][$i] }}</a></li>

                        @endfor
                    </ul>
                </div>


            @endif
            @for ($i = 0; $i < count($data['icons']); $i++)

                <li class="nav-item ">
                    <a class="nav-link text-light btn   {{ $i + 1 == count($data['icons']) && !Auth::user() ? 'btn-primary ' : 'hover' }} "
                        href={{ $data['links'][$i] }}><i class="{{ $data['icons'][$i] }}"></i> <br>
                        {{ $data['texts'][$i] }}</a>
                </li>

            @endfor


            @if (Auth::user())

                <div class="dropdown btnUser">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i><br>
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton1">
                        <li> <a class="dropdown-item" href='{{ route('profile.edit', Auth::user()->id) }}'><i
                                    class="fas fa-info-circle"></i><br> Tus datos</a>
                        </li>
                        <li class="dropdown-item">
                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                        <li href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt"></i><br>
                            Cerrar sesión
                        </li>
                        </form>
                        </li>
                    </ul>
                </div>

            @endif
            </ul>
        </div>
    </div>
</nav>

