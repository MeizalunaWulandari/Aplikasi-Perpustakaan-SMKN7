var sOne = $('.section-one').owlCarousel({
    loop: false,
    margin: 20,
    nav: true,
    lazyload: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 2,
            nav: true
        },
        600: {
            items: 3,
            nav: false
        },
        1000: {
            items: 5,
            nav: false,
            loop: false,
        }
    }
});
sOne.on('mousewheel', '.owl-stage', function(e) {
    if (e.deltaY > 0) {
        sOne.trigger('next.owl');
    } else {
        sOne.trigger('prev.owl');
    }
    e.preventDefault();
});

var sTwo = $('.section-two').owlCarousel({
    loop: false,
    margin: 20,
    nav: true,
    lazyload: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 2,
            nav: true
        },
        600: {
            items: 3,
            nav: false
        },
        1000: {
            items: 5,
            nav: true,
            loop: false,
        }
    }
});
sTwo.on('mousewheel', '.owl-stage', function(e) {
    if (e.deltaY > 0) {
        sTwo.trigger('next.owl');
    } else {
        sTwo.trigger('prev.owl');
    }
    e.preventDefault();
});