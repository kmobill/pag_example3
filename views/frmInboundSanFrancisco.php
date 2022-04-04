<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<div class="content-wrapper">
    <section id="contenedor" class="content">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="box">
                    <!-- header -->
                    <div class="box-header with-border"> 
                        <h1 class="box-title">Gestión Campañas Inbound </h1>
                        <div class="box-tools pull-right">
                            <button class="btn btn-info" id="btnNuevaGestion" type="button" value="Nueva Gestión"><i class="fa fa-plus"></i> Nueva Gestión</button>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12" id="divFiltros"><br><br>
                        <!--                        <div class="col-md-3 col-sm-3">
                                                    <label for="txtCoop"><b>Seleccione Cooperativa</b></label>
                                                    <select id="txtCoop" name="txtCoop" class="form-control" required>
                                                        <option></option>
                                                        <option selected>COOPERATIVA SAN FRANCISCO</option>
                                                    </select>
                                                </div>-->
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
                                <th>Estado</th>
                                <th>Identificacion</th>
                                <th>Nombre Cliente</th>
                                <th>Ciudad Cliente</th>
                                <th>Estado Cliente</th>
                                <th>Motivo</th>
                                <th>Submotivo</th>
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
                                <th></th>
                                <th></th>
                                </tfoot>
                            </table>
                        </div> <!-- /listado de registros -->

                        <div class="panel-body" id="formularioRegistros"> <!-- formulario de registros -->
                            <form name="formulario" id="formulario" method="POST" class="">
                                <div class="box box-widget bg-gray-light">
                                    <div class="box-header with-border bg-gray">
                                        <div class="col-xs-3 text-left"> <span class="text-bold">Gestión de agencias</span> </div>
                                        <div class="col-xs-1 text-left"> <span class="text-bold">Asesor/a:</span> </div>
                                        <div class="col-xs-2 text-left"> <span class="text-right"> <?php echo($_SESSION['name']); ?> </span> </div>
                                        <div class="col-xs-1 text-left"> <span class="text-bold">Fecha:</span> </div>
                                        <div class="col-xs-2 text-left"> <span id="mostrarHora" class="text-right"></span></div>
                                        <div class="col-xs-3 text-left"> <p><span class="text-bold" id="minutos"></span>:<span class="text-bold" id="segundos"></span></div>
                                        <div class="box-tools">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <input type="text" class="form-control input-sm hidden" id="IDC" name="IDC" readonly/>
                                        <!---------------------------------------------------------BLOQUE A---------------------------------------------------->
                                        <div class="col-xs-12 text-center box box-widget bg-gray-light"><br><b class="text-center">BLOQUE A - Información del cliente</b></div>
                                        <div>
                                            <div>
                                                <div class="col-xs-2 col-md-2">
                                                    <div><label class="text-light-blue">Tipo de cliente</label></div>
                                                    <div>
                                                        <select id="txtTipoCliente" name="txtTipoCliente" class="form-control" required>
                                                            <option value=""></option>
                                                            <option>Titular</option>
                                                            <option>Tercera Persona</option>
                                                            <option>No Aplica</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <div><label class="text-light-blue">Identificación del cliente</label></div>
                                                    <div>
                                                        <input type="text" class="form-control input-sm" id="txtIdentificacion" name="txtIdentificacion"  min="10" maxlength="15" required/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <div><label class="text-light-blue">Nombre del cliente (Apellidos y Nombres)</label></div>
                                                    <div>
                                                        <input type="text" class="form-control input-sm" id="txtNombreCliente" name="txtNombreCliente" required/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <div><label class="text-light-blue">Ciudad del cliente</label></div>
                                                    <div>
                                                        <input type="text" class="form-control input-sm" id="txtCiudadCliente" name="txtCiudadCliente" required/>
                                                    </div>
                                                    <br>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <div><label class="text-light-blue">Celular del cliente</label></div>
                                                    <div>
                                                        <input pattern="^09(\d{8})$" onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtCelular" name="txtCelular" maxlength="10" required/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3 col-md-3">
                                                    <div><label class="text-light-blue">Teléfono convencional del cliente</label></div>
                                                    <div>
                                                        <input pattern="^(0[2-7])(\d{7})$" onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtConvencional" name="txtConvencional" maxlength="9"/>
                                                    </div>
                                                </div>
                                                <div class="col-xs-7 col-md-7">
                                                    <div><label class="text-light-blue">Correo del cliente</label></div>
                                                    <div>
                                                        <input pattern="[a-zA-Z0-9_-.]+([.][a-zA-Z0-9_-]+)*@[a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{1,5}" id="txtCorreo" name="txtCorreo" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!---------------------------------------------------------BLOQUE B---------------------------------------------------->
                                <div class="col-xs-12 text-center box box-widget bg-gray-light"><b class="text-center">BLOQUE B - Datos del requerimiento </b></div>
                                <div class="divTable">
                                    <div class="divTableBody">
                                        <!--                                        <div class="col-xs-2 col-md-2">
                                                                                    <div class="divTableCell"><label class="text-light-blue">Nombre Cooperativa</label></div>
                                                                                    <div class="divTableCell">
                                                                                        <select id="txtCooperativa" name="txtCooperativa" class="form-control" required>
                                                                                            <option></option>
                                                                                            <option selected>COOPERATIVA SAN FRANCISCO</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>-->
                                        <!--                                        <div class="col-xs-2 col-md-2">
                                                                                    <div class="divTableCell"><label class="text-light-blue">Tipo de llamada</label></div>
                                                                                    <div class="divTableCell">
                                                                                        <select id="txtTipoLlamada" name="txtTipoLlamada" class="form-control" required>
                                                                                            <option value=""></option>
                                                                                            <option>Inbound</option>
                                                                                            <option>Outbound</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>-->
                                        <div class="col-xs-2 col-md-2">
                                            <div class="divTableCell"><label class="text-light-blue">Estado de atención</label></div>
                                            <div class="divTableCell">
                                                <select id="txtEstadoLlamada" name="txtEstadoLlamada" class="form-control" required>
                                                    <!--<option value=""></option>-->
                                                    <option selected>Iniciada</option>
                                                    <option>Pendiente</option>
                                                    <option>Escalada</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-md-2">
                                            <div class="divTableCell"><label class="text-light-blue">Producto</label></div>
                                            <div class="divTableCell">
                                                <select id="txtEstadoLlamada" name="txtEstadoLlamada" class="form-control" required>
                                                    <option value=""></option>
                                                    <option>Cuentas de ahorro</option>
                                                    <option>Créditos</option>
                                                    <option>Canales electrónicos</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="hidden col-xs-2 col-md-2">
                                            <label class="text-light-blue">Hora inicio de llamada</label>
                                            <input type="text" class="form-control" id="horaInicio" name="horaInicio" required/>
                                        </div>
                                        <div class="hidden col-xs-3 col-md-3">
                                            <label class="text-light-blue">Editar hora fin de la llamada</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input type="checkbox" id="chkHoraFin" name="chkHoraFin" value="checkeado">
                                                </span>
                                                <input type="text" class="form-control" id="horaFin" name="horaFin"/>
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                        <div class="col-xs-3 col-md-3">
                                            <div><label class="text-light-blue">Motivo del requerimiento</label></div>
                                            <div>
                                                <select id="txtMotivoLlamada" name="txtMotivoLlamada" class="form-control" required>
                                                    <option></option>
                                                    <option>INFORMACION GENERAL</option>
                                                    <option>PROCESOS DE BANCA VIRTUAL</option>
                                                    <option>PROCESOS DE TC</option>
                                                    <option>PROCESOS DE TC ADICIONAL</option>
                                                    <option>PROCESOS DE TD</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-md-5">
                                            <label class="text-light-blue">Submotivo del requerimiento</label>
                                            <select id="txtSubmotivoLlamada" name="txtSubmotivoLlamada" class="form-control" required>
                                                <option></option>
                                            </select>
                                        </div>
