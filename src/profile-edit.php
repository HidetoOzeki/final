<?php session_start(); ?>
<?php require 'php/db.php'; ?>
<?php require 'php/header.php'; ?>

<?php require 'php/headerBegin.php';?>

<?php require 'php/headerEnd.php';?>

<p class="is-size-1 has-text-centered has-text-weight-bold">プロフィールを編集</p>

<div class="indiv_post" style="margin-right: auto; margin-left: auto;">



<?php
$pdo = new PDO($connect,user,pass);
$userid = -1;
$image = 'Eisenhower.jpg';
$useralias = "";
$password = "";
$biotext = "";
    if(isset($_SESSION['user'])){
        $userid = $_SESSION['user']['id'];
        $image = $_SESSION['user']['profile_image_path'];
        $useralias = $_SESSION['user']['alias'];
        $password = $_SESSION['user']['password'];
        $sql=$pdo->prepare('SELECT * FROM user WHERE user_id = ?');
        $sql->execute([$userid]);
        $userdata = $sql->fetchAll()[0];
        $biotext = $userdata['user_biography'];
    }else{
        $image = 'user1.png';
        $useralias = 'ゲスト';
    }
?>

    <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    </form>

    <div style="display:grid; align-items:center; grid-template-columns: 1fr 1fr 1fr;">

    <figure class="image is-128x128">
    <img class="is-rounded" style="margin-left:16px; margin-top:16px;" src="../res/<?= $image ?>" alt="">
    </figure>

    <i class="fas fa-1x fa-pen"></i>
    </div>

    <form id="update_form" action="profile.php" method="post">

    <p>ニックネーム : <input id="newalias" type="text" class="input_original" value="<?= $useralias ?>"></p>
    <p>パスワード :   <input id="newpassword" type="text" class="input_original" value="<?= $password ?>"></p>
    <p>自己紹介文 :   <input id="newbio" type="textarea" class="input_original" value="<?= $biotext ?>"></p>

    <div style="position:absolute; right:32px;bottom:32px; margin-left:auto; margin-right:auto;">
    <button type="button" id="save_changes" class="button is-info">保存</button>
    <button onclick="location.href='profile.php'" class="button is-danger">破棄</button>
    </div>
    </form>

</div>

<script src="script/jquery-3.7.0.min.js"></script>
<!--<script src="script/ImagePreview.js"></script>-->
<script src="script/update_profile.js"></script>

<?php require 'php/footer.php'?>