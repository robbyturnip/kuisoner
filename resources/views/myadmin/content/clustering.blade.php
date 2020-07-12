@extends('myadmin.index')

@section('content')

@if(\Session::has('alert'))
    <div class='alert alert-danger'>
        <div>
            {{Session::get('alert')}}
        </div>
    </div>
@endif
@if(\Session::has('alert-success'))
    <div class='alert alert-success'>
        <div>
            {{Session::get('alert-success')}}
        </div>
    </div>
@endif

<button type="button" id="clustering" class="btn btn-outline-primary">Clustering</button>

<div class="row" id="row_cluster" style="display:none;">
    <div class="col-md-8 col-sm-8">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table Cluster Kuisoner</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-kuisoner" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4">
        <div id="piechart-kuisoner" ></div>
    </div>
    <div class="col-md-8 col-sm-8">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table Cluster Kamar</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-kamar" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4">
        <div id="piechart-kamar" ></div>
        <br>
        <!-- <div id="scatter-kamar" ></div> -->
    </div>
    <div class="col-md-8 col-sm-8">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table Cluster Kamar Mandi</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-kamar-mandi" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4">
        <div id="piechart-kamar-mandi" ></div>
        <br>
        <!-- <div id="scatter-kamar-mandi" ></div> -->
    </div>
    <div class="col-md-8 col-sm-8">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table Cluster Aula dan Ruang Tamu</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-aula" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4">
        <div id="piechart-aula" ></div>
        <br>
        <!-- <div id="scatter-aula" ></div> -->
    </div>
    <div class="col-md-8 col-sm-8">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table Cluster Parkiran</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-parkiran" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4">
        <div id="piechart-parkiran" ></div>
        <br>
        <!-- <div id="scatter-parkiran" ></div> -->
    </div>
    <div class="col-md-8 col-sm-8">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table Cluster Dapur</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-dapur" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4">
        <div id="piechart-dapur" ></div>
        <br>
        <!-- <div id="scatter-dapur" ></div> -->
    </div>
</div>

<div class="modal" id="modal-info" tabindex="-1" role="dialog" aria-labelledby="modal-info" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Info Kuisoner</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="x_title">
                    <h2>Table Kamar</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table id="dialog-datatable-kamar" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Fasilitas</th>
                                    <th style="text-align:center">Nilai</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="x_title">
                    <h2>Table Kamar Mandi</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table id="dialog-datatable-kamar-mandi" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Fasilitas</th>
                                    <th style="text-align:center">Nilai</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="x_title">
                    <h2>Table Aula dan Ruang Tamu</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table id="dialog-datatable-ruang-tamu" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Fasilitas</th>
                                    <th style="text-align:center">Nilai</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="x_title">
                    <h2>Table Parkiran</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table id="dialog-datatable-parkiran" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Fasilitas</th>
                                    <th style="text-align:center">Nilai</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="x_title">
                    <h2>Table Dapur</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table id="dialog-datatable-dapur" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Fasilitas</th>
                                    <th style="text-align:center">Nilai</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <button class="btn btn-success float-right" type="button" data-dismiss="modal" aria-label="exit">OK</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="{{ URL::asset('template/gentelella/vendors/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript">

