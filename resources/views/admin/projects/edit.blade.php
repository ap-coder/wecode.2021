@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.project.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.projects.update", [$project->id]) }}" enctype="multipart/form-data" id="submitPostForm" class="form-horizontal" novalidate="">
            @method('PUT')
            @csrf

            <input type="hidden" name="project_id" id="project_id" value="{{ $project->id }}">
<div class="row">
    <div class="col-7 col-sm-9">
        <div class="tab-content" id="vert-tabs-right-tabContent">
            <div class="tab-pane fade show active" id="vert-tabs-right-general" role="tabpanel" aria-labelledby="vert-tabs-right-general-tab">
                @include('admin.projects.partials.general')

            </div>
            <div class="tab-pane fade" id="vert-tabs-right-images"    role="tabpanel" aria-labelledby="vert-tabs-right-images-tab">
                @include('admin.projects.partials.images')
            </div>                       
            <div class="tab-pane fade" id="vert-tabs-right-seo"      role="tabpanel" aria-labelledby="vert-tabs-right-seo-tab">
                @include('admin.projects.partials.seo')
            </div>

            <div class="tab-pane fade" id="vert-tabs-right-settings" role="tabpanel" aria-labelledby="vert-tabs-right-settings-tab">
                @include('admin.projects.partials.settings')
            </div>

            <div class="tab-pane fade" id="vert-tabs-right-content-section" role="tabpanel" aria-labelledby="vert-tabs-right-content-section-tab">
              @includeIf('admin.projects.partials.content-section', ['contentSections' => $project->projectsContentSections])
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
          var pid=$('#project_id').val();
          //console.log('params',params);
          var _token = $('input[name="_token"]').val();
            $.ajax({
              url:'{{ url("/admin/ChangeProjectContentSectionOrder") }}',
              method:"POST",
              data: {
                  params: params,pid:pid,_token:_token
              },
              success:function(response) {
  
              }
            })
          }
      });
    
 $('#save-and-preview').click(function(){

$('#submitPostForm').validate({
      rules: {
        'name': {
            required: true
        },
      },
      messages: {
        title: "Please enter project name",
    }
});

if ($('#submitPostForm').valid()) // check if form is valid
  {
      $this=$(this);
      $loader='<div class="spinner-border text-dark" role="status">'+
                '<span class="sr-only">Loading...</span>'+
                '</div>';
      $this.html($loader);
      var formData = $('#submitPostForm').serializeArray();

      formData.push({name: "preview", value: 1});

      var body_content=getDataFromTheBodyEditor();
      var challenges=getDataFromTheChallengesEditor();
      var solutions=getDataFromTheSolutionsEditor();

      // Find and replace `content` if there
      for (index = 0; index < formData.length; ++index) {
          if (formData[index].name == "body_content") {
            formData[index].value = body_content;
              break;
          }
      }

      // Find and replace `content` if there
      for (index = 0; index < formData.length; ++index) {
          if (formData[index].name == "challenges") {
            formData[index].value = challenges;
              break;
          }
      }

      // Find and replace `content` if there
      for (index = 0; index < formData.length; ++index) {
          if (formData[index].name == "solutions") {
            formData[index].value = solutions;
              break;
          }
      }

        $.ajax({
            type: 'POST',
            url: '{{ route("admin.projects.update", [$project->id]) }}',
            dataType: 'json',
            data: formData,
            success: function(resultData) {
              $this.html("{{ trans('global.save_and_preview') }}");
              window.open("{{ url('portfolio') }}/"+resultData, '_blank'); 
             }
        });

  }

});

let theBodyEditor;
let theChallengesEditor;
let theSolutionsEditor;

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

  // var allEditors = document.querySelectorAll('.ckeditor');
  // for (var i = 0; i < allEditors.length; ++i) {
  //   ClassicEditor.create(
  //     allEditors[i], {
  //       extraPlugins: [SimpleUploadAdapter]
  //     }
  //   );
  // }

  var allEditors = document.querySelectorAll('#body_content');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    ).then( editor => {
        // CKEditorInspector.attach( editor );
        theBodyEditor = editor;
    } )
  }

  var allchallengesEditors = document.querySelectorAll('#challenges');
  for (var i = 0; i < allchallengesEditors.length; ++i) {
    ClassicEditor.create(
      allchallengesEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    ).then( editor => {
        // CKEditorInspector.attach( editor );
        theChallengesEditor = editor;
    } )
  }

  var allsolutionsEditors = document.querySelectorAll('#solutions');
  for (var i = 0; i < allsolutionsEditors.length; ++i) {
    ClassicEditor.create(
      allsolutionsEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    ).then( editor => {
        // CKEditorInspector.attach( editor );
        theSolutionsEditor = editor;
    } )
  }

});


function getDataFromTheBodyEditor() {
  return theBodyEditor.getData();
}

function getDataFromTheChallengesEditor() {
  return theChallengesEditor.getData();
}

function getDataFromTheSolutionsEditor() {
  return theSolutionsEditor.getData();
}

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