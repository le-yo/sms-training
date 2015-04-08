<?php


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

?>