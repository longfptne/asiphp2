/**
 * Template Name: ZenBlog
 * Updated: Jan 09 2024 with Bootstrap v5.3.2
 * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
 * Author: BootstrapMade.com
 * License: https:///bootstrapmade.com/license/
 */
document.addEventListener('DOMContentLoaded', () => {
    "use strict";

    /**
     * Sticky header on scroll
     */
    const selectHeader = document.querySelector('#header');
    if (selectHeader) {
        document.addEventListener('scroll', () => {
            window.scrollY > 100 ? selectHeader.classList.add('sticked') : selectHeader.classList.remove('sticked');
        });
    }

    /**
     * Mobile nav toggle
     */

    const mobileNavToogleButton = document.querySelector('.mobile-nav-toggle');

    if (mobileNavToogleButton) {
        mobileNavToogleButton.addEventListener('click', function (event) {
            event.preventDefault();
            mobileNavToogle();
        });
    }

    function mobileNavToogle() {
        document.querySelector('body').classList.toggle('mobile-nav-active');
        mobileNavToogleButton.classList.toggle('bi-list');
        mobileNavToogleButton.classList.toggle('bi-x');
    }

    /**
     * Hide mobile nav on same-page/hash links
     */
    document.querySelectorAll('#navbar a').forEach(navbarlink => {

        if (!navbarlink.hash) return;

        let section = document.querySelector(navbarlink.hash);
        if (!section) return;

        navbarlink.addEventListener('click', () => {
            if (document.querySelector('.mobile-nav-active')) {
                mobileNavToogle();
            }
        });
    });

    /**
     * Toggle mobile nav dropdowns
     */
    const navDropdowns = document.querySelectorAll('.navbar .dropdown > a');

    navDropdowns.forEach(el => {
        el.addEventListener('click', function (event) {
            if (document.querySelector('.mobile-nav-active')) {
                event.preventDefault();
                this.classList.toggle('active');
                this.nextElementSibling.classList.toggle('dropdown-active');

                let dropDownIndicator = this.querySelector('.dropdown-indicator');
                dropDownIndicator.classList.toggle('bi-chevron-up');
                dropDownIndicator.classList.toggle('bi-chevron-down');
            }
        })
    });

    /**
     * Scroll top button
     */
    const scrollTop = document.querySelector('.scroll-top');
    if (scrollTop) {
        const togglescrollTop = function () {
            window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
        }
        window.addEventListener('load', togglescrollTop);
        document.addEventListener('scroll', togglescrollTop);
        scrollTop.addEventListener('click', window.scrollTo({
            top: 0,
            behavior: 'smooth'
        }));
    }

    /**
     * Hero Slider
     */
    var swiper = new Swiper(".sliderFeaturedPosts", {
        spaceBetween: 0,
        speed: 500,
        centeredSlides: true,
        loop: true,
        slideToClickedSlide: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".custom-swiper-button-next",
            prevEl: ".custom-swiper-button-prev",
        },
    });

    /**
     * Open and close the search form.
     */
    const searchOpen = document.querySelector('.js-search-open');
    const searchClose = document.querySelector('.js-search-close');
    const searchWrap = document.querySelector(".js-search-form-wrap");

    searchOpen.addEventListener("click", (e) => {
        e.preventDefault();
        searchWrap.classList.add("active");
    });

    searchClose.addEventListener("click", (e) => {
        e.preventDefault();
        searchWrap.classList.remove("active");
    });

    /**
     * Initiate glightbox
     */
    const glightbox = GLightbox({
        selector: '.glightbox'
    });

    /**
     * Animation on scroll function and init
     */
    function aos_init() {
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    }

    window.addEventListener('load', () => {
        aos_init();
    });

    const formProfile = document.querySelector('.formProfile');
    formProfile.onsubmit = function (event) {
        const inputProfile = document.querySelectorAll('.inputProfile');
        const errProfile = document.querySelectorAll('.errProfile');
        let isError = false;

        errProfile.forEach(e => {
            e.textContent = '';
        })

        inputProfile.forEach(function (input, index) {
            if (!input.value.trim()) {
                input.focus();
                errProfile[index].textContent = "Vui lòng nhập trường này";
                isError = true;
            } else {
                if (input.getAttribute('name') === 'email') {
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(input.value)) {
                        input.focus();
                        errProfile[index].textContent = 'Email không hợp lệ';
                        isError = true;
                    }
                }
            }
        })

        if (isError) {
            event.preventDefault();
        }
    };


});