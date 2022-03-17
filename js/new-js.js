$(document).ready(function () {

$.each($(".js-mobile-menu > li"), function (index, val) {
    if (!$(this).hasClass("--not-move")) {
        let clone = $(val).clone();
        $("#menu > ul").append(clone);
    }
});

// let arrLinkSocial = [];

// $.each($(".footer-contact__list-social"), function (index, val) {
//     let clone = $(val).clone();
//     arrLinkSocial.push(clone[0]);
// });

$("#menu").mmenu({
    extensions: ["pagedim-black", "position-left"],
    navbar: { title: "????" },
    // navbars: [
    //     {
    //         position: "bottom",
    //         // content: arrLinkSocial,
    //     },
    // ],
});

var $menu = $("#menu");
var $icon = $(".mobile-menu");
var API = $menu.data("mmenu");

function openMenu() {
    API.open();
}

function closeMenu() {
    API.close();
}
$icon.on("click", openMenu);
API.bind("open:finish", function () {
    $icon.addClass("is-active");
    $("html").addClass("lock");
});
API.bind("close:finish", function () {
    $icon.removeClass("is-active");
    $("html").removeClass("lock");
});
});