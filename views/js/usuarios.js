// SUBIR FOTO DE USUARIO

$(".nuevaFoto").change(function() {

    var imagen = this.files[0];

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "image/jpg") {

        $(".nuevaFoto").val("");
        swal.fire({
            icon: 'error',
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPEG o PNG!",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevaFoto").val("");
        swal.fire({
            icon: 'error',
            title: "Error al subir la imagen",
            text: "¡La imagen debe pesar menos de 2MB!",
            confirmButtonText: "¡Cerrar!"
        });
    } else {
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event) {
            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);
        })
    }

})

// EDITAR USUARIO

$(".btnEditarUsuario").click(function() {
    var idUsuario = $(this).attr("idUsuario");

    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({

        url: "ajax/usuario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);
            $("#passwordActual").val(respuesta["password"]);
            $("#fotoActual").val(respuesta["foto"]);


            if (respuesta["perfil"] != "") {
                $(".previsualizar").attr("src", respuesta["foto"])
            }
        }

    });
})


// subir ahora