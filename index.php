<?php
require_once("{$_SERVER['DOCUMENT_ROOT']}/router.php");

$homeRoute = empty($_COOKIE["sid"]) ? "cek_login.php" : "main.php";

get("/", $homeRoute);
get("/login", "login.php");
get("/logout", "logout.php");
