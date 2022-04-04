<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<div class="content-wrapper">
    <section id="contenedor" class="content">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="box">
                    <!-- header -->
                    <div class="box-header with-border"> 
                        <h1 class="box-title">Bitácora de envío de mensajes </h1>
                        <div class="box-tools pull-right">
                            <button class="btn btn-info" id="btnNuevaGestion" type="button" value="Nueva Gestión"><i class="fa fa-plus"></i> Nueva Gestión</button>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12" id="divFiltros"><br>
                        <div class="hidden col-md-3 col-sm-3">
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
                                <th>Tipo Mensaje</th>
                                <th>Cantidad</th>
                                <th>Observación</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
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
                                </tfoot>
                            </table>
                        </div> <!-- /listado de registros -->
                    </div>
                    <div class="panel-body" id="formularioRegistros"> <!-- formulario de registros -->
                        <form name="formulario" id="formulario" method="POST" class="">
                            <div class="box box-widget bg-gray-light">
                                <div class="box-header with-border bg-gray">
                                    <div class="col-xs-12 col-md-12 col-lg-12 text-left"> <span class="text-bold">Ingreso del detalle de cada uno de los envíos en campañas como Correo, SMS y WhatsApp</span> </div>
                                    <div class="box-tools">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <input type="text" class="form-control input-sm hidden" id="IDC" name="IDC" readonly/>
                                    <!---------------------------------------------------------BLOQUE A---------------------------------------------------->
                                    <div class="col-xs-12 text-center box box-widget bg-gray-light"><b class="text-center">BLOQUE A - Datos Generales </b></div>
                                    <div class="divTable">
                                        <div class="divTableBody">
                                            <div class="col-xs-2 col-md-2">
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
                                                <div class="divTableCell"><label class="text-light-blue">Tipo de campaña</label></div>
                                                <div class="divTableCell">
                                                    <select id="txtTipoCampania" name="txtTipoCampania" class="form-control" required>
                                                        <option></option>
                                                        <?php
                                                        require '../config/connection.php';
                                                        $result = ejecutarConsulta14("SELECT Descripcion FROM bitacoras.campañas where estado='1' ORDER BY Descripcion");
                                                        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                                            echo '<option value="' . $row["Descripcion"] . '">' . $row["Descripcion"] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-2 col-md-2">
                                                <div class="divTableCell"><label class="text-light-blue">Tipo de envío</label></div>
                                                <div class="divTableCell">
                                                    <select id="txtTipoEnvio" name="txtTipoEnvio" class="form-control" required>
                                                        <option></option>
                                                        <?php
                                                        require '../config/connection.php';
                                                        $result = ejecutarConsulta14("SELECT Descripcion FROM bitacoras.tipomensaje where estado='1' ORDER BY Descripcion");
                                                        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                                            echo '<option value="' . $row["Descripcion"] . '">' . $row["Descripcion"] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-2 col-md-2">
                                                <div class="divTableCell"><label class="text-light-blue">Cantidad de mensajes</label></div>
                                                <div class="divTableCell">
                                                    <!--<textarea class="form-control input-sm" id="txtMensaje" name="txtMensaje" rows="2" maxlength="500"></textarea>-->
                                                    <input type="number" class="form-control" id="txtCantidad" name="txtCantidad">
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <div class="divTableCell"><label class="text-light-blue">Observaciones de la llamada</label></div>
                                                <div class="divTableCell">
                                                    <textarea class="form-control input-sm" id="txtObservaciones" name="txtObservaciones" rows="2" maxlength="500"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 text-center"><br>                      
                                        <button class="btn btn-success btn-sm" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar Gestión</button>
                                        <button class="btn btn-danger btn-sm" onclick="cancelar_formulario()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar Gestión</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- /formulario de registros -->
                </div>
            </div>
        </div>
    </section>
</div><!-- /.content-wrapper -->
<?php require 'footer.php'; ?>
<script src="scripts/bitacoraMensajes.js" type="text/javascript"></script>
<script src="scripts/funcionesGenerales.js" type="text/javascript"></script>