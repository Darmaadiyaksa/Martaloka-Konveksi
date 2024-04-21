@extends('layouts.menu')

@section('title-head', 'Data Lembaga Pengawas')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Data Lembaga Pengawas</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Lembaga Pengawas</li>
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
          <button class="btn btn-danger mb-1" type="button"  data-toggle="modal" data-target="#modal-lembaga" data-backdrop="static" data-keyboard="false" id="btnadd"><i data-feather="plus"></i> Tambah Lembaga Pengawas</button>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover" id="tabellembaga">
              <thead class="text-center">
                <tr>
                  <th>Nama Lembaga</th>
                  <th>Dokumen MoU</th>
                  <th>Jumlah Perusahaan</th>
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
<div class="modal fade text-left" id="modal-lembaga" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-lembaga"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="jquery-val-form" class="forms-sample form-lembaga" action="#" method="post" enctype="multipart/form-data">
          <input type="hidden" name="idlembaga" id="idlembaga">
          <div class="row">
            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Nama Lembaga</b></label>
                <input type="text" name="nama" id="nama" class="form-control" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Nama Lembaga</b> <small>(Katakana)</small></label>
                <input type="text" name="namajp" id="namajp" class="form-control" required>
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Alamat Lembaga</b> <small>(Katakana)</small></label>
                <input type="text" name="alamat" id="alamat" class="form-control" required>
              </div>
            </div>

            <div class="col-xl-6">
              <div class="row">
                <div class="col-xl-12 mb-1">
                  <div class="form-group">
                    <label><b>Kode POS</b></label>
                    <input type="text" name="kodepos" id="kodepos" class="form-control" required>
                  </div>
                </div>

                <div class="col-xl-12 mb-1">
                  <div class="form-group">
                    <label><b>Telepon</b></label>
                    <input type="text" name="telp" id="telp" class="form-control" required>
                  </div>
                </div>

                <div class="col-xl-12 mb-1">
                  <div class="form-group">
                    <label><b>PIC</b></label>
                    <input type="text" name="pic" id="pic" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Dokumen MoU</b></label>
                <input type="file" class="dropify" name="mous" data-allowed-file-extensions="pdf" data-max-file-size="2M">
                <label>* format file <b>.pdf</b>, ukuran maksimal 2MB</label>
              </div>
            </div>

            <div class="col-xl-12 mb-1 company">
              <div class="form-group">
                <label><b>Daftar Perusahaan</b></label>
                <div id="company-list">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
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
  var table = $('#tabellembaga').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      "drawCallback": function( settings ) {
        feather.replace();
      },
      dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarstatus">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
      ajax: '{!! route('md.lembaga.dt') !!}',
      columns: [
          { data: 'nama', name: 'nama', render: function(data, type, row){
              if (row.namajp == null) {
                return data
              }else {
                return data+'<br><small class="text-muted">'+row.namajp+'</small>'
              }
          }},
          { data: 'dokmou', name: 'dokmou', class: 'text-center', render: function(data, type, row){
              if (data != null) {
                return '<a href=/../../'+data+' target="_blank" class="btn btn-sm btn-icon btn-outline-info" title="Klik untuk menampilkan Dokumen MoU"><i data-feather="file-text"></i></a>'
              }else {
                return '<div class="badge badge-light-danger">Belum Diunggah</div>'
              }
          }},
          { data: 'jmlperusahaan', name: 'jmlperusahaan', class: 'text-center'},
          { data: 'action', name: 'action', class: 'text-center'},
      ],
  });

  $('#btnadd').on('click', function(){
      $("#modal-title-lembaga").text('Tambah Data Lembaga Pengawas')
      $('.form-lembaga').attr('action', "{{route('md.lembaga.store')}}")
      $('#idlembaga').val('')
      $('#nama').val('')
      $('#namajp').val('')
      $('#alamat').val('')
      $('#kodepos').val('')
      $('#telp').val('')
      $('#pic').val('')
      $('.company').hide()
  })

  $('#tabellembaga tbody').on('click', '#btnedit', function () {
      $('#modal-title-lembaga').text('Ubah Data Lembaga Pengawas')
      $('.form-lembaga').attr('action', '{{route("md.lembaga.update")}}');
      var tr = $(this).closest('tr');
      var row = table.row(tr);
      var data = row.data()
      $('#idlembaga').val(data.id)
      $('#nama').val(data.nama)
      $('#namajp').val(data.namajp)
      $('#alamat').val(data.alamat)
      $('#kodepos').val(data.kodepos)
      $('#telp').val(data.telp)
      $('#pic').val(data.pic)
      $('.company').hide()
      if (data.jmlperusahaan > 0) {
        $('.company').show()
        $.get('/masterdata/lembaga/getperusahaan/'+data.id, function(datac){
            $('#company-list').html(datac)
        })
      }
  });
});
</script>
@stop
