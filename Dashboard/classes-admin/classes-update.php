<?php
    require_once '../includes/admin_head.php';
    require_once '../includes/admin_nav.php';
    require 'database.php';
 
    $id = $_GET['id'];
     
    if ( null==$id ) {
        header("Location: classes-index.php");
    }
     
    if ( isset($_POST['submit'])) {
        // keep track validation errors
        $programnameError = null;
        $campusError = null;
        $lengthError = null;
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
         
        if (empty($credentials)) {
            $credentialsError = 'Please enter the credentials.';
            $valid = false;
        }
        
        if (empty($areaofinterest)) {
            $areaofinterestError = 'Please enter the area of interest.';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Programs SET ProgramName = ?, Campus = ?, Length = ?, Credentials = ?, AreaOfInterest = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($programname,$campus,$length,$credentials,$areaofinterest,$id));
            
            $pdo2 = Database::connect();
            $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql2 = "UPDATE Years SET StartDate = ?, EndDate = ? WHERE ProgramId = ?";
            $q2 = $pdo2->prepare($sql2);
            $q2->execute(array($startdate,$enddate,$id));
            header("Location: classes-index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM Programs WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $programname = $data['ProgramName'];
        $campus = $data['Campus'];
        $length = $data['Length'];
        $credentials = $data['Credentials'];
        $areaofinterest = $data['AreaOfInterest'];
    }
?>
 
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="container">
     
                <div class="span10 offset1">
                    
                    <div class="row">
                        <h3>Update Class</h3>
                    </div>
                    
                    <form method="post">
                        
                        <label>Program Name</label> 
                          <div class="controls">
                            <input name="ProgramName" type="text" value="<?php echo !empty($programname)?$programname:'';?>">
                          </div>
                        <br/>
                        <label>Campus</label>
                          <div class="controls">
                            <input name="Campus" type="text" value="<?php echo !empty($campus)?$campus:'';?>">
                          </div>
                        <br/>
                        <label>Semesters</label>  
                          <div class="controls">
                            <input name="Length" type="number" value="<?php echo !empty($length)?$length:'';?>">
                          </div>
                        <br/>
                        <label>Start Date</label>  
                          <div class="controls">
                            <input name="StartDate" type="date" value="<?php echo !empty($startdate)?$startdate:'';?>">
                          </div>
                        <br/>
                        <label>End Date</label>  
                          <div class="controls">
                            <input name="EndDate" type="date" value="<?php echo !empty($enddate)?$enddate:'';?>">
                          </div>    
                        <br/>
                        <label>Program Credentials</label> 
                          <div class="controls">
                            <input name="Credentials" type="text" value="<?php echo !empty($credentials)?$credentials:'';?>">
                          </div>      
                        <br/>
                        <label>Area of Interest</label>  
                          <div class="controls">
                            <input name="AreaOfInterest" type="text" value="<?php echo !empty($areaofinterest)?$areaofinterest:'';?>">
                          </div>      
                        <br/><br/>
                        <div>
                          <button type="submit" name="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="classes-index.php">Back to Main</a>
                        </div>
                        
                    </form>
                </div>           
    </div> <!-- /container -->
  </body>

<?php 
include '../includes/admin_footer.php'; 
?>
