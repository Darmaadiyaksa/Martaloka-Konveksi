@extends('layouts.menu')

@section('title-head', 'Rekapitulasi')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Rekapitulasi</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Rekapitulasi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="tabel-auditor">
                            <thead class="text-center">
                                <tr>
                                    <th>Tahun Audit</th>
                                    <th>Bagian</th>
                                    <th>Sub Bagian</th>
                                    <th>Auditee</th>
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
          ajax: '{!! route('rekap.dt') !!}',
          columns: [
              { data: 'tahun', name: 'tahun', class: 'text-center'},
              { data: 'bagian.nama', name: 'bagian.nama'},
              { data: 'subbagian', name: 'subbagian'},
              { data: 'kaprodi.dosen.nama', name: 'kaprodi.dosen.nama'},
              { data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
          ],
          order:[[0,"asc"]],
        });
        $.fn.DataTable.ext.pager.numbers_length = 5;
    });


</script>
@endsection
