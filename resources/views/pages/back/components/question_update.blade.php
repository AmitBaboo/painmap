<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title"> <i class="fa fa-sad-tear"></i> {{ $question->question }}</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <form class="update_question">
            @csrf
            <div class="row">

                <div class="col-md-12">

                    <input type="hidden" name="qid" value="{{ $question->id }}">
                    <textarea class="form-control" name="question" id="question" cols="30"
                        rows="10">{{ $question->question }}</textarea>


                </div>
                <div class="col-md-12">
                    <label class="control-label">Make Initial Question</label>
                    <select name="makeInitQuestion" id="" class="form-control">
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-edit"></i> Update</button>
            </div>
        </form>

        <hr>
        @foreach ($qans as $key => $item)
            @if ($item->answer != '0')
                <h4>Add New Question</h4>
                <input type="text" id="answer" class="form-control" placeholder="Enter new answer">
                <input type="hidden" id="qid2" value="{{ $question->id }}">
                <br>
                <input class="form-control" type="text" name="url" id="url" placeholder="url">
                <br>
                <button id="add_question_btn" class="btn btn-info"> <i class="fa fa-plus-circle"></i> Add</button>
                <hr>
            @break
        @endif
        @endforeach

        <h4>Question Answers</h4>
        @foreach ($qans as $key => $item)

            @if ($item->answer == '0')
                <form class="update_question">
                    @csrf
                    <table class="table">
                        <thead>
                            {{-- <th>Answer</th> --}}
                            <th>Url</th>
                            <th>Product</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr>
                                {{-- <td>
                                    <input class="form-control" type="hidden" name="qid" value="{{$item->id}}">
                                    <input readonly class="form-control" type="text" name="qans" value="{{$item->answer}}">
                                </td> --}}
                                <td>
                                    <input class="form-control" type="text" name="url"
                                        value="{{ $item->video_path }}" placeholder="url">
                                    <input class="form-control" type="hidden" name="qid" value="{{ $item->id }}">
                                    <input readonly class="form-control" type="hidden" name="qans"
                                        value="{{ $item->answer }}">
                                </td>
                                <td>
                                    <select name="items[]" id="items" class="form-control select2"
                                        data-placeholder="Select Products" data-dropdown-css-class="select2-purple"
                                        style="width: 100%" multiple>
                                        @foreach ($products as $ite)
                                            <option value="{{ $ite->id }}" @foreach (explode(',', $item->items) as $a) @if ($ite->id == $a) selected @endif @endforeach>
                                                {{ $ite->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <textarea id="video_desc" class="form-control" name="video_desc" cols="30"
                                        rows="10"
                                        placeholder="video/redflag description">{{ $item->video_desc }}</textarea>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-edit"></i>
                                        Update</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            @else
                <form class="update_question">
                    @csrf
                    <table class="table">
                        {{-- <thead>
                                    <th>Answer</th>
                                    <th>Url</th>
                                    <th>Product</th>
                                    <th>Action</th>
                                </thead> --}}
                        <tbody>
                            <tr>
                                <td>
                                    <input class="form-control" type="hidden" name="qid" value="{{ $item->id }}">
                                    <input class="form-control" type="text" name="qans"
                                        value="{{ $item->answer }}">
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="url"
                                        value="{{ $item->video_path }}" placeholder="url">
                                </td>
                                <td></td>
                                <td>
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-editCSRF"></i>
                                        Update</button>
                                    <a type="submit" class="btn btn-danger" href="#"
                                        onclick="deleteAnswer({{ $item->id }})"> <i class="fa fa-trash"></i>
                                        Update</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            @endif
        @endforeach

    </div>

</div>
<script>
    $('.select2').select2()

    $('.update_question').on('submit', function(e) {
        e.preventDefault();
        data = $(this).serialize();
        $.ajax({
            type: "post",
            url: "/update_question",
            data: data,
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.status == 200) {
                    showSuccessMessage();
                    $('#question_answers').load('/load_question_answers/' + $('#body_part_id')
                        .val());
                    $('#modal-update').modal('hide')
                } else {
                    alert(response.msg);
                }
            }
        });
    });

    $('#add_question_btn').on('click', function(e) {
        e.preventDefault();
        var id = $('#qid2').val();
        var answer = $('#answer').val();
        var url = $('#url').val();
        $.ajax({
            type: "post",
            url: "/addQuestionAnswer",
            data: {
                id: id,
                answer: answer,
                url: url,
                "_token": "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response == 200) {
                    showSuccessMessage();
                    $('#question_answers').load('/load_question_answers/' + $('#body_part_id')
                        .val());
                    $('#modal-update').modal('hide')
                } else {
                    alert('Error: Answer not Added');
                }
            }
        });
    });

    function deleteAnswer(id) {
        alert(id)
        $.get("deleteQuestionAnswer/" + id, function(response) {
            console.log(response);
            if (response == 200) {
                showSuccessMessage();
                $('#question_answers').load('/load_question_answers/' + $('#body_part_id').val());
                $('#modal-update').modal('hide')
            } else {
                alert('Err: Delete not done');
            }
        })
    }
</script>
