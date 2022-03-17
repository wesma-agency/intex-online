function changePhone() {

    var phone = '(495) 104-57-93',
        cookie = get_cookie('phone');

    if (cookie == 1) {
        phone = '(495) 104-57-91';
    }
    else if (cookie == 2) {
        phone = '(495) 104-57-93';
    }
    else if (cookie == 3) {
        phone = '(800) 100-07-62';
    }
    else if (cookie == 4) {
        phone = '(495) 104-57-92';
    }
    else if (cookie == 5) {
        phone = '(800) 100-07-95';
    }
    else if (cookie == 6) {
        phone = '(495) 104-58-16';
    }
    else if (cookie == 7) {
        phone = '(812) 385-63-48';
    }
    else if (cookie == 8) {
        phone = '(495) 104-57-93';
    }
    else if (cookie == 9) {
        phone = '(495) 104-58-14';
    }
    else if (cookie == 10) {
        phone = '(495) 104-58-13';
    }
    else if (cookie == 11) {
        phone = '(495) 104-57-94';
    }
    else if (cookie == 12) {
        phone = '(495) 104-57-96';
    }
    else if (cookie == 13) {
        phone = '(495) 104-57-98';
    }
    else if (cookie == 14) {
        phone = '(495) 104-58-12';
    }
    else if (cookie == 15) {
        phone = '(495) 255-25-03';
    }
    else if (cookie == 16) {
        phone = '(495) 104-57-93';
    }
    else if (cookie == 17) {
        phone = '(495) 135-24-59';
    }

    var tel = phone.replace(/[^0-9]/g,'');
    $('.na-phone').html(phone).attr('href','tel:+'+tel).show();
}

function get_cookie(cookie_name) {

    var results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');

    if (results)
        return ( unescape(results[2]) );
    else
        return null;
}

function ym_goal(g) {
    console.log('ym_'+g);
    if (typeof yaCounter47330 !== 'undefined') {
        yaCounter47330.reachGoal(g);
        
    }
}    

function ga_goal(g) {
    console.log('ga_'+g);
    gtag('event', 'send', {
        'event_category': g
    });
}

function send_combo(y,g){
    if (y) ym_goal(y);
    if (g) ga_goal(g);
}