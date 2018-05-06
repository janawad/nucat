/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

(function (window) {

    'use strict';

    // class helper functions from bonzo https://github.com/ded/bonzo

    function classReg(className) {
        return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
    }

    // classList support for class management
    // altho to be fair, the api sucks because it won't accept multiple classes at once
    var hasClass, addClass, removeClass;

    if ('classList' in document.documentElement) {
        hasClass = function (elem, c) {
            return elem.classList.contains(c);
        };
        addClass = function (elem, c) {
            elem.classList.add(c);
        };
        removeClass = function (elem, c) {
            elem.classList.remove(c);
        };
    } else {
        hasClass = function (elem, c) {
            return classReg(c).test(elem.className);
        };
        addClass = function (elem, c) {
            if (!hasClass(elem, c)) {
                elem.className = elem.className + ' ' + c;
            }
        };
        removeClass = function (elem, c) {
            elem.className = elem.className.replace(classReg(c), ' ');
        };
    }

    function toggleClass(elem, c) {
        var fn = hasClass(elem, c) ? removeClass : addClass;
        fn(elem, c);
    }

    var classie = {
        // full names
        hasClass: hasClass,
        addClass: addClass,
        removeClass: removeClass,
        toggleClass: toggleClass,
        // short names
        has: hasClass,
        add: addClass,
        remove: removeClass,
        toggle: toggleClass
    };

    // transport
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(classie);
    } else {
        // browser global
        window.classie = classie;
    }

    /* Demo Scripts for Bootstrap Carousel and Animate.css article
     * on SitePoint by Maria Antonietta Perna
     */
  

})(window);




  (function ($) {

        //Function to animate slider captions 
        function doAnimations(elems) {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';

            elems.each(function () {
                var $this = $(this),
                    $animationType = $this.data('animation');
                $this.addClass($animationType).one(animEndEv, function () {
                    $this.removeClass($animationType);
                });
            });
        }

        //Variables on page load 
        var $myCarousel = $('.carousel-example-generic'),
            $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

        //Initialize carousel 
        $myCarousel.carousel();

        //Animate captions in first slide on page load 
        doAnimations($firstAnimatingElems);

        //Pause carousel  
        $myCarousel.carousel('pause');


        //Other slides to be animated on carousel slide event 
        $myCarousel.on('slide.bs.carousel', function (e) {
            var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
        });
      
      
      /* Grid to List Remove jquery
    =============================*/
    $('.grid-list-button button').on('click', function () {
        $('.grid-list-button button').removeClass('active');
        $(this).addClass('active');
    });
    $('.grid-list-button button.grid-battn').on('click', function () {
        $('.shopitems').removeClass('list');
        $('.shopitems').addClass('grid');
    });    
    $('.grid-list-button button.list-battn').on('click', function () {
        $('.shopitems').removeClass('grid');
        $('.shopitems').addClass('list');
    });
    /* Comment Reply box hide jquery
    ================================*/
    $('.comment-reply button').on('click', function () {
        $(this).parent().children('.comment-reply form').fadeToggle();
    });
      
      $('.checkout').on('mouseenter',function(){
          $('.shopping-cart-down').fadeToggle();
      });
      $('.checkout').parents().siblings().on('mouseenter',function(){
          $('.shopping-cart-down').fadeOut();
      });
      
      
    /* Toggle-menu jquery
    =====================*/
    $('#menu-button').on('click', function () {
        $(this).toggleClass('open');
    });
    
    /* Search toggle jquery 
    ==========================*/
    $('.searching a').on('click', function () {
        $('.search-box').fadeToggle();
        return false;
    });
    $('.searching').parents().siblings().on('click', function () {
        $('.search-box').fadeOut();
    });
      $('.menu-toggle').on('click', function () {
        $('.mainmenu-area').slideToggle(300);
    });
    
    })(jQuery);