

function vaciarCombo(nombrecombo){
   var combo = document.getElementById(nombrecombo);
	if (combo == null)
	   return false;
		
   while(combo.options.length > 0){
      combo.options[combo.options.length-1] = null;
   }
}

function llenarCombo(nombrecombo, texto, valor){
   var combo = document.getElementById(nombrecombo);
   var idxElemento = combo.options.length; //Numero de elementos de la combo si esta vacio es 0
   //Este indice será el del nuevo elemento
   combo.options[idxElemento] = new Option();
   combo.options[idxElemento].text = texto; //Este es el texto que verás en la combo
   combo.options[idxElemento].value = valor; //Este es el valor que se enviará cuando hagas un submit del 
//cormulario que lo contiene
   }
   
function trim(s)
{
	var l=0; var r=s.length -1;
	while(l < s.length && s[l] == ' ')
	{	l++; }
	while(r > l && s[r] == ' ')
	{	r-=1;	}
	return s.substring(l, r+1);
}
	  
function ltrim(s)
{
	var l=0;
	while(l < s.length && s[l] == ' ')
	{	l++; }
	return s.substring(l, s.length);
}

function rtrim(s)
{
	var r=s.length -1;
	while(r > 0 && s[r] == ' ')
	{	r-=1;	}
	return s.substring(0, r+1);
}	  

function seleccionarCombo(nombrecombo, valor)
{
var combo = document.getElementById(nombrecombo);
var i;
   for (i = 0; i < combo.length; i++) 
	{
	
      if (combo.options[i].value == valor) 
		{
         combo.options[i].selected = true;
		 return true;
			break;
      }   
   }
   return false;
}

function validarLogin()
{
  
  if (validarDatos(document.frmLogin,'') )
     return false;
  document.frmLogin.action = 'frmLogin.php' 
  document.frmLogin.submit();
}

function pantallaLogin(id)
{
$( id ).dialog({
			autoOpen: false,
			height: 0,
			width: 0,
			position:'top',
			modal: true
		});

}

function abrirBusqueda(id_form, txtInput, nombreVentana, sqlCodigo, sqlDescripcion, buscarTodos)
{
	var input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', "busquedaTodos");
    input.setAttribute('value', buscarTodos);
    document.getElementById(id_form).appendChild(input);

	tope = screen.height / 2 - 400;
	izqui = screen.width / 2 - 600;
	opciones = 'width=600,height=400,scrollbars=yes,top=' + tope + ',left=' + izqui;
	ventanaHija = window.open(nombreVentana+'?txtInput='+txtInput+'&buscarTodos='+buscarTodos+'&sqlCodigo='+sqlCodigo+'&sqlDescripcion='+sqlDescripcion,'', opciones);
}


//funcion para validar un campo tipo texto
function validarCampo(idCampo)
{
  
  campo = document.getElementById(idCampo);
  if (campo.value.length == 0)
    {
	  if (!campo.lang) 
	    alert('Debe ingresar el dato'); 
	  else
	    alert('Debe ingresar ' + campo.lang);
	    
	  
	  //campo.setAttribute("class","error");}
	  //fieldObj.setAttribute("className","mainFormError");
	  campo.focus();
	  return false;
	}  
}			  
/************************************************************************************/
//comprueba si un año es bisiesto
function comprobarSiBisisesto(anio){
if ( ( anio % 100 != 0) && ((anio % 4 == 0) || (anio % 400 == 0))) {
    return true;
    }
else {
    return false;
    }
}
/************************************************************************************/
// valida la fecha con formato dd/mm/yyyy
function validarFecha(idCampo)
{
  fecha = document.getElementById(idCampo);
  if (fecha != undefined && fecha.value != "" )
    {
      if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fecha.value))
	    {
          alert("formato de fecha no válido (dd/mm/aaaa)");
          return false;
        }
      var dia  =  parseInt(fecha.value.substring(0,2),10);
      var mes  =  parseInt(fecha.value.substring(3,5),10);
      var anio =  parseInt(fecha.value.substring(6),10);
 
      switch(mes){
          case 1:
          case 3:
          case 5:
          case 7:
          case 8:
          case 10:
          case 12: numDias=31;
                   break;
           case 4: 
		   case 6: 
		   case 9: 
		  case 11: numDias=30;
                   break;
           case 2: if (comprobarSiBisisesto(anio)){ numDias=29 }else{ numDias=28};
                     break;
          default: alert("Fecha invalida!");
                   return false;
    }
    if (dia>numDias || dia==0)
	  {
        alert("Fecha invalida!");
        return false;
      }
        return true;
    }
}

/************************************************************************************/
function validarNumero(idCampo)
{ 
  campo = document.getElementById(idCampo);
  if (isNaN(campo.value) ) 
    {
	  alert(campo.lang + 'debe ser númerico');
	  campo.focus();
      return false;
    }
  else 
    return true;
}

/************************************************************************************/
//esta funcion solo deja ingresar numeros enteros
/*function soloNumeros(e)
{
var caracter 
  caracter = e.keyCode 
  status = caracter 
  if (caracter>47 && caracter <58)
    return true
  else
    return false
}
//onkeypress="return soloNumeros(event)"
*/

function soloNumeros(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /\d/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

//onkeypress = "return soloNumeros(event)";

function buscarIgnorarCampo(camposIgnorados, campo)
{
	var i, arregloNombres;
	    
	arregloNombres = camposIgnorados.split(",");
	for (i=0; i < arregloNombres.length; i++)
	  {
		if ( arregloNombres[i] == campo )
		   return true;   
	  }
  return false;	
}

function validarDatos(formulario, ignorarCampos)
{
  var i;	 
  buscarIgnorarCampo(ignorarCampos);	 
  for (i=0; i < formulario.elements.length; i++)
    {
		 
	   if (formulario.elements[i].value.length == 0 && formulario.elements[i].type != 'button' &&  
		    formulario.elements[i].type != 'submit' && buscarIgnorarCampo(ignorarCampos, formulario.elements[i].name) == false) 
		  {
			  if (!formulario.elements[i].lang)
		          alert('debe ingresar el dato.');
			  else
			     alert('debe ingresar ' + formulario.elements[i].lang + '.');
			    
				 	 
              formulario.elements[i].focus();
			  return true;
		  }
    }
   //formulario.submit();	 
}

function siguiente(e,obj) 
{ 
  tecla=(document.all) ? e.keyCode : e.which; 
  if(tecla!=13) 
     return false; 
  frm = obj;
  for(i=0;i<frm.elements.length;i++)  
	  {
	    
		if(frm.elements[i].id==e.target.id )
		  {  
			while(i <= frm.elements.length && frm.elements[i+1].type=='button') 
			  {
				i++;	
			  }
			 frm.elements[i+1].focus(); 
			 break;
		  } 
	  }
  //return true; 
}
function formatearYMD(fecha)
{
   var dia  =  parseInt(fecha.substring(0,2),10);
   var mes  =  parseInt(fecha.substring(3,5),10);
   var anio =  parseInt(fecha.substring(6),10);
   var fecha = anio+"/"+mes+"/"+dia; 
   return fecha;
}
function calcular_edad(fecha, fecha_actual)
{ 

   fecha = new Date(formatearYMD(fecha));
   hoy = new Date(formatearYMD(fecha_actual));
   anos = parseInt((hoy -fecha)/365/24/60/60/1000);
   return anos; 
 }






