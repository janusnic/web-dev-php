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


var products = {
        "0": {
            "name": "Bow Tie",
            "description":  "These coasters roll all of the greatest qualities into one: class, leather, and octocats.",
            "price": 18,
            "oldprice": 20,
            "picture": "images/2.jpg",
            "quantity": 10,
            "category": "Ties"
        },
        "1": {
            "name": "Suit",
            "description":  "These coasters roll all of the greatest qualities into one: class, leather, and octocats.",
            "price": 38,
            "oldprice": 40,
            "picture": "images/1.jpg",
            "quantity": 10,
            "category": "Suits"
        },
        "2": {
            "name": "Suit",
            "description": "The mug you've been dreaming about. One sip from this ceramic 16oz fluid delivery system and you'll never go back to red cups.",
            "price": 38,
            "oldprice": 40,
            "picture": "images/1.jpg",
            "quantity": 10,
            "category": "Suits"
        },
        "3": {
            "name": "Bow tie",
            "description": "These coasters roll all of the greatest qualities into one: class, leather, and octocats. They also happen to protect surfaces from cold drinks.",
            "price": 38,
            "oldprice": 40,
            "picture": "images/2.jpg",
            "quantity": 10,
            "category": "Suits"
        },
        "4": {
            "name": 'Sweater',
            "description": "Set of two heavyweight 16 oz. Octopint glasses for your favorite malty beverage.",
            "price": 38,
            "oldprice": 40,
            "picture": "images/3.jpg",
            "quantity": 10,
            "category": "Suits"
        },
        "5": {
            "name": "Hat",
            "description": "Check it. Blacktocat is back with a whole new direction. He's exited stealth mode and is ready for primetime, now with a stylish logo.",
            "price": 38,
            "oldprice": 40,
            "picture": "images/4.jpg",
            "quantity": 10,
            "category": "Suits"
        },
        "6": {
            "name": "Shoes",
            "description": 'Need a huge Octocat sticker for your laptop, fridge, snowboard, or ceiling fan? Look no further!',
            "price": 38,
            "oldprice": 40,
            "picture": "images/5.jpg",
            "quantity": 10,
            "category": "Suits"
        },
        "7": {
            "name": "Glasses",
            "description": "Pixels are your friends. Show your bits in this super-comfy blue American Apparel tri-blend shirt with a pixelated version of your favorite aquatic feline",
            "price": 38,
            "oldprice": 40,
            "picture": "images/6.jpg",
            "quantity": 10,
            "category": "Suits"
        },
        "8": {
            "name": "Suit",
            "description": "The mug you\'ve been dreaming about. One sip from this ceramic 16oz fluid delivery system and you\'ll never go back to red cups.",
            "price": 38,
            "oldprice": 40,
            "picture": "images/1.jpg",
            "quantity": 10,
            "category": "Suits"
        },
        "9": {
            "name": "Bow tie",
            "description": "These coasters roll all of the greatest qualities into one: class, leather, and octocats. They also happen to protect surfaces from cold drinks.",
            "price": 38,
            "oldprice": 40,
            "picture": "images/2.jpg",
            "quantity": 10,
            "category": "Suits"
        },
        "10": {
            "name": 'Sweater',
            "description": "Set of two heavyweight 16 oz. Octopint glasses for your favorite malty beverage.",
            "price": 38,
            "oldprice": 40,
            "picture": "images/3.jpg",
            "quantity": 10,
            "category": "Suits"
        },
        "11": {
            "name": "Hat",
            "description": "Check it. Blacktocat is back with a whole new direction. He's exited stealth mode and is ready for primetime, now with a stylish logo.",
            "price": 38,
            "oldprice": 40,
            "picture": "images/4.jpg",
            "quantity": 10,
            "category": "Suits"
        },
        "12": {
            "name": "Shoes",
            "description": "Need a huge Octocat sticker for your laptop, fridge, snowboard, or ceiling fan? Look no further!",
            "price": 38,
            "oldprice": 40,
            "picture": "images/5.jpg",
            "quantity": 10,
            "category": "Suits"
        },
        "13": {
            "name": "Glasses",
            "description": "Pixels are your friends. Show your bits in this super-comfy blue American Apparel tri-blend shirt with a pixelated version of your favorite aquatic feline",
            "price": 38,
            "oldprice": 40,
            "picture": "images/6.jpg",
            "quantity": 10,
            "category": "Suits"
        }
    };

    var Accordion = function (el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;
        var links = this.el.find('.link');
        links.on('click', {
            el: this.el,
            multiple: this.multiple
        }, this.dropdown);
    };

    Accordion.prototype.dropdown = function (e) {
        var $el = e.data.el;
        $this = $(this),
        $next = $this.next();
        $next.slideToggle();
        $this.parent().toggleClass('open');
        if (!e.data.multiple) {
            $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
        }
    };
