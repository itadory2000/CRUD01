<!doctype html>
<html>
<head>
    <title>Crear Programa</title>
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
         <form id="formulario" role="form" method="post" action="guardado_programa.php">
          <div class="col-md-12">
            <strong class="lgris">Ingrese los datos del programa</strong>
            <br>
            <label class="lgris">Tipo:</label>
            <div class="form-group col-xs-2">
                  <?php
                          include('funciones.php');
                          $miconexion=conectar_bd('','sena_bd');
                          $consulta="SELECT * FROM tiposprograma";
                          $resultado=mysqli_query ($miconexion, $consulta) or die (mysqli_error($miconexion));

                          ?>
                    <select class="form-control" name="tipo">
                      <option value="" selected></option>
                      <?php while ($opcion = $resultado -> fetch_object()) { ?>
                        <option value="<?php echo $opcion->tiposp_id;?>"><?php echo $opcion->tiposp_tipo;?></option>
                                        <?php } ?>
                    </select>
                </div>
                <label class="lgris" style="text-align: center;">Nombre del programa:</label>
                <input class="form-control" style="text-transform: uppercase;" type="text" name="programa" value="" placeholder="Nombre del programa" required/>
          
                
                <br>
                <input class="btn btn-primary" type="submit" value="Guardar">
            </div>
            <input style="position: relative;right: -0px;bottom:-10px;"  class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="Atras"> 

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