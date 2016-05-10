<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form id="frmDatos" method="post" action="reporte_carga.php">

<?php 
require_once("includes/funciones.php");


   
   $sql = "INSERT INTO tbl_carga( 
            rif,
            codigo_transporte, 
            fecha, 
            iva, 
            tasa, 
            total_impuesto, 
            peso_total, 
            tipo_de_operacion, 
            fecha_pago_impuesto
            )
    VALUES ('".$_POST['txtRif'] ."', 
            '".$_POST['txtCodigoTransporte'] ."', 
            '".formatoFecha($_POST['txtFecha'])."',
            ".$_POST['txtTotalIva'] .", 
            ".$_POST['txtTotalTasa'] ." , 
            ".$_POST['txtTotal'] .", 
            ".$_POST['txtPesoTotal'] .", 
            '".$_POST['txtTipoDeOperacion'] ."', 
            '".formatoFecha($_POST['txtFechaPagoImpuesto'])."'
            );";
            
            //echo $sql;
			
			$consulta=ejecutarConsulta($sql);
			//obtenemos el ultimo codigo de carga esto se hace con la funcion de abajo con currval
			// donde el parametro es NOMBRE_TABLA + NOMBRE_CAMPO + SEQ( NOMBRE_TABLA_NOMBRE_CAMPO_SEQ)
            $sql = "SELECT currval('tbl_carga_codigo_carga_seq')";
			$consulta = ejecutarConsulta($sql);
			$codigo_carga = pg_fetch_array($consulta);
			$codigo_carga = $codigo_carga[0];
			$expediente = $_POST['txtTipoDeOperacion']."-".$codigo_carga; 
            
            $sql= "UPDATE tbl_carga set expediente = '".$expediente."' 
                              where codigo_carga = ".$codigo_carga;
            
            //echo $sql;                         
            $consulta=ejecutarConsulta($sql);
            
             
			$codigo_articulo = $_POST['codigo_articulo'];
			$codigo_arancel = $_POST['codigo_arancel'];
			$valor_arancel = $_POST['valor_arancel'];
			$peso_articulo = $_POST['peso_articulo'];
			
			/*echo "codigo articulo ".print_r($codigo_articulo)."<br>";
			echo "codigo arancel ".print_r($codigo_arancel)."<br>";
			echo "valor arancel ".print_r($valor_arancel)."<br>";
			echo "peso articulo ".print_r($peso_articulo)."<br>";*/
			$i = 1;	
			foreach($_POST['codigo_articulo'] as $valor)
			  {
				  $sql= "INSERT INTO tbl_carga_detalle(
									 codigo_carga,  
									 codigo_articulo, 
									 codigo_arancel, 
									 valor, 
									 peso)
							  VALUES ('".$codigo_carga."',
									 '".$codigo_articulo[$i]."', 
									 '".$codigo_arancel[$i]."', 
									 '".$valor_arancel[$i]."', 
									 '".$peso_articulo[$i]."')"; 
									  
				 //echo "sql";
				 //echo $codigo_arancel[$i];
				 $consulta=ejecutarConsulta($sql);
				 $i++;
			  }	
              
              
            $codigo_servicio = $_POST['codigo_servicio'];
            
            $i = 1; 
            
            foreach($_POST['codigo_servicio'] as $valor)
              {
                  $sql= "INSERT INTO tbl_carga_servicios(
                                     codigo_carga,  
                                     codigo_servicios)
                              VALUES ('".$codigo_carga."',
                                     '".$codigo_servicio[$i]."')"; 
                                      
                 //echo $sql;
                 //echo $codigo_servicio[$i];
                 $consulta=ejecutarConsulta($sql);
                 $i++;         
              } 
      
      echo " <input type='hidden' id = 'codigo_carga' name = 'codigo_carga'  value='".$codigo_carga."'> 
	          <script>     
                  document.forms[0].submit();
              </script>";         
              
     //echo "<script> window.top.location = 'carga.php'</script>";     
?>



</form>



</body>
</html>