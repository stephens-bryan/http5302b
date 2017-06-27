<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-06-13
 * Time: 5:55 PM
 */

date_default_timezone_set('America/Toronto');

require_once "../includes/admin_head.php";
require_once "../includes/admin_nav.php";

require_once "includes/header.php";

    //store $id from $_POST in var
    $id = $_POST['id'];

    //call getStudentById on $student object

    $singleStu = $student->getStudentById($id);

    //assign all values from $singleStu array to vars to use in form
    $profileImg = $singleStu['ProfileImg'];
    $firstName = $singleStu['FirstName'];
    $lastName = $singleStu['LastName'];
    $stuNum = $singleStu['StudentNumber'];
    $email = $singleStu['ContactEmail'];
    $lastUpdate = $student->getDate();
    $contactNum = $singleStu['ContactNumber'];
    $currJob = $singleStu['CurrentJob'];

    //populate update form with existing fields from database

    //call update method on $student object when form is submitted
    if(isset($_POST['update'])){

        $profileImgUp = $_POST['profile_img'];
        $firstNameUp = $_POST['first_name'];
        $lastNameUp = $_POST['last_name'];
        $stuNumUp = $_POST['student_num'];
        $emailUp = $_POST['contact_email'];
        $contactNumUp = $_POST['contact_num'];
        $currJobUp = $_POST['current_job'];
        $id = $_POST['id'];

        //call update method
        $student->updateStudent($profileImgUp, $firstNameUp, $lastNameUp, $stuNumUp, $emailUp, $lastUpdate, $contactNumUp, $currJobUp, $id);

        header('Location: list_student.php');

    }//end if isset update
?>


    <h3>Update Student</h3>

    <form action"<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div>
        <input type="hidden" name="id" value="<?= $id; ?>">
    </div>
    <div>
        <label for="profile_img">Profile Image:</label>
        <input type="text" name="profile_img" id="profile_img" placeholder="Profile Image..." value="<?= $profileImg; ?>">
    </div>
    <div>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" placeholder="First Name..." value="<?= $firstName; ?>">
    </div>
    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" placeholder="Last Name..." value="<?=$lastName; ?>">
    </div>
    <div>
        <label for="student_num">Student Number:</label>
        <input type="text" name="student_num" id="student_num" placeholder="Student Number..." value="<?= $stuNum; ?>">
    </div>
    <div>
        <label for="contact_email">Email:</label>
        <input type="text" name="contact_email" id="contact_email" placeholder="Email..." value="<?= $email; ?>">
    </div>
    <div>
        <label for="contact_num">Number Contact:</label>
        <input type="text" name="contact_num" id="contact_num" placeholder="Contact Number..." value="<?= $contactNum; ?>">
    </div>
    <div>
        <label for="current_job">Current Job:</label>
        <input type="text" name="current_job" id="current_job" placeholder="Current Job..." value="<?= $currJob; ?>">
    </div>
    <input type="submit" name="update" value="update" class="btn">
    </form>

<?php
require_once "includes/footer.php";
?>
