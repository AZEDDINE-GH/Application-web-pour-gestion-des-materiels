 @extends('layouts.master')

@section('title')
    {{ config('app.name', 'Laravel') }} - Affecter
@endsection

@section('style')
    <!-- DataTables -->
    {{  Html::style('assets/plugins/datatables/jquery.dataTables.min.css') }}
    {{  Html::style('assets/plugins/datatables/buttons.bootstrap.min.css') }}
    {{  Html::style('assets/plugins/datatables/fixedHeader.bootstrap.min.css') }}
    {{  Html::style('assets/plugins/datatables/responsive.bootstrap.min.css') }}
    {{  Html::style('assets/plugins/datatables/scroller.bootstrap.min.css') }}
    {{  Html::style('assets/plugins/datatables/dataTables.colVis.css') }}
    {{  Html::style('assets/plugins/datatables/dataTables.bootstrap.min.css') }}
    {{  Html::style('assets/plugins/datatables/fixedColumns.dataTables.min.css') }}

@endsection
@section('page-title')
    Affecter un Matériel
@endsection


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>N° Inv</th>
                        <th>N° BC</th>
                        <th>Montant</th>
                        <th>N° BL</th>
                        <th>Designation</th>
                        <th>Type</th>
                        <th>Serie</th>
                        <th>Date Entree</th>

                        <th>Fournisseur</th>
                        <th>Qte Restante</th>

                        <td></td><td></td>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $i=0 ?>
                    @foreach($mats as $mat)
                        <tr>
                            <?php  $fourn = App\Fournisseur::where('id' , '=' , $mat->fourn_id)->first(); ?>
                            <?php  $count = DB::select('SELECT * FROM materiels WHERE designation_id = :desgn and type_id = :type',['desgn'=>$mat->designation_id , 'type'=>$mat->type_id]) ?>
                             <td>{{ $mat->ninventaire }}</td>
                             <td>{{ $mat->nbc }}</td>
                             <td>{{ $mat->montant }}</td>
                             <td>{{ $mat->nbl }}</td>
                            <td>{{ $mat->designation['name'] }}</td>
                            <td>{{ $mat->type['name'] }}</td>
                            <td>{{ $mat->serie }}</td>
                            <td> {{ date('Y-m-d', strtotime($mat['date'])) }} </td>
                                <td>{{ $fourn->name }}</td>
                            <td><span class="label label-sm label-<?php if($mat->qte >= '1') echo 'success';  else echo 'danger';   ?>"> {{ $mat->qte }} </span></td>



                            <td>

                                <a href="{{ route('affect',['id'=>$mat->id]) }}" class="btn btn-purple btn-xs">Affecter</a>
                            <td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')

    {!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.bootstrap.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.fixedColumns.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.colVis.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.scroller.min.js') !!}
    {!! Html::script('assets/plugins/datatables/responsive.bootstrap.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.responsive.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.keyTable.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.fixedHeader.min.js') !!}
    {!! Html::script('assets/plugins/datatables/buttons.print.min.js') !!}
    {!! Html::script('assets/plugins/datatables/buttons.html5.min.js') !!}
    {!! Html::script('assets/plugins/datatables/vfs_fonts.js') !!}
    {!! Html::script('assets/plugins/datatables/pdfmake.min.js') !!}
    {!! Html::script('assets/plugins/datatables/jszip.min.js') !!}
    {!! Html::script('assets/plugins/datatables/buttons.bootstrap.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.buttons.min.js') !!}

    {!! Html::script('assets/pages/datatables.init.js') !!}
    <script src=""></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({keys: true});
            $('#datatable-responsive').DataTable();
            $('#datatable-colvid').DataTable({
                "dom": 'C<"clear">lfrtip',
                "colVis": {
                    "buttonText": "Change columns"
                }
            });
            $('#datatable-scroller').DataTable({
                ajax: "assets/plugins/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
            var table = $('#datatable-fixed-col').DataTable({
                scrollY: "300px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    leftColumns: 1,
                    rightColumns: 1
                }
            });
        });
        TableManageButtons.init();

    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var dataTableToken = 'XmsuiD5EXMI4UjagtzAq5-y4jkMMTh';
            var myTable = $('#tbl').DataTable({
                order: [[ 3 , 'desc'  ]],
                scrollY: '50vh',
                deferRender: true,
                scroller: true,
                serverSide: true,
                searchDelay: 4000,
                buttons: [ 'copy', 'csv', 'print', 'colvis' ],
                initComplete : function () {
                    myTable.buttons().container()
                            .appendTo( $('#tbl_wrapper .col-sm-6:eq(0)'));
                },
                ajax: {
                    type: 'POST',
                    contentType: 'application/json; charset=utf-8',
                    url: '/account/service/DataTables.aspx/Data',
                    headers: { 'X-CSRFToken': dataTableToken },
                    data: function(params) {
                        params.token = dataTableToken;
                        /* pass a single JSON struct named parameters to the server */
                        return JSON.stringify({ parameters: params });
                    }
                }
            });
        });
    </script>
@endsection