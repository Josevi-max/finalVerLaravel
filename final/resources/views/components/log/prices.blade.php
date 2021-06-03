<div class="mt-5  row row-cols-1 row-cols-md-3 g-4  text-center">
    @for ($i = 0; $i < count($infoPrices['icons']); $i++)
        <div class="col-lg-4 col-sm-12  ">
            <div class=" card {{$i!=2 ?'':'border-primary'}} ">
                <div class="card-header {{$i!=2 ?'':'bg-primary text-light'}}">
                    <h2 class="text-center text-uppercase">
                        {{ $infoPrices['namePacks'][$i] }}
                    </h2>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">{{ $infoPrices['prices'][$i] }}€</h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li >{{ $infoPrices['dataA'][$i] }} clases prácticas</li>
                        <li >{{ $infoPrices['dataB'][$i] }} oportunidades examen</li>
                        <li > {{ $infoPrices['dataC'][0] }}</li>
                    </ul>

                    <form action="{{ route('buy.store') }}" method="POST">
                        @csrf
                        <input type="submit" value="Comprar" id="pack_{{ $infoPrices['namePacks'][$i] }}" class="w-100 btn btn-lg {{$i==0?'btn-outline-primary':'btn-primary'}} " onclick="return confirm('Estas a punto de comprar el pack de clases {{ $infoPrices['namePacks'][$i] }} por un valor de  {{ $infoPrices['prices'][$i] }} €')">
                        <input type="hidden" name="nClases" value={{ $infoPrices['dataA'][$i] }}>
                        <input type="hidden" name="examAttempts" value={{ $infoPrices['dataB'][$i] }}>
                    </form>
                </div>
            </div>
        </div>
    @endfor
</div>