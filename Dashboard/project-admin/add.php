<?php
require_once('../../includes.php');
require_once('../../database.php');
require_once('Project.php');
$Project = new Project($pdo);


if (isset($_POST['submit'])) {
    $Project->createNewProject($_POST['Name'], $_POST['StudentId'], $_POST['FinishDate'], $_POST['UploadDate'], $_POST['Url'], $_POST['Github'], $_POST['ShortDesc'], $_POST['Description'], $_POST['TeamProject'], $_POST['Published'], $_POST['Approved']);
    header('Location: ./');
}

?>

<main>
<a href="./">
	<h4>Back</h4>
</a>
<form method="POST" action="">
    <h5><b>Project Name</b></h5>
    <input type="text" name="Name" />
    <h5><b>Student Id</b></h5>
    <input type="text" name="StudentId" />
    <h5><b>Finish Date</b></h5>
    <input type="date" name="FinishDate" />
    <h5><b>Upload Date</b></h5>
    <input type="date" name="UploadDate" />
    <h5><b>Short Description</b></h5>
    <textarea name="ShortDesc"></textarea>
    <h5><b>Full Description</b></h5>
    <textarea name="Description"></textarea>
    <h5><b>Url</b></h5>
    <input type="text" name="Url" />
    <h5><b>GitHub</b></h5>
    <input type="text" name="Github" />
    <h5><b>Team project or not</b></h5>
    <input type="radio" name="TeamProject" value="0">Personal Project<br>
    <input type="radio" name="TeamProject" value="1">Team Project<br>
    <h5><b>Publish or not</b></h5>
    <input type="radio" name="Published" value="0">Not publish<br>
    <input type="radio" name="Published" value="1">Publish<br>
    <h5><b>Approved or not</b></h5>
    <input type="radio" name="Approved" value="0">Not Approved<br>
    <input type="radio" name="Approved" value="1">Approved<br>
    <input type="submit" name="submit" value="Update" style="display: block; margin-top: 50px;" />
</form>
</main>