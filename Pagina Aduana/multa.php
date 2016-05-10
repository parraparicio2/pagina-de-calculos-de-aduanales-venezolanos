<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Multa</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="CSS/estilo.css" MEDIA="all" />
<!-- <SCRIPT TYPE="text/javascript" SRC="CSS/view.js"></SCRIPT>-->
<script type="text/javascript" src="funciones.js"></script>
<SCRIPT TYPE="text/javascript" SRC="js/calendar/calendar.js"></SCRIPT>
<SCRIPT TYPE="text/javascript" SRC="js/calendar/calendar-en.js"></SCRIPT>
<SCRIPT TYPE="text/javascript" SRC="js/calendar/calendar-setup.js"></SCRIPT>
<SCRIPT TYPE="text/javascript" SRC="js/validar.js"></SCRIPT>

<head >

</head> 
<body>
<H1>Multa</H1>


<FORM METHOD="post" ACTION="registrar_multa.php" NAME = "frmDatos" id = "frmDatos" >
<?php 
  include("includes/funciones.php");
  
  $txtCodigoMulta = "";
  $txtExpediente = "";
  $txtFecha = "";
  $txtMonto = "";
  $txtEliminar  = "true";
  $txtModo  = "I";       
  if (isset($_POST['txtCodigoMulta']) && trim($_POST['txtCodigoMulta']) <> ""  )  
    { 
       $sql = "select * from tbl_multa where codigo_multa = '".$_POST['txtCodigoMulta']."'";     
                                  
       $consulta = ejecutarConsulta($sql); 
       if ($consulta)
       {
         while ($campo = pg_fetch_array($consulta) )
         { 
           
               $txtCodigoMulta = $campo['codigo_multa'];  
               $txtExpediente = $campo['expediente'];
               $txtFecha = transformarFecha($campo['fecha']);
               $txtMonto= $campo['monto'];
               $txtModo = "A";
         }
       }
       else
       {
       $txtModo = "I";
	   $txtCodigoMulta = trim($_POST['txtCodigoMulta']);
       //echo "<script>alert('no se encontro el registro') </script>"; 
       }      
    }  
	
 if (isset($_POST['txtExpediente']) && trim($_POST['txtExpediente']) <> ""  )  
    { 
       $sql = "select * from tbl_carga where codigo_carga = '".$_POST['txtExpediente']."'";     
                                  
       $consulta = ejecutarConsulta($sql); 
       if ($consulta)
       {
         while ($campo = pg_fetch_array($consulta) )
         { 
               $txtExpediente = $campo['codigo_carga'];
         }
       }
       else
       {
	   $txtExpediente = "";
       echo "<script>alert('no se encontro la carga') </script>"; 
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
    <input id="txtCodigoMulta" name="txtCodigoMulta" type="text" maxlength="255 " value="<?php echo $txtCodigoMulta;?>" lang="El Codigo" onblur="buscar()" />
    <input id="cmdbuscar" name="cmdbuscar" type="button" value="Buscar" onclick="abrirBusqueda('frmDatos','txtCodigoMulta','busqueda.php', sqlCodigo, sqlDescripcion, 1)" >
   </td>
 </tr>
 
 <tr>
   <td width="100" height="40"> <label>C&oacutedigo de Carga</label> </td>
   <td> <input id="txtExpediente" name="txtExpediente" type="text" maxlength="255" value="<?php echo $txtExpediente;?>" lang="El codigo de la carga" onBlur="buscar()"> 
   <input id="cmdbuscar" name="cmdbuscar" type="button" value="Buscar" onclick="abrirBusqueda('frmDatos','txtExpediente','busqueda.php', sqlCodigoCarga, sqlDescripcionCarga, 1)" >
   </td>
   
 </tr>
 
 <tr>
   <TD HEIGHT = "40"><LABEL>Fecha</LABEL></TD>
   <TD><INPUT ID="txtFecha" NAME="txtFecha" SIZE="10" MAXLENGTH="10" VALUE="<?php echo $txtFecha;?>" TYPE="text" LANG="La Fecha." />
       <LABEL><IMG SRC="Imagenes/calendar.gif" LANG="Seleccione una fecha."  width="22" HEIGHT="20" CLASS="datepicker" ID="cal_img_11" /> DD/MM/AAAA</LABEL>
   </TD>
 </tr>
 
 <tr>
   <td width="100" height="40"> <label>Monto</label> </td>
   <td> <input id="txtMonto" name="txtMonto" type="text" maxlength="255" value="<?php echo $txtMonto;?>" lang="El Monto"> </td>
 </tr>
 
 
 </table>
 <SCRIPT type='text/javascript'>   
          Calendar.setup
          (
            {
              inputField     :    "txtFecha",   
              ifFormat       :    "%d/%m/%Y",   
              showsTime      :    false,          
              button         :    "cal_img_11",
              singleClick    :    true,           
              step           :    1                
            }
          );
            </SCRIPT> 
 
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
var sqlCodigo = 'select codigo_multa, expediente from tbl_multa where cast(codigo_multa as varchar(15)) ilike \'%@parametro_codigo%\' order by 1';
var sqlDescripcion = 'select codigo_multa, expediente from tbl_multa where expediente ilike \'%@parametro_descripcion%\' order by 1';

var sqlCodigoCarga = 'select a.codigo_carga, a.rif ||\'  \'||b.nombre_del_cliente from tbl_carga a join tbl_clientes b on a.rif = b.rif where cast(codigo_carga as varchar(15)) ilike \'%@parametro_codigo%\' order by 1';
var sqlDescripcionCarga = 'elect a.codigo_carga, a.rif ||\'  \'||b.nombre_del_cliente from tbl_carga a join tbl_clientes b on a.rif = b.rif  where a.rif ilike \'%@parametro_descripcion%\' order by 1';

<!--
function validarpagina()
{
   
   if (validarCampo('txtCodigoMulta') == false)
      return 0;
   
   if (validarCampo('txtExpediente') == false)
      return 0;
   
   if (validarCampo('txtFecha') == false)
      return 0;  
      
   if (validarFecha('txtFecha') == false)
      return 0;  
      
   if (validarCampo('txtMonto') == false)
      return 0;
      
    
  document.frmDatos.submit();    
}

function buscar()
{
   if (document.forms[0].txtCodigoMulta .value.length==0)
       return false;   
	   
	   
   /*if (validarCampo('txtCodigoMulta') == false)
      return 0;
     */
   document.frmDatos.action = 'Multa.php';
   document.frmDatos.submit();
}

function eliminar()
{
   if (validarCampo('txtCodigoMulta') == false)
      return 0;
      
   document.frmDatos.action = 'registrar_multa.php';
   document.frmDatos.txtModo.value = 'E';
   document.frmDatos.submit();
}
function change()
{
   document.frmDatos.txtModo.value = 'I';
}

function limpiar()
{
   document.frmDatos.txtCodigoMulta.value = '';
   document.frmDatos.txtExpediente.value = '';
   document.frmDatos.txtFecha.value = '';
   document.frmDatos.txtMonto.value = '';
   document.frmDatos.txtModo.value = 'I';
}

</SCRIPT>
  
</HTML>  
  
  
            
 