$(document).ready(function(){  
//     alert("Working");
  
  // DELETE MY PROJECT
  $('[id^=btnDeleteProject]').click(function() {
      var id = $(this).val();
      $('#btnDeleteProjectConfirm').val(id);
    $('#btnDeleteProjectConfirm').click(function() {
      $.post('./functions/delete-project.php', {id : id}, function(data){
          $('#btnDeleteProject' + data).parents('tr').fadeOut();
      });
    });
  });
  
   // DELETE MY ACCOUNT
//   $('[id^=btnDelete]').click(function() {
//       var id = $(this).val();
//       $.post('./functions/delete-project.php', {id : id}, function(data){
        
//           $('#btnDelete' + data).parents('tr').slideUp();
//       });
//   });
  
  
});