$(document).ready(function(){
    let text = $("#text_comment");
    let btn = $("#submit");
    let error = $(".error");
    console.log(error);

    if (btn.click(function (e) {
        if (text.val() == '') {
            e.preventDefault();

            error.css("opacity", "1");
            text.css("border", "1px solid #c44d4d");
        }

        text.blur(function () {
            text.css("border", "1px solid #000");
        });

    }));
});