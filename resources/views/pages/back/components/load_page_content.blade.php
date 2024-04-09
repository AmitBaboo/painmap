@foreach ($pages as $k => $item)
              <div class="card-body content-row" >
                {{-- image --}}
                <img class="img-fluid pad" src="{{ url('/').$item->file_path }}"  style="height: 30em" alt="Photo" />
                {{-- file caption --}}
                <br>
                <i>{{ $item->file_caption }}</i>
                {{-- title --}}
                <h3>{{ $item->title }}</h3>
                {{-- subtitle --}}
                <h5>{{ $item->sub_title }}</h5>

                {{-- level --}}
                <p><b>Level: <span class="badge badge-info">{{ $item->level }}</span></b></p>
                {{-- category --}}
                <p><b>Category: <span class="badge badge-info">{{ $item->name }}</span></b></p>
                {{-- body --}}
                <p>{!! $item->body !!}</p>

                <p>
                  <span class="badge {{ $item->status=='1' ? 'badge-success':'badge-danger' }}">Status: {{ $item->status=='1' ? 'Active':'Inactive' }}</span>
                </p>
                <div class="float-right btns" style="display: none">
                    <div class="btn-group">
                        <button onclick="page_editable_content({{ $item->id }})" class="btn btn-info" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-pen"></i></button>
                        <button onclick="page_add_content({{ $item->page_id }})" class="btn btn-info" data-toggle="modal" data-target="#modal-xl2"><i class="fa fa-plus"></i></button>
                        @if($k != 0)
                              <button class="btn btn-info"  onclick="deleteItem({{ $item->id }})"><i class="fa fa-trash"></i> </button>
                        @endif
                      </div>
                </div>

              </div>
          @endforeach

          <script>
            $('.content-row').mouseover(function (e) { 
            $(this).find('div').closest('.btns').show()
        });
        $('.content-row').mouseout(function (e) { 
            $(this).find('div').closest('.btns').hide()
        });
          </script>