<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Carga</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="CSS/estilo.css" MEDIA="all" />
<!-- <SCRIPT TYPE="text/javascript" SRC="CSS/view.js"></SCRIPT>  -->

<SCRIPT TYPE="text/javascript" SRC="js/calendar/calendar.js"></SCRIPT>
<SCRIPT TYPE="text/javascript" SRC="js/calendar/calendar-en.js"></SCRIPT>
<SCRIPT TYPE="text/javascript" SRC="js/calendar/calendar-setup.js"></SCRIPT>
<script type="text/javascript" src="funciones.js"></script>
<SCRIPT TYPE="text/javascript" SRC="js/validar.js"></SCRIPT>

<SCRIPT>
 Arancel = new Array();
 ArticuloArancel = new Array();
 Servicios = new Array();
 
 PorcIva = 12/100;
 PorcTasa = 0.5/100;
 
 
</SCRIPT>      

<head >

</head> 

<body>
<H1>Carga</H1>


<FORM METHOD="post" ACTION="registrar_carga.php" NAME = "frmDatos" id = "frmDatos">
<?php 
  include("includes/funciones.php");
  
  $txtCodigoCarga = '';
  $txtCodigoCarga = '';  
  $txtRif = '';
  $txtNombreCliente = '';
  $txtCodigoMulta = '';
  $txtCodigoServicios = '';
  $txtNombreServicio = '';
  $txtCodigoArticulo = '';
  $txtNombreArticulo = '';
  $txtCodigoTransporte = '';
  $txtNombreTransporte = '';
  $txtFecha = '';
  $txtIVA = 0;
  $txtTasa = 0;
  $txtTotalValorArancel = 0;
  $txtPesoTotal = 0;
  $txtTipoDeOperacion = '';
  $txtFechaPagoImpuesto = '';
  $txtEliminar  = "true";
  $txtModo  = "I";       
  
  if (isset($_POST['txtRif']) && trim($_POST['txtRif']) <> ""  )  
     {
	   $sql = "select rif, nombre_del_cliente from tbl_clientes where rif = '".$_POST['txtRif']."'";     
	   $consulta = ejecutarConsulta($sql); 
       if ($consulta)
          {
		  while ($campo = pg_fetch_array($consulta) )
			  {
			  $txtRif = $campo['rif'];
              $txtNombreCliente = $campo['nombre_del_cliente'];
			  }
		  }
		else
		   {
		      $txtRif = "";
              $txtNombreCliente = "";
			  echo "<script>alert('No se Encuentra el cliente')</script>";
		   }	  
	 }
     
      if (isset($_POST['txtCodigoTransporte']) && trim($_POST['txtCodigoTransporte']) <> ""  )  
     {
       $sql = "select codigo_transporte,nombre from tbl_empresa_transporte where codigo_transporte = '".$_POST['txtCodigoTransporte']."'"; 
       echo $sql;    
       $consulta = ejecutarConsulta($sql); 
       if ($consulta)
          {
          while ($campo = pg_fetch_array($consulta) )
              {
              $txtCodigoTransporte = $campo['codigo_transporte'];
              $txtNombreTransporte = $campo['nombre'];
              }
          }
        else
           {
              $txtCodigoTransporte = "";
              $txtNombreTransporte = "";
              echo "<script>alert('No se Encuentra la Empresa de Transporte')</script>";
           }      
     }
     
     if (isset($_POST['txtCodigoArticulo']) && trim($_POST['txtCodigoArticulo']) <> ""  )  
     {
       $sql = "select codigo_articulo, descripcion from tbl_articulo where codigo_articulo = '".$_POST['txtCodigoArticulo']."'";     
       $consulta = ejecutarConsulta($sql); 
       if ($consulta)
          {
          while ($campo = pg_fetch_array($consulta) )
              {
              $txtCodigoArticulo = $campo['codigo_articulo'];
              $txtNombreArticulo = $campo['descripcion'];
              
              }
          }
        else
           {
              $txtCodigoArticulo = "";
              $txtNombreArticulo = "";
              echo "<script>alert('No se Encuentra el Articulo')</script>";
           }      
     }
     
     if (isset($_POST['txtCodigoServicio']) && trim($_POST['txtCodigoServicio']) <> ""  )  
     {
       $sql = "select codigo_servicios, descripcion from tbl_tabulador where codigo_servicios = '".$_POST['txtCodigoServicio']."'";     
       $consulta = ejecutarConsulta($sql); 
       if ($consulta)
          {
          while ($campo = pg_fetch_array($consulta) )
              {
              $txtCodigoServicios = $campo['codigo_servicios'];
              $txtNombreServicio = $campo['descripcion'];
              }
          }
        else
           {
              $txtCodigoServicios = "";
              $txtNombreServicio = '';
              echo "<script>alert('No se Encuentra el Servicio')</script>";
           }      
     }
     
      
    
    // Se llena la arreglo con los valores de la tabla tbl_articulo_arancel
       $sql = "select * from tbl_articulo_arancel";     
       
       $consulta = ejecutarConsulta($sql); 
       if ($consulta)
       { $i=0; 
        
         while ($campo = pg_fetch_array($consulta) )
         {  
             echo "<script>
                       ArticuloArancelColumna = new Array(2);
                       ArticuloArancelColumna[0] ='". $campo['codigo_articulo']."';  
                       ArticuloArancelColumna[1] ='". $campo['codigo_arancel']."';  
                       ArticuloArancel[".$i."] =  ArticuloArancelColumna;
                    </script> ";
               $i++;
               
         }
       }
       
       // Se llena la arreglo con los valores de la tabla tbl_arancel
      $sql = "select * from tbl_arancel";     
       
       $consulta = ejecutarConsulta($sql); 
       if ($consulta)
       { $i=0; 
        
         while ($campo = pg_fetch_array($consulta) )
         {  
              echo "<script>
                       ArancelColumna = new Array(2);
                       ArancelColumna[0] ='". $campo['codigo_arancel']."';  
                       ArancelColumna[1] ='". $campo['valor']."';  
                       Arancel[".$i."] =  ArancelColumna;
                    </script> ";
               $i++;
               
         }
       }
       
       // Se llena la arreglo con los valores de la tabla tbl_arancel
      $sql = "select * from tbl_tabulador";     
       
       $consulta = ejecutarConsulta($sql); 
       if ($consulta)
       { $i=0; 
        
         while ($campo = pg_fetch_array($consulta) )
         {  
              echo "<script>
                       ServiciosColumna = new Array(5);
                       ServiciosColumna[0] ='". $campo['codigo_servicios']."';  
                       ServiciosColumna[1] ='". $campo['descripcion']."'; 
                       ServiciosColumna[2] ='". $campo['desde']."';  
                       ServiciosColumna[3] ='". $campo['hasta']."';   
                       ServiciosColumna[4] ='". $campo['valor']."';  
                       Servicios[".$i."] =  ServiciosColumna;
                    </script> ";
               $i++;
               
         }
       }
    
