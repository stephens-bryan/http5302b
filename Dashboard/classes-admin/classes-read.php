<?php 
    require 'database.php';
    $id = null;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM Programs where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC); 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
 
<body>
    <div class="container">
     
      
            <div class="row">
                <h3>Class Details</h3>
            </div>
        
                <label>Program Name</label>
                <div class="controls"><?php echo $data['ProgramName'];?></div>
          
            <br/>  
         
                <label>Campus</label>
                <div class="controls"><?php echo $data['Campus'];?></div>
          
            <br/> 
          
                <label>Semesters</label>
                <div class="controls"><?php echo $data['Length'];?></div>
      
            <br/>
          
                <label>Start Date</label>
                <div class="controls"><?php echo $data['StartDate'];?></div>
          
            <br/>
   
                <label>End Date</label>
                <div class="controls"><?php echo $data['EndDate'];?></div>
          
            <br/>
       
                <label>Credentials</label>
                <div class="controls"><?php echo $data['Credentials'];?></div>
        
            <br/>
    
                <label>Area of Interest</label>
                <div class="controls"><?php echo $data['AreaOfInterest'];?></div>
                     
            <br/>
            
            <div class="form-actions">
                <a class="btn" href="classes-index.php">Back to Main</a>
            </div>
        
     
                 
    </div> <!-- container -->
  </body>
</html>
