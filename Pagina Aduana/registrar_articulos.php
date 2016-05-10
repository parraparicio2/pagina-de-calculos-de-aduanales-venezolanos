<?php
include("includes/funciones.php");
//$consulta = ejecutarConsultaResultado($sql);
if ($_POST['txtModo'] == "I" )
  {
    //query para realizar el insert en la base de datos
    $sql = "INSERT INTO tbl_articulo (codigo_articulo,descripcion) values('".$_POST['txtCodigoArticulo']."','".$_POST['txtDescripcion']."')";
    $consulta = ejecutarConsulta ($sql); 
    echo "<script> alert('El articulo se ha registrado satisfactoriamente.') </script>";             
  } 
else if ($_POST['txtModo'] == "A")
{  $sql = "update tbl_articulo set descripcion='".$_POST['txtDescripcion']."' where codigo_articulo='".$_POST['txtCodigoArticulo']."'";
   $consulta = ejecutarConsulta ($sql); 
   echo "<script> alert('El articulo ha sido modificado satisfactoriamente.') </script>";
     
    
}
else if ($_POST['txtModo'] == "E")
  {
    //query que realiza el eliminado logico en la del registro donde eliminado = 0 es inactivo y 1 para activo
    $sql = "delete from tbl_articulo where codigo_articulo = '". $_POST['txtCodigoArticulo']."'";
    echo "<script> alert('El articulo se ha eliminado satisfactoriamente') </script>"; 
    $consulta = ejecutarConsulta ($sql); //inserta el query en la base de datos  
  }   
    echo "<script> window.top.location = 'articulos.php'</script>"; 
?>