@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.service.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.services.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.service.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sub_title">{{ trans('cruds.service.fields.sub_title') }}</label>
                            <input class="form-control" type="text" name="sub_title" id="sub_title" value="{{ old('sub_title', '') }}">
                            @if($errors->has('sub_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sub_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.sub_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="service_text">{{ trans('cruds.service.fields.service_text') }}</label>
                            <textarea class="form-control ckeditor" name="service_text" id="service_text">{!! old('service_text') !!}</textarea>
                            @if($errors->has('service_text'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('service_text') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.service_text_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="service_text_2">{{ trans('cruds.service.fields.service_text_2') }}</label>
                            <textarea class="form-control ckeditor" name="service_text_2" id="service_text_2">{!! old('service_text_2') !!}</textarea>
                            @if($errors->has('service_text_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('service_text_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.service_text_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">{{ trans('cruds.service.fields.excerpt') }}</label>
                            <textarea class="form-control" name="excerpt" id="excerpt">{{ old('excerpt') }}</textarea>
                            @if($errors->has('excerpt'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('excerpt') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.excerpt_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="price">{{ trans('cruds.service.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '00.00') }}" step="0.01">
                            @if($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="featured_image">{{ trans('cruds.service.fields.featured_image') }}</label>
                            <div class="needsclick dropzone" id="featured_image-dropzone">
                            </div>
                            @if($errors->has('featured_image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('featured_image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.featured_image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="content_images">{{ trans('cruds.service.fields.content_images') }}</label>
                            <div class="needsclick dropzone" id="content_images-dropzone">
                            </div>
                            @if($errors->has('content_images'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content_images') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.content_images_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="meta_title">{{ trans('cruds.service.fields.meta_title') }}</label>
                            <input class="form-control" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', '') }}">
                            @if($errors->has('meta_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('meta_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.meta_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="meta_description">{{ trans('cruds.service.fields.meta_description') }}</label>
                            <input class="form-control" type="text" name="meta_description" id="meta_description" value="{{ old('meta_description', '') }}">
                            @if($errors->has('meta_description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('meta_description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.meta_description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="facebook_title">{{ trans('cruds.service.fields.facebook_title') }}</label>
                            <input class="form-control" type="text" name="facebook_title" id="facebook_title" value="{{ old('facebook_title', '') }}">
                            @if($errors->has('facebook_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('facebook_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.facebook_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="facebook_desc">{{ trans('cruds.service.fields.facebook_desc') }}</label>
                            <input class="form-control" type="text" name="facebook_desc" id="facebook_desc" value="{{ old('facebook_desc', '') }}">
                            @if($errors->has('facebook_desc'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('facebook_desc') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.facebook_desc_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="banner">{{ trans('cruds.service.fields.banner') }}</label>
                            <div class="needsclick dropzone" id="banner-dropzone">
                            </div>
                            @if($errors->has('banner'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('banner') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.banner_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="published" value="0">
                                <input type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                                <label for="published">{{ trans('cruds.service.fields.published') }}</label>
                            </div>
                            @if($errors->has('published'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('published') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.published_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="slug">{{ trans('cruds.service.fields.slug') }}</label>
                            <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                            @if($errors->has('slug'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.slug_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
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
                xhr.open('POST', '{{ route('frontend.services.storeCKEditorImages') }}', true);
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
    Dropzone.options.featuredImageDropzone = {
    url: '{{ route('frontend.services.storeMedia') }}',
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
    url: '{{ route('frontend.services.storeMedia') }}',
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
    url: '{{ route('frontend.services.storeMedia') }}',
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