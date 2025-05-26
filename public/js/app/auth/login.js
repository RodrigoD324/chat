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
    });

    $("#email, #password").on("keyup", function (e) {
        if (e.key == "Enter") {
            $("#btn_login").click();
        };
    });
});