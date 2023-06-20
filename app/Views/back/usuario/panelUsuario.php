<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-5">       
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg')?>
                </div>
            <?php endif;?> 
            <h2>Bienvenido <?php echo $nombre;?></h2>
        </div>
    </div>
</div>