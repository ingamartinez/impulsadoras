<ul class="nav nav-pills nav-stacked main-menu">
    <li class="nav-header">Menú</li>

    <li><a class="ajax-link" href="{{url('/')}}"><i class="glyphicon glyphicon-home"></i><span> Inicio </span></a>
    </li>

    <li class="accordion">
        <a href="#"><i class="glyphicon glyphicon-user"></i><span> Ventas</span></a>
        <ul class="nav nav-pills nav-stacked">
            @if(auth()->user()->for_roles_id===1)
            <li><a href="{{url('ventas/create')}}"><i class="glyphicon glyphicon-eye-open"></i> Registrar Venta</a></li>
            @endif
            <li><a href="{{url('ventas')}}"><i class="glyphicon glyphicon-list"></i> Listar Ventas</a>
            </li>
            <li><a href="{{url('dms')}}"><i class="glyphicon glyphicon-search"></i> Consultar DMS</a></li>

            @if(auth()->user()->for_roles_id===2)
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-download-alt"></i><span> Reportes</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-blackboard"></i> Resumen</a></li>
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-flag"></i> Graficos</a></li>
                        <li><a href="{{url('#')}}"><i class="glyphicon glyphicon-list-alt"></i> Modificaciones y Creaciones</a></li>
                    </ul>
                </li>
            @endif



        </ul>
    </li>

    <li><a class="ajax-link" href="{{'/logout'}}"><i
                    class="glyphicon glyphicon-log-out"></i><span> Salir </span></a>
    </li>
</ul>