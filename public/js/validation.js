$(document).ready(function() {
    $.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z\s]+$/i.test(value);
    });

    $.validator.addMethod("numbersonly", function(value, element) {
        return this.optional(element) || /^[0-9]+$/i.test(value);
    });

    // Jquery validation plugin
    $("#adminCreateAnAccountError").validate({
        rules: {
            username: {
                required: true,
                maxlength: 20,
                lettersonly: true
            },
            email: {
                required: true,
                email: true
            },
            email2: {
                required: true,
                equalTo: "#create-email"
            },
            password: {
                required: true,
                minlength: 8
            },
            password2: {
                equalTo: "#create-password"
            }
        },
        messages: {
            username: {
                lettersonly: "This entry can only contain characters"
            }
        }
    });

    $("#adminLoginError").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            }
        }
    });

    // $("#submit").click(function() {
    //     var pcNo = $("#pcNo");
    //     if (pcNo.val() === "") {
    //         swal("Please select an Pc Number", {
    //             button: false
    //         });
    //         $("#submit").focus();

    //         return false;
    //     } else return;
    // });
});
