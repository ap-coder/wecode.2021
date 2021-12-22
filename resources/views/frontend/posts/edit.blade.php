@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.post.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.posts.update", [$post->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="category_id">{{ trans('cruds.post.fields.category') }}</label>
                            <select class="form-control select2" name="category_id" id="category_id">
                                @foreach($categories as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $post->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.post.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="body_text">{{ trans('cruds.post.fields.body_text') }}</label>
                            <textarea class="form-control ckeditor" name="body_text" id="body_text">{!! old('body_text', $post->body_text) !!}</textarea>
                            @if($errors->has('body_text'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('body_text') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.body_text_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">{{ trans('cruds.post.fields.excerpt') }}</label>
                            <textarea class="form-control" name="excerpt" id="excerpt">{{ old('excerpt', $post->excerpt) }}</textarea>
                            @if($errors->has('excerpt'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('excerpt') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.excerpt_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="featured_image">{{ trans('cruds.post.fields.featured_image') }}</label>
                            <div class="needsclick dropzone" id="featured_image-dropzone">
                            </div>
                            @if($errors->has('featured_image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('featured_image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.featured_image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="meta_title">{{ trans('cruds.post.fields.meta_title') }}</label>
                            <input class="form-control" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $post->meta_title) }}">
                            @if($errors->has('meta_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('meta_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.meta_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="meta_description">{{ trans('cruds.post.fields.meta_description') }}</label>
                            <input class="form-control" type="text" name="meta_description" id="meta_description" value="{{ old('meta_description', $post->meta_description) }}">
                            @if($errors->has('meta_description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('meta_description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.meta_description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="facebook_title">{{ trans('cruds.post.fields.facebook_title') }}</label>
                            <input class="form-control" type="text" name="facebook_title" id="facebook_title" value="{{ old('facebook_title', $post->facebook_title) }}">
                            @if($errors->has('facebook_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('facebook_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.facebook_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="facebook_desc">{{ trans('cruds.post.fields.facebook_desc') }}</label>
                            <input class="form-control" type="text" name="facebook_desc" id="facebook_desc" value="{{ old('facebook_desc', $post->facebook_desc) }}">
                            @if($errors->has('facebook_desc'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('facebook_desc') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.facebook_desc_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="twitter_post_description">{{ trans('cruds.post.fields.twitter_post_description') }}</label>
                            <input class="form-control" type="text" name="twitter_post_description" id="twitter_post_description" value="{{ old('twitter_post_description', $post->twitter_post_description) }}">
                            @if($errors->has('twitter_post_description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('twitter_post_description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.twitter_post_description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="twitter_post_title">{{ trans('cruds.post.fields.twitter_post_title') }}</label>
                            <input class="form-control" type="text" name="twitter_post_title" id="twitter_post_title" value="{{ old('twitter_post_title', $post->twitter_post_title) }}">
                            @if($errors->has('twitter_post_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('twitter_post_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.twitter_post_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="published" value="0">
                                <input type="checkbox" name="published" id="published" value="1" {{ $post->published || old('published', 0) === 1 ? 'checked' : '' }}>
                                <label for="published">{{ trans('cruds.post.fields.published') }}</label>
                            </div>
                            @if($errors->has('published'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('published') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.published_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="slug">{{ trans('cruds.post.fields.slug') }}</label>
                            <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}">
                            @if($errors->has('slug'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.slug_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="contributor">{{ trans('cruds.post.fields.contributor') }}</label>
                            <input class="form-control" type="text" name="contributor" id="contributor" value="{{ old('contributor', $post->contributor) }}">
                            @if($errors->has('contributor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('contributor') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.contributor_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="contributor_link">{{ trans('cruds.post.fields.contributor_link') }}</label>
                            <input class="form-control" type="text" name="contributor_link" id="contributor_link" value="{{ old('contributor_link', $post->contributor_link) }}">
                            @if($errors->has('contributor_link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('contributor_link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.contributor_link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="contributor_2">{{ trans('cruds.post.fields.contributor_2') }}</label>
                            <input class="form-control" type="text" name="contributor_2" id="contributor_2" value="{{ old('contributor_2', $post->contributor_2) }}">
                            @if($errors->has('contributor_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('contributor_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.contributor_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="contributor_2_link">{{ trans('cruds.post.fields.contributor_2_link') }}</label>
                            <input class="form-control" type="text" name="contributor_2_link" id="contributor_2_link" value="{{ old('contributor_2_link', $post->contributor_2_link) }}">
                            @if($errors->has('contributor_2_link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('contributor_2_link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.contributor_2_link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="attachments">{{ trans('cruds.post.fields.attachments') }}</label>
                            <div class="needsclick dropzone" id="attachments-dropzone">
                            </div>
                            @if($errors->has('attachments'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('attachments') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.attachments_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="menu_order">{{ trans('cruds.post.fields.menu_order') }}</label>
                            <input class="form-control" type="number" name="menu_order" id="menu_order" value="{{ old('menu_order', $post->menu_order) }}" step="1">
                            @if($errors->has('menu_order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('menu_order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.menu_order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.post.fields.comment_status') }}</label>
                            <select class="form-control" name="comment_status" id="comment_status">
                                <option value disabled {{ old('comment_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Post::COMMENT_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('comment_status', $post->comment_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('comment_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('comment_status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.comment_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="post_password">{{ trans('cruds.post.fields.post_password') }}</label>
                            <input class="form-control" type="password" name="post_password" id="post_password">
                            @if($errors->has('post_password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('post_password') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.post_password_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="comment_count">{{ trans('cruds.post.fields.comment_count') }}</label>
                            <input class="form-control" type="number" name="comment_count" id="comment_count" value="{{ old('comment_count', $post->comment_count) }}" step="1">
                            @if($errors->has('comment_count'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('comment_count') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.comment_count_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="ping_status" value="0">
                                <input type="checkbox" name="ping_status" id="ping_status" value="1" {{ $post->ping_status || old('ping_status', 0) === 1 ? 'checked' : '' }}>
                                <label for="ping_status">{{ trans('cruds.post.fields.ping_status') }}</label>
                            </div>
                            @if($errors->has('ping_status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ping_status') }}
                                </div>
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
                xhr.open('POST', '{{ route('frontend.posts.storeCKEditorImages') }}', true);
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
    url: '{{ route('frontend.posts.storeMedia') }}',
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
    url: '{{ route('frontend.posts.storeMedia') }}',
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