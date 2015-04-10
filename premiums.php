<?php
include('connect.php');
//kagai's story:

//The normal sales cycle of insurance.

//Agent approaches you with a product and gives you details

// 1. User register by SMS (Name, age, Id). Confirmation message is here

$phone = $_REQUEST['from'];
$message = $_REQUEST['message'];


//switch

    switch (trim(strtolower($message))) {

        case "status" :
            $reply = checkInsuranceStatus($phone);
            //checking insurance status
            break;
        default:
            if(strpos($message, "#")){
                $reply = registerUser($phone,$message);
            }else{
            $reply = "We did not understand your message.";
            }
            break;

    }

sendOutput($reply,$phone);



//2. insured person should query on the status of the insurance. Send STATUS you
//insurance is active or the next x days.

//3. pay 100 bob per month via MPESA

//4. Receive confirmation that insurance is active

//cron jobs
//5 days to expiry it should send an alert message for renewal
//send a renewal message 5 days before expiry of insurance.

//Ask questions, feedback, idea to insurance company.


//Nouns

/*
 * 1. User, message(phone,message,timestamp,type), payment(amount,user,what),
 *  insurance (status, expiry date), questions(user), fb (user),idea (user)
 */

//Verbs
/*
 * 2. (user) register, (system) sendConfirmation, (user) pays, (system)
 * sends renewal message
 *
 *
 */


//assume a user will register by sending name#id#age   for example Leo Korir#3423423#25

//read about explode in php
//explode the message Leo Korir#34343#25

//array of items 0 - name, 1 - id, 2 - age

//createUser with the above details.

function checkInsuranceStatus($phone){


    $query = mysql_query("SELECT status FROM insurance WHERE phone='$phone'");
    if(mysql_num_rows($query)> 0){
        //check insurance status
        $row = mysql_fetch_array($query);

        $status = $row['status'];
        if($status == 1){
            return "Your insurance is active";
        }else{
            return "Your insurance is not active";
        }
    }else{
        //create the user insurance
       return "You are not registered. Please register first in order to check status";
    }

}
function registerUser($phone,$message)
{
    $exploded = explode("#", $message);
    $name = $exploded[0];
    $national_id = $exploded[1];
    $age = $exploded[2];

    //check if the user exists
    $query = mysql_query("SELECT phone FROM users WHERE phone='$phone'");
    if(mysql_num_rows($query)> 0){
        return "You are already registered";
    }else{
        //create the user
        $result = mysql_query("INSERT INTO users (phone,name,age,national_id) VALUES ('$phone','$name','$age','$national_id')");

        if($result){
            createUserInsurance($phone,$message);
            $reply = "You are registered successfully. Please send 100 bob to activate your insurance";
            return $reply;
        }
       // return $query;
    }


}

function createUserInsurance($phone,$message)
{

    //check if the user insurance exists
    $query = mysql_query("SELECT phone FROM insurance WHERE phone='$phone'");
    if(mysql_num_rows($query)> 0){
        return FALSE;
    }else{
        //create the user insurance
        $query = mysql_query("INSERT INTO insurance (phone,status) VALUES ('$phone','0')");
        return $query;
    }

}

//send output function

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