<html>
<head>
    <meta charset="UTF-8"/>
    <title>Lazy Authenticator v0.0.1</title>
</head>
<body>
<?php

echo ' <meta http-equiv="refresh" content="5" />';

echo '<div style="margin:10px; padding:10px; background-color: #FFCC33; border-radius:10px;">';
echo '<span style="color: #FFF"> Lazy Authenticator - </span> '.date("Y-m-d")."<br />";
echo '<span style="color: #FFF"> 下面音響 '.date('H')."點".date('i')."分".date('s').'秒</span>';
echo '</div>';

//印出 OTP title , code
foreach($ret as $otp)
{
    echo '<span style="color:#CCC">'.$otp['title']."</span><br />";
    echo "<span style='font-size:24px; color:{$code_color}'>".$otp['code']."</span><br />";
    echo "<hr>";
}

?>
<br />
<a href="http://localhost">緊急停止按鈕</a>
</body>
</html>