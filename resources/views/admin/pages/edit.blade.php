@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.page.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pages.update", [$page->id]) }}" enctype="multipart/form-data" id="submitPostForm" class="form-horizontal" novalidate="">
            @method('PUT')
            @csrf
            <input type="hidden" name="page_id" id="page_id" value="{{ $page->id }}">
            <div class="row">
                <div class="col-7 col-sm-9">
                  
                    <div class="tab-content" id="vert-tabs-right-tabContent">
                        <div class="tab-pane fade show active" id="vert-tabs-right-general" role="tabpanel" aria-labelledby="vert-tabs-right-general-tab">
                            @include('admin.pages.partials.general')
            
                        </div>
                        <div class="tab-pane fade" id="vert-tabs-right-images"    role="tabpanel" aria-labelledby="vert-tabs-right-images-tab">
                            @include('admin.pages.partials.images')
            
                        </div>
            
                        <div class="tab-pane fade" id="vert-tabs-right-seo"      role="tabpanel" aria-labelledby="vert-tabs-right-seo-tab">
                            @include('admin.pages.partials.seo')
                        </div>
  
                        <div class="tab-pane fade" id="vert-tabs-right-settings" role="tabpanel" aria-labelledby="vert-tabs-right-settings-tab">
                          @include('admin.pages.partials.settings')
                      </div>
                      
                        <div class="tab-pane fade" id="vert-tabs-right-content-section" role="tabpanel" aria-labelledby="vert-tabs-right-content-section-tab">
                          @includeIf('admin.pages.partials.content-section', ['contentSections' => $page->pagesContentSections])
                        </div>
  
                        <div class="tab-pane fade" id="vert-tabs-right-masthead" role="tabpanel" aria-labelledby="vert-tabs-right-masthead-tab">
                          @include('admin.pages.partials.masthead')
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
                        <a class="nav-link" id="vert-tabs-right-masthead-tab" data-toggle="pill" href="#vert-tabs-right-masthead" role="tab" aria-controls="vert-tabs-right-masthead" aria-selected="false">Masthead</a>
            
                    </div>
                </div>
            
            </div>

            <hr>

            <div class="form-group">
              <label id="errorMsg" class="error" for="title"></label> <hr>
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
  
  <!-- The add Content Section Modal -->
  <div class="modal" id="addPageSectionModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
  
      </div>
    </div>
  </div>
  
  
  
  <!-- The add Existing Page Section Modal -->
  <div class="modal" id="addExistingPageSectionModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form>
          @csrf
         <!-- Modal Header -->
    <div class="modal-header">
      <h4 class="modal-title"> Existing  {{ trans('cruds.pagesection.title_singular') }}</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
  
      <div class="modal-body">
        <div class="form-group">
          <label for="page_sections">Select Existing Sections</label>
          <div style="padding-bottom: 4px">
              <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
              <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
          </div>
          <select class="form-control select2 {{ $errors->has('page_sections') ? 'is-invalid' : '' }}" name="page_sections[]" id="page_sections" multiple style="width: 100%;">
              @foreach($page_sections as $id => $page_section)
                @if(isset($page))
                  <option value="{{ $id }}" {{ (in_array($id, old('page_sections', [])) || $page->pagesPagesections->contains($id)) ? 'selected' : '' }}>{{ $page_section }}</option>
                @else
                  <option value="{{ $id }}" {{ in_array($id, old('page_sections', [])) ? 'selected' : '' }}>{{ $page_section }}</option>
                @endif
              @endforeach
          </select>
          @if($errors->has('page_sections'))
              <span class="text-danger">{{ $errors->first('page_sections') }}</span>
          @endif
          <span class="help-block">{{ trans('cruds.pagesection.fields.page_helper') }}</span>
      </div>
      </div>
  
      <!-- Modal footer -->
    <div class="modal-footer">
      <button type="button" class="btn btn-info" id="saveExistingPageSection">Save</button>
      </div>
    </form>
      </div>
    </div>
  </div>
  
  <div id="dummy" class="hide"></div>
