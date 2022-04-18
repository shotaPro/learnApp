<?php


if (isset($_POST['signup'])) {
	$username = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (!empty($_POST['name']) or !empty($_POST['email']) or !empty($_POST['password'])) {

		$getU->checkInput($username);
		$getU->checkInput($email);
		$getU->checkInput($password);

		if (strlen($username) > 20) {

			echo '名前は20文字いないに設定してください';

		} else if (strlen($username) <= 2) {

			echo '名前は3文字以上に設定しましょう';

		} else if (strlen($password) <= 2) {

			echo "パスワードは３以上にしましょう";
			
		} else {

			$getU->create('users', array('username' => $username, 'email' => $email, 'password' => $password));
			$getU->login($email, $password);

			if ($getU->loggedIn() === true) {

				header('Location: home.php');
			}
		}
	} else {

		echo '全ての項目を記入してください';
	}
}


?>
<form method="post">
	<div class="signup-div">
		<h3>Sign up </h3>
		<ul>
			<li>
				<input type="text" name="name" placeholder="Full Name" />
			</li>
			<li>
				<input type="email" name="email" placeholder="Email" />
			</li>
			<li>
				<input type="password" name="password" placeholder="Password" />
			</li>
			<li>
				<input type="submit" name="signup" Value="新規アカウント">
			</li>
			<?php
			if (isset($error)) {
				echo '<li class="error-li">
        <div class="span-fp-error">' . $error . '</div>
        </li>';
			}
			?>
		</ul>

	</div>
</form>