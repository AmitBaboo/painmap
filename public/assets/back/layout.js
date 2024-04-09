var currentTab = 0; // Current tab is set to be the first tab (0)
  
showTab(currentTab); // Display the current tab
   
$(document).on('click', '#finalQuestionBtn', function(e) {
    e.preventDefault();
    var product = $('#product').val();
    var videoPath = $('#video_path').val();
    var bodyPartId = localStorage.getItem('bodyPartId');
    var question = $("#question").val();
    $.ajax({
      type: "post",
      url: "/save_final_question",
      data: {
        "_token": "{{ csrf_token() }}",
        product: product,
        videoPath: videoPath,
        bodyPartId: bodyPartId,
        question: question
      },
      dataType: "json",
      success: function(response) {
        if (response.status == 200) {
          console.log(bodyPartId);
          $('#question_answers').load('/load_question_answers/' + bodyPartId);
          $('#video_path').val('');
          $("#question").val('');
          $(".select2").empty();
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

    $('#body_part_selected').html($('#body_part_id option:selected').text());

    if ($('#body_part_id').val() == '') {
        alert('Please you need to select body part in order to continue!');
        return
    }

    if ($('#body_part_id').val() == '' || $('#question').val() == '') {
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
                $('#question_answers').load('/load_question_answers/' + $('#body_part_id').val());
            } else {
                alert('try again, question not created')
            }
        }
    });
});

function getOtherQuestions() {
    $('#getOtherQuestions').show('slow')
}

function getFollowUpQuestion(questionId) {
    $('#followUpQuestion').load('/load_question_follow_up/' + $('#body_part_id').val() + '/' + questionId);;
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
                $('#question_answers').load('/load_question_answers/' + $('#body_part_id').val());

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
                $('#question_answers').load('/load_question_answers/' + $('#body_part_id').val());
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