$(document).ready(function(){
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(initialize);
    var data= [];
    var table = '';

    function getCluster(){
        $("#row_cluster").show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/api/cluster",
            dataType: "json",
            async: false,
            success: function(respons){
                data = respons;
            },
            error:function(error){
                console.log(error);
            }
        });

        $('#datatable-kuisoner').DataTable( {
                destroy: true,
                data: data['table_kuisoner'],
                columns: [
                { title: "ID Kuisoner" },
                { title: "Cluster" },
                { title: "Action" }
                ],
                columnDefs: [ {
                    "targets": -1,
                    "data": null,
                    "defaultContent": "<a class='btn btn-info btn-sm info-button' data-toggle='modal' data-target='#modal-info'><i class='fa fa-info-circle'></i> Info</a>"
                } ]
        });

        table = $('#datatable-kuisoner').DataTable();

        $('#datatable-kamar').DataTable( {
                destroy: true,
                data: data['table_kamar'],
                columns: [
                { title: "ID Kuisoner" },
                { title: "Cluster" },
                ]
        });

        $('#datatable-kamar-mandi').DataTable( {
                destroy: true,
                data: data['table_kamar_mandi'],
                columns: [
                { title: "ID Kuisoner" },
                { title: "Cluster" },
                ]
        });

        $('#datatable-aula').DataTable( {
                destroy: true,
                data: data['table_aula_dan_ruang_tamu'],
                columns: [
                { title: "ID Kuisoner" },
                { title: "Cluster" },
                ]
        });

        $('#datatable-parkiran').DataTable( {
                destroy: true,
                data: data['table_parkiran'],
                columns: [
                { title: "ID Kuisoner" },
                { title: "Cluster" },
                ]
        });

        $('#datatable-dapur').DataTable( {
                destroy: true,
                data: data['table_dapur'],
                columns: [
                { title: "ID Kuisoner" },
                { title: "Cluster" },
                ]
        });

        data = data
    }

    function initialize () {
        $('#clustering').click(function() {
            drawChart();
        });
    }

    function drawChart() {

        var datas   = new google.visualization.arrayToDataTable(data['chart_kuisoner']);
        var options = {title: 'Cluster Kuisoner'};
        var chart   = new google.visualization.PieChart(document.getElementById('piechart-kuisoner'));
        chart.draw(datas, options);

        // var datas   = new google.visualization.arrayToDataTable(data['scatter_kamar']);
        // var options = {
        //                     title: 'Luas vs Kondisi Bangunan',
        //                     hAxis: {title: 'Luas', minValue: 0, maxValue: 10},
        //                     vAxis: {title: 'Kondisi Bangunan', minValue: 0, maxValue: 10},
        //                     legend: 'none'
        //                 };

        // var chart   = new google.visualization.ScatterChart(document.getElementById('scatter-kamar'));
        // chart.draw(datas, options);


        var datas   = new google.visualization.arrayToDataTable(data['chart_kamar']);
        var options = {title: 'Cluster Kamar'};
        var chart   = new google.visualization.PieChart(document.getElementById('piechart-kamar'));
        chart.draw(datas, options);
        
        // var datas   = new google.visualization.arrayToDataTable(data['scatter_kamar_mandi']);
        // var options = {
        //                     title: 'Luas vs Kondisi Bangunan',
        //                     hAxis: {title: 'Luas', minValue: 0, maxValue: 10},
        //                     vAxis: {title: 'Kondisi Bangunan', minValue: 0, maxValue: 10},
        //                     legend: 'none'
        //                 };

        // var chart   = new google.visualization.ScatterChart(document.getElementById('scatter-kamar-mandi'));
        // chart.draw(datas, options);


        var datas   = new google.visualization.arrayToDataTable(data['chart_kamar_mandi']);
        var options = {title: 'Cluster Kamar Mandi'};
        var chart   = new google.visualization.PieChart(document.getElementById('piechart-kamar-mandi'));
        chart.draw(datas, options);

        // var datas   = new google.visualization.arrayToDataTable(data['scatter_aula_dan_ruang_tamu']);
        // var options = {
        //                     title: 'Luas vs Kondisi Bangunan',
        //                     hAxis: {title: 'Luas', minValue: 0, maxValue: 10},
        //                     vAxis: {title: 'Kondisi Bangunan', minValue: 0, maxValue: 10},
        //                     legend: 'none'
        //                 };

        // var chart   = new google.visualization.ScatterChart(document.getElementById('scatter-aula'));
        // chart.draw(datas, options);


        var datas   = new google.visualization.arrayToDataTable(data['chart_aula_dan_ruang_tamu']);
        var options = {title: 'Cluster Aula dan Ruang Tamu'};
        var chart   = new google.visualization.PieChart(document.getElementById('piechart-aula'));
        chart.draw(datas, options);

        // var datas   = new google.visualization.arrayToDataTable(data['scatter_aula_dan_ruang_tamu']);
        // var options = {
        //                     title: 'Luas vs Kondisi Bangunan',
        //                     hAxis: {title: 'Luas', minValue: 0, maxValue: 10},
        //                     vAxis: {title: 'Kondisi Bangunan', minValue: 0, maxValue: 10},
        //                     legend: 'none'
        //                 };

        // var chart   = new google.visualization.ScatterChart(document.getElementById('scatter-aula'));
        // chart.draw(datas, options);


        var datas   = new google.visualization.arrayToDataTable(data['chart_parkiran']);
        var options = {title: 'Cluster Parkiran'};
        var chart   = new google.visualization.PieChart(document.getElementById('piechart-parkiran'));
        chart.draw(datas, options);

        // var datas   = new google.visualization.arrayToDataTable(data['scatter_parkiran']);
        // var options = {
        //                     title: 'Luas vs Atap',
        //                     hAxis: {title: 'Luas', minValue: 0, maxValue: 10},
        //                     vAxis: {title: 'Atap', minValue: 0, maxValue: 10},
        //                     legend: 'none'
        //                 };

        // var chart   = new google.visualization.ScatterChart(document.getElementById('scatter-parkiran'));
        // chart.draw(datas, options);


        var datas   = new google.visualization.arrayToDataTable(data['chart_dapur']);
        var options = {title: 'Cluster Dapur'};
        var chart   = new google.visualization.PieChart(document.getElementById('piechart-dapur'));
        chart.draw(datas, options);

        // var datas   = new google.visualization.arrayToDataTable(data['scatter_dapur']);
        // var options = {
        //                     title: 'Peralatan Memasak vs Wastafel',
        //                     hAxis: {title: 'Peralatan Memasak', minValue: 0, maxValue: 10},
        //                     vAxis: {title: 'Wastafel', minValue: 0, maxValue: 10},
        //                     legend: 'none'
        //                 };

        // var chart   = new google.visualization.ScatterChart(document.getElementById('scatter-dapur'));
        // chart.draw(datas, options);
    }

    $('#datatable-kuisoner').on( 'click', 'tr', function () {
        id_kuisoner = table.row(this).data()[0]; 
        console.log(id_kuisoner);

        $('#dialog-datatable-kamar').DataTable( {
                "destroy": true,
                "paging": false,
                "searching": false,
                "serverSide": false,
                "ajax": {
                    "url": "/kuisoner/kamar",
                    "type": "post",
                    "data": {
                        "_token": "{{ csrf_token() }}",
                        "id_kuisoner":id_kuisoner
                    }
                },
                "columns": [
                        { "data": "penunjang" },
                        { "data": "keterangan" }
                    ]
        });
        $('#dialog-datatable-kamar-mandi').DataTable( {
                "destroy": true,
                "paging": false,
                "searching": false,
                "serverSide": false,
                "ajax": {
                    "url": "/kuisoner/kamarmandi",
                    "type": "post",
                    "data": {
                        "_token": "{{ csrf_token() }}",
                        "id_kuisoner":id_kuisoner
                    },
                },
                    "columns": [
                        { "data": "penunjang" },
                        { "data": "keterangan" }
                    ]
        });
        $('#dialog-datatable-ruang-tamu').DataTable( {
                    "destroy": true,
                    "paging": false,
                    "searching": false,
                    "serverSide": false,
                    "ajax": {
                    "url": "/kuisoner/ruangtamu",
                    "type": "post",
                    "data": {
                        "_token": "{{ csrf_token() }}",
                        "id_kuisoner":id_kuisoner
                    }
                },
                    "columns": [
                        { "data": "penunjang" },
                        { "data": "keterangan" }
                    ]
        });
        $('#dialog-datatable-parkiran').DataTable( {
                    "destroy": true,
                    "paging": false,
                    "searching": false,
                    "serverSide": false,
                    "ajax": {
                        "url": "/kuisoner/parkiran",
                        "type": "post",
                        "data": {
                            "_token": "{{ csrf_token() }}",
                            "id_kuisoner":id_kuisoner
                        },
                    },
                    "columns": [
                        { "data": "penunjang" },
                        { "data": "keterangan" }
                    ]
        });
        $('#dialog-datatable-dapur').DataTable( {
                    "destroy": true,
                    "paging": false,
                    "searching": false,
                    "serverSide": false,
                    "ajax": {
                        "url": "/kuisoner/dapur",
                        "type": "post",
                        "data": {
                            "_token": "{{ csrf_token() }}",
                            "id_kuisoner":id_kuisoner
                        }
                    },
                    "columns": [
                        { "data": "penunjang" },
                        { "data": "keterangan" }
                    ]
        });
    });

    $('#clustering').on('click',getCluster);
});
</script>


@endsection