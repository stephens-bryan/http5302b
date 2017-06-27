<?php


require_once "includes/header.php";
require_once 'models/db.php';
include 'models/password-dao.php';

$db = DbConnect::getDb();	
$passwordCtrl = new PasswordDAO($db);



	if(isset($_POST['submit'])){
		// store inputted email into a variable
		$uemail = $_POST['uemail'];
		
		// cross reference email against students table. If a row is returned then perform the following
		if($passwordCtrl->checkUser($uemail)=="true"){
			// retrieve the accountId from the students table, this will help us get the info from the accounts tables
			$accountId = $passwordCtrl->UserID($uemail);
			//generate random token using method
			$token = $passwordCtrl->generateRandomString();
			//insert the token in the empty Token field where the accountId matches
			$query = $passwordCtrl->tokenInsert($accountId,$token);
			
			// if the insert is successful then perform the following
			if($query == 1){
				//store the root of the url link into a variable to be passed into the mailreset
				$uri = $_SERVER['HTTP_HOST'];
				var_dump($uri);
				// pass the user email, token and uri through the mailreset method.
				$mailReset = $passwordCtrl->mailReset($uemail, $token, $uri);

				
				if($mailReset == 'true'){
					$msg = 'A mail with recovery instruction has sent to your email';
					$msgclass = 'green-text';
				}else{
					$msg = 'Problem sending email';
					$msgclass = 'red-text';

				} 
			}else{
				$msg = 'Failed to generate token';
				$msgclass = 'red-text';

			}
		}else{
			$msg = "This email doesn't exist in our database.";
			$msgclass = 'red-text';

		} 
	}


?>

<body>
    <main class="no-sidebar">
    <div class="container">  
        <div class="row" id="studentLoginPage__mainCont">
		
    	 
            <div class="col s12">
			<img src="img/humber-logo-webDevPortal.png" id="studentLoginPage__logo">   

        	<form class="form-horizontal" role="form" method="post">
			    <h2>Forgot Your Password?</h2>

				<?php if(isset($msg)) {?>
                    <div class="<?php echo $msgclass; ?>" style="padding:5px;"><?php echo $msg; ?></div>
                <?php } ?>

                <div class="row">
					<div class="col s8 offset-s2 col l8 offset-l2"> 
						   <p class="center-align">No problem, we will fix it. Just type your email below and we will send you password recovery instruction to your email. </p>
						   <p class="center-align">Follow easy steps to get back to your account.</p>
					</div>
				</div>
   
                <div class="row">
                    <div class="col s8 offset-s2 col l8 offset-l2">
                        <input class="form-control" name="uemail" type="email" placeholder="Enter your email here" required>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-lg-12">
                        <input type="submit" value="Submit" class="btn" name="submit">
                    </div>
                </div>
			</form>
		</div>   

	</div>
    
    </div>
	</main>
</body> 
