<?php

define('TOKEN', 'your token here');

function curl($token, $url) {
    $curl = curl_init();
    $headers = Array('Authorization: Bearer ' . $token);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36");
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $data = curl_exec($curl);
    curl_close ($curl);

    $result = json_decode($data, true);
    return $result;
}