<div class="row pt-4 ">
 
        @for ($i = 0; $i < count($data['names']); $i++)
        <div class="col-lg-4 col-sm-12 ">
            <div class=" card  ">

                <h2 class="card-header text-center">{{ $data['names'][$i] }}</h2>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="{{ $data['icons'][$i] }} fa-5x"></i>

                        </div>
                        <div class="col-6">
                            <div class="text-end">


                                <p class=" mb-1 text-center">Cantidad</p>

                                <h3 class="{{ $data['textColor'][$i] }} text-center mt-1"><span>{{ $data['values'][$i] }}</span></h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endfor
 
           
</div>

