/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
__webpack_require__(2);
module.exports = __webpack_require__(3);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

$(document).ready(function () {
    $('#summernote_custom').summernote({
        maximumImageFileSize: 512000,
        toolbar: [['style', ['bold', 'italic', 'underline', 'strikethrough']], ['textcolor', ['fontsize', 'forecolor', 'backcolor']], ['para', ['ul', 'ol']], ['insert', ['picture', 'link', 'video']], ['misc', ['undo', 'redo', 'help']]]
    });
    $('.launch-spotify-modal').on('click', function () {
        $('#spotify_modal').addClass('is-active');
    });
    $('.spotify-modal-bg').on('click', function () {
        $('#spotify_modal').removeClass('is-active');
    });
    if ($('.note-video-clip').length > 0) {
        $('.note-video-clip').wrap('<div class="blog-video-wrapper"></div>');
    }
    $('.close-modal-btn').on('click', function () {
        if ($('.modal').hasClass('is-active')) {
            $('.modal').removeClass('is-active');

            $('.modal-newsletter-step-one').show();
            $('.modal-newsletter-step-two').hide();
            $('.modal-newsletter-step-three').hide();
            $('.modal-newsletter-form-errors').html('We had trouble signing you up, please try again. If you still can\'t join us, let us know at <a href="mailTo:info@fearlessrecords.com">info@fearlessrecords.com</a>').hide();
        }
    });
    $('.newsletter-link').on('click', function () {
        if ($('.modal-newsletter').hasClass('is-active')) $('.modal-newsletter').removeClass('is-active');else $('.modal-newsletter').addClass('is-active');
    });
    $('.modal-newsletter-form').on('submit', function (e) {
        e.preventDefault();
    });

    $('.launch-share-buttons').on('click', function () {
        if ($('.modal-share-buttons').hasClass('is-active')) $('.modal-share-buttons').removeClass('is-active');else $('.modal-share-buttons').addClass('is-active');
    });

    $('.launch-share-dialog').on('click', function () {
        event.preventDefault();

        var vPosition = Math.floor(($(window).width() - 520) / 2),
            hPosition = Math.floor(($(window).height() - 340) / 2);

        var url = $(this).attr('href');
        var popup = window.open(url, 'Social Share', 'width=' + 520 + ',height=' + 340 + ',left=' + vPosition + ',top=' + hPosition + ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            return false;
        }
    });

    $('.copy-to-clipboard').on('click', function () {
        var input = $('.for-clipboard');
        var value = input.val();
        input.select();
        document.execCommand('copy');
        $('.copy-to-clipboard-message').show();
    });

    $('.modal-newsletter-form button').on('click', function () {
        var step_one = $('.modal-newsletter-step-one');
        var step_two = $('.modal-newsletter-step-two');
        var step_three = $('.modal-newsletter-step-three');
        var error_msg = $('.modal-newsletter-form-errors');

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
            }
        }).done(function (msg) {
            step_two.hide();
            step_three.show();
        }).fail(function (msg) {
            step_two.hide();
            step_one.show();

            if (msg.responseJSON) {
                var error_text = '';
                $.each(msg.responseJSON, function (idx, val) {
                    error_text += val[0] + '<br />';
                });

                error_msg.html(error_text);
            }
            error_msg.show();
        });
    });

    $('select#album_type').on('change', function () {
        if ($(this).val() === 'instagram') {
            $('.reveal-hashtag').show();
        } else {
            $('.reveal-hashtag').hide();
        }
    });

    $('.banner-toggle-btn').on('click', function () {
        var id = $(this).attr('data-id');
        var banner_ad_label = $('#banner_ad_' + id + ' .switch-label');
        var btn = $('#banner_ad_' + id + ' .banner-toggle-btn');

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
                'id': id
            }
        }).done(function (msg) {
            $('.banner-toggle-btn').attr('disabled', false);

            banner_ad_label.html('Active');
            btn.html('<i class="fas fa-toggle-on"></i>').addClass('is-active').attr('disabled', true);
        }).fail(function (msg) {});
    });

    $('.close-voting-window-btn').on('click', function () {
        var btn = $(this);
        var list = $('.voting-window ul');

        if (list.hasClass('hide-list')) {
            list.removeClass('hide-list');
            btn.html('<i>hide&nbsp;<i class="fas fa-chevron-up fa-fw"></i>');
        } else {
            list.addClass('hide-list');
            btn.html('<i>show&nbsp;<i class="fas fa-chevron-down fa-fw"></i>');
        }
    });

    $('.voting-link').on('click', function () {
        var selected_item_id = $(this).attr('data-id');
        var selected_item = $('#voting-item-' + selected_item_id);

        if (!selected_item.hasClass('selected-band')) {
            var cover = $('.voting-module .voting-module-cover');
            var band_name = $(this).attr('data-band-name');

            cover.addClass('reveal-cover');
            var all_items = $('.voting-item');
            $.each(all_items, function (idx, item) {
                if (idx != selected_item_id) item.remove();
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
                }
            }).done(function (msg) {
                setTimeout(function () {
                    cover.removeClass('reveal-cover');

                    $('.voting-headline h2').html('Thanks for voting!');
                    selected_item.find('.voting-band-name').html('You chose ' + band_name + '!');
                }, 1500);
            }).fail(function (msg) {
                console.log(msg.responseText);
            });
        }
    });

    if ($("#sortable").length) {
        alert('yes');
        $("#sortable").sortable({
            stop: function stop(event, ui) {
                var sorted = $(this).sortable('toArray').toString();
                console.log(sorted);
                $.ajax({
                    type: "POST",
                    url: $('#ajax-sort-url').attr('data-route'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="sort-csrf-token"]').attr('content')
                    },
                    data: {
                        'sorted_items': sorted
                    }
                }).done(function (msg) {
                    console.log(msg);
                }).fail(function (msg) {
                    console.log(msg.responseText);
                });
            }
        });
    }
});

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 3 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);