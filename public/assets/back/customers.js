$("#addCustomers").validate({
    rules: {
        full_name: {
            required: true,
            maxlength: 110,
        },
        email: {
            required: true,
            email: true,
        },
        contact_number: {
            required: true,
            minlength: 11,
            maxlength: 11,
            digits: true,
        },
        post_code: {
            required: true,
            postcode: true,
        },
    },

    messages: {
        full_name: "Please enter your full name.",
        contact_number: {
            required: "Please enter your contact number.",
            minlength: "Contact number cannot be less that 11 digits.",
            maxlength: "Contact number cannot be more that 11 digits.",
        },
        post_code: {
            required: "Please enter your postcode",
        },
        email: {
            required: "Please enter your email.",
            email: "Email entered is not valid.",
        },
    },
    submitHandler: (form) => {
        const formData = $("#addCustomers").serialize();

        $.ajax({
            url: "/customers",
            method: "post",
            data: formData,
            dataType: "json",
            success: (responseData) => {
                if (responseData.response_code == 200) {
                    toastr.success("Data saved successfully.");
                    location.href = "/customers";
                    $("#customer-modal").modal("hide");
                } else {
                    toastr.success("Sorry! An error occured.");
                    location.href = "/customers";
                }
            },
        });
    },
});

$("#addTherapists").validate({
    rules: {
        full_name: {
            required: true,
        },
        contact_number: {
            required: true,
            maxlength: 14,
            minlength: 11,
            digits: true,
        },
        post_code: {
            required: true,
            // postcode: true,
        },
        email: {
            required: true,
            email: true,
            remote: "/check-email",
        },
        password: {
            required: true,
            minlength: 8,
        },
        password_confirmation: {
            required: true,
            minlength: 8,
            equalTo: "#password",
        },
    },

    messages: {
        first_name: "Please enter your first name.",
        last_name: "Please enter your last name.",
        contact_number: {
            required: "Please enter your contact number.",
            minlength: "Contact number cannot be less that 11 digits.",
            maxlength: "Contact number cannot be more that 14 digits.",
        },
        post_code: {
            required: "Please enter your postcode",
        },
        email: {
            required: "Please enter your email.",
            email: "Email entered is not valid.",
            remote: jQuery.validator.format("Email is already taken."),
        },
        userpassword: {
            required: "Please enter a suitable password for security.",
            minlength: "Password length cannot be less than 8 characters.",
        },
        passwordconfirmation: {
            required: "Please confirm your password.",
            minlength: "Password length cannot be less than 8 characters.",
            equalTo: "Password confirmation must equal what you typed above.",
        },
    },
    submitHandler: (fomr) => {
        const formData = $("#addTherapists").serialize();

        $.ajax({
            url: "/register-therapist",
            method: "post",
            data: formData,
            dataType: "json",
            success: (responseData) => {
                if (responseData.response_code == 200) {
                    toastr.success("Data saved successfully.");
                    location.href = "/therapists";
                    $("#therapist-modal").modal("hide");
                } else {
                    toastr.success("Sorry! An error occured.");
                    location.href = "/therapists";
                }
            },
            error: (xhr, status, error) => {
                const message = xhr.responseText;
                toastr.error(message);
            },
        });
    },
});

