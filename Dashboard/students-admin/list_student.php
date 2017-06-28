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
//require search class
require_once "../../functions/SearchFunctions/search.php";

    //call list students on student object
    $listStudents = $student->getStudents();

    //if search has been submitted, store results for output
    if(isset($_GET['search'])){
        //store search term
        $searchTerm = $_GET['searchTerm'];
        //new search object
        $searchObj = new Search();
        $searchResults = $searchObj->searchStudents($db, $searchTerm);
    }


?>
<h3>All Students</h3>
    <form method="get" action="<?= $_SERVER['PHP_SELF']; ?>" class="row valign-wrapper">
        <div class="input-field col s11">
            <input type="text" id="searchTerm" name="searchTerm">
            <label for="searchTerm">Search Students</label>
        </div>
        <div class="col s1">
            <button type="submit" name="search" class="btn-floating"><i class="material-icons">search</i></button>
        </div>
    </form>

<?php if(isset($searchResults)){foreach($searchResults as $results) {

    echo "<table>" .
            "<thead>" .
                "<tr>" .
                    "<th>" . 'Id' . "</th>" .
                    "<th>" . 'First Name' . "</th>" .
                    "<th>" . 'Last Name' . "</th>" .
                    "<th>" . 'Student Number' . "</th>" .
                    "<th>" . 'Contact Email' . "</th>" .
                    "<th>" . 'Last Update' . "</th>" .
                    "<th>" . 'Contact Number' . "</th>" .
                    "<th>" . 'Current Job' . "</th>" .
                    "<th>" . 'Edit' . "</th>" .
                    "<th>" . 'Delete' . "</th>" .
                "</tr>" .
            "</thead>" .
            "<tbody>";


    ?>
    <tr>
        <td><?= $results["Id"]; ?></td>
        <td><?= $results["FirstName"]; ?></td>
        <td><?= $results["LastName"]; ?></td>
        <td><?= $results["StudentNumber"]; ?></td>
        <td><?= $results["ContactEmail"]; ?></td>
        <td><?= $results["LastUpdate"]; ?></td>
        <td><?= $results["ContactNumber"]; ?></td>
        <td><?= $results["CurrentJob"]; ?></td>
        <!-- Update Student-->
        <td><form action="update_student.php" method="post">
                <input type="hidden" name="id" value="<?= $students["Id"]; ?>">
                <button type="submit" name="submit" class="btn-floating"><i class="material-icons">edit</i></button>
                <!-- <input type="submit" name="submit" value="EDIT" class="btn"> -->
            </form></td>
        <!-- Delete Student -->
        <td><form action="delete_student.php" method="post">
                <input type="hidden" name="id" value="<?= $students["Id"]; ?>">
                <button type="submit" name="submit" class="btn-floating red lighten-1"><i class="material-icons">delete</i></button>
                <!-- <input type="submit" name="submit" value="DELETE" class="btn"> -->
            </form></td>
    </tr>
    </tbody>
    </table>

    <?php }}?>

<!-- Output student information into table using a foreach-->

<table>
    <thead>
        <tr>
            <!-- <th>Id</th> -->
            <th>Name</th>
            <th>Student Number</th>
            <th>Contact Email</th>
            <!-- <th>Last Update</th> -->
            <th>Contact Number</th>
            <!-- <th>Current Job</th> -->
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($listStudents as $students){?>
        <tr>
            <!-- <td><?= $students["Id"]; ?></td> -->
            <td><?= $students["FirstName"]; ?> <?= $students["LastName"]; ?></td>
            <td><?= $students["StudentNumber"]; ?></td>
            <td><?= $students["ContactEmail"]; ?></td>
            <!-- <td><?= $students["LastUpdate"]; ?></td> -->
            <td><?= $students["ContactNumber"]; ?></td>
            <!-- <td><?= $students["CurrentJob"]; ?></td> -->
            <!-- Update Student-->
            <td><form action="update_student.php" method="post">
                    <input type="hidden" name="id" value="<?= $students["Id"]; ?>">
                    <button type="submit" name="submit" class="btn-floating"><i class="material-icons">edit</i></button>
                    <!-- <input type="submit" name="submit" value="EDIT" class="btn"> -->
                </form></td>
            <!-- Delete Student -->
            <td><form action="delete_student.php" method="post">
                    <input type="hidden" name="id" value="<?= $students["Id"]; ?>">
                    <button type="submit" name="submit" class="btn-floating red lighten-1"><i class="material-icons">delete</i></button>
                    <!-- <input type="submit" name="submit" value="DELETE" class="btn"> -->
                </form></td>
        </tr>
        <?php }?>
    </tbody>

    </table>

<a href="add_student.php" class="btn btn-success">Add Student</a>

<?php
    require_once "includes/footer.php";
?>
