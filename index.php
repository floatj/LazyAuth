<html>
<head>
    <meta charset="UTF-8"/>
    <title>Lazy Authenticator v0.0.1</title>
</head>
<body>
<?php

require_once("classes/TokenGenerator.php");

echo ' <meta http-equiv="refresh" content="1" />';

echo '<div style="margin:10px; padding:10px; background-color: #FFCC33; border-radius:10px;">';
echo '<span style="color: #FFF"> Lazy Authenticator - </span> '.date("Y-m-d")."<br />";
echo '<span style="color: #FFF"> 下面音響 '.date('H')."點".date('i')."分".date('s').'秒</span>';
echo '</div>';

//產生 token
$auth = new TokenGenerator();
$auth->generate_code();

?>
<br />
<a href="http://mediawiki.qa/index.php?title=%E9%A6%96%E9%A0%81">緊急停止按鈕</a>
</body>
</html>