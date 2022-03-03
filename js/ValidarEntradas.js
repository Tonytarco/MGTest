
function ValidarEntrada(e,tipo,destino)
             {
                 
                           
                key = e.keyCode || e.which;
               
                tecla = String.fromCharCode(key).toString();
                
                if (tipo == "Letras")    permitidos = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz -.,";
                if (tipo == 'Numeros')    permitidos = "0123456789.,";
                if (tipo == "email")    permitidos = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz0123456789.@-_";
                if (tipo == "direccion")    permitidos = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz01234567890123456789.-°# ";
                if (tipo == 'Juridico')    permitidos = "0123456789 -GJ"; 
                
                especiales = [8,13];
                tecla_especial = false;
                for (var i in especiales){
                
                   if (key == especiales[i]){
                     tecla_especial = true;
                     
                     if (key == 13){siguiente(destino);
                     
                    }
                     break;

                         }
                    
                }
               
                if(permitidos.indexOf(tecla) == -1
                   && !tecla_especial){
                       if (document.forms.clientes.errcount.value == 2) {
                         swal({
                            title: "Error de Datos",
                            text: "Escriba solo "+ tipo+" por favor",
                            icon: "error",
                            button: true
                            //dangerMode: true,
                            })  
                            document.forms.clientes.errcount.value=0            
                             //alert("Escriba solo "+ tipo+" por favor");
                         
                       }else document.forms.clientes.errcount.value=Number(document.forms.clientes.errcount.value)+1;
                       return false;
                    }
                     
               
            }

            function tab_btn(event,destino)
            {
              var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
              
              if (t == 9) 
              {
                siguiente(destino);
                return false;
              }
              return true;
            }		
 function siguiente(destino,pos)
            { 
             
              eval("document.forms.clientes."+destino+".focus()") 
              
              }         
 
 function blanco(objeto,valor)
{ 
    elemento = document.getElementById(objeto);  
    if(elemento.value==valor)
	        {   
            swal({
                title: "Omision de Datos",
                text: "El campo "+objeto+" es obligatorio",
                icon: "error",
                button: true
                 //dangerMode: true,
              })          
             elemento.focus();
             return true;
    
      }
	    else return false;
  }

function pos_char(objeto,char,desde){
  indice=objeto.indexOf(char,desde)
  return indice;
}
function tiene(objeto,char,desde){
  indice= pos_char(objeto,char,desde);
  if (indice > 0)return true
   else return false;  
}
function dominioinvalido(){
  elemento=document.getElementById("email");
  
  desde=pos_char(elemento.value,"@",0)+2;
   if( !tiene(elemento.value,"@",0) || !tiene(elemento.value,".",desde)){
    swal({
        title: "Correo inválido",
        text: "Un e-mail debe contener '@' y '.'; por favor reviselo e intentelo nuevamente",
        icon: "error",
        button: true
        
        //dangerMode: true,
      })          
    
    elemento.focus();
    return true;
    }
    else return false;

   }
  
   function tiene_pocos_char(objeto,min,max){
    
    
    if ((document.forms.clientes.TipodePersona.value=="2-PJR") && (objeto=="Apellido"))return false;
    else {
      elemento = document.getElementById(objeto); 
      totalchars = Number(elemento.value.length);    
    if (totalchars < min)
    {
        swal({
            title: "valor muy corto",
            text: " por favor escriba un "+objeto+" que tenga entre "+min+" y "+max+" caracteres",
            icon: "info",
            button: true
            
            //dangerMode: true,
          })             	
        //alert("El valor es muy corto, por favor escriba un "+objeto+" que tenga entre "+min+" y "+max+" caracteres");
        elemento.focus();
        return true;
      }
      else return false;
   }
  }
   function cant_prohibida(objeto,min,max){

    if ((document.forms.clientes.TipodePersona.value=="2-PJR") && (objeto=="Edad"))return false;
    else {
    elemento = document.getElementById(objeto); 
    valor = Number(elemento.value);

    if ((valor > max) || (valor < min))
    { 
        swal({
            title: "Fuera del Rango",
            text: "El valor para "+objeto+" está fuera del rango permiido, por favor escriba un valor entre "+min+" y "+max,
            icon: "info",
            button: true
            
            //dangerMode: true,
          })             	   
      //alert("El valor para "+objeto+" está fuera del rango permiido, por favor escriba un valor entre "+min+" y "+max);
      elemento.focus();
      return true;

    }
    else return false;
  }
}
  
