$(document).ready(function(){
//grab the submit button
  $("#submit-project").submit(function(){
        $("#submission-progress").html('<p>Project Uploading.</p><div class="progress"><div class="indeterminate"></div>');

    var formData = new FormData($(this)[0]);
    $.ajax({
      url:'add-project-logic.php',
      type:'POST',
      data: formData,
      async: true,
      success:function(data){
        alert(data)
                $("#submission-progress").html('');

      },
      cahce: false,
      contentType:false,
      processData:false
    });
    return false;
  }); //end of submit function
});//end of page ready function