<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-06-13
 * Time: 1:29 PM
 */
require_once "../includes/admin_head.php";
require_once "../includes/admin_nav.php";

//require header
require_once "includes/header.php";


//check if form has been submitted
    if(isset($_POST['submit'])){
        //account fields
        $roleId = 3;
        //generate random password 8 characters long
        $pwd = bin2hex(openssl_random_pseudo_bytes(4));
        //generate random password salt, 20 characters long as per database
        $salt = bin2hex(openssl_random_pseudo_bytes(10));
        //append salt to password and hash using password hash
        $pwdSalt = $pwd . $salt;
        $passHash = password_hash($pwdSalt, PASSWORD_DEFAULT);

        $activated = 1;


        //assign all form fields to vars
            //Profile Image
            $profileImg = $_POST['profile_img'];
            //First Name
            $firstName = $_POST['first_name'];
            //Last Name
            $lastName = $_POST['last_name'];
            //Student Number
            $studentNum = $_POST['student_num'];

            //set $username equal to $studentNum for account insertion
            $username = $studentNum;

            //Email
            $email = $_POST['contact_email'];

            //Phone Number
            $phoneNum = $_POST['contact_num'];
            //Current Job
            $currentJob = $_POST['current_job'];

            //get date for Last Update
            $lastUpdate = $student->getDate();

            //add account
            $row = $account->addAccount($roleId, $username, $email, $salt, $passHash, $activated);

            //if $row is true, do something
            if($row){

                //send mail with needed info to added user
                //Recipient
                //$to = $email;
                /*
                $to = 'ericsmth884@gmail.com';

                //Subject
                $subject = 'Welcome to Humberfolio!';

                //Message
                $message = '<h1>Hi There</h1><p>Welcome to Humberfolio. please use username: ' .$username . ' and password: '.
                    $pwd . ' to log on. Please change your password immediately.</p>';

                //Headers
                $headers = "From: The Admin Name <admin@admin.com>\r\n";
                $headers .= "Reply-To: replyto@admin.com\r\n";
                $headers .= "Content-type: text/html\r\n";

                //send email
                mail($to, $subject, $message, $headers);
                */
                $id = $account->getId($username);

                $accountId = $id['Id'];

                $student->addStudent($accountId, $profileImg, $firstName, $lastName, $studentNum, $email, $lastUpdate, $phoneNum, $currentJob);

                header('Location: list_student.php');
            }
    }//end isset $_POST['submit']

?>

<h1>Add Student</h1>

<form action"<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div>
        <label for="profile_img">Profile Image:</label>
        <input type="text" name="profile_img" id="profile_img" placeholder="Profile Image...">
    </div>
    <div>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" placeholder="First Name...">
    </div>
    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" placeholder="Last Name...">
    </div>
    <div>
        <label for="student_num">Student Number:</label>
        <input type="text" name="student_num" id="student_num" placeholder="Student Number...">
    </div>
    <div>
        <label for="contact_email">Email:</label>
        <input type="text" name="contact_email" id="contact_email" placeholder="Email...">
    </div>
    <div>
        <label for="contact_num">Number Contact:</label>
        <input type="text" name="contact_num" id="contact_num" placeholder="Contact Number...">
    </div>
    <div>
        <label for="current_job">Current Job:</label>
        <input type="text" name="current_job" id="current_job" placeholder="Current Job...">
    </div>
    <input type="submit" name="submit" value="Add" class="btn">
</form>



<?php
//require footer
require_once"includes/footer.php";
?>
