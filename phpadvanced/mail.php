<!DOCTYPE html>
<html>
<head>
	<title>Send mail from PHP using SMTP</title>
</head>
<body>
<hr>
	<?php 
		if(isset($_POST['sendmail'])) {
			require 'PHPMailerAutoload.php';
            require 'credentials.php';

			$mail = new PHPMailer;

			 //$mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'Anonymous');
			$mail->addAddress($_POST['email']);     // Add a recipient

			$mail->addReplyTo(EMAIL);
            //print_r($_FILES['file']); exit;
			for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
				$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
			}
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Welcome';
			$mail->Body    = 'Thank you for your submission';
			$mail->AltBody = 'Welcome';

			
		}
	 ?>
        <form role="form" method="post" enctype="multipart/form-data">
            <label for="email">To Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" maxlength="50">
            <button type="submit" name="sendmail">Send</button>
            <?php
                if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
            ?>
    </form>
</body>
</html>