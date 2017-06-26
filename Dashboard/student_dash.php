<?php
require_once "./students-admin/includes/header.php";

$listStudents = $student->getStudents();

echo var_dump($listStudents);
?>      

<h2>Managing Students</h2>
<div>
  <p class="add_link"><a href="newStudent.php">Add new student</a></p>
</div>
<div class="all_students">
  <div class="row studentsItem" >
                <div class="col l1 m1 s1">
                </div>
                <p class="col s4 student_name">Student Name</p>
                <p class="col s1 student_year">Year</p>
                <p class="col s4 student_email">Email</p>
                <p class="col s2 student_more"></p>
            </div>
            <div id="allStudents">
            </div>
        </div>

        <script id="handlebars-demo" type="text/x-handlebars-template">
                {{#each student}}
                <div class="row studentsItem">
                    <div class="col l1 m1 s1 checkbox">
                        <form class="dashboard_checkbox">
                            <input type="checkbox" class="filled-in studentCheckbox" id="{{id}}{{firstname}}" data-id="{{id}}"/>
                            <label for="{{id}}{{firstname}}"></label>
                        </form>
                    </div>
                    <p class="col l4 m4 s4 student_name">{{firstname}} {{lastname}}</p>
                    <p class="col l1 m1 s1 student_year">{{year}}</p>
                    <p class="col l4 m4 s4 student_email">{{email}}</p>
                    <p class="col l1 m1 s1 student_more"><i class="material-icons">more_horiz</i></p>
                </div>
                {{/each}}
                <div class="row controll">
                    <p class="current_page col l3 m3 s3">Page: {{page}}</p>
                    <p class="total_page col l3 m3 s3">Total Page: {{total_page}}</p>
                    <p class="total_num col l3 m3 s3">Total Number: {{total_num}}</p>
                    <p class="page_controll col l3 m3 s3">
                        <a href="#"><<<</a>
                        | 
                        <a href="#">>>></a>
                    </p>
                </div>
        </script>