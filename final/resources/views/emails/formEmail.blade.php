   <!--Estilo generico-->

   <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
   <x-app-layout>
       @section('body')

           <main>
 
               <div class="mt-3 bg-gradient-primary-to-secondary" id="header">
                   <h1 class="mt-5">¿No puedes encontrar la respuesta que necesitas?</h1>
                   <p class="lead">Mandanos un mensaje y te responderemos tan pronto como nos sea posible a cualquier duda
                       que te haya
                       podido surgir</p>

                 
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
                       fill="white">
                       <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17,144.54,0,144.54,0"></path>
                   </svg>
               </div>
               <x-jet-validation-errors class="  text-start alert alert-danger " />
               @if (isset($enviado))
                   <div class="alert alert-success" role="alert">
                       {{ $enviado }}
                   </div>
               @endif
               <div class="mx-auto d-block text-start mt-5 mb-5 w-75 col-5" id="form">
                   <form action="{{ route('contact.store') }}" method="POST" class="p-5">
                       @csrf
                       <div class="mb-3">
                           <label for="exampleFormControlInput1" class="form-label">Email de contacto</label>
                           <input type="email" name="contactEmail" class="form-control" id="exampleFormControlInput1"
                               placeholder="name@example.com">

                       </div>
                       <div class="mb-3">
                           <label for="exampleFormControlTextarea1" class="form-label">Escribe aquí tu mensaje</label>
                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                               name="message"></textarea>
                       </div>

                       <input type="submit" value="Enviar" class=" btn btn-primary mx-auto d-block">

                   </form>
               </div>
           </main>

       @endsection

   </x-app-layout>