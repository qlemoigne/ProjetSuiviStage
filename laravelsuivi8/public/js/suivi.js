$(document).ready( function () {

  $( function() {
    $( "#ensemble-etape" ).accordion();
  } );

    $('#table_accueil').DataTable();

    $(document).on("click", ".jalon", function() {
        console.log($(this));
        $.ajax({
            type: "POST",
            async: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: baseUrl + "/activite",
            data: {id :$(this).attr('ID')},
            dataType: "json",
            success: function(msg){
    
            },
            error:function(){
              alert('Un problème est survenu lors de ...');
            }
          });
       /* $("x-bladewind.timeline#"+$(this).attr('ID'));
        document.getElementById($(this).attr('ID')).innerHTML ="<x-bladewind.timeline date='11' label='toto' status= 'completed' stacked='true' color='green' id='1' /> </div>";
      */
        location.reload();
    });

    $(document).on("click", ".cloture", function() {
      console.log($(this));
      $.ajax({
          type: "POST",
          async: false,
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: baseUrl + "/cloture",
          data: {id :$(this).attr('ID')},
          dataType: "json",
          success: function(msg){
  
          },
          error:function(){
            alert('Un problème est survenu lors de ...');
          }
        });
     /* $("x-bladewind.timeline#"+$(this).attr('ID'));
      document.getElementById($(this).attr('ID')).innerHTML ="<x-bladewind.timeline date='11' label='toto' status= 'completed' stacked='true' color='green' id='1' /> </div>";
    */
      location.reload();
  });
  
} );
