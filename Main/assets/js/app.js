// Template Name: Striker
// Template URL: https://techpedia.co.uk/template/striker
// Description:  Striker - Sports Club Html Template
// Version: 1.0.0

(function (window, document, $, undefined) {
  "use strict";
  var Init = {
    i: function (e) {
      Init.s();
      Init.methods();
    },
    s: function (e) {
      (this._window = $(window)),
        (this._document = $(document)),
        (this._body = $("body")),
        (this._html = $("html"));
    },
    methods: function (e) {
      Init.w();
      Init.BackToTop();
      Init.preloader();
      Init.jsSlider();
      Init.searchToggle();
      Init.niceSelect();
      Init.videoPlay();
      Init.VideoPlayer();
      Init.quantityHandle();
      Init.wishlistButton();
      Init.countdownInit(".countdown", "2024/12/01");
      Init.initializeSlick();
      Init.formValidation();
      Init.contactForm();
    },

    w: function (e) {
      this._window.on("load", Init.l).on("scroll", Init.res);
    },



    BackToTop: function () {
      var btn = $("#backto-top");
      $(window).on("scroll", function () {
        if ($(window).scrollTop() > 300) {
          btn.addClass("show");
        } else {
          btn.removeClass("show");
        }
      });
      btn.on("click", function (e) {
        e.preventDefault();
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          "300"
        );
      });
    },

    preloader: function () {
      setTimeout(function () {
        $("#preloader").hide("slow");
      }, 2000);
    },
    jsSlider: function () {
      if ($(".js-slider").length) {
        $(".js-slider").ionRangeSlider({
          skin: "big",
          type: "double",
          grid: false,
          min: 0,
          max: 100,
          from: 20,
          to: 80,
          hide_min_max: true,
          hide_from_to: true,
        });
      }
    },

    searchToggle: function () {
      if ($('.search-form').length) {
        $('.search-btn').on('click', function () {
          if ($('.search-form').hasClass('non-active')) {
            $('.search-form').removeClass('non-active');
          } else {
            $('.search-form').addClass('non-active');
          }
          $(this).find("i").toggleClass("fa-search fa-times");
          return false;
        });
      }
    }, 

    quantityHandle: function () {
      $(".decrement").on("click", function () {
        var qtyInput = $(this).closest(".quantity-wrap").children(".number");
        var qtyVal = parseInt(qtyInput.val());
        if (qtyVal > 0) {
          qtyInput.val(qtyVal - 1);
        }
      });
      $(".increment").on("click", function () {
        var qtyInput = $(this).closest(".quantity-wrap").children(".number");
        var qtyVal = parseInt(qtyInput.val());
        qtyInput.val(parseInt(qtyVal + 1));
      });
    },

    wishlistButton: function () {
      if ($(".wishlist-icon").length) {
        $('.wishlist-icon').on('click', function() {
          $(this).find('.fal').toggleClass('fas');
          return false;
        })
      }
    },


    // Nice Select
    niceSelect: function () {
      if ($(".has-nice-select").length) {
        $('.has-nice-select, .contact-form select').niceSelect();
      }
    },
    
    //Testimonials Slider
    initializeSlick: function (e) {
      if ($(".testimonials-slider-1").length) {
        $(".testimonials-slider-1").slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 4000,
          dots: false,
          arrows: true,
          centerPadding: "0",
          cssEase: "linear",
          responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 1,
              },
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 1,
                dots: false,
              },
            },
            {
              breakpoint: 575,
              settings: {
                slidesToShow: 1,
                dots: false,
                arrows: false,
              },
            },
          ],
        });
      }
      if ($(".testimonials-slider-2").length) {
        $(".testimonials-slider-2").slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: false,
          autoplaySpeed: 4000,
          dots: false,
          arrows: true,
          centerPadding: "0",
          cssEase: "linear",
          responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 1,
              },
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 1,
                dots: false,
              },
            },
            {
              breakpoint: 575,
              settings: {
                slidesToShow: 1,
                dots: false,
                arrows: false,
              },
            },
          ],
        });
      }
      if ($(".prev-btn").length) {
        $(".prev-btn").click(function () {
          var $this = $(this).attr("data-slide");
          $('.' + $this).slick("slickPrev");
        });
      }
      if ($(".next-btn").length) {
        $(".next-btn").click(function () {
          var $this = $(this).attr("data-slide");
          $('.' + $this).slick("slickNext");
        });
      }
    },
    
    // Video Modal
    VideoPlayer: function () {
      if ($("#video").length) {
        $("#video").aksVideoPlayer({
          file: [
              {
              file: "assets/media/videos/video-1080.mp4",
              label: "1080p"
              },
              {
              file: "assets/media/videos/video-720.mp4",
              label: "720p"
              },
              {
              file: "assets/media/videos/video-540.mp4",
              label: "540p"
              },
              {
              file: "assets/media/videos/video-360.mp4",
              label: "360p"
              },
              {
              file: "assets/media/videos/video-240.mp4",
              label: "240p"
              }
          ],
          poster: "assets/media/streaming/video-img-large.png",
          forward: true,
        });
      }
    },

    videoPlay:function(){
      $('#videoModal').on('hidden.bs.modal', function () {
        $('#videoModal video').get(0).pause();
      });
      $("#closeVideoModalButton").click(function() {
        $("#videoModal").modal("hide");
      });
    },

    // Countdown Timer
    countdownInit: function (countdownSelector, countdownTime, countdown) {
      var eventCounter = $(countdownSelector);
      if (eventCounter.length) {
        eventCounter.countdown(countdownTime, function (e) {
          $(this).html(
            e.strftime(
              '<li><h2>%D</h2><h6>Days</h6></li>\
              <li><h2>%H</h2><h6>Hrs</h6></li>\
              <li><h2>%M</h2><h6>Min</h6></li>\
              <li><h2>%S</h2><h6>Sec</h6></li>'
            )
          );
        });
      }
    },


    formValidation: function () {
      if ($(".contact-form").length) {
        $(".contact-form").validate();
      }
    },

    contactForm: function () {
      $(".contact-form").on("submit", function (e) {
        e.preventDefault();
        if ($(".contact-form").valid()) {
          var _self = $(this);
          _self
            .closest("div")
            .find('button[type="submit"]')
            .attr("disabled", "disabled");
          var data = $(this).serialize();
          $.ajax({
            url: "./assets/mail/contact.php",
            type: "post",
            dataType: "json",
            data: data,
            success: function (data) {
              $(".contact-form").trigger("reset");
              _self.find('button[type="submit"]').removeAttr("disabled");
              if (data.success) {
                document.getElementById("message").innerHTML =
                  "<h3 class='bg-primary text-white p-3 mt-3'>Email Sent Successfully</h3>";
              } else {
                document.getElementById("message").innerHTML =
                  "<h3 class='bg-primary text-white p-3 mt-3'>There is an error</h3>";
              }
              $("#message").show("slow");
              $("#message").slideDown("slow");
              setTimeout(function () {
                $("#message").slideUp("hide");
                $("#message").hide("slow");
              }, 3000);
            },
          });
        } else {
          return false;
        }
      });
    },
  };
  Init.i();
})(window, document, jQuery);
