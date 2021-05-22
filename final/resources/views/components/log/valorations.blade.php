
<x-app-layout>
    @section('body')

        <br><br>
        <h1 class="text-center mt-5">Estas dentro de las valoraciones del usuario {{ $user[0]->name }} </h1>

        <form action="{{ route('valoration.store') }}" method="POST" >
            @csrf
            <div class="mb-3">
                <label class="form-label"> Comprobaciones previas</label>
                <input type="number" name="preliminaryChecks" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->preliminaryChecks : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label"> Instalación en el vehiculo</label>
                <input type="number" name="installationVehicle" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->installationVehicle : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label"> Incorporación a la circulación</label>
                <input type="number" name="incorporationCirculation" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->incorporationCirculation : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label">Progresión normal</label>
                <input type="number" name="normalProgression" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->normalProgression : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label"> Desplazamiento lateral</label>
                <input type="number" name="sideShift" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->sideShift : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label"> Adelantamientos</label>
                <input type="number" name="overTaking" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->overTaking : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label">Intersecciones</label>
                <input type="number" name="intersections" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->intersections : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label"> Cambio de sentido</label>
                <input type="number" name="changeDirection" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->changeDirection : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label"> Paradas</label>
                <input type="number" name="stops" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->stops : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label"> Estacionamientos</label>
                <input type="number" name="parking" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->parking : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label"> Obediencia de las señales</label>
                <input type="number" name="obedienceSigns" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->obedienceSigns : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label">Utilización de las luces</label>
                <input type="number" name="lights" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->lights : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label"> Manejo de los mandos</label>
                <input type="number" name="controlsOperation" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->controlsOperation : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label">Otros controles</label>
                <input type="number" name="otherControls" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->otherControls : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label"> Conducción seguro </label>
                <input type="number" name="safeDriving" max="10" min="0"
                    value={{ isset($valorations[0]) ? $valorations[0]->safeDriving : '' }}>
            </div>
            <div class="mb-3">
                <label class="form-label"> Comentarios </label>
                <textarea class="form-control" name="comments"
                    rows="3">{{ isset($valorations[0]) ? $valorations[0]->comments : '' }}</textarea>
            </div>
            <input type="hidden" name="teacherId" value="{{ Auth::user()->id }}">

            <input type="hidden" name="studentId" value="{{ $user[0]->id }}">

            <input type="submit" value="Confirmar" >
        </form>
    @endsection
</x-app-layout>
<script type="text/javascript" src="{{ asset('js/checkNotes.js') }}">
    

</script>