<!--                                        <div class="col-xs-2 col-md-2">
                                            <div class="divTableCell"><label class="text-light-blue">Transferir llamada</label></div>
                                            <div class="divTableCell">
                                                <select id="txtTranferencia" name="txtTranferencia" class="form-control" required>
                                                    <option value=""></option>
                                                    <option>Si</option>
                                                    <option selected>No</option>
                                                </select>
                                            </div>
                                        </div>-->
<!--                                        <div class="col-xs-2 col-md-2">
                                            <div class="divTableCell"><label class="text-light-blue">Observación transferencia</label></div>
                                            <div class="divTableCell">
                                                <select id="txtObsTranferencia" name="txtObsTranferencia" class="form-control" required>
                                                    <option value=""></option>
                                                    <option>Transferir Agencia</option>
                                                    <option>Transferencia fallida</option>
                                                    <option selected>No aplica</option>
                                                </select>
                                            </div>
                                        </div>-->
                                        <div class="col-xs-12 col-md-12">
                                            <div class="divTableCell"><label class="text-light-blue">Observaciones</label></div>
                                            <div class="divTableCell">
                                                <textarea class="form-control input-sm" id="txtObservaciones" name="txtObservaciones" rows="2" maxlength="500"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!---------------------------------------------------------BLOQUE D---------------------------------------------------->
                                <!--                                <div class="col-xs-12 text-center box box-widget bg-gray-light"><br><b class="text-center">BLOQUE D - Registro de la llamada</b></div>
                                                                <div class="divTable">
                                                                    <div class="divTableBody">
                                                                        <div class="col-xs-3 col-md-3">
                                                                            <div class="divTableCell"><label class="text-light-blue">Identificación tercera persona</label></div>
                                                                            <div class="divTableCell">
                                                                                <input onkeypress="return onlyNumbers(event)" type="text" class="form-control input-sm" id="txtIdentificacionTerceraPersona" name="txtIdentificacionTerceraPersona" maxlength="10"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-3 col-md-3">
                                                                            <div class="divTableCell"><label class="text-light-blue">Datos de la tercera persona</label></div>
                                                                            <div class="divTableCell">
                                                                                <input type="text" class="form-control input-sm" id="txtTerceraPersona" name="txtTerceraPersona" maxlength="150"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
                                <!---------------------------------------------------------BLOQUE F---------------------------------------------------->
