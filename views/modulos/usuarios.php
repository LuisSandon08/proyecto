<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

       Administrar Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>INICIO</a></li>
        <li class="active">Administrar usuarios</li>
      </ol>
    </section>

    <section class="content">

      <div class="box">
        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">

            Agregar Usuario

          </button>

        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped tablas">

          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Ultimo login</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>

            <?php 

              $valor = null;
              $item = null;
              $usuarios = ControllersUsuarios::ctrMostrarUsuarios($item, $valor);

              foreach ($usuarios as $key => $value){
                echo '
                <tr>
                  <td>'.$value["id"].'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>';

                  if ($value["foto"] != ""){
                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px" alt=""></td>';
                  }else {
                    echo '<td><img src="views/img/users/avatar.png" class="img-thumbnail" width="40px" alt=""></td>';
                  }
                  
                  echo '<td>'.$value["perfil"].'</td>
                  <td><button class="btn btn-success btn-xs">Activado</button></td>
                  <td>'.$value["ultimo_login"].'</td>
                  <td>
    
                    <div class="btn-group">
                        <botton class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></botton>
                        <botton class="btn btn-danger"><i class="fa fa-times"></i></botton>
                    </div>
    
                  </td>
                
                </tr>';
                
              }

            ?>
          </tbody>

          </table>
        </div>

      </div>
    </section>
  </div>

  <!-- MODAL AGREGAR USUARIO -->

  <div class="modal fade" id="modalAgregarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog">

      <form role="form" method="POST"  enctype="multipart/form-data">

        <div class="modal-content">


          <div class="modal-header" style="background: #3c8dbc; color: white">

          <button type="button" class="close" style="color: white; opacity: 1;" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="staticBackdropLabel">Agregar Usuario</h4>

          </div>


          <div class="modal-body">

            <div class="box-body">

                <!-- ingresar nombre -->
                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    
                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>

                  </div>

                </div>

                <!-- usuario -->
                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" required>

                  </div>

                </div>

                <!-- contraseña -->
                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                    <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required>

                  </div>

                </div>

                <!-- PERFIL -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                    <select name="nuevoPerfil" class="form-control input-lg">
                      <option value="">seleccionar Perfil</option>
                      <option value="Administrador">Administrador</option>
                      <option value="Cliente">Cliente</option>
                      <option value="Vendedor">Vendedor</option>
                      <option value="Asesor Virtual">Asesor virtual</option>
                    </select>

                  </div>

                </div>
                <!-- subir foto -->
              <div class="form-group">

                <div class="panel">
                    SUBIR FOTO
                </div>

                <input type="file" class="nuevaFoto" name="nuevaFoto">

                <p class="help-block">peso maximo de la foto 2MB</p>

                <img src="views/img/users/avatar.png" class="img-thumbnail previsualizar" width="100px">

              </div>

            </div>

          </div>

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Usuario</button>

          </div>

          <?php

          $crearUsuario = new ControllersUsuarios();
          $crearUsuario -> ctrCrearUsuario();
          
          ?>

      </form>

    </div>

  </div>

</div>

  <!-- MODAL EDITAR USUARIO -->

  <div class="modal fade" id="modalEditarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog">

      <form role="form" method="POST"  enctype="multipart/form-data">

        <div class="modal-content">


          <div class="modal-header" style="background: #3c8dbc; color: white">

            <button type="button" class="close" style="color: white; opacity: 1;" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="staticBackdropLabel">Editar Usuario</h4>

          </div>


          <div class="modal-body">

            <div class="box-body">

                <!-- ingresar nombre -->
                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    
                    <input type="text" class="form-control input-lg" id="editarNombre" value="" required>

                  </div>

                </div>

                <!-- usuario -->
                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="text" class="form-control input-lg" id="editarUsuario" value="" readonly>

                  </div>

                </div>

                <!-- contraseña -->
                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                    <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Nueva Contraseña" required>

                    <input type="hidden" id="passwordActual" name="passwordActual">

                  </div>

                </div>

                <!-- PERFIL -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                    <select name="editarPerfil" class="form-control input-lg">
                      <option value="" id="editarPerfil"></option>
                      <option value="Administrador">Administrador</option>
                      <option value="Cliente">Cliente</option>
                      <option value="Vendedor">Vendedor</option>
                      <option value="Asesor Virtual">Asesor virtual</option>
                    </select>

                  </div>

                </div>
                <!-- subir foto -->
              <div class="form-group">

                <div class="panel">
                    SUBIR FOTO
                </div>

                <input type="file" class="nuevaFoto" name="editarFoto">

                <p class="help-block">peso maximo de la foto 2MB</p>

                <img src="views/img/users/avatar.png" class="img-thumbnail previsualizar" width="100px">

                <input type="hidden" name="fotoActual" id="fotoActual">

              </div>

            </div>

          </div>

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Modificar Usuario</button>

          </div>

          <?php

          $editarUsuario = new ControllersUsuarios();
          $editarUsuario -> ctrEditarUsuario();
          
          ?>

      </form>

    </div>

  </div>

</div>

