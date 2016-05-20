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
                        <p>Añadir información e los requisitos.</p>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Valor</th>
                                <th>Categoria</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            </tbody>
                        </table>
                        <a data-toggle="modal" class="btn btn-primary" href="#modal-form"><i class="fa fa-plus"></i></a>


                    </section>
                    <h3>Paso 3</h3>
                    <section>
                        <p>The next and previous buttons help you to navigate through your content.</p>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-form" class="modal fade" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Sign in</h3>

                                <p>Sign in today for more expirience.</p>

                                <!--<form role="form">
                                    <div class="form-group"><label>Email</label> <input type="email" placeholder="Enter email" class="form-control"></div>
                                    <div class="form-group"><label>Password</label> <input type="password" placeholder="Password" class="form-control"></div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Log in</strong></button>
                                        <label> <input type="checkbox" class="i-checks"> Remember me </label>
                                    </div>
                                </form>-->
                                <form id="temporada_form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select name="requisito[0]['categoria']" class="form-control required">
                                                <option>Seleccionar una categoria</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" name="requisito[0]['nombre']" value="Ejemplo" placeholder="Ejemplo: Bimensual Abril-Mayo" class="form-control required"  />
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea name="requisito[0]['descripcion']" class="form-control required"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Valor (puntos)</label>
                                            <input type="number" name="requisito[0]['valor']" value="30" placeholder="150" class="form-control required"  />
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Fecha Inicio - Fin</label>
                                            <input type="text" name="requisito[0]['daterange']" value="" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button class="btn btn-md btn-primary pull-right" type="submit"><strong>Agregar</strong></button>
                                    </div>

                                </form>
                            </div>
                        </div>
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
                    var continuar = true;

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