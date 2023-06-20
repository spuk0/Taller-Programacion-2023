<div class="contacto">
    <form method="post" class="form-contact mt-5 d-flex justify-content-center" action="<?php echo base_url() ?>/Contacto_controller/sendMessage">
        <div class="container-fluid">
            <div class="text-center">
                <h3 class="text-dark">Contáctanos</h3>
                <img src="assets/img/icons/h-icon.svg" width="40" class="lead">
            </div>
            <div class="d-flex justify-content-center">
                <div class="form-contact-body col-md-5 p-1">
                        <div>
                            <label for="name" class="form-label">Nombre:</label>
                            <input id="name" value="<?php echo set_value('name')?>" type="text" name="name" class="form-control" placeholder="Tu nombre" required>
                        </div>
                        <div class="mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" value="<?php echo set_value('email')?>" type="text" name="email" class="form-control" placeholder="Tu email" required>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea id="message" value="<?php echo set_value('message')?>" name="message" cols="20" rows="6" class="form-control"
                                placeholder="Escribenos un mensaje..."></textarea>
                        </div>
                        <input type="submit" value="Enviar" class="mb-3 btn btn-primary btn-custom">
                </div>
            </div>
        </div>
    </form>
</div>