?>

<P>- Para buscar un registro ingrese el ID y luego haga click en el bot&oacute;n buscar</P>
<P>- Para eliminar un registro primero buscar el registro y luego haga click en el bot&oacute;n eliminar</P>
<P>- Para actualizar los datos primero debe buscar el registro y luego haga click en el bot&oacute;n guardar</P>
<P>&nbsp;</P>

<table  width="600" >

 <tr>
   <td width="100" height="30"> <label>Rif</label> </td>
   <td> <input id = "txtRif" name = "txtRif" type = "text" lang = "el RIF"  onBlur="buscar()"  value = "<?php echo $txtRif?>">
   <input id="cmdbuscar" name="cmdbuscar" type="button" value="Buscar" onclick="abrirBusqueda('frmDatos','txtRif','busqueda.php', sqlCodigoCliente, sqlDescripcionCliente, 1)" >
   <span id="spanRif"><?php echo $txtNombreCliente?> </span>
   </td>
 </tr>
 
 
 
 <tr>
   <td width="100" height="30"> <label>Transporte</label> </td>
   <td> <input id = "txtCodigoTransporte" name = "txtCodigoTransporte" value= "<?php echo $txtCodigoTransporte?>" type = "text" lang = "el Transporte" onBlur="buscar()" >
   <input id="cmdbuscar" name="cmdbuscar" type="button" value="Buscar" onclick="abrirBusqueda('frmDatos','txtCodigoTransporte','busqueda.php', sqlCodigoTransporte, sqlDescripcionTransporte, 1)" >
   <span id="spanNombreTranspore"><?php echo $txtNombreTransporte?> </span>
   </td>
 </tr>
 
 <tr>
   <td height = "30"><label>Fecha</label></td>
   <td><input id="txtFecha" name="txtFecha" size="10" maxlength="10" value="<?php echo $txtFecha;?>" type="text" lang="La Fecha." />
        <label><img src="Imagenes/calendar.gif" lang="Seleccione una fecha."  width="22" height="20" class="datepicker" id="cal_img_11" /> DD/MM/AAAA</label>
   </td>
 </tr>
 
 <tr>
   <td width="100" height="30"> <label>Tipo de Operaci&oacute;n</label> </td>
   <td> <select id="txtTipoDeOperacion" name="txtTipoDeOperacion" >
           <option selected= "selected" value="I"> Importaci&oacute;n</option>
           <option value="E"> Exportaci&oacute;n</option> 
        </select>
   </td>
 </tr>
 
 <tr>
   <td height = "30"><label>Fecha de Pago</label></td>
   <td><input id="txtFechaPagoImpuesto" name="txtFechaPagoImpuesto" size="10" maxlength="10" value="<?php echo $txtFechaPagoImpuesto;?>" type="text" lang="La Fecha de Pago." />
        <label><img src="Imagenes/calendar.gif" lang="Seleccione una fecha."  width="22" height="20" class="datepicker" id="cal_img_12" /> DD/MM/AAAA</label>
   </td>
 </tr>
 </table>
 
