<?php
include("includes/funciones.php");
//$consulta = ejecutarConsultaResultado($sql);
if ($_POST['txtModo'] == "I" )
  {
    //query para realizar el insert en la base de datos
    $sql = "INSERT INTO tbl_arancel ( codigo_arancel,
                                      descripcion,
                                      valor)   
                              values( '".$_POST['txtCodigoArancel']."',
                                      '".$_POST['txtDescripcion']."',"
                                      .$_POST['txtValor'].")";
    $consulta = ejecutarConsulta ($sql); 
    echo "<script> alert('El arancel se ha registrado satisfactoriamente.') </script>";             
  } 
else if ($_POST['txtModo'] == "A")
{  $sql = "update tbl_arancel set descripcion='".$_POST['txtDescripcion']."',
                                  valor=".$_POST['txtValor']." 
                            where codigo_arancel='".$_POST['txtCodigoArancel']."'";
   $consulta = ejecutarConsulta ($sql); 
   echo "<script> alert('El arancel ha sido modificado satisfactoriamente.') </script>";
     
    
}
else if ($_POST['txtModo'] == "E")
  {
    //query que realiza el eliminado logico en la del registro donde eliminado = 0 es inactivo y 1 para activo
    $sql = "delete from tbl_arancel where codigo_arancel = '". $_POST['txtCodigoArancel']."'";
    echo "<script> alert('El arancel se ha eliminado satisfactoriamente') </script>"; 
    $consulta = ejecutarConsulta ($sql); //inserta el query en la base de datos  
  }   
    echo "<script> window.top.location = 'arancel.php'</script>"; 
?>