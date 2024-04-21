@extends('layouts.menu')

@section('title-head', 'Lowongan Magang')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('app-assets/plugins/cropper/cropper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/plugins/filepond/filepond.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/plugins/filepond/filepond-plugin-image-preview.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/plugins/filepond/filepond-upload.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/plugins/fancybox/jquery.fancybox.min.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Lowongan Magang</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Konten Website</a></li>
              <li class="breadcrumb-item active">Lowongan</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="jquery-val-form" class="forms-sample" action="{{route('web.lowongan.store')}}" method="post" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                            <div class="form-group col-12">
                                <label class="col-sm-12 col-form-label"><b>Tambah Gambar Lowongan Magang</b></label>
                                <div class="col-sm-12">
                                    <div class="body">
                                        <input type="file" class="upload-photo" name="gambar" required/>
                                    </div>
                                    <label class="col-form-label"><small>* file format <b>.jpg</b>and <b>.jpeg</b>, maximum size 2MB</small></label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="col-sm-12">
                                    <button type="submit" id="btn-submit"
                                    class="btn btn-icon btn-block btn-success"><i
                                        data-feather="save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($data as $d)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="{{ asset($d->file) }}" alt="" />
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <a href="{{ asset($d->file) }}" class="lightbox-image btn btn-sm btn-block btn-primary" style="border-radius: 0 0 0 0.5rem; margin: 0;" data-fancybox="images"><i data-feather='eye'></i> Detail
                                        </a>
                                    </div>
                                    <div class="col-6 pl-0">
                                        <form action="{{route('web.lowongan.delete')}}" onsubmit="return confirm('Lanjutkan proses hapus lowongan magang?')" method="post">
                                            <input type="hidden" name="id" value="{{ $d->id }}">
                                            <input type="hidden" name="file" value="{{ $d->file }}">
                                            <button type="submit" class="btn btn-sm btn-block btn-danger" style="border-radius: 0 0 0.5rem 0; margin: 0;"><i data-feather="trash-2"></i> Hapus</button>
                                            {{csrf_field()}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
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
<script src="{{ asset('app-assets/plugins/fancybox/jquery.fancybox.js') }}"></script>
<script>
    $('.lightbox-image').fancybox({
        openEffect  : 'fade',
        closeEffect : 'fade',
        helpers : {
            media : {}
        }
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
  </script>
@stop