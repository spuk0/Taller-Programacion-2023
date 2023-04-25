<!--======================HEADER======================-->
<header>
      <!--==========NAVBAR==========-->
      <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
          <img
            src="assets/img/icons/logo_empresa.png"
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
          id="navbarNav"
        >
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url("/");?>">Principal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("quienes-somos");?>">Quienes Somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("comercializacion");?>">Comercialización</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("contacto");?>">Contacto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("terminos-y-usos");?>">Términos y Usos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./pages/stats.html">Catálogo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./pages/stats.html">Consultas</a>
            </li>
          </ul>
        </div>
      </nav>
</header>