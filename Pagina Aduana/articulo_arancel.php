<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Art&iacute;culo con  Aranceles </TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="CSS/estilo.css" MEDIA="all" />
<!-- <SCRIPT TYPE="text/javascript" SRC="CSS/view.js"></SCRIPT>  -->
<script type="text/javascript" src="funciones.js"></script>
<SCRIPT TYPE="text/javascript" SRC="js/validar.js"></SCRIPT>
<head >

</head> 

<body>
<H1>Art&iacute;culo - Arancel</H1>


<FORM METHOD="post" ACTION="registrar_articulo_arancel.php" NAME = "frmDatos" id = "frmDatos" >
<?php 
  include("includes/funciones.php");
  
  
  $txtCodigoArticulo = "";
  $txtDescripcionArticulo = "";
  $txtCodigoArancel = "";
  $txtDescripcionArancel = "";
  $txtEliminar  = "true";
  $txtModo  = "I";       
  if (isset($_POST['txtCodigoArticulo']) && trim($_POST['txtCodigoArticulo']) <> ""  )  
    { 
       $sql = "select * from tbl_articulo_arancel where codigo_articulo = '".$_POST['txtCodigoArticulo']."'";     
       
       $consulta = ejecutarConsulta($sql); 
       if ($consulta)
       {
         while ($campo = pg_fetch_array($consulta) )
         { 
           
               //$txtIDArticuloArancel = $campo['id_articulo_arancel'];  
               $txtCodigoArticulo = $campo['codigo_articulo'];
               $txtCodigoArancel = $campo['codigo_arancel'];
               $txtModo = "A";
         }
       }
       else
       {
       $txtModo = "I";
	 //  $txtIDArticuloArancel = trim($_POST['txtIDArticuloArancel']);
       //echo "<script>alert('no se encontro el registro') </script>"; 
       }
	   
	   
              //buscar articulos 
			  if  (trim($_POST['txtCodigoArticulo'])<> "" )
			  {
			  
				  $sql = "select * from tbl_articulo where codigo_articulo = '". trim($_POST['txtCodigoArticulo'])."'" ;     
				  $consulta = ejecutarConsulta($sql);
				  if ($consulta)
				  {
					  while ($campo = pg_fetch_assoc($consulta))
					  {
					  
						$txtCodigoArticulo = $campo['codigo_articulo'];
						$txtDescripcionArticulo = $campo['descripcion'];
					  }    	   
				  }	  
				  else
					 {
					 $txtCodigoArticulo = "";
					 $txtDescripcionArticulo = "";
					 echo "<script>alert('No se encuentra el articulo') </script>"; 
					 }
			 }

///buscar aranceles
              //buscar articulos 
			  if  (trim($_POST['txtCodigoArancel'])<> "" )
			  {
			  			  
				  $sql = "select * from tbl_arancel where codigo_arancel = '". trim($_POST['txtCodigoArancel'])."'" ;     
				  $consulta = ejecutarConsulta($sql);
				  if ($consulta)
				  {
				  
					  while ($campo = pg_fetch_assoc($consulta))
					  {
						$txtCodigoArancel = $campo['codigo_arancel'];
						$txtDescripcionArancel = $campo['descripcion'];
					  }    	   
				  }	  
				  else
					 {
					 $txtCodigoArancel = "";
					 $txtDescripcionArancel = "";
					 echo "<script>alert('No se encuentra el arancel') </script>"; 
					 }
			  }
	   
	   
	   
    }  
?>

<P>- Para buscar un registro ingrese el ID y luego haga click en el bot&oacute;n buscar</P>
<P>- Para eliminar un registro primero buscar el registro y luego haga click en el bot&oacute;n eliminar</P>
<P>- Para actualizar los datos primero debe buscar el registro y luego haga click en el bot&oacute;n guardar</P>
<P>&nbsp;</P>

