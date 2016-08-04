$(document).ready(function(){
    var $server='http://localhost:80/xampp/Proyecto/www/';
    $('#pagina1').on('load',function(){
            $.ajax({
            type:"get",
            dataType:'html',
            url:$server+"/conecta.php",
            data:"valor=actual",
            success:function(data){
                $('#actual').html();
                intel.xdk.notification.alert('valor mostrado','aviso1','ok');
            }
        });
    });
    function listartemp(){
        $.ajax({
            type:"get",
            dataType:'html',
            url:$server+"/conecta.php",
            data:"valor=listar"+5,
            success:function(data){
                $('#listar1').html(data);
            }
        });
    }
    function lista(dato){
        $.ajax({
            type:"get",
            dataType:'html',
            url:$server+"/conecta.php",
            data:"valor=listar"+dato,
            success:function(data){
                $('#listar').html(data);
            }
        });
    }
    listartemp();
    lista('');
});