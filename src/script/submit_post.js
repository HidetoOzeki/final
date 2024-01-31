$(function(){
    console.log("jqueryが読み込まれました。");
    $("#post_button").on("click",function(){
        var option_arr = [];
        console.log("投稿ボタンが押されました");
        $('input[name^="options"]').each(function(){
            option_arr.push(this.value);
        });
        $.ajax({
            type: 'POST',
            url: './post-insert.php',
            dataType: 'text',
            data: {title: $("#title").val(),desc: $("#description").val(), 'options[]' : option_arr},
        }).done(function(data){
            console.log(data);
            $("#post_form").submit();
        });
    });
});