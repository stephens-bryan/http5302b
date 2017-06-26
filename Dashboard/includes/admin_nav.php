
    <!--END #header-->
        <div class="row top-padding">
            <aside id="admin_nav" class="col m4 l3 z-depth-2">
                <div class="center-align">
                    <img src="/http5302b/Dashboard/includes/media/HumberWebDev.png" alt="humber logo" title="Image of humber logo" width="70%"/>
                </div>

                <ul>
                    <li class="row">
                        <p class="col s4 right-align">
                            <i class="material-icons">supervisor_account</i>
                        </p>
                        <p class="col s8"><a href="/http5302b/Dashboard/students-admin/list_student.php" class="admin_core_link">Manage Students</a></p>
                    </li>
                    <li class="row">
                        <p class="col s4 right-align">
                            <i class="material-icons">art_track</i>
                        </p>
                        <p class="col s8"><a href="?board=projects" class="admin_core_link">Manage Projects</a></p>
                    </li>
                    <li class="row">
                        <p class="col s4 right-align">
                            <i class="material-icons">class</i>
                        </p>
                        <p class="col s8"><a href="?board=classes" class="admin_core_link">Manage Classes</a></p>
                    </li>
                </ul>

                <p class="row">
                    <p class="col s5 right-align">
                        <i class="material-icons">settings</i>
                    </p>
                    <p class="col s7">Profile Settings</p>
                </p>

            </aside>
            <script type='text/javascript'>
                var height = $(window).height() - $('#admin_head').height();
                $("#admin_nav").css("height", height);
                $(".top-padding").css("top", $('#admin_head').height());
                $( window ).resize(function() {
                    $("#admin_nav").css("height", height);
                    $(".top-padding").css("top", $('#admin_head').height());
                });
            </script>
            <!--END #side-->
            <main class="col m8 l9 offset-m4 offset-l3">
                <div class="container row">
