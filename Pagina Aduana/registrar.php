<?php
include("funciones.php");
//$consulta = ejecutarConsultaResultado($sql);
if ($_POST['txtModo'] == "I" )
  {
    //query para realizar el insert en la base de datos
	$sql = "INSERT INTO tbl_clientes (rif,nombre_del_cliente,direccion,telefono,correo) values('".$_POST['txtrif']."','".$_POST['txtNombre']."','".$_POST['txtdireccion']."','".$_POST['txttelefono']."','".$_POST['txtcorreo']."')";
    $consulta = ejecutarConsulta ($sql); 
    echo "<script> alert('El cliente se ha registrado satisfactoriamente') </script>";             
  } 
else if ($_POST['txtModo'] == "A")
{  $sql = "update tbl_clientes set nombre_del_cliente='".$_POST['txtNombre']."',direccion='".$_POST['txtdireccion']."',telefono='".$_POST['txttelefono']."',correo='".$_POST['txtcorreo']."' where rif='".$_POST['txtrif']."'";
   $consulta = ejecutarConsulta ($sql); 
   echo "<script> alert('El cliente ha sido modificado satisfactoriamente') </script>";
     
    
}
else if ($_POST['txtModo'] == "E")
  {
    //query que realiza el eliminado logico en la del registro donde eliminado = 0 es inactivo y 1 para activo
    $sql = "delete from tbl_clientes where rif = '". $_POST['txtrif']."'";
    echo "<script> alert('El cliente se ha eliminado satisfactoriamente') </script>"; 
    $consulta = ejecutarConsulta ($sql); //inserta el query en la base de datos  
  }   
    echo "<script> window.top.location = 'Clientes.php'</script>"; 
?>