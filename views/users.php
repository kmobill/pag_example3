<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<div class="content-wrapper">
    <section id="contenedor" class="content">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="box">
                    <!-- header -->
                    <div class="box-header with-border"> 
                        <h1 class="box-title">Usuarios </h1>
                        <div class="box-tools pull-right">
                            <button class="btn btn-sm btn-success" id="btnAgregar" onclick="mostrar_formulario(true)">
                                <i class="fa fa-plus-circle"></i> Agregar
                            </button>
                        </div>
                    </div> 
                    <!-- /header -->
                    <!-- Encabezado de los paneles -->
                    <ul id="pnlUsuarios" class="nav nav-tabs col-xs-12 col-md-12 col-lg-12" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link" data-toggle="pill" href="#activos">Usuarios Activos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#inactivos">Usuarios Inactivos</a>
                        </li>
                    </ul>
                    <!-- Encabezado de los paneles -->
                    <!-- contenido de los paneles -->
                    <div class="tab-content col-xs-12 col-md-12 col-lg-12">
                        <div id="activos" class="container tab-pane active col-xs-12 col-md-12 col-lg-12"><br>
                            <div class="col-xs-2 box-tools pull-right">
                                <button class="btn btn-sm btn-github" id="btnInactivar">
                                    <i class="fa fa-plus-circle"></i> Inactivar Usuarios
                                </button>
                            </div>
                            <div class="col-xs-12 col-md-12 col-lg-12 panel-body table-responsive" id="listadoRegistros"><!-- listado de registros -->
                                <table id="tblListado" class="table table-condensed table-hover table-responsive">
                                    <thead>
                                    <th>Check</th> <!--espacio para botones-->
                                    <th>Acciones</th> <!--espacio para botones-->
                                    <th>Usuario</th>
                                    <th>Identificación</th>
                                    <th>Primer nombre</th>
                                    <th>Segundo nombre</th>
                                    <th>Primer apellido</th>
                                    <th>Segundo apellido</th>
                                    <th>Perfil</th>
                                    <th>Estado</th>
                                    </thead>
                                    <tbody>        
                                    </tbody>
                                    <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    </tfoot>
                                </table>
                            </div> <!-- /listado de registros -->
                        </div>

                        <div id="inactivos" class="container tab-pane fade col-xs-12 col-md-12 col-lg-12"><br>
                            <div class="col-xs-2 box-tools pull-right">
                                <button class="btn btn-sm btn-success" id="btnActivar">
                                    <i class="fa fa-plus-circle"></i> Activar
                                </button>
                            </div>
                            <div class="col-xs-12 col-md-12 col-lg-12 panel-body table-responsive" id="listadoRegistros1"><!-- listado de registros -->
                                <table id="tblListado1" class="table table-condensed table-hover table-responsive">
                                    <thead>
                                    <th>Check</th> <!--espacio para botones-->
                                    <th>Acciones</th> <!--espacio para botones-->
                                    <th>Usuario</th>
                                    <th>Identificación</th>
                                    <th>Primer nombre</th>
                                    <th>Segundo nombre</th>
                                    <th>Primer apellido</th>
                                    <th>Segundo apellido</th>
                                    <th>Perfil</th>
                                    <th>Estado</th>
                                    </thead>
                                    <tbody>        
                                    </tbody>
                                    <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    </tfoot>
                                </table>
                            </div> <!-- /listado de registros -->
                        </div>
                    </div>

                    <div class="panel-body" id="formularioRegistros"> <!-- formulario de registros -->
                        <br><br>
                        <form name="formulario" id="formulario" method="POST">
                            <div class="col-xs-1"></div>
                            <div class="col-xs-10">
                                <div class="col-xs-2"><label>Identificación</label></div>
                                <div class="col-xs-4">
                                    <input type="text" onkeypress="return onlyNumbers(event)" class="form-control" id="identificacion" name="identificacion" maxlength="10" placeholder="Ingrese identificación" required />
                                </div>
                                <div class="col-xs-2"><label>Primer nombre</label></div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="Name1" name="Name1" maxlength="50" placeholder="Ingrese primer nombre" required />
                                </div>
                                <div class="col-xs-2"><label>Segundo nombre</label></div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="Name2" name="Name2" maxlength="50" placeholder="Ingrese segundo nombre" />
                                </div>
                                <div class="col-xs-2"><label>Primer apellido</label></div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="Surname1" name="Surname1" maxlength="50" placeholder="Ingrese primer apellido" required />
                                </div>
                                <div class="col-xs-2"><label>Segundo apellido</label></div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="Surname2" name="Surname2" maxlength="50" placeholder="Ingrese segundo apellido" />
                                </div>
                                <div class="col-xs-2"><label>País</label></div>
                                <div class="col-xs-4">
                                    <select class="form-control" id="country" name="country" required>
                                        <option></option>
                                        <option>COLOMBIA</option>
                                        <option>ECUADOR</option>
                                        <option>VENEZUELA</option>
                                    </select>
                                </div>
                                <div class="col-xs-2"><label>Ciudad</label></div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="city" name="city" required />
                                </div>
                                <div class="col-xs-2"><label>Género</label></div>
                                <div class="col-xs-4">
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option></option>
                                        <option>FEMENINO</option>
                                        <option>MASCULINO</option>
                                    </select>
                                </div>
                                <div class="col-xs-2"><label>Fecha de nacimiento</label></div>
                                <div class="col-xs-4">
                                    <input type="date" class="form-control" id="fecha" name="fecha" required />
                                </div>
                                <div class="col-xs-2"><label>Dirección</label></div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="adress" name="adress" maxlength="120" placeholder="Ingrese dirección" required />
                                </div>
                                <div class="col-xs-2"><label>Celular</label></div>
                                <div class="col-xs-4">
                                    <input pattern="^09(\d{8})$" onkeypress="return onlyNumbers(event)" type="text" class="form-control" id="celular" name="celular" maxlength="120" placeholder="Ingrese celular" required />
                                </div>
                                <div class="col-xs-2"><label>Teléfono convencional</label></div>
                                <div class="col-xs-4">
                                    <input pattern="^0[2-9](\d{7,8})$" onkeypress="return onlyNumbers(event)" type="text" class="form-control" id="telefono" name="telefono" maxlength="120" placeholder="Ingrese teléfono convencional" />
                                </div>
                                <div class="col-xs-2"><label>Correo</label></div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="correo" name="correo" maxlength="120" placeholder="Ingrese correo" required />
                                </div>
                                <div class="col-xs-2"><label>Perfil</label></div>
                                <div class="col-xs-4">
                                    <select class="form-control" id="UserGroup" name="UserGroup" required>
                                        <?php
                                        require '../config/connection.php';
                                        $result = ejecutarConsulta("SELECT Id, Description FROM workgroup");
                                        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                            echo '<option value="' . $row["Id"] . '">' . $row["Description"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3"><br></div>
                            <div id="pnlUser" class="col-xs-6"><br><br>
                                <div class="col-xs-4"><label>Usuario</label></div>
                                <div class="col-xs-8 input-group">
                                    <input type="text" class="form-control" id="Id" name="Id" maxlength="120" placeholder="Ingrese usuario" required/>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                                <div class="col-xs-4"><label>Contraseña</label></div>
                                <div class="col-xs-8 input-group">
                                    <input id="Password" name="Password" maxlength="80" class="form-control" type="password" placeholder="Contraseña" required/>
                                    <span id="show-hide-passwd" action="hide" class="input-group-addon"><i id="iconEye" class="fa fa-eye"></i><i id="iconEyeSlash" class="fa fa-eye-slash"></i></span>
                                </div>
                                <div class="col-xs-12 hidden">
                                    <input type="text" class="form-control" id="validar" name="validar" />
                                    <input type="text" class="form-control" id="IdUser" name="IdUser" />
                                    <input type="text" class="form-control" id="mensaje" name="mensaje" />
                                </div>
                            </div>
                            <div class="col-xs-12 text-center"><br/>
                                <button id="btnMostrar" class="btn btn-github btn-sm" onclick="mostrarUsuarioClave()" type="button"><i class="fa fa-arrow-circle-left"></i> Mostrar usuario y contraseña</button>
                                <button id="btnGenerar" class="btn btn-github btn-sm" onclick="generarUsuario()" type="button"><i class="fa fa-arrow-circle-left"></i> Generar usuario y contraseña</button>
                                <button id="btnGuardar" class="btn btn-primary btn-sm" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                                <button class="btn btn-danger btn-sm" onclick="cancelar_formulario()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                <br><br>
                            </div>
                        </form>
                    </div> <!-- /formulario de registros -->
                </div>
            </div>
    </section>
</div><!-- /.content-wrapper -->

<?php require 'footer.php'; ?>
<script src="scripts/frontUsers.js" type="text/javascript"></script>
<script src="scripts/funcions.js" type="text/javascript"></script>