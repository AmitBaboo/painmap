{{-- <link rel="stylesheet" href="{{asset('assets')}}/plugins/summernote/summernote-bs4.css"> --}}
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<div class="card rd card-secondary">
    <div class="card-header">
      <h3 class="card-title">Add Content 
          
      </h3><div class="float-right badge badge-warning"></div>
    </div>
    <!-- /.card-header -->
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputtext1">Title</label>
          <input type="text" class="form-control"  name="title" placeholder="Title">
        </div>
        <div class="form-group">
          <label for="exampleInputtext1">Sub Title</label>
          <input type="text" class="form-control"  name="sub_title" placeholder="Title">
          <input type="hidden" value="{{ $pages[0]->level }}" name="level">
          <input type="hidden" value="{{ $pages[0]->page_id }}" name="page_id">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Body</label>
          <textarea class="textarea" name="body" id="bodyadd" placeholder="Body" rows="10" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        </div>
        <div class="row">
          <div class="col">
            <input type="file" name="file" accept="image/*" onchange="loadFile(event)" multiple>
            <br>
            <br>
            <select name="status" id="" class="form-control">
                <option value="0">Inactive</option>
                <option value="1">Active</option>
            </select>
            <br>
            @if(count($subcats) > 0)
                <select name="category" id="" class="form-control">
                                <option value="">-select-</option>
                                @foreach ($subcats as $item)
                                    <option value="{{$item->id}}">{{$item->sname}}</option>
                                @endforeach
                </select>
            @endif
            
          </div>
          <div class="col">
            <img id="output" style="width: 100%; max-height: 66%" />
            <div class="form-group">
              <label for="exampleInputtext1">Link</label>
              <input type="text"  class="form-control" name="file_caption" placeholder="Link to resauce">
            </div>
          </div>
        </div>

      {{-- <script src="{{asset('assets')}}/plugins/summernote/summernote-bs4.min.js"></script> --}}

          <script>
            var loadFile = function(event) {
              var output = document.getElementById('output');
              output.src = URL.createObjectURL(event.target.files[0]);
              output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
              }
            };

            $(function () {
              // Summernote
              // $('.textarea').summernote()
              // CKEDITOR.replace( 'body' );
              CKEDITOR.replace( document.getElementById('bodyadd') );
            })
          </script>
      </div>
      <!-- /.card-body -->
  </div>