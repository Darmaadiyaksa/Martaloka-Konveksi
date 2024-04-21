@extends('layouts.menu')

@section('title-head', 'Detail Soal Simulasi')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Detail Soal Simulasi</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Soal Simulasi</a></li>
              <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row match-height">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body row mx-0 align-items-start">
            <div class="avatar bg-light-danger p-50 mr-1">
              <div class="avatar-content">
                <i data-feather="user-check" class="font-medium-5"></i>
              </div>
            </div>
            <div>
              <p class="card-text mb-0">Bidang</p>
              <h5 class="font-weight-bolder mb-0 text-danger">{{$bidang->nama}}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="card">
          <div class="card-body row mx-0 align-items-start">
            <div class="avatar bg-light-primary p-50 mr-1">
              <div class="avatar-content">
                <i data-feather="book-open" class="font-medium-5"></i>
              </div>
            </div>
            <div>
              <p class="card-text mb-0">Soal SJT</p>
              <h5 class="font-weight-bolder mb-0 text-primary">{{$soal->where('idjenis',1)->count()}}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="card">
          <div class="card-body row mx-0 align-items-start">
            <div class="avatar bg-light-info p-50 mr-1">
              <div class="avatar-content">
                <i data-feather="book-open" class="font-medium-5"></i>
              </div>
            </div>
            <div>
              <p class="card-text mb-0">Soal PCK</p>
              <h5 class="font-weight-bolder mb-0 text-info">{{$soal->where('idjenis',2)->count()}}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="card">
          <div class="card-body row mx-0 align-items-start">
            <div class="avatar bg-light-success p-50 mr-1">
              <div class="avatar-content">
                <i data-feather="book-open" class="font-medium-5"></i>
              </div>
            </div>
            <div>
              <p class="card-text mb-0">Total</p>
              <h5 class="font-weight-bolder mb-0 text-success">{{$soal->count()}}</h5>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="text-center text-lg-left mb-1">
          <button class="btn btn-danger my-25 my-lg-0" type="button" id="btntambahsoal" value="" data-toggle="modal" data-target="#modal-soal" data-backdrop="static" data-keyboard="false"><i data-feather="plus"></i> Tambah Soal</button>
        </div>
      </div>
      
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover" id="tabelsoal">
              <thead class="text-center">
                <th></th>
                <th>No</th>
                <th>Soal</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                @foreach ($soal as $ds)
                  <tr>
                    <td>{{$ds->id}}</td>
                    <td class="text-center">
                      {{$no}}
                      <div>
                        @if ($ds->idjenis == 1)
                          <div class="badge badge-light-primary">SJT</div>
                        @else
                          <div class="badge badge-light-info">PCK</div>
                        @endif
                      </div>
                    </td>
                    <td>
                      {!! $ds->soal !!}
                      <hr class="my-50">
                      <ul class="border-option mb-0">
                        <?php $i = 0; ?>
                        @foreach ($ds->jawaban as $j)
                          <li>
                            <div class="{{$j->benar == 1 ? 'd-flex justify-content-between align-items-start' : ''}}">
                              <div>
                                {!! $j->jawaban !!}
                              </div>
                              @if ($j->benar == 1)
                                <div class="badge badge-info ml-50"><i data-feather="key"></i></div>
                              @endif
                            </div>
                          </li>
                          @if ($i < count($ds->jawaban) - 1)
                            <hr class="my-50">
                          @endif
                          <?php $i++; ?>
                        @endforeach
                      </ul>
                    </td>
                    <td class="text-center" style="white-space: nowrap">
                      <button class="btn btn-sm btn-outline-warning btnubahsoal" style="white-space: nowrap" type="button" value="{{$ds->id}}" data-toggle="modal" data-target="#modal-soal" data-backdrop="static" data-keyboard="false"><i data-feather="edit"></i> Ubah</button>
                      <a href="#" class="btn btn-icon btn-sm btn-outline-info" style="white-space: nowrap" target="_blank" title="Tampilan Soal"><i data-feather="eye"></i></a>
                    </td>
                  </tr>
                  <?php $no++; ?>
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

