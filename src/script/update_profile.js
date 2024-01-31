$(function(){
    console.log("jsが読み込まれました。");
    $("#save_changes").on("click",function(){
        console.log("保存が押されました");
        $.ajax({
            type: "POST",
            url: "./update_profile.php",
            data: { alias: $("#newalias").val(),password: $("#newpassword").val(),user_biography:$("#newbio").val()},
            dataType: "text",
        }).done(function(data){
            console.log(data);
            $("#update_form").submit();
        });
    });
});