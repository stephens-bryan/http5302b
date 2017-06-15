<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Humber Student Folio</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/my-projects.css">
</head>
<body>
   <main>
       
       <div class="row">
        <div class="col s12 myProjectsForm__header">
            <h2>Mia's Projects</h2>
           </div>
       </div>
       
        <div class="row" id="myProjectsForm__cont">
            
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
                    
                    <button>Add Project</button>
                    
                <div class="col s12">
                    <input type="submit" value="Save Changes" class="save">
                    </div>
                </form>    
            </div>
       </div>
    
    
    </main>
</body>
</html>