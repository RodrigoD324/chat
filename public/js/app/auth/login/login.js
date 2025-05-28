$(function () {
    $("#btn_login").on("click", function () {
        let email = $("#email").val();
        let password = $("#password").val();

        if (email == "") {
            $("#email").focus();
            return showToast("info", "Preencher campo de email.");
        };
        if (password == "") {
            $("#password").focus();
            return showToast("info", "Preencher campo de senha.");
        };

        spinner.show();
        request.ajax(
            "/auth/login",
            { email: email, password: password },
            function (response) {
                if (response.message == "UserNotExist" || response.message == "PasswordNotMatch") {
                    $("#email").val("");
                    $("#password").val("");
                    $("#email").focus();
                    spinner.hide();
                    return showToast("error", "Email ou senha inválido.");
                };
                if (response.message == "UserAuthenticated") {
                    return window.location.href = "/chat";
                };
            },
            function (error) {
                spinner.hide();
                console.error(error);
                return showToast("error", "Erro interno, contate o suporte.");
            }
        );
    });

    $("#email, #password").on("keyup", function (e) {
        if (e.key == "Enter") {
            $("#btn_login").click();
        };
    });
});