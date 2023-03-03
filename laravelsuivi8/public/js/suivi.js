$(document).ready( function () {
    $('#table_accueil').DataTable();

    $(document).on("click", "#1", function() {
        console.log(baseUrl+"/activite");
        $.ajax({
            type: "POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: baseUrl + "/activite",
            dataType: "json",
            success: function(msg){
    
            },
            error:function(){
              alert('Un problème est survenu lors de ...');
            }
          });
    });
} );
