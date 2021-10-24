<?php
include('funciones.php');
  $vficha=$_POST['ficha'];
  $vprograma=$_POST['progra'];

  $miconexion=conectar_bd('', 'sena_bd');
  $resultado=consulta($miconexion,"insert into fichas (ficha_numero,ficha_progra) values ('{$vficha}','{$vprograma}')");
  if ($resultado)
    {
        echo "Guardado exitoso";
    }
    ?>

