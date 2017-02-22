
</main>
<div id="shadow-layer"></div>

<div id="cart">
    <h2>Cart</h2>
    <ul class="cart-items">
    </ul> <!-- cart-items -->

    <div class="cart-total">
        <p>Subtotal <span class="subtotalTotal">$0.00</span></p>
        <p>Tax <span class="taxes">$0.00</span></p>
        <p>Shipping <span class="shipping">$0.00</span></p>
        <p>Total <span class="finalTotal">$0.00</span></p>
    </div> <!--cart-total -->

    <a href="#" class="checkout-btn dialog__trigger">Checkout</a>
    <p class="error"></p>
    <p class="go-to-cart"><a href="#">Go to cart page</a></p>
</div> <!-- cart -->

<span class="Top"><i class="fa fa-chevron-up"></i></span>

<div id="footer">
    <p id='copy'>&copy; Shopaholic 2017<p>
</div>
<script src="<?php echo url::get_template_path();?>assets/js/jquery.min.js"></script>

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

    $('.drop-down').on('click', function () {
        $('.mega-menu').toggleClass('mega_show');
    });

    $('#close-menu').on('click', function () {
        $('.mega-menu').removeClass('mega_show');
    });

    $('.form').find('input, textarea').on('keyup blur focus', function (e) {
        var $this = $(this), label = $this.prev('label');
        if (e.type === 'keyup') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.removeClass('highlight');
            }
        } else if (e.type === 'focus') {
            if ($this.val() === '') {
                label.removeClass('highlight');
            } else if ($this.val() !== '') {
                label.addClass('highlight');
            }
        }
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
