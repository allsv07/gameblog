$(document).ready(function(){
    let text = $("#text_comment");
    let btn = $("#submit");
    let error = $(".error");

    if (btn.click(function (e) {
        if (text.val() == '') {
            e.preventDefault();

            error.css("opacity", "1");
            text.css("border", "1px solid #c44d4d");
        }

        text.blur(function () {
            error.css("opacity", "0");
            text.css("border", "1px solid #000");
        });

    }));
});