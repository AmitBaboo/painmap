// $("#loginForm").on("submit", (e) => {
//     e.preventDefault();

//     const post_data = {
//         _token: $("input[name=_token]").val(),
//         email: $("#email").val(),
//         password: $("#password").val(),
//     };

//     const formData = JSON.stringify(post_data);

//     $.ajax({
//         url: "/login",
//         type: "POST",
//         data: formData,
//         contentType: "application/json",
//         dataType: "json",
//         success: (responseData) => {
//             // alert("Here");
//             console.log(responseData);
//             alert("Here");
//             if (responseData.two_factor == true) {
//                 // $.get("/redirect", { two_factor: true });
//                 // location.href = `/redirect?two_factor=${responseData.two_factor}`;
//                 // alert("Wait");
//                 window.location.href = "/two-factor-challenge";
//             } else {
//                 window.location.href = "/redirect";
//             }
//         },
//         error: (error) => {
//             alert("Error");
//             let message = "";
//             console.log(error);
//             switch (error.status) {
//                 case 422:
//                     message = error.responseJSON.errors.email[0];
//                     break;

//                 default:
//                     message = error.responseJSON.message;
//                     break;
//             }

//             if (
//                 message ==
//                 "Call to undefined method App\\Models\\User::setCache()"
//             ) {
//                 location.href = "/redirect";
//             } else {
//                 toastr.error(message);
//             }
//         },
//     });
// });

// $("#challenge").on("submit", (e) => {
//     e.preventDefault();

//     const post_data = {
//         _token: $("input[name=_token]").val(),
//         code: $("#code").val(),
//         recovery_code: $("#recovery_code").val(),
//     };

//     const formData = JSON.stringify(post_data);

//     console.log(formData);

//     $.ajax({
//         url: "/two-factor-challenge",
//         type: "POST",
//         data: formData,
//         contentType: "application/json",
//         dataType: "json",
//         success: (response) => {
//             location.href = "/dashboard";
//         },
//         error: (error) => {
//             console.log(error);
//             $("#error_message").text(error.responseJSON.errors.code[0]);
//         },
//     });
// });

$("#rec_code_btn").on("click", (e) => {
    $("#recovery_code").removeClass("d-none");
    $("#recovery_code").prop("required", true);
    $("#_code").prop("required", false);
    $("#code").addClass("d-none");
    $("#rec_p_message").removeClass("d-none");
    $("#code_p_message").addClass("d-none");
    $("#code_btn").removeClass("d-none");
    $("#rec_code_btn").addClass("d-none");
});

$("#code_btn").on("click", (e) => {
    $("#recovery_code").addClass("d-none");
    $("#recovery_code").prop("required", false);
    $("#code").prop("required", true);
    $("#code").removeClass("d-none");
    $("#rec_p_message").addClass("d-none");
    $("#code_p_message").removeClass("d-none");
    $("#rec_code_btn").removeClass("d-none");
    $("#code_btn").addClass("d-none");
});
