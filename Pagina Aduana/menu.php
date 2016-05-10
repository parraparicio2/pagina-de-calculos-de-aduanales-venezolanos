﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="STYLESHEET" type="text/css" href="estilos.css"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<style type="text/css">
a {
	color: #333;
}
#nav {
	margin: 0;
	padding: 7px 6px 0;
	line-height: 100%;
	border-radius: 2em;

	-webkit-border-radius: 2em;
	-moz-border-radius: 2em;
	
	-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .4);
	-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .4);

	background: #8b8b8b; /* for non-css3 browsers */
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#a9a9a9', endColorstr='#7a7a7a'); /* for IE */
	background: -webkit-gradient(linear, left top, left bottom, from(#a9a9a9), to(#7a7a7a)); /* for webkit browsers */
	background: -moz-linear-gradient(top,  #a9a9a9,  #7a7a7a); /* for firefox 3.6+ */

	border: solid 1px #6d6d6d;
}
#nav li {
	margin: 0 5px;
	padding: 0 0 8px;
	float: left;
	position: relative;
	list-style: none;
}
/* main level link */
#nav a {
	font-weight: bold;
	color: #e7e5e5;
	text-decoration: none;
	display: block;
	padding:  8px 20px;
	margin: 0;
	-webkit-border-radius: 1.6em;
	-moz-border-radius: 1.6em;
	text-shadow: 0 1px 1px rgba(0, 0, 0, .3);
}
/* main level link hover */
#nav .current a, #nav li:hover > a {
	background: #d1d1d1; /* for non-css3 browsers */
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ebebeb', endColorstr='#a1a1a1'); /* for IE */
	background: -webkit-gradient(linear, left top, left bottom, from(#ebebeb), to(#a1a1a1)); /* for webkit browsers */
	background: -moz-linear-gradient(top,  #ebebeb,  #a1a1a1); /* for firefox 3.6+ */

	color: #444;
	border-top: solid 1px #f8f8f8;
	-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
	-moz-box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
	box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
	text-shadow: 0 1px 0 rgba(255, 255, 255, .8);
}
/* sub levels link hover */
#nav ul li:hover a, #nav li:hover li a {
	background: none;
	border: none;
	color: #666;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
}
#nav ul a:hover {
	background: #0399d4 !important; /* for non-css3 browsers */
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#04acec', endColorstr='#0186ba'); /* for IE */
	background: -webkit-gradient(linear, left top, left bottom, from(#04acec), to(#0186ba)) !important; /* for webkit browsers */
	background: -moz-linear-gradient(top,  #04acec,  #0186ba) !important; /* for firefox 3.6+ */

	color: #fff !important;
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	text-shadow: 0 1px 1px rgba(0, 0, 0, .1);
}
/* level 2 list */
#nav ul {
	background: #ddd; /* for non-css3 browsers */
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#cfcfcf'); /* for IE */
	background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#cfcfcf)); /* for webkit browsers */
	background: -moz-linear-gradient(top,  #fff,  #cfcfcf); /* for firefox 3.6+ */

	display: none;
	margin: 0;
	padding: 0;
	width: 185px;
	position: absolute;
	top: 35px;
	left: 0;
	border: solid 1px #b4b4b4;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
	-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
	box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
}
/* dropdown */
#nav li:hover > ul {
	display: block;
}
#nav ul li {
	float: none;
	margin: 0;
	padding: 0;
}
#nav ul a {
	font-weight: normal;
	text-shadow: 0 1px 1px rgba(255, 255, 255, .9);
}
/* level 3+ list */
#nav ul ul {
	left: 181px;
	top: -3px;
}
/* rounded corners for first and last child */
#nav ul li:first-child > a {
	-webkit-border-top-left-radius: 9px;
	-moz-border-radius-topleft: 9px;
	-webkit-border-top-right-radius: 9px;
	-moz-border-radius-topright: 9px;
}
#nav ul li:last-child > a {
	-webkit-border-bottom-left-radius: 9px;
	-moz-border-radius-bottomleft: 9px;
	-webkit-border-bottom-right-radius: 9px;
	-moz-border-radius-bottomright: 9px;
}
/* clearfix */
#nav:after {
	content: ".";
	display: block;
	clear: both;
	visibility: hidden;
	line-height: 0;
	height: 0;
}
#nav {
	display: inline-block;
}
html[xmlns] #nav {
	display: block;
}
* html #nav {
	height: 1%;
}
  
</style>
<body>
<ul id="nav">
	<li><a href="#">Mantenimiento</a><!--el boton principal-->
		<ul>
            <li><a href="articulos.php">Articulos</a></li>
            <li><a href="arancel.php">Aranceles</a></li>
			<li><a href="articulo_arancel.php">Aranceles de los articulos</a></li>
			<li><a href="servicios.php">Servicios</a></li>
			<li><a href="clientes.php">Clientes</a></li>
            <li><a href="multa.php">Multas</a></li>
			<li><a href="tipo_transporte.php">Tipos de Transporte</a></li>
			<li><a href="empresa_transporte.php">Empresa de Transporte</a></li>
		</ul>
	</li>
	<li><a href="#">Cargas</a>
		<ul>
			<li><a href="carga.php">Ingreso de Cargas</a></li>
		</ul>
	</li>
	<li><a href="#">Consultas</a>
		<ul>
			<li><a href="listar_clientes.php">Listado de Clientes</a></li>
			<li><a href="listar_articulos.php">Listado de Articulos</a></li>
            <li><a href="listar_aranceles.php">Listado de Aranceles</a></li>
			<li><a href="listar_articulo_arancel.php">Listado de Articulos con Aranceles</a></li>
            <li><a href="listar_servicios.php">Listado de Servicios</a></li>
            <li><a href="buscar_carga.php">Consulta de cargas</a></li>
		</ul>
	</li>
</ul>
<div id="logo" style= "width:100%; float:left;">
<!--img src="imagenes/logo.jpg" style="width:100%"-->
</div>


</body>
</html>