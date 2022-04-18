<?php
include '../core/init.php';

$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
  <p>ログアウトしました</p>
  <p><a href="../index.php">ログイン画面に戻る</a></p>
</body>

</html>