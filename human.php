<?php

require_once 'Function.php';

header('Content-Type: text/xml');

function get_content(){
    $json = curl(TOKEN, 'https://api.github.com/users/' . $_POST['auteur']);
    $fichXml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
    $fichXml .= "<people>";
    $fichXml .= "<human><url>" . $json['avatar_url'] . "</url></human>";
    $fichXml .= "</people>";
    echo $fichXml;
}

get_content();
