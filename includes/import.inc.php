<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://wrapapi.com/use/r3450n/sofy/softpediaGetter/0.0.11");
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
  "words" => $_GET["search"],
  "wrapAPIKey" => "nAjfLEmxyum0RZBDXfNolImFxx8bEqwx"
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$data = json_decode($response, true);

print_r($data);
echo "<br>";
foreach($data["data"]["app"] as $item){
    echo $item["title"] . "<br>";
}

?>