window.onload = function () {

    // var link = document.getElementsByClassName("link");
    //
    // link.addEventListener("mouseenter",function (event) {
    //     event.css.add("")

    // })

    $(".link").mouseover(function () {
        $(this).addClass("underline");
    })

    $(".link").mouseleave(function () {
        $(this).removeClass("underline");
    })

    var password = document.getElementById("Password")
        , confirm_password = document.getElementById("CPassword");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
}

