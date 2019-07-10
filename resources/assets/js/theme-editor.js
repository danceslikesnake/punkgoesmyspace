$(document).ready(function(){
    /**
     * TABS
     */
    $('.options-tabs li').on('click', function() {
        $('.options-tabs li').removeClass('active-tab');
        $(this).addClass('active-tab');

        let id = $(this).attr('id');
        $('.options-group').hide();
        $('#option_set_' + id).show();
    });

    /**
     * SPECTRUM COLOIR PICKERS
     */
    $(".basic-spectrum-picker").spectrum({
        showAlpha: false,
        change: function(color) {
            let new_color = color.toHexString();
            handle_general_color_picking($(this), new_color, 'fill');
        }
    });

    $("#content_bg_color").spectrum({
        showAlpha: true,
        change: function(color) {
            let new_color = color.toRgbString();
            handle_general_color_picking($(this), new_color, 'background');
        }
    });

    $('#header_bg_color').spectrum({
        showAlpha: true,
        change: function(color) {
            let new_color = color.toRgbString();
            handle_general_color_picking($(this), new_color, 'fill');
        }
    });

    $('#header_scrim_color').spectrum({
        change: function(color) {
            let new_color = color.toHexString();
            handle_general_color_picking($(this), new_color);

            $('#linearGradient-1 stop').css('stop-color', new_color);
        }
    });

    $('#left_module_table_base_color').spectrum({
        change: function(color) {
            let new_color = color.toHexString();
            handle_general_color_picking($(this), new_color, 'fill');

            // also fill in borders
            let editable_name = 'editable-' + $(this).attr('id').replace(/_/g, '-');
            $('#editable-left-module-table-base-color').css('stroke', new_color);
        }
    });

    $("#main_bg_color").spectrum({
        change: function(color) {
            let new_color = color.toHexString();
            $(this).next().next().html(new_color);

            $('#editable-main-bg').css('background-color', new_color);
            $(this).val(new_color);
        }
    });

    $('#main_bg_image').change(function(){
        let bg_image = document.getElementById('main_bg_image');
        let editable_bg = document.getElementById('editable-main-bg');

        if(bg_image.files && bg_image.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
               editable_bg.style.backgroundImage = 'url(' + e.target.result + ')';

               if($('#main_bg_fill').attr('disabled'))
                   $('#main_bg_fill').attr('disabled', false);

               if($('#main_bg_position').attr('disabled'))
                   $('#main_bg_position').attr('disabled', false)

                if($('#main_bg_fixed').attr('disabled'))
                    $('#main_bg_fixed').attr('disabled', false)
            };
            reader.readAsDataURL(bg_image.files[0]);
        } else {
            $('#main_bg_fill, #main_bg_position, #main_bg_fixed').attr('disabled', true);
            $('#main_bg_fill').val('cover');
            $('#main_bg_position').val('top left');
            $('#main_bg_fixed').val('scroll');
        }
    });

    $('#main_bg_fill').change(function(){
        let fill = $(this).val();
        let bg = $('#editable-main-bg');

        switch(fill) {
            case 'tile':
                bg.css('background-size', '47%');
                bg.css('background-repeat', 'repeat');
            case 'cover':
                bg.css('background-size', fill);
                bg.css('background-size', 'no-repeat');
                break;
            case 'contain':
                bg.css('background-size', fill);
                bg.css('background-size', 'no-repeat');
                break;
        }
    });

    $('#main_bg_position').change(function(){
        let position = $(this).val();
        let bg = $('#editable-main-bg');
        bg.css('background-position', position);
    });
});

function handle_general_color_picking(el, color, preview_type) {
    el.next().next().html(color); // set label;
    el.val(color); // set input color

    if(preview_type) {
        let editable_name = 'editable-' + el.attr('id').replace(/_/g, '-');
        $('#' + editable_name).css(preview_type, color); // change editable preview
    }
}
