
<div class="row">
    @for ($i = 0; $i < count($data["names"]); $i++)
    <div class=" card col-md-6 col-lg-3 col-sm-12">
        <h2 class="card-header text-center">{{$data["names"][$i]}}</h2>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <i class="{{$data["icons"][$i]}} fa-5x"></i>

                </div>
                <div class="col-6">
                    <div class="text-end">
                        
                        @if (!($i+1==count($data["names"])))
                        <p class=" mb-1 text-center">Cantidad</p>
                        @endif
                        <h3 class="text-dark text-center mt-1"><span>{{$data["values"][$i]}}</span></h3>
                    </div>
                </div>
            </div> 

        </div>
    </div>
  
    @endfor
   
</div>  
    

