<link rel="stylesheet" href="{{ secure_asset('css/register_login.css') }}">

<x-app-layout>
    @section('body')
        <main>
            <x-jet-validation-errors class="  fixed-top alert alert-danger " />

            <div class=" row mx-auto" id="form">

                <img src={{ secure_asset('images/imgLogin.jpg') }} alt="Presentation" class="col-6  p-0">

                <div class="col-lg-6 col-12 mt-4">
                    <div class="card-body">
                        {{ $slot }}
                    </div>
                    @if (isset($link))
                        <div class="card-footer">
                            {{ $link }}
                        </div>
                    @endif


                </div>
            </div>
        </main>

    @endsection
</x-app-layout>
