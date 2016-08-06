<?php
//configurando servidor
$serve=mysql_connect('localhost','root','');
if(!$serve){echo 'error';}
$db=mysql_select_db('temperaturaapp',$serve);
$dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
$mes=array('01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Nobiembre','12'=>'Diciembre');
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
    if($_GET['valor']=='detalles')$sql="SELECT * FROM dato_climatico ORDER BY id DESC LIMIT 1";
    $re=mysql_query($sql,$serve);
    $num=mysql_num_rows($re);
    if($num>0){
        while($lista=mysql_fetch_object($re)){
            echo "<div class='ui-btn ui-btn-corner-all bg-cian'>";
            $i = strtotime($lista->fecha);
            echo "<p>".$dias[jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m",$i),date("d",$i), date("Y",$i)) , 0 )].",".$mes[date("m",$i)]." ".date("d",$i)."</p>";
            echo "<p></b>{$lista->temperatura}</p>";
            $temp=$lista->temperatura;
            if($temp<=15){
                //echo "<p></b>{$lista->presion}</p>";
                echo "<img src='img/nublado.png'>";
                echo "<p>Nublado</p>";
                echo "<a href='#pagina3'></a>";
            }
            echo "</div>";
        } 
    }
    else{
        echo 'no hay temperaturas';
    }
}
?>