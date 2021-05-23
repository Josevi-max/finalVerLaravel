<link rel="stylesheet" href={{ asset('css/buy.css') }}>

<x-app-layout>


    @section('body')
        <main>

            <div class="container mt-5">

                <x-jet-validation-errors class="  text-start alert alert-danger " />
               
                @if (session("enviado"))
                    <div class="alert alert-success" role="alert">
                        {{ session("enviado") }}
                    </div>
                @endif


                @if ($user->hasRole('Student'))
                    <x-data-users />

                @endif
                

                <form action="{{ route('profile.update', $user->id) }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="col-6">
                        <h1>Información perfil</h1>
                        <p>Actualiza datos de tu perfil tales como el nombre de usuario o el email</p>
                    </div>
                    <div class="col-6">
                        <label>Nombre:</label>
                        <input type="text" class="mt-1 block " value="{{ $user->name }}" name="name">

                        <label>Email:</label>
                        <input type="email" class="mt-1 block " value="{{ $user->email }}" name="email">

                    </div>
                    <div class="col-6">
                        <h1>Actualizar contraseña</h1>
                        <p>Asegurate de introducir una contraseña la cual te acuerdes más adelante y que sea segura</p>
                    </div>
                    <div class="col-6">
                        @if (Auth::user()->hasRole('Student'))
                            <div class="col-span-6 sm:col-span-4">
                                <label>Actual contraseña</label>

                                <input type="password" name="actualPassword">
                            </div>
                        @endif


                        <div class="col-span-6 sm:col-span-4">
                            <label>Nueva contraseña</label>
                            <input type="password" name="newPassword">

                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label>Confirmar contraseña</label>
                            <input type="password" name="newPassword2">
                        </div>
                    </div>
                    @if (Auth::user()->hasRole('Admin'))


                        <div class="col-6">

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="admin"
                                    {{ $user->hasRole('Admin') ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexSwitchCheckChecked">¿Quieres dar a este usuario
                                    permisos de administrador?</label>
                            </div>



                        </div>
                    @endif
                    <input type="hidden" name="correctPassword" value="false" >
                    <div class="col-12">
                        <input type="submit" class="btn btn-success" value="Actualizar">
                    </div>

                </form>

                <form action=" {{ route('profile.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method("DELETE")

                    <button type="submit" class="btn btn-danger" onclick="
                        return confirm('¿Estas seguro de querer borrar esta cuenta?')">Eliminar cuenta</button>

                </form>



            </div>
        </main>
    @endsection

</x-app-layout>
