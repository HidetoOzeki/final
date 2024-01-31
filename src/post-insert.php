<?php session_start(); ?>
<?php require 'php/db.php'; ?>
<?php
$pdo = new PDO($connect,user,pass);
$sql = $pdo->prepare('INSERT INTO post(user_id,post_type,post_title,post_description,post_explanation) VALUES(?,1,?,?,?)');
$sql->execute([$_SESSION['user']['id'],$_POST['title'],$_POST['desc'],'テスト']);
$postid = $pdo->lastInsertId();
$options = count($_POST['options']);
$arr = $_POST['options'];
$out = "";
$count = 1;
foreach($arr as $val){
    $sql = $pdo->prepare('INSERT INTO vote_option VALUES(?,?,?,?,?)');
    $sql->execute([$postid,$count,$val,$count,"test.jpg"]);
    $out=$out." : ".$val;
    $count++;
}
echo $out;
/*
$i = 0;
for($i < $options;$i++;){
    $sql = $pdo->prepare('INSERT INTO vote_option VALUES(?,?,?,?,?)');
    $sql->execute([$postid,$i,$arr[$i],$i,"test.jpg"]);
}
*/
exit;