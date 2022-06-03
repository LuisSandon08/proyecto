<header class="main-header">
      <!-- Logo -->
      <a href="inicio" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img class="img-responsive" style="padding: 2px;" src="views/img/logos/logo.png" ></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img class="img-responsive" style="padding: 10px 0px;" src="views/img/logos/pura-vida-indigena-h.png" ></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <?php
                
                  if ($_SESSION["foto"] != ""){
                    echo '<img src="'.$_SESSION["foto"].'" class="user-image" alt="User Image">';
                  } else {

                    echo '<img src="views/img/users/avatar.png" class="user-image" alt="User Image">';

                  }
                
                ?>

                <span class="hidden-xs"> <?php echo $_SESSION["nombre"]; ?> </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                <?php
                
                  if ($_SESSION["foto"] != ""){
                    echo '<img src="'.$_SESSION["foto"].'" class="user-image" alt="User Image">';
                  } else {

                    echo '<img src="views/img/users/avatar.png" class="user-image" alt="User Image">';

                  }
                
                ?>

                  <p>
                    <?php echo $_SESSION["nombre"]; ?>
                    <small><?php echo $_SESSION["perfil"]; ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="salir" class="btn btn-default btn-flat">Salir</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
            </li>
          </ul>
        </div>
      </nav>
    </header>