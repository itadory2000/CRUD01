<?php 
include('funciones.php');

    $vtipo=$_POST['tipo'];

    $miconexion=conectar_bd('', 'sena_bd');
    $resultado=consulta($miconexion, "insert into programa (Progra_tipo) values ('{$vtipo}') ");
    if ($resultado)
        {
            echo "Guardado exitoso";
        }
    ?>