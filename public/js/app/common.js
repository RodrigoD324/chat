const ToastMessage = Swal.mixin({
    toast: true,
    position: "bottom-right",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    customClass: { popup: "swal-toast" }
});

function showToast(type, message, target = "#page-top") {
    return ToastMessage.fire({
        icon: type,
        title: message,
        target: target,
    });
}