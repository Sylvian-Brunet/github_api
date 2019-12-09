<?php

function get_content(){
    $token = 'your_token';
    $url = 'https://api.github.com/users/Sylvian-Brunet';
    $curl = curl_init();
    $headers = Array('Authorization: Bearer ' . $token);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_USERAGENT, "your_user_agent");
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = curl_exec($curl);
    var_dump(json_decode($data));
    curl_close ($curl);
}

get_content();

?>