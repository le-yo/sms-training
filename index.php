<?php

//echo "Hello world";

//declaring variables:

//integer declaration
//$i = 1;
//echo $i;

//string

$name = "Steve";

showOutput($name);
//echo $name;

//$payment_status = TRUE;
//echo $payment_status;

//mathematical operations

//logical operations
/*$i = 1;
$j = 2;

$z = $i - $j;

echo $z;
*/

//arrays

$phone_numbers = ["25423809824",'3454556','+345345',34534534];

$phone_no = array("345345","345345");

$message = "Download ringtone from www.devs.mobi/rington.mp3";
//phone number at this point
//$phone_no = array(0=>'1234', 1=>'234234');
//at this point
//print_r($phone_no);

$output = array('numbers'=>$phone_no,'message'=>$message);
//print_r($output);

//foreach ($phone_numbers as $key => $value){
//	//echo $value;
//	// sms
//	echo "<br> Message sent successfully to ".$value;
//}
for($i=0;$i<=count($phone_numbers);$i++){

	echo "<br> Message sent successfully to ".$phone_no[$i];

}

//functions in php

//I want to reach all my customers via SMS

//nouns: Customers, SMS

//verbs: reach

//Customer: phone_number

//SMS: message, recipient(customer)

//actors: customer, owner (admin), staff,

//admin, staff should have the ability to send a message




function showOutput($output){
	print_r($output);
}



















?>