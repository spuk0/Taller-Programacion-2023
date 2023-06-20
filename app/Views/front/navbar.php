<!--======================HEADER======================-->
<header>
      <!--==========NAVBAR==========-->
      <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
          <img
            src="<?php echo base_url("assets/img/icons/logo_empresa.png");?>"
            class="navbarLogo"
            alt="logoEmpresa"
            width="40";
          />
        </a>
        <!--BurguerButton-->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <!--Content, data-bs-toggle direction by id-->
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarSupportedContent"
        >
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url("/");?>">Principal</a>
            </li>
            
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Conocenos
          </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo base_url("quienes-somos");?>">Quiénes somos</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url("comercializacion");?>">Comercialización</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?php echo base_url("terminos-y-usos");?>">Términos y usos</a></li>
            </ul>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("reservacion");?>">Reservación</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("contacto");?>">Contacto</a>
            </li>
            <?php if (session()->perfil_id == null): ?>
              <!--Usuario no registrado-->
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("login");?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff8c}</style><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg></a>
              </li>
                <?php elseif (session()->perfil_id == 1): ?>
                    <!-- Usuario Administrador -->
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url('users-list');?>">CRUD Usuarios</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url('logout');?>">Salir</a>
                      </li>
                <?php else: ?>
                    <!--Usuarios logueado -->
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url('carrito-compras');?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff8c}</style><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url('logout');?>">Salir</a>
                      </li>
                <?php endif; ?>
          </ul>
        </div>
      </nav>
</header>