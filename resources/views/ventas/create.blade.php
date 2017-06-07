@extends('layouts.newApp')

@section('menu')
    @include('partials.menu')
@endsection

@section('content')

    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="{{url('/')}}">Inicio</a>
            </li>
            <li>
                <a href="{{url('ventas/create')}}">Registrar Venta</a>
            </li>
        </ul>
    </div>

    @if (Session::has('mensaje'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Ohh! </strong>{{ Session::get('mensaje') }}
        </div>
    @endif

    @if (Session::has('mensajeExito'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Bien! </strong> {{ Session::get('mensajeExito') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('ventas.store')}}" id="formRegistrarGoBlue" role="form" data-toggle="validator" autocomplete="off">

        {{method_field('POST')}}

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-star"></i> Validar IDPDV para Venta</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">


                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="idpdv">ID PDV</label>
                                    <input type="number" class="form-control" id="idpdv" name="idpdv" placeholder="Ingrese ID PDV" value="10648" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors">Si la venta no se ejecuta en un punto de venta, es decir que se hace una VENTA DIRECTA, no se ingresa ID Pdv sino el # 0</div>
                                    <button type="button" style="margin-top: 5px;" class="btn btn-primary center-block"
                                            id="validate">Validar ID PDV
                                    </button>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="periodo">Periodo</label>
                                    <input type="text" class="form-control" id="periodo" name="periodo" placeholder="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="cod_sub">Codigo Sub</label>
                                    <input disabled type="text" class="form-control" id="cod_sub">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre del Punto de Venta</label>
                                    <input disabled type="text" class="form-control" id="nombre">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="circuito">Circuito</label>
                                    <input disabled type="text" class="form-control" id="circuito">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="vendedor">Vendedor</label>
                                    <input disabled type="text" class="form-control" id="vendedor">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="tipo_punto">Tipo de Punto</label>
                                    <input disabled type="text" class="form-control" id="tipo_punto">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="epin">Servicio EPIN</label>
                                    <input disabled type="text" class="form-control" id="epin">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="simcard">Servicio SIMCARD</label>
                                    <input disabled type="text" class="form-control" id="simcard">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="tigo_gestion">Servicio TIGO GESTION</label>
                                    <input disabled type="text" class="form-control" id="tigo_gestion">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="zona">Zona</label>
                                    <input disabled type="text" class="form-control" id="zona">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <input disabled type="text" class="form-control" id="estado">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/row-->
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-star"></i> Preguntas de Venta</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">

                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="tipo_linea">Tipo de Linea</label>

                                    <select class="form-control" name="tipo_linea" id="tipo_linea" required >
                                        <option value="">Escoja una opción</option>
                                        <option value="nueva">Nueva</option>
                                        <option value="pre_pos">Vieja (Pre) y/o Migracion (pos)</option>
                                        <option value="port_pre">Portabilidad Prepago</option>
                                        <option value="port_pos">Portabilidad Pospago</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="producto_vendido">Producto Vendido</label>

                                    <select class="form-control" name="producto_vendido" id="producto_vendido" required>
                                        <option value=""> Escoja una opción</option>
                                        <option value="bolsa">Bolsa</option>
                                        <option value="plan_pos">Plan Pospago</option>
                                        <option value="paq_4mil">Paquete de $4000 (Gross Automatico)</option>
                                        <option value="ninguno">Ninguno</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="mov_tigo">Movil  TIGO</label>
                                    <input type="number" class="form-control" id="mov_tigo" name="mov_tigo" placeholder="" required min="3000000000" max="3300000000" data-error="Debe contener 10 digitos">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="mov_portado">Movil Portado</label>
                                    <input type="number" class="form-control" id="mov_portado" name="mov_portado" placeholder="" min="3000000000" max="3300000000" data-error="Debe contener 10 digitos">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div></div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="valor">Valor Compra</label>
                                    <input type="number" class="form-control" id="valor" name="valor" placeholder="" required >
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" form="formRegistrarGoBlue" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div><!--/row-->

    </form>

    <!-- content ends -->
@endsection

@push('script')
<script>

    $(document).ready(function () {
        moment.locale('es');
        $('#periodo').bootstrapMaterialDatePicker({
            time: false,
            format: 'YYYY-MM-DD HH:mm:ss',
            setDate: moment()
        });
    });

    $('#validate').on('click', function (e) {
        e.preventDefault();

        var idpdv = $('#idpdv').val();
        if(idpdv===""){
            idpdv=0;
        }
        validarDMS(idpdv);

    });

    function validarDMS(idpdv) {
        $.ajax({
            type: 'GET',
            url: '{{url('dms')}}/' + idpdv,
            success: function (data) {

                $('#cod_sub').val(data.COD_SUB);
                $('#nombre').val(data.nombre_punto);
                $('#circuito').val(data.circuito);
                $('#vendedor').val(data.NOMBRE_ASESOR);
                $('#tipo_punto').val(data.TIPO_PUNTO);
                $('#epin').val(data.SERV_EPIN);
                $('#simcard').val(data.SERV_SIMCARD);
                $('#tigo_gestion').val(data.SERV_MBOX);
                $('#zona').val(data.CIUDAD);
                $('#estado').val(data.ESTADO);
            },
            error: function (qXHR, textStatus, errorThrown) {
//                    console.reportes(qXHR.status,textStatus,errorThrown);
                limpiarPuntoDeVenta();
                swal(
                    'IDPDV no Encontrado',
                    'Por favor validar si el IDPDV fue ingresado correctamente',
                    'error'
                )
            }
        });
    }
    function limpiarPuntoDeVenta() {
        var form = $('#formRegistrarGoBlue');
        form.find('input').val('');
        form.find('textarea').val('');
        form.validator("validate");
    }
</script>
@endpush