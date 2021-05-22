<link rel="stylesheet" href={{ asset('css/buy.css') }}>

<x-app-layout>
    @section('body')
    
        <main class="container">
            <h1>Gestión de usuarios</h1>
            <h2>Número de usuarios actuales: {{$nUsers}}</h2>
            <form action="{{ route('dashboard.search') }}" method="POST">
                @csrf
                <input type="text" name="search" placeholder="Buscar usuarios">
                <input type="submit">

            </form>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Valorar</th>


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
                                <a href="{{ route('profile.edit',  $item->id) }}"> 
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
                
                    <ul class="pagination">
                        @php
                            $link = '#!';
                            $current = 'active';
                        @endphp
                        @if (!$users->onFirstPage())
                            @php
                                $link = $users->previousPageUrl();
                            @endphp
                        @endif
                        <li class="page-item"><a class="page-link" href="{{ $link }}">Anterior</a></li>
                        @for ($i = 1; $i <= $users->lastPage(); $i++)
                            @if ($users->currentPage()==$i)
                                @php
                                    $current = 'disabled';
                                @endphp
                                @else
                                @php
                                $current = 'active';
                            @endphp
                            @endif

                            <li class="page-item {{ $current }}"><a class="page-link"
                                    href="?page={{ $i }}">{{ $i }}</a></li>

                        @endfor
                        @if ($users->lastPage())
                            @php
                                $link = $users->nextPageUrl();
                            @endphp
                        @endif
                        <li class="page-item"><a class="page-link" href="{{ $link }}">Next</a></li>
                    </ul>
               
            </div>

        </main>

    @endsection
</x-app-layout>
