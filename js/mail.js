// Tienda GameStore 
// Este codigo valida los datos de iniciar sesion 
// codigo realizado por Abdiel Flores Gastelum
// el 10/06/22 

validarMail = () =>{

    let verificar = true;

    //Validaciones
    if(!document.getElementById("formContacto").emailContacto.value){
        verificar = false;
        alert("Está vacio el correo");
        document.getElementById("formContacto").emailContacto.focus();
        
    }else if(document.getElementById("formContacto").nombreContacto.value===""){
        alert("El campo nombre es requerido");
        document.getElementById("formContacto").nombreContacto.focus();
        verificar = false;
    }else if(document.getElementById("formContacto").asuntoContacto.value===""){
        alert("El asunto está vacio");
        document.getElementById("formContacto").asuntoContacto.focus();
        verificar = false;
    }

    if(verificar){
        document.getElementById("formContacto").submit();
    }
}

const buttonEnviar = document.getElementById("btn-contacto");
buttonEnviar.addEventListener("click",validarMail);
