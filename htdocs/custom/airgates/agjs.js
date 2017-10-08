var scrolled = false;
$(document).ready(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() > 80) {
            $('#scroller').fadeIn();
            scrolled = !scrolled;
        } else {
            $('#scroller').fadeOut();
            scrolled = !scrolled;
        }
    });
    $('#scroller').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 400);
        return false;
    });
});

function showInfoModal(label, body) {
    var infoModalPath = "#infoModal";
    $('#infoModalLabel').text(label);
    $(infoModalPath + ' div.modal-body').html(body);
    $(infoModalPath).modal('show');
}