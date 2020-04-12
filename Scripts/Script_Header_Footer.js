$(function () {
    //To add moseover lines below links
    $(".link").mouseover(function () {
        $(this).addClass("underline");
    })

    $(".link").mouseleave(function () {
        $(this).removeClass("underline");
    })
})
