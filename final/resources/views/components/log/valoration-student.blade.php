<link rel="stylesheet" href="{{ asset('css/evaluation.css') }}">
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
    @case( $note < 4)
        {{ $image = 'images/badProgress.png' }}
    @break
    @case($note<7) {{ $image = 'images/neutralProgress.png' }} @break
@default {{ $image = 'images/goodProgress.png' }} @endswitch <x-app-layout>
@section('body')


    <div id="presentation">

        <h1 id="title" class="mt-5 text-center border-bottom">Bienvenido a la sección de evaluaciones
        </h1>
        <p class="fs-5 text-center">Aquí podras revisar tu progreso, recibir consejos valiosos de tu profesor, así como
            hacerte una idea de cuan preparado vas para el examen</p>
        <img id="img" src="{{ asset($image) }}" alt="" class="mx-auto d-block ">

    </div>
    @if (isset($data[0]))
        <div class="col-sm-10 col-lg-6 col-sm-6 mx-auto   mt-3">
            <h1 class="border-bottom text-center mb-5">Notas individuales</h1>

            @foreach ($data[0] as $key => $value)
                @switch($value)
                    @case($value<5)
                        @php
                            $color = 'bg-danger';
                            
                        @endphp
                    @break
                    @case($value<8) @php
                        $color = 'bg-warning';
                    @endphp @break @default
                            @php
                                $color = 'bg-success';
                            @endphp @endswitch @if ($value != 0 && !str_contains($key, 'Id') && !str_contains($key, 'id') && $key != 'note')

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
                                    'sideShift' => 'Giros',
                                    'overTaking' => 'Adelantamientos',
                                    'lights' => 'Luces',
                                ];
                                
                            @endphp

                            <div>
                                <label class="form-label col-11 fs-4">{{ $translation[$key] }}</label>
                                <label class="form-label col fs-4">{{ $value }}</label>

                                <div class="progress mt-3 mb-3" style="height: 20px;">
                                    <div class="progress-bar {{ $color }} " role="progressbar"
                                        style="width:{{ $value * 10 }}%" aria-valuenow="10" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>

                            </div>
                    @endif
            @endforeach
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Comentarios</h2>

                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        {{ $data[0]->comments }}
                    </blockquote>
                </div>
            </div>
            </div>
            @endif
        @endsection
    



        </x-app-layout>
