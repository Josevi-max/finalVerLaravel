<x-guest-layout>

    <x-jet-authentication-card>



        
        <h2 class="text-center mt-4">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label class="font-weight-bold">Email:</label>
                <x-jet-input class="form-control" type="email" name="email"  required autofocus />
            </div>

            <div class="mt-4">
                <label class="font-weight-bold">Contraseña:</label>
                <input class="form-control" type="password" name="password" required>
            </div>
          
            <button type="submit" class="btn btn-primary mx-auto d-block mb-2 mt-3"  routerLinkActive="router-link-active">Iniciar sesión</button>


        </form>
   
    </x-jet-authentication-card>
    <x-slot name="link">
        <div class="text-center">
        <a href={{ route('register') }} >
            ¿No estas registrado?
        </a>
        </div>
    </x-slot>
</x-guest-layout>