function f_validar(form){
   
    switch (form) {
        case 'clienteP1':
            if(blanco('Tipo de Persona',''))return false 
              else if(blanco('Tipo de Documento',''))return false     
                 else if((blanco('Dni','')) || (cant_prohibida('Dni',100,999999999999)))return false
                    else if ((blanco('Nombre','')) || (tiene_pocos_char("Nombre",3,30)))return false
                      else if ((blanco('Apellido','')) || (tiene_pocos_char("Apellido",3,30)))return false 
                         else
                         {                         
                         document.forms.clientes.hd_btnact12.value = "false";
                        if (document.forms.clientes.hd_label_btn.value=="Registrar")document.forms.clientes.accion.value = "registrarclienteP1"
                        else  if (document.forms.clientes.hd_label_btn.value=="Actualizar")document.forms.clientes.accion.value = "actualizarclienteP1";
                           //document.forms.clientes.hd_label_btn.value = "Actualizar";
                           document.forms.clientes.submit();     
                           return true
                           
                          }
         break;
        case 'clienteP2':
            if ((blanco('Celular','')) || (tiene_pocos_char('Celular',8,12)))return false    
             else if((blanco('email','')) || (tiene_pocos_char('email',6,30)))return false
                else if(dominioinvalido())return false
                 else {   document.forms.clientes.hd_btnact23.value = "false";
                          document.forms.clientes.accion.value = "actualizarclienteP2";
                          document.forms.clientes.submit(); 
                          return true;
                      }
          break;
        
        case 'clienteP3':
          if((blanco('Edad','')) || (cant_prohibida('Edad',16,130)))return false   
          else if(blanco('Genero',''))return false
            else if(blanco('Estatus',''))return false
               else {  
                   document.forms.clientes.accion.value = "actualizarclienteP3";
                   document.forms.clientes.submit(); 
             return true;
         }
         break;
         case 'usuarioP1': 
         alert('pase');
                if ((blanco('name','')) || (tiene_pocos_char("name",5,60)))return false
                  else if((blanco('username',''))||(tiene_pocos_char("username",3,50)))return false 
                     else if((blanco('password',''))||(tiene_pocos_char("password",4,30)))return false     
                         else
                       {                         
                       document.forms.clientes.hd_btnact12.value = "false";
                       if (document.forms.clientes.hd_label_btn.value=="Registrar")document.forms.clientes.accion.value = "registrarusuarioP1"
                       else  if (document.forms.clientes.hd_label_btn.value=="Actualizar")document.forms.clientes.accion.value = "actualizarusuarioP1";
                         //document.forms.clientes.hd_label_btn.value = "Actualizar";
                         document.forms.clientes.submit();     
                         return true
                         
                        }    
                        case 'usuarioP2':
                          if ((blanco('Celular','')) || (tiene_pocos_char('Celular',8,12)))return false    
                           else if((blanco('email','')) || (tiene_pocos_char('email',6,30)))return false
                              else if(dominioinvalido())return false
                               else {   document.forms.clientes.hd_btnact23.value = "false";
                                        document.forms.clientes.accion.value = "actualizarusuarioP2";
                                        document.forms.clientes.submit(); 
                                        return true;
                                    }               
                                    case 'usuarioP3':
                                      if(blanco('Perfil',''))return false
                                        else if(blanco('Estatus',''))return false
                                           else {  
                                               document.forms.clientes.accion.value = "actualizarusuarioP3";
                                               document.forms.clientes.submit(); 
                                         return true;    
                                        }                       


                                        case 'logueo':
                                          
                                          if((blanco('username',''))||(tiene_pocos_char("username",3,50)))return false 
                                            else if((blanco('password',''))||(tiene_pocos_char("password",4,30)))return false     
                                              
                                                   else
                                                       {                
                                                       document.forms.clientes.accion.value = "consulta";
                                                         
                                                       //document.forms.clientes.hd_label_btn.value = "Actualizar";
                                                       document.forms.clientes.submit();     
                                                        return true;
                                                         
                                                        }

         default:
          //Declaraciones ejecutadas cuando ninguno de los valores coincide con el valor de la expresión
          break;
      }
      
}
function f_revisasiguiente(boton,origen){
    elemento = document.getElementById(boton);
    alert("hola");
    if(elemento.disabled==false){
         elemento.disabled=true; 
         eval("document.forms.clientes.hd_"+boton+".disabled=true");
         }
         
    if ((origen=="Dni")||(origen=="Tipo de Documento")){
      
        if ((origen=="Tipo de Documento") && (document.forms.clientes.Dni.value==""))document.forms.clientes.submit();
             else if((document.forms.clientes.Dni.value.length >= 3) && (document.forms.clientes.TipodeDocumento.value != ""))
        {    
        document.forms.clientes.accion.value="consulta";
        document.forms.clientes.submit();
        }

    }else if (origen=="Tipo de Persona")document.forms.clientes.submit();   
        
}
   

