$(window).on("load", function() {
    $('#burger').click(function (e) { 
        e.preventDefault();
        $('.burger-menu').toggleClass('burger-menu-hidden');
    });
});