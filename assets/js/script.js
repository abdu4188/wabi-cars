
//navbar hide and show
$(window).scroll(function (){
    var scroll = $(window).scrollTop();

    if (scroll >=100) {
        $('.navbar').addClass('bg-light');
        $('.navbar').removeClass('bg-trasparent');
        $('.navbar').removeClass('shadow-none');

    }
    else {
        $('.navbar').addClass('bg-trasparent');
        $('.navbar').addClass('shadow-none');
        $('.navbar').removeClass('bg-light');
    }
});

