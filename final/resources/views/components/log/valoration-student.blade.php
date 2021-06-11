<link rel="stylesheet" href="{{ secure_asset('css/evaluation.css') }}">
@php
$note = -1;

if (isset($data[0]->note)) {
    $note = $data[0]->note;
}

@endphp
@switch($note)
    @case($note===-1)
        {{ $image = 'images/noProgress.png' }}
    @break
    @case( $note < 5)
        {{ $image = 'images/badProgress.png' }}
    @break
    @case($note<8) {{ $image = 'images/neutralProgress.png' }}
     @break
@default {{ $image = 'images/goodProgress.png' }} @endswitch <x-app-layout>
@section('body')
    <header class="py-5 text-white border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Bienvenido a la sección de evaluaciones</h1>
                <p class="lead mb-0">Aquí podras revisar tu progreso, recibir consejos valiosos de tu profesor, así como
                    hacerte una idea de cuan preparado vas para el examen</p>
                <img id="img" src="{{ secure_asset($image) }}" alt="" class="mx-auto d-block mt-5">
            </div>
        </div>
    </header>
    @if (isset($data[0]))
        <div class="container">
             <div class="row">
                    <div class="col-lg-8 mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h3><i class="fas fa-book-reader"></i> Tus calíficaciones</h3>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach ($data[0] as $key => $value)
                                @switch($value)
                                @case($value<5)
                                    @php
                                        $color = 'bg-danger';
                                    @endphp
                                @break
                                @case($value<8)
                                 @php
                                    $color = 'bg-warning';
                                @endphp 
                                @break
                                 @default
                                        @php
                                            $color = 'bg-success';
                                        @endphp 
                                        @endswitch
                                         @if ($value != 0 && !str_contains($key, 'Id') && $key!='id' && $key != 'note' && $key!="comments")
                                        @php
                                            $translation = [
                                                'incorporationCirculation' => 'Incorporación a la circulación',
                                                'intersections' => 'Intersecciones',
                                                'changeDirection' => 'Cambio de dirección',
                                                'stops' => 'Paradas',
                                                'parking' => 'Aparcamientos',
                                                'obedienceSigns' => 'Obediencia de las señales',
                                                'controlsOperation' => 'Control de los mandos',
                                                'otherControls' => 'Otros controles',
                                                'safeDriving' => 'Conducción segura',
                                                'preliminaryChecks' => 'Comprobaciones prevías',
                                                'installationVehicle' => 'Instalación en el vehiculo',
                                                'normalProgression' => 'Progresión normal',
                                                'sideShift' => 'Desplazamiento lateral',
                                                'overTaking' => 'Adelantamientos',
                                                'lights' => 'Luces',
                                            ];
                                        @endphp
                                        <li class="list-group-item">
                                            
                                            <label class=" form-label col-11 fs-4">{{ $translation[$key] }}</label>
                                            <label class="form-label col fs-4">{{ $value }}</label>
                                            <div class="progress mt-3 mb-3" style="height: 20px;">
                                                <div class="progress-bar {{ $color }} " role="progressbar"
                                                    style="width:{{ $value * 10 }}%" aria-valuenow="10" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h3>Comentarios <i class="far fa-comment-dots"></i></h3>
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    {{ $data[0]->comments }}
                                </blockquote>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>
    @else
            <section id="about">
                <div class="container px-4">
                    <div class="row gx-4 justify-content-center">
                        <div class="col-lg-8">
                            <h2><i class="fas text-warning fa-exclamation-triangle"></i> Sin evaluaciones <i
                                    class="text-warning fas fa-exclamation-triangle"></i></h2>
                            <p class="lead">En este momento su profesor no ha realizado ninguna evaluación, de todos modos no te
                                desanimes y aprovecha para prepararte bien las clases, aquí te dejamos algunos consejos útiles:
                            </p>
                            <ul>
                                <li>Cuando cambies de marcha no mires a la palanca de cambios para saber en qué marcha estás.
                                </li>
                                <li>Pon las luces de cruce al entrar en túneles y pasos inferiores largos.</li>
                                <li>Un truco: puedes ir cantando en tu cabeza las señales que vayas viendo a lo lejos para
                                    concentrarte en lo que visualizas. Agudizarás tu concentración.</li>
                                <li>No cruces los brazos al volante.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
    @endif
      
               
    
@endsection
</x-app-layout>