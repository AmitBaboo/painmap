const assignPlanToUser = (plan_id) => {
    const post_data = {
        _token: $("input[name=_token]").val(),
        plan_id: plan_id,
    };

    $.post(
        "/save-plan",
        post_data,
        (response) => {
            if (response.response_code == 200) {
                toastr.success(response.response_message);
                location.href = "/plan-payment";
            } else {
                toastr.error(response.response_message);
            }
        },
        "json"
    );
};

$("#btn_photo").on("click", (e) => {
    $("#user_photo").click();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#user_image").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#user_photo").on("change", function () {
    readURL(this);

    const form = $("#load_photo");
    const formData = new FormData(form[0]);

    $.ajax({
        url: "/upload-photo",
        type: "POST",
        data: formData,
        dataType: "json",
        enctype: "multipart/form-data",
        contentType: false,
        cache: false,
        processData: false,
        success: (responseData) => {
            if (responseData.response_code == 200) {
                toastr.success(
                    responseData.response_message +
                        " Please click Next to continue."
                );
                $("#next").removeClass("disabled");
            } else {
                toastr.error(responseData.response_message);
            }
        },
        error: (xhr, status, error) => {
            const message = error.responseJSON.message;
            toastr.error(message);
        },
    });
});

$("#addPlans").validate({
    rules: {
        name: {
            required: true,
        },
        description: {
            required: true,
            minlength: 10,
        },
        cost: {
            required: true,
            number: true,
        },
    },
    submitHandler: (form) => {
        const form_data = $("#addPlans").serialize();
        const plan_id = $("#plan_id").val();
        const url = plan_id > 0 ? "/plans/" + plan_id : "/plans";

        $.ajax({
            url: url,
            type: "POST",
            data: form_data,
            dataType: "json",
            success: (response) => {
                console.log(response);
                if (response.response_code == 200) {
                    toastr.success(response.response_message);
                    location.href = "/plans";
                    $("#plans-modal").modal("hide");
                } else {
                    location.href = "/plans";
                    toastr.error(response.response_message);
                }
            },
        });
    },
});

const deletePlan = (plan_id) => {
    const post_data = {
        _token: $("input[name=_token]").val(),
        id: plan_id,
    };

    if (confirm("Do you really want to delete this plan?")) {
        $.ajax({
            url: "/plans/" + plan_id,
            type: "DELETE",
            data: post_data,
            dataType: "json",
            success: (response) => {
                if (status == 200) {
                    location.href = "/plans";
                    toastr.success(response.response_message);
                } else {
                    location.href = "/plans";
                    toastr.error(response.response_message);
                }
            },
            error: (xhr, status, error) => {
                const message = error.responseJSON.errors.email[0];
                toastr.error(message);
            },
        });
    }
};

const showPlan = (plan_id = 0) => {
    if (plan_id > 0) {
        $.ajax({
            url: "/plans/" + plan_id,
            type: "GET",
            dataType: "json",
            success: (data) => {
                if (data.response_code == 200) {
                    $("#plan_id").val(data.response_data.id);
                    $("#name").val(data.response_data.name);
                    $("#description").val(data.response_data.description);
                    $("#cost").val(data.response_data.cost);

                    $("#plans-modal").modal("show");
                } else {
                    toastr.error("Sorry! An error occured.");
                }
            },
        });
    } else {
        $("#plan_id").val("");
        $("#name").val("");
        $("#description").val("");
        $("#cost").val("");

        $("#plans-modal").modal("show");
    }
};

$("#plansTable")
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
    .appendTo("#plansTable_wrapper .col-md-6:eq(0)");
