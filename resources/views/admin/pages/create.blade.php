@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.page.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pages.store") }}" enctype="multipart/form-data">
            @csrf
           
            <div class="row">
              <div class="col-7 col-sm-9">
                  <div class="tab-content" id="vert-tabs-right-tabContent">
                      <div class="tab-pane fade show active" id="vert-tabs-right-general" role="tabpanel" aria-labelledby="vert-tabs-right-general-tab">
                          @include('admin.pages.partials.general')
          
                      </div>
                      <div class="tab-pane fade" id="vert-tabs-right-images"    role="tabpanel" aria-labelledby="vert-tabs-right-images-tab">
                          @include('admin.pages.partials.images')
          
                      </div>
          
                      <div class="tab-pane fade" id="vert-tabs-right-seo"      role="tabpanel" aria-labelledby="vert-tabs-right-seo-tab">
                          @include('admin.pages.partials.seo')
                      </div>

                      <div class="tab-pane fade" id="vert-tabs-right-settings" role="tabpanel" aria-labelledby="vert-tabs-right-settings-tab">
                        @include('admin.pages.partials.settings')
                    </div>
                    
                      <div class="tab-pane fade" id="vert-tabs-right-content-section" role="tabpanel" aria-labelledby="vert-tabs-right-content-section-tab">
                      </div>
                      <div class="tab-pane fade" id="vert-tabs-right-masthead" role="tabpanel" aria-labelledby="vert-tabs-right-masthead-tab">
                        @include('admin.pages.partials.masthead')
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
                      <a class="nav-link" id="vert-tabs-right-masthead-tab" data-toggle="pill" href="#vert-tabs-right-masthead" role="tab" aria-controls="vert-tabs-right-masthead" aria-selected="false">Masthead</a>
                  </div>
              </div>
          
          </div>
          
          
          <hr>
            <div class="form-group">
                <button class="btn btn-info" type="submit">
                    Next
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
$('#use_textonly_header').click(function(){
    if($(this).prop('checked') == true){
      $('#use_textonly_header_box').show();
      $('#use_featured_image_header_box').hide();
      $('#use_svg_header_box').hide();

      $('#use_svg_header').prop('checked',false);
      $('#use_featured_image_header').prop('checked',false);
    }else{
      $('#use_textonly_header_box').hide();
    }
  });

  $('#use_svg_header').click(function(){
    if($(this).prop('checked') == true){
      $('#use_featured_image_header_box').show();
      $('#use_textonly_header_box').hide();
      $('#use_svg_header_box').hide();

      $('#use_textonly_header').prop('checked',false);
      $('#use_featured_image_header').prop('checked',false);
    }else{
      $('#use_featured_image_header_box').hide();
    }
  });

  $('#use_featured_image_header').click(function(){
    if($(this).prop('checked') == true){

      $('#use_featured_image_header_box').hide();
      $('#use_textonly_header_box').show();
      $('#use_svg_header_box').show();

      $('#use_textonly_header').prop('checked',false);
      $('#use_svg_header').prop('checked',false);
    }else{
      $('#use_textonly_header_box').hide();
      $('#use_svg_header_box').hide();
    }
  });


</script>

<script>
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
                xhr.open('POST', '{{ route('admin.pages.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $contentPage->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
  Dropzone.options.photosDropzone = {
  url: '{{ route('admin.pages.storeMedia') }}',
  maxFilesize: 10, // MB
  acceptedFiles: '.jpeg,.jpg,.png,.gif',
  maxFiles: 10,
  addRemoveLinks: true,
  headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
  },
  params: {
    size: 10,
    width: 1200,
    height: 500
  },
  success: function (file, response) {
    $('form').find('input[name="photos"]').remove()
    $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
  },
  removedfile: function (file) {
    file.previewElement.remove()
    if (file.status !== 'error') {
      $('form').find('input[name="photos[]"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    }
  },
  init: function () {
@if(isset($page) && $page->photos)
    var file = {!! json_encode($page->photos) !!}
        this.options.addedfile.call(this, file)
    this.options.thumbnail.call(this, file, file.preview)
    file.previewElement.classList.add('dz-complete')
    $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
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
  var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
  url: '{{ route('admin.pages.storeMedia') }}',
  maxFilesize: 10, // MB
  addRemoveLinks: true,
  headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
  },
  params: {
    size: 10
  },
  success: function (file, response) {
    $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
    uploadedAttachmentsMap[file.name] = response.name
  },
  removedfile: function (file) {
    file.previewElement.remove()
    var name = ''
    if (typeof file.file_name !== 'undefined') {
      name = file.file_name
    } else {
      name = uploadedAttachmentsMap[file.name]
    }
    $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
  },
  init: function () {
@if(isset($page) && $page->attachments)
        var files =
          {!! json_encode($page->attachments) !!}
            for (var i in files) {
            var file = files[i]
            this.options.addedfile.call(this, file)
            file.previewElement.classList.add('dz-complete')
            $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
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
    Dropzone.options.featuredImageDropzone = {
    url: '{{ route('admin.pages.storeMedia') }}',
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
@if(isset($contentPage) && $contentPage->featured_image)
      var file = {!! json_encode($contentPage->featured_image) !!}
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
@endsection