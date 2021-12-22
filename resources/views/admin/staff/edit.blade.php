@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.staff.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.staff.update", [$staff->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="startdate">{{ trans('cruds.staff.fields.startdate') }}</label>
                <input class="form-control date {{ $errors->has('startdate') ? 'is-invalid' : '' }}" type="text" name="startdate" id="startdate" value="{{ old('startdate', $staff->startdate) }}">
                @if($errors->has('startdate'))
                    <span class="text-danger">{{ $errors->first('startdate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.startdate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.staff.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $staff->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="job_title">{{ trans('cruds.staff.fields.job_title') }}</label>
                <input class="form-control {{ $errors->has('job_title') ? 'is-invalid' : '' }}" type="text" name="job_title" id="job_title" value="{{ old('job_title', $staff->job_title) }}">
                @if($errors->has('job_title'))
                    <span class="text-danger">{{ $errors->first('job_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.job_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="short_intro">{{ trans('cruds.staff.fields.short_intro') }}</label>
                <textarea class="form-control {{ $errors->has('short_intro') ? 'is-invalid' : '' }}" name="short_intro" id="short_intro">{{ old('short_intro', $staff->short_intro) }}</textarea>
                @if($errors->has('short_intro'))
                    <span class="text-danger">{{ $errors->first('short_intro') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.short_intro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bio">{{ trans('cruds.staff.fields.bio') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('bio') ? 'is-invalid' : '' }}" name="bio" id="bio">{!! old('bio', $staff->bio) !!}</textarea>
                @if($errors->has('bio'))
                    <span class="text-danger">{{ $errors->first('bio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.bio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="picture">{{ trans('cruds.staff.fields.picture') }}</label>
                <div class="needsclick dropzone {{ $errors->has('picture') ? 'is-invalid' : '' }}" id="picture-dropzone">
                </div>
                @if($errors->has('picture'))
                    <span class="text-danger">{{ $errors->first('picture') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.picture_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ $staff->published || old('published', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.staff.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <span class="text-danger">{{ $errors->first('published') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.staff.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $staff->slug) }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin_link">{{ trans('cruds.staff.fields.linkedin_link') }}</label>
                <input class="form-control {{ $errors->has('linkedin_link') ? 'is-invalid' : '' }}" type="text" name="linkedin_link" id="linkedin_link" value="{{ old('linkedin_link', $staff->linkedin_link) }}">
                @if($errors->has('linkedin_link'))
                    <span class="text-danger">{{ $errors->first('linkedin_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.linkedin_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook_link">{{ trans('cruds.staff.fields.facebook_link') }}</label>
                <input class="form-control {{ $errors->has('facebook_link') ? 'is-invalid' : '' }}" type="text" name="facebook_link" id="facebook_link" value="{{ old('facebook_link', $staff->facebook_link) }}">
                @if($errors->has('facebook_link'))
                    <span class="text-danger">{{ $errors->first('facebook_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.facebook_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube_link">{{ trans('cruds.staff.fields.youtube_link') }}</label>
                <input class="form-control {{ $errors->has('youtube_link') ? 'is-invalid' : '' }}" type="text" name="youtube_link" id="youtube_link" value="{{ old('youtube_link', $staff->youtube_link) }}">
                @if($errors->has('youtube_link'))
                    <span class="text-danger">{{ $errors->first('youtube_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.youtube_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter_link">{{ trans('cruds.staff.fields.twitter_link') }}</label>
                <input class="form-control {{ $errors->has('twitter_link') ? 'is-invalid' : '' }}" type="text" name="twitter_link" id="twitter_link" value="{{ old('twitter_link', $staff->twitter_link) }}">
                @if($errors->has('twitter_link'))
                    <span class="text-danger">{{ $errors->first('twitter_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.twitter_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="other_link">{{ trans('cruds.staff.fields.other_link') }}</label>
                <input class="form-control {{ $errors->has('other_link') ? 'is-invalid' : '' }}" type="text" name="other_link" id="other_link" value="{{ old('other_link', $staff->other_link) }}">
                @if($errors->has('other_link'))
                    <span class="text-danger">{{ $errors->first('other_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.other_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="staff_email">{{ trans('cruds.staff.fields.staff_email') }}</label>
                <input class="form-control {{ $errors->has('staff_email') ? 'is-invalid' : '' }}" type="email" name="staff_email" id="staff_email" value="{{ old('staff_email', $staff->staff_email) }}">
                @if($errors->has('staff_email'))
                    <span class="text-danger">{{ $errors->first('staff_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.staff_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gravatar">{{ trans('cruds.staff.fields.gravatar') }}</label>
                <input class="form-control {{ $errors->has('gravatar') ? 'is-invalid' : '' }}" type="email" name="gravatar" id="gravatar" value="{{ old('gravatar', $staff->gravatar) }}">
                @if($errors->has('gravatar'))
                    <span class="text-danger">{{ $errors->first('gravatar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.gravatar_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('in_teams') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="in_teams" value="0">
                    <input class="form-check-input" type="checkbox" name="in_teams" id="in_teams" value="1" {{ $staff->in_teams || old('in_teams', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="in_teams">{{ trans('cruds.staff.fields.in_teams') }}</label>
                </div>
                @if($errors->has('in_teams'))
                    <span class="text-danger">{{ $errors->first('in_teams') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.in_teams_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_author') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_author" value="0">
                    <input class="form-check-input" type="checkbox" name="is_author" id="is_author" value="1" {{ $staff->is_author || old('is_author', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_author">{{ trans('cruds.staff.fields.is_author') }}</label>
                </div>
                @if($errors->has('is_author'))
                    <span class="text-danger">{{ $errors->first('is_author') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.is_author_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="order">{{ trans('cruds.staff.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="order" id="order" value="{{ old('order', $staff->order) }}" step="1">
                @if($errors->has('order'))
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('list_on_about') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="list_on_about" value="0">
                    <input class="form-check-input" type="checkbox" name="list_on_about" id="list_on_about" value="1" {{ $staff->list_on_about || old('list_on_about', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="list_on_about">{{ trans('cruds.staff.fields.list_on_about') }}</label>
                </div>
                @if($errors->has('list_on_about'))
                    <span class="text-danger">{{ $errors->first('list_on_about') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.list_on_about_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.staff.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $staff->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.user_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.staff.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $staff->id ?? 0 }}');
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
    Dropzone.options.pictureDropzone = {
    url: '{{ route('admin.staff.storeMedia') }}',
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
      $('form').find('input[name="picture"]').remove()
      $('form').append('<input type="hidden" name="picture" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="picture"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($staff) && $staff->picture)
      var file = {!! json_encode($staff->picture) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="picture" value="' + file.file_name + '">')
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