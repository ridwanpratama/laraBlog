@extends('layouts.app')
@section('title', 'Add Post')
@section('pagetitle')
    <h1>Add New Post</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
          <div class="card">
            
            <div class="card-header">
              <h4>Create new post</h4>
            </div>
            
            <div class="card-body">
              <form action="{{ route('save_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="author" readonly>
                  </div>
                </div>

              <div class="form-group row mb-4">
                <label @error('title') class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-danger" 
                @enderror class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="title" @error('title') placeholder="{{ $message }}"@enderror>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label @error('image') class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-danger" 
                @enderror class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Featured Image</label>
                <div class="col-sm-12 col-md-7">
                  <input type="file" class="form-control" name="image">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label @error('tags_id') class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-danger" 
                @enderror class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control" name="tags_id" id="tags_id">
                    <option value disable>Choose Tag</option>
                    @foreach ($tag as $item)
                    <option value="{{ $item->id }}">{{ $item->tags }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="d-flex justify-content-center">
                <span @error('content') class="h3 font-weight-bold text-danger" 
                @enderror class="h3 font-weight-bold">Content</span>
             </div>
             
              <div class="card-body">
                <div class="form-group row mb-4">
                  <div class="col-sm-12 col-md-12">
                    <textarea @error('content') placeholder="{{ $message }}"@enderror name="content" class="form-control my-editor">{!! old('content', $content ?? '') !!}</textarea>
                  </div>
                </div>

                <div class="d-flex justify-content-center">
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary">Publish</button>
                </div>
              </div>
            </div>
          </form>
            </div>
          </div>
        </div>
      </div>
</div>
</div>
@endsection

@push('page-scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endpush

@push('after-script')
<script>
    var editor_config = {
    path_absolute : "/",
    selector: 'textarea.my-editor',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern autoresize"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config);
  </script>
@endpush