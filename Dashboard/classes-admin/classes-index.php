<?php
require_once '../includes/admin_head.php';
require_once '../includes/admin_nav.php';
?>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="container">
        <div class="row">
            <h3>Academic Year</h3>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Program Name</th>
                  <th>Campus</th>
                  <th>Semesters</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Credentials</th>
                  <th>Area of Interest</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <tbody>
              <?php
               include 'database.php';
               $pdo = Database::connect();
               $sql = 'SELECT * FROM Programs ORDER BY id ASC';
               foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['ProgramName'] . '</td>';
                        echo '<td>'. $row['Campus'] . '</td>';
                        echo '<td>'. $row['Length'] . '</td>';
                        $pdo2 = Database::connect();
                        $sql2 = 'SELECT * FROM Years WHERE ProgramId = :progid';
                        $pdostmt = $pdo2->prepare($sql2);
                        $pdostmt->bindValue(':progid', $row['Id']);
                        $pdostmt->execute();
                        $result = $pdostmt->fetchAll();
                        foreach ($result as $year){
                            $date1 = strtotime($year['StartDate']);
                            echo '<td>'. date("F j Y",$date1) . '</td>';
                            $date2 = strtotime($year['EndDate']);
                            echo '<td>'. date("F j Y",$date2) . '</td>';
                            //echo '<td>'. $year['StartDate'] . '</td>';
                            //echo '<td>'. $year['EndDate'] . '</td>';
                        }
                        echo '<td>'. $row['Credentials'] . '</td>';
                        echo '<td>'. $row['AreaOfInterest'] . '</td>';
                        echo '<td width=250>';
                        echo ' ';
                        echo '<a class="btn btn-success" href="classes-update.php?id='.$row['Id'].'">Update</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="classes-delete.php?id='.$row['Id'].'">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
               }
              ?>
              </tbody>
            </table>
            <p>
                <a href="classes-create.php" class="btn btn-success">Create New Academic Year</a>
            </p>
        </div>
    </div> <!-- /container -->
  </body>

<?php
include '../includes/admin_footer.php'; 
?>
