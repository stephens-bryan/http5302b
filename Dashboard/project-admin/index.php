<?php
require_once '../includes/admin_head.php';
require_once '../includes/admin_nav.php';
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
//var_dump($projects);
?>

<main>
    <a href="add.php">
        <h3>Manage project</h3>
    </a>
	<table class="table table-striped table-bordered">
	  <thead>
		<tr>
		  <th>Project</th>
		  <th>Student</th>
		  <th>Student Number</th>
		  <th>Upload Date</th>
		  <th>Publish Statue</th>
		  <th>Approve Statue</th>
		</tr>
	  </thead>
	  <tbody>
		<?php foreach ($projects as $p) { ?>
			<tr>
				<td>
					<?php echo $p['Name'] ?>
				</td>
				<td><?php echo $p['FirstName'] . ' ' . $p['LastName'] ?></td>
				<td><?php echo $p['StudentNumber'] ?></td>
				<td><?php echo substr($p['UploadDate'], 0, 10) ?></td>
				<td><?php echo $p['Published'] == 1 ? 'Published': "Not published" ?></td>
				<td><?php echo $p['Approved'] == 1 ? 'Approved': "Not approved" ?></td>
				<td>
					<a class="btn btn-success" href="<?php echo 'preview.php?id=' . $p['project_id'] ?>">
						Preview
					</a>
				</td>
				<td>
					<a class="btn btn-success" href="<?php echo 'edit.php?id=' . $p['project_id'] ?>">
						Edit
					</a>
				</td>
				<td>
					<a class="btn btn-danger" href="<?php echo 'delete.php?id=' . $p['project_id'] ?>">
						Delete
					</a>
				</td>
			</tr>
		<?php } ?>
	  </tbody>
	</table>
</main>
