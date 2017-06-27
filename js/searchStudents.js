$(document).ready(function(){

  

    var userTerm = $('#search').val(); //grabs the value from search field.
    var searchResults = [];//array that holds search results.
    
  
  //Clears searchResults array on click to to prevent duplicate info 
  $( "#search" ).on('click',function() {
      searchResults = [];
});

   

//sends back json objects that match search query
    $('#searchbtn').on('click', function(){
      
        var userTerm = $('#search').val();
      console.log(userTerm);


        $.post( "../functions/SearchFunctions/searchCMS/searchStudents.php", { term: userTerm },  function( data ) {
              console.log(data);

            $.each(data, function(index, obj){

                searchResults.push(obj);


            });

                console.log(searchResults);

        });



    });




});