/*!
 * Tink 2014 Theme JavaScript
 *
 * @author: @LeonieWatson
 *
 */
(function() {
    /*
     * Global constants
     */
    'use strict';

    // Media query breakpoints
    var RBP_TABLET = 772;

    (function() {
        /*
         * Makes "skip to content" link work correctly in IE9, Chrome, and Opera for better accessibility.
         * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
         */
        var ua = navigator.userAgent.toLowerCase();

        if ((ua.indexOf('webkit') > -1 || ua.indexOf('opera') > -1 || ua.indexOf('msie') > -1) && document.getElementById && window.addEventListener) {

            window.addEventListener('hashchange', function() {
                var element = document.getElementById(location.hash.substring(1));

                if (element) {
                    if (!/^(?:a|select|input|button|textarea)$/i.test(element.nodeName)) {
                        element.tabIndex = -1;
                    }

                    element.focus();
                }
            }, false);
        }
    })();

    if (Modernizr.mq('only all')) {
        /*
         * Browser must support Media Queries
         */
        skipLinks();

        asideToggle(RBP_TABLET);

        themeSwitcher();

        asideCollapsible();

        scrollableTable();

        if (document.getElementById('myvid')) {
            videoPlayerInit('myvid');
        }
    }
})();



/*--------------------------------------------------------------------------------
  Functions
--------------------------------------------------------------------------------*/
function viewport() {
    /*
     * Measure the width and height of the viewport.
     * This calculation will match the CSS @media queries unlike jQuery .width() or .innerWidth()
     */
    'use strict';

    var target = window,
        type = 'inner';

    if (!('innerWidth' in window)) {
        type = 'client';
        target = document.documentElement || document.body;
    }
    return {
        width: target[type + 'Width'],
        height: target[type + 'Height']
    };
}

function skipLinks() {
    /*
     * Skip links to open flyout navigation on mobile and focus on target
     */
    'use strict';

    var header = $('.header'),
        aside = $('.aside'),
        searchSkipLink = $('a[href="#s"]', header),
        navSkipLink = $('a[href="#anchor-navigation"]', header);

    searchSkipLink.on('click', function() {
        /*
         * On click we want to open the aside so its visible then
         * move the focus to the actual search input field to improve UX
         */
        aside.addClass('js-is-open')
            .attr('aria-hidden', 'false');
    });

    navSkipLink.on('click', function() {
        // On click we want to open the aside so its visible
        aside.addClass('js-is-open')
            .attr('aria-hidden', 'false');

        // Update aria state of menu button to ensure its state is correct
        $('#js-aside-toggle-button').attr('aria-expanded', 'true');
    });
}

function asideToggle(RBP_TABLET) {
    /*
     * Toggle button for the flyout aside on small screens
     */
    'use strict';

    var viewportWidth = viewport().width,
        toggleActive = false,
        header = $('.header'),
        aside = $('.aside'),
        toggleButton = $('<button aria-controls="js-aside" class="js-header_toggle-button" id="js-aside-toggle-button"><span class="hide">Toggle </span>Menu</button>');

    function init() {
        /*
         * Initialise the toggle functionality
         */
        toggleActive = true;

        aside.attr({
            'aria-hidden': 'true',
            'id': 'js-aside',
            'tabindex': '-1'
        });

        // Check the state on init everytime to apply the correct init aria-expanded state
        if (aside.hasClass('js-is-open')) {
            toggleButton.attr('aria-expanded', 'true');
        } else {
            toggleButton.attr('aria-expanded', 'false');
        }

        toggleButton.on('click', function(event) {
            // On click we want to toggle the aside
            event.preventDefault();

            if (aside.hasClass('js-is-open')) {
                toggleButton.attr('aria-expanded', 'false');
                aside
                    .attr('aria-hidden', 'true')
                    .removeClass('js-is-open');
            } else {
                toggleButton.attr('aria-expanded', 'true');
                aside
                    .attr('aria-hidden', 'false')
                    .addClass('js-is-open')
                    .focus();
            }
        });

        header.append(toggleButton);
    }

    function destroy() {
        /*
         * Destroy the toggle functionality for the aside flyout
         */
        toggleActive = false;

        aside
            .removeClass('js-is-open')
            .removeAttr('aria-hidden id tabindex');

        toggleButton.remove();
    }

    if (toggleActive === false && viewportWidth < RBP_TABLET) {
        // not active and below breakpoint
        init();
    } else if (toggleActive === true && viewportWidth >= RBP_TABLET) {
        // active and above breakpoint
        destroy();
    }

    $(window).resize(function() {
        /*
         * On browser resize check to see if the flyout needs to be initialised or destroyed
         */
        viewportWidth = viewport().width;

        if (toggleActive === false && viewportWidth < RBP_TABLET) {
            // not active and below breakpoint
            init();
        } else if (toggleActive === true && viewportWidth >= RBP_TABLET) {
            // active and above breakpoint
            destroy();
        }
    });
}

