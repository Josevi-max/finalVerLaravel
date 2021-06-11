<link rel="stylesheet" href="{{ secure_asset('css/valorations.css') }}">
<x-app-layout>
    @section('body')

        <br><br>
        <header class="py-5 text-white border-bottom mb-4 ">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Bienvenido a las valoraciones de {{ $user[0]->name }} </h1>
                    <p class="lead mb-0">Aprovecha si tienes tiempo para ponerle una nota</p>
                </div>
            </div>
        </header>
        <div class="container ">
            <div class="row">

                @if (session('enviado'))
                    @if (session('enviado') == 'true')
                        <div class="alert alert-success text-center" role="alert">
                            Los datos se agregaron correctamente
                        </div>
                    @else
                        <div class="alert alert-danger text-center" role="alert">
                            Parece que algo fallo, es posible que no estes a cargo de este usuario
                        </div>
                    @endif
                @endif
                <form action="{{ route('valoration.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-5">
                                <div class="card-header">
                                    Incorporación y preparaciones <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <div class="card-body">
                                    @for ($i = 0; $i < 4; $i++)

                                        <div class="mb-3 ">
                                            <label class="form-label">{{ $info['name'][$i] }}</label>

                                            <input type="number" class="form-control" name={{ $info['type'][$i] }}
                                                max="10" min="0"
                                                value={{ isset($valorations[0]) ? $valorations[0][$info['type'][$i]] : '' }}>

                                        </div>

                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-5">
                                <div class="card-header">
                                    Maniobras <i class="fas fa-compress"></i>
                                </div>
                                <div class="card-body">
                                    @for ($i = 4; $i < 10; $i++)

                                        <div class="mb-3 ">
                                            <label class="form-label">{{ $info['name'][$i] }}</label>

                                            <input type="number" class="form-control" name={{ $info['type'][$i] }}
                                                max="10" min="0"
                                                value={{ isset($valorations[0]) ? $valorations[0][$info['type'][$i]] : '' }}>

                                        </div>

                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-5">
                                <div class="card-header">
                                    Control vehiculo <i class="fas fa-car-crash"></i>
                                </div>
                                <div class="card-body">
                                    @for ($i = 10; $i < count($info['name']) - 1; $i++)

                                        <div class="mb-3 ">
                                            <label class="form-label">{{ $info['name'][$i] }}</label>

                                            <input type="number" class="form-control" name={{ $info['type'][$i] }}
                                                max="10" min="0"
                                                value={{ isset($valorations[0]) ? $valorations[0][$info['type'][$i]] : '' }}>

                                        </div>

                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="col mt-5 bg-white border p-5">
                            <label class="form-label">{{ $info['name'][count($info['name']) - 1] }}</label>
                            <textarea class="form-control" name="{{ $info['type'][count($info['name']) - 1] }}"
                            rows="3">{{ isset($valorations[0]) ? $valorations[0][$info['type'][count($info['name']) - 1]] : '' }}</textarea>
                        </div>
                    </div>
                    <input type="hidden" name="teacherId" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="studentId" value="{{ $user[0]->id }}">
                    <input type="submit" class="btn btn-primary mt-5 mb-5 mx-auto d-block" value="Valorar">
                </form>
            </div>
        </div>
    @endsection
</x-app-layout>
<script type="text/javascript" src="{{ asset('js/checkNotes.js') }}">


</script>
