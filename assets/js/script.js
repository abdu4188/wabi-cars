
//navbar hide and show
$(window).scroll(function (){
    var scroll = $(window).scrollTop();

    if (scroll >=100) {
        $('.navbar').addClass('bg-light');
        $('.navbar').removeClass('bg-trasparent');

    }
    else {
        $('.navbar').addClass('bg-trasparent');
        $('.navbar').removeClass('bg-light');
    }
});
