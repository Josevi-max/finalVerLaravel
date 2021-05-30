<link rel="stylesheet" href={{ asset('css/buy.css') }}>

<x-app-layout>
    @section('body')

        <main class="container">
            <div class=" pt-5">
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
            </div>
            <div class="row">
                @foreach ($users as $item)
                    @if (Auth::user()->id != $item->id)
                        <div class="card-group col-12 col-sm-4">
                            <div class="card  text-dark bg-light mb-3 ">
                                <div class="card-header text-start">#{{ $item->id }} <span
                                        class="float-end">{{ $item->name }}</span> </div>
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

            {!! $users->appends(request()->input())->links() !!}
            <!-- Enlace para abrir el modal -->
            <!-- Trigger the modal with a button -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary openBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Valoraciones de Usuario anonimo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>

                    </div>
                </div>
            </div>




            <!-- 
                                                                        <table class="table table-hover table-bordered text-center ">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col">Id</th>
                                                                                    <th scope="col">Nombre</th>
                                                                                    <th scope="col">Email</th>
                                                                                    <th scope="col" colspan="2">Acciones</th>



                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                                @foreach ($users as $item)
                                                                                    @if (Auth::user()->id != $item->id)

                                                                                        <tr>
                                                                                            <th>{{ $item->id }}</th>
                                                                                            <td>{{ $item->name }}</td>
                                                                                            <td>{{ $item->email }}</td>
                                                                                            <td>
                                                                                                <a href="{{ route('profile.edit', $item->id) }}">
                                                                                                    <button class="btn btn-primary">Editar</button>
                                                                                                </a>
                                                                                            </td>
                                                                                            <td>
                                                                                                <a href={{ route('valoration.create', ['id' => $item->id]) }}>
                                                                                                    <button class="btn btn-success">Valorar</button>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach

                                                                            </tbody>

                                                                        </table>
                                                                        <div class="mx-auto d-block col-12 ">

                                                                            {!! $users->appends(request()->input())->links() !!}

                                                                        </div>
                                                                        -->
        </main>
        <script>
            $('.openBtn').on('click', function() {
                $('.modal-body').load("{{ route('valoration.create', ['id' => 8]) }} ", function() {
                    $('#myModal').modal({
                        show: true
                    });
                });
            });

        </script>
    @endsection
</x-app-layout>
