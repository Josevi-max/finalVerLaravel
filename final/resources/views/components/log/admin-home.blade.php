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


            <div class="d-flex justify-content-center mt-3 border-top pt-3 border-dark  pagination-sm">
                {!! $users->appends(request()->input())->onEachSide(1)->links() !!}
            </div>
        </main>

    @endsection
</x-app-layout>
