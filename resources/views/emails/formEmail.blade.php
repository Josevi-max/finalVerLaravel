   <!--Estilo generico-->

   <link rel="stylesheet" href="{{ secure_asset('css/contact.css') }}">
   <x-app-layout>
       @section('body')

           <main>
            <header class="py-5 text-white border-bottom mb-4 ">
                <div class="container">
                    <div class="text-center my-5">
                        <h1 class="fw-bolder">¿No puedes encontrar la respuesta que necesitas? </h1>
                        <p class="lead mb-0">Mandanos un mensaje y te responderemos tan pronto como nos sea posible a cualquier duda
                            que te haya
                            podido surgir</p>
                    </div>
                </div>
            </header>
               <div class="container pb-2 pt-2"> 
                   <x-jet-validation-errors class="  text-start alert alert-danger " />
                   @if (isset($enviado))
                       <div class="alert alert-success" role="alert">
                           {{ $enviado }}
                       </div>
                   @endif
                   <div class="mx-auto d-block text-start mt-5 mb-5  " id="form">
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
               </div>
           </main>
       @endsection
   </x-app-layout>
