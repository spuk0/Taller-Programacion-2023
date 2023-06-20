    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                         
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                       <?= session()->getFlashdata('msg')?>
                    </div>
                <?php endif;?> 
                <!--Perfil-1 es admin-->
                <?php if(session()->perfil_id == 1): ?> 
                    <div class="mb-5">
                        <h3>Hola admin <?php echo $nombre;?></h3>   
                    </div>
                <!--Perfil-0 es usuario común-->
                <?php elseif(session()->perfil_id == 0): ?>   
                    <div class="mb-5">
                        <h3>Has iniciado sesion como <?php echo $nombre;?></h3>
                    </div>
                 <?php endif;?>
            </div>
        </div>
    </div>


