$(document).ready(function(){
//grab the submit button

  $("#submit-project").submit(function(){
        $("#submission-progress").html('<p>Please be patient as we upload your project.</p><div class="progress"><div class="indeterminate"></div>');
        $("#add-project-form-container").hide();

    var formData = new FormData($(this)[0]);
    $.ajax({
      url:'./functions/add-project-logic.php',
      type:'POST',
      data: formData,
      async: true,
      success:function(data){
                  $("#upload-feedback").html(Materialize.toast("<p>Result:<br/>" + data + "</p>", 10000));


                $("#submission-progress").html('');
         $("#add-project-form-container").show();

      },
      cahce: false,
      contentType:false,
      processData:false
    });
    return false;
  }); //end of submit function
});//end of page ready function