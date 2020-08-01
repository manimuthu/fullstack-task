<?php

function getRss($rssURI){

    $xml = simplexml_load_file($rssURI) or die("Error: Cannot open given URI");
    $xmlObject = $xml->channel->item;

    foreach($xmlObject as $data)
    {
        $title = $data->title;
        $enclosureURL = $data->enclosure['url'];
        $enclosureURLData = explode("/",$enclosureURL);
        $imageName = $enclosureURLData[sizeof($enclosureURLData)-1];
        $imageName = explode(".",$imageName);
        $imageName = md5($imageName[0]).".".$imageName[1];

        // Create Image starts
         $image = "images/$imageName";
         if(!file_exists($image))
         {
            file_put_contents($image, file_get_contents($enclosureURL)); 
         }
        // Create Image ends

        $dataJson[] = array("$title" => $imageName);
    }

   return json_encode($dataJson);
}



$result = getRss("https://www.nu.nl/rss/Sport");
echo"<pre>";print_r($result);
?>