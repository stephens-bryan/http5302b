<?php
    require_once '../includes/admin_head.php';
    require_once '../includes/admin_nav.php';
    require 'database.php';

    $id = 0;

    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];

        //delete year
        $pdo2 = Database::connect();
        $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql2 = "DELETE FROM Years WHERE ProgramId = :progid";
        $q2 = $pdo2->prepare($sql2);
        $q2->bindValue(':progid', $id);
        $q2->execute();

        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM Programs WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));


    }
?>

<h3>Delete Year</h3>
<form class="form-horizontal" action="classes-delete.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id;?>"/>
    <p class="alert alert-error">Are you sure to delete this Academic Year?</p>
    <div class="form-actions">
        <button type="submit" class="btn btn-danger">Yes</button>
        <a class="btn" href="classes-index.php">No</a>
    </div>
</form>
<br>
<a class="btn" href="classes-index.php">Back to Main</a>

<?php
include '../includes/admin_footer.php';
?>
