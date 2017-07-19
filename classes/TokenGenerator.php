<?php

require_once("vendor/otphp/lib/otphp.php");

/**
 * Token 生成控制
 */
class TokenGenerator
{

    public $config = array();
    /**
     * 建構子
     */
    public function __construct()
    {
        $this->load_config();
    }

    /**
     * 讀取設定檔
     */
    public function load_config()
    {
        //讀取設定檔
        $config = include("config/secret.php");
        $this->config = $config;
    }

    /**
     * 取得 TOTP 的 Token
     */
    public function generate_code($config_array = null){

        if($config_array == null) $config_array = $this->config;

        $ret = array();

        foreach ($config_array as $config)
        {
            $title = $config['title'];
            $secret = $config['secret'];
            $totp = new \OTPHP\TOTP($secret);
            $code = $totp->now();

            // code 回傳值為整數，故如果前面有 0 會被吃掉，需要補 0
            $code_length = strlen((string)$code);
            if($code_length < 6) {
                //補 0
                $code = "0". $code;
            }

            //把產生的 code 跟 title 加到回傳陣列
            array_push($ret, ['title'=>$title, 'code'=>$code]);

        }

        return $ret;

    }

}
