<?php
ini_set('display_errors', 3); 
include('includes.php');
include('database.php');
$studentid = 1;

//need to grab all the tech's from the database for our user to have tech options for their project
 $tech = new TechDAO;
 $tech = $tech->getTechs($pdo);

//we need to grab all the possible roles from the database for our user to have options for the position they served on for the project
$positions = new PositionDAO;
$positions = $positions->getPositions($pdo);

// var_dump($positions);

require_once "includes/header.php";

?>
<body>
    <?php 
    require_once "includes/loggedin_sidebar.php";
    ?>

    <main>

    <div class="container">  
      <div class="row" id="projectSettingsForm__cont">
        
            <!--CONTENT GOES IN HERE: Please use the Materialize grid system!-->
                <img src="img/humber-logo-webDevPortal.png" class="portalLogo">
            
            <div class="col s12 myProjectsForm__header">
                <h2>Add a Project</h2>
            </div>
        
          <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn" href="#modal1">Modal</a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

            <div class="col s12">
                <form method="POST" action="add-project-logic.php">
                    
                  <input id="" type="text" placeholder="Project Name" name="projectName">
                  
                  
                  <input id="" type="text" placeholder="Project Description (Short)" name="ShortDescription">
                    <textarea id="" class="materialize-textarea" data-length="120" placeholder="Project Description (long)" name="Description"></textarea>
                  <input id="" type="text" placeholder="External URL" name="Url">
                  <input id="github" type="text" placeholder="Github Repository(Optional)" name="Github">
                   
                
                  
                   
              
                                
                                
                              <div class="file-field input-field col s12">
                                <div class="btn col s8">
                                  <span>Add Project Image</span>
                                  <input type="file">
                                </div>
                                <div class="file-path-wrapper col s8">
                                  <input class="file-path" type="text" placeholder="Your uploaded image" name="mainImage">
                                </div>
                                  
                                
                                  
                              </div>
                          <input type="checkbox" id="TeamProject"  name="TeamProject"/>
                  <label for="TeamProject">Was this a team project?</label>
                  
                   <h4>
                    What role(s) did you serve for this project?
                  </h4>
                 <?php foreach($positions as $p):?> 
                  <input type="radio" id="<?php echo $p['Title']?>" value="<?php echo $p['Id']?>" name="Position"/>
                  <label for="<?php echo $p['Title']?>"><?php echo $p['Title']?></label>
                  <?php endforeach;?> 
                            
                            
                            
                    
                    
                  <h4>
                    When was this project completed?
                  </h4>
                  <input type="date" id="FinishDate" name="FinishDate" value="When was this project completed?">
                  
                    <h4>Technology Used for this Project(Must select at least 1).</h4>
                   <?php foreach($tech as $t):?>
                      <input type="checkbox" id="<?php echo $t['Title']?>" value="<?php echo $t['Id']?>" name="t[]"/>
                  <label for="<?php echo $t['Title']?>"><?php echo $t['Title']?></label>
                  <?php endforeach; ?>
                 
            
                  
                  
              

            
                <div class="col s12">
                   <input type="checkbox" id="Published" name="Published">
                  <label for="Published">Would you like to publish this project?</label> 
                    <input type="submit" value="Save Changes" class="right btn" name="submit-project">
                    </div>
                </form>    
            </div>
            
        </div>
    </div> 
    </main>    
</body>

<?php

require_once "includes/footer.php";
?>