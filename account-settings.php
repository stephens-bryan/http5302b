<?php

require_once "includes/header.php";


?>
<body>
    <?php 
    require_once "includes/loggedin_sidebar.php";
    ?>
    
    <main>
    <div class="container">  
        <div class="row" id="acctSettForm__cont">
            
            <!--CONTENT GOES IN HERE: Please use the Materialize grid system!-->
    
            <div class="col s12">
                <img src="img/humber-logo-webDevPortal.png" class="portalLogo">
            <form>
                
                    <div class="col s2">
                        <p>User's image goes here</p>
                    </div>
                  <div class="file-field input-field col s10">
                    <div class="file-path-wrapper">
                      <input class="file-path" type="text" placeholder="Profile Picture">
                    </div>

                    <div class="btn" id="acctSettForm__browse">
                      <span>Browse...</span>
                      <input type="file">
                    </div>

                  </div>
                
                
                
                  <input id="acctSettForm__emailField" type="text" placeholder="Email Address">
                
                  <input id="acctSettForm__passField" type="password"placeholder="Password">
                
                  <input id="acctSettForm__passConfField" type="password" placeholder="Confirm Password">
                    <div class="input-field">
                  <input id="acctSettForm__introField" type="text" placeholder="Personal Description (short)" data-length="10">
                    </div>    
                    <div class="input-field">
                    <textarea id="acctSettForm__descField" class="materialize-textarea" data-length="120" placeholder="Personal Description (long)"></textarea>
                </div>
                
                <div class="input-field">
                <input type="submit" value="Save Changes" class="btn right" id="acctSettForm__save">
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