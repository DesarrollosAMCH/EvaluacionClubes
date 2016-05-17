@extends('Admin.Layout.Main')

@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Basic Wizzard</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <p>
                    This is basic example of Step
                </p>

                <div id="wizard">
                    <h3>Temporada</h3>
                    <section>

                        <form id="temporada_form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Titulo de la temporada</label>
                                    <input type="text" name="nombre_temporada" value="Ejemplo" placeholder="Ejemplo: Bimensual Abril-Mayo" class="form-control required"  />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Inicio - Fin de temporada</label>
                                    <input type="text" name="daterange" value="" class="form-control required" />
                                </div>
                            </div>
                        </form>

                    </section>

                    <h3>Requisitos</h3>
                    <section>
                        <p>Wonderful transition effects.</p>
                    </section>
                    <h3>Paso 3</h3>
                    <section>
                        <p>The next and previous buttons help you to navigate through your content.</p>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-meta-head')
<link href="/assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
@endsection

@section('extra-meta-footer')
<!-- Date range use moment.js same as full calendar plugin -->
<script src="/assets/js/plugins/fullcalendar/moment.min.js"></script>
<!-- Date range picker -->
<script src="/assets/js/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Steps -->
<script src="/assets/js/plugins/staps/jquery.steps.min.js"></script>
@endsection

@section('extra-js')
    <script>
        saveTemporada = function(form){
            var url = '/admin/evaluaciones/crear-temorada';
            var data = {
                nombre_temporada : form.find("input[name='nombre_temporada']").val(),
                daterange : form.find("input[name='daterange']").val(),
                _token: form.find("input[name='_token']").val()
            };
            $.post(url, data, function(response){
                console.log(response);
            });
        };


        $(document).ready(function() {
            $("#wizard").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                autoFocus: true,
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    var continuar = false;

                    if(currentIndex == 0){
                        formTemp.validate().settings.ignore = ":disabled,:hidden";
                        if(formTemp.valid()){
                            saveTemporada(formTemp);
                            continuar = true;
                        }
                    }
                    return (continuar || newIndex < currentIndex);
                },
            });
            $('input[name="daterange"]').daterangepicker({
                locale: {
                    "format": 'YYYY/DD/MM',
                    "applyLabel": "Seleccionar",
                    "cancelLabel": "Cancelar",
                    "fromLabel": "Desde",
                    "toLabel": "Hasta",
                    "daysOfWeek": [
                        "Dom",
                        "Lun",
                        "Mar",
                        "Mie",
                        "Jue",
                        "Vi",
                        "Sa"
                    ],
                    "monthNames": [
                        "Enera",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ]
                },
                "startDate": "04/01/2016",
                "endDate": "06/30/2016"
            });

            var formTemp = $("#temporada_form");
            formTemp.validate()

        });
    </script>

@endsection