/* Navigation Fade */
$(window).scroll(function () {
    if ($(this).scrollTop() > 600) {
        $('.sticky-navigation-bar').fadeIn();
    } else {
        $('.sticky-navigation-bar').fadeOut();
    }
});

/* Owl Carousel */
$('.owl-carousel-featured').owlCarousel({
loop:true,
margin:20,
lazyload:true,
responsiveClass:true,
nav:true,
responsive:{
    0:{
        lazyload:true,
        items:1.5,
        dots:false,
        nav:true
    },
    600:{
        lazyload:true,
        items:2.2,
        nav:true,
        dots:true, 
    },
    1000:{
        lazyload:true,
        items:2.2,
        nav:true,
        dots:true,
        loop:true
    },
    1200:{
        lazyload:true,
        items:3.3,
        nav:true,
        dots:true,
        loop:true
    },
    2000:{
        lazyload:true,
        items:4.4,
        nav:true
    }
    }
})
$('.owl-carousel-category').owlCarousel({
    loop:true,
    margin:12,
    lazyload:true,
    responsiveClass:true,
    nav:true,
    responsive:{
        0:{
            lazyload:true,
            items:1.5,
            dots:false,
            nav:true
        },
        600:{
            lazyload:true,
            items:2.2,
            nav:true,
            dots:true,
        },
        1000:{ 
            lazyload:true,
            items:2.2,
            nav:true,
            dots:true,
            loop:true
        },
        1200:{
            lazyload:true,
            items:4.3,
            nav:true,
            dots:true,
            loop:true
        },
        2000:{
            lazyload:true,
            items:4.4,
            nav:true,
            dots:true,
            loop:true
        }
      }
  })

/* Load More */
window.onload = function(){
    $(".category-load").slice(0, 4).show(); // select the first four
    $("#load").click(function(e){ // click event for load more
      e.preventDefault();
      $(".category-load:hidden").slice(0, 3).show();
      if ($(".category-load:hidden").length == 0) {
          $("#load").fadeOut('slow');
      }
    });
    $(".load-6").slice(0, 6).show(); // select the first six
    $("#load-3").click(function(e){ // click event for load more
      e.preventDefault();
      $(".load-6:hidden").slice(0, 3).show();
      if ($(".load-6:hidden").length == 0) {
          $("#load-3").fadeOut('slow');
      }
    });
};