<!--                                <div class="col-xs-12 text-center box box-widget bg-gray-light"><br><b class="text-center">BLOQUE F - Estado del cliente</b></div>
                                <div class="divTable text-center">
                                    <div class="divTableBody">
                                        <div class="col-xs-3 col-md-3"></div>
                                        <div class="col-xs-2 col-md-2"><label class="text-light-blue">Estado del cliente</label></div>
                                        <div class="col-xs-4 col-md-4">
                                            <select id="txtEstadoCliente" name="txtEstadoCliente" class="form-control" required>
                                                <option value=""></option>
                                                <option>Positivo</option>
                                                <option>Negativo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>-->
                                <!--                                <div id="encuestaOscus" class="">
                                                                    <div class="col-xs-12 text-center box box-widget bg-gray-light"><br><b class="text-center">Medición Oscus</b></div>
                                                                    <div class="divTableBody">
                                                                        <div class="col-xs-2 col-md-2"><label class="text-light-blue">Estado de la encuesta</label></div>
                                                                        <div class="col-xs-3 col-md-3">
                                                                            <select id="txtEstadoEncuesta" name="txtEstadoEncuesta" class="form-control" required>
                                                                                <option value=""></option>
                                                                                <option>Realizada Exitosamente</option>
                                                                                <option>No aplica</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-xs-2 col-md-2"><label class="text-light-blue">Observaciones</label></div>
                                                                        <div class="col-xs-5 col-md-5">
                                                                            <input type="text" class="form-control input-sm" id="txtObservacionesEncuesta" name="txtObservacionesEncuesta" maxlength="500"/>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
                                <!--                                <div id="pnlEncuestaOscus">
                                                                    -------------------------------------------------------Medición Oscus--------------------------------------------------
                                                                    <div class="col-xs-12 text-center box box-widget bg-gray-light"><br><b class="text-center">Indicadores de experiencia</b></div>
                                                                    <div class=" col-xs-12 col-md-12 text-center"><label class="text-light-blue">En la escala de 1 a 10 donde 1 es poco satisfecho y 10 muy satisfecho:</label></div>
                                                                    <div class="divTable">                                            
                                                                        <div class="divTableBody">
                                                                            <div class="col-xs-9"><input id="pregunta1" name="pregunta1" class="text-bold form-control text-light-blue" value="1.  Su grado de satisfacción con el servicio recibido de manera general en la Cooperativa" readonly/></div>
                                                                            <div class="col-xs-3">
                                                                                <select id="respuesta1" name="respuesta1" class="form-control">
                                                                                    <option value=""></option>
                                                                                    <option >1</option>
                                                                                    <option >2</option>
                                                                                    <option >3</option>
                                                                                    <option >4</option>
                                                                                    <option >5</option>
                                                                                    <option >6</option>
                                                                                    <option >7</option>
                                                                                    <option >8</option>
                                                                                    <option >9</option>
                                                                                    <option >10</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-xs-6 col-md-6"><input id="pregunta2" name="pregunta2" class="text-bold form-control text-light-blue" value="¿Por qué seleccionó esa alternativa?" readonly/></div>
                                                                            <div class="col-xs-6 col-md-6">
                                                                                <div class="divTableCell">
                                                                                    <input type="text" class="form-control input-sm" id="respuesta2" name="respuesta2"/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-9 col-md-9"><textarea id="pregunta3" name="pregunta3" class="text-bold form-control text-light-blue" readonly>2. En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría ¿en qué grado recomendaría a la Cooperativa a un familiar, amigo o colega de trabajo?</textarea></div>
                                                                            <div class="col-xs-3 col-md-3">
                                                                                <select id="respuesta3" name="respuesta3" class="form-control" required>
                                                                                    <option value=""></option>
                                                                                    <option>0</option>
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                    <option>6</option>
                                                                                    <option>7</option>
                                                                                    <option>8</option>
                                                                                    <option>9</option>
                                                                                    <option>10</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-xs-6 col-md-6"><input id="pregunta4" name="pregunta4" class="text-bold form-control text-light-blue" readonly/></div>
                                                                            <div class="col-xs-6 col-md-6">
                                                                                <input type="text" class="form-control input-sm" id="respuesta4" name="respuesta4"/>
                                                                            </div>
                                                                            <div class="col-xs-9 col-md-9"><textarea id="pregunta5" name="pregunta5" class="text-bold form-control text-light-blue" readonly>3. ¿Qué tan fácil o sencillo es para usted gestionar sus requerimientos en la Cooperativa?</textarea></div>
                                                                            <div class="col-xs-3 col-md-3">
                                                                                <select id="respuesta5" name="respuesta5" class="form-control" required>
                                                                                    <option value=""></option>
                                                                                    <option>Muy Fácil</option>
                                                                                    <option>Fácil</option>
                                                                                    <option>Poco fácil</option>
                                                                                    <option>Difícil</option>
                                                                                    <option>Muy difícil</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-xs-6 col-md-6"><input id="pregunta6" name="pregunta6" class="text-bold form-control text-light-blue" value="¿Por qué seleccionó esa alternativa?" readonly/></div>
                                                                            <div class="col-xs-6 col-md-6">
                                                                                <div class="divTableCell">
                                                                                    <input type="text" class="form-control input-sm" id="respuesta6" name="respuesta6"/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-9 col-md-9"><textarea id="pregunta9" name="pregunta9" class="text-bold form-control text-light-blue" readonly>4. Califique del 1 al 7 siendo 1 malo y 7 excelente: como califica las medidas sanitarias aplicadas por la cooperativa en su visita a la Agencia</textarea></div>
                                                                            <div class="col-xs-3 col-md-3">
                                                                                <select id="respuesta9" name="respuesta9" class="form-control" required>
                                                                                    <option value=""></option>
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                    <option>6</option>
                                                                                    <option>7</option>
                                                                                    <option>No aplica</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-xs-6 col-md-6"><input id="pregunta10" name="pregunta10" class="text-bold form-control text-light-blue" value="¿Por qué seleccionó esa alternativa?" readonly/></div>
                                                                            <div class="col-xs-6 col-md-6">
                                                                                <input type="text" class="form-control input-sm" id="respuesta10" name="respuesta10"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 text-center box box-widget bg-gray-light"><br><b class="text-center">Indicadores CHURN INDICATOR</b></div>
                                                                    <div class="divTable">                                            
                                                                        <div class="divTableBody">
                                                                            <div class="col-xs-9 col-md-9"><textarea id="pregunta7" name="pregunta7" class="text-bold form-control text-light-blue" readonly>5. Si su experiencia con la cooperativa se mantiene igual a la que ha tenido hasta ahora, consideraría seguir con nosotros, ¿por cuánto tiempo más?</textarea></div>
                                                                            <div class="col-xs-3 col-md-3">
                                                                                <select id="respuesta7" name="respuesta7" class="form-control" required>
                                                                                    <option value=""></option>
                                                                                    <option>De 3 a 5 años</option>
                                                                                    <option>De 1 a 3 años</option>
                                                                                    <option>Hasta 1 año</option>
                                                                                    <option>No quiero seguir</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-xs-6 col-md-6"><input id="pregunta8" name="pregunta8" class="text-bold form-control text-light-blue" value="¿Por qué seleccionó esa alternativa?" readonly/></div>
                                                                            <div class="col-xs-6 col-md-6">
                                                                                <input type="text" class="form-control input-sm" id="respuesta8" name="respuesta8"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
                                <div class="col-xs-12 text-center">                        
                                    <button class="btn btn-success btn-sm" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar Gestión</button>
                                    <button class="btn btn-danger btn-sm" onclick="cancelar_formulario()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar Gestión</button>
                                </div>
                                <!-- Inicio de Modal validación de datos -->
                                <div class="modal fade" id="modalValidaciones" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalValidaciones" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-bold">Preguntas de validación</h4>
                                            </div>
                                            <div class="modal-body text-center">
                                                <div class="row">
                                                    <div class="col-xs-10 col-md-10"><input id="preguntavalidacion1" name="preguntavalidacion1" class="form-control text-black text-bold" readonly/></div>
                                                    <div class="col-xs-2 col-md-2">
                                                        <select id="validacion1" name="validacion1" class="form-control">
                                                            <option></option>
                                                            <option>Correcto</option>
                                                            <option>Incorrecto</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-10 col-md-10"><input id="preguntavalidacion2" name="preguntavalidacion2" class="form-control text-black text-bold" readonly/></div>
                                                    <div class="col-xs-2 col-md-2">
                                                        <select id="validacion2" name="validacion2" class="form-control">
                                                            <option></option>
                                                            <option>Correcto</option>
                                                            <option>Incorrecto</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-10 col-md-10"><input id="preguntavalidacion3" name="preguntavalidacion3" class="form-control text-black text-bold" readonly/></div>
                                                    <div class="col-xs-2 col-md-2">
                                                        <select id="validacion3" name="validacion3" class="form-control">
                                                            <option></option>
                                                            <option>Correcto</option>
                                                            <option>Incorrecto</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-10 col-md-10"><input id="preguntavalidacion4" name="preguntavalidacion4" class="form-control text-black text-bold" readonly/></div>
                                                    <div class="col-xs-2 col-md-2">
                                                        <select id="validacion4" name="validacion4" class="form-control">
                                                            <option></option>
                                                            <option>Correcto</option>
                                                            <option>Incorrecto</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-10 col-md-10"><input id="preguntavalidacion5" name="preguntavalidacion5" class="form-control text-black text-bold" readonly/></div>
                                                    <div class="col-xs-2 col-md-2">
                                                        <select id="validacion5" name="validacion5" class="form-control">
                                                            <option></option>
                                                            <option>Correcto</option>
                                                            <option>Incorrecto</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-10 col-md-10"><input id="preguntavalidacion6" name="preguntavalidacion6" class="form-control text-black text-bold" readonly/></div>
                                                    <div class="col-xs-2 col-md-2">
                                                        <select id="validacion6" name="validacion6" class="form-control">
                                                            <option></option>
                                                            <option>Correcto</option>
                                                            <option>Incorrecto</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-10 col-md-10"><input id="preguntavalidacion7" name="preguntavalidacion7" class="form-control text-black text-bold" readonly/></div>
                                                    <div class="col-xs-2 col-md-2">
                                                        <select id="validacion7" name="validacion7" class="form-control">
                                                            <option></option>
                                                            <option>Correcto</option>
                                                            <option>Incorrecto</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" id="btnValidador">Validar respuestas</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /fin de modal validación de datos -->
                            </form>
                        </div> <!-- /formulario de registros -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><!-- /.content-wrapper -->
<?php require 'footer.php'; ?>
<script src="scripts/inboundP.js" type="text/javascript"></script>
<script src="scripts/funcions.js" type="text/javascript"></script>