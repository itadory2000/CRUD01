<!doctype html>
<html>
<head>
    <title>Consulta de programa</title>
    <meta http-equiv="Content-Type" content="texto/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
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
                  <div class="form-group col-md-3">
                    <input class="form-control" style="text-transform: uppercase; position: relative;right: -100px;bottom: 0px;" type="text" name="programa" value="" placeholder="Programa"/>
                  </div>
                  </div>
                  <div class="form-group col-md-3">
                    <input class="btn btn-primary" style="position: relative;right: -270px;bottom: 0px;" type="submit" value="Consultar">
                  </div>
                  <input style="position: relative;right: 10px;bottom: -10px;"  class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="Atras">   
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
          $vprograma=$_POST['programa'];
          $miconexion=conectar_bd('', 'sena_bd');
          $resultado=consulta($miconexion,"select * from programa where trim(Progra_Nombre) like '%{$vprograma}%'");  
          if ($resultado->num_rows>0)
            {
              while ($fila = $resultado->fetch_object())
                {
                  echo $fila->Progra_tipo." ".$fila->Progra_Nombre."<br>";
                }
            }
          else{
            echo "No existen registros";
          }
          $miconexion->close();
        }?>
        </div>
       </div>
    </div>
</body>
</html>