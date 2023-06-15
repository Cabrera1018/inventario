<?
if(isset($_POST['submit']))
{
	$User_name = $_POST['nombre'];
	$phone = $_POST['telefono'];
	$user_email = $_POST['correo'];
	$user_message = $_POST['mensaje'];

	$email_from = 'safewallet1@safewallet.com';
	$email_subject = "New Form Submission";
	$email_body = "Name: $User_name.\n".
					"Phone No: $phone.\n".
					"Email Id: $user_email.\n".
					"User Message: $user_message.\n".;

	$to_email = "safewallet1@gmail.com";
	$headers = "From: $email_from \r\n";
	$headers .= "Reply-To: $user_email \r\n";

	$secretKey = "6LeIaqYUAAAAAPh-izTr5g6NQa9mqPbWloOTotjo";
	$responseKey = $_POST['g-recaptcha-response'];
	$UserIP = $_SERVER['REMOTE_ADDR'];
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

	$response = file_get_contents($url);
	$response = json_decode($response);


	if ($response->success)
	{
		mail($to_email,$email_subject,$email_body,$headers);
		echo "Message Sent Successfully";
	}
	else
	{
		echo "<span>Invalid Captcha, Please Try Again</span";
	}

}
?>