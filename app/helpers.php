<?php

// use Mail;


function sendOtpOnMail($email,$name,$otp){

	$data = array(
		'name'	=>	$name,
		'email'	=>	$email,
		'otp'	=>	$otp,
	);

	try{
      	Mail::send('mailtemplate/sendotp', $data, function($message) use($email,$name){
        	$message->to($email, $name)
        			->subject('Otp Verification')
         			->from('developermanish95@gmail.com','Ecommerce');
      	});
	}catch(Exception $e){
		echo 'Message: ' .$e->getMessage();
	}



}