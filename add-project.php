<?php
ini_set('display_errors', 3); 
include('includes.php');
include('database.php');
$studentid = 1;

//need to grab all the tech's from the database for our user to have tech options for their project
 $tech = new TechDAO;
 $tech = $tech->getTechs($pdo);



// if (isset($_POST['submit-project'])){
//   $mainPicture = $_POST['']
//   $projectName = $_POST['project-name'];
//   $finishDate =;
//   $teamProject =;
//   $positionID=;
//   $shortDesc =;
//   $longDesc=;
//   $url = ;
//   $gitHub =;
//   $uploadDate =;
//   $approved =;
//   $published= ;

    
// }

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

            <div class="col s12">
                <form method="POST" action="#">
                    
                  <input id="" type="text" placeholder="Project Name" name="project-name">
                  
                  
                  <input id="" type="text" placeholder="Project Description (Short)">
                    <textarea id="" class="materialize-textarea" data-length="120" placeholder="Project Description (long)"></textarea>
                  <input id="" type="text" placeholder="External URL">
                <table>
                    <thead>
                        <tr>
                            <th>Images</th>
                            <th>Hero</th>
                            <th>Order</th>
                            <th>Delete</th>
                        </tr>
                    
                    </thead>
                    
                    <!--The data in tbody is placeholder content! Delete if you want-->
                    <tbody>
                        <tr>
                            <td>
                                
                                <div class="col s2">
                                    <p>Img go here</p>
                                </div>
                              <div class="file-field input-field col s10">
                                <div class="file-path-wrapper">
                                  <input class="file-path" type="text" placeholder="Profile Picture">
                                </div>
                                  
                                <div class="btn">
                                  <span>Browse...</span>
                                  <input type="file">
                                </div>
                                  
                              </div>
                            
                            
                            </td>
                            <td>
                                  <input name="group1" type="radio" id="test1" />
                                  <label for="test1">Yes</label>
                            
                            </td>
                            <td>
                                <select class="select">
                                  <option value="1">1</option>
                                </select>    
                            </td>
                        </tr>
                    </tbody>
                </table>
                    
                    <button class="btn left">Add Image</button>
                   
                    <h4>Tags</h4>
                   <?php foreach($tech as $t):?>
                      <input type="checkbox" id="<?php echo $t['Id']?>" value="<?php echo $t['Id']?>"/>
                  <label for="<?php echo $t['Id']?>"><?php echo $t['Title']?></label>
                  <?php endforeach; ?>
<!--                       <input type="checkbox" id="css" />
                      <label for="css">CSS</label>
                    
                      <input type="checkbox" id="html" />
                      <label for="html">HTML</label>
                    
                      <input type="checkbox" id="javascript" />
                      <label for="javascript">Javascript</label>
                    
                      <input type="checkbox" id="jquery" />
                      <label for="jquery">jQuery</label> -->
                    
                <div class="col s12">
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