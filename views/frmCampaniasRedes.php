<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<div class="content-wrapper">
    <section id="contenedor" class="content">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="box">
                    <!-- header -->
                    <div class="box-header with-border"> 
                        <h1 class="box-title">Gestión Redes Sociales</h1>
                        <div class="box-tools pull-right">
                            <button class="btn btn-info" id="btnNuevaGestion" type="button" value="Nueva Gestión"><i class="fa fa-plus"></i> Nueva Gestión</button>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12" id="divFiltros"><br><br>
                        <div class="col-md-3 col-sm-3">
                            <label for="txtCoop"><b>Seleccione Cooperativa</b></label>
                            <select id="txtCoop" name="txtCoop" class="form-control" required>
                                <option></option>
                                <?php
                                require '../config/connection.php';
                                $result = ejecutarConsulta14("SELECT Descripcion FROM institucionesfinancieras where estado='1' ORDER BY Descripcion");
                                while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                    echo '<option value="' . $row["Descripcion"] . '">' . $row["Descripcion"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <label for="txtFechaInicio"><b>Fecha desde</b></label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input autocomplete="off" type="text" class="form-control pull-right" id="txtFechaInicio" name="txtFechaInicio">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <label for="txtFechaFin"><b>Fecha hasta</b></label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input autocomplete="off" type="text" class="form-control pull-right" id="txtFechaFin" name="txtFechaFin">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <br>
                            <button class="btn btn-bitbucket" id="btnBuscar" type="button" >Buscar</button>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <br>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12" id="divContenido">
                        <div class="panel-body table-responsive" id="listadoRegistros"> <!-- listado de registros -->
                            <table id="tblListado" class="table table-condensed table-hover table-responsive">
                                <thead>
                                <th>Num</th>
                                <th>Cooperativa</th>
                                <th>Usuario</th>
                                <th>Fecha gestión</th>
                                <th>Celular</th>
                                <th>Nombre del cliente</th>
                                <th>Estado Conversación</th>
                                <th>Motivo Mensaje</th>
                                <th>Submotivo Mensaje</th>
                                <th>Acciones</th> <!--espacio para botones-->
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

                        <div class="panel-body" id="formularioRegistros"> <!-- formulario de registros -->
                            <form name="formulario" id="formulario" method="POST" class="">
                                <div class="box box-widget bg-gray-light">
                                    <div class="box-header with-border bg-gray">
                                        <div class="col-xs-3 text-left"> <span class="text-bold">Redes Sociales</span> </div>
                                        <div class="col-xs-1 text-left"> <span class="text-bold">Asesor/a:</span> </div>
                                        <div class="col-xs-2 text-left"> <span class="text-right"> <?php echo($_SESSION['name']); ?> </span> </div>
                                        <div class="col-xs-1 text-left"> <span class="text-bold">Fecha:</span> </div>
                                        <div class="col-xs-2 text-left"> <span id="mostrarHora" class="text-right"></span></div>
                                        <div class="box-tools">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <input type="text" class="form-control input-sm hidden" id="IDC" name="IDC" readonly/>
                                        <input type="text" class="form-control input-sm hidden" id="fechaInicio" name="fechaInicio" readonly/>
                                        <!---------------------------------------------------------BLOQUE A---------------------------------------------------->
                                        <div class="col-xs-12 text-center box box-widget bg-gray-light"><b class="text-center">BLOQUE A - Datos de la llamada </b></div>
                                        <div class="divTable">
                                            <div class="divTableBody">
                                                <div class="col-xs-3 col-md-3">
                                                    <div class="divTableCell"><label class="text-light-blue">Nombre Cooperativa</label></div>
                                                    <div class="divTableCell">
                                                        <select id="txtCooperativa" name="txtCooperativa" class="form-control" required>
                                                            <option></option>
                                                            <?php
                                                            require '../config/connection.php';
                                                            $result = ejecutarConsulta14("SELECT Descripcion FROM institucionesfinancieras where estado='1' ORDER BY Descripcion");
                                                            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                                                echo '<option value="' . $row["Descripcion"] . '">' . $row["Descripcion"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <div class="divTableCell"><label class="text-light-blue">Tipo de Red Social</label></div>
                                                    <div class="divTableCell">
                                                        <select id="txtTipoRedSocial" name="txtTipoRedSocial" class="form-control" required>
                                                            <option value=""></option>
                                                            <option>WhatsApp</option>
                                                            <option>Messenger</option>
                                                            <option>Instagram</option>
                                                            <option>Página Web</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <div class="divTableCell"><label class="text-light-blue">Tipo de cliente</label></div>
                                                    <div class="divTableCell">
                                                        <select id="txtTipoCliente" name="txtTipoCliente" class="form-control" required>
                                                            <option value=""></option>
                                                            <option>Cliente</option>
                                                            <option>Asesor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3">
                                                    <label for="txtFechaGestion"><b>Fecha gestión</b></label>
                                                    <input type="text" class="form-control" id="txtFechaGestion" name="txtFechaGestion" required/>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <div class="divTableCell"><label class="text-light-blue">Estado conversación</label></div>
                                                    <div class="divTableCell">
                                                        <select id="txtEstadoConversacion" name="txtEstadoConversacion" class="form-control" required>
                                                            <option>Activa</option>
                                                            <option>Finalizada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="divTableBody">
                                                    <div class="col-xs-2 col-md-2">
                                                        <label class="text-light-blue">Celular del cliente</label>
                                                        <input onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtCelular" name="txtCelular" maxlength="15"/>
                                                    </div>
                                                    <div class="col-xs-3 col-md-3">
                                                        <label class="text-light-blue">Nombre del cliente</label>
                                                        <input type="text" class="form-control input-sm" id="txtNombreCliente" name="txtNombreCliente" maxlength="150" required/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <div class="divTableCell"><label class="text-light-blue">Cantidad de mensajes</label></div>
                                                    <div class="divTableCell">
                                                        <input type="number" class="form-control" id="txtCantidadMensajes" name="txtCantidadMensajes">
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <div class="divTableCell"><label class="text-light-blue">Mensaje (Subir imagen)</label></div>
                                                    <div class="divTableCell">
                                                        <!--<textarea class="form-control input-sm" id="txtMensaje" name="txtMensaje" rows="2" maxlength="500"></textarea>-->
                                                        <input type="file" class="form-control" id="image" name="image" multiple>
                                                    </div>
                                                </div>
                                                <div class="col-xs-1 col-md-1">
                                                    <div class="divTableCell"><label class="text-light-blue">Vista previa</label></div>
                                                    <div class="divTableCell">
                                                        <button id="btnVistaPrevia" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVistaPrevia">Visualizar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="pnlMensajes">
                                            <!---------------------------------------------------------BLOQUE B---------------------------------------------------->
                                            <div class="col-xs-12 text-center box box-widget bg-gray-light"><br><b class="text-center">BLOQUE B - Registro estado del mensaje</b></div>
                                            <div class="col-xs-12 col-md-12"></div>
                                            <div class="col-xs-3 col-md-3">
                                                <div class="divTableCell"><label class="text-light-blue">Motivo del mensaje</label></div>
                                                <div class="divTableCell">
                                                    <select id="txtMotivoMensaje" name="txtMotivoMensaje" class="form-control">
                                                        <option></option>
                                                        <?php
                                                        require '../config/connection.php';
                                                        $result = ejecutarConsulta14("SELECT DISTINCT MOTIVO FROM resultadosdegestionredes where estado='1' ORDER BY MOTIVO");
                                                        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                                            echo '<option value="' . $row["MOTIVO"] . '">' . $row["MOTIVO"] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <label class="text-light-blue">Submotivo de la Mensaje</label>
                                                <select id="txtSubmotivoMensaje" name="txtSubmotivoMensaje" class="form-control">
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="col-xs-5 col-md-5">
                                                <div class="divTableCell"><label class="text-light-blue">Observaciones generales</label></div>
                                                <div class="divTableCell">
                                                    <textarea class="form-control input-sm" id="txtObservaciones" name="txtObservaciones" rows="2" maxlength="500"></textarea>
                                                </div>
                                            </div>
                                            <!---------------------------------------------------------BLOQUE C---------------------------------------------------->
                                            <div class="col-xs-12 text-center box box-widget bg-gray-light"><br><b class="text-center">BLOQUE C - Estado del cliente</b></div>
                                            <div class="divTable text-center">
                                                <div class="divTableBody">
                                                    <div class="col-xs-3 col-md-3"></div>
                                                    <div class="col-xs-2 col-md-2"><label class="text-light-blue">Estado del cliente</label></div>
                                                    <div class="col-xs-4 col-md-4">
                                                        <select id="txtEstadoCliente" name="txtEstadoCliente" class="form-control">
                                                            <option value=""></option>
                                                            <option>Positivo</option>
                                                            <option>Negativo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 text-center">                        
                                        <button class="btn btn-success btn-sm" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar Gestión</button>
                                        <button class="btn btn-danger btn-sm" onclick="cancelar_formulario()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar Gestión</button>
                                    </div>
                            </form>
                        </div> <!-- /formulario de registros -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><!-- /.content-wrapper -->
<?php require 'footer.php'; ?>
<!-- Modal -->
<div class="modal fade" id="modalVistaPrevia" tabindex="-1" role="dialog" aria-labelledby="modalVistaPrevia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Vista previa de la imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div id="prueba">
                    <img id="vistaPrevia" width="100%" height="100%" src="" />
                </div>
            </div>
        </div>
    </div>
</div>

<script src="scripts/campaniasRedes.js" type="text/javascript"></script>
<script src="scripts/funcions.js" type="text/javascript"></script>