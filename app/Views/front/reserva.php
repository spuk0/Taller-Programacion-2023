<div class="container-fluid mt-5 mb-5">
    <section class="text-justify">
        <h2 class="text-center">Aqui puedes ver y reservar nuestras habitaciones</h3>
        <hr>
            <article class="mision d-flex flex-column align-items-center">
                <h3>Habitación doble.</h3>
                <div class="container row align-items-center mt-4">
                    <img class="img-fluid rounded col-sm-6" style="width: 30rem;" src="assets/img/hotel/habitacion4.jpg" alt="imagen habitacion una o dos personas">
                    <div class="col-sm-6 text-center">
                        <p>Una habitación asignada a una o dos personas</p>
                    <?php if (session()->perfil_id == null): ?>
                            <!--Usuario no registrado-->
                            <a href="<?php echo base_url("login");?>" class="btn btn-primary mt-3">Inicia sesion para hacer la reserva</a>
                            <div class="mt-5">
                                <p>¿No tienes cuenta?. <a href="<?php echo base_url("registro");?>">Registrate</a></p>
                            </div>
                        <?php else: ?>
                            <!--Usuarios logueado -->
                            <a href="<?php echo base_url("reservacion");?>" class="btn btn-dark mt-3">RESERVAR</a>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
            <hr>
            <article class="d-flex flex-column align-items-center">
                <h3>Habitación triple.</h3>
                <div class="container row align-items-center mt-4">
                    <div class="col-sm-6 text-center">
                    <p>Una habitación asignada a tres personas.</p>
                    <?php if (session()->perfil_id == null): ?>
                            <!--Usuario no registrado-->
                            <a href="<?php echo base_url("login");?>" class="btn btn-primary mt-3">Inicia sesion para hacer la reserva</a>
                            <div class="mt-5">
                                <p>¿No tienes cuenta?. <a href="<?php echo base_url("registro");?>">Registrate</a></p>
                            </div>
                        <?php else: ?>
                            <!--Usuarios logueado -->
                            <a href="<?php echo base_url("reservacion");?>" class="btn btn-dark mt-3">RESERVAR</a>
                        <?php endif; ?>
                    </div>
                    <img class="img-fluid rounded col-sm-6" style="width: 30rem;" src="assets/img/hotel/habitacion3.jpg" alt="imagen habitacion tres personas">
                </div>
            </article>
            <hr>
            <article class="d-flex flex-column align-items-center">
                <h3>Habitación estudio.</h3>
                <div class="container row align-items-center mt-4 mb-4">
                    <img class="img-fluid rounded col-sm-6" style="width: 25rem;" src="assets/img/hotel/habitacion6.jpg" alt="imagen habitacion con escritorio">
                    <div class="col-sm-6 text-center">
                        <p>Una habitación asignada a una o dos personas, con escritorio y wi-fi más potente. Especial para estudiantes o trabajadores home-office.</p>
                        <?php if (session()->perfil_id == null): ?>
                            <!--Usuario no registrado-->
                            <a href="<?php echo base_url("login");?>" class="btn btn-primary mt-3">Inicia sesion para hacer la reserva</a>
                            <div class="mt-5">
                                <p>¿No tienes cuenta?. <a href="<?php echo base_url("registro");?>">Registrate</a></p>
                            </div>
                        <?php else: ?>
                            <!--Usuarios logueado -->
                            <a href="<?php echo base_url("reservacion");?>" class="btn btn-dark mt-3">RESERVAR</a>
                        <?php endif; ?>
                    </div>                
                </div>
            </article>    
    </section>
</div>

