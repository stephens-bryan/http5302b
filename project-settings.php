<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Humber Student Folio</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/project-settings.css">
</head>
<body>
   <main>
       <div class="row">
        <div class="col s12 myProjectsForm__header">
            <h2>Project X</h2>
           </div>
       </div>
       
        <div class="row" id="myProjectsForm__cont">
            
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
                    
                    <button>Add Image</button>
                    
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
                    <input type="submit" value="Save Changes" class="save">
                    </div>
                </form>    
            </div>
       </div>
    
    
    </main>
</body>
</html>