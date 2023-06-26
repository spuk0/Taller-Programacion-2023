<div class="container mt-5 reservas-destacados">
    <h2>Editar reserva</h2>
    <form method="post" action="<?= site_url('modificar/'.$reserva['id']) ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombreReserva" value="<?= $reserva['nombreReserva'] ?>" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcionReserva" rows="3"><?= $reserva['descripcionReserva'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" class="form-control-file" id="imagen" name="imagen" required>
        </div>
        <div class="form-group">
            <label for="tipo_id">Tipo de reserva:</label>
            <input type="text" class="form-control" id="tipo_id" name="tipo_id" value="<?= $reserva['tipo_id'] ?>" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" class="form-control" id="precio" name="precio" value="<?= $reserva['precio'] ?>" required>
        </div>
        <div class="form-group">
            <label for="precio_vta">Precio de venta:</label>
            <input type="text" class="form-control" id="precio_vta" name="precio_vta" value="<?= $reserva['precio_vta'] ?>" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="text" class="form-control" id="stock" name="stock" value="<?= $reserva['stock'] ?>" required>
        </div>
        <div class="form-group">
            <label for="stock_min">Stock mínimo:</label>
            <input type="text" class="form-control" id="stock_min" name="stock_min" value="<?= $reserva['stock_min'] ?>" required>
        </div>

        <div class="form-group">
            <label for="nroHabitacion">Numero de habitacion:</label>
            <input type="text" class="form-control" id="nroHabitacion" name="nroHabitacion" value="<?= $reserva['nroHabitacion'] ?>" required>
        </div>

        <div class="form-group mb-5">
            <label for="eliminada">Eliminado:</label>
            <select class="form-control" id="eliminada" name="eliminada" required>
                <option value="SI" <?= $reserva['eliminada'] === 'SI' ? 'selected' : '' ?>>Sí</option>
                <option value="NO" <?= $reserva['eliminada'] === 'NO' ? 'selected' : '' ?>>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
