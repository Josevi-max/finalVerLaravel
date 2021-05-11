<div class="mt-5  row ">

    @for ($i = 0; $i < count($infoPrices['icons']); $i++)


        <div class="col-lg-4 col-sm-12 card">

            <div class="card-body">
                <h1 class="{{ $infoPrices['icons'][$i] }} col-12 text-center"></h1>
                <h2 class=" card-title bg-light border-bottom text-center">{{ $infoPrices['namePacks'][$i] }}
                </h2>
                <h4 class="text-danger fs-1  text-center">{{ $infoPrices['prices'][$i] }}€</h4>
                <ul>
                    <li>{{ $infoPrices['dataA'][$i] }} clases prácticas</li>
                    <li>{{ $infoPrices['dataB'][$i] }} oportunidades examen</li>
                    <li>{{ $infoPrices['dataC'][0] }}</li>
                </ul>
                <form action="{{ route('buy.store') }}" method="POST">
                    @csrf
                    <input type="submit" value="Comprar" class="btn btn-primary mx-auto col-4 d-block">

                    <input type="hidden" name="nClases" value={{ $infoPrices['dataA'][$i] }}>
                    <input type="hidden" name="examAttempts" value={{ $infoPrices['dataB'][$i] }}>

                </form>
            </div>
        </div>
    @endfor
</div>
