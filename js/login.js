validarLogIn = () =>{

    let verificar = true;

    //Validaciones
    if(!document.getElementById("formLogIn").email.value){
        alert("Está vacio el nombre mi pa");
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
