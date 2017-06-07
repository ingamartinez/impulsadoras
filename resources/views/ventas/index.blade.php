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
                <a href="{{url('ventas')}}">Listar Ventas</a>
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

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-star"></i> Listado de Ventas</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example">
                            <thead>

                            <th> # </th>
                            <th> ID PDV </th>
                            <th> Nombre del punto </th>
                            <th> Circuito </th>
                            <th> Fecha Venta </th>
                            <th> Tipo Linea</th>
                            <th> Producto Vendido</th>
                            <th> Movil Tigo</th>
                            <th> Movil Portado</th>
                            <th> Valor Compra</th>
                            @if(Auth::user()->rol->id===2)
                                <th> Impulsador</th>

                            @endif

                            </thead>
                            <tbody>
                            @foreach($ventas as $venta)
                                <tr data-id="{{$venta->id}}">
                                    <td>{{$venta->id}}</td>
                                    <td>{{$venta->dms->idpdv}}</td>
                                    <td>{{$venta->dms->nombre_punto}}</td>
                                    <td>{{$venta->dms->circuito}}</td>
                                    <td>{{$venta->fecha_venta}}</td>
                                    <td>{{strtoupper( $venta->tipo_linea)}}</td>
                                    <td>{{strtoupper( $venta->producto_vendido)}}</td>
                                    <td>{{$venta->movil_tigo}}</td>
                                    <td>{{($venta->movil_portado==null?"No hay móvil":$venta->movil_portado)}}</td>
                                    <td>${{$venta->valor_compra}}</td>

                                    @if(Auth::user()->rol->id===2)
                                        <td> {{$venta->user->nombre}}</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div><!--/row-->
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "language": {
                    url: "//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json"
                },
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                filter: true,
                sort: true,
                info: true,
                autoWidth: true,
                order: [
                    [0, "desc"]
                ],
                aoColumnDefs: [{
                    bSortable: false,
                    "aTargets": [-1]
                }]
            });
        });
    </script>
@endpush