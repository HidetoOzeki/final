<?php
function showpost($connect,$arg,$style){
    echo '<div id="ajax">';
$pdo = new PDO($connect,user,pass);
$str = 'SELECT * FROM post '.$arg;
$sql = $pdo->query($str);
$count = 0;
foreach($sql as $data){

    echo '<div class="indiv_post" style="',$style,'">';

    $userid = $data['user_id'];
    $query = $pdo->prepare('select * from user where user_id = ?');
    $query->execute([$userid]);
    $userdata = $query->fetchAll()[0];
    $username = $userdata['user_alias'];
    $image = $userdata['profile_image_path'];


    echo '<p>投稿者:',$username,'</p>';

    echo '<form action="profile.php" method="post" id="post_form',$count,'">
    <input type="hidden" name="userid" value="',$data['user_id'],'">';

    echo '<img onclick="document.forms[\'post_form',$count,'\'].submit();" class="icon_image" style="margin-left:16px; margin-top:16px" src="../res/',$image,'" alt="">';

    echo '</form>';

    if(isset($_SESSION['user'])){
        if($_SESSION['user']['id']==$userid){
            echo '
            <form action="DeletePost.php" method="post">
            <input type="hidden" name="delete_post_id" value="',$data['post_id'],'">
            <button style="
            position: absolute;
            right: 16px;
            top: 16px;
            " type="submit" class="button is-danger">削除</button>
            </form>';
        }
    }

    echo '<p style="margin-top:32px;">タイトル:',$data['post_title'],'</p>';
    echo '<p>',$data['post_description'],'</p>';

    echo '<div style="margin-bottom:48px;">';

    $options_query = 'SELECT * FROM vote_option WHERE post_id = '.$data['post_id'];
    $options = $pdo->query($options_query);

    $checked_option = -1;

    if(isset($_SESSION['user'])){

    $vote_query_arg = 'SELECT * FROM vote WHERE post_id = '.$data['post_id'].' and user_id = '.$_SESSION['user']['id'].';';
    $vote_query = $pdo->query($vote_query_arg);

    foreach($vote_query as $votes){
        $checked_option = $votes['vote_number'];
    }

    }

    $votes_total_query = $pdo->prepare('SELECT COUNT(*) as result FROM vote WHERE post_id = ?');
    $votes_total_query->execute([$data['post_id']]);
    $total_result = $votes_total_query->fetchAll();

    $total_votes = $total_result[0]['result'];

    foreach($options as $option){
        $option_id = $data['post_id'].$option['option_order'];
        $str = "";
        if($checked_option==$option['option_order'])$str = "checked";

        $query_script = 'SELECT COUNT(*) as votes FROM vote WHERE post_id = '.$data['post_id'].' and vote_number = '.$option['option_order'].';';
        $option_votes_query = $pdo->query($query_script);
        $votes = $option_votes_query->fetchAll()[0]['votes'];
        if($votes!=0){
            $ratio = 100*($votes/$total_votes);
        }else{
            $ratio = 0;
        }

        echo '<input class="buttonradio" type="radio" name="vote_options_',$data['post_id'],'" value="',$option['option_order'],'" id="option',$option_id,'" ',$str,'>';
        echo '<label for="option',$option_id,'" class="radiolabel">',$option['option_name'],'</label>';

        if($checked_option!=-1){
            echo '<progress class="percentage_bar" value="',$ratio,'" max="100"> ' ,$ratio, '% </progress>';
            echo $votes,'票';
        }
    }

    echo '</div>';

    echo '<button class="view_comment_button"><i class="fas fa-comment"></i></button>';

    echo '<p class="left_bottom">投票数:',$total_votes,'</p>';
    
    echo '</div>';

    $count++;
    }
    echo '</div>';

}
?>

</div>

<script src="script/jquery-3.7.0.min.js"></script>
<script src="script/vote.js"></script>

<!--

<div style="margin-left:70%">
<input class="buttonradio" type="radio" name="vote_options" value="選択肢1" id="option1">
<label for="option1" class="radiolabel">選択肢1</label>
<br>
<input class="buttonradio" type="radio" name="vote_options" value="選択肢2" id="option2">
<label for="option2" class="radiolabel">選択肢2</label>
<br>
<input class="buttonradio" type="radio" name="vote_options" value="選択肢3" id="option3">
<label for="option3" class="radiolabel">選択肢3</label>

-->