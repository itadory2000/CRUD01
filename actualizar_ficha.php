<?php
  include('funciones.php');
  session_start();
  $vnumid=$_POST['numid'];
  $vide=$_SESSION['ide1'];

  $miconexion=conectar_bd('', 'sena_bd');
  $resultado=consulta($miconexion,"update fichas set ficha_numero='{$vnumid}', ficha_progra='{$vide}'");

if ($miconexion->affected_rows>0)
     {
      echo "actualizacion exitosa";
     }
?>