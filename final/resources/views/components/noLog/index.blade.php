

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
            <h2 class=" text-center border-bottom col-12 mt-5"> Nuestras ofertas </h2>
            <x-prices/>



        </div>

 
