<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Empresa de Transporte</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="CSS/estilo.css" MEDIA="all" />
<!-- <SCRIPT TYPE="text/javascript" SRC="CSS/view.js"></SCRIPT>-->
<script type="text/javascript" src="funciones.js"></script>
<SCRIPT TYPE="text/javascript" SRC="js/validar.js"></SCRIPT>
<head >

</head> 
<body>
<H1>Empresa de Transporte</H1>


<FORM METHOD="post" ACTION="registrar_empresa_transporte.php" NAME = "frmDatos" id = "frmDatos" >
<?php 
  include("includes/funciones.php");
  
  $txtCodigoEmpresaTransporte = "";
  $txtNombre = "";
  $txtCodigoTipo = "";
  $txtEliminar  = "true";
  $txtModo  = "I";       
  if (isset($_POST['txtCodigoEmpresaTransporte']) && trim($_POST['txtCodigoEmpresaTransporte']) <> ""  )  
    { 
       $sql = "select * from tbl_empresa_transporte where codigo_transporte = '".$_POST['txtCodigoEmpresaTransporte']."'";     
       
       $consulta = ejecutarConsulta($sql); 
       if ($consulta)
       {
         while ($campo = pg_fetch_array($consulta) )
         { 
           
               $txtCodigoEmpresaTransporte = $campo['codigo_transporte'];  
               $txtNombre = $campo['nombre'];
               $txtCodigoTipo = $campo['codigo_tipo'];
               $txtModo = "A";
         }
       }
       else
       {
       $txtModo = "I";
	   $txtCodigoEmpresaTransporte = trim($_POST['txtCodigoEmpresaTransporte']);
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
    <input id="txtCodigoEmpresaTransporte" name="txtCodigoEmpresaTransporte" type="text" maxlength="255 " value="<?php echo $txtCodigoEmpresaTransporte;?>" lang="El ID" onBlur="buscar()" />
    <input id="cmdbuscar" name="cmdbuscar" type="button" value="Buscar" onclick="abrirBusqueda('frmDatos','txtCodigoEmpresaTransporte','busqueda.php', sqlCodigo, sqlDescripcion, 1)" >
   </td>
 </tr>
 
 <tr>
   <td width="100" height="40"> <label>Tipo de Transporte</label> </td>
   <td> <select id="txtCodigoTipo" name="txtCodigoTipo" value="<?php echo $txtCodigoTipo?>">
           <?php
              $sql = "select * from tbl_tipo_de_transporte";     
              $consulta = ejecutarConsulta($sql); 
         
              while ($fila = pg_fetch_assoc($consulta))
              {
                  if ($fila["codigo_tipo"] == $txtCodigoTipo)
                     echo '<option  selected="selected" value='.$fila["codigo_tipo"].'>'.$fila["descripcion"].'</option>';
                  else
                     echo '<option value='.$fila["codigo_tipo"].'>'.$fila["descripcion"].'</option>';
                 
              }    
          ?> 
        </select>
   </td>
 </tr>
 
 <tr>
   <td width="100" height="40"> <label>Nombre</label> </td>
   <td> <input id="txtNombre" name="txtNombre" type="text" maxlength="255" value="<?php echo $txtNombre;?>" lang="El Nombre"> </td>
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
 var sqlCodigo = 'select codigo_transporte, nombre from tbl_empresa_transporte where cast(codigo_transporte as varchar(15)) ilike \'%@parametro_codigo%\' order by 1';
  var sqlDescripcion = 'select codigo_transporte, nombre from tbl_empresa_transporte where nombre ilike \'%@parametro_descripcion%\' order by 1';
<!--
function validarpagina()
{
   
   if (validarCampo('txtCodigoEmpresaTransporte') == false)
      return 0;
      
   if (validarCampo('txtCodigoTipo') == false)
      return 0;
   
   if (validarCampo('txtNombre') == false)
      return 0;
    
  document.frmDatos.submit();    
}

function buscar()
{
 
  /* if (validarCampo('txtCodigoEmpresaTransporte') == false)
      return 0;
  */
   if (document.forms[0].txtCodigoEmpresaTransporte .value.length==0)
       return false;
	   
   document.frmDatos.action = 'Empresa_Transporte.php';
   document.frmDatos.submit();
}

function eliminar()
{
   if (validarCampo('txtCodigoEmpresaTransporte') == false)
      return 0;
      
   document.frmDatos.action = 'registrar_empresa_transporte.php';
   document.frmDatos.txtModo.value = 'E';
   document.frmDatos.submit();
}
function change()
{
   document.frmDatos.txtModo.value = 'I';
}

function limpiar()
{
   document.frmDatos.txtCodigoEmpresaTransporte.value = '';
   document.frmDatos.txtCodigoTipo.value = '';
   document.frmDatos.txtNombre.value = '';
   document.frmDatos.txtModo.value = 'I';
}

</SCRIPT>
  
</HTML>  
  
  
            
 