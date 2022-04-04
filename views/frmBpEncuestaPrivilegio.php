<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<style></style>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="text-bold">Campaña BP Encuestas</h4> </div>
                    <div class="panel-body table-responsive" id="listadoRegistros">
                        <table id="tblListado" class="table table-condensed table-hover table-responsive">
                            <thead>
                            <th>Num</th>
                            <th>Campaña</th>
                            <th>ImportId</th>
                            <th>Asesor</th>
                            <th>Identificación</th>
                            <th>Nombres cliente</th>
                            <th>Agencia</th>
                            <th>Sección</th>
                            <th>Fecha atención</th>
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
                                        <div class="col-xs-4"> <b>SEGMENTO </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO1" name="CAMPO1" readonly/>
                                        </div>
                                    </div>

                                    <div class="box box-widget bg-gray">
                                        <div class="box-body col-xs-12 btn">
                                            <!---------------------------------------------------------PREGUNTA 1---------------------------------------------------->
                                            <div class="col-xs-10"><textarea id="pregunta1" name="pregunta1" class="text-bold form-control" readonly>1. Tenemos conocimiento que usted tenía nuestra Aplicación Privilegios Nómina en la cual disponía de información sobre sus beneficios y alianzas con Banco Pichincha. ¿Es correcto?</textarea></div>
                                            <div class="col-xs-2">
                                                <select id="respuesta1" name="respuesta1" class="form-control">
                                                    <option value=""></option>
                                                    <option>Si</option>
                                                    <option>No</option>
                                                </select> 
                                            </div>
                                            <div id="pnlEncuesta" class="col-xs-12 btn">
                                                <!---------------------------------------------------------PREGUNTA 2---------------------------------------------------->
                                                <div class="col-xs-10"><input id="pregunta2" name="pregunta2" class="text-bold form-control" readonly value="2. Estaba satisfecho/a con los beneficios y descuentos que disponía a través de esta aplicación Móvil?"/></div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta2" name="respuesta2" class="form-control">
                                                        <option value=""></option>
                                                        <option>Si</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-12"><input id="pregunta26" name="pregunta26" class="text-bold form-control" readonly value="2.1 ¿Porque?"/></div>
                                                <div class="col-xs-12">
                                                    <input id="respuesta26" name="respuesta26" type="text" class="form-control">
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 3---------------------------------------------------->
                                                <div class="col-xs-10"><input id="pregunta3" name="pregunta3" class="text-bold form-control" value="2.1 ¿Del 0 al 10 que tanto recomendaba usted el uso de esta aplicación a sus amigos o familiares? Siendo 0 No lo recomendaba y 10 si lo recomendaría" readonly/></div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta3" name="respuesta3" class="form-control">
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
                                                <div class="col-xs-12"><input id="pregunta25" name="pregunta25" class="text-bold form-control" readonly value="2.1.1 ¿Cuál fue el motivo principal para darnos esa calificación?"/></div>
                                                <div class="col-xs-12">
                                                    <input id="respuesta25" name="respuesta25" type="text" class="form-control">
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 4---------------------------------------------------->
                                                <div class="col-xs-10"><input id="pregunta4" name="pregunta4" class="text-bold form-control" value="3. ¿Con qué frecuencia usted accedía a consultar sus beneficios?" readonly/></div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta4" name="respuesta4" class="form-control">
                                                        <option value=""></option>
                                                        <option>Diaria</option>
                                                        <option>Semanal</option>
                                                        <option>Mensual</option>
                                                        <option>Trimestral</option>
                                                        <option>Semestral</option>
                                                        <option>Anual</option>
                                                        <option>Esporádico(Poca frecuencia e irregular)</option>
                                                        <option>Varias veces al día</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 5---------------------------------------------------->
                                                <div class="col-xs-12"><input id="pregunta5" name="pregunta5" class="text-bold form-control" value="4. Como Banco Pichincha queremos re activar este servicio para nuestros clientes, ¿Cómo le gustaría consultar esta información?" readonly/></div>
                                                <div class="col-xs-7">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC1" name="chk_ENC1" value="chk_ENC1" type="checkbox">
                                                        </span>
                                                        <input id="respuesta5" name="respuesta5" type="text" value="A través de la app móvil en donde puede también consultar sus saldos y realizar transferencias" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC2" name="chk_ENC2" value="chk_ENC2" type="checkbox">
                                                        </span>
                                                        <input id="respuesta6" name="respuesta6" type="text" value="Por su Banca Web" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-7">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC3" name="chk_ENC3" value="chk_ENC3" type="checkbox">
                                                        </span>
                                                        <input id="respuesta7" name="respuesta7" type="text" value="Una nueva aplicación solo con información de estos beneficios y descuentos" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC4" name="chk_ENC4" value="chk_ENC4" type="checkbox">
                                                        </span>
                                                        <input id="respuesta8" name="respuesta8" type="text" value="Por Call Center" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 6---------------------------------------------------->
                                                <div class="col-xs-12"><input id="pregunta6" name="pregunta6" class="text-bold form-control" readonly value="5. ¿Qué atributos considera usted los más importantes dentro de una aplicación móvil?"/></div>
                                                <div class="col-xs-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC5" name="chk_ENC5" value="chk_ENC5" type="checkbox">
                                                        </span>
                                                        <input id="respuesta9" name="respuesta9" type="text" value="Rapidez" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC6" name="chk_ENC6" value="chk_ENC6" type="checkbox">
                                                        </span>
                                                        <input id="respuesta10" name="respuesta10" type="text" value="Facilidad de acceso" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC7" name="chk_ENC7" value="chk_ENC7" type="checkbox">
                                                        </span>
                                                        <input id="respuesta11" name="respuesta11" type="text" value="Personalización" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC8" name="chk_ENC8" value="chk_ENC8" type="checkbox">
                                                        </span>
                                                        <input id="respuesta12" name="respuesta12" type="text" value="Acceso a descuentos o promociones" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC9" name="chk_ENC9" value="chk_ENC9" type="checkbox">
                                                        </span>
                                                        <input id="respuesta13" name="respuesta13" type="text" value="Diseño" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC10" name="chk_ENC10" value="chk_ENC10" type="checkbox">
                                                        </span>
                                                        <input id="respuesta14" name="respuesta14" type="text" value="Innovadora" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC11" name="chk_ENC11" value="chk_ENC11" type="checkbox">
                                                        </span>
                                                        <input id="respuesta15" name="respuesta15" type="text" value="Solución" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC12" name="chk_ENC12" value="chk_ENC12" type="checkbox">
                                                        </span>
                                                        <input id="respuesta16" name="respuesta16" type="text" value="Claridad y oportunidad en la información" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 7---------------------------------------------------->            
                                                <div class="col-xs-12"><input id="pregunta17" name="pregunta17" class="text-bold form-control" readonly value="6. ¿Qué otro canal adicional le gustaría conocer estos beneficios y descuentos?"/></div>
                                                <div class="col-xs-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC13" name="chk_ENC13" value="chk_ENC13" type="checkbox">
                                                        </span>
                                                        <input id="respuesta17" name="respuesta18" type="text" value="Redes Sociales" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC14" name="chk_ENC14" value="chk_ENC14" type="checkbox">
                                                        </span>
                                                        <input id="respuesta18" name="respuesta18" type="text" value="Mail" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC15" name="chk_ENC15" value="chk_ENC15" type="checkbox">
                                                        </span>
                                                        <input id="respuesta19" name="respuesta19" type="text" value="SMS" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC16" name="chk_ENC16" value="chk_ENC16" type="checkbox">
                                                        </span>
                                                        <input id="respuesta20" name="respuesta20" type="text" value="Página Web" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC17" name="chk_ENC17" value="chk_ENC17" type="checkbox">
                                                        </span>
                                                        <input id="respuesta21" name="respuesta21" type="text" value="Llamada telefónica" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="chk_ENC18" name="chk_ENC18" value="chk_ENC18" type="checkbox">
                                                        </span>
                                                        <input id="respuesta22" name="respuesta22" type="text" value="Whatsapp" class="form-control" readonly>
                                                    </div>
                                                    <!-- /input-group -->
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 12---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta23" name="pregunta23" class="text-bold form-control" readonly value="7. ¿Qué tipo de beneficios o alianzas le gustaría que se incluyan?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta23" name="respuesta23" class="form-control">
                                                        <option></option>
                                                        <option>Restaurantes</option>
                                                        <option>Viajes y hoteles</option>
                                                        <option>Entretenimiento</option>
                                                        <option>Salud</option>
                                                        <option>Autos</option>
                                                        <option>Hogar</option>
                                                        <option>Tecnología</option>
                                                        <option>Educación</option>
                                                        <option>Moda</option>
                                                        <option>Medicinas</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 13---------------------------------------------------->
                                                <div class="col-xs-12"><input id="pregunta24" name="pregunta24" class="text-bold form-control" readonly value="7. Para finalizar, ¿Tiene alguna recomendación general que nos permita mejorar para brindarle estos beneficios y descuentos como Banco Pichincha?"/></div>
                                                <div class="col-xs-12">
                                                    <input id="respuesta24" name="respuesta24" type="text" class="form-control">
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
<script src="scripts/JS_BPEncuestaPrivilegio.js" type="text/javascript"></script>
<script src="scripts/funcionesGenerales.js" type="text/javascript"></script>