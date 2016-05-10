<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="STYLESHEET" type="text/css" href="estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script><script type="text/javascript" src="funciones.js"></script>
<script type="text/javascript" src="funciones.js"></script>
<title>Buscar Carga</title>
</head>
<body>
<div id="contenedor" >
   <div id="main" >
<?php
include("includes/funciones.php");
 
?>
<form id="frmreportecarga" name="frmreportecarga" method="post" action="" >

<table width="575" height="354" border="1" class="tabla_cargas">
  <tr>
    <th height="50" colspan="4" bgcolor="#339999" scope="col"><h2><em>REPORTE DE CARGA</em></h2></th>
  </tr>
  <tr>
    <td width="193">RIF</td>
    <td width="332" style="width:300px">
      <input type="text" name="txtRif" id="txtRif"  lang="El RIF" />
    </td>
  </tr>
  <tr> 

  <td>Fecha desde</td>
    <td><input type="text" id="txtfechadesde" name="txtfechadesde" value= "<?php echo date('d/m/Y'); ?>" /></td>
  </tr>  
<tr> 
    <td >Fecha Hasta</td>
    <td><input type="text" id="txtfechahasta" name="txtfechahasta" value= "<?php echo date('d/m/Y'); ?>" /></td>
  </tr>   
  <tr>
    <td height="45" colspan="6" bgcolor="#CCCCCC"><div align="center"><span style="width:400px ">
      <input type="button" name="cmdbuscar" id="cmdbuscar" value="BUSCAR" onclick="botonBuscar();"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="button" name="cmdsalir" id="cmdsalir" value="SALIR" onclick="window.location='menu.php'"/>
      </span></div></td>
  </tr>
  </table>
 
</form>
<script>
  
   function botonBuscar()
   {
	  if (validarDatos(document.frmreportecarga,'txtRif') )
        return false;
 	
		 
      document.frmreportecarga.action='cargas_encontradas.php';  
	  document.frmreportecarga.submit();
	  
   }
    
</script>
</div>
</div>
</body>
</html>