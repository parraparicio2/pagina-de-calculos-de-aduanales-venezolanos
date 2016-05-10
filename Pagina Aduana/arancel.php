<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Arancel</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="CSS/estilo.css" MEDIA="all" />
<script type="text/javascript" src="funciones.js"></script>
<!-- <SCRIPT TYPE="text/javascript" SRC="CSS/view.js"></SCRIPT>-->

<SCRIPT TYPE="text/javascript" SRC="js/validar.js"></SCRIPT>
<head >

</head> 
<body>
<H1>Arancel</H1>


<FORM METHOD="post" ACTION="registrar_arancel.php" NAME = "frmDatos" id = "frmDatos" >
<?php 
  include("includes/funciones.php");
  
  $txtCodigoArancel = "";
  $txtDescripcion = "";
  $txtValor = 0;
  $txtEliminar  = "true";
  $txtModo  = "I";       
  if (isset($_POST['txtCodigoArancel']) && trim($_POST['txtCodigoArancel']) <> ""  )  
    { 
       $sql = "select * from tbl_arancel where codigo_arancel = '".$_POST['txtCodigoArancel']."'";     
       
       $consulta = ejecutarConsulta($sql); 
       if ($consulta)
       {
         while ($campo = pg_fetch_array($consulta) )
         { 
           
               $txtCodigoArancel = $campo['codigo_arancel'];  
               $txtDescripcion = $campo['descripcion'];
               $txtValor = $campo['valor'];
               $txtModo = "A";
         }
       }
       else
       {
       $txtModo = "I";
	    $txtCodigoArancel = trim($_POST['txtCodigoArancel']);  
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
    <input id="txtCodigoArancel" name="txtCodigoArancel" type="text" maxlength="255 " value="<?php echo $txtCodigoArancel;?>" lang="El Codigo" onblur="buscar()" />
    <input id="cmdbuscar" name="cmdbuscar" type="button" value="Buscar" onclick="abrirBusqueda('frmDatos','txtCodigoArancel','busqueda.php', sqlCodigo, sqlDescripcion, 1)" >
   </td>
 </tr>
 
 <tr>
   <td width="100" height="40"> <label>Descripci&oacute;n</label> </td>
   <td> <input id="txtDescripcion" name="txtDescripcion" type="text" maxlength="255" value="<?php echo $txtDescripcion;?>" lang="La Descripcion"> </td>
 </tr>
 
  <tr>
   <td width="100" height="40"> <label>Valor</label> </td>
   <td> <input id="txtValor" name="txtValor" type="text" maxlength="255" value="<?php echo $txtValor;?>" lang="El Valor"> </td>
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

  var sqlCodigo = 'select codigo_arancel, descripcion from tbl_arancel where codigo_arancel ilike \'%@parametro_codigo%\' order by 1';
  var sqlDescripcion = 'select codigo_arancel, descripcion from tbl_arancel where descripcion ilike \'%@parametro_descripcion%\' order by 1';

<!--
function validarpagina()
{
   
   if (validarCampo('txtCodigoArancel') == false)
      return 0;
   
   if (validarCampo('txtDescripcion') == false)
      return 0;
   
   if (validarCampo('txtValor') == false)
      return 0;
    
  document.frmDatos.submit();    
}

function buscar()
{
 
  if (document.forms[0].txtCodigoArancel.value.length==0)
       return false;   
	   
   //if (validarCampo('txtCodigoArancel') == false)
   //   return 0;
     
   document.frmDatos.action = 'arancel.php';
   document.frmDatos.submit();
}

function eliminar()
{
   if (validarCampo('txtCodigoArancel') == false)
      return 0;
      
   document.frmDatos.action = 'registrar_arancel.php';
   document.frmDatos.txtModo.value = 'E';
   document.frmDatos.submit();
}
function change()
{
   document.frmDatos.txtModo.value = 'I';
}

function limpiar()
{
   document.frmDatos.txtCodigoArancel.value = '';
   document.frmDatos.txtDescripcion.value = '';
   document.frmDatos.txtValor.value = 0;
   
   document.frmDatos.txtModo.value = 'I';
}

</SCRIPT>
  
</HTML>  
  
  
            
 