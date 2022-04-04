<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="panel-body" id="formularioRegistros">
                <form name="formulario" id="formulario" method="POST" class="">
                    <div class="box box-widget bg-gray-light">
                        <div class="box-header with-border bg-gray">
                            <div class="col-xs-3 text-left"> <span class="text-bold">Novedades BGR</span> </div>
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
                            <!---------------------------------------------------------BLOQUE A---------------------------------------------------->
                            <div class="col-xs-12 text-center box box-widget bg-gray-light"><b class="text-center">BLOQUE A - Datos de las novedades de los clientes </b></div>
                            <div class="text-center">

                            </div>
                            <div class="divTable">
                                <div class="divTableBody">
                                    <div class="col-xs-2 col-md-2">
                                        <label class="text-light-blue">Identificación cliente</label>
                                        <input onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtIdentificacion" name="txtIdentificacion"  maxlength="10" required/>
                                    </div>
                                    <div class="col-xs-2 col-md-2">
                                        <div class="divTableCell"><label class="text-light-blue">Agencia</label></div>
                                        <div class="divTableCell">
                                            <select id="txtAgencia" name="txtAgencia" class="form-control" required>
                                                <option></option>
                                                <option>No aplica</option>
                                                <?php
                                                require '../config/connection.php';
                                                $result = ejecutarConsulta1("SELECT nombre_agencia FROM bgr.agencias where estado='1' ORDER BY nombre_agencia");
                                                while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                                    echo '<option value="' . $row["nombre_agencia"] . '">' . $row["nombre_agencia"] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-md-2">
                                        <div class="divTableCell"><label class="text-light-blue">Campaña</label></div>
                                        <div class="divTableCell">
                                            <select id="txtCampania" name="txtCampania" class="form-control" required>
                                                <option></option>
                                                <option>Calidad</option>
                                                <option>Call Center</option>
                                                <option>Cobranzas</option>
                                                <option>Digital</option>
                                                <option>Empresarial</option>
                                                <option>Inversiones</option>
                                                <option>Reclamos</option>
                                                <option>Recuperaciones</option>
                                                <option>Tarjeta de crédito</option>
                                                <option>No aplica</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-md-2">
                                        <div class="divTableCell"><label class="text-light-blue">Sección</label></div>
                                        <div class="divTableCell">
                                            <select id="txtSeccion" name="txtSeccion" class="form-control" required>
                                                <option></option>
                                                <option>Cajas</option>
                                                <option>Front de Servicios</option>
                                                <option>Negocios</option>
                                                <option>TC Nueva / Recibo mi tarjeta de crédito</option>
                                                <option>TC Consumo</option>
                                                <option>TC Millas</option>
                                                <option>Otra</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-md-2">
                                        <div class="divTableCell"><label class="text-light-blue">Fecha atención</label></div>
                                        <div class="divTableCell">
                                           <input type="date" class="form-control input-sm" id="txtFechaAtencion" name="txtFechaAtencion" required/> 
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-md-2">
                                        <div class="divTableCell"><label class="text-light-blue">Teléfono de contacto</label></div>
                                        <div class="divTableCell">
                                            <input type="number" class="form-control input-sm" id="txtTelefonoContacto" name="txtTelefonoContacto" required/> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-12">
                                        <div class="divTableCell"><label class="text-light-blue">Observación</label></div>
                                        <div class="divTableCell">
                                            <textarea maxlength="500" rows="4" class="form-control input-sm" id="txtObservaciones" name="txtObservaciones" required></textarea> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 text-center">
                        <button class="btn btn-info" id="btnNuevaGestion" type="button" value="Nueva Gestión" onclick="nuevaGestion()"><i class="fa fa-rotate-left"></i> Nueva Gestión</button>
                        <button class="btn btn-success btn-sm" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar Gestión</button>
                        <button class="btn btn-danger btn-sm" onclick="cancelar_formulario()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar Gestión</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php require 'footer.php'; ?>
<script src="scripts/bancoBGRNovedades.js" type="text/javascript"></script>
<script src="scripts/funcions.js" type="text/javascript"></script>