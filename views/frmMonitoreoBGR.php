<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<div class="content-wrapper">
    <section id="contenedor" class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border"> <!-- header -->
                        <h1 class="box-title">Monitoreo de calidad BGR </h1>
                        <div class="box-tools pull-right">
                            <button class="btn btn-sm btn-success" id="btnAgregar" onclick="mostrar_formulario(true)">
                                <i class="fa fa-plus-circle"></i> Agregar
                            </button>
                        </div>
                    </div> <!-- /header -->
                    <div class="panel-body table-responsive" id="listadoRegistros"> <!-- listado de registros -->
                        <table id="tblListado" class="table table-condensed table-hover table-responsive">
                            <thead>
                            <th>Num</th>
                            <th>AGENT</th> <!--espacio para botones-->
                            <th>STATUS</th>
                            <th>IDENTIFICACION</th>
                            <th>FECHA CALIFICACIÓN</th>
                            <th>PRODUCTO</th>
                            <th>CAMPANIA</th>
                            <th>AGENCIA</th>
                            <th>SECCION</th>
                            <th>TRANSACCION</th>
                            <th>EVALUADOR</th>
                            <th>ESTADO MONITOREO</th>
                            <th>TMA</th>
                            <th>ESTADO</th>
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
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            </tfoot>
                        </table>
                    </div> <!-- /listado de registros -->

                    <div class="panel-body" id="formularioRegistros"> <!-- formulario de registros -->
                        <form name="formulario" id="formulario" method="POST">
                            <div class="row">
                                <div class="col-xs-12 col-md-12"><br>
                                    <input type="hidden" onkeypress="" class="form-control" id="IDC" name="IDC" />
                                    <input type="hidden" onkeypress="" class="form-control" id="CONTACTID" name="CONTACTID" />
                                    <div class="col-xs-1 col-md-1"><label>Usuario</label></div>
                                    <div class="col-xs-3 col-md-3">
                                        <input type="text" onkeypress="" class="form-control" id="USUARIO" name="USUARIO" required />
                                    </div>
                                    <div class="col-xs-1 col-md-1"><label>Identificación</label></div>
                                    <div class="col-xs-3 col-md-3">
                                        <input type="text" onkeypress="return onlyNumbers(event)" class="form-control" id="IDENTIFICACION" name="IDENTIFICACION" maxlength="13" required />
                                    </div>
                                    <div class="col-xs-1 col-md-1"><label>Producto</label></div>
                                    <div class="col-xs-3 col-md-3">
                                        <select class="form-control" id="PRODUCTO" name="PRODUCTO" required >
                                            <option></option>
                                            <option>Encuesta</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12"><br>
                                    <div class="col-xs-1 col-md-1"><label>Campaña</label></div>
                                    <div class="col-xs-3 col-md-3">
                                        <select class="form-control" id="CAMPANIA" name="CAMPANIA" required >
                                            <option></option>
                                            <option>Calidad</option>
                                            <option>BGR Digital</option>
                                            <option>Call center</option>
                                            <option>Cobranzas</option>
                                            <option>Empresarial</option>
                                            <option>Inversiones</option>
                                            <option>Reclamos</option>
                                            <option>Recuperaciones</option>
                                            <option>Tarjeta de crédito</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-1 col-md-1"><label>Fecha de atención</label></div>
                                    <div class="col-xs-3 col-md-3">
                                        <input type="text" placeholder="aaaa-mm-dd" onkeypress="" class="form-control" id="FECHA_ATENCION" name="FECHA_ATENCION" required />
                                    </div>
                                    <div class="col-xs-1 col-md-1"><label>Estatus del registro</label></div>
                                    <div class="col-xs-3 col-md-3">
                                        <select class="form-control" id="ESTATUS" name="ESTATUS" required >
                                            <option></option>
                                            <option>Encuesta efectiva</option>
                                            <option>Encuesta abandonada</option>
                                            <option>Monitoreo supervisión</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12">
                                    <div class="col-xs-1 col-md-1"><label>Fecha de calificación</label></div>
                                    <div class="col-xs-3 col-md-3">
                                        <input type="text" placeholder="aaaa-mm-dd" onkeypress="" class="form-control" id="FECHA_CALIFICACION" name="FECHA_CALIFICACION" required />
                                    </div>
                                    <div class="col-xs-1 col-md-1"><label>Agencia</label></div>
                                    <div class="col-xs-3 col-md-3">
                                        <select class="form-control" id="AGENCIA" name="AGENCIA" required >
                                            <option></option>
                                            <?php
                                            require '../config/connection.php';
                                            $result = ejecutarConsulta("SELECT distinct(NOMBRE_AGENCIA) 'NOMBRE_AGENCIA' FROM bgr.agencias ORDER BY NOMBRE_AGENCIA");
                                            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                                echo '<option value="' . $row["NOMBRE_AGENCIA"] . '">' . $row["NOMBRE_AGENCIA"] . '</option>';
                                            }
                                            ?>
                                            <option>Ninguno</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-1 col-md-1"><label>Sección</label></div>
                                    <div class="col-xs-3 col-md-3">
                                        <select class="form-control" id="SECCION" name="SECCION" required >
                                            <option></option>
                                            <option>CAJAS</option>
                                            <option>FRONT DE SERVICIOS</option>
                                            <option>NEGOCIOS</option>
                                            <option>OTRO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12">
                                    <div class="col-xs-1 col-md-1"><label>TMA</label></div>
                                    <div class="col-xs-3 col-md-3">
                                        <select class="form-control" id="TMA" name="TMA" required >
                                            <option></option>
                                            <option>Corto</option>
                                            <option>Largo</option>
                                            <option>No aplica</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-1 col-md-1"><label>Transacciones</label></div>
                                    <div class="col-xs-4 col-md-4">
                                        <input id="TRANSACCION" name="TRANSACCION" class="form-control" required/>
                                    </div>
                                    <div class="col-xs-1 col-md-1"><label>Estado auditoria</label></div>
                                    <div class="col-xs-2 col-md-2">
                                        <select class="form-control" id="ESTADO_MONITOREO" name="ESTADO_MONITOREO" required >
                                            <option></option>
                                            <option>AUDITADO</option>
                                            <option>REEMPLAZO</option>
                                            <option>DADO DE BAJA</option>
                                            <option>MONITOREO SUPERVISIÓN</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row"><br>
                                <table class="table table-striped table-bordered table-condensed">
                                    <thead class="">
                                    <th class="col-xs-2 col-md-2 text-center"><label>100%</label></th>
                                    <th class="col-xs-8 col-md-8 text-center"><label>ERROR NO CRITICO (ENC)</label></th>
                                    <th class="col-xs-2 col-md-2 text-center"><label>AFECTACIÓN</label></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align: middle" rowspan="2" class="col-xs-2 col-md-2 text-center"><label>SALUDO 5%</label></td>
                                            <td class="col-xs-8 col-md-8 text-center"><span class="tag tag-warning">Aplica protocolo de Saludos (Nombre y apellido, Asistencia)</span></td>
                                            <td class="col-xs-2 col-md-2 text-center">
                                                <select class="form-control" id="SALUDO_1" name="SALUDO_1" required >
                                                    <option></option>
                                                    <option>0.00</option>
                                                    <option>2.50</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-xs-8 col-md-8 text-center"><span class="tag tag-warning">Personalización de la llamada(Dos Nombres Dos Apellidos del cliente)</span></td>
                                            <td class="col-xs-2 col-md-2 text-center">
                                                <select class="form-control" id="SALUDO_2" name="SALUDO_2" required >
                                                    <option></option>
                                                    <option>0.00</option>
                                                    <option>2.50</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: middle" rowspan="2" class="col-xs-2 col-md-2 text-center"><label>PRESENTACIÓN 40%</label></td>
                                            <td class="col-xs-8 col-md-8 text-center"><span class="tag tag-warning">Presentación completa del Script.</span></td>
                                            <td class="col-xs-2 col-md-2 text-center">
                                                <select class="form-control" id="PRESENTACION_1" name="PRESENTACION_1" required >
                                                    <option></option>
                                                    <option>0.00</option>
                                                    <option>20.00</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-xs-8 col-md-8 text-center"><span class="tag tag-warning">Indagar con el cliente para generar vinculos de confianza: (Quién, qué, cómo, cuándo, cuánto)</span></td>
                                            <td class="col-xs-2 col-md-2 text-center">
                                                <select class="form-control" id="PRESENTACION_2" name="PRESENTACION_2" required >
                                                    <option></option>
                                                    <option>0.00</option>
                                                    <option>10.00</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-xs-2 col-md-2 text-center"><label>CIERRE 20%</label></td>
                                            <td class="col-xs-8 col-md-8 text-center"><span class="tag tag-warning">Reconocer la objetividad del cliente.</span></td>
                                            <td class="col-xs-2 col-md-2 text-center">
                                                <select class="form-control" id="CIERRE_1" name="CIERRE_1" required >
                                                    <option></option>
                                                    <option>0.00</option>
                                                    <option>20.00</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: middle" rowspan="5" class="col-xs-2 col-md-2 text-center"><label>COMUNICACIÓN 15%</label></td>
                                            <td class="col-xs-8 col-md-8 text-center"><span class="tag tag-warning">Pronunciación y Modulación Utiliza un tono de voz  y ritmo adecuado.</span></td>
                                            <td class="col-xs-2 col-md-2 text-center">
                                                <select class="form-control" id="COMUNICACION_1" name="COMUNICACION_1" required >
                                                    <option></option>
                                                    <option>0.00</option>
                                                    <option>3.00</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-xs-8 col-md-8 text-center"><span class="tag tag-warning">No interrumpe</span></td>
                                            <td class="col-xs-2 col-md-2 text-center">
                                                <select class="form-control" id="COMUNICACION_2" name="COMUNICACION_2" required >
                                                    <option></option>
                                                    <option>0.00</option>
                                                    <option>3.00</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-xs-8 col-md-8 text-center"><span class="tag tag-warning">Escucha activa</span></td>
                                            <td class="col-xs-2 col-md-2 text-center">
                                                <select class="form-control" id="COMUNICACION_3" name="COMUNICACION_3" required >
                                                    <option></option>
                                                    <option>0.00</option>
                                                    <option>3.00</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-xs-8 col-md-8 text-center"><span class="tag tag-warning">Demuestra amabilidad y cortesía</span></td>
                                            <td class="col-xs-2 col-md-2 text-center">
                                                <select class="form-control" id="COMUNICACION_4" name="COMUNICACION_4" required >
                                                    <option></option>
                                                    <option>0.00</option>
                                                    <option>3.00</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-xs-8 col-md-8 text-center"><span class="tag tag-warning">Evita el uso de muletillas, interjecciones, diminutivos, dubitativas, refranes o expresiones coloquiales</span></td>
                                            <td class="col-xs-2 col-md-2 text-center">
                                                <select class="form-control" id="COMUNICACION_5" name="COMUNICACION_5" required >
                                                    <option></option>
                                                    <option>0.00</option>
                                                    <option>3.00</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: middle" rowspan="4" class="col-xs-2 col-md-2 text-center"><label class="tag tag-warning">ERRORES CRITICOS USUARIO FINAL (ECUF) 20%</label></td>
                                            <td colspan="2" class="col-xs-8 col-md-8 text-center"><label>EJECUCIÓN DEL PROCEDIMIENTO</label></td>
                                        </tr>
                                        <tr>
                                            <td class="col-xs-8 col-md-8 text-center"><span class="tag tag-warning">Ingresa correctamente lo que indica el cliente en el From (VOC)</span></td>
                                            <td class="col-xs-2 col-md-2 text-center">
                                                <select class="form-control" id="ERRORES_CRITICOS_1" name="ERRORES_CRITICOS_1" required >
                                                    <option></option>
                                                    <option>0.00</option>
                                                    <option>10.00</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="col-xs-8 col-md-8 text-center"><label>ATENCION Y SERVICIO</label></td>
                                        </tr>
                                        <tr>
                                            <td class="col-xs-8 col-md-8 text-center"><span class="tag tag-warning">Maltrato al Cliente</span></td>
                                            <td class="col-xs-2 col-md-2 text-center">
                                                <select class="form-control" id="ERRORES_CRITICOS_2" name="ERRORES_CRITICOS_2" required >
                                                    <option></option>
                                                    <option>0.00</option>
                                                    <option>10.00</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: middle" rowspan="3" class="col-xs-2 col-md-2 text-center"><label>ERRORES CRITICOS AL CUMPLIMIENTO 10%</label></td>
                                            <td colspan="2" class="col-xs-8 col-md-8 text-center"><label>VALIDACION Y SOLICITUD DE DATOS</label></td>
                                        </tr>
                                        <tr>
                                            <td class="col-xs-8 col-md-8 text-center"><span class="tag tag-warning">Tipifica estados/sub estados/observación</span></td>
                                            <td class="col-xs-2 col-md-2 text-center">
                                                <select class="form-control" id="ERRORES_CRITICOS_CUMPLIMIENTO_1" name="ERRORES_CRITICOS_CUMPLIMIENTO_1" required >
                                                    <option></option>
                                                    <option>0.00</option>
                                                    <option>5.00</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-xs-8 col-md-8 text-center"><span class="tag tag-warning">Evita promover planteamientos negativos del servicio</span></td>
                                            <td class="col-xs-2 col-md-2 text-center">
                                                <select class="form-control" id="ERRORES_CRITICOS_CUMPLIMIENTO_2" name="ERRORES_CRITICOS_CUMPLIMIENTO_2" required>
                                                    <option></option>
                                                    <option>0.00</option>
                                                    <option>5.00</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="col-xs-2 col-md-2 text-center"><button class="btn btn-success btn-sm" id="btnCalificaciones" type="button"><i class="fa fa-arrow-circle-left"></i> Calcular calificaciones</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <table id="tblNotas" class="table table-striped table-bordered table-condensed">
                                    <thead class="">
                                    <th class="col-xs-3 col-md-3 text-center"><label>Nota Encuesta</label></th>
                                    <th class="col-xs-3 col-md-3 text-center"><label>Nota ERRORES CRITICOS USUARIO FINAL (ECUF)</label></th>
                                    <th class="col-xs-3 col-md-3 text-center"><label>Nota ERRORES CRITICOS AL CUMPLIMIENTO (ECN)</label></th>
                                    <th class="col-xs-3 col-md-3 text-center"><label>Total</label></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-xs-3 col-md-3 text-center"><input id="Nota_ENC" name="Nota_ENC" class="form-control" readonly /></td>
                                            <td class="col-xs-3 col-md-3 text-center"><input id="Nota_ECUF" name="Nota_ECUF" class="form-control" readonly /></td>
                                            <td class="col-xs-3 col-md-3 text-center"><input id="Nota_ECN" name="Nota_ECN" class="form-control" readonly /></td>
                                            <td class="col-xs-3 col-md-3 text-center"><input id="TOTAL" name="TOTAL" class="form-control" readonly /></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <table id="tblNotas" class="table table-striped table-bordered table-condensed">
                                    <tr>
                                        <td style="vertical-align: middle" colspan="3" class="col-xs-2 col-md-2 text-center"><label>¿Qué hizo bien? (Manejo de la llamada)</label></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle" colspan="3" class="col-xs-2 col-md-2 text-center"><textarea class="form-control" rows="3" id="MANEJO_GESTION" name="MANEJO_GESTION" required></textarea></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle" colspan="3" class="col-xs-2 col-md-2 text-center"><label>¿Qué puede hacer diferente? (Mejoras de la gestión)</label></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle" colspan="3" class="col-xs-2 col-md-2 text-center"><textarea class="form-control" rows="3" id="MEJORAS" name="MEJORAS" required></textarea></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="col-xs-12 text-center"><br/>
                                        <button class="btn btn-primary btn-sm" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                                        <button class="btn btn-danger btn-sm" onclick="cancelar_formulario()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- /formulario de registros -->
                </div>
            </div>
    </section>
</div><!-- /.content-wrapper -->

<?php require 'footer.php'; ?>
<script src="scripts/monitoreoBGR.js" type="text/javascript"></script>
<script src="scripts/funcions.js" type="text/javascript"></script>