$("#customersTable")
    .DataTable({
        responsive: true,
        lengthChange: false,
        paging: true,
        searching: true,
        order: [],
        info: true,
        autoWidth: false,
        responsive: true,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#customersTable_wrapper .col-md-6:eq(0)");

$("#therapistsTable")
    .DataTable({
        responsive: true,
        lengthChange: false,
        paging: true,
        searching: true,
        order: [],
        info: true,
        autoWidth: false,
        responsive: true,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#therapistsTable_wrapper .col-md-6:eq(0)");

$("#therapistCustomersTable")
    .DataTable({
        responsive: true,
        lengthChange: false,
        paging: true,
        searching: true,
        order: [],
        info: true,
        autoWidth: false,
        responsive: true,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#therapistCustomersTable_wrapper .col-md-6:eq(0)");

$("#addResources").validate({
    rules: {
        title: {
            required: true,
            minlength: 5,
        },
        video_path: {
            // required: true,
            url: true,
        },
        document_path: {
            // required: true,
            url: true,
        },
        description: {
            required: true,
            minlength: 10,
        },
    },
    submitHandler: (form) => {
        const id = $("#resource_id").val();
        const url = id > 0 ? "/resources/" + id : "/resources";
        const formData = $("#addResources").serialize();

        $.ajax({
            url: url,
            method: "post",
            data: formData,
            dataType: "json",
            success: (responseData) => {
                if (responseData.response_code == 200) {
                    location.href = "/resources";
                    toastr.success(responseData.response_message);
                    $("#resource-modal").modal("hide");
                } else {
                    location.href = "/resources";
                    toastr.error(responseData.response_message);
                }
            },
        });
    },
});

const deleteResource = (resource_id) => {
    const post_data = {
        _token: $("input[name=_token]").val(),
        id: resource_id,
    };

    if (confirm("Are you sure you want to delete this resource?")) {
        $.ajax({
            url: "/resources/" + resource_id,
            type: "DELETE",
            data: post_data,
            dataType: "json",
            success: (response) => {
                if (status == 200) {
                    location.href = "/resources";
                    toastr.success(response.response_message);
                } else {
                    location.href = "/resources";
                    toastr.error(response.response_message);
                }
            },
            error: (xhr, status, error) => {
                const message = xhr.responseJSON.errors.email[0];
                toastr.error(message);
            },
        });
    }
};

$("a.desc-link").on("click", (e) => {
    const id = $(e.target).attr("id");
    const videoID = id.split("_")[1];
    const videoDescription = $("#video_description_" + videoID).val();
    $("#modal_description").val(videoDescription);
    $("#description-modal").modal("show");
});

const getResource = (id) => {
    const request = $.ajax({
        url: "/resources/" + id,
        type: "GET",
        dataType: "json",
    });

    request.done((data) => {
        if (data.response_code == 200) {
            $("#resource_id").val(data.response_data.id);
            $("#title").val(data.response_data.title);
            $("#videoPath").val(data.response_data.video_path);
            $("#documentPath").val(data.response_data.document_path);
            $("#description").val(data.response_data.description);
            $("#resource-modal").modal("show");
        } else {
            toastr.error("Sorry! An error occured.");
        }
    });
};

$("#cancel_subscription").on("click", (e) => {
    const btn_text = $("#cancel_subscription").text();
    if (btn_text.trim() === "Cancel Subscription") {
        e.preventDefault();

        const post_data = {
            _token: $("input[name=_token]").val(),
        };

        $.ajax({
            url: "/cancel-subscription",
            type: "POST",
            data: post_data,
            dataType: "json",
            success: (response) => {
                if (response.response_code == 200) {
                    $("#cancel_subscription").text("Subscription Cancelled");
                    $("#cancel_subscription").prop("disabled", true);
                    toastr.success(response.response_message);
                } else {
                    toastr.error(response.response_message);
                }
            },
        });
    } else {
        toastr.info("Subscription already cancelled.");
    }
});

const updateStatus = (id) => {
    const post_data = {
        _token: $("input[name=_token]").val(),
        status: $("#status_" + id).val(),
    };

    const formData = JSON.stringify(post_data);

    if (post_data.status >= 0) {
        const request = $.ajax({
            url: "/customers/" + id,
            type: "POST",
            data: formData,
            contentType: "application/json",
            dataType: "json",
        });

        request.done((data) => {
            if (data.response_code == 200) {
                toastr.success(data.response_message);
                location.href = "/assigned-customers";
            } else {
                toastr.error(data.response_message);
                location.href = "/assigned-customers";
            }
        });
    } else {
        toastr.error("Please select status to continue");
    }
};

const updateTherapistStatus = (therapist_id) => {
    const post_data = {
        _token: $("input[name=_token]").val(),
        status: $("#status_" + therapist_id).val(),
    };

    const formData = JSON.stringify(post_data);

    if (post_data.status >= 0) {
        const request = $.ajax({
            url: "/therapists/" + therapist_id,
            type: "POST",
            data: formData,
            contentType: "application/json",
            dataType: "json",
        });

        request.done((data) => {
            if (data.response_code == 200) {
                toastr.success(data.response_message);
                location.href = "/therapists";
            } else {
                toastr.error(data.response_message);
                location.href = "/therapists";
            }
        });
    } else {
        toastr.error("Please select status to continue.");
    }
};

const clearControls = (formID) => {
    $(`#${formID} input, #${formID} textarea, #${formID} select`).each(
        (index, element) => {
            let input = $(element);
            if (input.attr("name") !== "_token") {
                input.val("");
            }
        }
    );
};

const fillForm = (formID, jsonObject) => {
    $(`#${formID} input, #${formID} select, #${formID} textarea`).each(
        (index, element) => {
            const input = $(element);
            if (input.attr("name") !== "_token") {
                const value = jsonObject[input.attr("name")];
                $("[name='" + input.attr("name") + "']").val(value);
            }
        }
    );
};

$("#search_value").on("change", (e) => {
    const post_data = {
        _token: $("input[name=_token]").val(),
        search_value: $("#search_value").val(),
    };

    $.post("/resources", post_data, (response) => {});
});

const findAndAssignTherapist = (customer_id) => {
    const post_data = JSON.stringify({
        _token: $("input[name=_token]").val(),
        customer_id: customer_id,
    });

    $.ajax({
        url: "/find-assign-therapist",
        type: "POST",
        data: post_data,
        contentType: "application/json",
        dataType: "json",
        success: (response) => {
            if (response.response_code == 200) {
                toastr.success(response.response_message);
                window.location.reload();
            } else {
                toastr.error(response.response_message);
                window.location.reload();
            }
        },
        error: (error) => {
            toastr.error(error.responseJSON.message);
        },
    });
};

const showTherapistEditModal = (id) => {
    $.ajax({
        url: `/users/${id}`,
        type: "GET",
        dataType: "json",
        success: (response) => {
            if (response.response_code == 200) {
                fillForm("editTherapists", response.response_data);
                $("#therapist_id").val(id);
                $("#user_image").attr(
                    "src",
                    response.response_data.profile_photo_url
                );

                $("#edit-therapist-modal").modal("show");
            } else {
                toastr.error(response.response_message);
                window.location.reload();
            }
        },
        error: (error) => {
            toastr.error(error.responseJSON.message);
        },
    });
};

$("#editTherapists").validate({
    rules: {
        full_name: {
            required: true,
        },
        contact_number: {
            required: true,
            maxlength: 14,
            minlength: 11,
            digits: true,
        },
        post_code: {
            required: true,
            // postcode: true,
        },
        email: {
            required: true,
            email: true,
        },
        status: {
            required: true,
            digits: true,
        },
    },

    messages: {
        first_name: "Please enter your first name.",
        last_name: "Please enter your last name.",
        contact_number: {
            required: "Please enter your contact number.",
            minlength: "Contact number cannot be less that 11 digits.",
            maxlength: "Contact number cannot be more that 14 digits.",
        },
        post_code: {
            required: "Please enter your postcode",
        },
        email: {
            required: "Please enter your email.",
            email: "Email entered is not valid.",
        },
    },
    submitHandler: (form) => {
        // let formData = $("#editTherapists").serialize();
        const formData = new FormData(form);
        const id = $("#therapist_id").val();

        $.ajax({
            url: "/therapists/" + id,
            type: "POST",
            data: formData,
            dataType: "json",
            enctype: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: (responseData) => {
                console.log(responseData);
                if (responseData.response_code == 200) {
                    toastr.success("Data saved successfully.");
                    location.href = "/therapists";
                    $("#therapist-modal").modal("hide");
                } else {
                    toastr.success("Sorry! An error occured.");
                    location.href = "/therapists";
                }
            },
            error: (xhr, status, error) => {
                const message = xhr.responseText;
                toastr.error(message);
            },
        });
    },
});
