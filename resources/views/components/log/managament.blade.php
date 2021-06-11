<link rel="stylesheet" href="{{ asset('css/management.css') }}">
<x-app-layout>
    @section('body')


        @php
            $date = date('Y-m-d');
            function actualDate()
            {
                date_default_timezone_set('Europe/Madrid');
                $actualDate = date('Y-m-d H:i');
                return $actualDate;
            }
        @endphp

        <div class="container pt-5">

            @if (!is_null(session('management')))
                @if (session('management') == 'true')
                    <div class="alert alert-success mt-5" role="alert">
                        Los datos se han gestionado de manera correcta, gracias por confiar en nosotros
                    </div>
                @else
                    <div class="alert alert-danger mt-5" role="alert">
                        {!! session('management') !!}
                    </div>
                @endif
            @endif




            <div class=" py-5 pt-5">
                <header class="text-center">
                    <h1 class="display-4 font-weight-bold">Organización</h1>
                    <p class="font-italic text-muted mb-0">Adapta tu día a día de clases o trabajo a la perfección
                        utilizando
                        nuestro sistema de gestión de clases</p>

                </header>
            </div>



            <div class="row mb-5">

                <form action=" {{ route('management.store') }}" method="POST">
                    @csrf
                    <div class="col-md-6 mx-auto">
                        <div class="py-4 text-center"><i class="fa fa-calendar fa-5x"></i></div>

                        <div class="col-sm-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <div class="input-group date" id="fecha" data-target-input="nearest">

                                    <input type="datetime-local" id="date" name="date" min='{{ $date . 'T00:00' }}'
                                        class="form-control" style="height:3rem ">
                                </div>
                            </div>
                        </div>


                        <div class="text-center pt-3">

                            <input type="submit"
                                class="btn btn-primary btn-sm px-4 rounded-pill text-uppercase font-weight-bold shadow-sm"
                                value="Confirmar reserva">
                        </div>
                    </div>
                </form>
            </div>
            <x-data-users />
            <div class="row   mt-5 mb-5  g-4">
                <div class="col-lg-6 col-sm-12">
                    <div class="  card h-100   ">
                        <div class="card-header bg-white">
                            <h3 class="h5 text-uppercase font-weight-semi-bold mb-0 p-2 "><i
                                    class="far fa-star text-primary"></i> Tus proxímas clases</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush ">
                                @if (isset($dateClass))
                                    @for ($i = 0; $i < count($dateClass); $i++)
                                        @php
                                            $class = $dateClass[$i]->dayClass;
                                            $actualDate = actualDate();
                                        @endphp
                                        @if ($actualDate < $class) <li class="list-group-item blockquote border-bottom "><i
                                                    class="far fa-clock text-success"></i> {{ date('d-m-Y H:i', strtotime($class)) }}
                                            </li> @endif @endfor

                                    @endif


                            </ul>

                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="  card h-100    ">
                        <div class="card-header bg-white">
                            <h3 class="h5 text-uppercase font-weight-semi-bold mb-0 p-2 "><i
                                    class="fas fa-exclamation-triangle text-warning pr-2"></i> Fechas ocupadas </h3>

                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush ">
                                @if (isset($otherClass))
                                    @for ($i = 0; $i < count($otherClass); $i++)
                                        @php
                                            $class = $otherClass[$i]->dayClass;
                                            $actualDate = actualDate();
                                        @endphp
                                        @if ($actualDate < $class) <li
                                            class="list-group-item blockquote border-bottom "><i
                                            class="far fa-clock text-danger"></i>
                                            {{ date('d-m-Y H:i', strtotime($class)) }}
                                            </li> @endif @endfor

                                    @endif


                            </ul>

                        </div>

                    </div>
                </div>
            </div>


        </div>




        <script src="{{ asset('js/management.js') }}"></script>
    @endsection

</x-app-layout>
