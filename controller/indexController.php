<?php

/**
 * index 控制器
 */

require_once("classes/TokenGenerator.php");

//產生 token
$auth = new TokenGenerator();
$ret = $auth->generate_code();

//設定 code color （如沒帶入則給預設值)
$code_color = !empty($_GET['c']) ? '#'.$_GET['c'] : "#FFF";

//導向到 authenticator view
include("view/authenticator.php");