function themeSwitcher() {
    /*
     * Create the controls for switching between light and dark theme
     */
    'use strict';

    var asideNav = $('.aside_navigation'),
        switcherTemplate = $('<ul class="js-theme-switcher" />');

    // Build the switcher template before inserting to save DOM manipulation
    switcherTemplate.append(
        '<li class="js-theme-switcher_item js-theme-switcher_item--light"><button aria-pressed="false" data-class="theme--default">Light<span class="hide"> theme</span></button></li>',
        '<li class="js-theme-switcher_item js-theme-switcher_item--dark"><button aria-pressed="false" data-class="theme--dark">Dark<span class="hide"> theme</span></button></li>'
    );

    // Check if theme is active to apply active class to button
    if ($('html').hasClass('theme--dark')) {
        switcherTemplate.find('button[data-class="theme--dark"]')
            .addClass('js-theme-switcher_button--active')
            .attr('aria-pressed', 'true');
    } else {
        switcherTemplate.find('button[data-class="theme--default"]')
            .addClass('js-theme-switcher_button--active')
            .attr('aria-pressed', 'true');
    }

    // Add a heading to better structure document outline and the switcher template
    asideNav.after('<h2 class="js-theme-switcher_heading"><span>Site theme</span></h2>', switcherTemplate);

    $(switcherTemplate).on('click', 'button', function(event) {
        /*
         * Listen for click events to trigger the theme change
         */
        var classValue = $(this).attr('data-class');

        event.preventDefault();

        // Create or update the cookie that stores current theme
        themeCookie(classValue);

        // Remove existing class just incase there is one already set
        $('html').removeClass('theme--default theme--dark');

        (function addThemeClass() {
            /*
             * Uses same code (uncompressed) as inline script in <head> for
             * reading cookie and applying class to the <html> element
             */
            var el,
                siteTheme = document.cookie.replace(/(?:(?:^|.*;\s*)siteTheme\s*\=\s*([^;]*).*$)|^.*$/, '$1');

            if (siteTheme !== '') {
                el = document.getElementsByTagName('html')[0];
                el.className = el.className + ' ' + siteTheme;
            }
        })();

        // Update class on button to allow for active styling
        switcherTemplate.find('button')
            .removeClass('js-theme-switcher_button--active')
            .attr('aria-pressed', 'false');
        $(this)
            .addClass('js-theme-switcher_button--active')
            .attr('aria-pressed', 'true');
    });
}

function themeCookie(classValue) {
    /*
     * Create/update a cookie that stores the site theme preference
     * to avoid FOUC reading existing cookie is done by inline JS in the <head>
     */
    'use strict';

    var date,
        expires;

    // Get the date 365 days from now to set the expiry on the cookie
    date = new Date();
    date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
    expires = date.toGMTString();

    // Create/update the cookie to store the site theme
    document.cookie = 'siteTheme=' + classValue + '; expires=' + expires + '; path=/';
}

function scrollableTable() {
    /*
     * Make tables scrollable
     * To prevent wide tabled breaking layout on small screens
     */
    'use strict';

    var mainContent = $('.main');

    $(mainContent).find('table').each(function() {
        // Wrap each table in a scrollable div
        $(this).wrap('<div class="scrollable"></div>');
    });
}

function asideCollapsible() {
    /*
     * Collapsible aside navigation
     * @req: https://github.com/nomensa/jquery.hide-show
     */
    'use strict';

    var asideNav = $('.aside_navigation');

    $(asideNav).find('.collapsible').each(function() {
        // Add class because the plugin requires a class for the trigger element
        $(this).find('h3').addClass('title');

        $(this).hideShow({
            speed: 0,
            state: 'hidden',
            triggerElementTarget: '.title'
        });
    });
}

function videoPlayerInit(videoId) {
    /*
     * Video player initialization
     * @req: https://github.com/paypal/accessible-html5-video-player
     */
    'use strict';

    new InitPxVideo({
        'videoId': videoId,
        'captionsOnDefault': false
    });

    // Overwrite width set by video player
    $('#' + videoId).css('width', 'auto');
}