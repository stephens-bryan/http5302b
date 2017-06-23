<?php
require_once('../../includes.php');
require_once('../../database.php');
require_once('Project.php');
if (!isset($_GET['id'])) {
    $id = 0;
} else {
    $id = $_GET['id'];
}

$Project = new Project($pdo);
$projects = $Project->readTenProjects($id);
//$names= $Project->readAllStudentNames();
//var_dump($names);
?>

<main>
    <a href="add.php">
        <h4>Create new project</h4>
    </a>
    <div style="display: block; border-bottom: 1px solid black">
        <h5 style="display: inline-block; border-right: 1px solid black">Project</h5>
        <h5 style="display: inline-block; border-right: 1px solid black">Student</h5>
        <h5 style="display: inline-block; border-right: 1px solid black">Student Number</h5>
        <h5 style="display: inline-block; border-right: 1px solid black">Upload Date</h5>
        <h5 style="display: inline-block; border-right: 1px solid black">Publish Statue</h5>
        <h5 style="display: inline-block; border-right: 1px solid black">Approve Statue</h5>
    </div>
    <?php foreach ($projects as $p) { ?>
        <div style="display: block; border-bottom: 1px solid black">
            <h5 style="display: inline-block; border-right: 1px solid black">
                <?php echo $p['Name'] ?>
            </h5>
            <h5 style="display: inline-block; border-right: 1px solid black"><?php echo $p['FirstName'] . ' ' . $p['LastName'] ?></h5>
            <h5 style="display: inline-block; border-right: 1px solid black"><?php echo $p['StudentNumber'] ?></h5>
            <h5 style="display: inline-block; border-right: 1px solid black"><?php echo substr($p['UploadDate'], 0, 10) ?></h5>
            <h5 style="display: inline-block; border-right: 1px solid black"><?php echo $p['Published'] == 1 ? 'Published': "Not published" ?></h5>
            <h5 style="display: inline-block; border-right: 1px solid black"><?php echo $p['Approved'] == 1 ? 'Approved': "Not approved" ?></h5>
            <a href="<?php echo 'preview.php?id=' . $p['project_id'] ?>">
				<h6 style="display: inline-block; border-right: 1px solid black">Preview</h6>
            </a>
			<a href="<?php echo 'edit.php?id=' . $p['project_id'] ?>">
                <h6 style="display: inline-block; border-right: 1px solid black">Edit</h6>
            </a>
            <a href="<?php echo 'delete.php?id=' . $p['project_id'] ?>">
                <h6 style="display: inline-block; border-right: 1px solid black">Delete</h6>
            </a>
        </div>
    <?php } ?>
</main>
