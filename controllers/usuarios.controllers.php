<?php


class ControllersUsuarios{

    static publiC function ctrIngresoUsuario(){

        if(isset($_POST["ingUsuario"])){

            if (preg_match('/^[-a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
            preg_match('/^[-a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                $tabla = "usuarios";
                $item = "usuario";
                $valor = $_POST["ingUsuario"];
    
                $respuesta = ModeloUsuarios::MdlMostrarUsuarios( $tabla, $item, $valor);

                if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]){

                    $_SESSION["iniciarsession"] = "ok";

                    echo '<script>
                    
                    window.location = "inicio"

                    </script>';

                }else {
                    echo '<script>
                    
                    swal.fire ({
                        type: "error",
                        title: "¡ERROR! contraseña Y/O usuario incorrecto",
                        showConfirmButton: true,
                        confirmButtonText: "cerrar",
                        closeOnConfirm: false
    
                    }).then((result)=>{
                        window.location = "";
                    
                    })
    
                    </script>';
    
                }

            }

        }

    }

    # CREAR USUARIO

    static public function ctrCrearUsuario(){
        if (isset($_POST["nuevoUsuario"])) {

            if (preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[-a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[-a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

                    if(isset($_FILES["nuevaFoto"]["tmp_name"])){

                        list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                        $nuevoAncho = 500;
                        $nuevoAlto = 500;

                        // DIRECTORIO DE LA FOTO DEL USUARIO

                        $directorio = "views/img/users/".$_POST["nuevoUsuario"];

                        mkdir($directorio, 0755);

                        /********************************************/

                        if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

                            // nombre imagen

                            $aleatorio = mt_rand(100,999);
                            $ruta = "views/img/users/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                            $destino = imagecretetruecolor($nuevoAncho, $nuevoAlto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagejpeg ($destino, $ruta);

                        }

                    }


                    $tabla = "usuarios";
                    $datos = array("nombre" => $_POST["nuevoNombre"],
                                    "usuario" => $_POST["nuevoUsuario"], 
                                    "password" => $_POST["nuevoPassword"],
                                    "perfil" => $_POST["nuevoPerfil"]);

                    $res = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                    if($res == "ok"){
                        echo '<script>
                    
                        swal.fire({
                            type: "success",
                            title: "¡Usuario creado!",
                            showConfirmButton: true,
                            confirmButtonText: "cerrar",
                            closeOnConfirm: false

                        }).then ((result)=>{

                            if(result.value){

                                window.location = "usuarios";
        
                             }

                           

                        })
                    
                    </script>';
                    }


                } else {
                    echo '<script>
                    
                        swal.fire({
                            type: "error",
                            title: "¡El usuario no puede ir vacio o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "cerrar",
                            closeOnConfirm: false

                        }).then ((result)=>{

                            if(result.value){

                                window.location = "usuarios";
        
                             }

                           

                        })
                    
                    </script>';
                }

        }
    }

}