$(document).ready(function() {
    if($('#summernote_custom').length) {
        $('#summernote_custom').summernote({
            maximumImageFileSize: 512000,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'strikethrough']],
                ['textcolor', ['fontsize', 'forecolor', 'backcolor']],
                ['para', ['ul', 'ol']],
                ['insert', ['picture', 'link', 'video']],
                ['misc', ['undo', 'redo', 'help']]
            ]
        });
    }
    $('.launch-spotify-modal').on('click', function() {
        $('#spotify_modal').addClass('is-active');
    });
    $('.spotify-modal-bg').on('click', function() {
        $('#spotify_modal').removeClass('is-active');
    });
    if($('.note-video-clip').length > 0) {
        $('.note-video-clip').wrap('<div class="blog-video-wrapper"></div>');
    }
    $('.close-modal-btn').on('click', function() {
        if($('.modal').hasClass('is-active')) {
            $('.modal').removeClass('is-active');

            $('.modal-newsletter-step-one').show();
            $('.modal-newsletter-step-two').hide();
            $('.modal-newsletter-step-three').hide();
            $('.modal-newsletter-form-errors')
                .html('We had trouble signing you up, please try again. If you still can\'t join us, let us know at <a href="mailTo:info@fearlessrecords.com">info@fearlessrecords.com</a>')
                .hide();
        }
    });
    $('.newsletter-link').on('click', function() {
        if($('.modal-newsletter').hasClass('is-active'))
            $('.modal-newsletter').removeClass('is-active');
        else
            $('.modal-newsletter').addClass('is-active');
    });
    $('.modal-newsletter-form').on('submit', function(e) {
        e.preventDefault();
    });

    $('.launch-share-buttons').on('click', function() {
        if($('.modal-share-buttons').hasClass('is-active'))
            $('.modal-share-buttons').removeClass('is-active');
        else
            $('.modal-share-buttons').addClass('is-active');
    });

    $('.launch-share-dialog').on('click', function() {
        event.preventDefault();

        var vPosition = Math.floor(($(window).width() - 520) / 2),
            hPosition = Math.floor(($(window).height() - 340) / 2);

        var url = $(this).attr('href');
        var popup = window.open(url, 'Social Share',
            'width='+520+',height='+340+
            ',left='+vPosition+',top='+hPosition+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            return false;
        }
    });

    $('.copy-to-clipboard').on('click', function() {
        let input = $('.for-clipboard');
        let value = input.val();
        input.select();
        document.execCommand('copy');
        $('.copy-to-clipboard-message').show();
    });

    $('.modal-newsletter-form button').on('click', function() {
        let step_one = $('.modal-newsletter-step-one');
        let step_two = $('.modal-newsletter-step-two');
        let step_three = $('.modal-newsletter-step-three');
        let error_msg = $('.modal-newsletter-form-errors');

        step_one.hide();
        step_two.show();
        error_msg.html('We had trouble signing you up, please try again. If you still can\'t join us, let us know at <a href="mailTo:info@fearlessrecords.com">info@fearlessrecords.com</a>');

        $.ajax({
            type: "POST",
            url: $(this).attr('data-route'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'first_name': $('.modal-newsletter-form #first_name').val(),
                'last_name': $('.modal-newsletter-form #last_name').val(),
                'email_address': $('.modal-newsletter-form #email_address').val()
            },
        }).done(function( msg ) {
            step_two.hide();
            step_three.show();
        }).fail(function(msg) {
            step_two.hide();
            step_one.show();

            if(msg.responseJSON) {
                let error_text = '';
                $.each(msg.responseJSON, function(idx, val) {
                    error_text += val[0] + '<br />';
                });

                error_msg.html(error_text);
            }
            error_msg.show();
        });
    });

    $('select#album_type').on('change', function(){
        if($(this).val() === 'instagram') {
            $('.reveal-hashtag').show();
        } else {
            $('.reveal-hashtag').hide();
        }
    });

    $('.banner-toggle-btn').on('click', function() {
        let id = $(this).attr('data-id');
        let banner_ad_label = $('#banner_ad_' + id + ' .switch-label');
        let btn = $('#banner_ad_' + id + ' .banner-toggle-btn');

        // reset all toggles
        $('.banner-toggle-btn').removeClass('is-active').html('<i class="fas fa-toggle-off"></i>').attr('disabled', true);
        // rest all labels
        $('.switch-label').html('Inactive');

        $.ajax({
            type: "POST",
            url: $(this).attr('data-route'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'id': id,
            },
        }).done(function( msg ) {
            $('.banner-toggle-btn').attr('disabled', false);

            banner_ad_label.html('Active');
            btn.html('<i class="fas fa-toggle-on"></i>').addClass('is-active').attr('disabled', true);
        }).fail(function(msg) {

        });
    });

    $('.close-voting-window-btn').on('click', function() {
        let btn = $(this);
        let list = $('.voting-window ul');

        if(list.hasClass('hide-list')) {
            list.removeClass('hide-list');
            btn.html('<i>hide&nbsp;<i class="fas fa-chevron-up fa-fw"></i>');
        } else {
            list.addClass('hide-list');
            btn.html('<i>show&nbsp;<i class="fas fa-chevron-down fa-fw"></i>');
        }
    });

    $('.voting-link').on('click', function() {
        let selected_item_id = $(this).attr('data-id');
        let selected_item = $('#voting-item-' + selected_item_id);

        if(!selected_item.hasClass('selected-band')) {
            let cover = $('.voting-module .voting-module-cover');
            let band_name = $(this).attr('data-band-name');

            cover.addClass('reveal-cover');
            let all_items = $('.voting-item');
            $.each(all_items, function(idx, item) {
                if(idx != selected_item_id)
                    item.remove();
            });
            selected_item.find('.voting-icon').remove();
            selected_item.find('.voting-label-results').show();
            selected_item.find('.voting-image').addClass('reposition');
            selected_item.addClass('selected-band');

            $.ajax({
                type: "POST",
                url: $(this).attr('data-route'),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'band_name': band_name
                },
            }).done(function( msg ) {
                setTimeout(function() {
                    cover.removeClass('reveal-cover');

                    $('.voting-headline h2').html('Thanks for voting!');
                    selected_item.find('.voting-band-name').html('You chose ' + band_name + '!');
                }, 1500);
            }).fail(function(msg) {
                console.log(msg.responseText);
            });
        }
    });

    if($("#sortable").length) {
        $("#sortable").sortable({
            stop: function(event, ui) {
                let sorted = $(this).sortable('toArray').toString();
                console.log(sorted);
                $.ajax({
                    type: "POST",
                    url: $('#ajax-sort-url').attr('data-route'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="sort-csrf-token"]').attr('content')
                    },
                    data: {
                        'sorted_items': sorted
                    },
                }).done(function( msg ) {
                    console.log(msg);
                }).fail(function(msg) {
                    console.log(msg.responseText);
                });
            }
        });
    }

    if($('.track-character-count').length) {
        $('.track-character-count').keyup(function(){
            let id = $(this).attr('id');
            if(id == 'smoke_/_drink')
                id = 'smoke_drink';

            let char_count = $(this).val().length;
            $('#' + id + '_character_count span').html(char_count);
        });
    }

    if($('.mood-selector').length) {
        $('.mood-selector').change(function() {
            let emoji = $(this).val();
            let img = $('.dynamic-emoji');
            let route = img.attr('data-route');

            img.attr('src', route.replace('%%', emoji));
        });
    }

    if($('.top-12-artist').length) {
        let total_selected = 0;

        $('.top-12-artist').on('click', function() {
            // first check how many are selected
            let selected = $('.top-12-artist.is-selected').length;
            console.log(selected);

            let id = $(this).attr('data-id');

            if($(this).hasClass('is-selected')) {
                $(this).removeClass('is-selected');
                $(this).find('.top-12-input').val('');
            } else {
                if(selected < 12) {
                    $(this).addClass('is-selected');
                    $(this).find('.top-12-input').val(id);
                }
            }
        });
    }

    if($('#profile_image_preview').length) {
        $('input#custom_profile_image').change(function() {
            let image = document.getElementById('profile_image_preview');
            let input = document.getElementById('custom_profile_image');

            if(input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    image.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    }
});