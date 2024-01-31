<?php session_start(); ?>
<?php require 'php/db.php'; ?>
<?php require 'php/header.php'; ?>

<?php require 'php/headerBegin.php';?>
<div class="buttons is-right">
        <a href="CreatePost.php" class="button is-success">投稿する</a>
        <a href="index.php" class="button is-info">ログアウト</a>
</div>
<?php require 'php/headerEnd.php';?>
<?php require 'php/general.php'; ?>

<p class="is-size-1 has-text-centered has-text-weight-bold">プロフィール</p>

<div class="indiv_post" style="margin-right: auto; margin-left: auto;">

<?php
$pdo = new PDO($connect,user,pass);
$userid = -1;
$image = 'Eisenhower.jpg';
$useralias = "";
$ownprofile = false;
$biotext = "";

if(isset($_POST['userid'])){
    $userid = $_POST['userid'];
    $sql=$pdo->prepare('SELECT * FROM user WHERE user_id = ?');
    $sql->execute([$userid]);
    $userdata = $sql->fetchAll()[0];
    $image = $userdata['profile_image_path'];
    $useralias = $userdata['user_alias'];
    $biotext = $userdata['user_biography'];
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['id']==$userid){
            $ownprofile=true;
        }
    }
}else{
    if(isset($_SESSION['user'])){
        $userid = $_SESSION['user']['id'];
        $image = $_SESSION['user']['profile_image_path'];
        $useralias = $_SESSION['user']['alias'];
        $sql=$pdo->prepare('SELECT * FROM user WHERE user_id = ?');
        $sql->execute([$userid]);
        $userdata = $sql->fetchAll()[0];
        $biotext = $userdata['user_biography'];
        $ownprofile=true;
    }else{
        $image = 'user1.png';
        $useralias = 'ゲスト';
    }
}
?>

    <div style="display:grid; align-items:center; grid-template-columns: 1fr 1fr 1fr;">

    <img class="icon_image" style="margin-left:16px; margin-top:16px; width:128px; height:128px;" src="../res/<?= $image ?>" alt="">

    <p class="is-size-5"><?= $useralias ?> <i class="fas fa-1x fa-pen"></i></p>

    </div>

    <?php if($ownprofile): ?>

        <button onclick="location.href='profile-edit.php'">
        <i class="fas fa-2x fa-cog is-large is-right" style=""></i>
        </button>

    <?php endif; ?>

    <br>
    <br>
    <p style="margin-left:10%; margin-right:10%;"> <?= $biotext ?> </p>

</div>

<?php

showpost($connect,"WHERE user_id = ".$userid,"margin-right:auto; margin-left:auto;");

?>


<script src="script/jquery-3.7.0.min.js"></script>
<script src="script/ImagePreview.js"></script>

<?php require 'php/footer.php'?>