<?php
include("includes/funciones.php");
//$consulta = ejecutarConsultaResultado($sql);
if ($_POST['txtModo'] == "I" )
  {
    //query para realizar el insert en la base de datos
    $sql = "INSERT INTO tbl_articulo_arancel (id_articulo_arancel, codigo_articulo,codigo_arancel) values('".$_POST['txtCodigoArticulo']."','".$_POST['txtCodigoArticulo']."','". $_POST['txtCodigoArancel']."')";
    $consulta = ejecutarConsulta ($sql); 
    echo "<script> alert('El arancel del articulo se ha registrado satisfactoriamente.') </script>";             
  } 
else if ($_POST['txtModo'] == "A")
{  $sql = "update tbl_articulo_arancel set id_articulo_arancel = '".$_POST['txtCodigoArticulo']."', codigo_articulo ='".$_POST['txtCodigoArticulo']."', codigo_arancel='".$_POST['txtCodigoArancel']."' where codigo_articulo='".$_POST['txtCodigoArticulo']."'";
   $consulta = ejecutarConsulta ($sql); 
   echo "<script> alert('El arancel del articulo ha sido modificado satisfactoriamente.') </script>";
     
    
}
else if ($_POST['txtModo'] == "E")
  {
    //query que realiza el eliminado logico en la del registro donde eliminado = 0 es inactivo y 1 para activo
    $sql = "delete from tbl_articulo_arancel where codigo_articulo = '". $_POST['txtCodigoArticulo']."'";
    echo "<script> alert('El arancel del articulo se ha eliminado satisfactoriamente') </script>"; 
    $consulta = ejecutarConsulta ($sql); //inserta el query en la base de datos  
  }   
    echo "<script> window.top.location = 'articulo_arancel.php'</script>"; 
?>