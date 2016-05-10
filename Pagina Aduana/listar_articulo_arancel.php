<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK rel="stylesheet" href="tablas.css" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reportes de Articulos</title><!--esta linea-->
</head>
<?php
   include("includes/funciones.php"); 
  
?>
<body>
<p class="titulo_reportes">Reporte de Articulos con aranceles</p><!--esta linea-->
<table id ="one-column-emphasis" class = "tabla_reporte">
  <tr>
     <td>C&oacute;digo Articulo</td>
     <td>Articulo</td>
     <td>C&oacute;digo Arancel</td>
     <td>Arancel</td>
     <td>Valor</td>
     <?php
	    $sql = "select a.codigo_articulo, b.descripcion as descripcion_articulo, a.codigo_arancel, c.descripcion as descripcion_arancel, c.valor  
  				    from tbl_articulo_arancel a 
					 join tbl_articulo b 
					   on a.codigo_articulo = b.codigo_articulo
				      join tbl_arancel c 
					    on c.codigo_arancel = a.codigo_arancel  ";
						
		$consulta = ejecutarConsulta($sql); 
		if ($consulta)
	    { 
		   while ($campo=pg_fetch_array ($consulta))
		   {
	  ?>		   
             <tr>    
			    <td style="width:10%"><?php echo $campo['codigo_articulo'] ?></td><!--esta linea-->
                <td style="width:40%"><?php echo $campo['descripcion_articulo'] ?></td><!--esta linea-->
			    <td style="width:10%"><?php echo $campo['codigo_arancel'] ?></td><!--esta linea-->
                <td style="width:40%"><?php echo $campo['descripcion_arancel'] ?></td><!--esta linea-->
			    <td style="width:10%"><?php echo $campo['valor'] ?></td><!--esta linea-->
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