<table  width="600" border="1">

 
 <tr>
   <td width="100" height="40"> <label>Articulo</label> </td>
   <td> <input type = "text" id="txtCodigoArticulo" name="txtCodigoArticulo" value="<?php echo $txtCodigoArticulo?>" onBlur="buscar()">
		<input id="cmdbuscar" name="cmdbuscar" type="button" value="Buscar" onclick="abrirBusqueda('frmDatos','txtCodigoArticulo','busqueda.php', sqlCodigo, sqlDescripcion, 1)" ><span id="spanArticulo"><?php echo $txtDescripcionArticulo?></span>
   </td>
 </tr>
 
 <tr>
   <td width="100" height="40"> <label>Arancel</label> </td>
   <td> <input type = "text" id="txtCodigoArancel" name="txtCodigoArancel" value="<?php echo $txtCodigoArancel?>" onBlur="buscar()">
   <input id="cmdbuscar" name="cmdbuscar" type="button" value="Buscar" onclick="abrirBusqueda('frmDatos','txtCodigoArancel','busqueda.php', sqlCodigoArancel, sqlDescripcionArancel, 1)" ><span id="spanArancel"><?php echo $txtDescripcionArancel?></span>
   </td>
 </tr>
 
 
 </table>
 
 
 <DIV CLASS="centrar">
              <INPUT ID="cmdGuardar" TYPE="button" NAME="cmdGuardar" VALUE="Guardar" onClick="validarpagina();"/>
              <INPUT ID="cmdEliminar" TYPE="button" NAME="cmdEliminar" VALUE="Eliminar" onClick="eliminar()"  />
              <INPUT ID="cmdLimpiar" TYPE="button" NAME="cmdLimpiar" VALUE="Limpiar"/ onClick = "limpiar()">
              <INPUT ID="cmdSalir" TYPE="button" NAME="cmdSalir" VALUE="Salir" onClick=" window.location='menu.php'" />
              <INPUT TYPE=HIDDEN NAME="txtEliminar" value="<?php echo $txtEliminar; ?>">
              <INPUT TYPE=HIDDEN NAME="txtModo" value="<?php echo $txtModo; ?>">
            </DIV>
            
            
            
  </form>
 </body>
  
  <!-- validacion de la pagina--> 
<SCRIPT>
  var sqlCodigo = 'select codigo_articulo, descripcion from tbl_articulo where codigo_articulo ilike \'%@parametro_codigo%\' order by 1';
  var sqlDescripcion = 'select codigo_articulo from tbl_articulo where descripcion ilike \'%@parametro_descripcion%\' order by 1';
  
  var sqlCodigoArancel= 'select codigo_arancel, descripcion from tbl_arancel where codigo_arancel ilike \'%@parametro_codigo%\' order by 1';
  var sqlDescripcionArancel = 'select codigo_arancel from tbl_arancel where descripcion ilike \'%@parametro_descripcion%\' order by 1';
  
<!--
function validarpagina()
{
   
      
   if (validarCampo('txtCodigoArticulo') == false)
      return 0;
   
   if (validarCampo('txtCodigoArancel') == false)
      return 0;
    
  document.frmDatos.submit();    
}

function buscar()
{
   if (document.forms[0].txtCodigoArticulo.value.length==0)
       return false;  
	   
   /*if (validarCampo('txtIDArticuloArancel') == false)
      return 0;
    */ 
   document.frmDatos.action = 'articulo_arancel.php';
   document.frmDatos.submit();
}

function eliminar()
{
   if (validarCampo('txtCodigoArticulo') == false)
      return 0;
      
   document.frmDatos.action = 'registrar_articulo_arancel.php';
   document.frmDatos.txtModo.value = 'E';
   document.frmDatos.submit();
}
function change()
{
   document.frmDatos.txtModo.value = 'I';
}

function limpiar()
{
   //document.frmDatos.txtIDArticuloArancel.value = '';
   document.frmDatos.txtCodigoArticulo.value = '';
   document.frmDatos.txtCodigoArancel.value = '';
   document.frmDatos.txtModo.value = 'I';
}

</SCRIPT>
  
</HTML>  
  
  
            
 