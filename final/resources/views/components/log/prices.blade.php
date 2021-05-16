<link rel="stylesheet" href="{{ asset('css/prices.css') }}">
<div class="mt-5  row ">

    @for ($i = 0; $i < count($infoPrices['icons']); $i++)


        <div class="col-lg-4 col-sm-12 card border-3">

            <div class="card-body">
                <h1 class="{{ $infoPrices['icons'][$i] }} col-12 text-center"></h1>

                <h2 class=" card-title bg-light border-bottom text-center text-uppercase">{{ $infoPrices['namePacks'][$i] }}
                    <h1 class="text-primary h1  text-center">{{ $infoPrices['prices'][$i] }}€</h1>

                </h2>
                <ul class="text-start">
                    <li class="fw-bold fs-5">{{ $infoPrices['dataA'][$i] }} clases prácticas</li>
                    <li class="fw-bold fs-5">{{ $infoPrices['dataB'][$i] }} oportunidades examen</li>
                    <li class="fw-bold fs-5"> {{ $infoPrices['dataC'][0] }}</li>
                </ul>

                <form action="{{ route('buy.store') }}" method="POST">
                    @csrf
                    <input type="submit" value="Comprar" class="btn btn-block btn-outline-primary d-block mx-auto">

                    <input type="hidden" name="nClases" value={{ $infoPrices['dataA'][$i] }}>
                    <input type="hidden" name="examAttempts" value={{ $infoPrices['dataB'][$i] }}>

                </form>
            </div>
        </div>
    @endfor
</div>
