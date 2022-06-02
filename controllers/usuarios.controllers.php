<?php


class ControllersUsuarios{

    static publiC function ctrIngresoUsuario(){

        if(isset($_POST["ingUsuario"])){

            if (preg_match('/^[-a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
            preg_match('/^[-a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                $encrypt = crypt ($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $tabla = "usuarios";
                $item = "usuario";
                $valor = $_POST["ingUsuario"];
    
                $respuesta = ModeloUsuarios::MdlMostrarUsuarios( $tabla, $item, $valor);

                if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encrypt){

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

                    $ruta = "";

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

                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagejpeg ($destino, $ruta);

                        }

                        if($_FILES["nuevaFoto"]["type"] == "image/png"){

                            // nombre imagen

                            $aleatorio = mt_rand(100,999);
                            $ruta = "views/img/users/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

                            $origen = imagecreatefrompng  ($_FILES["nuevaFoto"]["tmp_name"]);

                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagepng ($destino, $ruta);

                        }

                    }


                    $encrypt = crypt ($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    $tabla = "usuarios";
                    
                    $datos = array("nombre" => $_POST["nuevoNombre"],
                                    "usuario" => $_POST["nuevoUsuario"], 
                                    "password" => $encrypt,
                                    "perfil" => $_POST["nuevoPerfil"],
                                    "foto" => $ruta);

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