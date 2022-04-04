<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<div class="content-wrapper">
    <section id="contenedor" class="content">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="box">
                    <!-- header -->
                    <div class="box-header with-border"> 
                        <h1 class="box-title">Gestión Comercial </h1>
                        <div class="box-tools pull-right">
                            <button class="btn btn-info" id="btnNuevaGestion" type="button" value="Nueva Gestión"><i class="fa fa-plus"></i> Nueva Gestión</button>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12" id="divFiltros"><br><br>
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
                                <th>Usuario</th>
                                <th>Nombre de la entidad</th>
                                <th>Tipo entidad</th>
                                <th>Persona de contacto</th>
                                <th>Motivo Llamada</th>
                                <th>Submotivo Llamada</th>
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
                                </tfoot>
                            </table>
                        </div> <!-- /listado de registros -->

                        <div class="panel-body" id="formularioRegistros"> <!-- formulario de registros -->
                            <form name="formulario" id="formulario" method="POST" class="">
                                <div class="box box-widget bg-gray-light">
                                    <div class="box-header with-border bg-gray">
                                        <div class="col-xs-3 text-left"> <span class="text-bold">Comercial</span> </div>
                                        <div class="col-xs-1 text-left"> <span class="text-bold">Asesor/a:</span> </div>
                                        <div class="col-xs-2 text-left"> <span class="text-right"> <?php echo($_SESSION['name']); ?> </span> </div>
                                        <div class="col-xs-1 text-left"> <span class="text-bold">Fecha:</span> </div>
                                        <div class="col-xs-2 text-left"> <span id="mostrarHora" class="text-right"></span></div>
                                        <div class="box-tools">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="hidden">
                                            <input type="text" class="form-control input-sm " id="IDC" name="IDC" readonly/>
                                            <input type="text" class="form-control" id="horaInicio" name="horaInicio" required/>
                                        </div>
                                        <!---------------------------------------------------------BLOQUE A---------------------------------------------------->
                                        <div class="col-xs-12 text-center box box-widget bg-gray-light"><b class="text-center">BLOQUE A - Datos de la llamada </b></div>
                                        <div class="divTable">
                                            <div class="divTableBody">
                                                <div class="col-xs-3 col-md-3">
                                                    <div class="divTableCell"><label class="text-light-blue">Nombre de la entidad</label></div>
                                                    <div class="divTableCell">
                                                        <input type="text" class="form-control" id="txtEntidad" name="txtEntidad" maxlength="500" required/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <label class="text-light-blue">Tipo de Entidad</label>
                                                    <select id="txtTipoEntidad" name="txtTipoEntidad" class="form-control" required>
                                                        <option value=""></option>
                                                        <option>Cooperativa</option>
                                                        <option>Banco</option>
                                                        <option>Clinica</option>
                                                        <option>Aseguradoras</option>
                                                        <option>Turismo</option>
                                                        <option>Retail</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <label class="text-light-blue">Telefóno de contacto</label>
                                                    <input onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtTelefonoContacto" name="txtTelefonoContacto"  maxlength="10" required/>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <label class="text-light-blue">Segmento</label>
                                                    <select id="txtSegmento" name="txtSegmento" class="form-control" required>
                                                        <option value=""></option>
                                                        <option>SG</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-3 col-md-3">
                                                    <div class="divTableCell"><label class="text-light-blue">Motivo de la llamada</label></div>
                                                    <div class="divTableCell">
                                                        <select id="txtMotivoLlamada" name="txtMotivoLlamada" class="form-control" required>
                                                            <option></option>
                                                            <?php
                                                            require '../config/connection.php';
                                                            $result = ejecutarConsulta14("SELECT DISTINCT MOTIVO FROM comercial.resultadosdegestion where estado='1' ORDER BY MOTIVO");
                                                            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                                                echo '<option value="' . $row["MOTIVO"] . '">' . $row["MOTIVO"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3 col-md-3">
                                                    <label class="text-light-blue">Submotivo de la llamada</label>
                                                    <select id="txtSubmotivoLlamada" name="txtSubmotivoLlamada" class="form-control" required>
                                                        <option></option>
                                                    </select>
                                                </div>

                                                <div class="col-xs-9 col-md-9">
                                                    <div class="divTableCell"><label class="text-light-blue">Observaciones de la llamada</label></div>
                                                    <div class="divTableCell">
                                                        <textarea class="form-control input-sm" id="txtObservaciones" name="txtObservaciones" rows="2" maxlength="5000"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!---------------------------------------------------------BLOQUE B-C---------------------------------------------------->
                                        <div class="col-xs-12 text-center box box-widget bg-gray-light"><br><b class="text-center">BLOQUE B-C - Información general</b></div>
                                        <div class="divTable">
                                            <div class="divTableBody">
                                                <div class="col-xs-4 col-md-4">
                                                    <label class="text-light-blue">Persona de Contacto</label>
                                                    <input type="text" class="form-control input-sm" id="txtPersonaContacto" name="txtPersonaContacto" required/>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <label class="text-light-blue">Ciudad</label>
                                                    <input type="text" class="form-control input-sm" id="txtCiudad" name="txtCiudad" required/>
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <label class="text-light-blue">Dirección</label>
                                                    <input type="text" class="form-control input-sm" id="txtDireccion" name="txtDireccion" required/>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <label class="text-light-blue">Celular 1</label>
                                                    <input pattern="^09(\d{8})$" onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtCelular1" name="txtCelular1" maxlength="15"/>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <label class="text-light-blue">Celular 2</label>
                                                    <input pattern="^09(\d{8})$" onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtCelular2" name="txtCelular2" maxlength="15"/>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <label class="text-light-blue">Teléfono convencional 1</label>
                                                    <input pattern="^(0[2-7])(\d{7})$" onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtConvencional1" name="txtConvencional1" maxlength="15"/>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <label class="text-light-blue">Teléfono convencional 2</label>
                                                    <input pattern="^(0[2-7])(\d{7})$" onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtConvencional2" name="txtConvencional2" maxlength="15"/>
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <label class="text-light-blue">Correo</label>
                                                    <input pattern="[a-zA-Z0-9_-.]+([.][a-zA-Z0-9_-]+)*@[a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{1,5}" id="txtCorreo" name="txtCorreo" type="text" class="form-control" maxlength="150">
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <label class="text-light-blue">Cantidad de clientes activos</label>
                                                    <input onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtCantidadActivos" name="txtCantidadActivos" maxlength="15"/>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <label class="text-light-blue">Cantidad de TC</label>
                                                    <input onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtCantidadTC" name="txtCantidadTC" maxlength="15"/>
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
<script src="scripts/comercial.js" type="text/javascript"></script>
<script src="scripts/funcions.js" type="text/javascript"></script>