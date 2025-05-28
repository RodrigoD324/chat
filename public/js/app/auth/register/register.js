$(function () {
    $("#btn_register").on("click", function () {
        let email = $("#email").val();
        let password = $("#password").val();
        let name = $("#name").val();

        if (email == "") {
            $("#email").focus();
            return showToast("info", "Preencher campo de email.");
        };
        if (password == "") {
            $("#password").focus();
            return showToast("info", "Preencher campo de senha.");
        };
        if (name == "") {
            $("#name").focus();
            return showToast("info", "Preencher campo de nome.");
        };

        spinner.show();
        request.ajax(
            "/auth/user/create",
            { email: email, password: password, name: name },
            function (response) {
                if (response.message == "UserAlreadyExist") {
                    $("#email").val("");
                    $("#password").val("");
                    $("#name").val("");
                    $("#email").focus();
                    spinner.hide();
                    return showToast("error", "Email já cadastrado.");
                };
                if (response.message == "UserRegistered") {
                    return window.location.href = "/chat";
                };
            },
            function () {
                return window.location.href = "/";
            }
        );
    });

    $("#email, #password, #name").on("keyup", function (e) {
        if (e.key == "Enter") {
            $("#btn_register").click();
        };
    });
});