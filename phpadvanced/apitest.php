<?php
    require './vendor/autoload.php';
    $client= new GuzzleHttp\Client();
    $res=$client->request('GET','https://ir-revamp-dev.innoraft-sites.com/jsonapi/node/services');

    //echo $res->getStatusCode();
    //echo $res->getHeader('content-type');
    $data = json_decode($res->getBody()->getContents(), true);
    print_r($data);
?>