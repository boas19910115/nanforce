(function ($) {
    "use strict";
    
    /*==================================
        key trapped
        ==================================*/

        var keyTrapped = function (elem) {
        var tabbable = elem
          .find('select, input, textarea, button, a')
          .filter(':visible');

        var firstTabbable = tabbable.first();
        var lastTabbable = tabbable.last();
        /*set focus on first input*/
        firstTabbable.focus();

        /*redirect last tab to first input*/
        lastTabbable.on('keydown', function (e) {
          if (e.which === 9 && !e.shiftKey) {
            e.preventDefault();
            firstTabbable.focus();
          }
        });

        /*redirect first shift+tab to last input*/
        firstTabbable.on('keydown', function (e) {
          if (e.which === 9 && e.shiftKey) {
            e.preventDefault();
            lastTabbable.focus();
          }
        });
        elem.on('keyup', function (e) {
          if (e.keyCode === 27) {
            elem.hide();
          }
        });
        };

        //Js code for search box

    $(".sch-btn").on("click", function () {
        $(".fa-times").toggleClass("show");
        $(".fa-search").toggleClass("hide");
        $(".search-box").slideToggle("");
        $('.search-box form').find('input.search-field').focus();
    }); 
  
 

  $('.search-box .search-submit').focusout(function () {
    $(this).closest('.search-box').slideUp();
    $(".fa-times").toggleClass("show");
        $(".fa-search").toggleClass("hide");
  });
     $(".toggle-menu").on("click", function () { 
        $(".main-nav.menu-caret").slideToggle("400");
    }); 


    // if (jQuery(window).width() < 991) {
    //    jQuery('li.menu-item-has-children > a').on('click', function(e) {
    //         e.preventDefault();
    //         jQuery(this).next().slideToggle();
    //     });
    // }

    if (jQuery(window).width() < 991) {
    $(
      '.nav-menu li.menu-item-has-children,.nav-menu li.page-item-has-children'
    ).prepend(
      '<span class="dropdown-icon"><i class="fa fa-caret-down"><i></span>'
    );

    $(
      '.nav-menu li.menu-item-has-children span.dropdown-icon,.nav-menu li.page-item-has-children span.dropdown-icon'
    ).on('click', function (e) {
      e.preventDefault();
      $(this)
        .siblings(
          '.nav-menu li.menu-item-has-children ul.sub-menu,.nav-menu li.page-item-has-children ul.sub-menu'
        )
        .slideToggle(300);
    });
  } else {
    $(
      '.nav-menu li.menu-item-has-children, .nav-menu li.page-item-has-children'
    )
      .find('span')
      .css('display', 'none');
  }
        
function mobileMenuFocus(){
        

        $('.toggle-menu').on('click', function () {
          keyTrapped($('.mid'));
        });
      }

mobileMenuFocus();
})(jQuery);