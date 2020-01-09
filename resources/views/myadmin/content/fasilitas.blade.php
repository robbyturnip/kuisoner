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
    <div class="col-md-5 col-sm-5  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambah Fasilitas</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="modal-body">
                    <form action="/fasilitas/tambah" method="post">
                        @csrf
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" name="fasilitas" placeholder="Fasilitas">
                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <button class="btn btn-info btn-sm" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="display: block;">
    <div class="col-md-7 col-sm-7  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Table Fasilitas</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="text-align:center">Id Fasilitas</th>
                                <th style="text-align:center">Fasilitas</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $fasilitas)
                            <tr>
                                <td class="fasilitas-id">{{$fasilitas->id_fasilitas}}</td>
                                <td>{{$fasilitas->fasilitas}}</td>
                                <td style="text-align:center; color:#fff;">
                                    <a class="btn btn-info btn-sm edit-button" data-toggle="modal" data-target="#modal-edit" ><i class="fa fa-edit"></i> Edit</a>
                                    <a class="btn btn-danger btn-sm hapus-button" data-toggle="modal" data-target="#modal-hapus"><i class="fa fa-trash-o"></i> Hapus</a>
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

<div class="modal" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/fasilitas/edit" method="post">
                    @csrf
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="hidden" class="form-control has-feedback-left fasilitas-id" name="id_fasilitas" placeholder="Id Fasilitas">
                    </div>
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="hidden" class="form-control has-feedback-left fasilitas" name="fasilitas_before" placeholder="Fasilitas">
                    </div>
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left fasilitas" name="fasilitas" placeholder="Fasilitas">
                        <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-12 col-sm-12" style="color:#fff;">
                        <button class="btn btn-info" type="submit">Simpan</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus data <p class="fasilitas" style="display:inline"></p> ?
                <div class="modal-footer" style="color:#fff;">
                    <a id="delete" class="btn btn-primary">Ya</a>
                    <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset('template/gentelella/vendors/jquery/dist/jquery.min.js')}}"></script>
<script>

$(document).ready(function(){
    $('.alert').hide(10000);

    $('#datatable').DataTable( {
        "columnDefs": [
            {
                "targets": [0],
                "visible": false,
                "searchable": false
            }
        ]
    });

    var table = $('#datatable').DataTable();
    var id_fasilitas = '';
    var fasilitas = '';

    $('#datatable tbody').on( 'click', 'tr', function () {
        id_fasilitas = table.row(this).data()[0]; 
        fasilitas = table.row(this).data()[1]; 
        $('.fasilitas-id').val(id_fasilitas);
        $('.fasilitas').text(fasilitas);
        $('.fasilitas').text(fasilitas);
        $('.fasilitas').val(fasilitas); 
    });

    $("#delete").click(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
        {
            url: "/fasilitas/hapus",
            type: 'post',
            data: {
                "id_fasilitas": id_fasilitas 
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
}); 
</script>
@endsection