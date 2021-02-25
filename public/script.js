$(document).ready(function(){
    //start validate commentaries
    let author = $("#author_comment");
    console.log(author);
    let text = $("#text_comment");
    let btn = $("#submit");
    let error = $(".error-label");

    if (btn.click(function (e) {
        if (author.val() == '') {
            e.preventDefault();

            error.css("opacity", "1");
            author.css("border", "1px solid #c44d4d");
        }
        
        if (text.val() == '') {
            e.preventDefault();

            error.css("opacity", "1");
            text.css("border", "1px solid #c44d4d");
        }

        author.blur(function () {
            error.css("opacity", "0");
            author.css("border", "1px solid #cfcfcf");
        });

        text.blur(function () {
            error.css("opacity", "0");
            text.css("border", "1px solid #cfcfcf");
        });

    }));


    $("#btn-auth").click(function () {
        $(".auth-error").remove();
        $.ajax({
            type: 'post',
            url: '/auth',
            data: $("#ajax-form").serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.message != 'ok') {
                    $("#ajax-form").before("<span class='auth-error'>"+ data.message +"</span>");
                }
                else {
                    $("#authModal").hide();
                    window.location.reload();
                }
            }
        });
    });

});