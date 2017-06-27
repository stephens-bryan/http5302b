$(document).ready(function(){
  $('.thumbnail-small').hover(
         function(){ $(this).addClass('z-depth-5') },
         function(){ $(this).removeClass('z-depth-5') }
  )
});
