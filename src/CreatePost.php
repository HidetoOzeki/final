<?php require 'php/db.php'; ?>
<?php require 'php/header.php'; ?>

<?php require 'php/headerBegin.php';?>

<?php require 'php/headerEnd.php';?>

<p class="is-size-1 has-text-centered has-text-weight-bold">投稿作成</p>

<div class="indiv_post" style="margin-right: auto; margin-left: auto;">

<form action="profile.php" method="post" id="post_form">

<input id="title" class="create_title has-text-centered" type="text" placeholder="投稿タイトル">

<input id="description" class="create_description has-text-centered" type="text" placeholder="投稿文章">

<!--

<div class="image_upload" style="margin-left:10%;">
<form class="custom__form">
  <p>画像を追加</p>
  <div class="custom__image-container">
    <label id="add-img-label" for="add-single-img">+</label>
    <input type="file" id="add-single-img" accept="image/jpeg" />
  </div>
  <input
    type="file"
    id="image-input"
    name="photos"
    accept="image/jpeg"
    multiple
  />
  <br />
  <div class="form__controls"><button type="submit">Submit</button></div>
</form>
</div>

-->

<div class="create_post_vote_option">
    選択肢

    <div id="option_input">
      
    </div>

<button type="button" onclick="add_option()" id="add_option_button" class="create_post_vote_option" style="background-color:white;" >+</button>

</div>

<div style="margin-top:5%; margin-bottom:5%; margin-left:10%;">

<button type="button" id="post_button" class="button is-info" >投稿</button>
<button type="button" class="button is-danger" >破棄</button>

</div>

  
</form>

</div>

<script src="script/jquery-3.7.0.min.js"></script>
<!-- <script src="script/ImagePreview.js"></script> -->
<script src="script/submit_post.js"></script>
<!--<script src="script/create_post.js"></script> -->
<script src="script/adding_options.js"></script>

<?php require 'php/footer.php'?>