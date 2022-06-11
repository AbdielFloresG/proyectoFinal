<div class="modal fade" id="modificarJuego" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar juego</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="modificarJuego" action="../database/modificarJuego.php" method="POST">
                    <div class="mb-3" style="Display: none;">
                        <label for="idJuegoEdit" class="form-label">ID del Juego: </label>
                        <input type="text" id="idJuegoEdit" class="form-control" name="id" placeholder="Nombre" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del juego: </label>
                        <input type="text" id="nombreEdit" class="form-control" name="name" placeholder="Nombre" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio: </label>
                        <input type="text" id="precioEdit" class="form-control" name="precio" placeholder="Precio" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="desarrollador" class="form-label">Desarrollador: </label>
                        <input type="text" id="desarrolladorEdit" class="form-control" name="desarrollador" placeholder="Desarrollador" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Genero: </label>
                        <input type="text" id="generoEdit" class="form-control" name="genero" placeholder="Genero" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Año de lanzamiento: </label>
                        <input type="text" id="fechaEdit" class="form-control" name="year" placeholder="Año" required="true">
                    </div>
                    <div class="mb-3">
                        <label for="descripcionEdit" class="form-label">Descripcion</label>
                        <textarea id="descripcionEdit" class="form-control"name="descripcionEdit" rows="5" required="true" max-length="250"></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="activo" class="form-label">Activo</label>
                        <select class="form-select" id="activoEdit" name="activo" aria-label="Default select example" required="true">
                            <option selected>Selecciona una opcion</option>
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select>
                    </div>
                    
                    <div class="modal-footer cow g-2 ">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>