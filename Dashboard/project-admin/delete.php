<?php
require_once('../../includes.php');
require_once('../../database.php');
require_once('Project.php');
$Project = new Project($pdo);
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $Project->deleteProjectTechs($id);
    $Project->deleteOneProject($id);
    header('Location: ./');
}

$project = $Project->readOneProject($id);
//var_dump($project);
?>

<main>
<a href="./">
	<h4>Back</h4>
</a>
<form method="POST" action="">
    <h5><b>Project Name</b></h5>
    <h5><?php echo $project['Name'] ?></h5>
    <h5>by <?php echo $project['FirstName'] . ' ' . $project['LastName'] ?></h5>
    <h5>Student Number: <?php echo $project['StudentNumber'] ?></h5>
    <h5>Contact Email: <?php echo $project['ContactEmail'] ?></h5>
    <h5>Contact Number: <?php echo $project['ContactNumber'] ?></h5>
    <h5><?php echo $project['Published'] == 0 ? "Not published" : "Published" ?></h5>
    <!-- I don't know where frontend team want to put these pictures
        <img alt="Main Picture" src="" /> 
    -->
    <h5><b>Finish Date</b></h5>
    <h5><?php echo date(substr($project['FinishDate'], 0, 10)) ?><h5>
    <h5><b>Upload Date</b></h5>
    <h5><?php echo date(substr($project['UploadDate'], 0, 10)) ?><h5>
    <h5><b>Team project or not</b></h5>
    <h5><?php echo $project['TeamProject'] == 0? 'Personal Project': 'Team Project'?></h5>
    <h5><b>Url</b></h5>
    <h5><?php echo $project['Url'] ?></h5>
    <h5><b>GitHub</b></h5>
    <h5><?php echo $project['GitHub'] ?></h5>
    <h5><b>Short Description</b></h5>
    <h5><?php echo $project['ShortDesc'] ?></h5>
    <h5><b>Full Description</b></h5>
    <h5><?php echo $project['Description'] ?></h5>
    <h5><b>Approved or not</b></h5>
    <h5><?php echo $project['Approved'] == 0? 'Not Approved': 'Approved'?></h5>
    <input type="submit" name="submit" value="Delete" style="display: block; margin-top: 50px;" />
</form>
</main>