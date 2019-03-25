(function($) {
  
  "use strict";  

  $(window).on('load', function() {

    /* 
   MixitUp
   ========================================================================== */
  $('#portfolio').mixItUp();

  /* 
   One Page Navigation & wow js
   ========================================================================== */
    var OnePNav = $('.onepage-nev');
    var top_offset = OnePNav.height() - -0;
    OnePNav.onePageNav({
      currentClass: 'active',
      scrollOffset: top_offset,
    });
  
  /*Page Loader active
    ========================================================*/
    $('#preloader').fadeOut();

  // Sticky Nav
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 200) {
            $('.scrolling-navbar').addClass('top-nav-collapse');
        } else {
            $('.scrolling-navbar').removeClass('top-nav-collapse');
        }
    });

    /* slicknav mobile menu active  */
    $('.mobile-menu').slicknav({
        prependTo: '.navbar-header',
        parentTag: 'liner',
        allowParentLinks: true,
        duplicate: true,
        label: '',
        closedSymbol: '<i class="icon-arrow-right"></i>',
        openedSymbol: '<i class="icon-arrow-down"></i>',
      });

      /* WOW Scroll Spy
    ========================================================*/
     var wow = new WOW({
      //disabled for mobile
        mobile: false
    });

    wow.init();

    /* Nivo Lightbox 
    ========================================================*/
    $('.lightbox').nivoLightbox({
        effect: 'fadeScale',
        keyboardNav: true,
      });

    /* Counter
    ========================================================*/
    $('.counterUp').counterUp({
     delay: 10,
     time: 1000
    });


    /* Back Top Link active
    ========================================================*/
      var offset = 200;
      var duration = 500;
      $(window).scroll(function() {
        if ($(this).scrollTop() > offset) {
          $('.back-to-top').fadeIn(400);
        } else {
          $('.back-to-top').fadeOut(400);
        }
      });

      $('.back-to-top').on('click',function(event) {
        event.preventDefault();
        $('html, body').animate({
          scrollTop: 0
        }, 600);
        return false;
      });

      

  });      

}(jQuery));

$(document).ready(function(){
      var winWidth = $(window).width();
      // showWidth( "window", $( window ).width() );
        if (winWidth>991) {
           $("#vertical_slider").mCustomScrollbar({
              axis:"y", // horizontal scrollbar
              scrollButtons:{enable:true},
              theme:"light-thick",
              scrollbarPosition:"outside"
      //         callbacks:{
      //   onOverflowY:function(){
      //     var opt=$(this).data("mCS").opt;
      //     if(opt.mouseWheel.axis!=="y") opt.mouseWheel.axis="y";
      //   },
      //   onOverflowX:function(){
      //     var opt=$(this).data("mCS").opt;
      //     if(opt.mouseWheel.axis!=="x") opt.mouseWheel.axis="x";
        
          });
        }
        else{
          $("#vertical_slider").mCustomScrollbar({
              axis:"x", // horizontal scrollbar
              scrollButtons:{enable:true},
              theme:"light-thick",
              scrollbarPosition:"outside"
          });
        }
      });
        // }
       


        // hero slider js
        $(document).ready(function() {

            var homebannerDesc = $('#hero_slider');
            var homebannerDesc_settings = {
                loop: true,
                mouseDrag: true ,
                autoplaySpeed: 1000,
                navSpeed: 1000,
                dotsSpeed: 1000,
                dragEndSpeed: 1000,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    360: {
                        items: 1
                    },
                    500: {
                        items: 1
                    },
                    1200: {
                        items: 1
                    },
                    1600: {
                        items: 1
                    }
                }
            };
            homebannerDesc.owlCarousel(homebannerDesc_settings);

        });


        // notice slider js
        $(document).ready(function() {

            var homebannerDesc = $('#notice_slider');
            var homebannerDesc_settings = {
                loop: true,
                mouseDrag: true ,
                autoplaySpeed: 1000,
                autoplayTimeout:2000,
                navSpeed: 1000,
                dotsSpeed: 1000,
                dragEndSpeed: 1000,
                autoplay: true,
                center: true,
                autoplayHoverPause:true,
                responsive: {
                    0: {
                        items: 1
                    },
                    360: {
                        items: 1
                    },
                    500: {
                        items: 1
                    },
                    991: {
                        items: 2
                    },
                    1600: {
                        items: 2
                    }
                }
            };
            homebannerDesc.owlCarousel(homebannerDesc_settings);

        });

        // $(document).ready(function() {

        //     var agentSlider = $('#our-agent');
        //     var agentSlider_settings = {
        //         loop: true,
        //         item:
        //         mouseDrag: true ,
        //         autoplaySpeed: 1000,
        //         autoplayTimeout:2000,
        //         navSpeed: 1000,
        //         dotsSpeed: 1000,
        //         dragEndSpeed: 1000,
        //         autoplay: true,
        //         center: true,
        //         nav:true,
        //         dots:true,
        //         autoplayHoverPause:true,
        //         responsive: {
        //             0: {
        //                 items: 1
        //             },
        //             360: {
        //                 items: 1
        //             },
        //             500: {
        //                 items: 2
        //             },
        //             991: {
        //                 items: 3
        //             }
        //         }
        //     };
        //     agentSlider.owlCarousel(agentSlider_settings);

        // });
// share icon

$('.share_with a').on('click',function(){
  $('.social-icon').toggleClass('open');
  $('.share_with').toggleClass('open');
})
