
$("#frmAcceso").on('submit', function(e)
{
    e.preventDefault();
    logina=$("#logina").val();
    clavea=$("#clavea").val();

    if ((logina!="") && (clavea !=""))
    {

    $.post("../ajax/usuario.php?op=verificar",
        {"logina":logina, "clavea":clavea},
        function(data)
        {
            
            if (!data)
           
            {
                alert("Usuario incorrecto");
            }
            else(data) 
            {
                $(location).attr("href","escritorio.php");  
            }     
            
        });
}
            
else
    {
        $("#logina").focus();
        Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'You need to complete all the fields', 
        
    })       
    }
})