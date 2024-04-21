@extends('layouts.menu')

@section('title-head', 'Tambah Informasi')

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
          <h2 class="content-header-title float-left mb-0">Tambah Informasi
          </h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('web.informasi')}}">Konten Informasi</a></li>
              <li class="breadcrumb-item active">Tambah</li>
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
            <form id="jquery-val-form" class="forms-sample" action="{{route('web.informasi.store')}}" method="post" enctype="multipart/form-data" id="formdosen">
              <div class="row">
                <div class="col-xl-12 mb-1">
                  <div class="form-group">
                    <label><b>Gambar</b></label>
                    <input type="file" class="upload-photo" name="covers" data-allow-reorder="true" data-max-file-size="2MB" accept="image/jpeg,image/png,image/jpg" required>
                    <label><small>*gambar <b>landscape</b>, format file <b>.jpg</b>, <b>.jpeg</b> atau <b>.png</b>, ukuran maksimal 2MB</small></label>
                  </div>
                </div>

                <div class="col-xl-12 mb-1">
                  <div class="form-group">
                    <label><b>Judul Informasi</b></label>
                    <input type="text" name="judul" id="judul" class="form-control" required>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Kategori Informasi</b></label>
                    <select class="form-control select2" name="idjenis" id="idjenis"  data-placeholder="Pilih" required>

                    </select>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Status Informasi</b></label>
                    <select class="form-control show-tick ms select2" name="status"  data-placeholder="Pilih" required>
                      <option></option>
                      <option value="0">Draft</option>
                      <option value="1">Publish</option>
                    </select>
                  </div>
                </div>

                <div class="col-xl-4 mb-1">
                  <div class="form-group">
                    <label><b>Tanggal Publish</b></label>
                    <input type="text" class="form-control flatpickr-basic" name="tglpublish" placeholder="Pilih" style="background-color: white" required>
                  </div>
                </div>

                <div class="col-xl-12 mb-1">
                  <div class="form-group">
                    <label><b>Isi</b></label>
                    <input type="hidden" name="isi" id="isi">
                    <section class="full-editor">
                      <div id="full-wrapper">
                        <div id="full-container">
                          <div class="editor">
                            
                          </div>
                        </div>
                      </div>
                    </section>
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
<script src="{{asset('app-assets/vendors/js/editors/quill/katex.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/editors/quill/quill.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/forms/form-quill-editor.js')}}"></script>
<script>
$(document).ready(function() {
  $('#btn-submit').on('click', function() {
    var myEditor = document.querySelector('.editor')
    var html = myEditor.children[0].innerHTML
    $('#isi').val(html)
  })

  $("#idjenis").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.jenisinformasi")!!}',
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
});
</script>

<script>
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
              aspectRatio: 37 / 24,
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
  </script>
@stop
