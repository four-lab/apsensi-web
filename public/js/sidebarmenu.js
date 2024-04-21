$(function () {
    const path = window.location.pathname;

    $("#sidebarnav a").on("click", function (e) {
        if (!$(this).hasClass("active")) {
            // hide any open menus and remove all other classes
            $("ul", $(this).parents("ul:first")).removeClass("in");
            $("a", $(this).parents("ul:first")).removeClass("active");

            // open our new menu and add the open class
            $(this).next("ul").addClass("in");
            $(this).addClass("active");
        } else if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).parents("ul:first").removeClass("active");
            $(this).next("ul").removeClass("in");
        }
    });

    $("#sidebarnav >li >a.has-arrow").on("click", function (e) {
        e.preventDefault();
    });

    $('.sidebar-link').each((i, link) => {
        link = $(link);

        const activeState = link.data('active');
        const regexPattern = activeState == undefined ? '' : activeState.replace(/\*/g, '.*');
        const regex = new RegExp('^' + regexPattern + '$');

        if (regex.test(path)) {
            link.addClass('active');
        }
    });
});
