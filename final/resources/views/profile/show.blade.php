<x-app-layout>


    @section('body')
        <div class="container mt-5">
            @if (Auth::user()->hasRole("Student"))
            <x-data-users />

            @endif
            <x-update-profile/>
            <x-update-password/>

        </div>
    @endsection

</x-app-layout>
