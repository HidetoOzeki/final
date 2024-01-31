<?php session_start(); ?>
<?php require 'php/db.php'; ?>
<?php require 'php/header.php'; ?>

<?php require 'php/headerBegin.php';?>

<?php require 'php/headerEnd.php';?>
<?php require 'php/general.php'; ?>

<div class="indiv_post" style="margin:auto; padding: 16px;">

<?php
$pdo = new PDO($connect,user,pass);
$sql = $pdo->query('select * from post where post_id = '.$_POST['delete_post_id']);
$post = $sql->fetchAll()[0];
$post_title = $post['post_title'];
/*
<button class="button is-danger" style="position:absolute;bottom:16px; right:16px;">削除</button>
<button class="button is-info" style="position:absolute;bottom:16px;left:16px;">戻る</button>
*/
?>

<form action="posts.php" method="post" id="delete_post">

<input type="hidden" id="delete_id" name="id" value="<?= $_POST['delete_post_id']?>">

<p class="is-centered">投稿を削除しますか？ <br> 投稿タイトル: <?= $post_title ?> </p>

<button type="button" id="delete_button" class="button is-danger" style="margin:auto;" >削除</button>
<button type="button" onclick="location.href='profile.php'" class="button is-info" style="margin:auto;">戻る</button>
</form>

<script src="script/jquery-3.7.0.min.js"></script>
<script src="script/delete_post.js"></script>

</div>
