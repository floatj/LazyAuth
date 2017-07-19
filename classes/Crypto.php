<?php
class Crypto
{
    //protected  $key = "5566_is_The_Best";     //encryption key
    public $key = "";

    function __construct($default_key)
    {
        //設定預設 key
        if(!empty($default_key)) {
            $fixed_length_key = $this->fix_key_length($default_key);
            $this->key = $fixed_length_key;
        }


        // 32 byte binary blob
        $aes256Key = hash("SHA256", $this->key, true);
    }

    // @todo: generate random iv
    //$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_RAND);

    function encrypt($sValue)
    {
        //固定 key
        $sSecretKey = $this->key;

        // for good entropy (for MCRYPT_RAND)
        srand((double) microtime() * 1000000);


        return rtrim(
            base64_encode(
                mcrypt_encrypt(
                    MCRYPT_RIJNDAEL_256,
                    $sSecretKey, $sValue,
                    MCRYPT_MODE_ECB,
                    mcrypt_create_iv(
                        mcrypt_get_iv_size(
                            MCRYPT_RIJNDAEL_256,
                            MCRYPT_MODE_ECB
                        ),
                        MCRYPT_RAND)
                )
            ), "\0"
        );
    }

    function decrypt($sValue)
    {
        //固定 key
        $sSecretKey = $this->key;

        return rtrim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_256,
                $sSecretKey,
                base64_decode($sValue),
                MCRYPT_MODE_ECB,
                mcrypt_create_iv(
                    mcrypt_get_iv_size(
                        MCRYPT_RIJNDAEL_256,
                        MCRYPT_MODE_ECB
                    ),
                    MCRYPT_RAND
                )
            ), "\0"
        );
    }

    //對於 key 長度不符合規定的 workaround
    //@todo 暫時只支援把長度 < 16 位的 key 補到 16 位
    function fix_key_length($key)
    {
        if(strlen($key)>16) {
            die("FATAL ERROR: key length >16 is not support now!! please use a shorter key");
            exit;
        }

        //加密演算法只支援 16, 24, 32 長度的 key
        while(strlen($key)<16){
            $key = $key."\0";
        }

        return $key;
    }
}