<h4>Ingrese el c&oacute;digo de Articulo, c&oacute;digo del Arancel, el valor y el peso y haga click en el bot&oacute; con el '+' para ingresar el detalle de la carga. </h4>
 <label>C&oacute;d. Art&iacute;culo</label> <input type="text" id="txtCodigoArticulo" name="txtCodigoArticulo" value= "<?php echo $txtCodigoArticulo?>" size="10" onBlur=""> 
 <span id="spanNombreArticulo"><?php echo $txtNombreArticulo?> </span>
 
 <input id="cmdbuscar" name="cmdbuscar" type="button" value="Buscar" onclick="abrirBusqueda('frmDatos','txtCodigoArticulo','busqueda.php', sqlCodigoArticulo, sqlDescripcionArticulo, 1)" > 
 <!--
 <input type="hidden" id="txtCodigoArancel" name="txtCodigoArancel" size="10">  
 <input type="hidden" id="txtValor" name="txtValor" size="6">  -->
 <label>Peso</label> <input type="text" id="txtPeso" name="txtPeso" size="6">  
 <input type="button" onclick="agregarFila()" value = "+">

 <table id="tb01"  name = "tb01" width ="600"  border="1">
   <tbody>
     <tr>
		 <td width="160">C&oacute;d. Art&iacute;culo</td>
		 <td width="160">C&oacute;d. Arancel</td>
		 <td width="160">Valor</td>
		 <td  width="160" >Peso</td>
		 <td width="120"></td>
	 </tr>
   <tbody>	 
 </table>

  
  <table id="tb03" width ="600" height = 20 border="1">
     <tr>
        <td width="160"></td><td width="160"></td>
        <td width="160"> <input type="text" id="txtTotalValorArancel" name="txtTotalValorArancel" value="0" > </td>
        <td width="160" ><input type="text" id="txtPesoTotal" name="txtPesoTotal" value="0">
        </td><td width="120"></td></tr>
 </table>


 <h4>Ingrese el c&oacute;digo de Servicio y haga click en el bot&oacute;n con el '+' para ingresar el servicio a la carga. </h4>
 <label>C&oacute;d. Servicio</label> <input type="text" id="txtCodigoServicio" name="txtCodigoServicio" value= "<?php echo $txtCodigoServicios?>" size="10" onBlur="">  
 <input id="cmdbuscar" name="cmdbuscar" type="button" value="Buscar" onclick="abrirBusqueda('frmDatos','txtCodigoServicio','busqueda.php', sqlCodigoServicio, sqlDescripcionServicio, 1)" >
 <input type="button" onclick="agregarFilaServicios()" value = "+">
 <span id="spanNombreServicio"><?php echo $txtNombreServicio?> </span>
 
 <table id="tb02" width ="600"  border="1">
     <tr>
         <td width="100"><strong>C&oacute;d. Servicio</strong></td>
         <td width="120"><strong>Descripci&oacute;n</strong></td>
         <td width="100"><strong>Desde</strong></td>
         <td width="100"><strong>Hasta</strong></td>
         <td width="100"><strong>Valor</strong></td>
         <td width="80"></td>
     </tr>
 </table>
 
 <table>
 <tr>
  <td>
      <input id="txtPesoTotal" name="txtPesoTotal" type="hidden" maxlength="255 " value="<?php echo $txtPesoTotal;?>" lang="Tasa" onchange="change()" />
   </td>
 </tr>
 
  <tr>
  <td width="100" height="40"><label> Total General </label></td>
  <td width="220">
      <input id="txtSubTotal" name="txtSubTotal" type="text" maxlength="255 " value="0.00" lang="IVA" onchange="change()" />
   </td>
 </tr>
 
 <tr>
  <td width="100" height="40"><label> IVA </label></td>
  <td width="220">
      <input id="txtTotalIva" name="txtTotalIva" type="text" maxlength="255 " value="0.00" lang="IVA" onchange="change()" />
   </td>
 </tr>
  
 <tr>
  <td width="100" height="40"><label> Tasa </label></td>
  <td width="220">
      <input id="txtTotalTasa" name="txtTotalTasa" type="text" maxlength="255 " value="0.00" lang="Tasa" onchange="change()" />
   </td>
 </tr>
 
 <tr>
  <td width="100" height="40"><label> Total </label></td>
  <td width="220">
      <input id="txtTotal" name="txtTotal" type="text" maxlength="255 " value="0.00" lang="Total" onchange="change()" />
   </td>
 </tr>
 
 </table>

 
 
 <P>
 <SCRIPT type='text/javascript'>   
    Calendar.setup
     (  { inputField     :    "txtFecha",   
          ifFormat       :    "%d/%m/%Y",   
          showsTime      :    false,          
          button         :    "cal_img_11",
          singleClick    :    true,           
          step           :    1                
         }
     );
     
     Calendar.setup
     (  { inputField     :    "txtFechaPagoImpuesto",   
          ifFormat       :    "%d/%m/%Y",   
          showsTime      :    false,          
          button         :    "cal_img_12",
          singleClick    :    true,           
          step           :    1                
         }
     );
 </SCRIPT>
 </P>
 
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
  var sqlCodigoTransporte = 'select codigo_transporte, nombre from tbl_empresa_transporte where codigo_transporte ilike \'%@parametro_codigo%\'';
  var sqlDescripcionTransporte = 'select codigo_transporte, nombre from tbl_empresa_transporte where nombre ilike \'%@parametro_descripcion%\'';
  var sqlCodigoCliente = 'select rif, nombre_del_cliente from tbl_clientes where rif ilike \'%@parametro_codigo%\'';
  var sqlDescripcionCliente = 'select rif, nombre_del_cliente from tbl_clientes where descripcion ilike \'%@parametro_descripcion%\'';
  var sqlCodigoArticulo = 'select codigo_articulo, descripcion from tbl_articulo where codigo_articulo ilike \'%@parametro_codigo%\' order by 1';
  var sqlDescripcionArticulo = 'select codigo_articulo, descripcion from tbl_articulo where descripcion ilike \'%@parametro_descripcion%\' order by 1';
  var sqlCodigoServicio = 'select codigo_servicios, descripcion from tbl_tabulador where codigo_servicios ilike \'%@parametro_codigo%\' order by 1';
  var sqlDescripcionServicio = 'select codigo_servicios, descripcion from tbl_tabulador where descripcion ilike \'%@parametro_descripcion%\' order by 1';
  


