@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.service.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.services.update", [$service->id]) }}" enctype="multipart/form-data" id="submitServiceForm" class="form-horizontal" novalidate="">
            @method('PUT')
            @csrf
            <input type="hidden" name="service_id" id="service_id" value="{{ $service->id }}">

                            
<div class="row">
  <div class="col-7 col-sm-9">
      <div class="tab-content" id="vert-tabs-right-tabContent">
          <div class="tab-pane fade show active" id="vert-tabs-right-general" role="tabpanel" aria-labelledby="vert-tabs-right-general-tab">
              @include('admin.services.partials.general')

          </div>
          <div class="tab-pane fade" id="vert-tabs-right-images"    role="tabpanel" aria-labelledby="vert-tabs-right-images-tab">
              @include('admin.services.partials.images')
          </div>           
       
          <div class="tab-pane fade" id="vert-tabs-right-seo"      role="tabpanel" aria-labelledby="vert-tabs-right-seo-tab">
              @include('admin.services.partials.seo')
          </div>

          <div class="tab-pane fade" id="vert-tabs-right-settings" role="tabpanel" aria-labelledby="vert-tabs-right-settings-tab">
              @include('admin.services.partials.settings')
          </div>

          <div class="tab-pane fade" id="vert-tabs-right-content-section" role="tabpanel" aria-labelledby="vert-tabs-right-content-section-tab">
            @includeIf('admin.services.partials.content-section', ['contentSections' => $service->servicesContentSections])
        </div>

      </div>
  </div>

  <div class="col-5 col-sm-3">
      <div class="nav flex-column nav-tabs nav-tabs-right h-100" id="vert-tabs-right-tab" role="tablist" aria-orientation="vertical">

          <a class="nav-link active" id="vert-tabs-right-general-tab" data-toggle="pill" href="#vert-tabs-right-general" role="tab" aria-controls="vert-tabs-right-general" aria-selected="true">General</a>

           <a class="nav-link" id="vert-tabs-right-images-tab" data-toggle="pill" href="#vert-tabs-right-images" role="tab" aria-controls="vert-tabs-right-images" aria-selected="true">Images</a>
           
          <a class="nav-link" id="vert-tabs-right-seo-tab" data-toggle="pill" href="#vert-tabs-right-seo" role="tab" aria-controls="vert-tabs-right-seo" aria-selected="false">SEO META</a>

          <a class="nav-link" id="vert-tabs-right-settings-tab" data-toggle="pill" href="#vert-tabs-right-settings" role="tab" aria-controls="vert-tabs-right-settings" aria-selected="false">Settings</a>

          <a class="nav-link" id="vert-tabs-right-content-section-tab" data-toggle="pill" href="#vert-tabs-right-content-section" role="tab" aria-controls="vert-tabs-right-content-section" aria-selected="false">Content Section</a>


      </div>
  </div>




</div>


<hr>
          
          <div class="form-group">
            <button class="btn btn-danger" type="submit">
                {{ trans('global.save_and_close') }}
            </button>

            <button class="btn btn-primary" id="save-and-preview" type="button">
              {{ trans('global.save_and_preview') }}
          </button>
        </div>
        </form>
    </div>
</div>


<!-- The add Content Section Modal -->
<div class="modal" id="addContentSectionModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
  
      </div>
    </div>
  </div>

@endsection

@section('scripts')

<script>

