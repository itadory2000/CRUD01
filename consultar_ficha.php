<!doctype html>
<html>
<head>
    <title>Consulta de fichas</title>
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
                <strong class="lgris">ingrese el numero de la ficha</strong>
                <br><br>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <input class="form-control" style="text-transform: uppercase;position: relative;right: -290px;bottom: 0px;" type="number" name="Ficha" value="" placeholder="Ficha"/>
                  </div>
                  <div class="form-group col-md-3">
                    <input class="btn btn-primary" style="position: relative;right: -290px;bottom: -20px;" type="submit" value="Consultar">
                  </div>
                  <input style="position: relative;right: 0px;bottom: -30px;"  class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="Atras">  
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
          $vficha=$_POST['Ficha'];
          $miconexion=conectar_bd('', 'sena_bd');
          $resultado=consulta($miconexion,"select * from fichas where trim(ficha_numero) like '%{$vficha}%'");  
          if ($resultado->num_rows>0)
            {
              while ($fila = $resultado->fetch_object())
                {
                  echo $fila->ficha_numero." ".$fila->ficha_progra."<br>";
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