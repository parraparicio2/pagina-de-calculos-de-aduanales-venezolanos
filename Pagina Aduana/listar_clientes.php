<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK rel="stylesheet" href="tablas.css" type="text/css"/>
<LINK rel="stylesheet" href="estilos.css" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista de Cliente</title><!--esta linea-->
</head>
<?php
   include("includes/funciones.php"); 
  
?>
<body>
<p class="titulo_reportes">Listado de Clientes</p><!--esta linea-->
<table id ="one-column-emphasis" class = "tabla_reporte">
  <tr>
     <td>RIF</td>
     <td>Nombre</td>
     <td>Direccion</td>
     <td>Correo</td>
     <td>Telefono</td>
     <?php
        $sql = "select * from tbl_clientes";//esta linea
        $consulta = ejecutarConsulta($sql); 
        if ($consulta)
        { 
           while ($campo=pg_fetch_array ($consulta))
           {
      ?>           
             <tr>    
                <td style="width:10%"><?php echo $campo['rif'] ?></td><!--esta linea-->
                <td style="width:10%"><?php echo $campo['nombre_del_cliente'] ?></td><!--esta linea-->
                <td style="width:40%"><?php echo $campo['direccion'] ?></td><!--esta linea-->
                <td style="width:5%"><?php echo $campo['correo'] ?></td><!--esta linea-->
                <td style="width:5%"><?php echo $campo['telefono'] ?></td><!--esta linea-->
                
                
             </tr>   
      <?php           
           }
        }
     ?>
  </tr>
</table>
<p class="titulo_reportes">
<input type="button" value="Imprimir" onclick="window.print()">
<input type="button" value="Salir" onclick="window.top.location='menu.php'">

</p>
</body>
</html>