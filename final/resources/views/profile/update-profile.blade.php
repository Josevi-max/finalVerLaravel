

<form action="" method="POST">
    <div class="col-6">
        <h1>Información perfil</h1>
        <p>Actualiza datos de tu perfil tales como el nombre de usuario o el email</p>
    </div>
    <div class="col-6">
        <label>Nombre:</label>
        <x-jet-input id="name" type="text" class="mt-1 block " value="{{ Auth::user()->name }}" />
        <label>Email:</label>
        <x-jet-input id="email" type="email" class="mt-1 block w-full" value="{{ Auth::user()->email }}" />
    </div>
    <div class="col-12">
        <input type="submit" class="btn btn-success">
    </div>

</form>