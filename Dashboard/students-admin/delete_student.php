<<<<<<< origin/master
<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-06-13
 * Time: 5:37 PM
 */
require_once "../includes/admin_head.php";
require_once "../includes/admin_nav.php";

require_once"includes/header.php";

    //assign id
    $id = $_POST['id'];

    //if delete confirmed, delete student, redirect to list.
    if(isset($_POST['yes'])){

        $id = $_POST['id'];
        //call delete method on student object
        $row = $student->deleteStudent($id);

        header('Location: list_student.php');
    }

    //if no, redirect back to list
    if(isset($_POST['no'])){
        header('Location: list_student.php');
    }

    /*
    //call delete method on student object
    $row = $student->deleteStudent($id);

    if($row){
        //get the account id from student id
        var_dump($id);

        $accountId = $student->getAccountId($id);

        var_dump($accountId);

        $account->deleteAccount($id);
    }
    */

?>
<<<<<<< origin/master
<h3>Delete Student</h3>
=======
<h1>Delete Student</h1>
>>>>>>> HEAD~4

<p>Are you sure you want to delete student <?= $id; ?>?</p>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <input type="submit" name="yes" value="Yes" class="btn">
    <input type="Submit" name="no" value="No" class="btn">
</form>



<?php
    require_once "includes/footer.php";
?>
=======
<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-06-13
 * Time: 5:37 PM
 */
require_once "../includes/admin_head.php";
require_once "../includes/admin_nav.php";

require_once"includes/header.php";

    //assign id
    $id = $_POST['id'];

    //if delete confirmed, delete student, redirect to list.
    if(isset($_POST['yes'])){

        $id = $_POST['id'];
        //call delete method on student object
        $row = $student->deleteStudent($id);

        header('Location: list_student.php');
    }

    //if no, redirect back to list
    if(isset($_POST['no'])){
        header('Location: list_student.php');
    }

    /*
    //call delete method on student object
    $row = $student->deleteStudent($id);

    if($row){
        //get the account id from student id
        var_dump($id);

        $accountId = $student->getAccountId($id);

        var_dump($accountId);

        $account->deleteAccount($id);
    }
    */

?>
<h1>Delete Student</h1>

<p>Are you sure you want to delete student <?= $id; ?>?</p>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <input type="submit" name="yes" value="Yes" class="btn">
    <input type="Submit" name="no" value="No" class="btn">
</form>



<?php
    require_once "includes/footer.php";
?>
>>>>>>> HEAD~3
