@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.videoContent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.video-contents.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.videoContent.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <span class="text-danger">{{ $errors->first('published') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('public_everywhere') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="public_everywhere" value="0">
                    <input class="form-check-input" type="checkbox" name="public_everywhere" id="public_everywhere" value="1" {{ old('public_everywhere', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="public_everywhere">{{ trans('cruds.videoContent.fields.public_everywhere') }}</label>
                </div>
                @if($errors->has('public_everywhere'))
                    <span class="text-danger">{{ $errors->first('public_everywhere') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.public_everywhere_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.videoContent.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alternate_title">{{ trans('cruds.videoContent.fields.alternate_title') }}</label>
                <input class="form-control {{ $errors->has('alternate_title') ? 'is-invalid' : '' }}" type="text" name="alternate_title" id="alternate_title" value="{{ old('alternate_title', '') }}">
                @if($errors->has('alternate_title'))
                    <span class="text-danger">{{ $errors->first('alternate_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.alternate_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="content_area">{{ trans('cruds.videoContent.fields.content_area') }}</label>
                {{-- <textarea class="form-control ckeditor {{ $errors->has('content_area') ? 'is-invalid' : '' }}" name="content_area" id="content_area">{!! old('content_area') !!}</textarea> --}}
                <textarea rows="20" autocomplete="off" name="content_area" class="articleeditor-content {{ $errors->has('content_area') ? 'is-invalid' : '' }}" id="content_area">{!! old('content_area') !!}</textarea>
                @if($errors->has('content_area'))
                    <span class="text-danger">{{ $errors->first('content_area') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.content_area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube">{{ trans('cruds.videoContent.fields.youtube') }}</label>
                <input class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" type="text" name="youtube" id="youtube" value="{{ old('youtube', '') }}">
                @if($errors->has('youtube'))
                    <span class="text-danger">{{ $errors->first('youtube') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.youtube_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vimeo">{{ trans('cruds.videoContent.fields.vimeo') }}</label>
                <input class="form-control {{ $errors->has('vimeo') ? 'is-invalid' : '' }}" type="text" name="vimeo" id="vimeo" value="{{ old('vimeo', '') }}">
                @if($errors->has('vimeo'))
                    <span class="text-danger">{{ $errors->first('vimeo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.vimeo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="other_video">{{ trans('cruds.videoContent.fields.other_video') }}</label>
                <input class="form-control {{ $errors->has('other_video') ? 'is-invalid' : '' }}" type="text" name="other_video" id="other_video" value="{{ old('other_video', '') }}">
                @if($errors->has('other_video'))
                    <span class="text-danger">{{ $errors->first('other_video') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.other_video_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="meta_title">{{ trans('cruds.videoContent.fields.meta_title') }}</label>
                <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', '') }}">
                @if($errors->has('meta_title'))
                    <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.meta_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="meta_description">{{ trans('cruds.videoContent.fields.meta_description') }}</label>
                <input class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" type="text" name="meta_description" id="meta_description" value="{{ old('meta_description', '') }}">
                @if($errors->has('meta_description'))
                    <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.meta_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fbt">{{ trans('cruds.videoContent.fields.fbt') }}</label>
                <input class="form-control {{ $errors->has('fbt') ? 'is-invalid' : '' }}" type="text" name="fbt" id="fbt" value="{{ old('fbt', '') }}">
                @if($errors->has('fbt'))
                    <span class="text-danger">{{ $errors->first('fbt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.fbt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fbd">{{ trans('cruds.videoContent.fields.fbd') }}</label>
                <input class="form-control {{ $errors->has('fbd') ? 'is-invalid' : '' }}" type="text" name="fbd" id="fbd" value="{{ old('fbd', '') }}">
                @if($errors->has('fbd'))
                    <span class="text-danger">{{ $errors->first('fbd') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.fbd_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twt">{{ trans('cruds.videoContent.fields.twt') }}</label>
                <input class="form-control {{ $errors->has('twt') ? 'is-invalid' : '' }}" type="text" name="twt" id="twt" value="{{ old('twt', '') }}">
                @if($errors->has('twt'))
                    <span class="text-danger">{{ $errors->first('twt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.twt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twd">{{ trans('cruds.videoContent.fields.twd') }}</label>
                <input class="form-control {{ $errors->has('twd') ? 'is-invalid' : '' }}" type="text" name="twd" id="twd" value="{{ old('twd', '') }}">
                @if($errors->has('twd'))
                    <span class="text-danger">{{ $errors->first('twd') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.twd_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes_area">{{ trans('cruds.videoContent.fields.notes_area') }}</label>
                <textarea class="form-control {{ $errors->has('notes_area') ? 'is-invalid' : '' }}" name="notes_area" id="notes_area">{{ old('notes_area') }}</textarea>
                @if($errors->has('notes_area'))
                    <span class="text-danger">{{ $errors->first('notes_area') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.notes_area_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.videoContent.fields.video_type') }}</label>
                @foreach(App\Models\VideoContent::VIDEO_TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('video_type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="video_type_{{ $key }}" name="video_type" value="{{ $key }}" {{ old('video_type', 'youtube') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="video_type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('video_type'))
                    <span class="text-danger">{{ $errors->first('video_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.video_type_helper') }}</span>
            </div>
            <label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.videoContent.fields.placeholder') }}</label>
            <div class="featuredimage">
                <input class="form-control" data-toggle="fileupload" data-size="thumbnail" data-button="{{ trans('cruds.videoContent.fields.placeholder') }}" data-src="false" data-srcid="" data-field="placeholder" type="hidden" name="placeholder" value="">
            </div>
            {{-- <div class="form-group">
                <label for="placeholder">{{ trans('cruds.videoContent.fields.placeholder') }}</label>
                <div class="needsclick dropzone {{ $errors->has('placeholder') ? 'is-invalid' : '' }}" id="placeholder-dropzone">
                </div>
                @if($errors->has('placeholder'))
                    <span class="text-danger">{{ $errors->first('placeholder') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.placeholder_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label for="thread_id">{{ trans('cruds.videoContent.fields.thread') }}</label>
                <select class="form-control select2 {{ $errors->has('thread') ? 'is-invalid' : '' }}" name="thread_id" id="thread_id">
                    @foreach($threads as $id => $entry)
                        <option value="{{ $id }}" {{ old('thread_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('thread'))
                    <span class="text-danger">{{ $errors->first('thread') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.thread_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pages">{{ trans('cruds.videoContent.fields.pages') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('pages') ? 'is-invalid' : '' }}" name="pages[]" id="pages" multiple>
                    @foreach($pages as $id => $page)
                        <option value="{{ $id }}" {{ in_array($id, old('pages', [])) ? 'selected' : '' }}>{{ $page }}</option>
                    @endforeach
                </select>
                @if($errors->has('pages'))
                    <span class="text-danger">{{ $errors->first('pages') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.pages_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="order">{{ trans('cruds.videoContent.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="order" id="order" value="{{ old('order', '') }}" step="1">
                @if($errors->has('order'))
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.videoContent.fields.order_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.video-contents.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $videoContent->id ?? 0 }}');
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
    Dropzone.options.placeholderDropzone = {
    url: '{{ route('admin.video-contents.storeMedia') }}',
    maxFilesize: 3, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 3,
      width: 1290,
      height: 730
    },
    success: function (file, response) {
      $('form').find('input[name="placeholder"]').remove()
      $('form').append('<input type="hidden" name="placeholder" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="placeholder"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($videoContent) && $videoContent->placeholder)
      var file = {!! json_encode($videoContent->placeholder) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="placeholder" value="' + file.file_name + '">')
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