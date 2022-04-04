<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <label id="titulo2" class="h4 text-bold text-red">&nbsp;</label>
                        <label id="titulo" class="h4 text-bold">Campaña Banco Pichincha Cancelaciones</label>
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
                            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                                <div class="box box-widget">
                                    <!--Panel informativo de la gestión y del asesor-->
                                    <div class="box-header with-border" style="background-color: #1D7BB8; color: white">
                                        <div class="row col-xs-2 text-left"> <span class="text-bold">Última gestión:</span> </div>
                                        <div class="row col-xs-4 text-left">
                                            <input type="text" class="form-control input-sm" id="last" name="last" readonly/> </div>
                                        <div class="col-xs-1 text-left"> <span class="text-bold">Asesor/a:</span> </div>
                                        <div class="col-xs-2 text-left"> <span class="text-right"> <?php echo($_SESSION['name']); ?> </span> </div>
                                        <div class="col-xs-1 text-left"> <span class="text-bold">Fecha:</span> </div>
                                        <div class="col-xs-2 text-left"> <span id="mostrarHora" class="text-right"></span></div>
                                        <div class="box-tools">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                        </div>
                                    </div>
                                    <!--Panel de InteractionId y hora de inicio-->
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
                                        <input type="text" class="form-control input-sm" id="horaInicio" name="horaInicio" readonly/>
                                    </div>
                                    <!--Panel de datos de gestión telefónica-->
                                    <div class="box-body" style="background-color: #E5E3E3">
                                        <div class="row">
                                            <div class=" col-xs-2">
                                                <b class="text-bold text-left text-bold">Resultados de gestión </b>
                                                <select class="form-control input-sm" id="level1" name="level1" required>
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class=" col-xs-2">
                                                <b class="text-bold text-left text-bold"><br></b>
                                                <select class="form-control input-sm" id="level2" name="level2" required>
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class=" col-xs-2">
                                                <b class="text-bold text-left text-bold"><br></b>
                                                <select class="form-control input-sm" id="level3" name="level3">
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="col-xs-2">
                                                <b class="text-bold text-left text-bold">Teléfonos a marcar</b>
                                                <select class="form-control input-sm" id="fonos" name="fonos" onchange="copyToClipboard('#fonos option:selected')">
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="col-xs-2">
                                                <b class="text-bold text-left text-bold">Último estado teléfono </b>
                                                <input type="text" disabled class="form-control input-sm" id="ultimoEstatusFono" name="ultimoEstatusFono"/>
                                            </div>
                                            <div class="col-xs-2">
                                                <b class="text-bold text-left text-bold">Estados teléfonos</b>
                                                <select class="form-control input-sm" id="estatusTel" name="estatusTel">
                                                </select>
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
                                                </select>
                                            </div>
                                            <div class="col-xs-2 text-left"> <b class="text-bold text-left text-bold">Fecha Agendamiento </b> </div>
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
                                    <!--Panel informativo del registro-->
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
                                            <input type="text" class="form-control input-sm" id="NOMBRE_CLIENTE" name="NOMBRE_CLIENTE" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">TARJETA SOCIO </b>
                                            <input type="text" class="form-control input-sm" id="TARJETA_SOCIO" name="TARJETA_SOCIO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">ESTADO </b>
                                            <input type="text" class="form-control input-sm" id="ESTADO" name="ESTADO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">MARCA </b>
                                            <input type="text" class="form-control input-sm" id="MARCA" name="MARCA" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">TIPO </b>
                                            <input type="text" class="form-control input-sm" id="TIPO" name="TIPO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">FAMILIA </b>
                                            <input type="text" class="form-control input-sm" id="FAMILIA" name="FAMILIA" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">PRODUCTO </b>
                                            <input type="text" class="form-control input-sm" id="PRODUCTO" name="PRODUCTO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">SUBSEGMENTO </b>
                                            <input type="text" class="form-control input-sm" id="SUBSEGMENTO" name="SUBSEGMENTO" readonly/> </div>
                                    </div>

                                    <!--                                    <div id="pnlProductos">
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
                                                                        </div>-->
                                    <div id="pnlCancelaciones" class="col-xs-12 btn">
                                        <div class="box box-widget bg-gray">
                                            <div class="box-body">
                                                <div class="col-xs-10"><input id="pregunta1" name="pregunta1" class="text-bold form-control" value="1. CUAL FUE LA CAUSA PRINCIPAL PARA SOLICITAR LA CANCELACION DE SU TARJETA DE CREDITO BANCO PICHINCHA?" readonly/></div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta1" name="respuesta1" class="form-control">
                                                        <option value=""></option>
                                                        <option value="CARGOS NO AUTORIZADOS">CARGOS NO AUTORIZADOS</option>
                                                        <option value="COSTO">COSTO</option>
                                                        <option value="CUPO">CUPO</option>
                                                        <option value="NO LA SOLICITO">NO LA SOLICITO</option>
                                                        <option value="NO TIENE CAPACIDAD DE PAGO">NO TIENE CAPACIDAD DE PAGO</option>
                                                        <option value="OTROS">OTROS</option>
                                                        <option value="RECLAMO NO RESUELTO">RECLAMO NO RESUELTO</option>
                                                        <option value="SERVICIO">SERVICIO</option>
                                                        <option value="TIENE OTRAS TARJETAS">TIENE OTRAS TARJETAS</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-12"><input id="pregunta1_1" name="pregunta1_1" class="text-bold form-control" value="INGRESE UN MOTIVO ACORDE A LO QUE INDICA EL CLIENTE, EN CASO DE NO SER UNA DE LAS OPCIONES, INDIQUE CON SUS PALABRAS" readonly/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta1_1" name="respuesta1_1" class="form-control">
                                                        <option value=""></option>
                                                        <option value="JUBILADO">JUBILADO</option>
                                                        <option value="DESEMPLEADO">DESEMPLEADO</option>
                                                        <option value="ESTA REALIZANDO UN CREDITO EN BP">ESTA REALIZANDO UN CREDITO EN BP</option>
                                                        <option value="PREFIERE USAR EFECTIVO">PREFIERE USAR EFECTIVO</option>
                                                        <option value="OTRO">OTRO</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-9"><input id="respuesta1_2" name="respuesta1_2" class="text-bold form-control" readonly/></div>
                                                <div class="col-xs-10"><input id="pregunta2" name="pregunta2" class="text-bold form-control" value="2. POR FAVOR INDIQUEME QUE TARJETA DE CREDITO UTILIZA CON FRECUENCIA?" readonly/></div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta2" name="respuesta2" class="form-control">
                                                        <option value=""></option>
                                                        <option value="NO USA TARJETAS DE CREDITO">NO USA TARJETAS DE CREDITO</option>
                                                        <option value="PACIFICARD( BANCO PACIFICO)">PACIFICARD( BANCO PACIFICO)</option>
                                                        <option value="DINERS">DINERS</option>
                                                        <option value="OTRAS MARCAS">OTRAS MARCAS</option>
                                                        <option value="OTRAS MARCAS BCO PICHINCHA">OTRAS MARCAS BCO PICHINCHA</option>
                                                        <option value="XPERTA">XPERTA</option>
                                                        <option value="VISA BCO GUAYAQUIL">VISA BCO GUAYAQUIL</option>
                                                        <option value="PRODUBANCO">PRODUBANCO</option>
                                                        <option value="AMERICAN EXPRESS">AMERICAN EXPRESS</option>
                                                        <option value="BANCO DEL AUSTRO">BANCO DEL AUSTRO</option>
                                                        <option value="ALIA (BANCO SOLIDARIO)">ALIA (BANCO SOLIDARIO)</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-10"><input id="pregunta3" name="pregunta3" class="text-bold form-control" value="3. ESTARÍA DISPUESTO A ACEPTAR NUESTRA TARJETA DE CREDITO NUEVAMENTE?" readonly/></div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta3" name="respuesta3" class="form-control">
                                                        <option value=""></option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="TAL VEZ / LO PENSARÍA">TAL VEZ / LO PENSARÍA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require 'footer.php'; ?>
<script src="scripts/JS_BPCancelacionesAgenda.js" type="text/javascript"></script>
<script src="scripts/funcionesGenerales.js" type="text/javascript"></script>