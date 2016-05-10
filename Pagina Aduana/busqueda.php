<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK rel="stylesheet" href="tablas.css" type="text/css"/>
<title>Busqueda</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body style="font-family:Arial, Helvetica, sans-serif;">

<style type="text/css">
.tablaBusqueda{
/*border: 1px solid #00F; width: 98% !important;*/
   width: 98% !important;
}

.tablaBusqueda td{
	padding:10px;
  }

.tablacss{
   /*border: 1px solid #00F; width: 90%;*/
}

.columnacss{
   border: 1px solid #00F; 
}

.campo_busqueda{
	width:80%;
}

#contenedor_filtro{
	/*background:#C5E2E2;*/
	float:left;
	width:100%;
	height:auto;
}

#contenedor_consulta{
	float:left;
	width:100%;
	height:auto;
}

.hipervinculo{
   text-decoration:none;  
   color:#000; 	
}


</style>
<?php  

   $sqlCodigo = "";
   $sqlDescripcion = "";
   $txtInput ="";
   
   if (isset($_GET['buscarTodos']))
      $buscarTodos = $_GET['buscarTodos'];
   else
      $buscarTodos = true; 
	  
?>
<div id="contenedor" style = "width:100%; height: auto; margin: 0 auto ">
   <div id="main" style = "width:100%; heigth: auto">
    <form id="frmBusqueda" name = "frmBusqueda" method="post" action="busqueda.php">
			<?php 
				$txtCodigo = "";
				if (isset($_POST['txtCodigo']))
				   $txtCodigo = $_POST['txtCodigo'];
				else
				   $txtCodigo = "";
				   
                if (isset($_GET['sqlCodigo']))
					{
						$sqlCodigo = $_GET['sqlCodigo'];	
						$sqlDescripcion= $_GET['sqlDescripcion'];	
						$txtInput = $_GET['txtInput'];	
					}
				else
				   {
						$sqlCodigo = $_POST['sqlCodigo'];	
						$sqlDescripcion= $_POST['sqlDescripcion'];	
						$txtInput = $_POST['txtInput'];	
				   }
				
				
	            $optCodigo = "checked";   
				$optDescripcion = "";
				//se verifica que se haya echo post y determina cual es el opt que
				//que se encuentra activo.
				
			   if (isset($_POST['optCodigo']))
  			     {
					 
					  if ($_POST['optCodigo']=="C")
					    {
					       $optCodigo = "checked";
						   $optDescripcion = "";				  
						 }
					  else
					     {
						    $optDescripcion = "checked";				  
							$optCodigo = "";
						 } 
			     }
				
			   ?>

    <div id="contenedor_filtro"> 
            <table class = "tablaBusqueda" style="background:#EAEAFF">
                   <tr>
                       <td style="width:10%">Busqueda</td>
                       <td style="width:70%"><input type ="text"  id="txtCodigo" name = "txtCodigo" class="campo_busqueda"  value = "<?php echo $txtCodigo ?>" onKeyUp="buscar(event)">
                         <input type ="submit" value="Buscar" ></td>
                    
              </tr>
                   <tr>
                       <td>Filtrar por</td>
                       <td colspan="2"><input type="radio" id="optCodigo" name="optCodigo" <?php echo $optCodigo ?>  value = "C">
C&oacute;digo
<input type="radio" id="optCodigo" name="optCodigo" value = "D" <?php echo $optDescripcion ?> > 
Descripci&oacute;n
</td>
                   </tr>
                </table>
    </div><!--contenedor_filtro--> 		         

    <div id="contenedor_consulta">    
		<table class="tablaBusqueda" id ="box-table-a">
	     <tr>
			   <th style ="width:10%">Código</th>
			   <th style ="width:30%">Descripción</th>
		   </tr>
		   
			<?php 
                include("includes/funciones.php");
				//vertificamos cual opcion esta seleccionado para asignar la busqueda de sql por codigo o 
				//por descripcion
				
               if (trim($optCodigo) !="")
			      {
				  $sql = $sqlCodigo;
				  $sql = str_replace('@parametro_codigo',trim($txtCodigo),$sql);	
				  }
			   else
			     {
				  $sql = $sqlDescripcion;
				  $sql = str_replace('@parametro_descripcion',trim($txtCodigo),$sql);	
				  }
				 
			    if (isset($_POST['optCodigo']) || $buscarTodos == true)
				{
				   $consulta = ejecutarConsulta($sql);
				   if ($consulta)
				   {
					  while ($campo = pg_fetch_array($consulta))
					  { 
					  echo "<tr onClick ='seleccionar(\"$campo[0]\" )'>
							   <td><a class = 'hipervinculo' id = '".$campo[0]."' href='#' onClick ='seleccionar(\"$campo[0]\" )' >".$campo[0]."</a></td>
							   <td>".$campo[1]."</td>
							<tr>
						   ";	   
					  }
				   }
				}
               // echo $sql;
            ?>
               
  
		</table >
    </div><!--contenedor_consulta-->
		<input type = "hidden" id = "sqlCodigo" name = "sqlCodigo"  value ="<?php echo $sqlCodigo ?>">	
		<input type = "hidden" id = "sqlDescripcion" name = "sqlDescripcion"  value ="<?php echo $sqlDescripcion ?>">	
		<input type = "hidden" id = "txtInput" name = "txtInput"  value ="<?php echo $txtInput ?>">	
	</form>
   </div>
</div>   
<script>
var keyCode;
function seleccionar(id)
{
  /*esta es la linea que asigna el valor a la ventana padre en donde
  window.opener.document.forms[0].txtCodigo.value es el txt o input que recibe el valor*/ 	
  window.opener.document.getElementById('<?php echo $txtInput ?>').value = document.getElementById(id).innerHTML;
  window.opener.document.getElementById('<?php echo $txtInput ?>').onblur();
  window.close();
} 
//esta funcion detecta que se presione la tecla enter y realiza la busqueda
function buscar(e)
{
	if(window.event)
	   keyCode=window.event.keyCode;
	else if (e) 
	{
		if (  keyCode ==13)
		{
		    
			document.frmBusqueda.action = 'busqueda.php';
			document.frmBusqueda.submit();
		}
    }
			
}
document.frmBusqueda.txtCodigo.focus();
document.frmBusqueda.txtCodigo.selectionStart = document.frmBusqueda.txtCodigo.value.length;

function buscarTodosValores(){
	//alert('asdas')
/*	alert(windowopener.document.forms[0].busquedaTodos.value);
	if (windowopener.document.forms[0].busquedaTodos.value)
	{alert('true') 
	   return true;
	}
	else
	{
		alert('falso') 
	   return false;   
	}*/
}
</script>
</body>
</html>
