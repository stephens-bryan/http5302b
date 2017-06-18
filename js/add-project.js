$(document).ready(function(){
//grab the submit button
  $("#submit-project").submit(function(){
    alert('clicked');
    var formData = new FormData($(this)[0]);
    $.ajax({
      url:'add-project-logic.php',
      type:'POST',
      data: formData,
      async: false,
      success:function(data){
        alert(data)
      },
      cahce: false,
      contentType:false,
      processData:false
    });
    return false;
  }); //end of submit function
});//end of page ready function