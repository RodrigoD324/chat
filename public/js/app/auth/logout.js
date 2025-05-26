$(function () {
    $("#btn_logout").on("click", function () {
        spinner.show();
        request.ajax(
            "/auth/logout",
            null,
            function () {
                window.location.href = "/";
            }, 
            function () {
                window.location.href = "/";
            }
        );
    });
});