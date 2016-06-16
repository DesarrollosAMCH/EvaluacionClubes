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

                        <table id="requisitos-list" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Valor</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;?>
                            @if( isset($oTemporada) )
                            @foreach($oTemporada->requisitos as $oRequisito)
                            <tr id="requisito-{{ $oRequisito->id }}">
                                <td>{{ $i++ }}</td>
                                <td>{{ $oRequisito->nombre }}</td>
                                <td>{{ $oRequisito->valor }}</td>
                                <td>{{ (is_object($oRequisito->categoria))?$oRequisito->categoria->nombre:'' }}</td>
                                <td>
                                    <a href="#modal-form" data-requisito="{{ $oRequisito->id }}" data-toggle="modal"
                                        data-nombre="{{ $oRequisito->nombre }}"
                                        data-descripcion="{{ $oRequisito->descripcion }}"
                                        data-valor="{{ $oRequisito->valor }}"
                                        data-categoria="{{ (is_object($oRequisito->categoria))?$oRequisito->categoria->id:0 }}"
                                        data-temporada="{{ $oRequisito->idTemporada }}"
                                        data-inicio="{{ $oRequisito->fecha_inicio }}"
                                        data-termino="{{ $oRequisito->fecha_termino }}"
                                    >
                                        <i class="fa fa-edit"></i>
                                        Editar
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                        <a data-toggle="modal" class="btn btn-primary" href="#modal-form"><i class="fa fa-plus"></i></a>
                    </section>
                    <h3>Paso 3</h3>
                    <section>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="form-group" id="">
                                <?php $portada = ( isset($oTemporada) ) && ( strlen($oTemporada->portada) > 0 )?$oTemporada->portada:Input::old('portada'); ?>
                                @if( strlen($portada) > 0)
                                    <?php $img_style = ""?>
                                    <?php $form_style = "display:none"?>
                                @else
                                    <?php $img_style = "display:none"?>
                                    <?php $form_style = ""?>
                                @endif
                                <div class="exists-img" style="text-align: center;{{ $img_style }}">
                                    <img width="60%" data-baseurl="/" src="@if( isset($oTemporada) ){{ url($oTemporada->portada) }} @else {{ url(Input::old('portada')) }} @endif"    />
                                    <a style="display: block; margin-top: 10px;" class="btn btn-danger" id="chg-img">Cambiar portada</a>
                                </div>

                                <form action="/admin/tarjetas/upload" class="form-horizontal dropzone do-not-exists-img" id="my-dropzone" enctype="multipart/form-data" style="{{ $form_style }}">
                                    <div class="fallback">
                                        <input name="cover" type="file" />
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                            <input type="text" name="requisito['nombre']" value="" placeholder="Ejemplo: Bimensual Abril-Mayo" class="form-control required"  />
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
                                            <input type="number" name="requisito['valor']" value="" placeholder="150" class="form-control required"  />
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
                                        <input type="hidden" name="requisito['id']" value=""  />
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
<link href="/assets/_admin/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
@endsection

@section('extra-meta-footer')
<!-- Date range use moment.js same as full calendar plugin -->
<script src="/assets/_admin/js/plugins/fullcalendar/moment.min.js"></script>
<!-- Date range picker -->
<script src="/assets/_admin/js/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Steps -->
<script src="/assets/_admin/js/plugins/staps/jquery.steps.min.js"></script>
@endsection

@section('extra-js')
    <script src="http://www.dropzonejs.com/new-js/dropzone.js"></script>
    <script src="{{ URL::asset('assets/_admin/js/utils.js') }}"></script>
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
            var id = form.find('input[name="requisito[\'id\']"]').val();
            var url = '/admin/evaluaciones/guardar-requisito/' + id;
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
                    addRow(data, response.data.id);
                }
            });
        };

        addRow = function(requisito, id){
            var $table = $("#requisitos-list");
            var count = $table.find('tr').length;

            if($('tr#requisito-'+id).length){
                $('tr#requisito-'+id).remove();
                count -= 1;
            }

            var row = '<tr id="requisito-'+ id +'">';
            row += '<td>';
            row += count + 1;
            row += '</td>';
            row += '<td>';
            row += requisito.nombre;
            row += '</td>';
            row += '<td>';
            row += requisito.valor;
            row += '</td>';
            row += '<td>';
            row += requisito.categoria;
            row += '</td>';
            row += '<td>';
            row += '<a href="#modal-form" data-requisito="'+requisito.id+'" data-toggle="modal" data-nombre="'+requisito.nombre+'" data-descripcion="'+requisito.descripcion+'" data-valor="'+requisito.valor+'" data-categoria="'+requisito.categoria+'" data-temporada="'+requisito.temporada+'" data-inicio="" data-termino=""> <i class="fa fa-edit"></i> Editar </a>';
            row += '</td>';
            row += '</tr>';

            $table.append(row);
        };

        fillModalForm = function(requisito){
            var form = $("#requisitos_form");

            form.find('select[name="requisito[\'categoria\']"]').val(requisito.categoria);
            form.find('input[name="requisito[\'nombre\']"]').val(requisito.nombre);
            form.find('textarea[name="requisito[\'descripcion\']"]').val(requisito.descripcion);
            form.find('input[name="requisito[\'temporada_id\']"]').val(requisito.temporada);
            form.find('input[name="requisito[\'id\']"]').val(requisito.id);
            form.find('input[name="requisito[\'valor\']"]').val(requisito.valor);
            form.find("input[name='daterange']").val(requisito.inicio + ' - ' + requisito.termino);
        };

        showImg = function(){
            $(".do-not-exists-img").fadeOut(600, function(){
                $(".exists-img").fadeIn("slow");
            });
        };
        showForm = function(){
            $(".exists-img").fadeOut(600, function(){
                $(".do-not-exists-img").fadeIn("slow");
            });
        };

        $(document).ready(function() {
            $("#chg-img").click(function(){
                alert("ddd");
                //showForm();
            });

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
                    if(currentIndex == 1){
                        continuar = true;
                    }
                    return (continuar || newIndex < currentIndex);
                },
                onFinished: function(){
                    window.location = '/admin/evaluaciones';
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

            $("a[data-toggle='modal']").click(function(){
                var $elemento = $(this);
                var requisito = {
                                    id : $elemento.data('requisito'),
                                    nombre : $elemento.data('nombre'),
                                    descripcion : $elemento.data('descripcion'),
                                    valor : $elemento.data('valor'),
                                    categoria : $elemento.data('categoria'),
                                    temporada : $elemento.data('temporada'),
                                    inicio : $elemento.data('inicio'),
                                    termino : $elemento.data('termino')
                                };
                fillModalForm(requisito);
            })

            var id_temporada = $("input[name='temporada_id']").val();
            Dropzone.autoDiscover = false;
            var myDropzone = $("#my-dropzone").dropzone({
                url                 :   '/admin/evaluaciones/upload/'+id_temporada,
                paramName           :   'cover',
                maxFilesize         :   '5',
                maxFiles            :   '1',
                dictDefaultMessage  :   'Arrastre o haga click para subir una imagen (jpg - 2050x936 px)',
                acceptedFiles       :   '.jpg, jpeg',
                success             :   function(arg, data){
                    if(!data.error){
                        $("input[name='cover']").val(data.path);
                        this.removeAllFiles();
                        console.log(data.path);
                        setTimeout(function(){
                            location.reload();
                        },1000);
                    }
                }
            });

        });
    </script>

@endsection