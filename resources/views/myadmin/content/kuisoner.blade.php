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

<div class="row" style="display: block;">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table Kuisoner</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="text-align:center">Id Kuisoner</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $kuisoner)
                            <tr>
                                <td>{{$kuisoner->id_kuisoner}}</td>
                                <td style="text-align:center; color:#fff;">
                                    <a class="btn btn-danger btn-sm hapus-button" data-toggle="modal" data-target="#modal-hapus"><i class="fa fa-trash-o"></i> Hapus</a>
                                    <a class="btn btn-info btn-sm info-button" data-toggle="modal" data-target="#modal-info"><i class="fa fa-info-circle"></i> Info</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus data <p class="kuisoner" style="display:inline"></p> ?
                <div class="modal-footer" style="color:#fff;">
                    <a id="delete" class="btn btn-primary">Ya</a>
                    <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
                </div>
            </div>
        </div>
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
                        <table id="datatable-kamar" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
                        <table id="datatable-kamar-mandi" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
                        <table id="datatable-ruang-tamu" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
                        <table id="datatable-parkiran" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
                        <table id="datatable-dapur" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
<script src="{{ URL::asset('template/gentelella/vendors/jquery/dist/jquery.min.js')}}"></script>
<script>

$(document).ready(function(){
    $('.alert').hide(10000);

    var table = $('#datatable').DataTable();
    var id_kuisoner = '';

    $("#delete").click(function(){
        $('#datatable tbody').on( 'click', 'tr', function () {
            id_kuisoner = table.row(this).data()[0]; 
            $('.kuisoner').text(id_kuisoner);
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
        {
            url: "/kuisoner/hapus",
            type: 'post',
            data: {
                "id_kuisoner": id_kuisoner 
            },
            success: function (response)
            {
                console.log(response);
                $('#modal-hapus').modal('toggle');
                location.reload();
            },
            error: function(error) {
                console.log(error);
                $('#modal-hapus').modal('toggle');
        }
        });
    });
  
    $(".info-button").click(function(){

        $('#datatable tbody').on( 'click', 'tr', function () {
            id_kuisoner = table.row(this).data()[0]; 
            console.log(id_kuisoner);

            $('#datatable-kamar').DataTable( {
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
            $('#datatable-kamar-mandi').DataTable( {
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
            $('#datatable-ruang-tamu').DataTable( {
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
            $('#datatable-parkiran').DataTable( {
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
            $('#datatable-dapur').DataTable( {
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

    });

}); 
</script>
@endsection