<?php

$sessionId   = $_REQUEST["sessionId"];
$serviceCode = $_REQUEST["serviceCode"];
$phoneNumber = $_REQUEST["phoneNumber"];
$text        = $_REQUEST["text"];

//$response = "This is a test";

//Mshwari Mockup

//*384*2014#
//switch
if(!empty($text)){
    $exploded_text = explode("*", $text);

    $level = count($exploded_text);
}else{
    $level = 0;
}
//print_r(count($exploded_text));
//exit;

switch (trim(strtolower($level))) {

    case 0:
        $response = getHomeMenu();
        break;
    case 1:
        $response = firstMenuSwitch(end($exploded_text));
        break;
    case 2:
        $response = secondMenuSwitch($exploded_text);

        break;

    default:
        $response = "This is x levels higher than the home menu";
        break;

}






header('Content-type: text/plain');
echo "CON ".$response;
exit;

function getHomeMenu(){
    $response = "Welcome to Mitch Money".PHP_EOL."1.Request Loan".PHP_EOL."2.Pay Loan".PHP_EOL."3.Check Loan Limit";
    return $response;
}

function firstMenuSwitch($choice){
    switch (trim(strtolower($choice))) {

        case 1:
            $response = "Enter loan amount";
            break;
        case 2:
            $response = "Pay from".PHP_EOL."1:MPESA".PHP_EOL."2.Mshwari";
            break;
        case 3:
            $response = "Enter PIN";
            break;
        default:
            $response = "Invalid Entry.".PHP_EOL.getHomeMenu();
            break;

    }

    return $response;
}

function secondMenuSwitch($exploded_text){

    switch (trim(strtolower($exploded_text[0]))) {

        case 1:
            $response = "Enter PIN";
            break;
        case 2:
            //validate whether it is 1 or 2
            if($exploded_text[1] == 1){
                $response = "You are paying from MPESA";
            }elseif($exploded_text[1] == 2){
                $response = "You are paying from MSHWARI";
            }else{
                $response = "Invalid Response";
            }

            break;
        case 3:
            $response = "Your loan limit is Ksh 3000";
            break;
        default:
            $response = "Invalid Entry.".PHP_EOL.getHomeMenu();
            break;

    }
    return $response;
}
