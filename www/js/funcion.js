server='';
$(document).ready(function(){
    //var $server='http://localhost/xampp/Proyecto/www/';
    server='http://localhost/xampp/Proyecto/www/';
    function lista(dato){
        $.ajax({
            type:"get",
            dataType:'html',
            url:server+"/conecta.php",
            data:"valor=listar"+dato,
            success:function(data){
                $('#listar').html(data);
            }
        });
    }
    function listartemp(){
        $.ajax({
            type:"get",
            dataType:'html',
            url:server+"/conecta.php",
            data:"valor=listar"+5,
            success:function(data){
                $('#listar1').html(data);
            }
        });
    }
    //detalles();
    listartemp();
    lista('');
});
function detalles(valor){
        var id=$('#opcion'+valor).val();
        //console.log(id);
        //alert(""+id);
        $.ajax({
            type:"get",
            dataType:'html',
            url:server+"/conecta.php",
            data:"atributo="+id+"&valor=especifico",
            success:function(data){
                $('#detalles').html(data);
            }
        });
    }