<!doctype html>
<html>
<head>
    <title>Crear Ficha</title>
    <meta http-equiv="content-type" content="text/html; charset=uf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shirnk-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="miscss/estilos.css" rel="stylesheet"/>
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <div id="div1" class="container">
    <br>
      <div id="div2">
         <?php session_start(); if(! empty($_SESSION['Tipo_usuario']))  { ?> <img src="" width="" alt=""> <?php }  ?>
         <div id="div3" >
         <?php
         if($_SESSION['Tipo_usuario']=='administrador')
         {
         ?>
         <form id="formulario" role="form" method="post" action="guardar_ficha.php">
          <div class="col-md-12">
            <strong class="lgris">Ingrese la ficha</strong>
            <br>
            
            </div>
            <div class="form-group col-md-5">
                <input class="form-control" style="text-transform: uppercase; position: relative;right: -230px;bottom: 0px;" type="number" name="ficha" value="" placeholder="Ficha" required/>
                <label class="form-control" style="text-transform: uppercase; position: relative;right: -230px;bottom: -5px;" </label>
                <div class="form-group col-xs-2">
                  <?php
                          include('funciones.php');
                          $miconexion=conectar_bd('','sena_bd');
                          $consulta="SELECT * FROM programa";
                          $resultado=mysqli_query ($miconexion, $consulta) or die (mysqli_error($miconexion));

                          ?>
                    <select class="form-control" name="progra">
                      <option value="" selected></option>
                      <?php while ($opcion = $resultado -> fetch_object()) { ?>
                        <option value="<?php echo $opcion->Progra_id;?>"><?php echo $opcion->Progra_Nombre;?></option>
                                        <?php } ?>
                    </select>
                </div>
                
                <input class="btn btn-primary" style="position: relative;right: 0px;bottom: -50px;" type="submit" value="Guardar">
            </div>
            <input style="position: relative;right: -10px;bottom:-70px;"  class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="Atras"> 
         </form>
         <?php
         }
         else
         {
           echo "no tiene permisos para realizar esta accion";
         }
         ?>
         <br>
          </div>
        </div>
    </div>
  </body>
</html>