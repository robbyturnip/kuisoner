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
                <h2>Tambah Penilaian</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="modal-body">
                    <form action="/penilaian/tambah" method="post">
                        @csrf
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" name="kode_nilai" placeholder="Kode Nilai">
                            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" name="nilai" placeholder="Nilai">
                            <span class="fa fa-star form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" name="keterangan" placeholder="Keterangan">
                            <span class="fa fa-info form-control-feedback left" aria-hidden="true"></span>
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
                <h2>Table Penilaian</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="text-align:center">Id Penilaian</th>
                                <th style="text-align:center">Kode Nilai</th>
                                <th style="text-align:center">Penilaian</th>
                                <th style="text-align:center">Keterangan</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $penilaian)
                            <tr>
                                <td>{{$penilaian->id_penilaian}}</td>
                                <td>{{$penilaian->kode_nilai}}</td>
                                <td>{{$penilaian->nilai}}</td>
                                <td>{{$penilaian->keterangan}}</td>
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
                <form action="/penilaian/edit" method="post">
                    @csrf
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="hidden" class="form-control has-feedback-left id_penilaian" name="id_penilaian" placeholder="Id Penilaian">
                    </div>                  
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="hidden" class="form-control has-feedback-left kode_nilai" name="kode_nilai_before" placeholder="Kode Nilai">
                    </div>
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="hidden" class="form-control has-feedback-left nilai" name="nilai_before" placeholder="Nilai">
                    </div>
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="hidden" class="form-control has-feedback-left keterangan" name="keterangan_before" placeholder="Keterangan">
                    </div>
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left kode_nilai" name="kode_nilai" placeholder="Kode Nilai">
                        <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left nilai" name="nilai" placeholder="Nilai">
                        <span class="fa fa-star form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left keterangan" name="keterangan" placeholder="Keterangan">
                        <span class="fa fa-info form-control-feedback left" aria-hidden="true"></span>
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
                Yakin ingin menghapus data <p class="kode_nilai" style="display:inline"></p> ?
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
    var id_penilaian = '';
    var kode_nilai = '';
    var nilai = '';
    var keterangan = '';

    $('#datatable tbody').on( 'click', 'tr', function () {
        id_penilaian = table.row(this).data()[0]; 
        kode_nilai = table.row(this).data()[1]; 
        nilai = table.row(this).data()[2]; 
        keterangan = table.row(this).data()[3]; 
        $('.id_penilaian').text(id_penilaian);
        $('.id_penilaian').val(id_penilaian);
        $('.kode_nilai').text(kode_nilai);
        $('.kode_nilai').val(kode_nilai);
        $('.nilai').text(nilai);
        $('.nilai').val(nilai);
        $('.keterangn').text(keterangan);
        $('.keterangan').val(keterangan); 
    });

    $("#delete").click(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
        {
            url: "/penilaian/hapus",
            type: 'post',
            data: {
                "kode_nilai": kode_nilai 
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