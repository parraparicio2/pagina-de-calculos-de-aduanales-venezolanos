<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="STYLESHEET" type="text/css" href="estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="funciones.js"></script>
<title>Busqueda de Cargas</title>
</head>

<body>

<?php
include("includes/funciones.php");

   


?>
<form id="buscar_carga" name="buscar_carga" method="post" action=" " > 
<table width="967" height="288" border="1" class="tabla_cargas">
  <tr bgcolor="teal">
    <td colspan="6" align="center" ><h2><em>CARGAS REGISTRADAS</em></h2></td>
  </tr>
  <tr>
    <td style="width:8%">CODIGO</td>
    <td style="width:8%">RIF</td>
    <td style="width:30%" align="center"> EXPEDIENTE</td>
    <td style="width:10%" align="center">FECHA DE REGISTRO</td>
    <td style="width:8%" align="center">DETALLES</td>

  </tr>  
<?php 
   if (trim($_POST['txtRif']) == '' )
      $txtRif = '%';
   else
      $txtRif = $_POST['txtRif'];
   
 $sql="select * from tbl_carga where fecha between '".trim(formatoFecha($_POST['txtfechadesde']))."' and '".trim(formatoFecha($_POST['txtfechahasta']))."' and rif ilike '".$txtRif."'";
    // echo $sql;
     $consulta=ejecutarConsulta($sql);
       if ($consulta)
       { 
           while ($campo=pg_fetch_array ($consulta))
           {
             
?>

              <tr>
                <td height="61"><?php echo $campo['codigo_carga']?></td>
                <td><?php echo $campo['rif']?></td>
                <td><?php echo $campo['expediente']?></td>
                <td><?php echo $campo['fecha']?></td>
                <td><a href ="reporte_carga.php?codigo_carga=<?php echo $campo['codigo_carga']?>">Ver</a></td>
                
              </tr>
              

 <?php                   
           }
        }
        else
             {
                 echo "<script> alert('Registro No Encontrado');
                    window.history.back();
                </script>";
                
             }
  

?>
  <tr>
    <td height="45" colspan="10" bgcolor="#CCCCCC"><div align="center"><span style="width:400px ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="button" name="cmdsalir" id="cmdsalir" value="SALIR" onclick="window.location='menu.php'"/>
    </span></div></td>
  </tr>    
</table>
</form>

</body>
</html>