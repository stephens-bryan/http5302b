<?php

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
                <form>
                <table>
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Hero</th>
                            <th>Order</th>
                            <th>Delete</th>
                        </tr>
                    
                    </thead>
                    
                    <!--The data in tbody is placeholder content! Delete if you want-->
                    <tbody>
                        <tr>
                            <td>Img ImgImgImgImgImgImgImg</td>
                            <td>
                                  <input name="group1" type="radio" id="test1" />
                                  <label for="test1"></label>
                            
                            </td>
                            <td>
                                <select class="select">
                                  <option value="1">1</option>
                                </select>    
                            </td>
                        </tr>
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
    </main>    
</body>

<?php

require_once "includes/footer.php";
?>