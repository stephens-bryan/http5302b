<?php
require_once('../../includes.php');
require_once('../../database.php');
require_once('Project.php');
$Project = new Project($pdo);
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $Project->updateProjectData($id, $_POST['Name'], $_POST['FinishDate'], $_POST['UploadDate'], $_POST['TeamProject'], $_POST['Url'], $_POST['GitHub'], $_POST['ShortDesc'], $_POST['Description'], $_POST['Approved']);
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
    <input type="text" value="<?php echo $project['Name'] ?>" name="Name" />
    <h5>by <?php echo $project['FirstName'] . ' ' . $project['LastName'] ?></h5>
    <h5>Student Number: <?php echo $project['StudentNumber'] ?></h5>
    <h5>Contact Email: <?php echo $project['ContactEmail'] ?></h5>
    <h5>Contact Number: <?php echo $project['ContactNumber'] ?></h5>
    <h5><?php echo $project['Published'] == 0 ? "Not published" : "Published" ?></h5>
    <!-- I don't know where frontend team want to put these pictures
        <img alt="Main Picture" src="" /> 
    -->
    <h5><b>Finish Date</b></h5>
    <input type="date" value="<?php echo date(substr($project['FinishDate'], 0, 10)) ?>" name="FinishDate" />
    <h5><b>Upload Date</b></h5>
    <input type="date" value="<?php echo date(substr($project['UploadDate'], 0, 10)) ?>" name="UploadDate" />
    <h5><b>Team project or not</b></h5>
    <input type="radio" name="TeamProject" value="0" <?php echo $project['TeamProject'] == 0? 'checked': null?>>Personal Project<br>
    <input type="radio" name="TeamProject" value="1" <?php echo $project['TeamProject'] == 1? 'checked': null?>>Team Project<br>
    <h5><b>Url</b></h5>
    <input type="text" value="<?php echo $project['Url'] ?>" name="Url" />
    <h5><b>GitHub</b></h5>
    <input type="text" value="<?php echo $project['GitHub'] ?>" name="GitHub" />
    <h5><b>Short Description</b></h5>
    <textarea name="ShortDesc"><?php echo $project['ShortDesc'] ?></textarea>
    <h5><b>Full Description</b></h5>
    <textarea name="Description"><?php echo $project['Description'] ?></textarea>
    <h5><b>Approved or not</b></h5>
    <select name="Approved">
        <option value="0" <?php echo $project['Approved'] == 0? 'selected': null?>>Not approved</option>
        <option value="1" <?php echo $project['Approved'] == 1? 'selected': null?>>Approved</option>
    </select>
    <input type="submit" name="submit" value="Update" style="display: block; margin-top: 50px;" />
</form>
</main>