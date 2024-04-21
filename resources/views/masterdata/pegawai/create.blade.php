@extends('layouts.menu')

<?php
  if($data == null) {
    $title = 'Tambah';
  }else {
    $title = 'Ubah';
  }
?>
@section('title-head', $title.' Data Pegawai')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('app-assets/plugins/cropper/cropper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/plugins/filepond/filepond.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/plugins/filepond/filepond-plugin-image-preview.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/plugins/filepond/filepond-upload.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/css/jquery.fancybox.min.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">{{$data == null ? 'Tambah' : 'Ubah'}} Data Pegawai
          </h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              @if ($data == null)
                <li class="breadcrumb-item"><a href="{{route('md.pegawai')}}">Master Data Pegawai</a></li>
                <li class="breadcrumb-item active">Tambah</li> 
              @else
                <li class="breadcrumb-item"><a href="{{route('md.pegawai.detail',$data->id)}}">Detail Pegawai</a></li>
                <li class="breadcrumb-item active">Ubah</li>
              @endif
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
            @if ($data == null)
              <form id="jquery-val-form" class="forms-sample" action="{{route('md.pegawai.store')}}" method="post" enctype="multipart/form-data" >
            @else
              <form id="jquery-val-form" class="forms-sample" action="{{route('md.pegawai.update')}}" method="post" enctype="multipart/form-data" >
            @endif
              <input type="hidden" name="idpegawai" id="idpegawai" value="{{$data == null ? '' : $data->id}}">
              <div class="row">
                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Penempatan</b></label>
                    <select class="form-control select2" id="idkantor" name="idkantor" required>
                      @if ($data != null)
                        <option value="{{$data->idkantor}}" selected>{{$data->kantor->nama}}</option>
                      @endif
                    </select>
                  </div>
                </div>

                <div class="col-xl-8 mb-1">
                  <div class="form-group">
                    <label><b>Nama Lengkap</b></label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{$data == null ? '' : $data->nama}}" required>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Panggilan</b> <small>(maksimal 12 karakter)</small></label>
                    <input type="text" maxlength="12" name="panggilan" id="panggilan" class="form-control" value="{{$data == null ? '' : $data->panggilan}}" required>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Tempat Lahir</b></label>
                    <input type="text" name="tplahir" id="tplahir" class="form-control" value="{{$data == null ? '' : $data->tplahir}}" required>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Tanggal Lahir</b></label>
                    <input type="text" name="tglahir" class="form-control flatpickr-basic" value="{{$data == null ? '' : $data->tglahir}}" autocomplete="off" placeholder="Pilih" style="background-color: white" required>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Jenis Kelamin</b></label>
                    <div class="row mx-0 mt-50">
                      <div class="custom-control custom-control-danger custom-radio mr-2 mb-50">
                        <input type="radio" @if($data != null) {{$data->idjk == 1 ? 'checked' : ''}} @endif id="jk" name="idjk" value="1" class="custom-control-input" required>
                        <label class="custom-control-label" for="jk">Laki-Laki</label>
                      </div>
                      <div class="custom-control custom-control-danger custom-radio mb-50">
                        <input type="radio" @if ($data != null) {{$data->idjk == 2 ? 'checked' : ''}} @endif id="jka" name="idjk" value="2" class="custom-control-input">
                        <label class="custom-control-label" for="jka">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Agama</b></label>
                    <select class="form-control select2" id="idagama" name="idagama" required>
                      @if ($data != null)
                        <option value="{{$data->idagama}}" selected>{{$data->agama->nama}}</option>
                      @endif
                    </select>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Kewarganegaraan</b></label>
                    <select class="form-control select2" id="idwn" name="idwn" required>
                      @if ($data != null)
                        <option value="{{$data->idwn}}" selected>{{$data->idwn == null ? '' : $data->wn->nama}}</option>
                      @endif
                    </select>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>NIK / Nomor Paspor</b></label>
                    <input type="number" name="nik" id="nik" class="form-control" value="{{$data == null ? '' : $data->detil->nik}}" required>
                  </div>
                </div>

                <div class="col-xl-8 mb-1">
                  <div class="form-group">
                    <label><b>Alamat Tinggal</b></label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{$data == null ? '' : $data->alamat}}" required>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Provinsi</b></label>
                    <select name="idprov" id="idprov" class="form-control select2" data-placeholder="Pilih">

                    </select>
                  </div>
                </div>
    
                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Kabupaten/Kota</b></label>
                    <select name="idkab" id="idkab" class="form-control select2" data-placeholder="Pilih Provinsi Terlebih Dulu">
                      @if ($data != null)
                        <option value="{{$data->idkab}}" selected>{{$data->idkab == null ? '' : $data->kabupaten->nama}}</option>
                      @endif
                    </select>
                  </div>
                </div>
    
                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Kecamatan</b></label>
                    <select name="idkec" id="idkec" class="form-control select2" data-placeholder="Pilih Kabupaten Terlebih Dulu">
                      @if ($data != null)
                        <option value="{{$data->idkec}}" selected>{{$data->idkec == null ? '' : $data->kecamatan->nama}}</option>
                      @endif
                    </select>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>NPWP</b></label>
                    <input type="text" name="npwp" id="npwp" class="form-control" value="{{$data == null ? '' : $data->detil->npwp}}">
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Jenis Kepegawaian</b></label>
                    <select class="form-control select2" name="idjenis" id="idjenis" data-placeholder="Pilih" required>
                      @if ($data != null)
                        <option value="{{$data->idjenis}}" selected>{{$data->jenis->nama}}</option>
                      @endif
                    </select>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Posisi / Jabatan</b></label>
                    <select class="form-control select2" name="idjabatan" id="idjabatan" data-placeholder="Pilih" required>
                      @if ($data != null)
                        <option value="{{$data->idjabatan}}" selected>{{$data->idjabatan == null ? '' : $data->jabatan->nama}}</option>
                      @endif
                    </select>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Nomor Telepon</b></label>
                    <input type="number" name="nohp" id="nohp" class="form-control" value="{{$data == null ? '' : $data->nohp}}" required>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Email</b></label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$data == null ? '' : $data->email}}" required>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Status Perkawinan</b></label>
                    <select class="form-control select2" name="idstatuskawin" id="idstatuskawin" data-placeholder="Pilih">
                      @if ($data != null)
                        <option value="{{$data->detil->idstatuskawin}}" selected>{{$data->detil->statuskawin->nama}}</option>
                      @endif
                    </select>
                  </div>
                </div>
                
                <div class="col-xl-12 mb-1">
                  <div class="form-group">
                    <label><b>Foto</b></label>
                    <input type="file" class="upload-photo" name="photos" data-allow-reorder="true" data-max-file-size="2MB" accept="image/jpeg,image/png,image/jpg" required>
                    <label><small>*format file <b>.jpeg</b> atau <b>.png</b>, ukuran maksimal 2MB</small></label>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Dokumen KTP</b></label>
                    <input type="file" class="dropify" name="ktps" @if ($data != null && $data->detil->dokktp != null) data-default-file="{{asset($data->detil->dokktp)}}"
                    @endif data-allowed-file-extensions="jpg jpeg png pdf" data-max-file-size="1M">
                    <label><small>*format file <b>.jpeg .png</b> atau <b>.pdf</b>, ukuran maksimal 1MB</small></label>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Dokumen KK</b></label>
                    <input type="file" class="dropify" name="kks" @if ($data != null && $data->detil->dokkk != null) data-default-file="{{asset($data->detil->dokkk)}}"
                    @endif data-allowed-file-extensions="jpg jpeg png pdf" data-max-file-size="1M">
                    <label><small>*format file <b>.jpeg .png</b> atau <b>.pdf</b>, ukuran maksimal 1MB</small></label>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Dokumen NPWP</b></label>
                    <input type="file" class="dropify" name="npwps" @if ($data != null && $data->detil->doknpwp != null) data-default-file="{{asset($data->detil->doknpwp)}}"
                    @endif data-allowed-file-extensions="jpg jpeg png pdf" data-max-file-size="1M">
                    <label><small>*format file <b>.jpeg .png</b> atau <b>.pdf</b>, ukuran maksimal 1MB</small></label>
                  </div>
                </div>

                <div class="col-xl-12">
                  <button type="submit" id="btn-submit" class="btn btn-icon btn-lg btn-block btn-success mb-2"><i data-feather="save"></i> Simpan</button>
                </div>
                
              </div>
              @csrf
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="modalCropper" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalCropperLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCropperLabel">Crop Gambar</h5>
      </div>
      <div class="modal-body">
        <div class="photo-crop-container">
          <div class="crop-preview-cont">
            <div class="img_container"></div>
            <button class="btn btn-sm btn-success waves-effect waves-float waves-light" id="crop_img">Simpan</button>
          </div>
          <!-- <div id="user_cropped_img"></div> -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('page-js')