@endsection

@section('scripts')
<script>
    
    $('#use_textonly_header').click(function(){
      if($(this).prop('checked') == true){
        $('#use_textonly_header_box').show();
      }else{
        $('#use_textonly_header_box').hide();
      }
    });
  
    $('#use_svg_header').click(function(){
      if($(this).prop('checked') == true){
        $('#use_svg_header_box').show();
      }else{
        $('#use_svg_header_box').hide();
      }
    });
  
    $('#use_featured_image_header').click(function(){
      if($(this).prop('checked') == true){
        $('#use_featured_image_header_box').show();
      }else{
        $('#use_featured_image_header_box').hide();
      }
    });
  
    $('#save-and-preview').click(function(){
    
      var slug=$('#slug').val();
      var path=$('#path').val();
      if (slug=='') {
        $('#errorMsg').text('Please enter slug');
      }else if (path=='') {
        $('#errorMsg').text('Please enter path');
      }else {
        
        $('#errorMsg').text('');
        $('#submitPostForm').validate({
          rules: {
            'title': {
                required: true
            },
            'slug': {
                required: true
            },
            // 'categories[]': {
            //     required: true
            // },
          },
          messages: {
            name: "Please Enter Title",
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
    
          $.ajax({
              type: 'POST',
              url: '{{ route("admin.pages.update", [$page->id]) }}',
              dataType: 'json',
              data: formData,
              success: function(resultData) {
                var url = "{{ url('') }}"+'/'+resultData;
                $this.html("{{ trans('global.save_and_preview') }}");
                window.open(url, '_blank'); 
              }
          });
    
      }
      }
    
    
    });
    </script>



<script>
    $(document.body).on('blur', '#PageSectionTxt' ,function(){
              var newSrc = $('#PageSectionTxt').val();
              $('#dummy').html($('#PageSectionTxt').val());
              // console.log(newSrc);
              // $('#section').find('img').attr('src','hello tapas');
              $('#dummy').find("img").each(function(k, el) {
                  var src=$(el).attr("src");
                  var result = src.split('/');
                  var lastEl = result[result.length-1];
                  // console.log(lastEl);
                  console.log('result',result);
                  var newSrc = $(el).attr("src").replace(src, "{{ asset('site/img/landing-pages') }}/"+lastEl);
                  $(el).attr("src", newSrc);
              });
              $('#PageSectionTxt').val($('#dummy').html());
          });
      </script>

      
<script>
  
    $(document.body).on('click', '#saveExistingPageSection' ,function(){
    
    $this=$(this);
    $loader='<div class="spinner-border text-dark" role="status">'+
        '<span class="sr-only">Loading...</span>'+
        '</div>';
    $this.html($loader);
    
    var pid=$('#page_id').val();
    var pageSections=$('#page_sections').val();
    
    var _token = $('input[name="_token"]').val();
        $.ajax({
          url:'{{ url("/admin/AddExistingPageSection") }}',
          method:"POST",
          data: {pages:pid,page_sections:pageSections,_token:_token},
          success:function(response) {
            $this.html('Save');
            $('#pageSectionBody').html(response);
            $('#addExistingPageSectionModal').modal('hide');
            $('#addExistingPageSectionModal form')[0].reset();
          }
        })
    
    });
    
    
      $(document.body).on('click', '.DeletePageSectionBtn' ,function(){
        $this=$(this);
          var id=$(this).attr('myid');
            var _token = $('input[name="_token"]').val();
            if (confirm('{{ trans('global.areYouSure') }}')) {
                $.ajax({
                  url:"{{ url('admin/pagesections') }}/"+id,
                  method:"POST",
                  data: {
                    id:id,_token:_token,_method: 'DELETE'
                  },
                  success:function(response) {
                    $this.closest('tr').remove();
                  }
                })
            }
        });
      
      $(document.body).on('click', '.addPageSection' ,function(){
      
      var _token = $('input[name="_token"]').val();
            $.ajax({
              url:'{{ url("/admin/GetPageSectionModalForm") }}',
              method:"POST",
              data: {_token:_token},
              success:function(response) {
                $('#addPageSectionModal .modal-content').html(response);
                $('#addPageSectionModal').modal('show');
              }
            })
      });
      
      $(document.body).on('click', '.editPageSection' ,function(){
      
      var id=$(this).attr('myid');
      var _token = $('input[name="_token"]').val();
              $.ajax({
                url:'{{ url("/admin/GetPageSectionModalForm") }}',
                method:"POST",
                data: {id:id,_token:_token},
                success:function(response) {
                  $('#addPageSectionModal .modal-content').html(response);
                  $('#addPageSectionModal').modal('show');
                }
              })
      });
      
        
            $(document.body).on('click', '#savePageSection' ,function(){
              $this=$(this);
      $loader='<div class="spinner-border text-dark" role="status">'+
                  '<span class="sr-only">Loading...</span>'+
                  '</div>';
          $this.html($loader);
          
            var pid=$('#page_id').val();
            var nickname=$('#section_nickname').val();
            var formdata=$('#addPageSectionModal form').serialize()+'&contentPages='+pid;
      
            if(nickname){
              var _token = $('input[name="_token"]').val();
                  $.ajax({
                    url:'{{ url("/admin/AddPageSection") }}',
                    method:"POST",
                    data: formdata,
                    success:function(response) {
                      $this.html('Save');
                      $('#pageSectionBody').html(response);
                      $('#addPageSectionModal').modal('hide');
                      $('#addPageSectionModal form')[0].reset();
                    }
                  })
            }
          });
      
      </script>
    
  
<script>

    updateIndexPageSection = function(e, ui) {
            $('td.index', ui.item.parent()).each(function (i) {
                $(this).html(i + 1);
            });
        };
        $('.PageSectionSort tbody').sortable({
          cursor: 'move',
          axis: 'y',
          stop: updateIndexPageSection,
          update: function(e, ui) {
            $(this).sortable('refresh');
            var params = {};
            params = $('.PageSectionOrders').serializeArray();
            var pid=$('#contentPage_id').val();
            //console.log('params',params);
            var _token = $('input[name="_token"]').val();
              $.ajax({
                url:'{{ url("/admin/ChangePageSectionOrder") }}',
                method:"POST",
                data: {
                    params: params,pid:pid,_token:_token
                },
                success:function(response) {
    
                }
              })
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
            var pid=$('#contentPage_id').val();
            //console.log('params',params);
            var _token = $('input[name="_token"]').val();
              $.ajax({
                url:'{{ url("/admin/ChangePageContentSectionOrder") }}',
                method:"POST",
                data: {
                    params: params,pid:pid,_token:_token
                },
                success:function(response) {
    
                }
              })
            }
        });
    
    </script>
  
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
                  xhr.open('POST', '{{ route('admin.pages.storeCKEditorImages') }}', true);
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
                  data.append('crud_id', '{{ $contentPage->id ?? 0 }}');
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
    Dropzone.options.photosDropzone = {
    url: '{{ route('admin.pages.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 10,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 1200,
      height: 500
    },
    success: function (file, response) {
      $('form').find('input[name="photos"]').remove()
      $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photos[]"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
  @if(isset($page) && $page->photos)
      var file = {!! json_encode($page->photos) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
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
    url: '{{ route('admin.pages.storeMedia') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
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
  @if(isset($page) && $page->attachments)
          var files =
            {!! json_encode($page->attachments) !!}
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
  <script>
      Dropzone.options.featuredImageDropzone = {
      url: '{{ route('admin.pages.storeMedia') }}',
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
  @if(isset($page) && $page->featured_image)
        var file = {!! json_encode($page->featured_image) !!}
  
        console.log('file',file);
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

@endsection