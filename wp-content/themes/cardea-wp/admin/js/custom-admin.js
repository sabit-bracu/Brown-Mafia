(function () {

    // COLORS                         
    wp.customize('cardea_menu_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css1">';
            inlineStyle += 'body .site-wrapper .sm-clean a { color: ' + to + ' !important; }';
            inlineStyle += '</style>';
            customColorCssElemnt = $('.custom-color-css1');
            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }
        });
    });

    wp.customize('cardea_menu_hover_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css2">';
            inlineStyle += 'body .site-wrapper .sm-clean a:hover, body .site-wrapper .main-menu.sm-clean .sub-menu li a:hover, body .site-wrapper .sm-clean li.active a, body .site-wrapper .sm-clean li.current-page-ancestor > a, body .site-wrapper .sm-clean li.current_page_ancestor > a, body .site-wrapper .sm-clean li.current_page_item > a { color: ' + to + ' !important; }';
            inlineStyle += '</style>';
            customColorCssElemnt = $('.custom-color-css2');
            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }
        });
    });

    wp.customize('cardea_global_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css3">';
            inlineStyle += 'body .site-wrapper a, body .site-wrapper a:hover, .site-wrapper blockquote:before, .site-wrapper .blog-item-holder .cat-links ul a, .site-wrapper .navigation.pagination a:hover, .site-wrapper blockquote:not(.cocobasic-block-pullquote):before, .single .site-wrapper .entry-info .cat-links li:after, .site-wrapper .tags-holder a, .single .site-wrapper .wp-link-pages, .site-wrapper .comment-form-holder a:hover, .site-wrapper .replay-at-author, body .site-wrapper .footer a:hover { color: ' + to + '; }';
            inlineStyle += '.blog .site-wrapper .more-posts, .blog .site-wrapper .no-more-posts, .blog .site-wrapper .more-posts-loading, .site-wrapper .navigation.pagination .current, .site-wrapper .tags-holder a:hover, .search .site-wrapper h1.entry-title, .archive .site-wrapper h1.entry-title { background-color: ' + to + '; }';
            inlineStyle += '.site-wrapper .tags-holder a { border-color: ' + to + '; }';
            inlineStyle += '</style>';
            customColorCssElemnt = $('.custom-color-css3');
            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }
        });
    });

    wp.customize('cardea_footer_background', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css4">';
            inlineStyle += '.site-wrapper .footer { background-color: ' + to + '; }';
            inlineStyle += '</style>';
            customColorCssElemnt = $('.custom-color-css4');
            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }
        });
    });

    wp.customize('cardea_menu_background_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css5">';
            inlineStyle += '.site-wrapper .header-holder, .site-wrapper .menu-holder, .site-wrapper .sm-clean ul, .transparent-menu.page-template-onepage .site-wrapper .header-holder.is-sticky { background-color: ' + to + '; }';
            inlineStyle += '</style>';
            customColorCssElemnt = $('.custom-color-css5');
            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }
        });
    });

    wp.customize('cardea_body_background_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css6">';
            inlineStyle += 'body { background-color: ' + to + ' !important; }';
            inlineStyle += '</style>';
            customColorCssElemnt = $('.custom-color-css5');
            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }
        });
    });

    function cocobasic_hexToRGB(hex, alpha) {
        var r = parseInt(hex.slice(1, 3), 16),
                g = parseInt(hex.slice(3, 5), 16),
                b = parseInt(hex.slice(5, 7), 16);
        if (alpha) {
            return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")";
        } else {
            return "rgb(" + r + ", " + g + ", " + b + ")";
        }
    }

})(jQuery);