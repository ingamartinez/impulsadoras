<div id="modal_agregar_arduino" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Subir Archivo</h4>
            </div>

            <form action="{{url('reporte')}}" method="POST" autocomplete="off" id="form_agregar_archivo" enctype="multipart/form-data">
                {{method_field('POST')}}
                {{csrf_field()}}
                <input type="hidden" class="form-control" id="fechainicial_archivo" name="fechaInicial" placeholder="" required value="{{$fechaInicial}}" >

                <input type="hidden" class="form-control" id="fechafinal_archivo" name="fechaFinal" placeholder="" required value="{{$fechaFinal}}" >

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sel_file">Subir Activa Mil .CSV</label>
                                <input type="file" id="sel_file" accept=".csv" name='sel_file' required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors">Solo se aceptan archivos .csv separados por punto y coma</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Subir Archivo</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- /.modal -->

@push('script')
    <script>
        $('#form_agregar_archivo').on('submit',function () {

        })
    </script>
@endpush