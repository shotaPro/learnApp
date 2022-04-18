<?php
/*
  Developed by Aizaz dinho (@aizazdinho)
  Designed  by Meezan (@iamMeezi)
*/
include 'core/init.php';

if ($getU->loggedIn() === true) {
	header('Location: home.php');
}

?>
<html>

<head>
	<title>Tweety</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" />
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" href="assets/css/style-complete.css" />
</head>
<!--Helvetica Neue-->

<body>
	<div class="front-img">
		<img src="assets/images/star.jpg"></img>
	</div>

	<div class="wrapper">
		<!-- header wrapper -->

		<!---Inner wrapper-->
		<div class="inner-wrapper">
			<!-- main container -->
			<div class="main-container">
				<!-- content left-->
				<div class="content-left">
					<h1>日々の学びを「言語化」しよう
					</h1>
					<br />
					<p>このサービスは本を読んだり、映画を見たりする中で得た学びや気づきを記録するサービスです。
						<br><br>
						新しく学んだことをアウトプットしてみましょう。
						<br><br>
						毎日の積み重ねが力になります。
					</p>
				</div><!-- content left ends -->

				<!-- content right ends -->
				<div class="content-right">
					<!-- Log In Section -->
					<div class="login-wrapper">
						<?php include 'includes/login.php'; ?>
					</div><!-- log in wrapper end -->

					<!-- SignUp Section -->
					<div class="signup-wrapper">
						<?php include 'includes/signup-form.php'; ?>
					</div>
					<!-- SIGN UP wrapper end -->

				</div><!-- content right ends -->

			</div><!-- main container end -->

		</div><!-- inner wrapper ends-->
	</div><!-- ends wrapper -->
</body>

</html>