<?php

require_once 'includes/header.php';
require 'models/db.php';
include 'models/password-dao.php';

$db = DbConnect::getDb();	
$passwordCtrl = new PasswordDAO($db);


$uemail = $_GET['email'];
$token = $_GET['token'];

$accountId = $passwordCtrl->UserID($uemail); 

$verifytoken = $passwordCtrl->verifytoken($uemail, $token);

if(isset($_POST['submit']))
{
	$new_password = $_POST['new_password'];
	$retype_password = $_POST['retype_password'];
	
	if($new_password == $retype_password)
	{
		$update_password = $passwordCtrl->updatePassword($new_password,$accountId);

		if($update_password === true)
		{
				$destoryToken = $passwordCtrl->updateToken();

				if($destoryToken == true){
					$msg = 'Your password has changed successfully. Please login with your new passowrd.';
					$msgclass = 'bg-success';
				}else{
					$msg = "Update was unsuccessful";
					$msgclass = "bg-danger";
					return false;
				}
		}
	}else
	{
		 $msg = "Password doesn't match";
		 $msgclass = 'bg-danger';
		 return false;
	}
	
}


?>

<body>
    <main class="no-sidebar">
    <div class="container"> 
		<div class="row" id="studentLoginPage__mainCont">
   
		<?php if($verifytoken == 'true') { ?>
    	 <div class="col s12">
			<img src="img/humber-logo-webDevPortal.png" id="studentLoginPage__logo"> 
        

        	<form class="form-horizontal" role="form" method="post">
			    <h2>Reset Your Password</h2>

				<?php if(isset($msg)) { ?>
                    <div class="<?php echo $msgclass; ?>" style="padding:5px;"><?php echo $msg; ?></div>
                <?php } ?>
    
                <div class="row">
                    <div class="col-lg8 offset-l2">
                    <label class="control-label"></label>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-lg8 offset-l2">
                        <input class="form-control" name="new_password" type="password" placeholder="New Password" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg8 offset-l2">
                    <label class="control-label"></label>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-lg8 offset-l2">
                        <input class="form-control" name="retype_password" type="password" placeholder="Re-type New Password" required>
                    </div>
                </div>
    
                 <div class="row">
                    <div class="col-lg-12">
                        <input type="submit" value="Submit" class="btn" name="submit">
					</div>
                 </div>
			</form>
		</div>
        
        <?php }else {?>
	    	<div class="col-lg-4 col-lg-offset-4">
   		       	<h2>Invalid or Broken Token</h2>
	            <p>Opps! The link you have come with is maybe broken or already used. Please make sure that you copied the link correctly or request another token from <a href="forgetPassword.php">here</a>.</p>
			</div>
        <?php }?>
           
        
            

	</div>
    
  
</div>    






















<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
