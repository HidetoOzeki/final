<?php session_start(); ?>
<?php require 'php/header.php';?>
<?php unset($_SESSION['user']); ?>
    <h1 class="title" style="position:sticky; margin-bottom: 100px; margin-top: 100px; margin-left: auto; margin-right: auto;">Polls</h1>

    <div class="floating_shadow" style="background-color: white; margin-left: auto; margin-right: auto; text-align: center; width:50vh; height:50vh; margin-top:auto; margin-bottom: auto;">

    <p class="is-size-1 has-text-centered has-text-weight-bold">ログイン</p>

    <form action="login-output.php" method="post">

    <input class="default_input" name="mailaddress" type="text" placeholder="メールアドレス">
    <br>
    <input class="default_input" name="password" type="text" placeholder="パスワード">
    <br>
        <button class="button is-success" type="submit">ログイン</button>
    </form>

    </div>

<?php require 'php/footer.php';?>