
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

    <div class="pay">
        <div class="checkout-header">
          <h1 class="checkout-title">
            Checkout Order
            <span class="checkout-price">$10</span>
          </h1>
        </div>
        <p>
          <input required type="text" class="checkout-input" placeholder="Your name"  name="name">
          <input required type="tel" name="tel" pattern="0([0-9]{2})([0-9]{7})" placeholder="Телефон в формате: 0(xx)-xxx-xx-xx" class="checkout-input">

          <textarea name="comment" placeholder="Комментарий к заказу" class="checkout-input"></textarea>

        </p>

        <p>
          <a href="#" class="checkout-btn dialog__pay">Pay Now</a>
        </p>


    </div>
</div> <!-- cart -->

<span class="Top"><i class="fa fa-chevron-up"></i></span>

<div id="footer">
    <p id='copy'>&copy; Shopaholic 2017<p>
</div>

<script id='cartItem' type='text/template'>
  <li class="cart-product">
      <span class="img"><input class="qty" value="1"></span>
      <span class="name"></span><a href="#" class="item-remove"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a><br />
      <span class="price"></span>
      <code class="subtotal"></code><br />
  </li>
</script>

<script src="<?php echo url::get_template_path();?>assets/js/jquery.min.js"></script>
<script src="<?php echo url::get_template_path();?>assets/js/shop.js"></script>

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

    $('body').on('click', '.product .add', function () {
        var items = $cart.children(), $item = $(this).parents('.product'), $template = $($('#cartItem').html()), $matched = null, quantity = 0;

        $matched = items.filter(function (index) {
            var $this = $(this);
            return $this.data('id') === $item.attr('data');
        });
        if ($matched.length) {
            quantity = +$matched.find('.qty').val() + 1;
            $matched.find('.qty').val(quantity);
            calculateSubtotal($matched);
        } else {
            $template.find('span.img').css('background-image', 'url(' + $item.find('img').attr('src') + ')');
            var p = parseFloat($item.find('.price b').text());

            $template.find('span.name').text($item.find('h3').text().substring(0,20));
            $template.find('.price').text("$"+$item.find('.price b').text());
            $template.find('.subtotal').text('$' + p);
            $template.data('id', $item.attr('data'));
            $template.data('price', p);
            $template.data('subtotal', p);
            $cart.append($template);
        }
        updateCartQuantity();
        calculateAndUpdate();
    });

    function calculateSubtotal($item) {
        var quantity = $item.find('.qty').val(),
        price = $item.data('price'),
        subtotal = quantity * price;

        $item.find('.subtotal').text('$' + subtotal);
        $item.data('subtotal', subtotal);
    }

    function calculateAndUpdate() {
        var subtotal = 0,
        items = $cart.children(),
        shipping = items.length > 0 ? 5 : 0,
        tax = 0;
        items.each(function (index, item) {
            var $item = $(item),
            price = $item.data('subtotal');
            subtotal += price;
        });
        $('.subtotalTotal').text(formatDollar(subtotal));
        tax = subtotal * 0.05;
        $('.taxes').text(formatDollar(tax));
        $('.shipping').text(formatDollar(shipping));
        $('.finalTotal').text(formatDollar(subtotal + tax + shipping));
    }

    function formatDollar(amount) {
        return '$' + parseFloat(Math.round(amount * 100) / 100).toFixed(2);
    }

    function updateCartQuantity() {
        var quantities = 0,
        $cartQuantity = $('span.cart-quantity'),
        items = $cart.children();

        items.each(function (index, item) {
            var $item = $(item),
            quantity = +$item.find('.qty').val();
            quantities += quantity;
        });

        if (quantities > 0) {
            $cartQuantity.removeClass('empty');
        } else {
            $cartQuantity.addClass('empty');
        }
        $cartQuantity.text(quantities);
    }

    $('body').on('click', '.cart-items .item-remove', function () {
        var $this = $(this),
        $item = $this.parents('li');
        $item.remove();
        calculateSubtotal($item);
        updateCartQuantity();
        calculateAndUpdate();
    });


    $('.dialog__trigger').on('click',function(){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'check',
            success: function(d) {
                if(d.r == "fail") {
                    window.location.href = d.url;
                } else {
                    console.log(d.msg);
                    $('.checkout-price').text($('.finalTotal').text());
                    $('.pay').slideToggle();
                }
            }
        });
    });

    $('.dialog__pay').on('click',function(){

        var items = $cart.children();
        var data = [];
        var its = new Object();

        items.each(function (index, item) {
            var $item = $(item);
            its.id = $item.data('id'),
            its.quantity = $item.find('.qty').val();
            data.push(its);
            console.log(its.id, its.quantity,data);
        });

        console.log(data); //
        var values = JSON.stringify(data);

        console.log(values); //
        $.ajax({
             type: 'POST',
             url: 'cart/index',
              dataType: 'json',
              data: 'val=' + values,
             success: function(data){
                console.log(data);
                $(location).attr('href', 'cart/index')
             }
        });
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
$('body').on('keypress', '.cart-items input', function (ev) {
    var keyCode = window.event ? ev.keyCode : ev.which;
    if (keyCode < 48 || keyCode > 57) {
        if (keyCode != 0 && keyCode != 8 && keyCode != 13 && !ev.ctrlKey) {
            ev.preventDefault();
        }
    }
});

$('body').on('blur', '.cart-items input', function () {
    var $this = $(this),
    $item = $this.parents('li');
    if (+$this.val() === 0) {
        $item.remove();
        calculateSubtotal($item);
        updateCartQuantity();
        calculateAndUpdate();
    } else {
        calculateSubtotal($item);
        updateCartQuantity();
        calculateAndUpdate();
    }
});

</script>
</body>
</html>
