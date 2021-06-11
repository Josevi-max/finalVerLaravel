<div class=" text-center border-top bg-dark text-light pt-5">
    <div class="container ">
        <div class=" row">
            @for ($i = 0; $i < count($contactData["types"]); $i++)
            <div class="col-lg-3 col-6" >

                <h5>{{$contactData["types"][$i]}}</h5>
                <p >{{$contactData["infos"][$i]}} </p>
            </div>   
            @endfor
          


            <div class="col-lg-3 col-6 ">

                <h5>Social</h5>

              @for ($i = 0; $i < count($socialNetworks["icons"]); $i++)
             <a target="_blank" href="{{$socialNetworks["links"][$i]}}" class="p-2 "> <i class="{{$socialNetworks['icons'][$i]}} fa-2x "></i></a>

             @endfor

            </div>
            <p class=" col-12 text-center mt-3 border-top ">Realizado por Josevi ©</p>
        </div>
    </div>
</div>