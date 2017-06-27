<?php
require_once('../../includes.php');
require_once('../../database.php');
require_once "../includes/admin_head.php";
require_once "../includes/admin_nav.php";
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
<a class="btn" href="./">
	Back
</a>
<form method="POST" action="">
	<label>Project Name</label> 
	<div class="controls">
	<input name="Name" type="text" value="<?php echo $project['Name'] ?>">
	</div>
	<br/>
    <label>by <?php echo $project['FirstName'] . ' ' . $project['LastName'] ?></label> <br/><br/>
    <label>Student Number: <?php echo $project['StudentNumber'] ?></label> <br/><br/>
    <label>Contact Email: <?php echo $project['ContactEmail'] ?></label> <br/><br/>
    <label>Contact Number: <?php echo $project['ContactNumber'] ?></label> <br/><br/>
    <label><?php echo $project['Published'] == 0 ? "Not published" : "Published" ?></label> <br/><br/>

	<label>Finish Date</label> 
	<div class="controls">
	<input type="date" value="<?php echo date(substr($project['FinishDate'], 0, 10)) ?>" name="FinishDate" />
	</div>
	<br/>
    <label>Upload Date</label>
    <input type="date" value="<?php echo date(substr($project['UploadDate'], 0, 10)) ?>" name="UploadDate" />
	<br/>
	
    <label>project or not</label>
    <input style="display: block" type="radio" name="TeamProject" value="0" <?php echo $project['TeamProject'] == 0? 'checked': null?>>Personal Project<br>
    <input style="display: block" type="radio" name="TeamProject" value="1" <?php echo $project['TeamProject'] == 1? 'checked': null?>>Team Project<br>
	<br/>
    <label>Url</label>
    <input type="text" value="<?php echo $project['Url'] ?>" name="Url" />
	<br/>
    <label>GitHub</label>
    <input type="text" value="<?php echo $project['GitHub'] ?>" name="GitHub" />
	<br/>
    <label>Short Description</label>
    <textarea name="ShortDesc"><?php echo $project['ShortDesc'] ?></textarea>
	<br/>
    <label>Full Description</label>
    <textarea name="Description"><?php echo $project['Description'] ?></textarea>
	<br/>
    <label>Approved or not</label>
    <select style="display: block" name="Approved">
        <option value="0" <?php echo $project['Approved'] == 0? 'selected': null?>>Not approved</option>
        <option value="1" <?php echo $project['Approved'] == 1? 'selected': null?>>Approved</option>
    </select>
    <input type="submit" name="submit" value="Update" style="display: block; margin-top: 50px;" />
</form>
</main>