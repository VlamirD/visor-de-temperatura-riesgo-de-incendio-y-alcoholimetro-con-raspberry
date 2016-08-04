<?php
//configurando servidor
$serve=mysql_connect('localhost','root','');
if(!$serve){echo 'error';}
$db=mysql_select_db('temperaturaapp',$serve);
//incluir datos
//
//
//listar datos
/*if($_GET['valor']=='actual'){
    $sql="select * from dato_climatico where fecha=curdate()";
    $re=mysql_query($sql,$serve);
    $num=mysql_num_rows($re);
    if($num>0){
        while($lista=mysql_fetch_object($re)){
            echo "<br>fecha:</b>{$lista->fecha}</br>";
            echo "<b>temperatura:</b>{$lista->temperatura} <b><br><b>presion:</b>{$lista->presion}</br><br>";
        }
    }
//}*/
if(isset($_GET['valor'])){
    if($_GET['valor']=='listar') $sql="SELECT * FROM dato_climatico ORDER BY id DESC LIMIT 1";
    if($_GET['valor']=='listar5') $sql="SELECT * FROM dato_climatico ORDER BY id DESC LIMIT 5";
    echo $_GET['valor'];
    $re=mysql_query($sql,$serve);
    $num=mysql_num_rows($re);
    if($num>0){
        while($lista=mysql_fetch_object($re)){
            echo "<br>fecha:</b>{$lista->fecha}</br>";
            echo "temperatura:</b>{$lista->temperatura} <b><br><b>presion:</b>{$lista->presion}</br><br>";
        }
    }
    else{
        echo 'no hay temperaturas';
    }
}
?>