<script src="{{asset('app-assets/plugins/filepond/filepond-plugin-file-encode.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/filepond/filepond-plugin-file-validate-size.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/filepond/filepond-plugin-file-validate-type.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/filepond/filepond-plugin-image-validate-size.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/filepond/filepond-plugin-image-preview.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/filepond/filepond.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/filepond/filepond.jquery.js')}}"></script>
<script src="{{asset('app-assets/plugins/cropper/cropper.min.js')}}"></script>
<script>
$(document).ready(function() {
  $("#idagama").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.agama")!!}',
        dataType: 'json',
        data: function (params) {
            return {
                q: $.trim(params.term)
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

  $("#idwn").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.wn")!!}',
        dataType: 'json',
        data: function (params) {
            return {
                q: $.trim(params.term)
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

  $("#idkantor").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.kantor")!!}',
        dataType: 'json',
        data: function (params) {
            return {
                q: $.trim(params.term)
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

  $("#idjabatan").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.jabatan")!!}',
        dataType: 'json',
        data: function (params) {
            return {
                q: $.trim(params.term)
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

  $("#idjenis").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.jenispegawai")!!}',
        dataType: 'json',
        data: function (params) {
            return {
                q: $.trim(params.term)
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

  $("#idstatuskawin").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.statuskawin")!!}',
        dataType: 'json',
        data: function (params) {
            return {
                q: $.trim(params.term)
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
  
  $("#idprov").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.provinsi")!!}',
        dataType: 'json',
        data: function (params) {
            return {
                q: $.trim(params.term)
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

  $('#idprov').on('change', function(){
    idprovinsi = $(this).val()
    $("#idkab").append($("<option selected='selected'></option>").val('').text('')).trigger('change');
    $("#idkec").append($("<option selected='selected'></option>").val('').text('')).trigger('change');
    $("#idkab").select2({
      placeholder: "Pilih",
      ajax: {
          url: '{!!route("s2.kabupaten")!!}',
          dataType: 'json',
          data: function (params) {
              return {
                  q: $.trim(params.term),
                  idprov:idprovinsi
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

  $('#idkab').on('change', function(){
    idkabupaten = $(this).val()
    $("#idkec").append($("<option selected='selected'></option>").val('').text('')).trigger('change');
    $("#idkec").select2({
      placeholder: "Pilih",
      ajax: {
          url: '{!!route("s2.kecamatan")!!}',
          dataType: 'json',
          data: function (params) {
              return {
                  q: $.trim(params.term),
                  idkab:idkabupaten
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

  if ($('#idpegawai').val() != null) {
    $.get('/masterdata/pegawai/getpegawai/'+$('#idpegawai').val(), function(data){
      $("#idprov").append($("<option selected='selected'></option>").val(data.idprov).text(data.provinsi.nama)).trigger('change');
      $("#idkab").append($("<option selected='selected'></option>").val(data.idkab).text(data.kabupaten.nama)).trigger('change');
      $("#idkec").append($("<option selected='selected'></option>").val(data.idkec).text(data.kecamatan.nama)).trigger('change');
    })
  };
});
</script>

<script>
  if ($('#idpegawai').val() != null) {
    var edit = 0;
  }
  // $(document).ready(function(){
      // Register filepond plugins
      $.fn.filepond.registerPlugin(
          FilePondPluginFileValidateSize,
          FilePondPluginFileValidateType,
          FilePondPluginImageValidateSize,
          FilePondPluginImagePreview,
          // FilePondPluginImageEdit,
          FilePondPluginFileEncode
      );

      // Initialise the filepond plugin with required options
      // $('.upload-photo').filepond({
      FilePond.create(
          document.querySelector('.upload-photo'), {
              labelIdle: '<div class="uploading-frame">Drag your photo here or <span class="filepond--label-action fontDarkOrange"> Click to upload </span></div>',
              checkValidity: true,
              dropValidation: true,
              acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
              imageValidateSizeMinWidth: 100,
              imageValidateSizeMinHeight: 100,
              labelMaxFileSize: 'Maximum file size allowed is {filesize}',
              labelFileProcessing: 'Generating file for cropping',
              labelFileProcessingComplete: 'Click to upload new Image.',
              storeAsFile: true,
              labelIdle: 'Tarik File ke sini atau <span class="filepond--label-action"> Klik </span> untuk memilih',
              maxFileSize: '2MB',
              required: true,
              allowReorder: true,
              // server: {
              //   process: function (fieldName, file, metadata, load, error, progress, abort) {
              //     load();
              //   },
              //   fetch: null,
              //   revert: null
              // }
          }
      );

      const pond = document.querySelector('.filepond--root');

      // Container to show the preview of uploaded image
      var photo_crop_container = $('.photo-crop-container');
      var crop_preview_cont = photo_crop_container.find('.crop-preview-cont');
      var filepond_img_Container = photo_crop_container.find('.img_container');
      // var photo_preview_container = $('#user_cropped_img');
      var img_cropping = '';

      // pond.getFile();
      var crop = 0;
      var jml_photo = [];
      // var first_photo = 0;
      var cropped_img = '';
      var file_add = '';
      var window_height = $(window).height();

      pond.addEventListener('FilePond:addfile', function (e, file) {
          // console.log(e, file, e.detail.file.id);
          if ($('#idpegawai').val() != null) {
            $.get('/masterdata/pegawai/getpegawai/'+$('#idpegawai').val(), function(data){
              if (data.detil.photo != null) {
                if (crop < 1 && edit > 0) {
                  $('#modalCropper').modal('show');
                  // console.log(crop);

                  file_add = e;
                }
              }else {
                if (crop == 0) {
                  if (e.detail.error == null) {
                      jml_photo.push(e);
                      
                      file_add = jml_photo[0];
                      $('#modalCropper').modal('show');
                  }
                } else if (crop == 1 && jml_photo.length) {
                    file_add = jml_photo[0];
                    $('#modalCropper').modal('show');
                } else if (crop == 1 && !jml_photo.length) {
                    crop = 0;
                } else {
                    crop = 0;
                }
              }
            })
          }else {
            if (crop == 0) {
              if (e.detail.error == null) {
                  jml_photo.push(e);
                  
                  file_add = jml_photo[0];
                  $('#modalCropper').modal('show');
              }
            } else if (crop == 1 && jml_photo.length) {
                file_add = jml_photo[0];
                $('#modalCropper').modal('show');
            } else if (crop == 1 && !jml_photo.length) {
                crop = 0;
            } else {
                crop = 0;
            }
          }
      });

      $('#modalCropper').on('shown.bs.modal', function () {
          crop_preview_cont.slideDown('slow');
          let image = new Image();
          image.src = URL.createObjectURL(file_add.detail.file.file);
          filepond_img_Container.append(image);
          img_cropping = filepond_img_Container.find('img');
          img_cropping.attr('src', image.src);
          img_cropping.cropper({
              viewMode: 2,
              dragMode: 'move',
              aspectRatio: 3 / 4,
              guides: true,
              cropBoxResizable: true,
              minContainerWidth: $('#modalCropper').find('.img_container').width(),
              minContainerHeight: 100
              // minCropBoxWidth: 500,
              // minCropBoxHeight: 292
          });
      });

      $('#crop_img').on('click', function (ev) {
          $('html,body').animate({
              scrollTop: $(".photo-crop-container").offset().top - 80
          }, 'slow');
          photo_crop_container.addClass('show-loader show-result');
          var cropped_img = img_cropping.cropper('getCroppedCanvas', {
              // width: 1200,
              // height: 700,
              imageSmoothingEnabled: false,
              imageSmoothingQuality: 'high',
          }).toDataURL('image/jpeg');
          // console.log(cropped_img);
          //   console.log(window.URL.createObjectURL(cropped_img));
          // "cropped_img" use this for reteriving cropped image data for further processing like saving in datase, etc.
          // photo_preview_container.html('').append('<img src=""/>');
          // photo_preview_container.find('img').attr('src', cropped_img);
          setTimeout(function () {
              photo_crop_container.removeClass('show-loader');
          }, 1900);
          $('.upload-photo').filepond('removeFile', file_add.detail.file.id);
          $('.upload-photo').filepond('addFile', cropped_img);
          setTimeout(function () {
              photo_crop_container.removeClass('show-result');
          }, 1000);
          crop_preview_cont.slideUp();
          // crop_preview_cont.html('');
          img_cropping.cropper('destroy').html('');
          $('#modalCropper').modal('hide');
          filepond_img_Container.html('');

          jml_photo.shift();
          crop = 1;
      });

      // pond.addEventListener('FilePond:removefile', function (e, file) {
      //     if (crop > 1) {
      //         crop = 0;
      //         console.log('hapus dr event');
      //     } else {
      //         crop = crop + 1;
      //     }
      // });
  // });

    if ($('#idpegawai').val() != null) {
      $.get('/masterdata/pegawai/getpegawai/'+$('#idpegawai').val(), function(data){
        pond.addEventListener('FilePond:removefile', function (e, file) {
          if (crop > 1) {
              crop = 0;
              console.log('hapus dr event');
          } else {
              crop = crop + 1;
          }

          if (edit < 1) {
              edit = edit + 1;
              crop = 0;
          }
        });

        if (data.detil.photo != null) {
          $('.upload-photo').filepond('addFile', '/../../../'+data.detil.photo);
        }
        
      })
    };
  </script>
@stop
