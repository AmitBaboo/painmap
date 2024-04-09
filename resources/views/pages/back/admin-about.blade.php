@extends('layout')
@section('content')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<style>
  .content-row:hover {
    background-color: #ebebeb;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ ucfirst($page_uri) }} Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ URL::to('/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">

    <div class="card card-widget">
      <div class="card-header">
        <div class="user-block">
          <div class="float-right">
           <div class="">
            <button onclick="page_add_content('{{ $pages[0]->page_id }}')" class="btn btn-info" data-toggle="modal" data-target="#modal-xl2"><i class="fa fa-plus"></i></button>
           </div>
           <br>
            @foreach ($pages as $k1 => $item1)
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin-bottom: 2px;">

                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="heading{{$item1->id}}">
                    <h5 class="panel-title" style="background-color: #37a8ec; color: #fff; padding: .4em; margin-bottom: 0">
                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$item1->id}}" aria-expanded="true" aria-controls="collapse{{$item1->id}}" style="color: cornsilk">
                        Level {{ $item1->level }} - {{$item1->title}}
                      </a>

                          {{-- <a style="float: right;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$item1->id}}" aria-expanded="true" aria-controls="collapse{{$item1->id}}">
                              <span style="padding-bottom: 3em">
                                <i class="fa fa-plus-circle fa-1x"></i>
                              </span>
                        </a> --}}
                    </h5>
                  </div>
                <div id="collapse{{$item1->id}}" class="panel-collapse collapse @if($k1 == 0) {{ 'in'}} @endif" role="tabpanel" aria-labelledby="heading{{$item1->id}}">
                    <div class="panel-body">
                      <div class="" id="load_page_content">
                      @foreach ($pages as $k => $item)
                          @if($item->level == $item1->level && $item->id == $item1->id )
                                <div class="card-body content-row row">
                                 
                                  
                                <div class="col-md-6" style="padding-left: 2rem">
                                      {{-- file caption --}}
                                      <br>
                                      <i>{{ $item->file_caption }}</i>
                                      {{-- title --}}
                                      <h3>Title: {{ $item->title }}</h3>
                                      {{-- subtitle --}}
                                      <h5>Subtitle: {{ $item->sub_title }}</h5>
                            
                                      {{-- level --}}
                                      <p><b>Level: <span class="badge badge-info">{{ $item->level }}</span></b></p>
                                      {{-- category --}}
                                      <p><b>Category: <span class="badge badge-info">{{ $item->name }}</span></b></p>
                                    
                                      {{-- body --}}
                                      <p>{!! $item->body !!}</p>
                            
                                      <span class="badge {{ $item->status=='1' ? 'badge-success':'badge-danger' }}">Status: {{ $item->status=='1' ? 'Active':'Inactive' }}</span>
                                      <div class="float-right btns" style="display: none">
                                        <div class="btn-group">
                                          <button onclick="page_editable_content('{{ $item->id }}')" class="btn btn-info" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-pen"></i></button>
                                          <button onclick="page_add_content('{{ $item->page_id }}')" class="btn btn-info" data-toggle="modal" data-target="#modal-xl2"><i class="fa fa-plus"></i></button>
                                          @if($k !=0)
                                              <button class="btn btn-info" onclick="deleteItem({{ $item->id }})"><i class="fa fa-trash"></i></button>
                                          @endif
                                        </div>
                                      </div>
                                </div>
                                 {{-- image --}}
                                 <div class="col-md-6">
                                  @if ($item->file_path != '')
                                      <img class="img-fluid pad thumbnail img-responsive" src="{{ url('/').$item->file_path }}" style="width: 100%; height: 50vh; margin-right: 0em; padding: 1rem" alt="Photo" />
                                  @endif
                               </div>
                        
                                </div>
                              @endif
                          @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
              @endforeach
          </div>
        </div>
        <!-- /.user-block -->
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
            <i class="far fa-circle"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->

      {{-- <div class="" id="load_page_content">
        <!--row of content-->
        @foreach ($pages as $k => $item)
        <div class="card-body content-row">
          {{-- image
          @if ($item->file_path != '')
          <img class="img-fluid pad" src="{{ url('/').$item->file_path }}" style="height: 30em" alt="Photo" />
          @endif

          {{-- file caption -
          <br>
          <i>{{ $item->file_caption }}</i>
          {{-- title --}
          <h3>{{ $item->title }}</h3>
          {{-- subtitle --}
          <h5>{{ $item->sub_title }}</h5>

          {{-- level --}
          <p><b>Level: <span class="badge badge-info">{{ $item->level }}</span></b></p>
          {{-- category --}
          <p><b>Category: <span class="badge badge-info">{{ $item->name }}</span></b></p>
         
          {{-- body --}
          <p>{!! $item->body !!}</p>

          <span class="badge {{ $item->status=='1' ? 'badge-success':'badge-danger' }}">Status: {{ $item->status=='1' ? 'Active':'Inactive' }}</span>
          <div class="float-right btns" style="display: none">
            <div class="btn-group">
              <button onclick="page_editable_content('{{ $item->id }}')" class="btn btn-info" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-pen"></i></button>
              <button onclick="page_add_content('{{ $item->page_id }}')" class="btn btn-info" data-toggle="modal" data-target="#modal-xl2"><i class="fa fa-plus"></i></button>
              @if($k !=0)
                  <button class="btn btn-info" onclick="deleteItem({{ $item->id }})"><i class="fa fa-trash"></i></button>
              @endif
            </div>
          </div>

        </div>
        @endforeach

      </div> --}}
      <!--end row of content-->
    </div>

  </section>



  <div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Page</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="edit_page_content" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body" id="page_editable_content">

            Loading...

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"> <i class="fa fa-plus-circle"></i> Update</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <div class="modal fade" id="modal-xl2">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Content</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="add_page_content" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body" id="page_add_content">

            Loading...

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"> <i class="fa fa-plus-circle"></i> Add</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
  <script>
    $(document).ready(function() {
      $('.content-row').mouseover(function(e) {
        $(this).find('div').closest('.btns').show()
      });
      $('.content-row').mouseout(function(e) {
        $(this).find('div').closest('.btns').hide()
      });

    }());

    function page_editable_content(pageId) {
      $('#page_editable_content').load('/page_editable_content/' + pageId)
    }

    function page_add_content(page_id) {
      $('#page_add_content').load('/page_add_content/' + page_id)
    }
    // load page content
    //$('#load_page_content').load('/load_page_content');

    $('#add_page_content').on('submit', function(e) {
      e.preventDefault();


      for (instance in CKEDITOR.instances) { //
          CKEDITOR.instances[instance].updateElement();
      }//

      $.ajax({
        type: "post",
        url: "{{ url('add_page_content')}}",
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
          // console.log(response);
          if (response.success == true) {
            showSuccessMessage();
            $('#load_page_content').load('/load_page_content/' + response.page_id);
            $(function() {
              $('#modal-xl2').modal('hide');
            });
            document.location.reload()
          } else {
            alert('question not created, your record count might be too long')
          }
        }
      });
    });


    $('#edit_page_content').on('submit', function(e) {
      e.preventDefault();

      for (instance in CKEDITOR.instances) { //
          CKEDITOR.instances[instance].updateElement();
      }//

      $.ajax({
        type: "post",
        url: "{{ url('edit_page_content')}}",
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
          // console.log(response);
          if (response.success == true) {
            showSuccessMessage();
            $('#load_page_content').load('/load_page_content/' + response.page_id);
            $(function() {
              $('#modal-xl').modal('hide');  
            });
            document.location.reload()
          } else {
            console.log(response);
            alert('question not created, your record count might be too long')
          }
        }
      });
    });


    function deleteItem(id) {
      if (confirm('the record will be deleted') == false) {
        // remove item
        return;
      }

      $.ajax({
        type: "get",
        url: "{{ url('delete_page_content')}}/" + id,
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
          // console.log(response);
          if (response.success == true) {
            showSuccessMessage();
            $('#load_page_content').load('/load_page_content/' + response.page_id);
            $(function() {
              $('#modal-xl').modal('hide');
            });
            document.location.reload()
          } else {
            alert('try again, question not created')
          }
        }
      });

    }
  </script>
  @endsection