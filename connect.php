<?php

function get_content(){
    $token = 'your_token';
    $url = 'https://api.github.com/repos/miw05/directory/contents/peoples.json';
    $curl = curl_init();
    $headers = Array('Authorization: Bearer ' . $token);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_USERAGENT, "your_user_agent");
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = curl_exec($curl);
    $json = json_decode($data, true);
    $decode = base64_decode($json['content']);
    var_dump(json_decode($decode));
    
    curl_close ($curl);
}

get_content();
?>
