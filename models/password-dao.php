<?php

class PasswordDAO
{
	private $_db;

	public function __construct ($dbConnection)
	{
		$this->_db = $dbConnection;
	}

	public function checkUser($email){
		$query = "SELECT id FROM students WHERE ContactEmail = :email";
		$pdostmt = $this->_db->prepare($query);
		$pdostmt->bindValue(':email', $email);
		$pdostmt->execute();
		$num_of_rows = $pdostmt->fetchColumn();
		if($num_of_rows > 0){
			return 'true';
		}else{
			return 'false';
		}
	}

	public function UserID($email){
		$query = "SELECT AccountId FROM students WHERE ContactEmail = :email";
		$pdostmt = $this->_db->prepare($query);
		$pdostmt->bindValue(':email',$email);
		$pdostmt->execute();

		$row = $pdostmt->fetch();
		return $row['AccountId'];
	}

	public function tokenInsert($accountId,$token){
		$query = "UPDATE accounts SET Token = :token WHERE Id = :accountId";
		$pdostmt = $this->_db->prepare($query);
		$pdostmt->bindValue(':accountId',$accountId);
		$pdostmt->bindValue(':token', $token);
		$pdostmt->execute();

		return true;

	}

	public function generateRandomString(){
		$length = 20;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 		$charactersLength = strlen($characters);
        $randomString = '';

		for ($i = 0; $i < $length; $i++){
 			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
    	return md5($randomString);
	}

	public function mailReset($to, $token, $uri){

		date_default_timezone_set('Etc/UTC');
		
		require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->SMTPDebug = 2;
		$mail->Debugoutput = 'html';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPsecure = 'tls';
        $mail->SMTPAuth = true;
 		
		$mail->Username = "humberportfolio17@gmail.com";
		$mail->Password = "humber1234";

		$mail->setFrom('humberportfolio17@gmail.com', 'Humber Portfolio');
		$mail->addReplyTo('dontreplyto@email.com', 'Dont Reply');
		$mail->addAddress($to);

		$mail->Subject = 'Password Recovery Instruction';
		$link = $uri.'/forget.php?email='.$to.'&token='.$token;
		$mail->msgHTML ("<b>Hello,</b><br><br>You have requested for your password recovery. <a href='$link' target='_blank'>click here</a> to reset your password. If you are unable to click the link then copy the below link and paste in your browser to reset your password.<br><br><i>". $link."</i>");
		$mail->AltBody = 'Hello, You have requested for your password recover. Please use this link to reset your password'.$link;

		if($mail->send()) {
   			return 'true';
		} else {
    		return 'false';
		}	
}

	public function verifytoken($email, $token){
		$query = "SELECT * FROM accounts WHERE Email = :email AND token = :token";
		$pdostmt = $this->_db->prepare($query);
		$pdostmt->bindValue(':email',$email);
		$pdostmt->bindValue(':token',$token);
		$pdostmt->execute();
		$num_of_rows = $pdostmt->fetchColumn();
		
		if($num_of_rows > 0){
			return 'true';
		}else{
			return 'false';
		}
	}

	public function updatePassword($newPass, $accountId){
		$query = "UPDATE accounts SET PasswordSalt = :newPass WHERE Id = :accountId";
		$pdostmt = $this->_db->prepare($query);
		$pdostmt->bindValue(':newPass',$newPass);
		$pdostmt->bindValue(':accountId', $accountId);
		$pdostmt->execute();

		return true;
				
	}

	public function updateToken(){
		$query = "UPDATE accounts SET Token = ''";
		$pdostmt = $this->_db->prepare($query);
		$pdostmt->execute();

		return true;
	}

}

