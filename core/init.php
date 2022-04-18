<?php

session_start();
include 'database/connection.php';
include 'classes/user.php';
include 'classes/post.php';

global $pdo;

$getU = new User($pdo);
$getP = new Post($pdo);


define('BASE_URL', 'http://localhost:8888/rd/');
