@extends('Admin.Layout.Main')

@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Evaluaciones</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <div id="wizard">
                    <h3>Temporada</h3>
                    <section>

                        <form id="temporada_form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Titulo de la temporada</label>
                                    <input type="text" name="nombre_temporada" value="{{ (isset($oTemporada))?$oTemporada->nombre:'' }}" placeholder="Ejemplo: Bimensual Abril-Mayo" class="form-control required"  />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Inicio - Fin de temporada</label>
                                    <input type="text" name="daterange" value="{{ (isset($oTemporada))?$oTemporada->fecha_inicio . ' - ' . $oTemporada->fecha_termino :'' }}" class="form-control required" />
                                </div>
                            </div>

                            <input type="hidden" name="temporada_id" value="{{ (isset($oTemporada))?$oTemporada->id:'' }}"  />
                        </form>
                    </section>

                    <h3>Requisitos</h3>
                    <section>
                        <p>Añadir requisitos.</p>

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
                            @foreach($oTemporada->requisitos as $oRequisito)
                            <tr>
                                <td>1</td>
                                <td>{{ $oRequisito->nombre }}</td>
                                <td>{{ $oRequisito->valor }}</td>
                                <td>{{ $oRequisito->categoria->nombre }}</td>
                            </tr>
                            @endforeach
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
                            <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Requisitos</h3>

                                <p>Complete el fomulario para agregar/modificar un requisito.</p>

                                <form id="requisitos_form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select name="requisito['categoria']" class="form-control required">
                                                <option>Seleccionar una categoria</option>
                                                @foreach( $oCategoriasList as $categoria )
                                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" name="requisito['nombre']" value="Ejemplo" placeholder="Ejemplo: Bimensual Abril-Mayo" class="form-control required"  />
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea name="requisito['descripcion']" class="form-control required"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Valor (puntos)</label>
                                            <input type="number" name="requisito['valor']" value="30" placeholder="150" class="form-control required"  />
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Fecha Inicio - Fin</label>
                                            <input type="text" name="requisito['daterange']" value="" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="hidden" name="requisito['temporada_id']" value=""  />
                                        <button class="btn btn-md btn-primary pull-right" type="submit"><strong>Guardar</strong></button>
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
    <script src="{{ URL::asset('assets/js/utils.js') }}"></script>
    <script>
        saveTemporada = function(form){
            var url = '/admin/evaluaciones/guardar-temorada/';
            var data = {
                nombre_temporada : form.find("input[name='nombre_temporada']").val(),
                daterange : form.find("input[name='daterange']").val(),
                //temporada_id : form.find('input[name="temporada_id"]').val(),
                _token: form.find("input[name='_token']").val()
            };
            var id_temporada = form.find('input[name="temporada_id"]').val();
            $.post(url + id_temporada, data, function(response){
                response = $.parseJSON(response);
                console.log(response);
                var id_temporada = response.data.id;
                form.find('input[name="temporada_id"]').val(id_temporada);
            });
        };

        saveRequisito = function(form){
            var url = '/admin/evaluaciones/guardar-requisito';
            var requisito = {
                                nombre: $('input[name="requisito[\'nombre\']"]').val(),
                                descripcion : $('textarea[name="requisito[\'descripcion\']"]').val(),
                                valor : $('input[name="requisito[\'valor\']"]').val(),
                                categoria : $('select[name="requisito[\'categoria\']"]').val()
                            };
            var data = {
                categoria   : form.find('select[name="requisito[\'categoria\']"]').val(),
                nombre      : form.find('input[name="requisito[\'nombre\']"]').val(),
                descripcion : form.find('textarea[name="requisito[\'descripcion\']"]').val(),
                temporada   : form.find('input[name="requisito[\'temporada_id\']"]').val(),
                valor       : form.find('input[name="requisito[\'valor\']"]').val(),
                //daterange   : form.find("input[name='daterange']").val(),

                _token: form.find("input[name='_token']").val()
            };
            $.post(url, data, function(response){
                response = $.parseJSON(response);
                if(response.error == false){
                    $("#modal-form").click();
                }
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
                }
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


            $("#requisitos_form").submit(function(e){
                e.preventDefault();
                var id_temporada = $("input[name='temporada_id']").val();
                $('input[name="requisito[\'temporada_id\']"]').val(id_temporada);
                saveRequisito($(this));
            });

        });
    </script>

@endsection