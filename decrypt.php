<?php
/**
 * Created by PhpStorm.
 * User: johnny_liao
 * Date: 2017/7/14
 * Time: 下午2:59
 */

require_once ("classes/Crypto.php");

if(empty($_GET['q']))
{
    echo "ERROR: no input data!! (q=xxxxxxxx)";
    exit;
}

if(empty($_GET['key']))
{
    echo "ERROR: no key!! (key=xxxxxxxx)";
    exit;
}

$input = $_GET['q'];
$key = $_GET['key'];

$crypto = new Crypto($key);
$encrypted = $crypto->decrypt($input);

echo "input data = $input <br />";
echo "decrypted data = $encrypted";

