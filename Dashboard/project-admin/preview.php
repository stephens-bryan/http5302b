<?php
require_once('../../includes.php');
require_once('../../database.php');
require_once "../includes/admin_head.php";
require_once "../includes/admin_nav.php";
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
	<a class="btn" href="./">
		Back
	</a>
	
	<table>
		<thead>
			<tr>
				<th>Project Name</th>
				<th>Student Name</th>
				<th>Student Number</th>
				<th>Contact Email</th>
				<th>Contact Number</th>
				<th>Statues</th>
				<th>Finish Date</th>
				<th>Upload Date</th>
				<th>Type</th>
				<th>Url</th>
				<th>Github</th>
				<th>Short Desc</th>
				<th>Full Desc</th>
				<th>Approved?</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $project['Name'] ?></td>
				<td><?php echo $project['FirstName'] . ' ' . $project['LastName'] ?></td>
				<td><?php echo $project['StudentNumber'] ?></td>
				<td><?php echo $project['ContactEmail'] ?></td>
				<td><?php echo $project['ContactNumber'] ?></td>
				<td><?php echo $project['Published'] == 0 ? "Not published" : "Published" ?></td>
				<td><?php echo date(substr($project['FinishDate'], 0, 10)) ?></td>
				<td><?php echo date(substr($project['UploadDate'], 0, 10)) ?></td>
				<td><?php echo $project['TeamProject'] == 0? 'Personal Project': 'Team Project'?></td>
				<td><?php echo $project['Url'] ?></td>
				<td><?php echo $project['GitHub'] ?></td>
				<td><?php echo $project['ShortDesc'] ?></td>
				<td><?php echo $project['Description'] ?></td>
				<td><?php echo $project['Approved'] == 0? 'Not Approved': 'Approved'?></td>
			</tr>
		</tbody>
	</table>
	
</main>
