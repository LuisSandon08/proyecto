<?php

require_once '../controllers/usuarios.controllers.php';
require_once '../models/usuarios.models.php';



class AjaxUsuarios{


    // EDITAR USUARIO

    public $idUsuario;

    public function ajaxEditarUsuario(){

        $item = "id";
        $valor = $this->idUsuario;
        
        $res = ControllersUsuarios::CtrMostrarUsuarios($item, $valor);

        echo json_encode($res);

    }
}

// EDITAR USUARIO

if (isset($_POST["idUsuario"])){

    $editar = new AjaxUsuarios();
    $editar -> idUsuario = $_POST["idUsuario"];
    $editar -> ajaxEditarUsuario();
}