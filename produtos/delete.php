<?php

$id = $_GET['id'] ; 

$url = 'http://localhost/api/produtos/'.$id;
$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE"); 
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
]);

$response = curl_exec($curl);
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

$data = json_decode($response, true);

curl_close($curl);

if(isset($data['mensagem'])) {
    header('Location: /app/produtos/grid.php'); 
}