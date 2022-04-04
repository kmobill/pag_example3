<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<style></style>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="text-bold">Campaña Cooperativas Encuestas</h4> </div>
                    <div class="panel-body table-responsive" id="listadoRegistros">
                        <table id="tblListado" class="table table-condensed table-hover table-responsive">
                            <thead>
                            <th>Num</th>
                            <th>Campaña</th>
                            <th>ImportId</th>
                            <th>Asesor</th>
                            <th>Identificación</th>
                            <th>Nombres cliente</th>
                            <th>Tipo Crédito</th>
                            <th>Monto Crédito</th>
                            <th>Plazo Crédito</th>
                            <th>Resultado de gestión</th>
                            <th></th>
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
                                    <div class="col-xs-12 btn bg-gray-light">
                                        <div class="col-xs-3 hidden">
                                            <input type="text" class="form-control input-sm" id="code" name="code" readonly/>
                                            <input type="text" class="form-control input-sm" id="IDC" name="IDC" readonly/>
                                            <input type="text" class="form-control input-sm" id="CAMPANIA" name="CAMPANIA" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>IDENTIFICACION </b>
                                            <input type="text" class="form-control input-sm" id="IDENTIFICACION" name="IDENTIFICACION" readonly/>
                                        </div>
                                        <div class="col-xs-4"> <b>NOMBRE CLIENTE </b>
                                            <input type="text" class="form-control input-sm" id="NOMBRE_CLIENTE" name="NOMBRE_CLIENTE" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>FECHA_SOLICITUD </b>
                                            <input type="text" class="form-control input-sm" id="FECHA_SOLICITUD" name="FECHA_SOLICITUD" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>NUMERO_SOLICITUD </b>
                                            <input type="text" class="form-control input-sm" id="NUMERO_SOLICITUD" name="NUMERO_SOLICITUD" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>ESTADO_SOLICITUD </b>
                                            <input type="text" class="form-control input-sm" id="ESTADO_SOLICITUD" name="ESTADO_SOLICITUD" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>AGENCIA </b>
                                            <input type="text" class="form-control input-sm" id="AGENCIA" name="AGENCIA" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>EDAD </b>
                                            <input type="text" class="form-control input-sm" id="EDAD" name="EDAD" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>FECHA_NACIMIENTO </b>
                                            <input type="text" class="form-control input-sm" id="FECHA_NACIMIENTO" name="FECHA_NACIMIENTO" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>ESTADO_CIVIL </b>
                                            <input type="text" class="form-control input-sm" id="ESTADO_CIVIL" name="ESTADO_CIVIL" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>GENERO </b>
                                            <input type="text" class="form-control input-sm" id="GENERO" name="GENERO" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>ACTIVIDAD_ECONOMICA </b>
                                            <input type="text" class="form-control input-sm" id="ACTIVIDAD_ECONOMICA" name="ACTIVIDAD_ECONOMICA" readonly/>
                                        </div>
                                        <div class="col-xs-6"> <b>DIRECCION_DOMICILIO</b>
                                            <input type="text" class="form-control input-sm" id="DIRECCION_DOMICILIO" name="DIRECCION_DOMICILIO" readonly/>
                                        </div>
                                        <div class="col-xs-6"> <b>DIRECCION_TRABAJO </b>
                                            <input type="text" class="form-control input-sm" id="DIRECCION_TRABAJO" name="DIRECCION_TRABAJO" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>CORREO </b>
                                            <input type="text" class="form-control input-sm" id="CORREO" name="CORREO" readonly/>
                                        </div>
                                        <div class="col-xs-4"> <b>TIPO_EMPLEADO </b>
                                            <input type="text" class="form-control input-sm" id="TIPO_EMPLEADO" name="TIPO_EMPLEADO" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>INGRESOS </b>
                                            <input type="text" class="form-control input-sm" id="INGRESOS" name="INGRESOS" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>EGRESOS </b>
                                            <input type="text" class="form-control input-sm" id="EGRESOS" name="EGRESOS" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>ACTIVOS </b>
                                            <input type="text" class="form-control input-sm" id="ACTIVOS" name="ACTIVOS" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>PASIVOS </b>
                                            <input type="text" class="form-control input-sm" id="PASIVOS" name="PASIVOS" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>PRODUCTO </b>
                                            <input type="text" class="form-control input-sm" id="PRODUCTO" name="PRODUCTO" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>MONTO_MAXIMO </b>
                                            <input type="text" class="form-control input-sm" id="MONTO_MAXIMO" name="MONTO_MAXIMO" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>PLAZO_CREDITO </b>
                                            <input type="text" class="form-control input-sm" id="PLAZO_CREDITO" name="PLAZO_CREDITO" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>TASA_CRD </b>
                                            <input type="text" class="form-control input-sm" id="TASA_CRD" name="TASA_CRD" readonly/>
                                        </div>
                                        <div class="col-xs-4"> <b>OFICIAL_CUENTA </b>
                                            <input type="text" class="form-control input-sm" id="OFICIAL_CUENTA" name="OFICIAL_CUENTA" readonly/>
                                        </div>
                                        <div class="col-xs-4"> <b>DESTINO_DETALLADO </b>
                                            <input type="text" class="form-control input-sm" id="DESTINO_DETALLADO" name="DESTINO_DETALLADO" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>NEGOCIACION </b>
                                            <input type="text" class="form-control input-sm" id="NEGOCIACION" name="NEGOCIACION" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>FECHA_MODIFICACION </b>
                                            <input type="text" class="form-control input-sm" id="FECHA_MODIFICACION" name="FECHA_MODIFICACION" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>ESTADO_DESEMBOLSO </b>
                                            <input type="text" class="form-control input-sm" id="ESTADO_DESEMBOLSO" name="ESTADO_DESEMBOLSO" readonly/>
                                        </div>
                                        <div class="col-xs-8"> <b>COMENTARIOS </b>
                                            <input type="text" class="form-control input-sm" id="COMENTARIOS" name="COMENTARIOS" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>PRIORIDAD_GESTION </b>
                                            <input type="text" class="form-control input-sm" id="PRIORIDAD_GESTION" name="PRIORIDAD_GESTION" readonly/>
                                        </div>
                                    </div>

                                    <div id="pnlEncuesta" class="col-xs-12 btn">
                                        <div class="box box-widget bg-gray">
                                            <div class="box-body col-xs-12 btn">
                                                <!---------------------------------------------------------PREGUNTA 1---------------------------------------------------->
                                                <div class="col-xs-12"><label>PILAR GENERALES</label></div>
                                                <div class="col-xs-10"><input id="pregunta1" name="pregunta1" class="text-bold form-control" value="Califique del 1 al 7 siendo 1 malo y 7 excelente: la claridad de la información otorgada por parte del asesor acerca de tasas, cuotas, plazo?" readonly/></div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta1" name="respuesta1" class="form-control">
                                                        <option value=""></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <!--<option value="NO PROPORCIONA INFORMACION">NO PROPORCIONA INFORMACION</option>-->
                                                    </select>
                                                </div>
                                                <div class="col-xs-4">
                                                    <input id="pregunta1_1" name="pregunta1_1" class="text-bold form-control" readonly value="¿Cuál es el motivo de su calificación?" />
                                                </div>
                                                <div class="col-xs-8">
                                                    <input id="respuesta1_1" name="respuesta1_1" type="text" class="form-control" maxlength="500">
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 2---------------------------------------------------->
                                                <div class="col-xs-10"><input id="pregunta2" name="pregunta2" class="text-bold form-control" value="Califique del 1 al 7 siendo 1 malo y 7 excelente: la agilidad del asesor al realizar el desembolso del crédito otorgado" readonly/></div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta2" name="respuesta2" class="form-control">
                                                        <option value=""></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <!--<option value="NO PROPORCIONA INFORMACION">NO PROPORCIONA INFORMACION</option>-->
                                                    </select>
                                                </div>
                                                <div class="col-xs-4">
                                                    <input id="pregunta2_1" name="pregunta2_1" class="text-bold form-control" readonly value="¿Cuál es el motivo de su calificación?" />
                                                </div>
                                                <div class="col-xs-8">
                                                    <input id="respuesta2_1" name="respuesta2_1" type="text" class="form-control" maxlength="500">
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 6---------------------------------------------------->
                                                <div class="col-xs-10"><input id="pregunta6" name="pregunta6" class="text-bold form-control" value="Califique del 1 al 7 siendo 1 malo y 7 excelente: El ejecutivo que le atendió mostró interés por comprender su requerimiento" readonly/></div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta6" name="respuesta6" class="form-control">
                                                        <option value=""></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <!--<option value="NO PROPORCIONA INFORMACION">NO PROPORCIONA INFORMACION</option>-->
                                                    </select>
                                                </div>
                                                <div class="col-xs-4">
                                                    <input id="pregunta6_1" name="pregunta6_1" class="text-bold form-control" readonly value="¿Cuál es el motivo de su calificación?" />
                                                </div>
                                                <div class="col-xs-8">
                                                    <input id="respuesta6_1" name="respuesta6_1" type="text" class="form-control" maxlength="500">
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 7---------------------------------------------------->
                                                <div class="col-xs-10"><input id="pregunta7" name="pregunta7" class="text-bold form-control" value="Califique del 1 al 7 siendo 1 malo y 7 excelente: El ejecutivo que le atendió mostro amabilidad al atender su requerimiento" readonly/></div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta7" name="respuesta7" class="form-control">
                                                        <option value=""></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <!--<option value="NO PROPORCIONA INFORMACION">NO PROPORCIONA INFORMACION</option>-->
                                                    </select>
                                                </div>
                                                <div class="col-xs-4">
                                                    <input id="pregunta7_1" name="pregunta7_1" class="text-bold form-control" readonly value="¿Cuál es el motivo de su calificación?" />
                                                </div>
                                                <div class="col-xs-8">
                                                    <input id="respuesta7_1" name="respuesta7_1" type="text" class="form-control" maxlength="500">
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 3---------------------------------------------------->
                                                <div class="col-xs-12"><label>PILAR - LEALTAD / ATRIBUTO - SATISFACCIÓN</label></div>
                                                <div class="col-xs-10"><input id="pregunta3" name="pregunta3" class="text-bold form-control" value="Califique del 1 a 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido del asesor que lo atendió" readonly/></div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta3" name="respuesta3" class="form-control">
                                                        <option value=""></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <!--<option value="NO PROPORCIONA INFORMACION">NO PROPORCIONA INFORMACION</option>-->
                                                    </select>
                                                </div>
                                                <div class="col-xs-4">
                                                    <input id="pregunta3_1" name="pregunta3_1" class="text-bold form-control" readonly />
                                                </div>
                                                <div class="col-xs-6">
                                                    <input id="respuesta3_1" name="respuesta3_1" type="text" class="form-control" maxlength="500">
                                                </div>
                                                <div class="col-xs-2">
                                                    <input id="ATRIBUTO_INS" name="ATRIBUTO_INS" type="text" class="form-control" maxlength="500">
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 4---------------------------------------------------->
                                                <div class="col-xs-12"><label>PILAR - LEALTAD / ATRIBUTO - ESFUERZO</label></div>
                                                <div class="col-xs-10"><input id="pregunta4" name="pregunta4" class="text-bold form-control" value="¿Qué tan fácil o sencillo fue acceder al crédito con la asesoría brindada por el asesor?" readonly/></div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta4" name="respuesta4" class="form-control">
                                                        <option value=""></option>
                                                        <option value="MUY DIFICIL">MUY DIFICIL</option>
                                                        <option value="DIFICIL">DIFICIL</option>
                                                        <option value="POCO FACIL">POCO FACIL</option>
                                                        <option value="FACIL">FACIL</option>
                                                        <option value="MUY FACIL">MUY FACIL</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-4">
                                                    <input id="pregunta4_1" name="pregunta4_1" class="text-bold form-control" readonly />
                                                </div>
                                                <div class="col-xs-6">
                                                    <input id="respuesta4_1" name="respuesta4_1" type="text" class="form-control" maxlength="500">
                                                </div>
                                                <div class="col-xs-2">
                                                    <input id="ATRIBUTO_CES" name="ATRIBUTO_CES" type="text" class="form-control" maxlength="500">
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 5---------------------------------------------------->
                                                <div class="col-xs-12"><label>PILAR - LEALTAD / ATRIBUTO - RECOMENDACIÓN</label></div>
                                                <div class="col-xs-10"><textarea id="pregunta5" name="pregunta5" class="text-bold form-control" readonly>Califique del 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría: En qué grado recomendaría a la cooperativa en base al servicio recibido por el asesor que le atendió?</textarea></div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta5" name="respuesta5" class="form-control">
                                                        <option value=""></option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <!--<option value="NO PROPORCIONA INFORMACION">NO PROPORCIONA INFORMACION</option>-->
                                                    </select>
                                                </div>
                                                <div class="col-xs-4">
                                                    <input id="pregunta5_1" name="pregunta5_1" class="text-bold form-control" readonly value="¿Cuál es el motivo de su calificación?" />
                                                </div>
                                                <div class="col-xs-6">
                                                    <input id="respuesta5_1" name="respuesta5_1" type="text" class="form-control" maxlength="500">
                                                </div>
                                                <div class="col-xs-2">
                                                    <input id="ATRIBUTO_NPS" name="ATRIBUTO_NPS" type="text" class="form-control" maxlength="500">
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
<script src="scripts/JS_CoopEncuestaCEM.js" type="text/javascript"></script>
<script src="scripts/funcionesGenerales.js" type="text/javascript"></script>