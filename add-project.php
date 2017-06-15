<?php

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
                <h2>Project X</h2>
            </div>
            
            <div class="col s12">
                <form>
                    
                  <input id="" type="text" placeholder="Project Name">
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
                      <input type="checkbox" id="css" />
                      <label for="css">CSS</label>
                    
                      <input type="checkbox" id="html" />
                      <label for="html">HTML</label>
                    
                      <input type="checkbox" id="javascript" />
                      <label for="javascript">Javascript</label>
                    
                      <input type="checkbox" id="jquery" />
                      <label for="jquery">jQuery</label>
                    
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