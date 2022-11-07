(function ($) {

    "use stict";
    var custom_uploader;
    var custom_uploader2;
    var select_control;            
    

    checkPreviewBackground();
    setPreviewBackgroundOnLoad();

    $(window).on('load', function () {

        if ($('.block-editor-page').length)
        {
            select_control = $('#inspector-select-control-0');
        } else {
            select_control = $('#page_template');
        }

        switch ($(select_control).val()) {
            case 'onepage.php':
                $('#cocobasic_page_custom_meta_box').hide();
                break;
            case 'default':
                $('.page_title_position, .page_background_img_title, .page_background_color_title, .page_padding, .page_top_img').hide();
                break;
            case '':
                $('.page_title_position, .page_background_img_title, .page_background_color_title, .page_padding, .page_top_img').hide();
                break;
            case 'page-split.php':
                $('.page_full_screen, .page_background_img, .page_img_position, .page_img_repeat, .page_img_size').hide();
                break;
            case 'elementor_header_footer':
                $('.page_title_position, .page_background_img_title, .page_background_color_title, .page_padding, .page_top_img, .page_show_title, .page_custom_title, .page_color_title, .page_description, .page_color_description, .page_full_screen').hide();
                break;
            case 'elementor_canvas':
                $('.page_title_position, .page_background_img_title, .page_background_color_title, .page_padding, .page_top_img, .page_show_title, .page_custom_title, .page_color_title, .page_description, .page_color_description, .page_full_screen').hide();
                break;
        }


        $(select_control).on('change', function () {            
            switch (this.value) {                
                case 'onepage.php':
                    $('#cocobasic_page_custom_meta_box').hide();
                    break;
                case 'default':
                    $('#cocobasic_page_custom_meta_box').show();
                    $('.page_title_position, .page_background_img_title, .page_background_color_title, .page_padding, .page_top_img').hide();
                    $('.page_full_screen, .page_background_img, .page_img_position, .page_img_repeat, .page_img_size, .page_show_title, .page_custom_title, .page_color_title, .page_description, .page_color_description, .page_full_screen').show();
                    break;
                case '':
                    $('#cocobasic_page_custom_meta_box').show();
                    $('.page_title_position, .page_background_img_title, .page_background_color_title, .page_padding, .page_top_img').hide();
                    $('.page_full_screen, .page_background_img, .page_img_position, .page_img_repeat, .page_img_size, .page_show_title, .page_custom_title, .page_color_title, .page_description, .page_color_description, .page_full_screen').show();
                    break;
                case 'page-split.php':
                    $('#cocobasic_page_custom_meta_box').show();
                    $('.page_title_position, .page_background_img_title, .page_background_color_title, .page_padding, .page_top_img, .page_show_title, .page_custom_title, .page_color_title, .page_description, .page_color_description, .page_full_screen').show();
                    $('.page_full_screen, .page_background_img, .page_img_position, .page_img_repeat, .page_img_size').hide();
                    break;
                case 'elementor_header_footer':
                    $('#cocobasic_page_custom_meta_box').show();
                    $('.page_background_img, .page_img_position, .page_img_repeat, .page_img_size').show();
                    $('.page_title_position, .page_background_img_title, .page_background_color_title, .page_padding, .page_top_img, .page_show_title, .page_custom_title, .page_color_title, .page_description, .page_color_description, .page_full_screen').hide();
                    break;
                case 'elementor_canvas':
                    $('#cocobasic_page_custom_meta_box').show();
                    $('.page_background_img, .page_img_position, .page_img_repeat, .page_img_size').show();
                    $('.page_title_position, .page_background_img_title, .page_background_color_title, .page_padding, .page_top_img, .page_show_title, .page_custom_title, .page_color_title, .page_description, .page_color_description, .page_full_screen').hide();
                    break;
                default :
                    $('#cocobasic_page_custom_meta_box').hide();
            }
        });


        $('#upload_image_button').on('click', function (e) {
            var return_field = $(this).prev();
            e.preventDefault();
            //If the uploader object has already been created, reopen the dialog
            if (custom_uploader) {
                custom_uploader.open();
                return;
            }

            //Extend the wp.media object
            custom_uploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });
            //When a file is selected, grab the URL and set it as the text field's value
            custom_uploader.on('select', function () {
                attachment = custom_uploader.state().get('selection').first().toJSON();
                $(return_field).val(attachment.url);

                var imgcheck = attachment.url.width;
                if (imgcheck !== 0) {
                    $('#small-background-image-preview').css('background-image', 'url(' + attachment.url + ')').addClass('has-background');
                }

            });
            //Open the uploader dialog
            custom_uploader.open();
        });
        $('#upload_image_button2').click(function (e) {

            var return_field = $(this).prev();
            e.preventDefault();
            //If the uploader object has already been created, reopen the dialog
            if (custom_uploader2) {
                custom_uploader2.open();
                return;
            }

            //Extend the wp.media object
            custom_uploader2 = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });
            //When a file is selected, grab the URL and set it as the text field's value
            custom_uploader2.on('select', function () {
                attachment = custom_uploader2.state().get('selection').first().toJSON();
                $(return_field).val(attachment.url);

                var imgcheck = attachment.url.width;
                if (imgcheck !== 0) {
                    $('#small-background-image-preview2').css('background-image', 'url(' + attachment.url + ')').addClass('has-background');
                }

            });
            //Open the uploader dialog
            custom_uploader2.open();
        });


        if ($().ColorPicker) {
            doColors();
        }

    });
    var doColors = function ()
    {

        var pageTitleColor = $('#colorPageColorTitle').next('input').first().attr('value');
        var pageDescriptionColor = $('#colorPageColorDescription').next('input').first().attr('value');
        var pageBackgroundColor = $('#colorPageBackgroundColor').next('input').first().attr('value');
        var pageTitleBackgroundColor = $('#colorPageTitleBackgroundColor').next('input').first().attr('value');

        if (pageTitleColor == '') {
            pageTitleColor = '#ffffff';
        }
        if (pageDescriptionColor == '') {
            pageDescriptionColor = '#ffffff';
        }
        if (pageBackgroundColor == '') {
            pageBackgroundColor = '#1E1E1E';
        }
        if (pageTitleBackgroundColor == '') {
            pageTitleBackgroundColor = '#f1576b';
        }

        $('#colorPageColorTitle').find('div').first().css('background-color', pageTitleColor);
        $('#colorPageColorDescription').find('div').first().css('background-color', pageDescriptionColor);
        $('#colorPageBackgroundColor').find('div').first().css('background-color', pageBackgroundColor);
        $('#colorPageTitleBackgroundColor').find('div').first().css('background-color', pageTitleBackgroundColor);

        $('#colorPageColorTitle').ColorPicker({
            color: pageTitleColor,
            onShow: function (colpkr) {
                $(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                $(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                $('#colorPageColorTitle div').css('backgroundColor', '#' + hex);
                $('#colorPageColorTitle').next('input').first().attr('value', '#' + hex);
            }
        });

        $('#colorPageColorDescription').ColorPicker({
            color: pageDescriptionColor,
            onShow: function (colpkr) {
                $(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                $(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                $('#colorPageColorDescription div').css('backgroundColor', '#' + hex);
                $('#colorPageColorDescription').next('input').first().attr('value', '#' + hex);
            }
        });

        $('#colorPageBackgroundColor').ColorPicker({
            color: pageBackgroundColor,
            onShow: function (colpkr) {
                $(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                $(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                $('#colorPageBackgroundColor div').css('backgroundColor', '#' + hex);
                $('#colorPageBackgroundColor').next('input').first().attr('value', '#' + hex);
            }
        });

        $('#colorPageTitleBackgroundColor').ColorPicker({
            color: pageTitleBackgroundColor,
            onShow: function (colpkr) {
                $(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                $(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                $('#colorPageTitleBackgroundColor div').css('backgroundColor', '#' + hex);
                $('#colorPageTitleBackgroundColor').next('input').first().attr('value', '#' + hex);
            }
        });
    };

    function setPreviewBackgroundOnLoad() {
        $('.image-url-input').each(function () {
            if ($(this).val() !== '') {
                $(this).nextAll('#small-background-image-preview:first').css('background-image', 'url(' + $(this).val() + ')');
                $(this).nextAll('#small-background-image-preview2:first').css('background-image', 'url(' + $(this).val() + ')');
            } else {
                $(this).nextAll('#small-background-image-preview:first').removeClass('has-background');
                $(this).nextAll('#small-background-image-preview2:first').removeClass('has-background');
            }
        });
    }

    function checkPreviewBackground() {
        $('.image-url-input').on('change', function () {
            if ($(this).val() === '') {
                $(this).nextAll('#small-background-image-preview:first').css('background-image', 'none').removeClass('has-background');
                $(this).nextAll('#small-background-image-preview2:first').css('background-image', 'none').removeClass('has-background');
            }
        });
    }        
    
})(jQuery);