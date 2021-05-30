<link rel="stylesheet" href={{ asset('css/buy.css') }}>

<x-app-layout>

    @section('body')

        <main class=" container  mt-5">
            @if ($hecho)
            <div class="alert alert-success" role="alert">
                La compra se realizó con exito y ya se ha añadido a su número de clases restantes
              </div>   
            @endif
             
            
            


            <div class="row">


                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('images/buyDecotarion.png') }}" alt="..." class="w-75">
                        </div>
                        <div class="col-md-8">
                            <h1 class=" card-header">Clases individuales</h1>
                            <div class="card-body">
                                <h5 class="card-title">Por tan solo 29€</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas
                                    laudantium at, commodi quisquam quidem incidunt similique, reprehenderit libero cumque
                                    ea quam error optio. Maxime atque, voluptatum animi temporibus autem impedit.</p>
                                <form action="{{ route('buy.store') }}" class="text-center" method="POST">
                                    @csrf
                                    <div class="input-group ">
                                    <input type="number"  class="form-control " value="1" name="nClases" min="0">
                                    <input type="submit" class="btn btn-primary fas" value="Comprar">
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
