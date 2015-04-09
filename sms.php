<?php
require_once('connect.php');
//Dog
//get users phone
$phone = $_REQUEST['from'];

//get users message
$message = $_REQUEST['message'];

createUser($phone);

//check if the users message is dog

if(trim(strtolower($message)) == 'dog'){
    $reply = "A dog is a domestic animal";

}else{
    $reply = "We don't know what animal that is";

}

sendOutput($reply,$phone);
exit;


function createUser($phone){
    //check if the phone number exists
    $query = mysql_query("SELECT phone FROM users WHERE phone='$phone'");
    if(mysql_num_rows($query)> 0){
        //do nothing
    }else{
       //create the user
    $query = mysql_query("INSERT INTO users (phone) VALUES ('$phone')");
    }
    return $query;
}



function sendOutput($msg,$number){
    //lets add the variables to the records array
//     if(is_array($msg)){
//         $records[0]= array( 'message' => $msg[0], 'to' => $number[0]);
//         $records[1]= array( 'message' => $msg[1], 'to' => $number[1]);
//     }else{
    $records[]= array( 'message' => $msg, 'to' => $number);
//     }
    $sms_array= array();
    $sms_array[] = array('success'=>"true",'secret'=>"",'task'=>"send",'messages'=>$records);
    $payload= array('payload'=>$sms_array[0]);
    header('content-type: application/json; charset=utf-8');
    echo json_encode($payload);
    exit;
}





