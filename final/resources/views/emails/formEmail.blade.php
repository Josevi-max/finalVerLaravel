   <!--Estilo generico-->

   <link rel="stylesheet" href="{{ asset('css/generic.css') }}">
   <x-app-layout>
       @section('body')

           <main>
            <x-jet-validation-errors class="  text-start alert alert-danger " />
            @if (isset($enviado))
            <div class="alert alert-success" role="alert">
                {{$enviado}}
              </div>
            @endif

            




               <h1>Envianos un correo</h1>

               <form action="{{ route('contact.store') }}" method="POST">
                   @csrf
                   <div class="mb-3">
                       <label for="exampleFormControlInput1" class="form-label">Email de contacto</label>
                       <input type="email" name="contactEmail" class="form-control" id="exampleFormControlInput1"
                           placeholder="name@example.com">

                   </div>
                   <div class="mb-3">
                       <label for="exampleFormControlTextarea1" class="form-label">Escribe aquí tu mensaje</label>
                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                   </div>

                   <input type="submit" value="Enviar" class="btn btn-primary">

               </form>
           </main>

       @endsection

   </x-app-layout>
