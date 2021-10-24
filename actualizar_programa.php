<?php
  include('funciones.php');
  session_start();
  $vprograma=$_POST['programa'];
  $vide=$_SESSION['ide1'];
  $votipo=$_POST['otipo'];

  $miconexion=conectar_bd('', 'sena_bd');
  $resultado=consulta($miconexion,"update programa set Progra_Nombre='{$vprograma}', Progra_id='{$vide}', Progra_tipo='{$votipo}'");

if ($miconexion->affected_rows>0)
     {
      echo "actualizacion exitosa";
     }
?>

