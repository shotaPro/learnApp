<?php
include '../init.php';


if (isset($_POST['deletePost']) && !empty($_POST['deletePost'])) {
  $post_id  = $_POST['deletePost'];
  $user_id   = $_SESSION['user_id'];

  $getU->delete('post', array('postID' => $post_id, 'postBy' => $user_id));
}



if (isset($_POST['showpopup']) && !empty($_POST['showpopup'])) {

  $post_id  = $_POST['showpopup'];
  $user_id   = $_SESSION['user_id'];
  $post = $getP->PostPopup($post_id);

?>

  <div class="post-popup">
    <div class="wrap5">
      <div class="post-popup-body-wrap">
        <div class="post-popup-heading">
          <h3>本当に消してもいいですか?</h3>
          <span><button class="close-post-popup"><i class="fa fa-times" aria-hidden="true"></i></button></span>
        </div>
        <div class="post-popup-footer">
          <div class="post-popup-footer-right">
            <button class="delete-it" data-post="<?php echo $post->postID; ?>" type="submit">OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>