// Tienda GameStore 
// Este codigo valida los datos de iniciar sesion 
// codigo realizado por Abdiel Flores Gastelum
// el 10/06/22 

validarLogIn = () =>{

    let verificar = true;
    let expresionRegularMail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Validaciones
    if(!document.getElementById("formLogIn").email.value){
        alert("El Campo Email es requerido");
        document.getElementById("formLogIn").email.focus();
        verificar = false;
    }else if(!expresionRegularMail.test(document.getElementById("formLogIn").email.value)){
        alert("El email es invalido");
        document.getElementById("formLogIn").email.focus();
        verificar = false;
    }else if(!document.getElementById("formLogIn").password.value){
        alert("El campo Contraseña es requerido");
        document.getElementById("forLogInp").password.focus();
        verificar = false;
    }else if(document.getElementById("formLogIn").password.value.length < 6){
        alert("La contraseña es de minimo 6 caracteres");
        document.getElementById("formLogIn").password.focus();
        verificar = false;
    }

    if(verificar){
        document.getElementById("formLogIn").submit();
    }
} 

const buttonEnviar = document.getElementById("btn-login");
buttonEnviar.addEventListener("click",validarLogIn);
