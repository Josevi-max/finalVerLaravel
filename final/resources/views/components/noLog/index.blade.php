

<link rel="stylesheet" href={{ asset('css/index_nolog.css') }}>


        <div id="presentation">
            <h1 class="text-center text-light mt-3 border-bottom">Aprende a conducir y disfruta</h1>
         <a href={{ route('register') }}>   <button class="btn btn-primary d-block mx-auto mt-4 " >   Unete a nosotros</button></a>


        </div>
        <div class="container">
            <div class="mt-5  row">


                <div class="col-lg-6 col-12">
                    <h2 class="border-bottom">¿Quienes somos?</h2>
                    <p class="text-muted">Somos una autoescuela con más de 40 años en la educación de nuevos
                        conductores. Nuestro método de enseñanza está avalado por todos nuestros alumnos que han logrado
                        el éxito con nuestra formación. <br> <br>Disponemos de las mejores instalaciones
                        y los mejores vehículos para asegurarnos que la experiencia con nosotros sea la mejor posible.
                        <br><br> Ponte en nuestras manos y conviértete en un conductor de calidad.</p>
                </div>

                <img src="{{ asset('images/WhoAreMe.jpg') }}" alt="whoAreMe" class="col-lg-6 col-12">

            </div>
            <div class="mt-5 text-center  row">


                <div class="col-12">
                    <h2 class="border-bottom ">Permisos y cursos</h2>

                    <p class="text-muted">Porque con tus ganas sumada a nuestra experiencia y calidad en la formación
                        podrás lograrlo, elige tu permiso de conducir y obtenlo ya</p>
                </div>
                <div class="col-12 col-lg-6">
                    
                    @for ($i = 0; $i < count($infoPer['names']); $i++)
                        <ul class="text-left text-muted">
                            <li>{{ $infoPer['names'][$i] }}: {{ $infoPer['infos'][$i] }}</li>

                        </ul>
                    @endfor


                </div>

                <img src="{{ asset('images/whoeAreMe.jpg') }}" alt="whoAreMe" class="col-lg-6 col-12  ">

            </div>
            <div class="mt-5  row ">
                <h2 class=" text-center border-bottom col-12 mb-3"> Nuestras ofertas </h2>
                @for ($i = 0; $i < count($infoPrices['icons']); $i++)

           
                <div class="col-lg-4 col-sm-12 card">

                    <div class="card-body">
                        <h1 class="{{ $infoPrices['icons'][$i] }} col-12 text-center"></h1>
                        <h2 class=" card-title bg-light border-bottom text-center">{{ $infoPrices['namePacks'][$i] }}
                        </h2>
                        <h4 class="text-danger fs-1  text-center">{{ $infoPrices['prices'][$i] }}€</h4>
                        <ul>
                            <li>{{ $infoPrices['dataA'][$i] }}</li>
                            <li>{{ $infoPrices['dataB'][$i] }}</li>
                            <li>{{ $infoPrices['dataC'][0] }}</li>
                        </ul>

                        <a href="# " class="btn btn-primary mx-auto col-4 d-block">Comprar</a>
                    </div>
                </div>
                @endfor
            </div>



        </div>

 
