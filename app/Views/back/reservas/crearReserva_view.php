<div class="container mt-5 productos-destacados">
    <h2>Agregar habitacion que podra ser reservada</h2>
    <form method="post" action="<?php echo base_url() ?>/Reservas_controller/store" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombreReserva">Nombre de la habitación:</label>
            <input type="text" class="form-control" id="nombreReserva" name="nombreReserva" value="<?php echo set_value('nombreReserva')?>" required>
        </div>
        <div class="form-group">
            <label for="descripcionReserva">Descripción:</label>
            <textarea class="form-control" id="descripcionReserva" name="descripcionReserva" value="<?php echo set_value('descripcionReserva')?>" rows="3"></textarea>
        </div>
        
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" class="form-control-file" id="imagen" name="imagen" required>
        </div>

        <div class="form-group">
            <label for="tipo_id">Tipo de habitacion:</label>
            <select name="tipo_id" id="tipo_id" class="form-control" required>
                <option value="">Seleccionar tipo de habitacion</option>
                <?php foreach ($tipos as $tipo){ ?>
                    <option value="<?php echo $tipo['id'];?>">
                        <?php echo $tipo['id'], ".", $tipo['descripcion'];}?>
                    </option>
            </select>
        </div>

        <!--
        <div class="form-group">
            <label for="tipo_id">Tipo de habitacion:</label>
            <input type="text" class="form-control" id="tipo_id" name="tipo_id" value="<?php echo set_value('tipo_id')?>" required>
        </div>-->
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" value="<?php echo set_value('precio')?>" required>
        </div>
        <div class="form-group">
            <label for="precio_vta">Precio de venta:</label>
            <input type="number" class="form-control" id="precio_vta" name="precio_vta" value="<?php echo set_value('precio_vta')?>" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo set_value('stock')?>" required>
        </div>
        <div class="form-group">
            <label for="stock_min">Stock mínimo:</label>
            <input type="number" class="form-control" id="stock_min" name="stock_min" value="<?php echo set_value('stock_min')?>" required>
        </div>
        <div class="form-group">
            <label for="nroHabitacion">Numero de habitacion:</label>
            <input type="text" class="form-control" id="nroHabitacion" name="nroHabitacion" value="<?php echo set_value('nroHabitacion')?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
