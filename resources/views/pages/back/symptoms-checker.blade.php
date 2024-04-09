@extends('layout')
@section('content')
    <link href="{{ asset('assets/wizard/step.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/summernote/summernote-bs4.css">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Symptoms Checker') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Symptoms Checker</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Symptoms Information</h3>
                                </div>
                                <form id="initForm">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="inputSpentBudget">Body Parts</label>
                                                <select name="body_part_id" id="body_part_id" class="form-control">
                                                    <option value=""> -- Select --</option>
                                                    @foreach ($body_parts as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-9">
                                                <label for="inputEstimatedDuration">Question</label>
                                                <textarea type="text" name="question" id="question1"
                                                    class="form-control question textarea"
                                                    placeholder="Initial Question"></textarea>
                                                <div id="qanswerBox" style="display: none">
                                                    <br>
                                                    <input class="form-control" type="text" name="url" value=""
                                                        placeholder="url">
                                                    <br>
                                                    <label for="initialAnswers">Answers</label>

                                                    <div class="ansrow">
                                                        <div class="row row-cols-2">
                                                            <div class="col-10">
                                                                <input type="text" class="form-control answer"
                                                                    name="answer[]" placeholder="Answers" />
                                                            </div>
                                                            <div class="col-1">
                                                                <button class="btn bg-red removeRow"><i
                                                                        class="fa fa-minus-circle"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="newrow"></div>

                                                    <!-- Add Answers -->
                                                    <a href="#" class="btn bg-blue addRow"><i
                                                            class="fa fa-plus-circle"></i></a>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Questions to ask</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="initForm1">
                                        @csrf

                                        <label>
                                            <i class="fa fa-sad-tear"></i> Body Part:
                                            <span id="body_part_selected"></span>
                                        </label>

                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="form-group">
                                                    <textarea type="text" id="question" name="question"
                                                        class="form-control question textarea"
                                                        placeholder="Ask  Question"></textarea>
                                                    <br>
                                                    <input class="form-control" type="text" name="url" value=""
                                                        placeholder="optional video url for the above question">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div style="margin-bottom: .5em;">
                                                    <a href="#" id="finalQuestion" class="btn btn-warning"> <i
                                                            class="fa fa-stop-circle"></i> Final</a>
                                                </div>
                                                <div style="margin-top: .5em;">
                                                    <a style="display: none" href="#" id="answers_btn" class="btn btn-info">
                                                        <i class="fa fa-stop-circle"></i> Answers</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- add multi  answers -->
                                        <div id="answers_div">
                                            <label> Question Answers </label>
                                            <!-- <div>
                          <span style="font-size: 22px; color: teal"> Question Answers</span>
                        </div>
                        <br> -->
                                            <div class="ansrow1">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <input type="text" class="form-control answer" name="answer[]"
                                                            placeholder="Answers" />
                                                    </div>
                                                    <div class="col-1">
                                                        <button class="btn bg-red removeRow1"><i
                                                                class="fa fa-minus-circle"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="newrow1"></div>

                                            <div>
                                                <a href="#" class="btn bg-blue addRow1"><i
                                                        class="fa fa-plus-circle"></i></a>
                                                <a href="#" id="saveQuestion" class="btn btn-info"> <i
                                                        class="fa fa-plus-circle"></i> Save</a>
                                            </div>
                                        </div>
                                        {{-- end multi questions --}}

                                        {{-- add final questions --}}

                                        <div id="final_question_div"
                                            style="display: none; background-color: #ffc107; padding: 1em">
                                            <label>Final Question Setup</label>
                                            <br>
                                            <form id="frmFinalQuestion">
                                                <input type="checkbox" value="red" name="redflag" id="redflag"> Red Flag
                                                Question
                                                <div class="finalQinputs">
                                                    <div class="form-group">
                                                        <select name="product" id="product" class="form-control select2"
                                                            data-placeholder="Select Products"
                                                            data-dropdown-css-class="select2-purple" style="width: 100%"
                                                            multiple>
                                                            @foreach ($products as $item)
                                                                <option value="{{ $item->id }}">{{ $item->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" id="video_path" class="form-control"
                                                            name="video_path" placeholder="Video Url">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea id="video_desc" class="form-control" name="video_desc"
                                                        placeholder="Video/Red Flag Description"></textarea>
                                                </div>
                                                <a href="#" id="finalQuestionBtn" class="btn btn-success"> <i
                                                        class="fa fa-save"></i> Save</a>
                                            </form>

                                        </div>
                                        {{-- end final question --}}

                                    </form>
                                </div>
                            </div>
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Answers</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body p-0" id="question_answers">
                                    Loading...
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="tab">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Final Message to Client</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputSpentBudget">Message</label>
                                        <textarea type="text" id="inputSpentBudget" class="form-control"
                                            placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                        <hr />

                        <!-- Controls -->
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>

                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </div>
                    <!-- End of big card body -->
                </div>
                <!-- End of big card -->
            </div>
            <!-- End of seccond section -->
        </section>
        <!-- End of content-wrapper -->
    </div>

    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Follow-up Questions</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="set_question_answer">
                    @csrf
                    <div class="modal-body" id="followUpQuestion">
                        Loading...
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>

    <div class="modal fade" id="modal-update">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Questions</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="updateQuestion">
                    Loading...
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>


    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>3
    <script>
        //   jQuery(document).ready(function($){
        //     $('.textarea').summernote()
        // });

        $(document).on('keyup', '#question1', function() {
            if ($(this).val() !== '') {
                $('#qanswerBox').show()
            } else {
                $('#qanswerBox').hide()
            }
        })

        var currentTab = 0; // Current tab is set to be the first tab (0)

        showTab(currentTab); // Display the current tab

        $(document).on('click', '#finalQuestionBtn', function(e) {
            e.preventDefault();
            var product = $('#product').val();
            var videoPath = $('#video_path').val();
            var bodyPartId = localStorage.getItem('bodyPartId');
            var question = $("#question").val();
            var video_desc = $("#video_desc").val();
            var redflag = '';
            if ($('#redflag:checkbox:checked').length > 0) {
                redflag = 1;
            }

            $.ajax({
                type: "post",
                url: "/save_final_question",
                data: {
                    "_token": "{{ csrf_token() }}",
                    product: product,
                    videoPath: videoPath,
                    bodyPartId: bodyPartId,
                    question: question,
                    video_desc: video_desc,
                    redflag: redflag
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        console.log(bodyPartId);
                        $('#question_answers').load('/load_question_answers/' + bodyPartId);
                        $('#video_path').val('');
                        $("#question").val('');
                        // $(".select2").empty();
                        $('#final_question_div').hide('slow');
                        $('#answers_div').show('slow');
                        $('#answers_btn').hide('slow');
                        $('#finalQuestion').show('slow');

                        showSuccessMessage();
                    } else {
                        alert('Question not created, please try again!');
                    }
                }
            });
        });

        // clone the answer row 
        $('.addRow').on('click', function() {
            clone = $('.ansrow').clone(true);
            clone.appendTo('.newrow');
            clone.removeClass('ansrow').append('<br/>');
            clone.addClass('remove');
        });

        $(document).on('click', '.removeRow', function() {
            $(this).closest('.remove').remove();
        });

        $('.addRow1').on('click', function() {
            clone = $('.ansrow1').clone(true);
            clone.appendTo('.newrow1');
            clone.removeClass('ansrow1').append('<br/>');
            clone.addClass('remove1');
        });

        $(document).on('click', '.removeRow1', function() {
            $(this).closest('.remove1').remove();
        });

        $(document).on('click', '#nextBtn', function(e) {
            e.preventDefault();

            $('#nextBtn').hide()

            $('#body_part_selected').html($('#body_part_id option:selected').text());

            if ($('#body_part_id').val() == '') {
                alert('Please you need to select body part in order to continue!');
                return
            }

            if ($('#body_part_id').val() != '' && $('#question1').val() == '') {
                var bodyPartId = $('#body_part_id').val();
                localStorage.setItem('bodyPartId', bodyPartId)
                $('#question_answers').load('/load_question_answers/' + bodyPartId);
                return
            }

            if (confirm('You are about to set a new question.') == false) {
                return
            }

            data = $('#initForm').serialize();
            $.ajax({
                type: "post",
                url: "/set_init_question",
                data: data,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        showSuccessMessage();
                        $('.question').val('');
                        $('.answer').val('');
                        $('.ansrow').empty();
                        $('#question_answers').load('/load_question_answers/' + $('#body_part_id')
                        .val());
                    } else {
                        alert('try again, question not created')
                    }
                }
            });


        });

        $(document).on('click', '#prevBtn', function(e) {
            $('#nextBtn').show()
        });

        function getOtherQuestions() {
            $('#getOtherQuestions').show('slow')
        }

        function getFollowUpQuestion(questionId) {
            $('#followUpQuestion').load('/load_question_follow_up/' + $('#body_part_id').val() + '/' + questionId);
        }

        function editQuestion(questionId) {
            $('#updateQuestion').load('/load_question_update/' + questionId);;
        }


        $('#set_question_answer').on('submit', function(e) {
            e.preventDefault();
            data = $(this).serialize();
            $.ajax({
                type: "post",
                url: "/set_question_answer",
                data: data,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        showSuccessMessage();
                        $('#question_answers').load('/load_question_answers/' + $('#body_part_id')
                        .val());

                        $(function() {
                            $('#modal-xl').modal('toggle');
                        });
                    } else {
                        alert('try again, question not created')
                    }
                }
            });
        });

        $('#saveQuestion').on('click', function(e) {
            e.preventDefault();
            data = $('#initForm1').serialize();
            $.ajax({
                type: "post",
                url: "/set_init_question",
                data: data,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        showSuccessMessage();
                        $('.question').val('');
                        $('.answer').val('');
                        $('.ansrow').empty();
                        $('.newrow1').empty();
                        $('#question_answers').load('/load_question_answers/' + $('#body_part_id')
                        .val());
                    } else {
                        alert('Question not created, please try again');
                    }
                }
            });
        });

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            var nextBtn = document.getElementById("nextBtn");
            var prevBtn = document.getElementById("prevBtn");

            x[n].style.display = "block";
            nextBtn.style.fontFamily = "inherit";
            nextBtn.className = "btn btn-danger";
            prevBtn.style.fontFamily = "inherit";
            prevBtn.className = "btn btn-secondary";

            //... and fix the Previous/Next buttons:
            if (n == 0) {
                prevBtn.style.display = "none";
            } else {
                prevBtn.style.display = "inline";
            }
            if (n == (x.length - 1)) {
                nextBtn.innerHTML = "Continue"; //  submit
            } else {
                nextBtn.innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            if ($('#body_part_id').val() == '') {
                return
            }


            if ($('#body_part_id').val() != '') {
                // check if first question is served
                $.ajax({
                    type: "get",
                    url: "/checkFistQuestionSet/" + $('#body_part_id').val(),
                    data: '',
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        if (response == 0) {


                            Swal.fire({
                                title: 'Cant Continue',
                                text: "Set Initial Question to Continue!!",
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                // if (result.isConfirmed) {  
                                //   document.location.reload();
                                // }
                            }).then(() => {
                                document.location.reload();
                            })
                        } else {

                        }
                    }
                });
            }
            //return

            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");

            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }

        // show or hide final question
        // finalQuestion final_question_div answers_div
        $(document).on('click', '#finalQuestion', function(e) {
            e.preventDefault()
            $('#final_question_div').show('slow')
            $('#answers_div').hide('slow')
            $('#answers_btn').show('slow')
            $('#finalQuestion').hide('slow')
        });

        $(document).on('click', '#answers_btn', function(e) {
            e.preventDefault()
            $('#final_question_div').hide('slow')
            $('#answers_div').show('slow')
            $('#finalQuestion').show('slow')
            $('#answers_btn').hide('slow')
        });

    </script>

    <script>
        function deleteQuestion(id) {
            if (confirm('Delete Item ?') == false) {
                return
            }

            $.ajax({
                type: "get",
                url: "/delete_question/" + id,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        showSuccessMessage();
                        $('#question_answers').load('/load_question_answers/' + $('#body_part_id').val());
                    } else {
                        alert(response.msg);
                    }
                }
            });
        }

    </script>

@endsection
