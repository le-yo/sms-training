<?php

$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

$response = "This is a test";

header('Content-type: text/plain');
echo "END ".$response;
exit;
