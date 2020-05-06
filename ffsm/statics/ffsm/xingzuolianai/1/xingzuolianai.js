$(function () {
    // 性别
    var sex_down = $('.J_sex_up');
    var bg = $('#bgDiv');
    var upNav = $('#upNav');
    sex_down.on('click', function () {
        $(this).parents('ul').addClass("current");
        // alert(1);
        bg.css({
            display: "block",
            transition: "opacity .5s"
        });
        upNav.css({
            top: "0px",
            transition: "top .5s"
        });
        $('#upNav span').on('click', function () {
            hideNav();
            var value = $(this).data('value');
            $(".public_form_wrap .current .J_sex").find("em").text($(this).html())
            .parents('.J_sex').find('input').val(value)
            .parents('ul').removeClass("current");
        });
    });

    bg.on('click', function () {
        hideNav();
    });

    function hideNav() {
        
        upNav.css({
            top: "-40%",
            transition: "top .5s"
        });
        bg.css({
            display: "none",
            transition: "display 1s"
        });
    } 
});


