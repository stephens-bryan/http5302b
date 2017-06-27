<?php
    require_once '../includes/admin_head.php';
    require_once '../includes/admin_nav.php'; 
    require 'database.php';

    if (isset($_POST['submit'])) {
        // keep track validation errors
        $programnameError = null;
        $campusError = null;
        $lengthError = null;
        $startdateError = null;
        $enddateError = null;
        $credentialsError = null;
        $areaofinterestError = null;
         
        // keep track post values
        $programname = $_POST['ProgramName'];
        $campus = $_POST['Campus'];
        $length = $_POST['Length'];
        $startdate = $_POST['StartDate'];
        $enddate = $_POST['EndDate'];
        $credentials = $_POST['Credentials'];
        $areaofinterest = $_POST['AreaOfInterest'];
         
        // validate input
        $valid = true;
        if (empty($programname)) {
            $programnameError = 'Please enter the program name.';
            $valid = false;
        }
         
        if (empty($campus)) {
            $campusError = 'Please enter the campus location.';
            $valid = false;
        }
         
        if (empty($length)) {
            $lengthError = 'Please enter the length of the program.';
            $valid = false;
        }
         
        if (empty($startdate)) {
            $startdateError = 'Please enter the start date of the program.';
            $valid = false;
        }
        
        if (empty($enddate)) {
            $lengthError = 'Please enter the end date of the program.';
            $valid = false;
        }
        
        if (empty($credentials)) {
            $credentialsError = 'Please enter the program credentials.';
            $valid = false;
        }
        
        if (empty($areaofinterest)) {
            $areaofinterestError = 'Please enter the programs area of interest.';
            $valid = false;
        }
        
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Programs (ProgramName,Campus,Length,Credentials,AreaOfInterest) values (:programname, :campus, :length, :credentials, :areaofinterest)";
            $q = $pdo->prepare($sql);
            $q->bindValue(':programname', $programname);
            $q->bindValue(':campus', $campus);
            $q->bindValue(':length', $length);
            $q->bindValue(':credentials', $credentials);
            $q->bindValue(':areaofinterest', $areaofinterest);
            $q->execute();
            
            $pdo2 = Database::connect();
            $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql2 = "SELECT MAX(Id) FROM Programs";
            $q2 = $pdo2->prepare($sql2);
            $q2->execute();
            $result = $q2->fetchAll();
            
            $pdo3 = Database::connect();
            $pdo3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql3 = "INSERT INTO Years (StartDate,EndDate,ProgramId) values (:startdate, :enddate, :progid)";
            $q3 = $pdo3->prepare($sql3);
            $q3->bindValue(':startdate', $startdate);
            $q3->bindValue(':enddate', $enddate);
            $q3->bindValue(':progid', $result[0][0]); 
            $q3->execute();
            
            header("Location: classes-index.php"); 
        }
    }
?>
 
<body>
    <div class="container">
     
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <div class="row">
                        <h3>Create New Class</h3>
                    </div>
                    
                    <form action="classes-create.php" method="post">
                        
                        <label>Program Name</label> 
                          <div class="controls">
                            <input name="ProgramName" type="text"  placeholder="Program name" value="<?php echo !empty($programname)?$programname:'';?>">
                          </div>
                        <br/>
                        <label>Campus</label>
                          <div class="controls">
                            <input name="Campus" type="text" placeholder="Humber campus" value="<?php echo !empty($campus)?$campus:'';?>">
                          </div>
                        <br/>
                        <label>Semesters</label>  
                          <div class="controls">
                            <input name="Length" type="number" placeholder="# of Semesters" value="<?php echo !empty($length)?$length:'';?>">
                          </div>
                        <br/>
                        <label>Start Date</label>  
                          <div class="controls">
                            <input name="StartDate" type="date" placeholder="Start Date" value="<?php echo !empty($startdate)?$startdate:'';?>">
                          </div>
                        <br/>
                        <label>End Date</label>  
                          <div class="controls">
                            <input name="EndDate" type="date" placeholder="End Date" value="<?php echo !empty($enddate)?$enddate:'';?>">
                          </div>    
                        <br/>
                        <label>Program Credentials</label> 
                          <div class="controls">
                            <input name="Credentials" type="text" placeholder="Diploma/Certificate Obtained" value="<?php echo !empty($credentials)?$credentials:'';?>">
                          </div>      
                        <br/>
                        <label>Area of Interest</label>  
                          <div class="controls">
                            <input name="AreaOfInterest" type="text" placeholder="Department" value="<?php echo !empty($areaofinterest)?$areaofinterest:'';?>">
                          </div>      
                        <br/><br/>
                        <div>
                          <button type="submit" name="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="classes-index.php">Back to Main</a>
                        </div>
                        
                    </form>
                            
    </div> <!-- /container -->
  </body>

<?php 
include './includes/admin_footer.php'; 
?>
