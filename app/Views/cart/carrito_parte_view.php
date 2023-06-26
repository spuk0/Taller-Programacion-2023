<div class="container-fluid productos-destacados" id="carrito">
    <div class="cart" >
        <div class = "heading">
            <h2 id="h3" align="center">Productos en tu Carrito</h2>
        </div>
        <div class="text" align="center"> 
          <?php 
               
               $session=session();
               $cart = \Config\Services::cart();
               $cart = $cart->contents();
              
            // Si el carrito está vacio, mostrar el siguiente mensaje
            if (empty($cart)) 
            {
                echo 'Para agregar productos al carrito, click en "Comprar"';
            }  
            ?>    
        </div>
    </div>
  <table class="table table-hover table-dark table-responsive-md" border="0" cellpadding="5px" cellspacing="1px">
        <!--table class="table table-striped"-->
          <?php // Todos los items de carrito en "$cart".
         
             // if ($cart = $this->cart->contents()): //Esta función devuelve un array de los elementos agregados en el carro 
            if ($cart == TRUE):?>
                <div class="container">
                <div class="table-responsive-sm">
                <table class="table table-bordered table-hover table-dark table-striped ml-3">
                 <tr>
                    <td>ID</td>
                    <td>nombre_prod</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Total</td>
                    <td>Cancelar Producto</td>
                </tr>

            <?php // Crea un formulario y manda los valores a carrito_controller/actualiza carrito
            echo form_open('carrito_actualiza');//ruta
                $gran_total = 0;
                $i = 1; //
               // foreach ($this->cart->contents() as $items): 
                 foreach ($cart as $item):
                  //  echo "<table class='table table-striped'>";
                    echo  form_hidden('cart[' . $item['id'] . '][id]', $item['id']); 
                    echo  form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']); 
                    echo  form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                    echo  form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                    echo  form_hidden('cart[' . $item['id'] .'][qty]', $item['qty']);
            ?>
                    <tr>
                        <td> <?php echo $i++; ?>  </td>
                        <td> <?php echo $item['name']; ?>   </td>
                        <td>$ <?php echo number_format($item['price'], 2); ?>   </td>
                        <td>  <?php echo $item ['qty']; ?>  </td>
                                   
                            <?php $gran_total = $item['price'] * $item['qty']; ?>

                        <td> $ <?php echo number_format($item['subtotal'], 2) ?>    </td>
                        <td> 
                       <?php // Imagen
                          $path = '<img src='. base_url('/assets/img/icons/logo_empresa.png') . 'width="25px" height="20px">';
                            echo anchor('carrito_elimina/'. $item['rowid'], $path); 
                            ?>
                        </td>
                    </tr>
                <?php 
                endforeach;     ?>
              <tr class="table-light">
                   <td colspan="5"> 
                        <b>Total: $
                            <?php //Gran Total
                            echo number_format($gran_total, 2); 
                            ?>
                        </b>
                    </td> 
                    <td colspan="5" align="center">
                 <!-- Borrar carrito usa mensaje de confirmacion javascript implementado en head_view -->
                     <input type="button" class ='btn btn-primary btn-lg' value="Borrar Carrito" onclick="window.location = 'borrar'">
                        <!-- Submit boton. Actualiza los datos en el carrito -->
                        <!--input type="submit" class ='btn btn-primary btn-lg' value="Actualizar"-->
                        <!-- " Confirmar orden envia a carrito_controller/muestra_compra  -->
                        <input type="button" class ='btn btn-primary btn-lg' value="comprar" onclick="window.location = 'carrito-comprar'">
                    </td>
                </tr>
                <?php echo form_close();
			
            endif; ?>
        </table>
    </div>
</div>
<br>