@section('modal')
<div class="modal fade text-left" id="modal-soal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-soal">Tambah Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="jquery-val-form" class="forms-sample form-soal" action="#" method="post" enctype="multipart/form-data">
          <input type="hidden" name="idprodi" value="{{$bidang->id}}">
          <input type="hidden" name="idsoal" id="idsoal">
          <div class="row">
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Jenis Soal</b></label>
                <select class="form-control select2 idjenis" name="idjenis" data-placeholder="Pilih" required>
                  <option></option>
                  <option value="1">Situational Judgement Test</option>
                  <option value="2">Pedagogical Content Knowledge</option>
                </select>
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Soal</b></label>
                <input type="hidden" name="soal" id="soal" required>
                <section class="full-editor">
                  <div id="toolbar-container">
                    @include('layouts.quilltoolbar')
                  </div>
                  <div class="editorsoal" id="e-soal"></div>
                </section>
                <label class="text-danger blank-notif">Bagian ini wajib diisi!</label>
              </div>
            </div>

            <div class="col-xl-12 mb-1 jawaban-pg">
              <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                  <thead class="text-center">
                    <th>Pilihan Jawaban</th>
                    <th class="px-50" style="width: 1px"><i data-feather="key"></i></th>
                  </thead>
                  <tbody>
                    @for ($i = 0; $i < 5; $i++)
                      <tr>
                        <td>
                          <input type="hidden" id="jawaban-{{$i}}" name="jawaban[]" autocomplete="off" required>
                          <section class="full-editor">
                            <div id="toolbar-container-{{$i}}">
                              @include('layouts.quilltoolbar')
                            </div>
                            <div id="e-jawaban-{{$i}}"></div>
                          </section>
                        </td>
                        <td class="text-center">
                          <div class="custom-control custom-control-success custom-control-inline custom-radio ml-50 mr-0">
                            <input type="radio" name="benar" class="custom-control-input jawabanbenar" value="{{$i}}" id="benar-{{$i}}">
                            <label class="custom-control-label" for="benar-{{$i}}"></label>
                          </div>
                        </td>
                      </tr>
                    @endfor
                  </tbody>
                </table>
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
<script src="{{asset('app-assets/vendors/js/editors/quill/katex.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/editors/quill/quill.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/editors/quill/image-resize.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/forms/form-quill-editor.js')}}"></script>
<script>
$(document).ready(function() {
  var quill = new Quill('.editorsoal', {
      modules: { 
        toolbar: '#toolbar-container',
        imageResize: { displaySize: true },
      },
      theme: 'snow'
  });

  var quill0 = new Quill('#e-jawaban-0', {
      modules: { 
        toolbar: '#toolbar-container-0',
        imageResize: { displaySize: true },
      },
      theme: 'snow'
  });

  var quill1 = new Quill('#e-jawaban-1', {
      modules: { 
        toolbar: '#toolbar-container-1',
        imageResize: { displaySize: true },
      },
      theme: 'snow'
  });

  var quill2 = new Quill('#e-jawaban-2', {
      modules: { 
        toolbar: '#toolbar-container-2',
        imageResize: { displaySize: true },
      },
      theme: 'snow'
  });

  var quill3 = new Quill('#e-jawaban-3', {
      modules: { 
        toolbar: '#toolbar-container-3',
        imageResize: { displaySize: true },
      },
      theme: 'snow'
  });

  var quill4 = new Quill('#e-jawaban-4', {
      modules: { 
        toolbar: '#toolbar-container-4',
        imageResize: { displaySize: true },
      },
      theme: 'snow'
  });

  var table = $('#tabelsoal').DataTable({
    paging: false,
    info: false,
    autoWidth: false,
    "drawCallback": function( settings ) {
      feather.replace();
    },
    dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarta px-2 px-lg-0">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
    order: [[ 0, "asc" ]],
    columnDefs: [
      {
        "targets": [ 0 ],
        "visible": false,
        "searchable": false,
        "orderable": true
      },
    ],
  });

  $('#btntambahsoal').on('click', function(){
    $('#modal-title-soal').text('Tambah Soal')
    $('.form-soal').attr('action', "{{route('pengaturan.soal.store')}}")
    $('.idjenis').val('').trigger('change')
    $('.jawabansoal').val('')
    $('.jawabanbenar').prop('checked', false)
    $('#idsoal').val('')
    $('#soal').val('')
    $('.blank-notif').hide()
    quill.pasteHTML('');
    quill1.pasteHTML('');
    quill0.pasteHTML('');
    quill2.pasteHTML('');
    quill3.pasteHTML('');
    quill4.pasteHTML('');
  })

  $('.btnubahsoal').on('click', function(){
    var idsoal = $(this).val()
    $('#modal-title-soal').text('Ubah Soal')
    $('.form-soal').attr('action', "{{route('pengaturan.soal.update')}}")
    $('.blank-notif').hide()
    $.get('/pengaturan/soal/getsoal/'+idsoal, function(data){
      $('.idjenis').val(data.idjenis).trigger('change')
      $('#idsoal').val(data.id)
      $('#soal').val(data.soal)
      quill.pasteHTML(data.soal);
      quill1.pasteHTML('');
      quill0.pasteHTML('');
      quill2.pasteHTML('');
      quill3.pasteHTML('');
      quill4.pasteHTML('');
      $('.jawabansoal').val('')
      $('.jawabanbenar').prop('checked', false)
      $.each(data.jawaban, function(i,e){
        $('#jawaban-'+i).val(e.jawaban)
        if (e.benar == 1) {
          $('#benar-'+i).prop('checked', true)
        }
        if (i == 0) {
          quill0.pasteHTML(e.jawaban);
        }else if (i == 1) {
          quill1.pasteHTML(e.jawaban);
        }else if (i == 2) {
          quill2.pasteHTML(e.jawaban);
        }else if (i == 3) {
          quill3.pasteHTML(e.jawaban);
        }else if (i == 4) {
          quill4.pasteHTML(e.jawaban);
        }
      });
    })
  })

  $('#btn-submit').on('click', function(e) {
    var myEditor = document.querySelector('#e-soal')
    var html = myEditor.children[0].innerHTML
    $('#soal').val(html)
    if (html == '<p><br></p>') {
      $('.blank-notif').show()
      e.preventDefault()
    }

    var myEditor0 = document.querySelector('#e-jawaban-0')
    var html0 = myEditor0.children[0].innerHTML
    if (html0 != '<p><br></p>') {
      $('#jawaban-0').val(html0)
    }

    var myEditor1 = document.querySelector('#e-jawaban-1')
    var html1 = myEditor1.children[0].innerHTML
    if (html1 != '<p><br></p>') {
      $('#jawaban-1').val(html1)
    }

    var myEditor2 = document.querySelector('#e-jawaban-2')
    var html2 = myEditor2.children[0].innerHTML
    if (html2 != '<p><br></p>') {
      $('#jawaban-2').val(html2)
    }

    var myEditor3 = document.querySelector('#e-jawaban-3')
    var html3 = myEditor3.children[0].innerHTML
    if (html3 != '<p><br></p>') {
      $('#jawaban-3').val(html3)
    }

    var myEditor4 = document.querySelector('#e-jawaban-4')
    var html4 = myEditor4.children[0].innerHTML
    if (html4 != '<p><br></p>') {
      $('#jawaban-4').val(html4)
    }
  })
});
</script>
@stop
