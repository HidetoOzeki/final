$(function(){
    console.log("jsが読み込まれました。");
    $('#delete_button').on('click',function(){
        console.log("削除ボタンが押されました");
        $.ajax({
            type: "POST",
            url: "php/delete_post.php",
            data: {post_id:$('#delete_id').val()},
            dataType:"text",
        }).done(function(data){
            console.log(data);
            $('#delete_post').submit();
        });
    });
});