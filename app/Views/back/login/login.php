  <!--recuperamos datos con la función Flashdata para mostrarlos-->
  <?php if (session()->getFlashdata('msg')) {
      echo "
        <div class='mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-success alert-dismissible'>
          <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('msg') . "
        </div>";
    } ?>
</div>
   <!-- php $validación = \Config\Services::validación(); Esto carga automáticamente el archivo Config\Validation que contiene configuraciones para incluir múltiples conjuntos de reglas -->
    <?php $validation = \Config\Services::validation(); ?>

<div class="container mt-5 mb-5 d-flex justify-content-center">
  <div class="card" style="width: 50%;">
    <div class="card-header text-center">
      <!-- titulo del formulario-->
      <h2>Ingresar como usuario</h2>
    </div>
      <!-- envio de datos a la ruta /enviar-form -->
    <form method="post" action="<?php echo base_url(); ?>Login_controller/auth">
      <div class="card-body" media="(max-width:768px)">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" value="<?php echo set_value('email')?>"  placeholder="correo@algo.com">
          <!-- Aca falta un error para validacion -->
        </div>
        <div class="mb-3">
          <label for="pass" class="form-label">Password</label>
          <input name="pass" type="password" class="form-control" placeholder="contraseña">
          <!-- Aca falta un error para validacion -->
        </div>
        <div>
          <button type="submit" class="btn btn-success">Ingresar</button>
          <input type="reset" value="Cancelar" class="btn btn-danger">
        </div>
        <div class="mt-2 mb-1">
          <p>¿No tenés cuenta?.</p>
          <p><a href="<?php echo base_url("registro");?>">REGISTRATE</a></p>
        </div>
      </div>
    </form>
  </div>
</div>