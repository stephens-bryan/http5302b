<?php
require_once './includes/admin_head.php';
require_once './includes/admin_nav.php';
?>

<?php
/*
The access to different features are controlled by the url paras, $GET['board'] control which board this page is going to show
Three different boards: students, projects and classes
*/
if($_GET):?>
    <?php if($_GET['board'] == "students"):?>
      <?php require 'student_dash.php';?>
    <?php elseif ($_GET['board'] == "projects"): ?>
      <?php require 'project_dash.php';?>
    <?php elseif ($_GET['board'] == "classes"):?>
        <h2>Managing Class</h2>
        <div class="all_projects">
            <div class="row projectItem" >
                <div class="col l2 m2 s2">
                </div>
                <p class="col s18 class_name">Year</p>
                <p class="col s2 student_more"></p>
            </div>
            <div id="allStudents">
            </div>
        </div>
    <?php endif ?>
<?php else:?>
    <h1>Main Dashboard</h1>
    <div id="features" class="row">
        <div class="col m4">
          <a href="/Dashboard/students-admin/list_student.php" >
            <i class="material-icons">supervisor_account</i>
            <h2 class="admin_core_link">Manage Students</h2>
          </a>
        </div>
        <div class="col m4">
          <a href="?board=projects">
            <i class="material-icons">art_track</i>
            <h2 class="admin_core_link">Manage Projects</h2>
          </a>
        </div>
        <div class="col m4">
          <a href="?board=classes" >
            <i class="material-icons">class</i>
            <h2 class="admin_core_link">Manage Classes</h2>
          </a>
        </div>
    </div>
<?php endif?>
<?php include './includes/admin_footer.php'; ?>
