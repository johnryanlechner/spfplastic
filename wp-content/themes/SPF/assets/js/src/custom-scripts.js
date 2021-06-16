/*!----------------------------------------

	Custom JS for Child Theme v20

----------------------------------------*/

(function ($) {
    'use strict';
    //var $document = $(document);
    //var $window = $(window);
    /*----------------------------------------
		Support Functions
	----------------------------------------*/

    /*----------------------------------------
		On Load 
	----------------------------------------*/
    /*
    $window.on('load', function() {
        
    });
    */
    /*----------------------------------------
		On Ready
	----------------------------------------*/
    $(document).ready(function () {  
        
        $('#main .button').each(function(){
            var $this = $(this);

            var $defaultHTML = $this[0]['innerHTML']; 
            var openTag = '<span class="button-text">';
            var closeTag = '</span>';
            
            $this[0]['innerHTML'] = openTag + $defaultHTML + closeTag; 
        });
        /**
         * User referrer tracking
         */
        if (!docCookies.hasItem('mrsrc')) {
            if (
                typeof document.referrer === 'undefined' ||
                document.referrer === '' ||
                document.referrer === null
            ) {
                docCookies.setItem('mrsrc', 'direct', 3600, '/');
            } else {
                docCookies.setItem('mrsrc', document.referrer, 432000, '/');
            }
        }

        /* change this to reflect the ID of the hidden form input */
        var myForm = document.getElementById('input_1_6');
        if (myForm) {
            /* change this to reflect the ID of the hidden form input, again */
            document.getElementById('input_1_6').value = docCookies.getItem(
                'mrsrc'
            );
        }

        // Superfish it
        $('ul.sf-menu').superfish();

        // Magnific - For Video Only
        $('.popup-video').magnificPopup({
            disableOn: 480,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
            iframe: {
                patterns: {
                    youtube: {
                        src:
                            '//www.youtube.com/embed/%id%?autoplay=1&modestbranding=1',
                    },
                },
            },
        });

        // Magnific - Images & Galleries
        var groups = {};

        $("a[rel^='magnificMe']").each(function () {
            var id = parseInt($(this).attr('data-group'), 10);

            if (!groups[id]) {
                groups[id] = [];
            }

            groups[id].push(this);
        });

        $.each(groups, function () {
            $(this).magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                gallery: { enabled: true },

                image: {
                    verticalFit: true,
                    titleSrc: function (item) {
                        return (
                            '<a class="image-source-link" href="' +
                            item.src +
                            '" target="_blank">view file</a>'
                        );
                    },
                },
                iframe: {
                    patterns: {
                        youtube: {
                            src:
                                '//www.youtube.com/embed/%id%?autoplay=1&amp;rel=0',
                        },
                    },
                },
            });
        });

        // ---------------------------------------------------------
        // Responsive wrap for Wordpress aligned images
        // ---------------------------------------------------------

        $('img.alignleft').each(function () {
            var $this = $(this);

            if ($this.parent('a').length > 0) {
                $this
                    .parent('a')
                    .wrap('<span class="mobile-center-image"></span>');
            } else {
                $this.wrap('<span class="mobile-center-image"></span>');
            }
        });

        $('img.alignright').each(function () {
            var $this = $(this);

            if ($this.parent('a').length > 0) {
                $this
                    .parent('a')
                    .wrap('<span class="mobile-center-image"></span>');
            } else {
                $this.wrap('<span class="mobile-center-image"></span>');
            }
        });

        // ---------------------------------------------------------
        // Smooth in page scrolling
        // ---------------------------------------------------------
        $("a[href*='#']:not([href='#'])").on('click', function () {
            if (
                location.pathname.replace(/^\//, '') ===
                    this.pathname.replace(/^\//, '') &&
                location.hostname === this.hostname
            ) {
                var target = $(this.hash);
                target = target.length
                    ? target
                    : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    // Scroll
                    $('html,body').animate(
                        {
                            scrollTop: target.offset().top - 100,
                        },
                        1000,
                        function () {
                            // Focus and guarantee focus
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(':focus')) {
                                return false;
                            } else {
                                $target.attr('tabindex', '-1');
                                $target.focus();
                            }
                            // click if a toggle
                            if (
                                $target.is('a.trigger') &&
                                !$target.hasClass('active')
                            ) {
                                $target.click();
                            }
                        }
                    );
                    return false;
                }
            }
        });

        //Load specific tab depending upon the hash in URL
        function hashLoad() {
            // Keep page at top until after load
            $(document).scrollTop(0);

            // Get hash from URL, removing # (compatibility)
            var hashTarget = location.hash.replace('#', '');

            // Find hash id on page (using .find to guarantee we're just searching existing nodes), adding # back for search
            hashTarget = $('body').find('#' + hashTarget);

            $('html,body').animate(
                {
                    scrollTop: hashTarget.offset().top - 100,
                },
                1000,
                function () {
                    // Focus and guarantee focus
                    var $target = $(hashTarget);
                    $target.focus();
                    if ($target.is(':focus')) {
                        //return false;
                    } else {
                        $target.attr('tabindex', '-1');
                        $target.focus();
                    }
                    // click if a toggle
                    if (
                        $target.is('a.trigger') &&
                        !$target.hasClass('active')
                    ) {
                        $target.click();
                    }
                }
            );

            return false;
        }

        // Only load if there is a hash in URL
        if (location.hash !== '') {
            $(window).on('load', hashLoad);
        }

        // ---------------------------------------------------------
        // Tabs v3 - placed in custom-footer.js now?? commenting out
        // ---------------------------------------------------------

        // Add arrow key functionality to tabs
        // $('[role=tablist]').keydown(function(e) {
        //     if (e.keyCode === 37) {
        //         $("[aria-selected=true]").prev().click().focus();
        //         e.preventDefault();
        //     }
        //     if (e.keyCode === 38) {
        //         $("[aria-selected=true]").prev().click().focus();
        //         e.preventDefault();
        //     }
        //     if (e.keyCode === 39) {
        //         $("[aria-selected=true]").next().click().focus();
        //         e.preventDefault();
        //     }
        //     if (e.keyCode === 40) {
        //         $("[aria-selected=true]").next().click().focus();
        //         e.preventDefault();
        //     }
        // });

        // ----------------------------------------
        // Buttons https://codepen.io/kjbrum/pen/wBBLXx
        // ----------------------------------------
        /*
			$('.button').append('<span></span>');

			$('.button').on('mouseenter', function(e) {
				var parentOffset = $(this).offset(),
				relX = e.pageX - parentOffset.left,
				relY = e.pageY - parentOffset.top;
				$(this).find('span').css({top:relY, left:relX});
			}).on('mouseout', function(e) {
					var parentOffset = $(this).offset(),
					relX = e.pageX - parentOffset.left,
					relY = e.pageY - parentOffset.top;
				$(this).find('span').css({top:relY, left:relX});
			});
            */
    });

    $(window).on('scroll',function(){
        if ($(window).width() >= 1454) {
            if($(window).scrollTop() >= 180 ) {
                if (!$('body').hasClass('scrolled')) {
                    $('body').addClass('scrolled');
                }  
            } else {
                $('body').removeClass('scrolled'); 
            }
        } 
    });

    /*---------------------------------------------------------
        Simple parallax effect
    ---------------------------------------------------------- */
    // // If items are in viewport, apply parallax effects
    // function setupParallaxItem(item){
    //     var offset = 0.2;
    //     var scrolled = window.pageYOffset;

    //     if( isInViewport(item) && leavingViewport(item) ) {
    //         item.style.top = - (scrolled * offset) + 'px';
    //     }
    // }
    // // Initialize parallax 
    // function initParallax() {
    //     var item = document.querySelector('.parallax');

    //     return (item) ? setupParallaxItem(item) : false;
    // }
    // window.addEventListener('scroll', initParallax);
      
    // /* Helper - Determine if element is in viewport */
    // var isInViewport = function(e) {
    //     var bounding = e.getBoundingClientRect();

    //     return (
    //         bounding.top >= 0 &&
    //         bounding.left >= 0 &&
    //         bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    //         bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    //     );
    // }

    // /* Helper - Determine if element is leaving viewport */
    // var leavingViewport = function(e) {
    //     var scrolled = window.pageYOffset;
    //     var top = e.getBoundingClientRect().top;

    //     return(
    //         scrolled < top + window.innerHeight
    //     );
    // }

    /*---------------------------------------------------------
		Handles heading scroll sticky toggle & margin offset
    ---------------------------------------------------------- */
    function headerSetMargin(){
        var headerElem = document.getElementById('header');
        var primaryWrap = document.getElementById('primary-wrap');

        primaryWrap.style.marginTop = headerElem.clientHeight + 'px';
    }
    
    /* 
    function headerStickyClass(currentScroll) {
        return ( currentScroll > 0 ) ? document.body.classList.add('fixed-header') : document.body.classList.remove('fixed-header');
    }
    */

    function headerHandler() {
        var scroll = document.scrollingElement ? document.scrollingElement.scrollTop : document.documentElement.scrollTop;
        /* 
        if(window.innerWidth > 768){
            headerStickyClass(scroll);
        } 
        */
    }

    //window.addEventListener( 'resize', headerSetMargin );
    //window.addEventListener( 'load', headerSetMargin );
    window.addEventListener( 'scroll', headerHandler );
})(jQuery);
