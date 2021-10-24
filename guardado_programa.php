<?php
include('funciones.php');
  $vprograma=$_POST['programa'];
  $vtipo=$_POST['tipo'];


  $miconexion=conectar_bd('', 'sena_bd');
  $resultado=consulta($miconexion,"insert into programa(Progra_Nombre, Progra_tipo) values ('{$vprograma}','{$vtipo}')");
  if ($resultado)
    {
        echo "Guardado exitoso";
    }
    ?>

