<link rel="stylesheet" href={{ secure_asset('css/buy.css') }}>
<x-app-layout>
    @section('body')
        <main class=" container  mt-5">
            @if (isset($hecho))
                @if ($hecho)
                    <div class="alert alert-success" role="alert">
                        La compra se realizó con exito y ya se ha añadido a su número de clases restantes
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        Vaya parece que algo fue mal
                    </div>
                @endif
            @endif
            <div class="row ">
                <div class="card mb-3">
                    <div class="row ">
                        <div class="col-md-4">
                            <img src="{{ asset('images/buyDecotarion.png') }}" alt="..." class="w-75">
                        </div>
                        <div class="col-md-8 ">
                            <h1 class=" card-header bg-primary text-light">Clases individuales</h1>
                            <div class="card-body pr-0">
                                <h5 class="card-title">Por tan solo 29€</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas
                                    laudantium at, commodi quisquam quidem incidunt similique, reprehenderit libero cumque
                                    ea quam error optio. Maxime atque, voluptatum animi temporibus autem impedit.</p>
                                <form action="{{ route('buy.store') }}" class="text-center" method="POST">
                                    @csrf
                                    <div class="input-group ">
                                        <input type="number" id="amount" class="form-control " value="1" name="nClases"
                                            min="1">
                                        <input type="submit" id="buy" class=" btn btn-primary fas" value="Comprar" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <x-data-users />
                <h1 class="text-center mt-3 border-bottom">Packs de clases</h1>
                <x-prices />
            </div>
        </main>
        <script src="{{ asset('js/buy.js') }}"></script>
    @endsection
</x-app-layout>