<!--
function validarpagina()
{
   
/*   if (validarCampo('txtCodigoCarga') == false)
      return 0;
      
   if (validarCampo('txtCodigoArticulo') == false)
      return 0;
   
   if (validarCampo('txtCodigoArancel') == false)
      return 0;
  */  
  recorrerArticulos();
  recorrerServicios();
  document.frmDatos.submit();    
}

function buscar()
{
 
  /* if (validarCampo('txtCodigoCarga') == false)
      return 0;
     */
   document.frmDatos.action = 'carga.php';
   document.frmDatos.submit();
}



function eliminar()
{
   if (validarCampo('txtCodigoCarga') == false)
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
   document.frmDatos.txtCodigoCarga.value = '';
   document.frmDatos.txtCodigoArticulo.value = '';
   document.frmDatos.txtCodigoArancel.value = '';
   document.frmDatos.txtModo.value = 'I';
}

// Tabla Dinamica  -->

      var num = 0;
      function eliminarFila(Fila)
      {
        //alert(Fila.id);
        var objTbody = document.getElementById("tb01");
        TotalValorArancel =  parseFloat (document.getElementById("txtTotalValorArancel").value);
        PesoTotal = document.getElementById("txtPesoTotal").value;
        SubTotal = 0;
        
        TotalValorArancel = TotalValorArancel - parseFloat(objTbody.rows[Fila.rowIndex].cells[2].firstChild.innerHTML);
        PesoTotal = PesoTotal - parseFloat(objTbody.rows[Fila.rowIndex].cells[3].firstChild.innerHTML);
        
        tabla = 'tb02';
        for (var i=1;i<document.getElementById(tabla).rows.length;i++)
        {
            if (( TotalValorArancel >=  parseFloat(document.getElementById(tabla).rows[i].cells[2].firstChild.innerHTML) ) &&
               ( TotalValorArancel <=  parseFloat(document.getElementById(tabla).rows[i].cells[3].firstChild.innerHTML) ))
            {
               SubTotal = SubTotal + parseFloat(document.getElementById(tabla).rows[i].cells[4].firstChild.innerHTML);
            }  
        }
        
        SubTotal = SubTotal + TotalValorArancel; 
        TotalIva = SubTotal * PorcIva;
        TotalTasa = SubTotal * PorcTasa;
        document.getElementById("txtTotalValorArancel").value = TotalValorArancel;
        document.getElementById("txtPesoTotal").value = PesoTotal;
        document.getElementById("txtSubTotal").value  = SubTotal;
        document.getElementById("txtTotalIva").value  = TotalIva;
        document.getElementById("txtTotalTasa").value  = TotalTasa;
        document.getElementById("txtTotal").value  = SubTotal + TotalIva + TotalTasa;
        
        
        objTbody.removeChild(Fila);
        
      }
      
      function agregarFila(){
        
        if ((document.getElementById("txtCodigoArticulo").value != '') && (document.getElementById("txtPeso").value != ''))
        {
            CodigoArancel = '';
            ValorArancel = '';
              
              for (i=0;i<ArticuloArancel.length;i++)
             { 
              if (ArticuloArancel[i][0]== document.getElementById("txtCodigoArticulo").value)  
                   CodigoArancel = ArticuloArancel[i][1];
             }
             
             if (CodigoArancel != '')
             {
            
                 for (i=0;i<Arancel.length;i++)
                 {  
                    if (Arancel[i][0]== CodigoArancel )
                       ValorArancel = Arancel[i][1];
                 }
                
                //Objeto TR (FILA)
                var objTr = document.createElement("tr");
                objTr.id = "fila_" + num;
                
                //Objeto TD Primera Columna 
                var objTd1 = document.createElement("td"); 
                objTd1.id = "col_1_" + num;  
                //objTd1.width = 10;
                
                var label1 = document.createElement("label");
                label1.innerHTML= document.getElementById("txtCodigoArticulo").value;
                objTd1.appendChild(label1);
                
                //Objeto TD Segunda Columna
                var objTd2 = document.createElement("td");
                objTd2.id = "col_2_" + num; 
                
                
                var label2 = document.createElement("label");
                label2.innerHTML= CodigoArancel;
                objTd2.appendChild(label2);
                
                //Objeto TD Tercera Columna
                var objTd3 = document.createElement("td");
                objTd3.id = "col_3_" + num; 
                //objTd3.innerHTML = "CELDA ("+num+",3)"; ;
                //objTd3.width = 10;
                
                var label3 = document.createElement("label");
                label3.innerHTML= ValorArancel;
                objTd3.appendChild(label3);
                
                var objTd4 = document.createElement("td");
                objTd4.id = "col_4_" + num; 
                //objTd4.innerHTML = "CELDA ("+num+",4)"; ;
                //objTd4.width = 10;
                
                var label4 = document.createElement("label");
                label4.innerHTML= document.getElementById("txtPeso").value;
                objTd4.appendChild(label4);
                
                
                //Objeto TD Tercera Columna
                var objTd5 = document.createElement("td");
                objTd5.id = "col_5_" + num;
                //objTd5.width = 10;
                
                btCerrar = document.createElement('input'); 
                btCerrar.type = 'button';
                btCerrar.name = 'btnF'+num;
                btCerrar.value = 'Eliminar';
                btCerrar.onclick= function () {eliminarFila(objTr)};
                
                objTd5.appendChild(btCerrar);
                
                //Agregamos las columnas en la fila
                objTr.appendChild(objTd1);
                objTr.appendChild(objTd2);
                objTr.appendChild(objTd3);
                objTr.appendChild(objTd4);
                objTr.appendChild(objTd5);
                
                
                //Buscamos el objeto tabla
                var objTbody = document.getElementById("tb01"); 
                objTbody.appendChild(objTr);
                
                num++;
                
                SubTotal = 0;
                
                TotalValorArancel =  parseFloat (document.getElementById("txtTotalValorArancel").value);
                PesoTotal = parseFloat(document.getElementById("txtPesoTotal").value); 
                TotalValorArancel = TotalValorArancel + parseFloat(ValorArancel);
                PesoTotal = PesoTotal + parseFloat(document.getElementById("txtPeso").value);
                
                tabla = 'tb02';
                for (var i=1;i<document.getElementById(tabla).rows.length;i++)
                {
                    if (( TotalValorArancel >=  parseFloat(document.getElementById(tabla).rows[i].cells[2].firstChild.innerHTML) ) &&
                       ( TotalValorArancel <=  parseFloat(document.getElementById(tabla).rows[i].cells[3].firstChild.innerHTML) ))
                    {
                       SubTotal = SubTotal +  parseFloat(document.getElementById(tabla).rows[i].cells[4].firstChild.innerHTML);
                    }  
                }
                
                SubTotal = SubTotal + TotalValorArancel; 
                TotalIva = SubTotal * PorcIva;
                TotalTasa = SubTotal * PorcTasa;
                document.getElementById("txtTotalValorArancel").value = TotalValorArancel;
                document.getElementById("txtPesoTotal").value = PesoTotal;
                document.getElementById("txtSubTotal").value  = SubTotal;
                document.getElementById("txtTotalIva").value  = TotalIva;
                document.getElementById("txtTotalTasa").value  = TotalTasa;
                document.getElementById("txtTotal").value  = SubTotal + TotalIva + TotalTasa;
            
           }
           else
             alert("El articulo no tiene asignado el arancel");
        }
        
        else
           alert("Debe agregar un codigo de articulo y su peso correspondiente");
             
            
     }
      
      
      function eliminarFilaServicios(Fila)
      {
        //alert(Fila.id);
        var objTbody = document.getElementById("tb02");
        objTbody.removeChild(Fila);
        
        TotalValorArancel = parseFloat(document.getElementById("txtTotalValorArancel").value);
        SubTotal = 0;
        
        
        for (var i=1;i<objTbody.rows.length;i++)
        {
            if (( TotalValorArancel >=  parseFloat(objTbody.rows[i].cells[2].firstChild.innerHTML) ) &&
               ( TotalValorArancel <=  parseFloat(objTbody.rows[i].cells[3].firstChild.innerHTML) ))
            {
               SubTotal = SubTotal + parseFloat(objTbody.rows[i].cells[4].firstChild.innerHTML);
            }  
        }
        
        SubTotal = SubTotal + TotalValorArancel; 
        TotalIva = SubTotal * PorcIva;
        TotalTasa = SubTotal * PorcTasa;
        document.getElementById("txtSubTotal").value  = SubTotal;
        document.getElementById("txtTotalIva").value  = TotalIva;
        document.getElementById("txtTotalTasa").value  = TotalTasa;
        document.getElementById("txtTotal").value  = SubTotal + TotalIva + TotalTasa;
        
      }
      
      function agregarFilaServicios(){
        
        encontrado = 0;
        CodigoServicio = document.getElementById("txtCodigoServicio").value;
        
        for (i=0;i<Servicios.length;i++)
        {
           if (CodigoServicio == Servicios[i][0])
           {  encontrado = 1;
              //Objeto TR (FILA)
              var objTr = document.createElement("tr");
              objTr.id = "filaSer_" + num;
            
              //Objeto TD Primera Columna Cidogo del Servicio 
              var objTd1 = document.createElement("td"); 
              objTd1.id = "colSer_1_" + num;  
            
              var label1 = document.createElement("label");
              label1.innerHTML= CodigoServicio;
              objTd1.appendChild(label1);
            
              //Objeto TD Segunda Columna Descripcion del servicio
              var objTd2 = document.createElement("td"); 
              objTd1.id = "colSer_2_" + num;  
            
              var label2 = document.createElement("label");
              label2.innerHTML= Servicios[i][1];
              objTd2.appendChild(label2);
              
              //Objeto TD Tercera Columna Desde del servicio
              var objTd3 = document.createElement("td"); 
              objTd3.id = "colSer_3_" + num;  
            
              var label3 = document.createElement("label");
              label3.innerHTML= Servicios[i][2];
              objTd3.appendChild(label3);
              
              //Objeto TD Cuarta Columna Hasta del servicio
              var objTd4 = document.createElement("td"); 
              objTd4.id = "colSer_4_" + num;  
            
              var label4 = document.createElement("label");
              label4.innerHTML= Servicios[i][3];
              objTd4.appendChild(label4);
              
              //Objeto TD Quinta Columna Valor del servicio
              var objTd5 = document.createElement("td"); 
              objTd5.id = "colSer_5_" + num;  
            
              var label5 = document.createElement("label");
              label5.innerHTML= Servicios[i][4];
              objTd5.appendChild(label5);
              
              //Objeto TD Sexta Columna  Boton Eliminar
              var objTd6 = document.createElement("td");
              objTd6.id = "colSer_6_" + num;
            
              btCerrar = document.createElement('input'); 
              btCerrar.type = 'button';
              btCerrar.name = 'btnF'+num;
              btCerrar.value = 'Eliminar';
              btCerrar.onclick= function () {eliminarFilaServicios(objTr)};
            
              objTd6.appendChild(btCerrar);
            
              //Agregamos las columnas en la fila
              objTr.appendChild(objTd1);
              objTr.appendChild(objTd2);
              objTr.appendChild(objTd3);
              objTr.appendChild(objTd4);
              objTr.appendChild(objTd5);
              objTr.appendChild(objTd6);
            
              //Buscamos el objeto tabla
              var objTbody = document.getElementById("tb02"); 
              objTbody.appendChild(objTr);
            
              num++;
            
              TotalValorArancel = parseFloat(document.getElementById("txtTotalValorArancel").value);
              SubTotal = parseFloat(document.getElementById("txtSubTotal").value);
              
              if ((Servicios[i][2] <= TotalValorArancel ) && (Servicios[i][3]>= TotalValorArancel))
              {
                  SubTotal = SubTotal + parseFloat(Servicios[i][4]);
                  TotalIva = SubTotal * PorcIva;
                  TotalTasa = SubTotal * PorcTasa;
                  document.getElementById("txtSubTotal").value = SubTotal; 
                  document.getElementById("txtTotalIva").value  = TotalIva;
                  document.getElementById("txtTotalTasa").value  = TotalTasa;
                  document.getElementById("txtTotal").value  = SubTotal + TotalIva + TotalTasa;
              }
                  
           }
        }
        
        if (encontrado == 0)
           alert('Disculpe, Codigo de Servicio : '  + CodigoServicio + ' no se encuentra registrado, intente con otro codigo.');
        
 }
