<link rel="stylesheet" href={{ asset('css/index_log.css') }}>
<main>
    <div class="text">
        <h1 class=" lead display-3 p-1 mt-5 ">¿A donde iremos hoy {{ Auth::user()->name }}?</h1>


        <div class=" row mt-5">
            @for ($i = 0; $i < count($data['icons']); $i++)
                <div class="col-lg-6 col-12 p-5 border hover">

                    <i class="{{ $data['icons'][$i] }} fa-2x"></i>
                    <h2 class=" lead display-6">{{$data["names"][$i]}}</h2>
                    <p class="lead">{{ $data['texts'][$i] }}</p>
                    <a href="{{ $data['links'][$i] }}"> <button class="btn btn-primary">Acceder</button></a>
                </div>
            @endfor

        </div>

    </div>
</main>
