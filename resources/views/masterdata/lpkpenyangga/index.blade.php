@extends('layouts.menu')

@section('title-head', 'LPK Penyangga')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Data LPK Penyangga</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">LPK Penyangga</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row match-height">
      <div class="col-12">
        <div class="text-center text-lg-left">
          <button class="btn btn-danger mb-1" type="button"  data-toggle="modal" data-target="#modal-lpk" data-backdrop="static" data-keyboard="false" id="btnadd"><i data-feather="plus"></i> Tambah LPK Penyangga</button>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered" id="tabellpk">
              <thead class="text-center">
                <tr>
                  <th>Nama LPK</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal')
<div class="modal fade text-left" id="modal-lpk" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-lpk"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="jquery-val-form" class="forms-sample form-lpk" action="#" method="post">
          <input type="hidden" name="id" id="id">
          <div class="row">
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Nama LPK Penyangga</b></label>
                <input type="text" name="nama" id="nama" class="form-control" required>
              </div>
            </div>
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Alamat</b></label>
                <input type="text" name="alamat" id="alamat" class="form-control" required>
              </div>
            </div>
            <div class="col-xl-12">
              <div class="form-group">
                <label><b>Nomor Telepon</b></label>
                <input type="number" name="telp" id="telp" class="form-control" required>
              </div>
            </div>
          </div>
          {{ csrf_field() }}
        </div>
        <div class="modal-footer">
          <button type="submit" id="btn-submit" class="btn btn-sm btn-success"><i data-feather="save"></i> Simpan</button>
          <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('page-js')
<script>
$(document).ready(function() {
  var table = $('#tabellpk').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      "drawCallback": function( settings ) {
        feather.replace();
      },
      dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarstatus">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
      ajax: '{!! route('md.lpkpenyangga.dt') !!}',
      columns: [
          { data: 'nama', name: 'nama'},
          { data: 'alamat', name: 'alamat'},
          { data: 'telp', name: 'telp', class: 'text-center' },
          { data: 'action', name: 'action', class: 'text-center' },
      ],
  });

  $('#btnadd').on('click', function(){
      $("#modal-title-lpk").text('Tambah Data LPK Penyangga')
      $('.form-lpk').attr('action', "{{route('md.lpkpenyangga.store')}}")
      $('#id').val('')
      $('#nama').val('')
      $('#alamat').val('')
      $('#telp').val('')
  })
  $('#tabellpk tbody').on('click', '#btnedit', function () {
      $('#modal-title-lpk').text('Ubah Data LPK Penyangga')
      $('.form-lpk').attr('action', '{{route("md.lpkpenyangga.update")}}');
      var tr = $(this).closest('tr');
      var row = table.row(tr);
      var data = row.data()
      $('#id').val(data.id)
      $('#nama').val(data.nama)
      $('#alamat').val(data.alamat)
      $('#telp').val(data.telp)
  });
});
</script>
@stop
