<?php
require_once "includes/header.php";
require_once "models/db.php";


$db = DbConnect::getDB();

$passErr="";
$emailErr="";
$loginErr="";
$valid = true;

if (isset($_POST['submit'])) {
  //validate email
  if(empty($_POST['email'])) {
    $emailErr="Please enter your email";
    $valid = false;
  }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $emailErr="Please enter correct email format";
    $valid = false;
  }
  //validate password
  if(empty($_POST['pass'])) {
    $passErr="Please enter password";
    $valid = false;
  } 

  if($valid) {
    $sql = "SELECT * FROM Accounts WHERE Email = :email";
    $stm = $db->prepare($sql);
    $stm->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $stm->execute();
    $userdetails = $stm->fetch();

    $hashPass = $userdetails['PasswordHash'].$userdetails['PasswordSalt'];
    $account = array("RoleId"=>$userdetails['RoleId'],"UserName"=>$userdetails['UserName'],"Email"=>$userdetails['Email']);



    if($_POST['pass']==$userdetails['PasswordHash']){   /*password_verify($hashPass, $userdetails['passwordHash'])*/

      //if user is an admin
      if($userdetails['RoleId']==1){

        //getting this users detail from admin table
        $sql = "SELECT * FROM Admins WHERE AccountId = :id";
        $stm = $db->prepare($sql);
        $stm->bindValue(':id', $userdetails['Id'], PDO::PARAM_STR);
        $stm->execute();
        $admin = $stm->fetch();
        //merging new result with the account detail array
        $user = array_merge($account,$admin);
        $_SESSION['user'] = $user;
        header("Location: ./Dashboard/index.php");
      //if user is a student
      }else if ($userdetails['RoleId']==2){

        //getting this users detail from admin table
        $sql = "SELECT * FROM Admins WHERE AccountId = :id";
        $stm = $db->prepare($sql);
        $stm->bindValue(':id', $userdetails['Id'], PDO::PARAM_STR);
        $stm->execute();
        $admin = $stm->fetch();
        //merging new result with the account detail array
        $user = array_merge($account,$admin);
        $_SESSION['user'] = $user;
        header("Location: ./Dashboard/index.php");
      //if user is a student
      }else if ($userdetails['RoleId']==3){

        //getting this users detail from admin table
        $sql = "SELECT * FROM Students WHERE AccountId = :id";
        $stm = $db->prepare($sql);
        $stm->bindValue(':id', $userdetails['Id'], PDO::PARAM_STR);
        $stm->execute();
        $student = $stm->fetch();
        //merging new result with the account detail array
        $user = array_merge($account,$student);
        var_dump($user);
        $_SESSION['user'] = $user;
        header("Location: my-projects.php");
      }
    }else {
      $loginErr="invalid login";
    }

  }

}

?>
<body>

    <main class="no-sidebar">
    <div class="container">
        <div class="row" id="studentLoginPage__mainCont">

            <!--CONTENT GOES IN HERE: Please use the Materialize grid system!-->

            <div class="col s12">

            <img src="img/humber-logo-webDevPortal.png" id="studentLoginPage__logo">
            <form id="studentLoginPage__form" method="post">

                  <input id="studentLoginForm__emailField" type="text" placeholder="Email Address" name="email" value="<?php //if(!empty($_POST['email'])){echo $_POST['email']} ?>"> <span><?php echo $emailErr ?></span>

                  <input id="studentLoginForm__passwField" type="password" placeholder="Password" name="pass">  <span><?php echo $passErr ?></span>
                <span><?php echo $loginErr ?></span>
                <p><?php echo $emailErr ?></p>

                <div id="studentLoginForm__promptLoginCont">
                <a href="forgot-password.php" id="studentLoginForm__passwPrompt">Forgotten Your Password?</a>
                <input type="submit" value="Login" class="studentLoginForm__loginBtn btn" name="submit">
                </div>
            </form>
            </div>

        </div>
    </div>
    </main>
</body>

<?php

require_once "includes/footer.php";
?>
