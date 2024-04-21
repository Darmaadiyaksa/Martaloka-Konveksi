@extends('layouts.menu')

@section('title-head', 'User Prodi / Auditor')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">User Prodi / Auditor</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">User Prodi / Auditor</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-danger mb-1 btntambah" data-toggle="modal" data-target="#modal-auditor" data-backdrop="static"><i data-feather='plus'></i> Tambah Auditor</button>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="tabel-auditor">
                            <thead class="text-center">
                                <tr>
                                    <th>Nama Auditor</th>
                                    <th>Tahun Audit</th>
                                    <th>Bagian</th>
                                    <th>Sub Bagian</th>
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
<div class="modal fade" id="modal-auditor" tabindex="false" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample form-standar" action="" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label class="col-form-label"><b>Dosen</b></label>
                        <select class="form-control show-tick ms select2" id="iddosen" name="iddosen"  data-placeholder="Pilih Dosen Sebagai Auditor" required>
                            <option></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label"><b>Tahun Audit</b></label>
                        <input type="number" class="form-control tahun" id="tahun" autocomplete="off" name="tahun" placeholder="Pilih Tahun Audit"
                                style="background-color: white" required>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label"><b>Unit Bagian</b></label>
                        <select class="form-control show-tick ms select2" id="idbagian" name="idbagian"  data-placeholder="Pilih Bagian" required>
                            <option></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label"><b>Sub Bagian</b></label>
                          <select class="form-control show-tick ms select2" id="idsubbagian" name="idsubbagian"  data-placeholder="Pilih Sub Bagian">
                              <option></option>
                          </select>
                      </div>
                    {{ csrf_field() }}
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-danger">Simpan</button>
                <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Kembali</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js')
<script>
    $(document).ready(function() {
        var table = $('#tabel-auditor').DataTable({
          processing: true,
          serverSide: true,
          autoWidth: false,
          paging: true,
          info: true,
          "drawCallback": function( settings ) {
            feather.replace();
          },
          dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
          ajax: '{!! route('userauditor.dt',$tahun) !!}',
          columns: [
              { data: 'dosen.nama', name: 'dosen.nama'},
              { data: 'tahun', name: 'tahun', class: 'text-center'},
              { data: 'bagian.nama', name: 'bagian.nama'},
              { data: 'subbagian', name: 'subbagian'},
              { data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
          ],
          order:[[0,"asc"]],
        });
        $.fn.DataTable.ext.pager.numbers_length = 5;

        $('div.toolbar').html('<div class="text-center mt-25 mt-lg-1"><select class="form-control select2" id="tahunaudit"></select></div>')

        $('#tahunaudit').on('change', function(){
            var tahun = $(this).val()
            table.ajax.url('/user-auditor/dt/'+tahun).load();
        })

        $("#tahunaudit").append($("<option selected='selected'></option>").val('{{$tahun == null ? "":"$tahun"}}').text('{{$tahun == null ? "":"Tahun $tahun"}}')).trigger('change');

        $("#iddosen").select2({
          ajax: {
              url: '{!! route('s2.dosenaktif') !!}',
              dataType: 'json',
              data: function(params) {
                  return {
                      q: $.trim(params.term)
                  };
              },
              processResults: function(data) {
                  return {
                      results: data
                  };
              },
              cache: true
          },
        });

        $("#tahunaudit").select2({
          ajax: {
              url: '{!! route('s2.tahunaudit') !!}',
              dataType: 'json',
              data: function(params) {
                  return {
                      q: $.trim(params.term)
                  };
              },
              processResults: function(data) {
                  return {
                      results: data
                  };
              },
              cache: true
          },
        });


        $("#idbagian").select2({
          ajax: {
              url: '{!! route('s2.unitbagianall') !!}',
              dataType: 'json',
              data: function(params) {
                  return {
                      q: $.trim(params.term)
                  };
              },
              processResults: function(data) {
                  return {
                      results: data
                  };
              },
              cache: true
          },
        });

        $('#idbagian').on('change', function(){
            idbagian = $(this).val()
            $("#idsubbagian").val('');
            $("#idsubbagian").select2({
            placeholder: "Pilih Sub Bagian",
            ajax: {
                url: '{!!route("s2.subbagian")!!}',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term),
                        idbagian:idbagian
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            });
        })

        
        $('.btntambah').on('click', function() {
            $('.modal-title').html('TAMBAH AUDITOR')
            $('.form-standar').attr('action','{{route('userauditor.store')}}')
            $("#iddosen").append($("<option selected='selected'></option>")).trigger('change');
            $("#idbagian").append($("<option selected='selected'></option>")).trigger('change');
            $("#idsubbagian").append($("<option selected='selected'></option>")).trigger('change');
            $('#tahun').val('')
        })

        $('#tabel-auditor tbody').on('click', '.btnedit', function () {
            $('.modal-title').text('UBAH AUDITOR')
            $('.form-standar').attr('action', '{{route('userauditor.update')}}')
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data()
            console.log(data);
            $('#id').val(data.id)
            $("#iddosen").append($("<option selected='selected'></option>").val(data.iddosen).text(data.dosen.nama)).trigger('change');
            $("#idbagian").append($("<option selected='selected'></option>").val(data.idbagian).text(data.bagian.nama)).trigger('change');
            $("#idsubbagian").append($("<option selected='selected'></option>").val(data.idsubbagian).text(data.subbagian)).trigger('change');
            $('#tahun').val(data.tahun)
        });
    });


</script>
@endsection
