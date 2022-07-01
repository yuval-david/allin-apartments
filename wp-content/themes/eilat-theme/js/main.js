
/****   HEADER - STICKY NAVBAR   ****/
window.onscroll = function () { stickyNav() };
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function stickyNav() {
    if (window.pageYOffset > sticky) {
        navbar.classList.add("sticky");
        document.body.classList.add('sticky-nav');
    } else {
        navbar.classList.remove("sticky");
        document.body.classList.remove('sticky-nav');
    }
}


/****     SWIPERS    ****/

//SWIPER - HEADER
const swiper = new Swiper('.swiper-home', {
    // Optional parameters
    loop: true,
    autoplay: {
        delay: 3000,
    },
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    // If we need pagination
    pagination: {
        el: '.swiper-home .swiper-pagination',
        clickable: true,
    },

});

//SWIPER - CUSTOMERS
const swiper_customers = new Swiper('.swiper-customers', {
    // Optional parameters
    slidesPerView: 1,
    spaceBetween: 80,
    slidesPerGroup: 1,
    loop: true,
    // autoplay: {
    //     delay: 3000,
    // },

    breakpoints: {
        1024: {
            slidesPerView: 3,
            spaceBetween: 130,
        }
    },

    // If we need pagination
    pagination: {
        // el: '.swiper-pagination',
        el: '.customers-pagination',
        clickable: true,
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});

const swiper_gallery = new Swiper('.gallery-house', {
    // Optional parameters
    slidesPerView: 1,
    slidesPerGroup: 1,
    loop: true,


    breakpoints: {
        1024: {
            slidesPerView: 1,
            spaceBetween: 80,
            slidesPerGroup: 1,
        }
    },


    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
});


$(document).ready(function () {
    $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
        $(this).toggleClass('open');
        $(document.body).toggleClass('open-nav');
    });
});

$(".menu-item").on('click', function () {
    $(document.body).toggleClass('open-nav');
    $("#nav-icon4").toggleClass('open');
});

images_gallery_arr = document.querySelectorAll(".gallery-house .swiper-slide img");
bg_gallery = document.querySelector(".bg-gallery");
body = document.body;
btn_close_gallery = document.querySelector("#close_gallery");

images_gallery_arr.forEach(img => {
    img.addEventListener('click', function () {
        console.log(img);
        bg_gallery.classList.add('full-screen');
        // body.classList.add('overflow-hidden');
    })
});

if (btn_close_gallery) {
    btn_close_gallery.addEventListener('click', function () {
        bg_gallery.classList.remove('full-screen');
    });
};