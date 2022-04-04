<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <label id="titulo2" class="h4 text-bold text-red">&nbsp;</label>
                        <label id="titulo" class="h4 text-bold">Campañas Banco Pichincha</label>
                        <label id="titulo1" class="h4 text-bold text-red"></label>
                    </div>
                    <div class="panel-body table-responsive" id="listadoRegistros">
                        <table id="tblListado" class="table table-condensed table-hover table-responsive">
                            <thead>
                            <th>Num</th>
                            <th>Campaña</th>
                            <th>ImportId</th>
                            <th>Asesor</th>
                            <th>Código Campaña</th>
                            <th>Nombre Campaña</th>
                            <th>Identificacion</th>
                            <th>Nombres</th>
                            <th>Resultado de gestión</th>
                            <th></th>
                            </thead>
                            <tbody> </tbody>
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
                    </div>
                    <div class="panel-body" id="formularioRegistros">
                        <form name="formulario" id="formulario" method="POST" class="">
                            <div id="formularioRegistros">
                                <div class="col-md-12">
                                    <div class="box box-widget bg-gray-light">
                                        <div class="box-header with-border bg-gray">
                                            <div class="row col-xs-1 text-left"> <span class="text-bold">Última gestión:</span> </div>
                                            <div class="row col-xs-5 text-left">
                                                <input type="text" class="form-control input-sm" id="last" name="last" readonly/> </div>
                                            <div class="col-xs-1 text-left"> <span class="text-bold">Asesor/a:</span> </div>
                                            <div class="col-xs-2 text-left"> <span class="text-right"> <?php echo($_SESSION['name']); ?> </span> </div>
                                            <div class="col-xs-1 text-left"> <span class="text-bold">Fecha:</span> </div>
                                            <div class="col-xs-2 text-left"> <span id="mostrarHora" class="text-right"></span> </div>
                                            <div class="box-tools">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <input type="text" class="form-control input-sm hidden" id="horaInicio" name="horaInicio" readonly/>
                                            <div class="row">
                                                <div class="row1">
                                                    <div class=" col-xs-6"> <b class="text-bold text-left text-bold">Resultados de gestión </b> </div>
                                                    <div class="col-xs-6 text-left"> <b class="text-bold text-left text-bold">Teléfonos por marcar </b> </div>
                                                </div>
                                                <div class="row1">
                                                    <div class=" col-xs-3">
                                                        <select class="form-control input-sm" id="level1" name="level1" required>
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                    <div class=" col-xs-3">
                                                        <select class="form-control input-sm" id="level2" name="level2" required>
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <select class="form-control input-sm" id="fonos" name="fonos" onchange="copyToClipboard('#fonos option:selected')">
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <select class="form-control input-sm" id="estatusTel" name="estatusTel">
                                                            <option></option>
                                                            <option value="Contactado">Contactado</option>
                                                            <option value="Grabadora">Grabadora</option>
                                                            <option value="Equivocado">Equivocado</option>
                                                            <option value="Averiado">Averiado</option>
                                                            <option value="No contesta">No contesta</option>
                                                            <option value="Tono Ocupado">Tono Ocupado</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <button type="button" class="btn btn-info btn-sm" id="btnFonos" name="btnFonos"><i class="fa fa-save"></i> Guardar Teléfono</button>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 hidden">
                                                    <div class="col-xs-3">
                                                        <input type="text" class="form-control input-sm" id="horaInicioLlamada" name="horaInicioLlamada" readonly/>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <input type="text" class="form-control input-sm" id="interactionIdOld" name="interactionIdOld" readonly/>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <input type="text" class="form-control input-sm" id="interactionId" name="interactionId" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <br>
                                                </div>
                                                <div class="row1">
                                                    <div class=" col-xs-2 text-left">
                                                        <input type="checkbox" class="" id="cbox2" name="cbox2" value="cbox2" />
                                                        <label for="cbox2">&nbsp; Otro asesor</label>
                                                        <select class="form-control input-sm" id="otro" name="otro">
                                                            <option></option>
                                                            <?php require '../config/connection.php';
                                                            $result = ejecutarConsulta("SELECT Id FROM user where usergroup >='3' and state='1' ORDER BY id");
                                                            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                                                echo '<option value="' . $row["Id"] . '">' . $row["Id"] . '</option>';
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class=" col-xs-2 text-left"> <b class="text-bold text-left text-bold">Fecha Agendamiento </b> </div>
                                                    <div class="col-xs-2 text-left"> <b class="text-bold text-left text-bold">Teléfono adicional </b> </div>
                                                    <div class="col-xs-5 text-left"> <b class="text-bold text-left text-bold ">Observaciones </b> </div>
                                                    <div class="col-xs-1 text-left"> <b class="text-bold text-left text-bold">Intentos </b> </div>
                                                </div>
                                                <div class="row1">
                                                    <div class=" col-xs-2">
                                                        <input placeholder="aaaa/mm/dd hh:mm:ss" class="form-control input-sm" id="agenda" name="agenda" readonly/> </div>
                                                    <div class=" col-xs-2">
                                                        <input pattern="^0[2-9](\d{7,8})$" onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="fonoAd" name="fonoAd" /> </div>
                                                    <div class="col-xs-2"> </div>
                                                    <div class="col-xs-5">
                                                        <input type="text" class="form-control input-sm" id="obs" name="obs" /> </div>
                                                    <div class="col-xs-1">
                                                        <input type="text" class="form-control input-sm" id="intentos" name="intentos" readonly/> </div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <br>
                                                </div>
                                                <div class="row1">
                                                    <div class="col-xs-6 text-right">
                                                        <button class="btn btn-success btn-sm" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar Gestión</button>
                                                    </div>
                                                    <div class="col-xs-6 text-left">
                                                        <button class="btn btn-danger btn-sm" onclick="cancelar_formulario()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar Gestión</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="pnlProductos">
                                <div class="col-md-12">
                                    <div class="box box-widget bg-gray">
                                        <div class="box-body">
                                            <div class="row1">
                                                <div class="col-xs-2">
                                                    <input type="text" class="form-control input-sm hidden" readonly/> <b class="text-bold">Desea otro producto: &nbsp; </b> </div>
                                                <div class="col-xs-1">
                                                    <select class="form-control input-sm" id="producto" name="producto">
                                                        <option></option>
                                                        <option>SI</option>
                                                        <option>NO</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-2">
                                                    <select class="form-control input-sm" id="listadoProd" name="listadoProd" disabled>
                                                        <option></option>
                                                        <option>TARJETA DE CREDITO PRINCIPAL</option>
                                                        <option>TARJETA DE CREDITO ADICIONAL</option>
                                                        <option>CREDITO PRECISO</option>
                                                        <option>CREDITO VEHICULAR</option>
                                                        <option>CREDITO MICROFINANZAS</option>
                                                        <option>CREDITO LINEA ABIERTA HIPOTECARIA</option>
                                                        <option>CREDITO HABITAR</option>
                                                        <option>CREDITO EDUCATIVO</option>
                                                        <option>ASISTENCIA</option>
                                                        <option>CUENTA DE AHORRO/CORRIENTE</option>
                                                        <option>AHORRO FUTURO</option>
                                                        <option>INVERSION POLIZA</option>
                                                        <option>TARJETA DE DEBITO</option>
                                                        <option>OTROS</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-3">
                                                    <input type="text" class="form-control input-sm" id="otroProd" name="otroProd" readonly/> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="pnlEncuesta" class="col-xs-12 btn">
                                <div class="box box-widget bg-gray">
                                    <div class="box-body">
                                        <div class="row" id="encuesta">
                                            <div class="col-xs-2"> <b class="text-bold">Motivos de variaciones </b>
                                                <select class="form-control input-sm" id="motivos" name="motivos">
                                                    <option></option>
                                                    <option>Compra Activos</option>
                                                    <option>Gastos Médicos</option>
                                                    <option>Traslado a otra entidad</option>
                                                    <option>Giro Normal del Negocio</option>
                                                    <option>Crédito</option>
                                                    <option>Pagos</option>
                                                    <option>Sistema</option>
                                                    <option>Plazo</option>
                                                    <option>Otros</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-3"> <b class="text-bold">Especifique </b>
                                                <input type="text" class="form-control input-sm" id="especificar" name="especificar" readonly> </div>
                                            <div class="col-xs-2"> <b class="text-bold">¿En los próximos días contamos nuevamente con sus depósitos en Banco Pichincha? </b>
                                                <select class="form-control input-sm" id="depositos" name="depositos">
                                                    <option></option>
                                                    <option>SI</option>
                                                    <option>NO</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-2">
                                                <br>
                                                <input type="date" class="form-control input-sm" id="fechaV" name="fechaV"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="index">
                                <div class="col-xs-2 hidden "> <b class="text-bold text-aqua">CAMPANIA </b>
                                    <input type="text" class="form-control input-sm" id="code" name="code" readonly/>
                                    <input type="text" class="form-control input-sm" id="CAMPANIA" name="CAMPANIA" readonly/> </div>
                                <div class="col-xs-2 hidden"> <b class="text-bold text-aqua">ID </b>
                                    <input type="text" class="form-control input-sm" id="IDC" name="IDC" readonly/> </div>
                                <div class="col-xs-2"> <b class="text-bold text-aqua">CODIGO_CAMPANIA </b>
                                    <input type="text" class="form-control input-sm" id="CODIGO_CAMPANIA" name="CODIGO_CAMPANIA" readonly/> </div>
                                <div class="col-xs-4"> <b class="text-bold text-aqua">NOMBRE_CAMPANIA </b>
                                    <input type="text" class="form-control input-sm" id="NOMBRE_CAMPANIA" name="NOMBRE_CAMPANIA" readonly/> </div>
                                <div class="col-xs-3"> <b class="text-bold text-aqua">IDENTIFICACION </b>
                                    <input type="text" class="form-control input-sm" id="IDENTIFICACION" name="IDENTIFICACION" readonly/> </div>
                                <div class="col-xs-3"> <b class="text-bold text-aqua">NOMBRE </b>
                                    <input type="text" class="form-control input-sm" id="NOMBRE" name="NOMBRE" readonly/> </div>
                                <div class="col-xs-3 hidden"> <b class="text-bold text-aqua">CODIGO AGENCIA </b>
                                    <input type="text" class="form-control input-sm" id="CODIGO_AGENCIA" name="CODIGO_AGENCIA" readonly/> </div>
                                <div class="col-xs-3"> <b class="text-bold text-aqua">AGENCIA </b>
                                    <input type="text" class="form-control input-sm" id="AGENCIA" name="AGENCIA" readonly/> </div>
                                <div class="col-xs-3"> <b class="text-bold text-aqua">ZONA </b>
                                    <input type="text" class="form-control input-sm" id="ZONA" name="ZONA" readonly/> </div>
                                <div class="col-xs-3"> <b class="text-bold text-aqua">REGION </b>
                                    <input type="text" class="form-control input-sm" id="REGION" name="REGION" readonly/> </div>
                                <div class="col-xs-3"> <b class="text-bold text-aqua">SUBSEGMENTO </b>
                                    <input type="text" class="form-control input-sm" id="SUBSEGMENTO" name="SUBSEGMENTO" readonly/> </div>
                                <div class="col-xs-2"> <b class="text-bold text-aqua">VARIACIÓN AGOSTO </b>
                                    <input type="text" class="form-control input-sm" id="VAR_TOTAL_AHORROS_AGO30" name="VAR_TOTAL_AHORROS_AGO30" readonly/> </div>
                                <div class="col-xs-2"> <b class="text-bold text-aqua">VARIACIÓN SEPT </b>
                                    <input type="text" class="form-control input-sm" id="VAR_TOTAL_AHORROS_SEP20" name="VAR_TOTAL_AHORROS_SEP20" readonly/> </div>
                                <div class="col-xs-1"> <b class="text-bold text-aqua">PRIORIDAD </b>
                                    <input type="text" class="form-control input-sm" id="PRIORIDAD" name="PRIORIDAD" readonly/> </div>
                                <div class="col-xs-3"> <b class="text-bold text-aqua">FAMILIA </b>
                                    <input type="text" class="form-control input-sm" id="FAMILIA" name="FAMILIA" readonly/> </div>
                                <div class="col-xs-4"> <b class="text-bold text-aqua">PRODUCTO </b>
                                    <input type="text" class="form-control input-sm" id="PRODUCTO" name="PRODUCTO" readonly/> </div>
                                <div class="col-xs-3"> <b class="text-bold text-aqua">PLAN_RECOMPENSAS </b>
                                    <input type="text" class="form-control input-sm" id="PLAN_RECOMPENSAS" name="PLAN_RECOMPENSAS" readonly/> </div>
                                <div class="col-xs-3"> <b class="text-bold text-aqua">COD_MARCA </b>
                                    <input type="text" class="form-control input-sm" id="COD_MARCA" name="COD_MARCA" readonly/> </div>
                                <div class="col-xs-3"> <b class="text-bold text-aqua">CORREO_TRX </b>
                                    <input type="text" class="form-control input-sm" id="CORREO_TRX" name="CORREO_TRX" readonly/> </div>
                                <div class="col-xs-3"> <b class="text-bold text-aqua">CORREO </b>
                                    <input type="text" class="form-control input-sm" id="CORREO" name="CORREO" readonly/> </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>
<?php require 'footer.php'; ?>
<script src="scripts/bpVariacionesCampania.js" type="text/javascript"></script>
<script src="scripts/funcions.js" type="text/javascript"></script>