/**
 * Aranoz front-end behaviour, without jQuery.
 *
 * The plugin calls keep the options they always had; ColorlibUI provides
 * drop-in versions of Owl Carousel, Slick, Magnific Popup and AjaxChimp that
 * build the same markup, so the theme's stylesheets apply unchanged.
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  UI.magnific('.popup-youtube, .popup-vimeo', {
    // disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  UI.owl('.textimonial_iner', {
    items: 1,
    loop: true,
    dots: true,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: false,
    responsive: {
      0: { margin: 15 },
      600: { margin: 10 },
      1000: { margin: 10 }
    }
  });

  UI.owl('.best_product_slider', {
    items: 4,
    loop: true,
    dots: false,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: true,
    navText: ['next', 'previous'],
    responsive: {
      0: { margin: 15, items: 1, nav: false },
      576: { margin: 15, items: 2, nav: false },
      768: { margin: 30, items: 3, nav: true },
      991: { margin: 30, items: 4, nav: true }
    }
  });

  UI.owl('.product_list_slider', {
    items: 1,
    loop: true,
    dots: false,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: true,
    navText: ['next', 'previous'],
    smartSpeed: 1000,
    responsive: {
      0: { margin: 15, nav: false, items: 1 },
      600: { margin: 15, items: 1, nav: false },
      768: { margin: 30, nav: true, items: 1 }
    }
  });

  UI.magnific('.img-gal', {
    type: 'image',
    gallery: { enabled: true }
  });

  // The banner slider shows its current slide number, zero-padded.
  UI.ready(function () {
    function pad2(number) {
      return (number < 10 ? '0' : '') + number;
    }
    function showCurrent(e) {
      var counter = document.querySelector('.slider-counter');
      if (counter) counter.textContent = pad2(e.detail.relatedTarget.current());
    }
    UI.toElements('.banner_slider').forEach(function (el) {
      el.addEventListener('initialized.owl.carousel', showCurrent);
      el.addEventListener('changed.owl.carousel', showCurrent);
    });
    UI.owl('.banner_slider', {
      items: 1,
      loop: true,
      dots: false,
      autoplay: true,
      autoplayHoverPause: true,
      autoplayTimeout: 5000,
      nav: true,
      navText: ['next', 'previous'],
      smartSpeed: 1000,
      responsive: {
        0: { nav: false },
        600: { nav: false },
        768: { nav: true }
      }
    });
  });

  UI.enhanceSelects('select');
  UI.counter('.counter', { time: 2000 });

  UI.slick('.slider', {
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    speed: 300,
    infinite: true,
    asNavFor: '.slider-nav-thumbnails',
    autoplay: true,
    pauseOnFocus: true,
    dots: true
  });

  UI.slick('.slider-nav-thumbnails', {
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider',
    focusOnSelect: true,
    infinite: true,
    prevArrow: false,
    nextArrow: false,
    centerMode: true,
    responsive: [{
      breakpoint: 480,
      settings: { centerMode: false }
    }]
  });

  UI.ajaxChimp('#mc_embed_signup form, #mc_embed_signup_60_percent_products form, #mc_embed_signup_new_offer form');

  UI.ready(function () {
    // Search toggle.
    var box = document.getElementById('search_input_box');
    var open = document.getElementById('search_1');
    var close = document.getElementById('close_search');
    if (box) {
      box.style.display = 'none';
      if (open) {
        open.addEventListener('click', function () {
          UI.slide(box, 'toggle');
          var input = document.getElementById('search_input');
          if (input) input.focus();
        });
      }
      if (close) {
        close.addEventListener('click', function () {
          UI.slide(box, 'up', 500);
        });
      }
    }

    // Offer countdown: days, hours, minutes and seconds to data-offer-date.
    var countdown = document.querySelector('.date_countdown');
    var parts = ['days', 'hours', 'minutes', 'seconds'].map(function (id) {
      return document.getElementById(id);
    });
    if (countdown && parts[0]) {
      var endTime = Date.parse(new Date(countdown.getAttribute('data-offer-date'))) / 1000;
      var labels = ['Days', 'Hours', 'Minutes', 'Seconds'];
      var pad = function (n) { return n < 10 ? '0' + n : String(n); };
      var tick = function () {
        var left = endTime - Date.parse(new Date()) / 1000;
        var days = Math.floor(left / 86400);
        var hours = Math.floor((left - days * 86400) / 3600);
        var minutes = Math.floor((left - days * 86400 - hours * 3600) / 60);
        var seconds = Math.floor(left - days * 86400 - hours * 3600 - minutes * 60);
        [days, pad(hours), pad(minutes), pad(seconds)].forEach(function (value, i) {
          if (parts[i]) parts[i].innerHTML = '<span>' + labels[i] + '</span>' + value;
        });
      };
      tick();
      setInterval(tick, 1000);
    }

    // Quantity steppers: the buttons either side of an .input-number.
    UI.toElements('.input-number').forEach(function (input) {
      var min = input.getAttribute('min');
      var max = input.getAttribute('max');
      var dec = input.previousElementSibling;
      var inc = input.nextElementSibling;
      if (dec) {
        dec.addEventListener('click', function () {
          var value = Number(input.value) - 1;
          if (!min || value >= Number(min)) input.value = value;
        });
      }
      if (inc) {
        inc.addEventListener('click', function () {
          var value = Number(input.value) + 1;
          if (!max || value <= Number(max)) input.value = value;
        });
      }
    });
  });

  // The old script also initialised lightSlider on #vertical, but the theme
  // never loaded that plugin, so on any page with #vertical it threw instead.
}());
