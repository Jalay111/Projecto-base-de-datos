 function validarForm(formulario) {
  if(formulario.nombre.value.length==0) { //comprueba que no esté vacío
    formulario.nombre.focus();   
    alert('No has escrito tu nombre'); 
    return false; //devolvemos el foco
  }
  if(formulario.apellido.value.length==0) { //comprueba que no esté vacío
    formulario.apellido.focus();
    alert('No has escrito tu apellido');
    return false;
  }
   if(formulario.direccion.value.length==0) { //comprueba que no esté vacío
    formulario.direccion.focus();
    alert('No has escrito tu direccion');
    return false;
  }
  if(formulario.telefono.value.length==0) {  //comprueba que no esté vacío
    formulario.telefono.focus();
    alert('No has escrito tu telefono');
    return false;
  }
  if(formulario.cedula.value.length==0) {  //comprueba que no esté vacío
    formulario.cedula.focus();
    alert('No has escrito tu cedula');
    return false;
  }
  if(formulario.correo.value.length==0) {  //comprueba que no esté vacío
    formulario.correo.focus();
    alert('No has escrito tu correo');
    return false;
  }
  if(formulario.password.value.length==0) {  //comprueba que no esté vacío
    formulario.password.focus();
    alert('No has escrito tu contraseña');
    return false;
  }
  return true;
}