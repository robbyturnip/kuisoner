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
                <h2>Tambah Penunjang Fasilitas</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="modal-body">
                    <form action="/penunjang_fasilitas/tambah" method="post">
                        @csrf
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <div class="form-group">
                                <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                                <select class="form-control has-feedback-left" name="id_fasilitas" id="fasilitas-select-tambah">
                                    @foreach($data_fasilitas as $fasilitas)
                                        <option value='{{$fasilitas->id_fasilitas}}'>{{$fasilitas->fasilitas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <div class="form-group">
                                <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                                <select class="form-control has-feedback-left" name="id_penunjang" id="penunjang-select-tambah">
                                    @foreach($data_penunjang as $penunjang)
                                        <option value='{{$penunjang->id_penunjang}}'>{{$penunjang->penunjang}}</option>
                                    @endforeach
                                </select>
                            </div>
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
                <h2>Table Penunjang Fasilitas</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="text-align:center"></th>
                                <th style="text-align:center"></th>
                                <th style="text-align:center">Fasilitas</th>
                                <th style="text-align:center">Penunjang</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $penunjang)
                            <tr>
                                <td>{{$penunjang->id_fasilitas}}</td>
                                <td>{{$penunjang->id_penunjang}}</td>
                                <td>{{$penunjang->fasilitas}}</td>
                                <td>{{$penunjang->penunjang}}</td>
                                <td style="text-align:center; color:#fff;">
                                    <button class="btn btn-info btn-sm edit-button" data-toggle="modal" data-target="#modal-edit" ><i class="fa fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-sm hapus-button" data-toggle="modal" data-target="#modal-hapus"><i class="fa fa-trash-o"></i> Hapus</button>
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
                <form action="/penunjang_fasilitas/edit" method="POST">
                    @csrf
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="hidden" class="form-control has-feedback-left id_penunjang" name="id_penunjang_old">
                    </div>
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <div class="form-group">
                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                            <select class="form-control has-feedback-left" name="id_fasilitas" id="fasilitas-select-edit">
                                @foreach($data_fasilitas as $fasilitas)
                                    <option value='{{$fasilitas->id_fasilitas}}'>{{$fasilitas->fasilitas}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <div class="form-group">
                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                            <select class="form-control has-feedback-left" name="id_penunjang_new" id="penunjang-select-edit">
                                @foreach($data_penunjang as $penunjang)
                                    <option value='{{$penunjang->id_penunjang}}'>{{$penunjang->penunjang}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left penunjang" name="penunjang" placeholder="Penunjang">
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
                Yakin ingin menghapus data <p id="penunjang_fasilitas_hapus" style="display:inline"></p> ?
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
            },
            {
                "targets": [1],
                "visible": false,
                "searchable": false
            }
        ]
    });
    

    var table = $('#datatable').DataTable();
    var id_fasilitas = '';
    var id_penunjang = '';
    var penunjang = '';

    $('#datatable tbody').on( 'click', 'button.edit-button', function () {
        id_fasilitas = table.row($(this).parents('tr')).data()[0]; 
        id_penunjang = table.row($(this).parents('tr')).data()[1];
        fasilitas    = table.row($(this).parents('tr')).data()[2]; 
        penunjang    = table.row($(this).parents('tr')).data()[3];
        // console.log(id_fasilitas);
        $('#fasilitas-select-edit').val(id_fasilitas)
        $('#penunjang-select-edit').val(id_penunjang)
        $('.penunjang').val(penunjang);
    });

    $('#datatable tbody').on( 'click', 'button.hapus-button', function () {
        id_fasilitas = table.row($(this).parents('tr')).data()[0]; 
        id_penunjang = table.row($(this).parents('tr')).data()[1]; 
        fasilitas    = table.row($(this).parents('tr')).data()[2];
        penunjang    = table.row($(this).parents('tr')).data()[3];
        $('#penunjang_fasilitas_hapus').text(fasilitas+ ' - ' +penunjang);
        
        $("#delete").click(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax(
                {
                    url: "/penunjang_fasilitas/hapus",
                    type: 'post',
                    data: {
                        "id_fasilitas": id_fasilitas, 
                        "id_penunjang": id_penunjang, 
                    },
                    success: function (response)
                    {
                        // console.log(response);
                        $('#modal-hapus').modal('toggle');
                        location.reload();

                    },
                    error: function(error) {
                        // console.log(error);
                        $('#modal-hapus').modal('toggle');
                }
            });
        });
    });

    
}); 
</script>

@endsection