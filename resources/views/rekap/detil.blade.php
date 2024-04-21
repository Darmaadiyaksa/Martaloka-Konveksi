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
                            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Rekapitulasi</a></li>
                            <li class="breadcrumb-item active">Detail</li>
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
                        <form action="{{ route('rekap.cetak') }}" target="_blank" method="post">
                            <input type="hidden" name="idbagian" value="{{$idbagian}}">
                            <input type="hidden" name="idsubbagian" value="{{$idsubbagian}}">
                            <input type="hidden" name="tahun" value="{{$tahun}}">
                        <button class="btn btn-primary mr-1"><i data-feather="printer"></i> Cetak Rekapitulasi</button>
                        @csrf
                        </form>
                        <table class="table table-bordered table-hover" id="tabel-rekap">
                            <thead class="text-center">
                                <tr>
                                    <th></th>
                                    <th>Standar Indikator</th>
                                    <th>Skor Prodi</th>
                                    <th>Skor Auditor</th>
                                    <th>Auditor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{$item->idstandar}}</td>
                                        <td>{!!$item->indikator->indikator!!}</td>
                                        <td class="text-center">{{$item->peringkatauditi->skor}}</td>
                                        <td class="text-center">{{$item->peringkatauditor->skor}}</td>
                                        <td>{{$item->dosenauditor->nama}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js')
<script>
    $(document).ready(function() {
        var table = $('#tabel-rekap').DataTable({
            autoWidth: false,
            "drawCallback": function( settings ) {
            feather.replace();
            },
            dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
            order: [[0,'asc']],
            columnDefs: [
              {
              "targets": [ 0 ],
              "visible": false,
              "searchable": false,
              "orderable": true
              },
            ],
        });
    });
</script>
@endsection