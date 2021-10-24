<!doctype html>
<html>
<head>
    <title>Eliminacion de aprendices</title>
    <meta http-equiv="content-Type" content="text/html: charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shirnk_to_fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="miscss/estilos.css" rel="stylesheet"/>
    <script src="js/bootstrap.js"></script>
</head>
<body>
  <div id="divconsulta" class="container">
       <br>
       <div id="div2">
         <div id="div4">
              <form name="formulario" role="form" method="post">
                 <div class="col-md-12">
                     <strong class="lgris">ingrese criterio de busqueda</strong>
                     <br><br>
                     <div class="form-row">
                        <div class="form-group col-md-5">
                           <input class="form-control" style="position: relative;right: -230px;bottom: 10px;" type="number" name="numid" min="9999" max="9999999999999" value="" placeholder="IDENTIFICACION"/>
                        </div>
                        <div class="form-group col-md-3">
                           <input class="btn btn-primary" style="position: relative;right: -290px;bottom: -10px;" type="submit" value="Eliminar">
                        </div>
                        <input style="position: relative;right: -0px;bottom: -50px;"  class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="Atras">
                 </div>
                  <br>
                </div>
              </from> 
              <br>
            </div>
            

            <div id="divconsulta2">
           <?php
           if ($_SERVER['REQUEST_METHOD']==='POST')
           {
            include('funciones.php');
            $vnumid=$_POST['numid'];
            $miconexion=conectar_bd('', 'sena_bd');
            $resultado=consulta($miconexion,"select * from aprendices where Apre_Numid='{$vnumid}'");
            $resultado2=consulta($miconexion,"delete from aprendices where Apre_Numid='{$vnumid}'");
            if ($resultado->num_rows>0)
            {
                $fila = $resultado->fetch_object();
                echo $fila->Apre_id." ".$fila->Apre_Tipoid." ".$fila->Apre_Numid." ".$fila->Apre_Nombres." ".$fila->Apre_Apellidos." ".$fila->Apre_Direccion." ".$fila->Apre_Telefono." ".$fila->Apre_Ficha."<br>";

                if($resultado2)
                echo "<br> Datos borrados exitosamente";
            } 
            else{
                echo "no existen registros";
              }
              $miconexion->close();
           }?>
        </div>
        </div>
    </div>
</body>
</html>