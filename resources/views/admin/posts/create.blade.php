@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.post.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.posts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category_id">{{ trans('cruds.post.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.post.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="body_text">{{ trans('cruds.post.fields.body_text') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('body_text') ? 'is-invalid' : '' }}" name="body_text" id="body_text">{!! old('body_text') !!}</textarea>
                @if($errors->has('body_text'))
                    <span class="text-danger">{{ $errors->first('body_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.body_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="excerpt">{{ trans('cruds.post.fields.excerpt') }}</label>
                <textarea class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}" name="excerpt" id="excerpt">{{ old('excerpt') }}</textarea>
                @if($errors->has('excerpt'))
                    <span class="text-danger">{{ $errors->first('excerpt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.excerpt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="featured_image">{{ trans('cruds.post.fields.featured_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}" id="featured_image-dropzone">
                </div>
                @if($errors->has('featured_image'))
                    <span class="text-danger">{{ $errors->first('featured_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.featured_image_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.post.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <span class="text-danger">{{ $errors->first('published') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contributor">{{ trans('cruds.post.fields.contributor') }}</label>
                <input class="form-control {{ $errors->has('contributor') ? 'is-invalid' : '' }}" type="text" name="contributor" id="contributor" value="{{ old('contributor', '') }}">
                @if($errors->has('contributor'))
                    <span class="text-danger">{{ $errors->first('contributor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.contributor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contributor_link">{{ trans('cruds.post.fields.contributor_link') }}</label>
                <input class="form-control {{ $errors->has('contributor_link') ? 'is-invalid' : '' }}" type="text" name="contributor_link" id="contributor_link" value="{{ old('contributor_link', '') }}">
                @if($errors->has('contributor_link'))
                    <span class="text-danger">{{ $errors->first('contributor_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.contributor_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contributor_2">{{ trans('cruds.post.fields.contributor_2') }}</label>
                <input class="form-control {{ $errors->has('contributor_2') ? 'is-invalid' : '' }}" type="text" name="contributor_2" id="contributor_2" value="{{ old('contributor_2', '') }}">
                @if($errors->has('contributor_2'))
                    <span class="text-danger">{{ $errors->first('contributor_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.contributor_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contributor_2_link">{{ trans('cruds.post.fields.contributor_2_link') }}</label>
                <input class="form-control {{ $errors->has('contributor_2_link') ? 'is-invalid' : '' }}" type="text" name="contributor_2_link" id="contributor_2_link" value="{{ old('contributor_2_link', '') }}">
                @if($errors->has('contributor_2_link'))
                    <span class="text-danger">{{ $errors->first('contributor_2_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.contributor_2_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attachments">{{ trans('cruds.post.fields.attachments') }}</label>
                <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}" id="attachments-dropzone">
                </div>
                @if($errors->has('attachments'))
                    <span class="text-danger">{{ $errors->first('attachments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.attachments_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="menu_order">{{ trans('cruds.post.fields.menu_order') }}</label>
                <input class="form-control {{ $errors->has('menu_order') ? 'is-invalid' : '' }}" type="number" name="menu_order" id="menu_order" value="{{ old('menu_order', '') }}" step="1">
                @if($errors->has('menu_order'))
                    <span class="text-danger">{{ $errors->first('menu_order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.menu_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.post.fields.comment_status') }}</label>
                <select class="form-control {{ $errors->has('comment_status') ? 'is-invalid' : '' }}" name="comment_status" id="comment_status">
                    <option value disabled {{ old('comment_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Post::COMMENT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('comment_status', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('comment_status'))
                    <span class="text-danger">{{ $errors->first('comment_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.comment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="post_password">{{ trans('cruds.post.fields.post_password') }}</label>
                <input class="form-control {{ $errors->has('post_password') ? 'is-invalid' : '' }}" type="password" name="post_password" id="post_password">
                @if($errors->has('post_password'))
                    <span class="text-danger">{{ $errors->first('post_password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.post_password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comment_count">{{ trans('cruds.post.fields.comment_count') }}</label>
                <input class="form-control {{ $errors->has('comment_count') ? 'is-invalid' : '' }}" type="number" name="comment_count" id="comment_count" value="{{ old('comment_count', '0') }}" step="1">
                @if($errors->has('comment_count'))
                    <span class="text-danger">{{ $errors->first('comment_count') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.comment_count_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('ping_status') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="ping_status" value="0">
                    <input class="form-check-input" type="checkbox" name="ping_status" id="ping_status" value="1" {{ old('ping_status', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="ping_status">{{ trans('cruds.post.fields.ping_status') }}</label>
                </div>
                @if($errors->has('ping_status'))
                    <span class="text-danger">{{ $errors->first('ping_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.ping_status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
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
                xhr.open('POST', '{{ route('admin.posts.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $post->id ?? 0 }}');
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
    url: '{{ route('admin.posts.storeMedia') }}',
    maxFilesize: 25, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 25,
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
@if(isset($post) && $post->featured_image)
      var file = {!! json_encode($post->featured_image) !!}
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
    var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
    url: '{{ route('admin.posts.storeMedia') }}',
    maxFilesize: 6, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 6
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
@if(isset($post) && $post->attachments)
          var files =
            {!! json_encode($post->attachments) !!}
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
@endsection