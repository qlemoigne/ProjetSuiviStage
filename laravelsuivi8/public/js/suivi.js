$(document).ready( function () {
    $('#table_accueil').DataTable();
} );

function changementEtat(valide_id){
    $.ajax({
        type:"POST",
        url:"changementEtat.php",
        data:{id : valide_id}
    })
};