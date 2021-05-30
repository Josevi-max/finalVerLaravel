<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js">
</script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<x-app-layout>
    @section('body')
    
     
        <div class="container pt-5">


            




            @if (!is_null(session('management')))
                @if (session('management') == 'true')
                    <div class="alert alert-success mt-5" role="alert">
                        Los datos se han gestionado de manera correcta, gracias por confiar en nosotros
                    </div>
                @else
                    <div class="alert alert-danger mt-5" role="alert">
                        {{ session('management') }}
                    </div>
                @endif
            @endif




            <div class=" py-5 pt-5">
                <header class="text-center">
                    <h1 class="display-4 font-weight-bold">Evaluaciones</h1>
                    <p class="font-italic text-muted mb-0">Adapta tu día a día de clases o trabajo a la perfección
                        utilizando
                        nuestro sistema de gestión de clases</p>

                </header>
            </div>



            <div class="row">

                <form action=" {{ route('management.store') }}" method="POST">
                    @csrf
                    <div class="col-md-6 mx-auto">
                        <div class="py-4 text-center"><i class="fa fa-calendar fa-5x"></i></div>

                        <div class="col-sm-6 col-lg-12 col-md-12">
                            <div class="form-group">
                                <div class="input-group date" id="fecha" data-target-input="nearest">
                                    <input type="text" name="date" class=" form-control datetimepicker-input"
                                        data-target="#fecha" />
                                    <div class="input-group-append" data-target="#fecha" data-toggle="datetimepicker">
                                        <div class="input-group-text p-3"><i class="far fa-calendar-alt fa-lg"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="text-center pt-3">

                            <input type="submit"
                                class="btn btn-primary btn-sm px-4 rounded-pill text-uppercase font-weight-bold shadow-sm"
                                value="Confirmar reserva">
                        </div>
                    </div>
                </form>
            </div>
            <x-data-users />
        </div>

        
        <script>
            $(".target").change(function() {
                console.log($(".target").val());
            });

        </script>

<div class="container">
    <div class="row">
       <div class='col-sm-6'>
          <div class="form-group">
             <div class='input-group date' id='datetimepicker2'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
                </span>
             </div>
          </div>
       </div>
       <script type="text/javascript">
          $(function () {
              $('#datetimepicker2').datetimepicker({
                  locale: 'ru'
              });
          });
       </script>
    </div>
 </div>
    @endsection

</x-app-layout>
