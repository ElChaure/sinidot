	/* Validar No Copiar y Pegar, Cortar Caracteres
		Adicional a�adir al <body onselectstart="return false;" ondragstart="return false;"> en view
	 */	
	  /*$(document).ready(function(){
	    $('*').bind("cut copy paste",function(e) {
	      e.preventDefault();
	     //SetFlash Msg
	    });
	  });*/

	/* Validar Campo Solo Numeros */
	function numeros(e) {
		/*tecla = (document.all) ? e.keyCode : e.which;
		if (tecla==8) return true; 
		patron = /\d/; 
		te = String.fromCharCode(tecla); 
		return patron.test(te);*/
		
		tecla = (e.which) ? e.which : e.keyCode     	
         if (tecla == 45 || tecla==8) {
         	return true;
         }
         if(tecla > 31 && (tecla < 48 || tecla > 57 ))
            return false;
         
          
        patron = /\d/; 
		te = String.fromCharCode(tecla); 
		return patron.test(te);
	}		

	/* Validar Campo Solo Letras */
	function letras(e) {
		tecla = (document.all) ? e.keyCode : e.which;
		if (tecla==8) return true; 
		patron =/[A-Za-z�������\s\x00]/; //TAB \x00
		te = String.fromCharCode(tecla); 
		return patron.test(te);
	}		

	/* Validar Campo Hora */
	function hora(e) {
		tecla = (document.all) ? e.keyCode : e.which;
		if (tecla==8) return true; 
		patron = /[0123456789:]/;
		te = String.fromCharCode(tecla); 
		return patron.test(te);
	}	

	/* Funcion Letras Mayusculas */
	function conMayusculas(campo,field) {
		
		document.getElementById(campo).value = field.toUpperCase();
	}
