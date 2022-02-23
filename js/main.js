
$(document).ready(function(){
    $(window).scroll(function(){
        if( $(this).scrollTop() > 0){
            $('img').addClass('nav__logo2');
        }
        else {
            $('img').removeClass('nav__logo2');
        }
    });
});
