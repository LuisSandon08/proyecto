<?php

require_once 'controllers/plantilla.controllers.php';
require_once 'controllers/usuarios.controllers.php';
require_once 'controllers/productos.controllers.php';
require_once 'controllers/ventas.controllers.php';
require_once 'controllers/clientes.controllers.php';
require_once 'controllers/categorias.controllers.php';

require_once 'models/usuarios.models.php';
require_once 'models/productos.models.php';
require_once 'models/ventas.models.php';
require_once 'models/clientes.models.php';
require_once 'models/categorias.models.php';

$plantilla = new ControllersPlantilla();

$plantilla -> ctrPlantilla();