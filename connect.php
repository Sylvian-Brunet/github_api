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

function showAvatars($array) {
    echo '<div style="display: flex; flex-direction: row; flex-wrap: wrap">';
    foreach ($array as $a) {
        echo '<img src="' . $a . '" style="width: 100px; height: 100px">';
    }
    echo '</div>';
}

function get_content(){
    $url = 'https://api.github.com/repos/miw05/directory/contents/peoples.json';
    $json = curl(TOKEN, $url);
    $decode = base64_decode($json['content']);

    $liste = json_decode($decode);
    $avatars = array();
    for ($i = 0; $i < sizeof($liste); $i++) {
        $link = $liste[$i]->github;
        if (substr($link, -1) == '/') {
            $link = mb_substr($link, 0, -1);
        }
        $name = substr($link, strrpos($link, '/')+1);
        $json = curl(TOKEN, 'https://api.github.com/users/' . $name);
        array_push($avatars, $json['avatar_url']);
    }
    showAvatars($avatars);
}

get_content();
