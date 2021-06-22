/* Navigation Fade */
$(window).scroll(function () {
    if ($(this).scrollTop() > 600) {
        $('.sticky-navigation-bar').fadeIn();
    } else {
        $('.sticky-navigation-bar').fadeOut();
    }
});

/* ToTop */
$(window).scroll(function () {
    if ($(this).scrollTop() > 600) {
        $('.totop').fadeIn();
    } else {
        $('.totop').fadeOut();
    }
});
$('#top').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 999);
    return false;
});

/* Owl Carousel */
$('.owl-carousel').owlCarousel({
loop:true,
margin:30,
lazyload:true,
responsiveClass:true,
responsive:{
    0:{
        lazyload:true,
        items:1,
        dots:true,
        nav:false
    },
    600:{
        lazyload:true,
        items:2.5,
        nav:false
    },
    1000:{
        lazyload:true,
        items:3.2,
        nav:true,
        loop:true
    },
    2000:{
        lazyload:true,
        items:4.2,
        nav:false
    }
    }
})

/* Load More */

window.onload = function(){

    $(".category-load-1").slice(0, 3).show(); // select the first ten
    $("#load-1").click(function(e){ // click event for load more
        e.preventDefault();
        $(".category-load-1:hidden").slice(0, 3).show();
        if ($(".category-load-1:hidden").length == 0) {
            $("#load-1").fadeOut('slow');
        }
    });
    $(".category-load-2").slice(0, 3).show(); // select the first ten
    $("#load-2").click(function(e){ // click event for load more
        e.preventDefault();
        $(".category-load-2:hidden").slice(0, 3).show();
        if ($(".category-load-2:hidden").length == 0) {
            $("#load-2").fadeOut('slow');
        }
    });
    $(".category-load-3").slice(0, 3).show(); // select the first ten
    $("#load-3").click(function(e){ // click event for load more
        e.preventDefault();
        $(".category-load-3:hidden").slice(0, 3).show();
        if ($(".category-load-3:hidden").length == 0) {
            $("#load-3").fadeOut('slow');
        }
    });
    $(".category-load-4").slice(0, 3).show(); // select the first ten
    $("#load-4").click(function(e){ // click event for load more
        e.preventDefault();
        $(".category-load-4:hidden").slice(0, 3).show();
        if ($(".category-load-4:hidden").length == 0) {
            $("#load-4").fadeOut('slow');
        }
    });
    $(".category-load-5").slice(0, 3).show(); // select the first ten
    $("#load-5").click(function(e){ // click event for load more
        e.preventDefault();
        $(".category-load-5:hidden").slice(0, 3).show();
        if ($(".category-load-5:hidden").length == 0) {
            $("#load-5").fadeOut('slow');
        }
    });
    $(".category-load-6").slice(0, 3).show(); // select the first ten
    $("#load-6").click(function(e){ // click event for load more
        e.preventDefault();
        $(".category-load-6:hidden").slice(0, 3).show();
        if ($(".category-load-6:hidden").length == 0) {
            $("#load-6").fadeOut('slow');
        }
    });
    $(".category-load-7").slice(0, 3).show(); // select the first ten
    $("#load-7").click(function(e){ // click event for load more
        e.preventDefault();
        $(".category-load-7:hidden").slice(0, 3).show();
        if ($(".category-load-7:hidden").length == 0) {
            $("#load-7").fadeOut('slow');
        }
    });
    $(".category-load-8").slice(0, 3).show(); // select the first ten
    $("#load-8").click(function(e){ // click event for load more
        e.preventDefault();
        $(".category-load-8:hidden").slice(0, 3).show();
        if ($(".category-load-8:hidden").length == 0) {
            $("#load-8").fadeOut('slow');
        }
    });
    $(".category-load-9").slice(0, 3).show(); // select the first ten
    $("#load-9").click(function(e){ // click event for load more
        e.preventDefault();
        $(".category-load-9:hidden").slice(0, 3).show();
        if ($(".category-load-9:hidden").length == 0) {
            $("#load-9").fadeOut('slow');
        }
    });
    $(".category-load-10").slice(0, 3).show(); // select the first ten
    $("#load-10").click(function(e){ // click event for load more
        e.preventDefault();
        $(".category-load-10:hidden").slice(0, 3).show();
        if ($(".category-load-10:hidden").length == 0) {
            $("#load-10").fadeOut('slow');
        }
    });
    $(".category-load-1").slice(0, 3).show(); // select the first ten
    $("#load-1").click(function(e){ // click event for load more
        e.preventDefault();
        $(".category-load-1:hidden").slice(0, 3).show();
        if ($(".category-load-1:hidden").length == 0) {
            $("#load-1").fadeOut('slow');
        }
    });
};