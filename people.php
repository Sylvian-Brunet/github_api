<?php

require_once 'Function.php';

header('Content-Type: text/xml');

function get_content(){
    $url = 'https://api.github.com/repos/miw05/directory/contents/peoples.json';
    $json = curl(TOKEN, $url);
    $decode = base64_decode($json['content']);

    $liste = json_decode($decode);

    $fichXml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
    $fichXml .= "<people>";
    for ($i = 0; $i < sizeof($liste); $i++) {
        $link = $liste[$i]->github;
        if (substr($link, -1) == '/') {
            $link = mb_substr($link, 0, -1);
        }
        $name = substr($link, strrpos($link, '/')+1);
        $fichXml .= "<human><name>".$liste[$i]->name."</name><pseudo>".$name."</pseudo></human>";
    }
    $fichXml .= "</people>";
    echo $fichXml;
}

get_content();
