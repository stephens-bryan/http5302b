
$(document).ready(function(){

    var userTerm = $('#search').val(); //grabs the value from search field
    var searchFor = []; //array that will hold all Tech and Stack terms.
    var searchResults = [];//array that holds search results.


  $( "#search" ).on('click',function() {
      searchResults = [];
});

    //Grabs all the entries from the Techs and Stacks table and puts them in array.
        $.getJSON("getSearchHelper.php", function (data) {
           console.log(data);

            $.each(data, function(index, obj){

                searchFor.push(obj.title);


            });

                console.log(searchFor);


        });

//autocomplete ui populates helpers from array
    $( "#search" ).autocomplete({
        source: searchFor,
        autoFocus:true,
        minLength:1,
        delay: 500
    });


//sends back json objects that match search query
    $('#submit').on('click', function(){
        var userTerm = $('#search').val();


        $.post( "getSearchResults.php", { term: userTerm },  function( data ) {
              console.log(data);

            $.each(data, function(index, obj){

                searchResults.push(obj);


            });

                console.log(searchResults);

        });



    });









});