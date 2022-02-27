// =========================================
// global navigation
// =========================================
$(function () {
    $event = $(".l-header2__nav li");
    $event.on("click", function () {
        $target = $(this).children(".c-nav1");
        if ($target.hasClass("is-active")) {
            $target.removeClass("is-active");
        } else {
            $event.children(".c-nav1").removeClass("is-active");
            $target.addClass("is-active");
        }
    });
});

