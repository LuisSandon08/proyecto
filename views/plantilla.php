<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Pura Vida Indigena</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="views/img/logos/logo.png">

  <!--======= PLUGINGS DE CSS =========-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/AdminLTE.css">

  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="views/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <!--======= PLUGINGS DE JAVASCRIPT =========-->

<!-- jQuery 3 -->
<script src="views/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="views/bower_components/fastclick/lib/fastclick.js"></script>

  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script> 

  <script>
  </script> 

</head>

<body class="hold-transition skin-blue sidebar-mini login-page ">
  <?php 

    if(isset($_SESSION["iniciarsession"]) && $_SESSION["iniciarsession"] == "ok")
    {

    
      echo '<div class="wrapper">';

      include "modulos/header.php";
      include "modulos/mainbar.php";

      if (isset($_GET["ruta"])) {
        if ($_GET["ruta"] == "inicio" ||
            $_GET["ruta"] == "usuarios" ||
            $_GET["ruta"] == "categorias" ||
            $_GET["ruta"] == "productos" ||
            $_GET["ruta"] == "clientes" ||
            $_GET["ruta"] == "ventas" ||
            $_GET["ruta"] == "crear-ventas" ||
            $_GET["ruta"] == "reportes") 
        {
          include "modulos/".$_GET["ruta"].".php";
        } else {

            include "modulos/404.php";

        }
      } else {
        include "modulos/inicio.php";
      }

      include "modulos/footer.php";

      echo '</div>';
    } else {
      include "modulos/login.php";
    }
  ?>

    
  </div>
  <!-- ./wrapper -->

  <script src="views/js/plantilla.js"></script>
  
</body>
</html>
