<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        Actualiza la información de tu perfil
    </x-slot>

    <x-slot name="description">
        En esta sección podras modificar tus datos tales como tu nombre o email de usuario
    </x-slot>

    <x-slot name="form">
     
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <label>Nombre:</label>
            <x-jet-input id="name" type="text" class="mt-1 block " value="{{Auth::user()->name}}"   />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <label>Email:</label> 
           <x-jet-input id="email" type="email" class="mt-1 block w-full" value="{{Auth::user()->email}}" />
        </div>
    </x-slot>

    <x-slot name="actions">


        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
