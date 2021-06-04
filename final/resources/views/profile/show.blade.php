<link rel="stylesheet" href={{ asset('css/buy.css') }}>

<x-app-layout>


    @section('body')
        <main>

            <div class="container mt-5  text-start">

                <x-jet-validation-errors class="  text-start alert alert-danger " />

                @if (session('enviado'))
                    <div class="alert alert-success" role="alert">
                        {{ session('enviado') }}
                    </div>
                @endif


                @if ($user->hasRole('Student'))
                    <div class="border-bottom mb-5">
                        <x-data-users />
                    </div>
                @endif


                <form action="{{ route('profile.update', $user->id) }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="row pb-5 border-bottom border-top pt-5">
                        <div class="col-lg-6 col-md-6 col-sm-12 ">
                            <h1>Información perfil</h1>
                            <p>Actualiza datos de tu perfil tales como el nombre de usuario o el email</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 bg-white border rounded p-5">
                            <label>Nombre:</label>
                            <input type="text" class="mt-1 mb-4 form-control" value="{{ $user->name }}" name="name">

                            <label>Email:</label>
                            <input type="email" class="mt-1 mb-4 form-control " value="{{ $user->email }}" name="email">

                        </div>
                    </div>
                    <div class="row pb-5 border-bottom  ">
                        <div class="col-lg-6 col-md-6 mt-5 col-sm-12">
                            <h1>Actualizar contraseña</h1>
                            <p>Asegurate de introducir una contraseña la cual te acuerdes más adelante y que sea segura</p>
                        </div>
                        <div class="col-lg-6 col-md-6 bg-white col-sm-12 mt-5 border rounded p-5">
                            @if (Auth::user()->hasRole('Student'))
                                <div class="col-span-6 sm:col-span-4">
                                    <label>Actual contraseña</label>

                                    <input type="password" class="mt-1 mb-4 form-control " name="actualPassword">
                                </div>
                            @endif


                            <div class="col-span-6 sm:col-span-4">
                                <label>Nueva contraseña</label>
                                <input type="password" class="mt-1 mb-4 form-control " name="newPassword">

                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label>Confirmar contraseña</label>
                                <input type="password" class="mt-1 mb-4 form-control " name="newPassword2">
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->hasRole('Admin'))
                        <div class="row pb-5 ">
                            <div class="col-lg-6 col-md-6 col-sm-12 mt-4 ">
                                <h1>Administración</h1>
                                <p>Gestiona a tus usuarios, dandole permisos especiales</p>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 pt-4 ">

                                <div class="form-check form-switch pb-4">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">¿Quieres dar a este usuario
                                        permisos de administrador?</label>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="admin"
                                        {{ $user->hasRole('Admin') ? 'checked' : '' }}>

                                </div>
                                @if ($user->hasRole('Student'))
                                    @php
                                        $myStudent=DB::table('table_teacher_students')->where('studentId', '=', $user->id)->where('teacherId','=',Auth::id())->first();
                                        $actualTeacher=DB::table('table_teacher_students')->where('studentId', '=', $user->id)->get();
                                        if (isset($actualTeacher[0]->teacherId)) {
                                            $nameTeacher=DB::table('users')->where("id","=",$actualTeacher[0]->teacherId)->get("name");
                                        }
                                    @endphp
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">¿Gestionar
                                            alumno? {{isset($nameTeacher[0]->name) && $nameTeacher[0]->name!=Auth::user()->name?'(gestionado por '.$nameTeacher[0]->name.')':''}} </label>
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                            name="studentMana"
                                            {{ $myStudent != false? 'checked': '' }}>
                                    </div>
                                    <input type="hidden" value={{ $user->id }} name="studentId">
                            </div>
                    @endif
            </div>
            @endif
            <input type="hidden" name="correctPassword" value="false">
            <div class="row text-center mt-5">
                <div class="col-6">
                    <input type="submit" class="btn btn-success" value="Actualizar">
                </div>

                </form>
                <div class="col-6">
                    <form action=" {{ route('profile.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method("DELETE")

                        <button type="submit" class="btn btn-danger" onclick="
                                                    return confirm('¿Estas seguro de querer borrar esta cuenta?')">Eliminar
                            cuenta</button>

                    </form>

                </div>
            </div>
            </div>
        </main>

    @endsection

</x-app-layout>