$('#save-and-preview').click(function(){

$('#submitServiceForm').validate({
      rules: {
        'title': {
            required: true
        },
        // 'categories[]': {
        //     required: true
        // },
      },
      messages: {
        title: "Please Enter Title",
        // 'categories[]': "You must select at least one category. Without it the combined media page will error out.",
    }
});

if ($('#submitServiceForm').valid()) // check if form is valid
  {
      $this=$(this);
      $loader='<div class="spinner-border text-dark" role="status">'+
                '<span class="sr-only">Loading...</span>'+
                '</div>';
      $this.html($loader);
      var formData = $('#submitServiceForm').serializeArray();

      formData.push({name: "preview", value: 1});

      // var text1=getDataFromTheText1Editor();
      // var text2=getDataFromTheText2Editor();

      // // Find and replace `content` if there
      // for (index = 0; index < formData.length; ++index) {
      //     if (formData[index].name == "service_text") {
      //       formData[index].value = text1;
      //         break;
      //     }
      // }

      // // Find and replace `content` if there
      // for (index = 0; index < formData.length; ++index) {
      //     if (formData[index].name == "service_text_2") {
      //       formData[index].value = text2;
      //         break;
      //     }
      // }

        $.ajax({
            type: 'POST',
            url: '{{ route("admin.services.update", [$service->id]) }}',
            dataType: 'json',
            data: formData,
            success: function(resultData) {
              $this.html("{{ trans('global.save_and_preview') }}");
              window.open("{{ url('services') }}/"+resultData, '_blank'); 
             }
        });

  }

});
  updateIndexContentSection = function(e, ui) {
          $('td.index', ui.item.parent()).each(function (i) {
              $(this).html(i + 1);
          });
      };
      $('.ContentSectionSort tbody').sortable({
        cursor: 'move',
        axis: 'y',
        stop: updateIndexContentSection,
        update: function(e, ui) {
          $(this).sortable('refresh');
          var params = {};
          params = $('.ContentSectionOrders').serializeArray();
          var pid=$('#service_id').val();
          //console.log('params',params);
          var _token = $('input[name="_token"]').val();
            $.ajax({
              url:'{{ url("/admin/ChangeServiceContentSectionOrder") }}',
              method:"POST",
              data: {
                  params: params,pid:pid,_token:_token
              },
              success:function(response) {
  
              }
            })
          }
      });
</script>

<script>
  let theText1Editor;
  let theText2Editor;

    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.services.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $service->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  // var allEditors = document.querySelectorAll('.ckeditor');
  // for (var i = 0; i < allEditors.length; ++i) {
  //   ClassicEditor.create(
  //     allEditors[i], {
  //       extraPlugins: [SimpleUploadAdapter]
  //     }
  //   );
  // }

  // var allEditors = document.querySelectorAll('#service_text');
  // for (var i = 0; i < allEditors.length; ++i) {
  //   ClassicEditor.create(
  //     allEditors[i], {
  //       extraPlugins: [SimpleUploadAdapter]
  //     }
  //   ).then( editor => {
  //       // CKEditorInspector.attach( editor );
  //       theText1Editor = editor;
  //   } )
  // }

  // var alltext2Editors = document.querySelectorAll('#service_text_2');
  // for (var i = 0; i < alltext2Editors.length; ++i) {
  //   ClassicEditor.create(
  //     alltext2Editors[i], {
  //       extraPlugins: [SimpleUploadAdapter]
  //     }
  //   ).then( editor => {
  //       // CKEditorInspector.attach( editor );
  //       theText2Editor = editor;
  //   } )
  // }


});

function getDataFromTheText1Editor() {
  return theText1Editor.getData();
}

function getDataFromTheText2Editor() {
  return theText2Editor.getData();
}
</script>

<script>
    Dropzone.options.featuredImageDropzone = {
    url: '{{ route('admin.services.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4086,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="featured_image"]').remove()
      $('form').append('<input type="hidden" name="featured_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="featured_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($service) && $service->featured_image)
      var file = {!! json_encode($service->featured_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="featured_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    var uploadedContentImagesMap = {}
Dropzone.options.contentImagesDropzone = {
    url: '{{ route('admin.services.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 805,
      height: 605
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="content_images[]" value="' + response.name + '">')
      uploadedContentImagesMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedContentImagesMap[file.name]
      }
      $('form').find('input[name="content_images[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($service) && $service->content_images)
      var files = {!! json_encode($service->content_images) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="content_images[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.bannerDropzone = {
    url: '{{ route('admin.services.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="banner"]').remove()
      $('form').append('<input type="hidden" name="banner" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="banner"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($service) && $service->banner)
      var file = {!! json_encode($service->banner) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="banner" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection