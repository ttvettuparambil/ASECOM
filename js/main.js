$(window).on("load", function () {
  "use strict";
  $(".body").fadeOut(),
    $("body").removeClass("loading-scroll-hiden"),
    $(window).scrollTop(0),
    new WOW().init();
}),
  $(function () {
    "use strict";
    var c = ($("#home"), $("#about"), $("#home .container")),
      d = $(window).height(),
      e = d / 4.6,
      f = d / 4.8,
      g = d / 5.5,
      h = d / 1.2,
      i = $(window).width(),
      j = $("#nav"),
      k = $("#top-button"),
      l = $("#navbar li a"),
      m = $(".navbar-toggle"),
      n = $(".nav a"),
      o = $(".navbar-brand"),
      p = $(".icon-bar"),
      q = $(".navbar-nav");
    c.css("padding-top", e),
      i < 700 && c.css("padding-top", f),
      d < 200 && c.css("padding-top", g),
      $(window).on("scroll", function () {
        var a = $(window).scrollTop();
        a > 300 ? j.hide() : j.show(),
          a > h
            ? (j.addClass("navscroll"),
              j.show(),
              l.addClass("color-link"),
              o.css("color", "#333"),
              m.css("border-color", "#333"),
              p.css("background-color", "#333"))
            : (j.removeClass("navscroll"),
              l.removeClass("color-link"),
              o.css("color", "#fff"),
              m.css("border-color", "#fff"),
              p.css("background-color", "#fff")),
          i <= 767 && a > h && q.css("background-color", "#fff"),
          i <= 767 && a < h
            ? q.css("background-color", "#333")
            : q.css("background-color", "transparent"),
          a >= h / 0.5
            ? j.addClass("padding-nav")
            : j.removeClass("padding-nav"),
          a > 500 ? k.show() : k.hide();
      }),
      n.on("click", function () {
        "none" !== m.css("display") && m.trigger("click");
      }),
      $(".image-popup-vertical-fit").magnificPopup({
        type: "image",
        closeOnContentClick: !0,
        mainClass: "mfp-img-mobile",
        image: { verticalFit: !0 },
      }),
      $("#quote-carousel").carousel({ pause: !0, interval: 4e3 });
    var html = $("html");

    html.smoothScroll(1500); // Js SmoothScroll .
  });
