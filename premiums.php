<?php

//kagai's story:

//The normal sales cycle of insurance.

//Agent approaches you with a product and gives you details

//User register by SMS (Name, age, Id). Confirmation message is here

//pay 100 bob per month via MPESA

//Receive confirmation that insurance is active

//5 days to expiry it should send an alert message for renewal

//insured person should query on the status of the insurance. Send STATUS you
//insurance is active or the next x days.

//Ask questions, feedback, idea to insurance company.

//send a renewal message 5 days before expiry of insurance.

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

