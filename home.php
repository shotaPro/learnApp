<?php
/*
  Developed by Aizaz dinho (@aizazdinho)
  Designed  by Meezan (@iamMeezi)
 */
include 'core/init.php';

if ($getU->loggedIn() === false) {
	header('Location: index.php');
}

$user_id = $_SESSION['user_id'];
$user = $getU->userData($user_id);

if (isset($_POST['post'])) {
	$title = $getU->checkInput($_POST['title']);
	$learn1 = $getU->checkInput($_POST['learn1']);
	$learn2 = $getU->checkInput($_POST['learn2']);
	$learn3 = $getU->checkInput($_POST['learn3']);
	$output1 = $getU->checkInput($_POST['output1']);
	$output2 = $getU->checkInput($_POST['output2']);
	$output3 = $getU->checkInput($_POST['output3']);
	$status = $getU->checkInput($_POST['status']);
	$PostImage = '';

		if (!empty($_FILES['file']['name'][0])) {
			$PostImage = $getU->uploadImage($_FILES['file']);
		}

		$getU->create('post', array('title' => $title, 'learn1' => $learn1, 'learn2' => $learn2, 'learn3' => $learn3, 'output1' => $output1, 'output2' => $output2, 'output3' => $output3, 'status' => $status, 'postBy' => $user_id, 'postImage' => $PostImage, 'posetdOn' => date('Y-m-d H:i:s')));

		header('Location: home.php');

}


?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Home - Tweety</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<link rel="stylesheet" href="assets/css/style-complete.css" />
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<body>
	<div class="wrapper">
		<div class="header-wrapper">

			<div class="nav-container">
				<div class="nav">
					<div class="nav-left">
						<ul>
							<li><a href="includes/logout.php"><i class="fa fa-home" aria-hidden="true"></i>ログアウトする</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="in-center">
		<div class="in-center-wrap">
			<h1>あなたの学びを言語化して記録しよう</h1>
			<br><br>
			<div class="post-wrap">
				<div class="post-inner">
					<form method="post" enctype="multipart/form-data">
						<h2>○読んだ本や映画のタイトル(※20文字以内)</h2> <br>
						<input type="text" maxlength="20" name="title" placeholder="例）宮本武蔵">
						<h2>○何を学んだのか(※50文字以内)</h2>　<br>
						・<input class="allInput" maxlength="50" type="text" name="learn1" placeholder="例）基礎を大切にし、いろんな状況に対処できるよう日々イメージしていた。"><br><br>
						・<input class="allInput" maxlength="50" type="text" name="learn2" placeholder="例）剣だけでなく、学問にも一生懸命に励み人間性を磨いていた。"><br><br>
						・<input class="allInput"maxlength="50" type="text" name="learn3" placeholder="例）人に対しては優しく接し、人のしての温かい振る舞いを大切にしていた。"><br><br>
						<h2>○生活の中でどのようにアウトプットできそうか(※50文字以内)</h2><br>
						・<input class="allInput"maxlength="50" type="text" name="output1" placeholder="例）挨拶・礼儀・勉強など基本をおろそかにせず、先々のことを考え自発的に行動する。"><br><br>
						・<input class="allInput"maxlength="50" type="text" name="output2" placeholder="例）向上心を忘れず人に役立てる人間になれるよう日々、精進する。"><br><br>
						・<input class="allInput"maxlength="50" type="text" name="output3" placeholder="例）人を大切にし、思いやりや配慮を持って接する。"><br><br>
						<h2>その他、感想があれば</h2>
						<div class="post-body">
							<textarea class="status" maxlength="390" name="status" rows="4" cols="50"></textarea>
							<div class="hash-box">
								<ul>
								</ul>
							</div>
						</div>
						<div class="post-footer">
							<div class="t-fo-left">
								<ul>
									<input type="file" name="file" id="file" />
									<li><label for="file"><i class="fa fa-camera" aria-hidden="true">画像をアップロード</i></label>
									</li>
								</ul>
							</div>
							<div class="t-fo-right">
								<input type="submit" name="post" value="記録する" />
					</form>
				</div>
			</div>
		</div>
	</div>


	<div class="tweets">
		<?php $getP->posts($user_id); ?>
		<button class="top"><a href="#">トップに戻る</a></button>
	</div>

	<div class="popupPost"></div>

	<div class="loading-div">
		<img id="loader" src="assets/images/loading.svg" style="display: none;" />
	</div>
	<div class="popupTweet"></div>
	<script type="text/javascript" src="assets/js/delete.js"></script>
	</div>
	</div>

</body>

</html>