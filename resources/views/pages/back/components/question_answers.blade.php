<table class="table datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Follow Up</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($questions as $item)
            <tr>
                <td @if ($item->start == 1) class="alert alert-success" @endif @if ($item->start == 0) class="alert alert-danger"
        @endif>{{ $item->id }}</td>
        <td>{{ $item->question }}</td>
        <th>
            @foreach ($question_ans as $sitem)
                @if ($sitem->id == $item->id && $sitem->next_question_id != '')
                    <span class="badge badge-warning" style="font-size: 15px">{{ $sitem->answer }}
                        #{{ $sitem->next_question_id }}</span>
                @endif
            @endforeach
        </th>
        <td>
            <div class="btn-group btn-group-sm">
                @if ($item->start != 0)
                    <a href="#" class="btn btn-success" onclick="getFollowUpQuestion({{ $item->id }})"
                        data-toggle="modal" data-target="#modal-xl"><i class="fas fa-pen"></i> Set</a>
                @endif
                <a href="#" class="btn btn-info" onclick="editQuestion({{ $item->id }})" data-toggle="modal"
                    data-target="#modal-update"><i class="fa fa-pen"></i> Edit</a>
                <a href="#" class="btn btn-danger" onclick="deleteQuestion({{ $item->id }})"><i
                        class="fa fa-trash"></i> Delete</a>
            </div>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(".datatable")
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
