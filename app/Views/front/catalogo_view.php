<div class="d-flex justify-content-center mt-3">
        <h1>Reservas disponibles</h1>
    </div>
    <div class="container mb-5
    ">
        <hr><br>
        <div class="row">
            <?php if (empty($reservas)) : ?>
            <p class="text-center">No hay reservas disponibles</p>
            <?php else : ?>
            <?php foreach($reservas as $reserva): ?>
            <div class="col-lg-3">
                <div class="card mb-5" style="width: 18rem; height:382px; max-height:382px">
                    <img src="<?=base_url()?>/assets/uploads/<?=$reserva['imagen']?>" class="card-img-top" alt=""
                        height="200">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $reserva['nombreReserva']?></h5>
                        <p class="card-text">
                            Reserva:
                            <?php foreach($tipos as $tipo): ?>
                            <?php if($reserva['tipo_id'] === $tipo['id']):?>
                            <?php echo $tipo['descripcion']?>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </p>

                        <?php if (session()->perfil_id == 1 || session()->perfil_id == 0): ?>

                        <?php if($reserva['stock'] > $reserva['stock_min'] ):?>
                        <p> Disponible
                        </p>

                        <p>
                            <?php 
                            echo form_open('carrito-agrega');
                            echo form_hidden ('id', $reserva['id']);
                            echo form_hidden ('precio_vta', $reserva['precio_vta']);
                            echo form_hidden ('nombreReserva', $reserva['nombreReserva']);
                        ?>
                        <div>
                            <?php 
                            $btn = array(
                                'class' => 'btn btn-dark',
                                'value' => 'Agragar al carrito',
                                'name' => 'action'
                            );
                            echo form_submit($btn);
                            echo form_close();
                        ?>
                        </div>
                        </p>
                                

                        <?php else : ?>
                        <p> <b>Agotado</b>
                        </p>
                        <?php endif;?>

                        <?php else : ?>
                        <a href="<?php echo base_url('login');?>" class="btn button-ordenarOnline">Ingresar para
                            reservar</a>
                        <?php endif ; ?>

                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <?php endif ; ?>
        </div>
    </div>
