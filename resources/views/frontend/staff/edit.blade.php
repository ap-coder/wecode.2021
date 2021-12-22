@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.staff.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.staff.update", [$staff->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="startdate">{{ trans('cruds.staff.fields.startdate') }}</label>
                            <input class="form-control date" type="text" name="startdate" id="startdate" value="{{ old('startdate', $staff->startdate) }}">
                            @if($errors->has('startdate'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('startdate') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.startdate_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.staff.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $staff->name) }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="job_title">{{ trans('cruds.staff.fields.job_title') }}</label>
                            <input class="form-control" type="text" name="job_title" id="job_title" value="{{ old('job_title', $staff->job_title) }}">
                            @if($errors->has('job_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('job_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.job_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="short_intro">{{ trans('cruds.staff.fields.short_intro') }}</label>
                            <textarea class="form-control" name="short_intro" id="short_intro">{{ old('short_intro', $staff->short_intro) }}</textarea>
                            @if($errors->has('short_intro'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('short_intro') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.short_intro_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="bio">{{ trans('cruds.staff.fields.bio') }}</label>
                            <textarea class="form-control ckeditor" name="bio" id="bio">{!! old('bio', $staff->bio) !!}</textarea>
                            @if($errors->has('bio'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bio') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.bio_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="picture">{{ trans('cruds.staff.fields.picture') }}</label>
                            <div class="needsclick dropzone" id="picture-dropzone">
                            </div>
                            @if($errors->has('picture'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('picture') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.picture_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="published" value="0">
                                <input type="checkbox" name="published" id="published" value="1" {{ $staff->published || old('published', 0) === 1 ? 'checked' : '' }}>
                                <label for="published">{{ trans('cruds.staff.fields.published') }}</label>
                            </div>
                            @if($errors->has('published'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('published') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.published_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="slug">{{ trans('cruds.staff.fields.slug') }}</label>
                            <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', $staff->slug) }}">
                            @if($errors->has('slug'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.slug_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="linkedin_link">{{ trans('cruds.staff.fields.linkedin_link') }}</label>
                            <input class="form-control" type="text" name="linkedin_link" id="linkedin_link" value="{{ old('linkedin_link', $staff->linkedin_link) }}">
                            @if($errors->has('linkedin_link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('linkedin_link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.linkedin_link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="facebook_link">{{ trans('cruds.staff.fields.facebook_link') }}</label>
                            <input class="form-control" type="text" name="facebook_link" id="facebook_link" value="{{ old('facebook_link', $staff->facebook_link) }}">
                            @if($errors->has('facebook_link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('facebook_link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.facebook_link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="youtube_link">{{ trans('cruds.staff.fields.youtube_link') }}</label>
                            <input class="form-control" type="text" name="youtube_link" id="youtube_link" value="{{ old('youtube_link', $staff->youtube_link) }}">
                            @if($errors->has('youtube_link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('youtube_link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.youtube_link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="twitter_link">{{ trans('cruds.staff.fields.twitter_link') }}</label>
                            <input class="form-control" type="text" name="twitter_link" id="twitter_link" value="{{ old('twitter_link', $staff->twitter_link) }}">
                            @if($errors->has('twitter_link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('twitter_link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.twitter_link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="other_link">{{ trans('cruds.staff.fields.other_link') }}</label>
                            <input class="form-control" type="text" name="other_link" id="other_link" value="{{ old('other_link', $staff->other_link) }}">
                            @if($errors->has('other_link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('other_link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.other_link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="staff_email">{{ trans('cruds.staff.fields.staff_email') }}</label>
                            <input class="form-control" type="email" name="staff_email" id="staff_email" value="{{ old('staff_email', $staff->staff_email) }}">
                            @if($errors->has('staff_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('staff_email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.staff_email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="gravatar">{{ trans('cruds.staff.fields.gravatar') }}</label>
                            <input class="form-control" type="email" name="gravatar" id="gravatar" value="{{ old('gravatar', $staff->gravatar) }}">
                            @if($errors->has('gravatar'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gravatar') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.gravatar_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="in_teams" value="0">
                                <input type="checkbox" name="in_teams" id="in_teams" value="1" {{ $staff->in_teams || old('in_teams', 0) === 1 ? 'checked' : '' }}>
                                <label for="in_teams">{{ trans('cruds.staff.fields.in_teams') }}</label>
                            </div>
                            @if($errors->has('in_teams'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('in_teams') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.in_teams_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_author" value="0">
                                <input type="checkbox" name="is_author" id="is_author" value="1" {{ $staff->is_author || old('is_author', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_author">{{ trans('cruds.staff.fields.is_author') }}</label>
                            </div>
                            @if($errors->has('is_author'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_author') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.is_author_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="order">{{ trans('cruds.staff.fields.order') }}</label>
                            <input class="form-control" type="number" name="order" id="order" value="{{ old('order', $staff->order) }}" step="1">
                            @if($errors->has('order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="list_on_about" value="0">
                                <input type="checkbox" name="list_on_about" id="list_on_about" value="1" {{ $staff->list_on_about || old('list_on_about', 0) === 1 ? 'checked' : '' }}>
                                <label for="list_on_about">{{ trans('cruds.staff.fields.list_on_about') }}</label>
                            </div>
                            @if($errors->has('list_on_about'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('list_on_about') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staff.fields.list_on_about_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.staff.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $staff->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
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
                xhr.open('POST', '{{ route('frontend.staff.storeCKEditorImages') }}', true);
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
    url: '{{ route('frontend.staff.storeMedia') }}',
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