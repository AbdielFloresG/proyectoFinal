<div class="modal fade" id="agregarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formSignUp" action="../dashboard/database/validacionSignUpDashboard.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="name" placeholder="Ingresa el nombre" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="lastname" placeholder="Ingresa el apellido" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electronico: </label>
                        <input type="text" class="form-control" name="email" placeholder="Ingresa el correo electronico" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña: </label>
                        <input type="password" class="form-control" name="password" placeholder="Ingresa la contraseña" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="confirm_Password" class="form-label">Confirma contraseña: </label>
                        <input type="password" class="form-control" name="confirm_password" placeholder="confirma la contraseña" required="true">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btn-crear" name="btn-crear">Crear usuario</button>
                
                    </div>
                </form>
                

            </div>
            
        </div>
    </div>
</div>