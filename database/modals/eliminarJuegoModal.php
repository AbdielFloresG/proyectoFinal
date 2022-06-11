<div class="modal fade" id="eliminarJuego" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Eliminar juego</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea eliminar el juego?
                <form id="eliminarJuego" action="../database/eliminarJuego.php" method="POST">
                    <div class="mb-3" style="display: none;" >
                        <input type="text" id="idJuegoEliminar" class="form-control" name="id" placeholder="Nombre" required="true" >
                        
                    </div>   
                    <div class="my-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Si, eliminar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>