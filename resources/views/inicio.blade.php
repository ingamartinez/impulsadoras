@extends('layouts.newApp')

@section('menu')
    @include('partials.menu')
@endsection

@section('content')

    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Inicio</a>
            </li>
        </ul>
    </div>


    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="glyphicon glyphicon-globe"></i> AMCOM S.A</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>

                </div>
                <div class="box-content row">
                    <div class="col-lg-7 col-md-12">
                        <h1>Plataforma Impulsadoras<br>
                            <small></small>
                        </h1>
                        <p></p>

                        <p><b>* Registrar Ventas</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content ends -->


@endsection

