<?php



if (isset($_POST['login']) && !empty($_POST['login'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  if (!empty($email) or !empty($password)) {
    $email = $getU->checkInput($email);
    $password = $getU->checkInput($password);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errorMsg = "無効なメールアドレスです";
    } else {
      if ($getU->login($email, $password) === false) {
        $errorMsg = "メールアドレス、またはパスワードが間違っています";
      }
    }
  } else {
    $errorMsg = "パスワードとメールアドレスを入力してください";
  }

}
?>

<div class="login-div">
  <form method="post">
    <ul>
      <li>
        <input type="text" name="email" placeholder="Please enter your Email here" />
      </li>
      <li>
        <input type="password" name="password" placeholder="password" />
        <input type="submit" name="login" value="ログイン" />
      </li>
      <?php
      if (isset($errorMsg)) {
        echo '<li class="error-li">
        <div class="span-fp-error">' . $errorMsg . '</div>
        </li>';
      }
      ?>
    </ul>

  </form>
</div>