// Fin de funciones de tabla dinámica

function recorrerArticulos()//esta funcion recorre la tabla de los articulos y crea un arreglo de INPUTS para poder hacer post
{
  var tabla = 'tb01';
  for (var i=1;i<document.getElementById(tabla).rows.length;i++)
    {
		input_codigo_articulo = document.createElement('input');
		input_codigo_articulo.type = 'hidden';
		input_codigo_articulo.id = 'codigo_articulo';
		input_codigo_articulo.name = 'codigo_articulo['+i+']';
		input_codigo_articulo.value = document.getElementById(tabla).rows[i].cells[0].firstChild.innerHTML;
		document.forms[0].appendChild(input_codigo_articulo);

		input_codigo_arancel = document.createElement('input');
		input_codigo_articulo.type = 'hidden';
		input_codigo_arancel.id = 'codigo_arancel';
		input_codigo_arancel.name = 'codigo_arancel['+i+']';
		input_codigo_arancel.value = document.getElementById(tabla).rows[i].cells[1].firstChild.innerHTML;
		document.forms[0].appendChild(input_codigo_arancel);

		input_valor_arancel = document.createElement('input');
		input_valor_arancel.type = 'hidden';
		input_valor_arancel.id = 'valor_arancel';
		input_valor_arancel.name = 'valor_arancel['+i+']';
		input_valor_arancel.value = document.getElementById(tabla).rows[i].cells[2].firstChild.innerHTML;
		document.forms[0].appendChild(input_valor_arancel);
		
		input_peso_articulo = document.createElement('input');
		input_peso_articulo.type = 'hidden';
		input_peso_articulo.id = 'peso_articulo';
		input_peso_articulo.name = 'peso_articulo['+i+']';
		input_peso_articulo.value = document.getElementById(tabla).rows[i].cells[2].firstChild.innerHTML;
		document.forms[0].appendChild(input_peso_articulo);
		

	}
    
    
}

function recorrerServicios()//esta funcion recorre la tabla de los servicios y crea un arreglo de INPUTS para poder hacer post
{
  var tabla = 'tb02';
  for (var i=1;i<document.getElementById(tabla).rows.length;i++)
    {
        input_codigo_servicio = document.createElement('input');
        input_codigo_servicio.type = 'hidden';
        input_codigo_servicio.id = 'codigo_servicio';
        input_codigo_servicio.name = 'codigo_servicio['+i+']';
        input_codigo_servicio.value = document.getElementById(tabla).rows[i].cells[0].firstChild.innerHTML;
        document.forms[0].appendChild(input_codigo_servicio);

    }
    
}


</SCRIPT>
  
</HTML>  
  
  
            
 
