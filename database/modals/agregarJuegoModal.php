<div class="modal fade" id="agregarJuego" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar juego</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="Agregar juego" action="../database/agregarJuego.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del juego: </label>
                        <input type="text" class="form-control" name="name" placeholder="Nombre" require="true">
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio: </label>
                        <input type="text" class="form-control" name="precio" placeholder="Precio" require="true">
                    </div>
                    <div class="mb-3">
                        <label for="desarrollador" class="form-label">Desarrollador: </label>
                        <input type="text" class="form-control" name="desarrollador" placeholder="Desarrollador" require="true">
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Genero: </label>
                        <input type="text" class="form-control" name="genero" placeholder="Genero" require="true">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Año de lanzamiento: </label>
                        <input type="text" class="form-control" name="year" placeholder="Año" require="true">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripcion</label>
                        <textarea class="form-control" name="description" rows="3" require="true" max-length="250"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="activo" class="form-label">Activo</label>
                        <select class="form-select" name="activo" aria-label="Default select example" require="true">
                            <option selected>Selecciona una opcion</option>
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
                

            </div>
            
        </div>
    </div>
</div>