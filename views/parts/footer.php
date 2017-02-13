
    <div id="footer">
        <p id='copy'>&copy; Shopaholic 2017<p>
    </div>
    <script src="<?php ROOT?>/assets/js/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function () {

        var $cart = $('.cart-items');
        var menu_navigation = $('#main-nav'),
              $L = 900,
              cart_trigger = $('#cart-trigger'),
              hamburger_icon = $('#hamburger-menu'),
              cart = $('#cart'),
              shadow_layer = $('#shadow-layer');

        cart_trigger.on('click', function () {
            menu_navigation.removeClass('speed-in');
            toggle_panel_visibility(cart, shadow_layer, $('body'));
        });

        shadow_layer.on('click', function () {
            cart.removeClass('speed-in');
            menu_navigation.removeClass('speed-in');
            shadow_layer.removeClass('is-visible');
            $('body').removeClass('overflow-hidden');
        });

        hamburger_icon.on('click', function () {
            cart.removeClass('speed-in');
            toggle_panel_visibility(menu_navigation, shadow_layer, $('body'));
        });

        move_navigation(menu_navigation, $L);

        $(window).on('resize', function () {
            move_navigation(menu_navigation, $L);
            if ($(window).width() >= $L && menu_navigation.hasClass('speed-in')) {
                menu_navigation.removeClass('speed-in');
                shadow_layer.removeClass('is-visible');
                $('body').removeClass('overflow-hidden');
            }
        });

        $(window).scroll(function () {
            if ($(this).scrollTop() >= 500) {
                $('.Top').fadeIn();
            } else {
                $('.Top').fadeOut();
            }
        });
        $('.Top').click(function () {
            $('html,body').stop().animate({ scrollTop: 0 });
        });

    });
    function toggle_panel_visibility(panel, background_layer, body) {
        if (panel.hasClass('speed-in')) {
            panel.removeClass('speed-in');
            background_layer.removeClass('is-visible');
            body.removeClass('overflow-hidden');
        } else {
            panel.addClass('speed-in');
            background_layer.addClass('is-visible');
            body.addClass('overflow-hidden');
        }
    }

    function move_navigation(navigation, $MQ) {
        if ($(window).width() >= $MQ) {
            navigation.detach();
            navigation.appendTo('header');
        } else {
            navigation.detach();
            navigation.insertAfter('header');
        }
    }

    </script>
    </body>
    </html>
