<div class="modal fade" id="modificarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarUsuario" action="../database/modificarUsuario.php" method="POST">
                    <div class="mb-3" style="Display: none;">
                        <label for="idUsuarioEdit" class="form-label">ID del Juego: </label>
                        <input type="text" id="idUsuarioEdit" class="form-control" name="id" placeholder="Nombre" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre: </label>
                        <input type="text" id="nombreEdit" class="form-control" name="name" placeholder="Ingresa el nombre" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Apellido: </label>
                        <input type="text" id="apellidoEdit" class="form-control" name="lastname" placeholder="Ingresa el apellido" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electronico: </label>
                        <input type="text" id="correoEdit" class="form-control" name="email" placeholder="Ingresa el correo electronico" required="true">
                    </div>
                    

                    <div class="mb-3">
                        <label for="activo" class="form-label">Rol de usuario</label>
                        <select class="form-select" id="rolEdit" name="rolUsuario" aria-label="Default select example" required="true">
                            <option selected>Selecciona una opcion</option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                    </div>
                    
                    <div class="modal-footer cow g-2 ">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar cambios</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>