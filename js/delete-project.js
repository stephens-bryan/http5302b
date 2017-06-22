$(document).ready(function(){  
//     alert("Working");
   
  // DELETE MY PROJECT
  $('[id^=my-projects-form__btn-delete]').click(function() {
      var id = $(this).val();
      $('#delete-project-modal__btn-delete-confirm').val(id);
    $('#delete-project-modal__btn-delete-confirm').click(function() {
      $.post('./functions/delete-project.php', {id : id}, function(data){
      });
      $('#my-projects-form__btn-delete' + id).parents('tr').fadeOut();
    });
  });  
  
});