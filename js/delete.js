$(document).ready(function(){  
//     alert("Working");
  
  // DELETE MY PROJECT
  $('[id^=my-projects-form__btn-delete]').click(function() {
      var id = $(this).val();
      $('#delete-project-modal__btn-delete-confirm').val(id);
    $('#delete-project-modal__btn-delete-confirm').click(function() {
      $.post('./functions/delete-project.php', {id : id}, function(data){
          $('#my-projects-form__btn-delete' + data).parents('tr').fadeOut();
      });
    });
  });
  
 // DELETE MY ACCOUNT
 $('#acctSettForm__delete-account').click(function() {
      var id = $(this).val();
      $('#delete-account-modal__btn-delete-confirm').val(id);
    $('#delete-account-modal__btn-delete-confirm').click(function() {
      $.post('./functions/delete-account.php', {id : id}, function(data){
          $( location ).attr("href", 'index.php');
      });
    });
  });
  
  
});