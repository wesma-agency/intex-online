// uis cache bhr
var cacheInterval;

function cacheCreate() {
    clearTimeout(cacheInterval);
    if (typeof Comagic !== 'undefined') {
        let vid = Comagic.getVisitorId();
        $('#uis-code-cache').val(vid);
        $.ajax({
            url: "https://intex-online.ru/.uiscache.php",
            cache: false,
            type: "get",
            dataType: "html",
            data: {
                'vid': vid
            }
        });
    } else {
        cacheInterval = setTimeout(function () {
            cacheCreate();
        }, 1000);
    }
}

if ($("#uis-code-cache").val() === '') {
    console.log('cache requested');
    cacheInterval = setTimeout(function () {
        cacheCreate();
    }, 1000);
} else {
    console.log('cache enabled');
}