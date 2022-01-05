<?php

namespace App\Http\Tools;

class Encrypter
{
    /**
     * @var mixed|string
     */
    private $cipher;
    private $tag_length;

    /**
     * @param $chiper
     * @param $tag_length
     */
    function __construct($chiper = 'aes-256-gcm', $tag_length = 16)
    {
        $this->cipher = $chiper;
        $this->tag_length = $tag_length;
    }

    /**
     * @param $textToEncrypt
     * @param $password
     * @return string
     */
    function encrypt($textToEncrypt, $password): string
    {
        $iv_len = openssl_cipher_iv_length($this->cipher);
        $iv = openssl_random_pseudo_bytes($iv_len);

        $tag = ""; // will be filled by openssl_encrypt

        $key = substr(hash('sha256', $password, true), 0, 32);
        $ciphertext = openssl_encrypt($textToEncrypt, $this->cipher, $key, OPENSSL_RAW_DATA, $iv, $tag, "", $this->tag_length);

        return base64_encode($iv . $ciphertext . $tag);
    }

    /**
     * @param $textToDecrypt
     * @param $password
     * @return false|string
     */
    function decrypt($textToDecrypt, $password): string
    {
        $encrypted = base64_decode($textToDecrypt);

        $iv_len = openssl_cipher_iv_length($this->cipher);
        $iv = substr($encrypted, 0, $iv_len);
        $ciphertext = substr($encrypted, $iv_len, -$this->tag_length);
        $tag = substr($encrypted, -$this->tag_length);

        $key = substr(hash('sha256', $password, true), 0, 32);
        return openssl_decrypt($ciphertext, $this->cipher, $key, OPENSSL_RAW_DATA, $iv, $tag);
    }
}
