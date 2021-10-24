<!DOCTYPE html>
<html>
<head>
    <title>Modificacion de programas</title>
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
                        <input class="form-control" style="position: relative;right: -230px;bottom: 0px;" type="text" name="programa" nautofocus value="" placeholder="PROGRAMA"/>
                      </div>
                      <div class="form-group col-md-3">
                        <input class="btn btn-primary" style="position: relative;right: -290px;bottom: -20px;" type="submit" value="Consultar">
                      </div>
                      <input style="position: relative;right: 0px;bottom: -60px;"  class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="Atras"> 
                    </div>
                    <br>
                  </div>
              </form>
              <br>
        </div>
      
         <div id="divconsulta2">
        <?php
        if ($_SERVER['REQUEST_METHOD']==='POST')
           {
               include('funciones.php');
               session_start();
               $vprograma=$_POST['programa'];
               $miconexion=conectar_bd('', 'sena_bd');
              $resultado=consulta($miconexion,"select * from programa where Progra_Nombre='{$vprograma}'");  
              if ($resultado->num_rows>0)
              {
                  $fila = $resultado->fetch_object();
                  $_SESSION['ide1']=$fila->Progra_id;
                  ?>
                <form id="formulario2" role="form" method="post" action="actualizar_programa.php">
                  <div class="col-md-12">
                    <strong class="lgris">Datos del programa</strong><br>

                    <label class="lgris">Id:</label>
                       <input class="form-control" type="text" name="ide1" disabled="disabled" value="<?php echo $fila->Progra_id?>"/>

                       <label class="lgris">Nombres:</label>
                       <input class="form-control" style="text-transform:uppercase;" type="text" name="programa" required value="<?php echo $fila->Progra_Nombre ?>"/>

                       <label class="lgris">Tipo Programa:</label>
                       <input class="form-control" style="text-transform:uppercase;" type="text" name="otipo" value="<?php echo $fila->Progra_tipo ?>" required/>

                    <input class="btn btn-primary" type="submit" value="Actualizar">
                    <br>
                  </div>
                </form>
                <?php
               
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