// Tienda GameStore 
// Este codigo valida los datos de crear cuenta
// codigo realizado por Abdiel Flores Gastelum
// el 10/06/22 

validarDatosSignUp = () =>{

    let verificar = true;

    //Validaciones
    if(!document.getElementById("formSignUp").name.value){
        alert("Está vacio el nombre mi pa");
        document.getElementById("formSignUp").name.focus();
        verificar = false;
    }else if(!document.getElementById("formSignUp").lastname.value){
        alert("El campo Apellido es requerido");
        document.getElementById("formSignUp").lastname.focus();
        verificar = false;
    }else if(!document.getElementById("formSignUp").password.value){
        alert("El campo Contraseña es requerido");
        document.getElementById("formSignUp").password.focus();
        verificar = false;
    }else if(document.getElementById("formSignUp").password.value.length < 6){
        alert("La contraseña es de minimo 6 caracteres");
        document.getElementById("formSignUp").password.focus();
        verificar = false;
    }else if(document.getElementById("formSignUp").confirm_password.value !== document.getElementById("formSignUp").password.value){
        alert("La contraseña no coincide");
        document.getElementById("formSignUp").confirm_password.focus();
        verificar = false;
    }

    if(verificar){
        document.getElementById("formSignUp").submit();
    }
} 

const buttonEnviar = document.getElementById("btn-crear");
buttonEnviar.addEventListener("click",validarDatosSignUp);
