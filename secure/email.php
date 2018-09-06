<?
if(!function_exists('send_email'))
{
	function send_email($to,$subject,$body)
	{
		require 'mundpmailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->SMTPDebug = 0;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'noreply@modelundp.org';                 // SMTP username
		$mail->Password = 'modelundp2019';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('noreply@modelundp.org', 'ModelDP Notifications');
		$mail->addAddress($to);

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = $body;
		$mail->AltBody = strip_tags($body);

		if(!$mail->send()) {
				return $mail->ErrorInfo;
		} else {
				return 'sent';
		}
	}
}
