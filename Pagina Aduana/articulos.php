<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Articulos</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="CSS/estilo.css" MEDIA="all" />
<!-- <SCRIPT TYPE="text/javascript" SRC="CSS/view.js"></SCRIPT>-->
<script type="text/javascript" src="funciones.js"></script>
<SCRIPT TYPE="text/javascript" SRC="js/validar.js"></SCRIPT>
<head >

</head> 
<body>
<H1>Art&iacute;culos</H1>


<FORM METHOD="post" ACTION="registrar_articulos.php" NAME = "frmDatos" id = "frmDatos" >
<?php 
  include("includes/funciones.php");
  
  $txtCodigoArticulo = "";
  $txtDescripcion = "";
  $txtEliminar  = "true";
  $txtModo  = "I";       
  if (isset($_POST['txtCodigoArticulo']) && trim($_POST['txtCodigoArticulo']) <> ""  )  
    { 
       $sql = "select * from tbl_articulo where codigo_articulo = '".$_POST['txtCodigoArticulo']."'";     
       
       $consulta = ejecutarConsulta($sql); 
       if ($consulta)
       {
         while ($campo = pg_fetch_array($consulta) )
         { 
           
               $txtCodigoArticulo = $campo['codigo_articulo'];  
               $txtDescripcion = $campo['descripcion'];
               $txtModo = "A";
         }
       }
       else
       {
       $txtModo = "I";
	   $txtCodigoArticulo = trim($_POST['txtCodigoArticulo']);
       echo "<script>alert('no se encontro el registro') </script>"; 
       }      
    }  
?>

<P>- Para buscar un registro ingrese el C&oacute;digo y luego haga click en el bot&oacute;n buscar</P>
<P>- Para eliminar un registro primero buscar el registro y luego haga click en el bot&oacute;n eliminar</P>
<P>- Para actualizar los datos primero debe buscar el registro y luego haga click en el bot&oacute;n guardar</P>
<P>&nbsp;</P>

<table  width="600" border="1">

 <tr>
  <td width="100" height="40"><label> C&oacute;digo </label></td>
  <td width="220">
    <input id="txtCodigoArticulo" name="txtCodigoArticulo" type="text" maxlength="255 " value="<?php echo $txtCodigoArticulo;?>" lang="El Codigo" onblur="buscar()"/>
    <input id="cmdbuscar" name="cmdbuscar" type="button" value="Buscar" onclick="abrirBusqueda('frmDatos','txtCodigoArticulo','busqueda.php', sqlCodigo, sqlDescripcion, 1)" >
   </td>
 </tr>
 
 <tr>
   <td width="100" height="40"> <label>Descripci&oacute;n</label> </td>
   <td> <input id="txtDescripcion" name="txtDescripcion" type="text" maxlength="255" value="<?php echo $txtDescripcion;?>" lang="La Descripcion"> </td>
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
  var sqlDescripcion = 'select codigo_articulo, descripcion from tbl_articulo where descripcion ilike \'%@parametro_descripcion%\' order by 1';

<!--
function validarpagina()
{
   
   if (validarCampo('txtCodigoArticulo') == false)
      return 0;
   
   if (validarCampo('txtDescripcion') == false)
      return 0;
    
  document.frmDatos.submit();    
}

function buscar()
{
 
   if (document.forms[0].txtCodigoArticulo.value.length==0)
       return false;   
   
   if (validarCampo('txtCodigoArticulo') == false)
      return 0;
     
   document.frmDatos.action = 'articulos.php';
   document.frmDatos.submit();
}

function eliminar()
{
   if (validarCampo('txtCodigoArticulo') == false)
      return 0;
      
   document.frmDatos.action = 'registrar_articulos.php';
   document.frmDatos.txtModo.value = 'E';
   document.frmDatos.submit();
}
function change()
{
   frmDatos.txtModo.value = 'I';
}

function limpiar()
{
   document.frmDatos.txtCodigoArticulo.value = '';
   document.frmDatos.txtDescripcion.value = '';
   document.frmDatos.txtModo.value = 'I';
}

</SCRIPT>
  
</HTML>  
  
  
            
 
