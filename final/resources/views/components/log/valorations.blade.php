<x-app-layout>
    @section('body')

        <br><br>
        <h1 class="text-center mt-5">Estas dentro de las valoraciones del usuario {{ $user[0]->name }} </h1>
        @if (session('enviado'))
            @if (session('enviado')=="true")
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
            @for ($i = 0; $i < count($info['name']); $i++)

                <div class="mb-3">
                    <label class="form-label">{{ $info['name'][$i] }}</label>
                    @if ($i + 1 != count($info['name']))
                        <input type="number" name={{ $info['type'][$i] }} max="10" min="0"
                            value={{ isset($valorations[0]) ? $valorations[0][$info['type'][$i]] : '' }}>
                    @else
                        <textarea class="form-control" name="{{ $info['type'][$i] }}"
                            rows="3">{{ isset($valorations[0]) ? $valorations[0][$info['type'][$i]] : '' }}</textarea>
                    @endif
                </div>

            @endfor



            <input type="hidden" name="teacherId" value="{{ Auth::user()->id }}">

            <input type="hidden" name="studentId" value="{{ $user[0]->id }}">

            <input type="submit" value="Confirmar">
            @if (isset($can))
                <p>{{var_dump($can) }}</p>
            @endif
        </form>

    @endsection
</x-app-layout>
<script type="text/javascript" src="{{ asset('js/checkNotes.js') }}">


</script>
