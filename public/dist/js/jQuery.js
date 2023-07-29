$(document).ready(function () {
    $('.fade-out-alert').each(function () {
        var alertElement = $(this);

        alertElement.fadeIn(3000, function () {
            setTimeout(function () {
                alertElement.fadeOut(500, function () {
                    alertElement.remove();
                });
            }, 2000);
        });
    });
});
