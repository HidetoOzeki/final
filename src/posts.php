<?php session_start(); ?>
<?php require 'php/db.php'; ?>
<?php require 'php/general.php'; ?>

<?php 
$pdo = new PDO($connect,user,pass);

$pfpimg = '';

if(isset($_SESSION['user'])){
    $pfpimg = '../res/'.$_SESSION['user']['profile_image_path'];
}else{
    $pfpimg = '../res/user1.png';
}
?>

<?php require 'php/header.php'; ?>

<?php require 'php/headerBegin.php'; ?>
<div class="buttons is-right">
        <a href="profile.php">
            <img class="icon_image" src="<?=$pfpimg?>" alt="">
        </a>
        <a href="CreatePost.php" class="button is-success">投稿する</a>
        <a href="index.php" class="button is-info">ログアウト</a>
</div>

<?php require 'php/headerEnd.php'; ?>

<?php if(!isset($_SESSION['user'])): ?>
<p class="has-text-danger">ゲスト状態では投稿・投票ができません！</p>
<?php endif; ?>

<?php

showpost($connect,"","");

?>

<?php require 'php/footer.php';?>