@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.reply.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.replies.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="author_id">{{ trans('cruds.reply.fields.author') }}</label>
                            <select class="form-control select2" name="author_id" id="author_id">
                                @foreach($authors as $id => $entry)
                                    <option value="{{ $id }}" {{ old('author_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('author'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('author') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reply.fields.author_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="published" value="0">
                                <input type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 ? 'checked' : '' }}>
                                <label for="published">{{ trans('cruds.reply.fields.published') }}</label>
                            </div>
                            @if($errors->has('published'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('published') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reply.fields.published_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="private" value="0">
                                <input type="checkbox" name="private" id="private" value="1" {{ old('private', 0) == 1 ? 'checked' : '' }}>
                                <label for="private">{{ trans('cruds.reply.fields.private') }}</label>
                            </div>
                            @if($errors->has('private'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('private') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reply.fields.private_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="best_answer" value="0">
                                <input type="checkbox" name="best_answer" id="best_answer" value="1" {{ old('best_answer', 0) == 1 ? 'checked' : '' }}>
                                <label for="best_answer">{{ trans('cruds.reply.fields.best_answer') }}</label>
                            </div>
                            @if($errors->has('best_answer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('best_answer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reply.fields.best_answer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="thread_id">{{ trans('cruds.reply.fields.thread') }}</label>
                            <select class="form-control select2" name="thread_id" id="thread_id">
                                @foreach($threads as $id => $entry)
                                    <option value="{{ $id }}" {{ old('thread_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('thread'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('thread') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reply.fields.thread_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="content_area">{{ trans('cruds.reply.fields.content_area') }}</label>
                            <textarea class="form-control ckeditor" name="content_area" id="content_area">{!! old('content_area') !!}</textarea>
                            @if($errors->has('content_area'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content_area') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reply.fields.content_area_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="attachements">{{ trans('cruds.reply.fields.attachements') }}</label>
                            <div class="needsclick dropzone" id="attachements-dropzone">
                            </div>
                            @if($errors->has('attachements'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('attachements') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reply.fields.attachements_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="main_photo">{{ trans('cruds.reply.fields.main_photo') }}</label>
                            <div class="needsclick dropzone" id="main_photo-dropzone">
                            </div>
                            @if($errors->has('main_photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('main_photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reply.fields.main_photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="additional_photos">{{ trans('cruds.reply.fields.additional_photos') }}</label>
                            <div class="needsclick dropzone" id="additional_photos-dropzone">
                            </div>
                            @if($errors->has('additional_photos'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('additional_photos') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.reply.fields.additional_photos_helper') }}</span>
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
                xhr.open('POST', '{{ route('frontend.replies.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $reply->id ?? 0 }}');
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
    Dropzone.options.attachementsDropzone = {
    url: '{{ route('frontend.replies.storeMedia') }}',
    maxFilesize: 5, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').find('input[name="attachements"]').remove()
      $('form').append('<input type="hidden" name="attachements" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="attachements"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($reply) && $reply->attachements)
      var file = {!! json_encode($reply->attachements) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="attachements" value="' + file.file_name + '">')
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
    Dropzone.options.mainPhotoDropzone = {
    url: '{{ route('frontend.replies.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="main_photo"]').remove()
      $('form').append('<input type="hidden" name="main_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="main_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($reply) && $reply->main_photo)
      var file = {!! json_encode($reply->main_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="main_photo" value="' + file.file_name + '">')
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
    var uploadedAdditionalPhotosMap = {}
Dropzone.options.additionalPhotosDropzone = {
    url: '{{ route('frontend.replies.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="additional_photos[]" value="' + response.name + '">')
      uploadedAdditionalPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAdditionalPhotosMap[file.name]
      }
      $('form').find('input[name="additional_photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($reply) && $reply->additional_photos)
      var files = {!! json_encode($reply->additional_photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="additional_photos[]" value="' + file.file_name + '">')
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
@endsection