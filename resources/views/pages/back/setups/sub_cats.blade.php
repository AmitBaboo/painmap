@extends('layout')
@section('content')
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
            Page Editable Contents
            {{-- <button class="btn btn-info" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-plus"></i></button> --}}
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

      <div class="" id="load_page_content">
        <!--row of content-->
        <div class="card-body content-row">
         <button  class="btn btn-info" data-toggle="modal" data-target="#addcatm"><i class="fa fa-plus"></i></button>
          <table class="table">
              <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Value</th>
                  <th>Status</th>
                  <th>Action</th>
              </thead>
              <tbody>
                 @foreach($sub_cats as  $item)
                     <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->sname}}</td>
                        <td>{{$item->cname}}</td>
                        <td>{{$item->value}}</td>
                        <td>{{$item->status == 0 ? 'Active': 'Disabled'}}</td>
                        <td>
                            <a onclick="page_editable_cat({{ $item->id }},'{{$item->sname}}','{{$item->cat_id}}','{{$item->value}}')" class="btn btn-info" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-pen"></i></a>
                            <a class="btn btn-info" onclick="deleteItem({{ $item->id }},{{ $item->status }})"><i class="fa fa-trash"></i></a>
                        </td>
                     </tr>
                 @endforeach
              </tbody>
          </table>
          {{ $sub_cats->render("pagination::bootstrap-4") }}
        </div>

      </div>
      <!--end row of content-->
    </div>

  </section>



  <div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Sub Subcategory</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="edit_page_content" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body" id="page_editable_content">

            <div class="col-10"  style="margin-bottom: .5em">
                <input id="subname" type="text" class="form-control" name="name" placeholder="Cat  Name" required />
                <input type="hidden" name="id" id="subid"  required />
              </div>
              <div class="col-10"  style="margin-bottom: .5em">
                <select name="catid" id="catid" class="form-control">
                    <option value="">-select-</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id}}">{{ $item->name}}</option>
                    @endforeach 
                </select>
              </div>
              <div class="col-10"  style="margin-bottom: .5em">
                <input id="value" type="text" class="form-control" name="value" placeholder="Value" required />
              </div>

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


  <div class="modal fade" id="addcatm">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Sub Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="add_page_content" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body" id="page_add_content">

            <div id="answers_div">
                <br>
                <a href="#" class="btn bg-blue addRow1"><i class="fa fa-plus-circle"></i></a>
                <br>
                <br>
                <div class="ansrow1">
                  <div class="row">
                    <div class="col-10 answer">
                        <div class="col-10" style="margin-bottom: .5em">
                            <input id="subname" type="text" class="form-control" name="name[]" placeholder="Cat  Name" required />
                          </div>
                          <div class="col-10" style="margin-bottom: .5em">
                            <select name="catid[]" id="catid" class="form-control">
                                <option value="">-select-</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id}}">{{ $item->name}}</option>
                                @endforeach 
                            </select>
                          </div>
                          <div class="col-10" style="margin-bottom: .5em">
                            <input id="value" type="text" class="form-control" name="value[]" placeholder="Value" required />
                          </div>
                    </div>
                    <div class="col-2">
                        <a class="btn bg-red removeRow1"><i class="fa fa-minus-circle"></i></a>
                    </div>
                  </div>
                </div>
                <br>
                <div class="newrow1"></div>

                <div>
                </div>
              </div>
              

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
    

    function page_editable_cat(id,name,cat_id,value) { 
      $('#catid').val(cat_id)
      $('#subid').val(id)
      $('#subname').val(name)
      $('#value').val(value)
    }

    // load page content
    //$('#load_page_content').load('/load_page_content');

    $('#add_page_content').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        type: "post",
        url: "{{ url('add_sub_category')}}",
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
          // console.log(response);
          if (response.success == true) {
            showSuccessMessage();
            document.location.reload()
          } else {
            alert(response.info)
          }
        }
      });
    });


    $('#edit_page_content').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        type: "post",
        url: "{{ url('edit_sub_category')}}",
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
          // console.log(response);
          if (response.success == true) {
            showSuccessMessage();
            document.location.reload()
          } else {
            alert(response.info)
          }
        }
      });
    });


    function deleteItem(id,status) {
      if (confirm('the record will be deleted') == false) {
        // remove item
        return;
      }

      $.get('/delete_category/'+id+'/'+status, function(res){
          if (res == 1) {
            document.location.reload()
          }else{
            alert('record status toggle failed')
          }
      })
    }

    $('.addRow1').on('click', function() {
    clone = $('.ansrow1').clone(true);
        clone.appendTo('.newrow1');
        clone.removeClass('ansrow1').append('<br/>');
        clone.addClass('remove1');
    });

    $(document).on('click', '.removeRow1', function() {
        $(this).closest('.remove1').remove();   
    });

  </script>
    
  @endsection