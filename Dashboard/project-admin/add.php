<?php
require_once('../../includes.php');
require_once('../../database.php');
require_once "../includes/admin_head.php";
require_once "../includes/admin_nav.php";
require_once('Project.php');
$Project = new Project($pdo);


if (isset($_POST['submit'])) {
    $Project->createNewProject($_POST['Name'], $_POST['StudentId'], $_POST['FinishDate'], $_POST['UploadDate'], $_POST['Url'], $_POST['Github'], $_POST['ShortDesc'], $_POST['Description'], $_POST['TeamProject'], $_POST['Published'], $_POST['Approved']);
    header('Location: ./');
}

?>

<main>
<a class="btn" href="./">
	Back
</a>

<form method="POST" action="">
    <label>Project Name</label> 
    <input type="text" name="Name" />
    <label>Student Id</label> 
    <input type="text" name="StudentId" />
    <label>Finish Date</label> 
    <input type="date" name="FinishDate" />
    <label>Upload Date</label>
    <input type="date" name="UploadDate" />
    <label>Short Description</label>
    <textarea name="ShortDesc"></textarea>
    <label>Full Description</label>
    <textarea name="Description"></textarea>
    <label>Url</label>
    <input type="text" name="Url" />
    <label>GitHub</label>
    <input type="text" name="Github" />
    <label>Team project or not</label>
	<select style="display: block" name="TeamProject">
        <option value="0">Personal Project</option>
        <option value="1">Team Project</option>
    </select>
    <label>Published or not</label>
	<select style="display: block" name="Published">
        <option value="0">Not publish</option>
        <option value="1">Publish</option>
    </select>
    <label>Approved or not</label>
	<select style="display: block" name="Approved">
        <option value="0">Not Approved</option>
        <option value="1">Approved</option>
    </select>
    <input type="submit" name="submit" value="Add" style="display: block; margin-top: 50px;" />
</form>
</main>