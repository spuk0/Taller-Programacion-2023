<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/registro') ?>" class="btn btn-success mb-2">Agregar usuario</a>
	</div>
  <div class="mt-3">
     <table class="table table-bordered" id="users-list">
       <thead>
          <tr>
             <th>Id</th>
             <th>Nombre</th>
             <th>Email</th>
             <th>Accion</th>
          </tr>
       </thead>
       <tbody>
          <?php if($users): ?>
          <?php foreach($users as $user): ?>
          <tr>
             <td><?php echo $user['id']; ?></td>
             <td><?php echo $user['nombre']; ?></td>
             <td><?php echo $user['email']; ?></td>
             <td>
               <a href="<?php echo base_url('edit-view/'.$user['id']);?>" class="btn btn-primary btn-sm">Editar</a>
               <a href="<?php echo base_url('delete/'.$user['id']);?>" class="btn btn-danger btn-sm">Borrar</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
