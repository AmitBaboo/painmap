<link rel="stylesheet" href="{{ asset('assets') }}/plugins/summernote/summernote-bs4.css">
{{-- <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> --}}

<div class="card rd card-secondary">
    <div class="card-header">
        <h3 class="card-title">Editable Content</h3>
        <div class="float-right badge {{ $pages->status == '1' ? 'badge-success' : 'badge-danger' }}">Status:
            {{ $pages->status == '1' ? 'Active' : 'Inactive' }}</div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputtext1">Title </label>
            <input type="text" class="form-control" value="{{ $pages->title }}" name="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Sub Title</label>
            <input type="text" class="form-control" value="{{ $pages->sub_title }}" name="sub_title"
                placeholder="Title">
            {{-- <input type="hidden" value="{{ $pages->level }}" name="level"> --}}
            <input type="hidden" value="{{ $pages->page_id }}" name="page_id">
            <input type="hidden" value="{{ $pages->id }}" name="id">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Body</label>
            <textarea class="form-control textarea" name="body" id="bodyeditx" placeholder="Body"
                rows="10">{{ $pages->body }}</textarea>
        </div>
        <div class="row">
            <div class="col">
                Image
                <input type="file" name="file" accept="image/*" onchange="loadFile(event)" multiple>
                <br>
                <br>
                Status
                <select name="status" id="" class="form-control">
                    <option value="1" {{ $pages->status == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $pages->status == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
                <br>
                Level
                <select name="level" id="" class="form-control">
                    @foreach ($levels as $item)
                        @if ($item['page_id'] == $pages->page_id)
                            <option value="{{ $item['id'] }}"
                                {{ $pages->level == $item['id'] ? 'selected' : '' }}>
                                {{ $item['name'] }}</option>
                        @endif
                    @endforeach
                </select>
                <br>
                @if (count($subcats) > 0)
                    Category
                    <select name="category" id="" class="form-control">
                        <option value="">-select-</option>
                        @foreach ($subcats as $item)
                            <option {{ $item->id == $pages->subcat_id ? 'selected' : '' }}
                                value="{{ $item->id }}">
                                {{ $item->sname }}</option>
                        @endforeach
                    </select>
                @endif
                <br>
                Order Number
                <input type="number" name="order" value="{{ $pages->order_no }}" class="form-control"
                    placeholder="order no">
                <br>
            </div>
            <div class="col">
                <img id="output" style="width: 100%; max-height: 66%" src="{{ url('/') . $pages->file_path }}" />
                <div class="form-group">
                    <label for="exampleInputtext1">Link</label>
                    <input type="text" value="{{ $pages->file_caption }}" class="form-control" name="file_caption"
                        placeholder="link to resauce">
                    <input type="hidden" value="{{ $pages->file_path }}" name="old_file_path">
                </div>
            </div>
        </div>
        <script src="{{ asset('assets') }}/plugins/summernote/summernote-bs4.min.js"></script>

        @if ($pages->page_id != 50000)
            <script>
                // var loadFile = function(event) {
                //   var output = document.getElementById('output');
                //   output.src = URL.createObjectURL(event.target.files[0]);
                //   output.onload = function() {
                //     URL.revokeObjectURL(output.src) // free memory
                //   }
                // };

                // $(function () {
                //   // Summernote
                //   //$('.textarea').summernote() 
                //   // CKEDITOR.replace( 'body' );
                //   CKEDITOR.replace( document.getElementById('bodyedit') );
                // })

            </script>
            <script>
                var loadFile = function(event) {
                    var output = document.getElementById('output');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                    }
                };

                $(function() {
                    // Summernote
                    $('.textarea').summernote()
                    // CKEDITOR.replace( 'body' );
                    // CKEDITOR.replace( document.getElementById('bodyedit') );
                })

            </script>
        @endif

    </div>
    <!-- /.card-body -->
</div>
