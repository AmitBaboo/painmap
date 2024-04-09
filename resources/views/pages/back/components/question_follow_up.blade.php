<style>
    tr:hover {
        background-color: rgb(0, 204, 255);
        color: #fff
    }

</style>
<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title"> <i class="fa fa-sad-tear"></i> {{ $question }}</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-md-12">

                <input type="hidden" name="select_question" value="{{ $selected_question }}">

                <table class="table datatable1">
                    <thead>
                        <tr>
                            <th style="width: 20%">Body Part</th>
                            <th style="width: 40%">Action</th>
                            <th>#</th>
                            <th>Question</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unique_questions as $uitem)
                            <tr>
                                <td>{{ $uitem->name }}</td>
                                <td>
                                    @foreach ($questions as $item)
                                        @if ($item->id == $selected_quesion_id)
                                            @if ($uitem->id == $item->next_question_id)
                                                <input type="radio" name="answer_{{ $item->answerid }}"  value="{{ $uitem->id . '_' . $item->answerid }}" checked />
                                            @else
                                                <input type="radio" name="answer_{{ $item->answerid }}" value="{{ $uitem->id . '_' . $item->answerid }}" />
                                            @endif
                                            {{ $item->answer }}
                                            <br>
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $uitem->id }}</td>
                                <td @if ($uitem->start == 1) class="alert alert-success" @endif @if ($uitem->start == 0) class="alert alert-danger"
                        @endif>{{ $uitem->question }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>
        </div>

        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"> <i class="fa fa-plus-circle"></i> Add</button>
        </div>
    </div>

</div>

<script>
    $(".datatable1")
        .DataTable({
            responsive: true,
            lengthChange: false,
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            buttons: ["copy", "csv", "excel", "pdf", "print"],
        })
        .buttons()
        .container()
        .appendTo("#customersTable_wrapper .col-md-6:eq(0)");

</script>
