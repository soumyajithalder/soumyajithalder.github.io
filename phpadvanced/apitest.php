<?php
    require './vendor/autoload.php';
    $client= new GuzzleHttp\Client();
    $res=$client->request('GET','https://ir-revamp-dev.innoraft-sites.com/jsonapi/node/services');

    //echo $res->getStatusCode();
    //echo $res->getHeader('content-type');
    $decode = json_decode($res->getBody(), true);
    $decode_data=$decode["data"];
    //print_r($decode_data); exit;
    $body=array();
    $insert=array();
    

    foreach($decode_data as $data){
        $body["title"]=$data["attributes"]["title"];
        $body["summary"]=$data["attributes"]["body"]["summary"];
        $body["body"]=$data["attributes"]["field_services"]["value"];
        
        $image=$data["relationships"]["field_image"]["links"]["related"]["href"];
        $image_request=$client->request('GET',$image);
        $image_url=json_decode($image_request->getBody(),true)["data"]["attributes"]["uri"]["url"];
        $body["images"]="https://ir-revamp-dev.innoraft-sites.com/$image_url";
        
        array_push($insert,$body);
    }

    //print_r($insert); exit;

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>APi Test</title>
</head>
<body>
    <?php
        foreach($insert as $row){?>
            <h2><?php echo $row["title"] ?></h2>
            <p><?php echo $row["summary"] ?></p>
            <p><?php echo $row["body"] ?></p>
            <img src="<?php echo $row["images"]?>" alt="">
    <?php   
        }
    ?>
        
</body>
</html>