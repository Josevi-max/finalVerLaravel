<link rel="stylesheet" href={{ asset('css/buy.css') }}>
<x-app-layout>
    @section('body')
        <main class="container">
            <div class=" pt-5 pb-5">
                <div class="row pt-5 row">
                    <h2 class="col-8 text-start ">Administración</h2>
                    <h2 class="col-3 text-end">Usuarios {{ $nUsers }}</h2>
                </div>
                <form action="{{ route('dashboard.admin') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Buscar usuarios">
                        <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                </form>
                <form action="{{ route('dashboard.admin') }}" method="GET" class="col-6 d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Mis alumnos</button>
                    <input type="hidden" name="myStudents" value="true">
                </form>
                <form action="{{ route('dashboard.admin') }}" method="GET" class="col-6 d-inline">
                    @csrf
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="btn btn-outline-success">Proxímas clases</button>
                    <input type="hidden" name="myClass" value="true">
                </form>
            </div>
            <div class="row">
                @foreach ($users as $item)
                    @if (Auth::user()->id != $item->id)
                        <div class="card-group col-12 col-sm-4">
                            <div class="card  text-dark bg-light mb-3 ">
                                <div
                                    class="card-header {{ !App\Models\User::find($item->id)->hasRole('Student') ? 'bg-primary text-white' : '' }}  text-start">
                                    #{{ $item->id }} <span class="float-end">{{ $item->name }}</span> </div>
                                <div class="card-body">
                                    <h5 class="card-text">{{ $item->email }}</h5>
                                    <a href="{{ route('profile.edit', $item->id) }}">
                                        <button class="btn btn-primary">Editar</button>
                                    </a>
                                    <a href={{ route('valoration.create', ['id' => $item->id]) }}>
                                        <button class="btn btn-success">Valorar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-3 border-top pt-3 border-dark  pagination-sm">
                {!! $users->appends(request()->input())->onEachSide(1)->links() !!}
            </div>
        </main>

    @endsection

</x-app-layout>

<!-- Modal -->
<div class="modal fade  modal-dialog-scrollable" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tus próximas clases</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Alumno</th>
                        <th scope="col">Email</th>
                        <th scope="col">Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($nextClass); $i++)
                        <tr>
                            <td>{{App\Models\User::find($nextClass[$i]->studentId)->name}}</td>
                            <td>{{App\Models\User::find($nextClass[$i]->studentId)->email}}</td>
                            <td> {{$nextClass[$i]->dayClass}}</td>
                          </tr>
                        @endfor
                       
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
