$("#user_info").validate({
    rules: {
        full_name: {
            required: true,
        },
        company_bio: {
            required: true,
            minlength: 10,
        },
        website: {
            required: true,
        },
        contact_number: {
            required: true,
            maxlength: 14,
            minlength: 11,
        },
        email: {
            required: true,
            email: true,
        },
        post_code: {
            required: true,
            // postcode: true,
        },
    },

    messages: {
        full_name: { required: "Please enter your full name." },
        contact_number: {
            required: "Please enter your contact number.",
            minlength: "Contact number cannot be less that 11 digits.",
            maxlength: "Contact number cannot be more that 14 digits.",
        },
        email: {
            required: "Please enter your email.",
            email: "Please enter a valid email.",
        },
        post_code: {
            required: "Please enter your post code",
        },
    },

    submitHandler: (form) => {
        const formData = new FormData(form);

        $.ajax({
            url: "/update-user-info",
            type: "POST",
            data: formData,
            dataType: "json",
            enctype: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: (responseData) => {
                console.log(responseData);
                if (responseData.response_code == 200) {
                    $("#update_user_modal").modal("hide");
                    toastr.success(responseData.response_message);
                    window.location.reload();
                } else {
                    toastr.error(responseData.response_message);
                }
            },
            error: (xhr, status, error) => {
                console.log(xhr);
                let error_message = "";
                if (error.status == 422) {
                    error_message = error.responseJSON.errors.email[0];
                } else {
                    error_message = error.responseJSON.response_message;
                }
                toastr.error(error_message);
            },
        });
    },
});

$("#two_factor_modal").on("shown.bs.modal", function () {
    $("#password").focus();
});

$("#change_password").validate({
    rules: {
        current_password: {
            required: true,
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
        current_password: {
            required: "Please confirm your current password",
        },
        password: {
            required: "Please enter a suitable password for security.",
            minlength: "Password length cannot be less than 8 characters.",
        },
        password_confirmation: {
            required: "Please confirm your password.",
            minlength: "Password length cannot be less than 8 characters.",
            equalTo: "Password confirmation must be equal new password.",
        },
    },
    submitHandler: (form) => {
        const formData = $("#change_password").serialize();

        $.ajax({
            url: "/change-password",
            type: "POST",
            data: formData,
            dataType: "json",
            success: (response) => {
                if (response.response_code == 200) {
                    toastr.success(response.response_message);
                } else {
                    toastr.error(response.response_message);
                }
                $("#current_password").val("");
                $("#password").val("");
                $("#password_confirmation").val("");
            },
            error: (error) => {
                toastr.error(error.responseJSON.response_message);
            },
        });
    },
});

$("#two_factor_enable_btn").on("click", (e) => {
    e.preventDefault();

    $("#method").val("POST");
    $("#two_factor_modal").modal("show");
});

$("#two_factor_disable_btn").on("click", (e) => {
    e.preventDefault();

    $("#method").val("DELETE");
    $("#two_factor_modal").modal("show");
});

$("#confirm_password").on("submit", (e) => {
    e.preventDefault();

    const method_type = $("#method").val();

    const post_data = {
        _token: $("input[name=_token]").val(),
        password: $("#cpassword").val(),
    };

    const form_data = JSON.stringify(post_data);

    $.ajax({
        url: "/user/confirm-password",
        type: "POST",
        data: form_data,
        contentType: "application/json",
        dataType: "json",
        success: (response) => {
            const form_data = $("#two_factor_enable").serialize();

            $.ajax({
                url: "/user/two-factor-authentication",
                type: method_type,
                data: form_data,
                dataType: "json",
                success: (response) => {
                    $("#two_factor_modal").modal("hide");
                    location.href = "/profile";
                },
            });
        },
        error: (error) => {
            console.log(error);
            $("#error_message").html(error.responseJSON.message);
        },
    });
});

$("#load_photo").on("click", (e) => {
    $("#user_photo").click();
});

function fasterPreview(uploader) {
    if (uploader.files && uploader.files[0]) {
        $("#user_image").attr(
            "src",
            window.URL.createObjectURL(uploader.files[0])
        );
    }
}

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
    // fasterPreview(this);
});
