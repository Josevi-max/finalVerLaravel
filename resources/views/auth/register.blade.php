
<x-guest-layout>




        <h2 class="text-center">Registrate</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label class="font-weight-bold">Nombre:</label>
                <x-jet-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"  />
            </div>

            <div class="mt-4">
                <label class="font-weight-bold">Email:</label>
                <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <label class="font-weight-bold">Contraseña:</label>
                <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <label class="font-weight-bold">Repite tu contraseña:</label>
                <x-jet-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <button type="submit" class="btn btn-primary mx-auto d-block mb-2 mt-3"  routerLinkActive="router-link-active">Registrarte</button>


          

            
          
        </form>
  
 
</x-guest-layout>

