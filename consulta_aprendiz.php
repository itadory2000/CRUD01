<!doctype html>
<html>
<head>
    <title>Consulta de aprendiz</title>
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
                    <input class="form-control" style="position: relative;right: -190px;bottom: -80px;" type="number" name="numid" min="9999" max="9999999999999" value="" placeholder="IDENTIFICACION"/>
                  </div>
                  <div class="form-group col-md-3">
                    <input class="form-control" style="text-transform: uppercase;position: relative;right: -190px;bottom: 10px;" type="text" name="nombres" value="" placeholder="Nombres"/>
                  </div>
                  <div class="form-group col-md-3">
                    <input class="form-control" style="text-transform: uppercase;position: relative;right: -400px;bottom: 48px;" type="text" name="apellidos" value="" placeholder="Apellidos"/>
                  </div>
                  <div class="form-group col-md-3">
                    <input class="btn btn-primary" style="position: relative;right: -390px;bottom: 30px;" type="submit" value="Consultar">
                    <input style="position: relative;right: -240px;bottom: -100px;"  class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="Atras">   
                  </div>
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
                $vnumid=$_POST['numid'];
                $vnombres=$_POST['nombres'];
                $vapellidos=$_POST['apellidos'];
                $miconexion=conectar_bd('', 'sena_bd');
                $resultado=consulta($miconexion,"select * from aprendices where trim(Apre_Numid) like '%{$vnumid}%' and (trim(Apre_Nombres) like '%{$vnombres}%' and trim(Apre_Apellidos) like '%{$vapellidos}%')");  
                if ($resultado->num_rows>0)
                    {
                        while ($fila = $resultado->fetch_object())
                        {
                            echo $fila->Apre_id." ".$fila->Apre_Tipoid." ".$fila->Apre_Numid." ".$fila->Apre_Nombres." ".$fila->Apre_Apellidos." ".$fila->Apre_Direccion." ".$fila->Apre_Telefono." ".$fila->Apre_Ficha."<br>";
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