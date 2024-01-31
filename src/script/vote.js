$(function(){
    console.log("jsが読み込まれました。");
    $('input[type=radio]').on('change',function(){
        console.log("changed");
        var inputname = $(this).attr("name");
        var postid = inputname.split("_")[2];
        var selected = $(this).val();
        console.log(postid+":"+selected);
        $.ajax({
            type: "POST",
            url: "php/vote.php",
            data: {post_id:postid,selected_option:selected},
            dataType:"text",
        }).done(function(data){
            $("#ajax").html(data);
            console.log(data);
        });
    });
});