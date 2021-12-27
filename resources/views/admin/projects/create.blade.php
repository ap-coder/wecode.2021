@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.project.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.projects.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.project.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="intro">{{ trans('cruds.project.fields.intro') }}</label>
                <textarea class="form-control {{ $errors->has('intro') ? 'is-invalid' : '' }}" name="intro" id="intro">{{ old('intro') }}</textarea>
                @if($errors->has('intro'))
                    <span class="text-danger">{{ $errors->first('intro') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.intro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="body_content">{{ trans('cruds.project.fields.body_content') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('body_content') ? 'is-invalid' : '' }}" name="body_content" id="body_content">{!! old('body_content') !!}</textarea>
                @if($errors->has('body_content'))
                    <span class="text-danger">{{ $errors->first('body_content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.body_content_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category_id">{{ trans('cruds.project.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.project.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <span class="text-danger">{{ $errors->first('published') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.project.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_id">{{ trans('cruds.project.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <span class="text-danger">{{ $errors->first('client') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_date">{{ trans('cruds.project.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}">
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.project.fields.project_type') }}</label>
                <select class="form-control {{ $errors->has('project_type') ? 'is-invalid' : '' }}" name="project_type" id="project_type">
                    <option value disabled {{ old('project_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Project::PROJECT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('project_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_type'))
                    <span class="text-danger">{{ $errors->first('project_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.project_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="challenges">{{ trans('cruds.project.fields.challenges') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('challenges') ? 'is-invalid' : '' }}" name="challenges" id="challenges">{!! old('challenges') !!}</textarea>
                @if($errors->has('challenges'))
                    <span class="text-danger">{{ $errors->first('challenges') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.challenges_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="solutions">{{ trans('cruds.project.fields.solutions') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('solutions') ? 'is-invalid' : '' }}" name="solutions" id="solutions">{!! old('solutions') !!}</textarea>
                @if($errors->has('solutions'))
                    <span class="text-danger">{{ $errors->first('solutions') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.solutions_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="header_image">{{ trans('cruds.project.fields.header_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('header_image') ? 'is-invalid' : '' }}" id="header_image-dropzone">
                </div>
                @if($errors->has('header_image'))
                    <span class="text-danger">{{ $errors->first('header_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.header_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="featured_image">{{ trans('cruds.project.fields.featured_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}" id="featured_image-dropzone">
                </div>
                @if($errors->has('featured_image'))
                    <span class="text-danger">{{ $errors->first('featured_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.featured_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="additional_images">{{ trans('cruds.project.fields.additional_images') }}</label>
                <div class="needsclick dropzone {{ $errors->has('additional_images') ? 'is-invalid' : '' }}" id="additional_images-dropzone">
                </div>
                @if($errors->has('additional_images'))
                    <span class="text-danger">{{ $errors->first('additional_images') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.additional_images_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="challenge_image">{{ trans('cruds.project.fields.challenge_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('challenge_image') ? 'is-invalid' : '' }}" id="challenge_image-dropzone">
                </div>
                @if($errors->has('challenge_image'))
                    <span class="text-danger">{{ $errors->first('challenge_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.challenge_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="solution_image">{{ trans('cruds.project.fields.solution_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('solution_image') ? 'is-invalid' : '' }}" id="solution_image-dropzone">
                </div>
                @if($errors->has('solution_image'))
                    <span class="text-danger">{{ $errors->first('solution_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.solution_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="meta_title">{{ trans('cruds.project.fields.meta_title') }}</label>
                <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', '') }}">
                @if($errors->has('meta_title'))
                    <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.meta_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="meta_description">{{ trans('cruds.project.fields.meta_description') }}</label>
                <input class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" type="text" name="meta_description" id="meta_description" value="{{ old('meta_description', '') }}">
                @if($errors->has('meta_description'))
                    <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.meta_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fb_title">{{ trans('cruds.project.fields.fb_title') }}</label>
                <input class="form-control {{ $errors->has('fb_title') ? 'is-invalid' : '' }}" type="text" name="fb_title" id="fb_title" value="{{ old('fb_title', '') }}">
                @if($errors->has('fb_title'))
                    <span class="text-danger">{{ $errors->first('fb_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.fb_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tw_title">{{ trans('cruds.project.fields.tw_title') }}</label>
                <input class="form-control {{ $errors->has('tw_title') ? 'is-invalid' : '' }}" type="text" name="tw_title" id="tw_title" value="{{ old('tw_title', '') }}">
                @if($errors->has('tw_title'))
                    <span class="text-danger">{{ $errors->first('tw_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.tw_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fb_description">{{ trans('cruds.project.fields.fb_description') }}</label>
                <input class="form-control {{ $errors->has('fb_description') ? 'is-invalid' : '' }}" type="text" name="fb_description" id="fb_description" value="{{ old('fb_description', '') }}">
                @if($errors->has('fb_description'))
                    <span class="text-danger">{{ $errors->first('fb_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.fb_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tw_description">{{ trans('cruds.project.fields.tw_description') }}</label>
                <input class="form-control {{ $errors->has('tw_description') ? 'is-invalid' : '' }}" type="text" name="tw_description" id="tw_description" value="{{ old('tw_description', '') }}">
                @if($errors->has('tw_description'))
                    <span class="text-danger">{{ $errors->first('tw_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.tw_description_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.projects.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $project->id ?? 0 }}');
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
    Dropzone.options.headerImageDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 460,
      height: 240
    },
    success: function (file, response) {
      $('form').find('input[name="header_image"]').remove()
      $('form').append('<input type="hidden" name="header_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="header_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($project) && $project->header_image)
      var file = {!! json_encode($project->header_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="header_image" value="' + file.file_name + '">')
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
    Dropzone.options.featuredImageDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
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
@if(isset($project) && $project->featured_image)
      var file = {!! json_encode($project->featured_image) !!}
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
    var uploadedAdditionalImagesMap = {}
Dropzone.options.additionalImagesDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="additional_images[]" value="' + response.name + '">')
      uploadedAdditionalImagesMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAdditionalImagesMap[file.name]
      }
      $('form').find('input[name="additional_images[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($project) && $project->additional_images)
      var files = {!! json_encode($project->additional_images) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="additional_images[]" value="' + file.file_name + '">')
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
    Dropzone.options.challengeImageDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 700,
      height: 400
    },
    success: function (file, response) {
      $('form').find('input[name="challenge_image"]').remove()
      $('form').append('<input type="hidden" name="challenge_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="challenge_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($project) && $project->challenge_image)
      var file = {!! json_encode($project->challenge_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="challenge_image" value="' + file.file_name + '">')
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
    Dropzone.options.solutionImageDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 700,
      height: 400
    },
    success: function (file, response) {
      $('form').find('input[name="solution_image"]').remove()
      $('form').append('<input type="hidden" name="solution_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="solution_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($project) && $project->solution_image)
      var file = {!! json_encode($project->solution_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="solution_image" value="' + file.file_name + '">')
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