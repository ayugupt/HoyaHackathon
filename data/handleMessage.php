<?php

$message = $_GET['mssg'];
$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, 'https://med-chain.herokuapp.com/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'mssg:'.$message
));


$response = curl_exec($ch);
curl_close($ch);
echo $response;

?>