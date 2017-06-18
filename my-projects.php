<?php

require_once 'includes.php';
require_once 'database.php';
$studentId = 1;

//need to grab all the tech's from the database for our user to have tech options for their project
$projectClass = new ProjectDAO();
$viewProjects = $projectClass->getProjectsById($pdo, $studentId);

// var_dump($viewProjects);



require_once "includes/header.php";

?>
<body>
    <?php 
    require_once "includes/loggedin_sidebar.php";
    ?>
    
    <main>
    <div class="container">  
        <div class="row" id="projectsForm__cont">
            
            <!--CONTENT GOES IN HERE: Please use the Materialize grid system!-->
                <img src="img/humber-logo-webDevPortal.png" class="portalLogo">
    
            <div class="col s12 myProjectsForm__header">
                <h2>Mia's Projects</h2>
            </div>
            
            <div class="col s12">
                <table>
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Feature Image</th>
                            <th>View Order</th>
                            <th>Delete</th>
                        </tr>
                    
                    </thead>
                    
                    <tbody>
                      <form id="my-projects-form" method="post" action="">
                      <?php foreach ($viewProjects as $project) : ?>                        
                        <tr>
                          <td><?php echo $project['Name'] ?> <?php echo $project['Id'] ?></td>
                          <td><img class="thumbnail-small" src="img/<?php echo $project['MainPicture'] ?>" alt="<?php echo $project['MainPicture'] ?>"></td>
                          <td><input type="text" value="<?php echo $project['PositionId'] ?>"></td>
                          <td>
                            <button id="my-projects-form__btn-delete<?php echo $project['Id'] ?>" data-target="delete-project-modal" class="btn"  value="<?php echo $project['Id'] ?>">Delete</button>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
                    
                    <button class="btn">Add Project</button>
                    
                <div class="col s12">
                    <input type="submit" value="Save Changes" class="right btn">
                    </div>
                </form>    
            </div>
            
        </div>
    </div>       

  <!-- Modal Structure -->
  <div id="delete-project-modal" class="modal">
    <div class="modal-content">
      <span class="modal-action modal-close right"><i class="small material-icons">close</i></span>
      <h4>Are you sure you want to delete this project?</h4>
      <p>Once you click delete there is no going back.</p>
    </div>
    <div class="modal-footer">
      <button id="delete-project-modal__btn-delete-confirm" class="modal-action modal-close waves-effect waves-red btn-flat left" value="">Delete</button>
      <button id="delete-project-modal__btn-delete-exit" class="modal-action modal-close waves-effect waves-green btn-flat right" value="">Cancel</button>
    </div>
  </div>
</main>
 
  
  
  <script src="js/delete.js"></script>
  <script src="js/modal.js"></script>
</body>

<?php

require_once "includes/footer.php";
?>