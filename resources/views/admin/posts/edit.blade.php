@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.post.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.posts.update", [$post->id]) }}" enctype="multipart/form-data" id="submitPostForm" class="form-horizontal" novalidate="">
            @method('PUT')
            @csrf
            <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                  
<div class="row">
    <div class="col-7 col-sm-9">
        <div class="tab-content" id="vert-tabs-right-tabContent">
            <div class="tab-pane fade show active" id="vert-tabs-right-general" role="tabpanel" aria-labelledby="vert-tabs-right-general-tab">
                @include('admin.posts.partials.general')

            </div>
            <div class="tab-pane fade" id="vert-tabs-right-images"    role="tabpanel" aria-labelledby="vert-tabs-right-images-tab">
                @include('admin.posts.partials.images')
            </div>           
         
            <div class="tab-pane fade" id="vert-tabs-right-authorship" role="tabpanel" aria-labelledby="vert-tabs-right-authorship-tab">
                @include('admin.posts.partials.authorship')
            </div>
            <div class="tab-pane fade" id="vert-tabs-right-seo"      role="tabpanel" aria-labelledby="vert-tabs-right-seo-tab">
                @include('admin.posts.partials.seo')
            </div>

            <div class="tab-pane fade" id="vert-tabs-right-settings" role="tabpanel" aria-labelledby="vert-tabs-right-settings-tab">
                @include('admin.posts.partials.settings')
            </div>

            <div class="tab-pane fade" id="vert-tabs-right-content-section" role="tabpanel" aria-labelledby="vert-tabs-right-content-section-tab">
              @includeIf('admin.posts.partials.content-section', ['contentSections' => $post->postsContentSections])
          </div>

        </div>
    </div>

    <div class="col-5 col-sm-3">
        <div class="nav flex-column nav-tabs nav-tabs-right h-100" id="vert-tabs-right-tab" role="tablist" aria-orientation="vertical">

            <a class="nav-link active" id="vert-tabs-right-general-tab" data-toggle="pill" href="#vert-tabs-right-general" role="tab" aria-controls="vert-tabs-right-general" aria-selected="true">General</a>
             <a class="nav-link" id="vert-tabs-right-images-tab" data-toggle="pill" href="#vert-tabs-right-images" role="tab" aria-controls="vert-tabs-right-images" aria-selected="true">Images</a>
             <a class="nav-link" id="vert-tabs-right-authorship-tab" data-toggle="pill" href="#vert-tabs-right-authorship" role="tab" aria-controls="vert-tabs-right-authorship" aria-selected="false">Authorship</a>
            <a class="nav-link" id="vert-tabs-right-seo-tab" data-toggle="pill" href="#vert-tabs-right-seo" role="tab" aria-controls="vert-tabs-right-seo" aria-selected="false">SEO META</a>

            <a class="nav-link" id="vert-tabs-right-settings-tab" data-toggle="pill" href="#vert-tabs-right-settings" role="tab" aria-controls="vert-tabs-right-settings" aria-selected="false">Settings</a>

            <a class="nav-link" id="vert-tabs-right-content-section-tab" data-toggle="pill" href="#vert-tabs-right-content-section" role="tab" aria-controls="vert-tabs-right-content-section" aria-selected="false">Content Section</a>


        </div>
    </div>




</div>


<hr>
            
            <div class="form-group">
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

    
 $('#save-and-preview').click(function(){

$('#submitPostForm').validate({
      rules: {
        'title': {
            required: true
        },
        // 'categories[]': {
        //     required: true
        // },
      },
      messages: {
        title: "Please Enter Title",
        // 'categories[]': "You must select at least one category. Without it the combined media page will error out.",
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

      // var body_text=getDataFromTheEditor();

      // // Find and replace `content` if there
      // for (index = 0; index < formData.length; ++index) {
      //     if (formData[index].name == "body_text") {
      //       formData[index].value = body_text;
      //         break;
      //     }
      // }

        $.ajax({
            type: 'POST',
            url: '{{ route("admin.posts.update", [$post->id]) }}',
            dataType: 'json',
            data: formData,
            success: function(resultData) {
              $this.html("{{ trans('global.save_and_preview') }}");
              window.open("{{ url('blog') }}/"+resultData, '_blank'); 
             }
        });

  }

});
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
          var pid=$('#post_id').val();
          //console.log('params',params);
          var _token = $('input[name="_token"]').val();
            $.ajax({
              url:'{{ url("/admin/ChangePostContentSectionOrder") }}',
              method:"POST",
              data: {
                  params: params,pid:pid,_token:_token
              },
              success:function(response) {
  
              }
            })
          }
      });
      let theEditor;
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
    ).then( editor => {
        theEditor = editor;
    } )
  }
});

function getDataFromTheEditor() {
  return theEditor.getData();
}

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
