<?php
$cities = file_get_contents('C:/Program Files/Apache24/htdocs/cities.json', true);
#echo $cities;
$json = json_decode($cities);
$results = array();
if (!array_key_exists('name', $_GET)) {
    echo json_encode([]);
    return;
}
else{
    foreach ($json as $value) {
        if (is_numeric(stripos($value->name, htmlspecialchars($_GET["name"])))){
            if(count($results) === 10){
                break;
            }
            array_push($results, $value);
        }
    }
}
$jsonResults = json_encode($results);
echo $jsonResults;
?>