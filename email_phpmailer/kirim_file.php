<pre>
	<?php

	require "phpmailer/PHPMailerAutoload.php";
	$mail = new PHPMailer();


	$body = "
	<h3>Ini adalah testing PHP Mailer</h3>
	<p>
	Langkah Langkah konfigurasi di email :
	<br>
	1. Buka akun gmail.
	<br>
	2. Klik Menu MyAccount
	<br>
	3. Pilih sign in and security, 
	<br>
	4. Aktifkan Apps with Account Less
	</p>
	"; 
	// $body = preg_replace("/[]/","",$body);

	$mail->IsSMTP(); // telling the class to use SMTP

	// TAMBAHAN
	// Menggunakan SMTP option. Agar jika localhost pakai SSL tetep kekirim emailnya.
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);

	$mail->Host = "smtp.gmail.com"; // SMTP server 
	$mail->SMTPDebug = 2; // enables SMTP debug information (for testing) // 1 = errors and messages // 2 = messages only 
	$mail->SMTPAuth = true; // enable SMTP authentication 
	$mail->SMTPSecure = "tls"; // sets the prefix to the servier 
	$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server 
	$mail->Port = 587; // set the SMTP port for the GMAIL server 
	// $mail->Username = "teamtrainit@gmail.com"; // GMAIL username 
	$mail->Username = "alifatur212@gmail.com"; // GMAIL username 
	$mail->Password = "wingardium"; // GMAIL password

	$mail->SetFrom('alifatur212@gmail.com', 'Ali Fatur R');

	$mail->AddReplyTo("alifatur212@gmail.com","Ali Fatur R");

	$mail->Subject = "Tes Kirim Email Dengan PHP Mailer";

	$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

	$mail->MsgHTML($body);

	// $address = "alifatur212@gmail.com"; 
	$address = "alifatur323@gmail.com"; 
	$mail->AddAddress($address, "Ali Fatur R");

	// $mail->AddAttachment("images/phpmailer.gif"); // attachment 
	// $mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

	if(!$mail->Send())
	{
		echo "<pre>";
		echo "Mailer Error: " . $mail->ErrorInfo;
		echo "</pre>";
	} 
	else
	{
		echo "Message sent!";
	}
	?>
</pre>




<!--
Langkah Langkah konfigurasi di email :
1. Buka akun gmail.
2. Klik Menu MyAccount
3. Pilih sign in and security, 
4. Aktifkan Apps with Account Less
-->