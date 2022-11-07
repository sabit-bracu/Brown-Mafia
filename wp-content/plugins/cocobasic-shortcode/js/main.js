(function ($) {

    "use stict";

    var count = 1;
    var portfolioPostsPerPage = $(".grid-item").length;
    var totalNumberOfPortfolioPages = Math.ceil(parseInt(ajax_var_portfolio.total) / portfolioPostsPerPage);

    $("a.elementor-button[href^='#']").addClass('scroll');

    //Hide Portfolio Load More Button
    showHidePortfolioLoadMoreButton();
    //Fix z-index
    zIndexSectionFix();
    //Member Content Load
    memberContentLoadOnClick();
    //Portfolio Section Add Title Class
    portfolioSectionAddTitleClass();
    //Portfolio Item Load
    portfolioItemContentLoadOnClick();
    //Load more articles in Portfolio
    loadMorePortfolioOnClick();
    //PrettyPhoto initial    
    setPrettyPhoto();
    //Portfolio Items Margins
    portfolioItemMargin();
    //Is First Section Full Screen Fix
    isFirstSectionFullScreen();

    $(window).on('load', function () {
        isotopeSetUp();
        imageSliderSettings();
        textSliderSettings();
        setPortfolioWidth();
        coco2border();
        cocoExtraWidth();
        $(".section-title-holder").stick_in_parent({offset_top: 64, parent: ".section-wrapper", spacer: ".sticky-spacer"});
        $(".section-title-holder.portfolio-title-fix-class").stick_in_parent(({offset_top: 64, parent: ".section-wrapper", spacer: ".sticky-spacer"}))
                .on("sticky_kit:bottom", function (e) {
                    $(this).addClass("it-is-bottom");
                })
                .on("sticky_kit:unbottom", function (e) {
                    $(this).removeClass("it-is-bottom");
                });
    });

    $(window).on('resize', function () {
        setPortfolioWidth();
    });


    function isotopeSetUp() {
        var grid = $('.grid');
        grid.isotope({
            itemSelector: '.grid-item',
            masonry: {
                columnWidth: '.grid-sizer'
            }
        });

        $('.filters-button-group').on('click', '.button', function () {
            var filterValue = $(this).attr('data-filter');
            grid.isotope({
                filter: filterValue
            });
            grid.on('layoutComplete', function () {
                setPrettyPhoto();
            });
            $('#portfolio-grid .grid-item.animate').addClass('show-it');
        });
        $('.button-group').each(function (i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', '.button', function () {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
        });
    }

    function zIndexSectionFix() {
        var numSection = $(".page-template-onepage .section-wrapper").length + 2;
        $('.page-template-onepage').find('.section-wrapper').each(function () {
            $(this).css('zIndex', numSection);
            numSection--;
        });
    }

    function showHidePortfolioLoadMoreButton() {
        if (portfolioPostsPerPage < parseInt(ajax_var_portfolio.total)) {
            $('.more-posts-portfolio').css('visibility', 'visible');
            $('.more-posts-portfolio').animate({opacity: 1}, 1500);
        } else {
            $('.more-posts-portfolio').css('display', 'none');
        }
    }

    function imageSliderSettings() {
        $(".image-slider").each(function () {
            var speed_value = $(this).data('speed');
            var auto_value = $(this).data('auto');
            var hover_pause = $(this).data('hover');
            if (auto_value === true)
            {
                $(this).owlCarousel({
                    loop: true,
                    autoHeight: true,
                    smartSpeed: 1000,
                    autoplay: auto_value,
                    autoplayHoverPause: hover_pause,
                    autoplayTimeout: speed_value,
                    responsiveClass: true,
                    items: 1
                });

                $(this).on('mouseleave', function () {
                    $(this).trigger('stop.owl.autoplay');
                    $(this).trigger('play.owl.autoplay', [auto_value]);
                });
            } else {
                $(this).owlCarousel({
                    loop: true,
                    autoHeight: true,
                    smartSpeed: 1000,
                    autoplay: false,
                    autoplayHoverPause: hover_pause,
                    autoplayTimeout: speed_value,
                    responsiveClass: true,
                    items: 1
                });
            }
        });
    }

    function textSliderSettings() {
        $(".text-slider").each(function () {
            var speed_value = $(this).data('speed');
            var auto_value = $(this).data('auto');
            var hover_pause = $(this).data('hover');
            if (auto_value === true)
            {
                $(this).owlCarousel({
                    loop: true,
                    autoHeight: false,
                    smartSpeed: 1000,
                    autoplay: auto_value,
                    autoplayHoverPause: hover_pause,
                    autoplayTimeout: speed_value,
                    responsiveClass: true,
                    items: 1
                });

                $(this).on('mouseleave', function () {
                    $(this).trigger('stop.owl.autoplay');
                    $(this).trigger('play.owl.autoplay', [auto_value]);
                });
            } else {
                $(this).owlCarousel({
                    loop: true,
                    autoHeight: false,
                    smartSpeed: 1000,
                    autoplay: auto_value,
                    autoplayHoverPause: hover_pause,
                    autoplayTimeout: speed_value,
                    responsiveClass: true,
                    items: 1
                });

            }
        });
    }

    function setPrettyPhoto() {
        $('a[data-rel]').each(function () {
            $(this).attr('rel', $(this).data('rel'));
        });
        $("a[rel^='prettyPhoto']").prettyPhoto({
            slideshow: false, /* false OR interval time in ms */
            overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
            default_width: 1280,
            default_height: 720,
            deeplinking: false,
            social_tools: false,
            iframe_markup: '<iframe src ="{path}" width="{width}" height="{height}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'
        });
    }

    function memberContentLoadOnClick() {
        $('.member-holder a').on('click', function (e) {
            e.preventDefault();
            var memberID = $(this).data('id');
            $(this).find('.member-mask').addClass('animate-plus');
            if ($("#mcw-" + memberID).length) //Check if is allready loaded
            {
                $('html, body').animate({scrollTop: $('#team-holder').offset().top - 150}, 400);
                setTimeout(function () {
                    $('.member-holder').addClass('hide').fadeOut();
                    setTimeout(function () {
                        $("#mcw-" + memberID).addClass('show');
                        $('.team-load-content-holder').addClass('show');
                        $('.member-mask').removeClass('animate-plus');
                    }, 300);
                }, 500);
            } else {
                loadMemberContent(memberID);
                $('.section-title-holder').trigger("sticky_kit:recalc");
            }
        });
    }

    function loadMemberContent(memberID) {
        $.ajax({
            url: ajax_var_team.url,
            type: 'POST',
            data: "action=team_ajax&member_id=" + memberID + "&security=" + ajax_var_team.nonce,
            success: function (html) {
                var getHtml = $(html).html();
                $('.team-load-content-holder').append('<div id="mcw-' + memberID + '" class="member-content-wrapper">' + getHtml + '</div>');
                if (!$("#mcw-" + memberID + " .close-icon").length) {
                    $("#mcw-" + memberID).prepend('<div class="close-icon"></div>');
                }
                $('html, body').animate({scrollTop: $('#team-holder').offset().top - 150}, 400);
                setTimeout(function () {
                    $("#mcw-" + memberID).imagesLoaded(function () {
                        imageSliderSettings();
                        $(".site-content").fitVids(); //Fit Video                
                        $('.member-holder').addClass('hide').fadeOut();
                        setTimeout(function () {
                            $("#mcw-" + memberID).addClass('show');
                            $('.team-load-content-holder').addClass('show');
                            $('.member-mask').removeClass('animate-plus');
                        }, 300);
                        $('#team-holder .close-icon').on('click', function (e) {
                            var memberReturnItemID = $(this).closest('.member-content-wrapper').attr("id").split("-")[1];
                            $('.team-load-content-holder').addClass("viceversa");
                            $('.member-holder').css('display', 'block');
                            setTimeout(function () {
                                $('#mcw-' + memberReturnItemID).removeClass('show');
                                $('.team-load-content-holder').removeClass('viceversa show');
                                $('.member-holder').removeClass('hide');
                            }, 300);
                            setTimeout(function () {
                                $('html, body').animate({scrollTop: $('#t-item-' + memberReturnItemID).offset().top - 150}, 400);
                            }, 500);
                        });
                    });
                }, 500);
            }
        });
        return false;
    }

    function portfolioItemContentLoadOnClick() {
        $('.ajax-portfolio').on('click', function (e) {
            e.preventDefault();
            var portfolioItemID = $(this).data('id');
            $(this).addClass('animate-plus');
            if ($("#pcw-" + portfolioItemID).length) //Check if is allready loaded
            {
                $('html, body').animate({scrollTop: $('#portfolio-wrapper').offset().top - 150}, 400);
                setTimeout(function () {
                    $('#portfolio-grid, .more-posts-portfolio-holder').addClass('hide');
                    setTimeout(function () {
                        $("#pcw-" + portfolioItemID).addClass('show');
                        $('.portfolio-load-content-holder').addClass('show');
                        $('.ajax-portfolio').removeClass('animate-plus');
                        $('#portfolio-grid, .more-posts-portfolio-holder').hide();
                    }, 300);
                }, 500);
            } else {
                loadPortfolioItemContent(portfolioItemID);
                $('.section-title-holder').trigger("sticky_kit:recalc");
            }
        });
    }

    function loadPortfolioItemContent(portfolioItemID) {
        $.ajax({
            url: ajax_var_portfolio_content.url,
            type: 'POST',
            data: "action=portfolio_ajax_content_load&portfolio_id=" + portfolioItemID + "&security=" + ajax_var_portfolio_content.nonce,
            success: function (html) {
                var getPortfolioItemHtml = $(html).html();
                $('.portfolio-load-content-holder').append('<div id="pcw-' + portfolioItemID + '" class="portfolio-content-wrapper">' + getPortfolioItemHtml + '</div>');
                if (!$("#pcw-" + portfolioItemID + " .close-icon").length) {
                    $("#pcw-" + portfolioItemID).prepend('<div class="close-icon"></div>');
                    $(".close-icon").css("background-image", 'url(' + $("#portfolio-wrapper").data("gobackimg") + ')');
                }
                $('html, body').animate({scrollTop: $('#portfolio-wrapper').offset().top - 150}, 400);
                setTimeout(function () {
                    $("#pcw-" + portfolioItemID).imagesLoaded(function () {
                        imageSliderSettings();
                        $(".site-content").fitVids({ignore: '.elementor-video-iframe'}); //Fit Video
                        $('#portfolio-grid, .more-posts-portfolio-holder').addClass('hide');
                        setTimeout(function () {
                            $("#pcw-" + portfolioItemID).addClass('show');
                            $('.portfolio-load-content-holder').addClass('show');
                            $('.ajax-portfolio').removeClass('animate-plus');
                            $('#portfolio-grid').hide();
                        }, 300);
                        $('.close-icon').on('click', function (e) {
                            var portfolioReturnItemID = $(this).closest('.portfolio-content-wrapper').attr("id").split("-")[1];
                            $('.portfolio-load-content-holder').addClass("viceversa");
                            $('#portfolio-grid, .more-posts-portfolio-holder').css('display', 'block');
                            setTimeout(function () {
                                $('#pcw-' + portfolioReturnItemID).removeClass('show');
                                $('.portfolio-load-content-holder').removeClass('viceversa show');
                                $('#portfolio-grid, .more-posts-portfolio-holder').removeClass('hide');
                                isotopeSetUp();
                            }, 300);
                            setTimeout(function () {
                                $('html, body').animate({scrollTop: $('#p-item-' + portfolioReturnItemID).offset().top - 150}, 400);
                            }, 500);
                        });
                    });
                }, 500);
            }
        });
        return false;
    }


    function loadMorePortfolioOnClick() {
        $('.more-posts-portfolio:visible').on('click', function () {
            count++;
            loadPortfolioMoreItems(count, portfolioPostsPerPage);
            $('.more-posts-portfolio').css('display', 'none');
            $('.more-posts-portfolio-loading').css('display', 'block');
        });
    }

    function loadPortfolioMoreItems(pageNumber, portfolioPostsPerPage) {
        $.ajax({
            url: ajax_var_portfolio.url,
            type: 'POST',
            data: "action=portfolio_ajax_load_more&portfolio_page_number=" + pageNumber + "&portfolio_posts_per_page=" + portfolioPostsPerPage + "&security=" + ajax_var_portfolio.nonce,
            success: function (html) {
                var $newItems = $(html);
                $('.grid').append($newItems);
                if ($(".section-title-holder.portfolio-title-fix-class").hasClass('it-is-bottom')) {
                    $('.section-wrapper').resize(fixTitleStickyPosition);
                }
                $('.grid').imagesLoaded(function () {
                    portfolioItemMargin();
                    $('.grid').isotope('appended', $newItems);
                    if (count == totalNumberOfPortfolioPages)
                    {
                        $('.more-posts-portfolio').css('display', 'none');
                        $('.more-posts-portfolio-loading').css('display', 'none');
                        $('.no-more-posts-portfolio').css('display', 'block');
                    } else
                    {
                        $('.more-posts-portfolio').css('display', 'block');
                        $('.more-posts-portfolio-loading').css('display', 'none');
                    }
                });

                portfolioItemContentLoadOnClick();
                setPrettyPhoto();
            }
        });
        return false;
    }

    function portfolioSectionAddTitleClass() {
        if ($("#portfolio-grid").length)
        {
            $("#portfolio-grid").parents('.section-wrapper').find(".section-title-holder").addClass('portfolio-title-fix-class');
        }
    }

    function fixTitleStickyPosition() {
        $('.section-title-holder').trigger("sticky_kit:recalc");
    }

    function setPortfolioWidth() {
        $('#portfolio-wrapper').width('auto');
        $('#portfolio-wrapper').width($('#portfolio-wrapper').width());
    }

    function portfolioItemMargin() {
        $('#portfolio-wrapper .grid-item').each(function () {
            $(this).css("margin", $(this).data('pmargin'));
        });
    }

    function coco2border() {
        $("*").imagesLoaded(function () {
            $('.coco-2border').each(function () {
                $(this).prepend('<span class="cocobasic-extra-border"></span>');
                $(this).find('.cocobasic-extra-border').css({"background-color": $(this).find('.elementor-column-wrap').first().css('border-color'), "margin-left": $(this).find('.elementor-column-wrap').first().css('margin-left')});
            });
        });
    }

    function cocoExtraWidth() {
        $("*").imagesLoaded(function () {
            $('.coco-extra-width').each(function () {
                $(this).prepend('<span class="cocobasic-extra-width"></span>');
                $(this).find('.cocobasic-extra-width').css("background-color", $(this).find('.elementor-column-wrap').first().css('background-color'));
            });
        });
    }

    function isFirstSectionFullScreen() {
        var fistSection = $('#content').find('.section').first();
        var fistElementorSection = $('#content').find('.elementor-section').first();
        if (fistSection.hasClass('full-screen')) {
            fistSection.addClass('fs-full-screen');
        }
        if (fistElementorSection.hasClass('elementor-section-height-full')) {
            fistElementorSection.addClass('fs-full-screen');
        }
    }

})(jQuery);

  