
$(document).ready(function () {
    SDS.initScrolling();
    SDS.initToggleSidebar();
});

var log = console.log.bind(console);
var digit = function(num){ return String(num).replace(/(\d)(?=(\d{3})+([^\d]|$))/g, '$1 '); };

var SDS = (function(){

    function SDS_interface(){

        this.scrolled = false;

        this.initScrolling = function(){

            var _this = this;
            var sds_search = $('#sds-search');
            var sds_search_results = $('.sds-search-results');
            var scroller = $('#scroller');

            window.onscroll = function(){
                // search
                if(window.pageYOffset > 100 && !_this.scrolled){
                    scroller.fadeIn();
                    sds_search_results.addClass('sds-search-results-top');
                    sds_search.addClass('sds-search-form-top');
                    _this.scrolled = true;
                    return false;
                }
                if(window.pageYOffset < 5 && _this.scrolled){
                    sds_search_results.removeClass('sds-search-results-top');
                    sds_search.removeClass('sds-search-form-top');
                    _this.scrolled = false;
                    return false;
                }
            };

            scroller.on('click', function(){
                $('body,html').animate({
                    scrollTop: 0
                }, 400);
                return false;
            });

        };
        this.initToggleSidebar = function(){

            var sidebar = $('.sidebar_toggle');

            sidebar.on('click', function(){
                var nav_collapsed = $('.sidebar').find('.sidebar-nav');
                if (nav_collapsed.hasClass('collapse')) {
                    $('.sds-topPanel-notifyPanel').toggle();
                    $('.sds-topPanel-userPanel').toggle();
                    $('.topPanel_statistics').toggle();
                    nav_collapsed.toggleClass('show');
                } else {
                    $('#page-wrapper').toggleClass('full-width');
                    $('.sidebar').toggleClass('hidden-left');
                }
            })

        };
    }

    return new SDS_interface();

})();


function showInfoModal(label, body) {
    var infoModalPath = "#infoModal";
    $('#infoModalLabel').text(label);
    $(infoModalPath + ' div.modal-body').html(body);
    $(infoModalPath).modal('show');

    if($(window).scrollTop() > 80) {
        $('#sds-search').addClass('hidden');
    }
    $(infoModalPath).on('hidden.bs.modal', function(){
        $('#sds-search').removeClass('hidden');
        console.log($('#sds-search'));
    });
}
