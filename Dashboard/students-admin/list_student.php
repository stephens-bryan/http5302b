<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-06-13
 * Time: 12:59 PM
 */
require_once "../includes/admin_head.php";
require_once "../includes/admin_nav.php";

//require header
require_once "./includes/header.php";

    $listStudents = $student->getStudents();

?>

<h1>List Students</h1>

    <a href="add_student.php">Add Student</a>

<!-- Output student information into table using a foreach-->

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Student Number</th>
            <th>Contact Email</th>
            <th>Last Update</th>
            <th>Contact Number</th>
            <th>Current Job</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($listStudents as $students){?>
        <tr>
            <td><?= $students["Id"]; ?></td>
            <td><?= $students["FirstName"]; ?></td>
            <td><?= $students["LastName"]; ?></td>
            <td><?= $students["StudentNumber"]; ?></td>
            <td><?= $students["ContactEmail"]; ?></td>
            <td><?= $students["LastUpdate"]; ?></td>
            <td><?= $students["ContactNumber"]; ?></td>
            <td><?= $students["CurrentJob"]; ?></td>
            <!-- Update Student-->
            <td><form action="update_student.php" method="post">
                    <input type="hidden" name="id" value="<?= $students["Id"]; ?>">
                    <input type="submit" name="submit" value="EDIT" class="btn">
                </form></td>
            <!-- Delete Student -->
            <td><form action="delete_student.php" method="post">
                    <input type="hidden" name="id" value="<?= $students["Id"]; ?>">
                    <input type="submit" name="submit" value="DELETE" class="btn">
                </form></td>
        </tr>
        <?php }?>
    </tbody>

    </table>



<?php
    require_once "includes/footer.php";
?>
