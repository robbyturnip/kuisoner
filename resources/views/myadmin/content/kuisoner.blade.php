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
                Yakin ingin menghapus data <p class="kuisoner" style="display:inline"></p> ?
                <div class="modal-footer" style="color:#fff;">
                    <a id="delete" class="btn btn-primary">Ya</a>
                    <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
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

    $('#datatable tbody').on( 'click', 'tr', function () {
        id_kuisoner = table.row(this).data()[0]; 
        $('.kuisoner').text(id_kuisoner);
    });

    $("#delete").click(function(){

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
}); 
</script>
@endsection