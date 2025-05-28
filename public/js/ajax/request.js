const request = (function ($) {
  const spinner = new jQuerySpinner({
    parentId: "page-top",
  });

  ("use strict");
  let fnSuccess, fnError;

  function onSuccess(response) {
    if (typeof fnSuccess === "function") {
      return fnSuccess(response);
    }

    if (response.statusCode === "401") {
      spinner.hide();
      return bootbox.alert("Sua Sessão expirou. Favor relogar");
    }

    if (response.message) {
      alert(response.message);
    }

    return alert("Erro genérico. Favor tentar novamente!");
  }

  function onError(request, status, error) {
    spinner.hide();
    if (error == "timeout") {
      return bootbox.alert(
        "A página não respondeu no tempo esperado. Favor tentar novamente!"
      );
    }

    console.log(request);

    if (typeof fnError === "function") {
      return fnError(request, status, error);
    }
  }

  return {
    ajax: function (route, data, success, error, method = "POST") {
      fnSuccess = success;
      fnError = error;

      return $.ajax({
        url: route,
        data: data,
        type: method,
        cache: false,
        success: onSuccess,
        error: onError,
        timeout: 60000,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        statusCode: {
          404: function () {
            spinner.hide();
            return bootbox.alert("A página informada não foi encontrada!");
          },
          500: function () {
            spinner.hide();
            return bootbox.alert(
              "Houve um erro interno. Favor tentar novamente!"
            );
          },
        },
      });
    },
  };
})(jQuery);