<div class="container mt-4 reservas-destacados">
    <div class="d-flex justify-content-end">
        <a href="<?= site_url('/reservas-list') ?>" class="btn btn-success mb-2">Lista de reservas</a>
    </div>
    <div class="mt-3">
        <table class="table table-bordered" id="reservas-list">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Precio de venta</th>
                    <th>Stock</th>
                    <th>Stock mínimo</th>
                    <th>Num. de habitacion</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($reservas): ?>
                    <?php foreach ($reservas as $reserva): ?>
                        <tr>
                            <?php if($reserva['eliminada'] == 'SI'): ?>
                            <td><?= $reserva['id'] ?></td>
                            <td><?= $reserva['nombreReserva'] ?></td>
                            <td><img src="<?=base_url()?>/assets/uploads/<?=$reserva['imagen']?>" alt="<?= $reserva['nombreReserva'] ?>" style="width: 100px; height: auto;"></td>
                            <td><?= $reserva['tipo_id'] ?></td>
                            <td><?= $reserva['precio'] ?></td>
                            <td><?= $reserva['precio_vta'] ?></td>
                            <td><?= $reserva['stock'] ?></td>
                            <td><?= $reserva['stock_min'] ?></td>
                            <td><?= $reserva['nroHabitacion'] ?></td>
                            <td>
                                <a href="<?= base_url('activarReserva/'.$reserva['id']) ?>" class="btn btn-primary btn-sm">Activar</a>
                                <!--<form action="<?= base_url('borrarReserva/'.$reserva['id']) ?>" method="POST">
                                    <input type="hidden" name="_method" value="PATCH">
                                    <button type="submit" class="btn btn-danger btn-sm">Deshabilitar</button>
                                </form>-->
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>