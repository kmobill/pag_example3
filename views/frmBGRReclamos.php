<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<style></style>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="text-bold">Campaña BGR Encuestas</h4> </div>
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
                                    <div class="btn bg-gray-light">
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
                                        <div class="col-xs-2"> <b>TIPO CLIENTE </b>
                                            <input type="text" class="form-control input-sm" id="TIPO_CLIENTE" name="TIPO_CLIENTE" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>SEGMENTO </b>
                                            <input type="text" class="form-control input-sm" id="SEGMENTO" name="SEGMENTO" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>FECHA </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO1" name="CAMPO1" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>ATENCION </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO2" name="CAMPO2" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>CIUDAD </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO3" name="CAMPO3" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>CIUDAD 1 </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO4" name="CAMPO4" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>TIPO_CLIENTE </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO5" name="CAMPO5" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>CAJERO/USUARIO </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO6" name="CAMPO6" readonly/>
                                        </div>
                                        <div class="col-xs-4"> <b>TRAMITES</b>
                                            <input type="text" class="form-control input-sm" id="CAMPO7" name="CAMPO7" readonly/>
                                        </div>
                                        <div class="col-xs-4"> <b>SEGMENTO </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO8" name="CAMPO8" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>FECHA ATENCION </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO9" name="CAMPO9" readonly/>
                                        </div>
                                        <div class="col-xs-4"> <b>TIPO </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO10" name="CAMPO10" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div id="pnlEncuesta" class="col-xs-12 btn">
                                    <div class="box box-widget bg-gray">
                                        <div class="box-body">
                                            <!---------------------------------------------------------PREGUNTA 9---------------------------------------------------->
                                            <div class="col-xs-12"><label>PILAR - LEALTAD / ATRIBUTO - SATISFACCIÓN</label></div>
                                            <div class="col-xs-10"><input id="pregunta9" name="pregunta9" class="text-bold form-control" value="Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido en BGR" readonly/></div>
                                            <div class="col-xs-2">
                                                <select id="respuesta9" name="respuesta9" class="form-control">
                                                    <option ></option>
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
                                                </select>
                                            </div>
                                            <div class="col-xs-4">
                                                <input id="pregunta9_1" name="pregunta9_1" class="text-bold form-control" readonly />
                                            </div>
                                            <div class="col-xs-8">
                                                <input id="respuesta9_1" name="respuesta9_1" type="text" class="form-control" maxlength="500">
                                            </div>
                                            <!---------------------------------------------------------PREGUNTA 5---------------------------------------------------->
                                            <div class="col-xs-12"><label id="pilar5">PILAR - SERVICIO / ATRIBUTO - Empatía</label></div>
                                            <div class="col-xs-10"><input id="pregunta5" name="pregunta5" class="text-bold form-control" value="La persona que atendió su reclamo entendió su necesidad" readonly/></div>
                                            <div class="col-xs-2">
                                                <select id="respuesta5" name="respuesta5" class="form-control">
                                                    <option ></option>
                                                    <option>Si</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-4">
                                                <input id="pregunta5_1" name="pregunta5_1" class="text-bold form-control" readonly value="¿Cuál es el motivo de su calificación?" />
                                            </div>
                                            <div class="col-xs-8">
                                                <input id="respuesta5_1" name="respuesta5_1" type="text" class="form-control" maxlength="500">
                                            </div>
                                            <!---------------------------------------------------------PREGUNTA 7---------------------------------------------------->
                                            <div class="col-xs-12"><label id="pilar7">PILAR - PERSONALIZACIÓN / ATRIBUTO - Solución</label></div>
                                            <div class="col-xs-10"><input id="pregunta7" name="pregunta7" class="text-bold form-control" readonly value="El servicio que recibió de la persona que le atendió fue el esperado"/></div>
                                            <div class="col-xs-2">
                                                <select id="respuesta7" name="respuesta7" class="form-control">
                                                    <option></option>
                                                    <option></option>
                                                    <option>Si</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-4">
                                                <input id="pregunta7_1" name="pregunta7_1" class="text-bold form-control" readonly value="¿Cuál es el motivo de su calificación?" />
                                            </div>
                                            <div class="col-xs-8">
                                                <input id="respuesta7_1" name="respuesta7_1" type="text" class="form-control" maxlength="500">
                                            </div>
                                            <!---------------------------------------------------------PREGUNTA 8---------------------------------------------------->
                                            <div class="col-xs-12"><label id="pilar8">PILAR - PERSONALIZACIÓN / ATRIBUTO - Proactividad</label></div>
                                            <div class="col-xs-10"><input id="pregunta8" name="pregunta8" class="text-bold form-control" value="Recibió un trato personalizado por parte de la persona que le atendió en su reclamo" readonly/></div>
                                            <div class="col-xs-2">
                                                <select id="respuesta8" name="respuesta8" class="form-control">
                                                    <option ></option>
                                                    <option>Si</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-4">
                                                <input id="pregunta8_1" name="pregunta8_1" class="text-bold form-control" readonly value="¿Cuál es el motivo de su calificación?" />
                                            </div>
                                            <div class="col-xs-8">
                                                <input id="respuesta8_1" name="respuesta8_1" type="text" class="form-control" maxlength="500">
                                            </div>
                                            <!---------------------------------------------------------PREGUNTA 10---------------------------------------------------->
                                            <div class="col-xs-12"><label>PILAR - LEALTAD / ATRIBUTO - ESFUERZO</label></div>
                                            <div class="col-xs-10"><input id="pregunta10" name="pregunta10" class="text-bold form-control" readonly value="¿Qué tan fácil o sencillo es para usted gestionar su reclamo con BGR?"/></div>
                                            <div class="col-xs-2">
                                                <select id="respuesta10" name="respuesta10" class="form-control">
                                                    <option ></option>
                                                    <option value="MUY FACIL">MUY FACIL</option>
                                                    <option value="FACIL">FACIL</option>
                                                    <option value="POCO FACIL">POCO FACIL</option>
                                                    <option value="DIFICIL">DIFICIL</option>
                                                    <option value="MUY DIFICIL">MUY DIFICIL</option>
                                                    <!--<option value="NO PROPORCIONA INFORMACION">NO PROPORCIONA INFORMACION</option>-->
                                                </select>
                                            </div>
                                            <div class="col-xs-4">
                                                <input id="pregunta10_1" name="pregunta10_1" class="text-bold form-control" readonly />
                                            </div>
                                            <div class="col-xs-8">
                                                <input id="respuesta10_1" name="respuesta10_1" type="text" class="form-control" maxlength="500">
                                            </div>
                                            <!---------------------------------------------------------PREGUNTA 15---------------------------------------------------->
                                            <div class="col-xs-12"><label>PILAR - LEALTAD / ATRIBUTO - RECOMENDACIÓN</label></div>
                                            <div class="col-xs-10"><textarea id="pregunta11" name="pregunta11" class="text-bold form-control" readonly>En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría ¿en qué grado recomendaría BGR a un familiar, amigo o colega de trabajo?, siendo 0 definitivamente no recomendaría y 10 definitivamente sí lo recomendaría</textarea></div>
                                            <div class="col-xs-2">
                                                <select id="respuesta11" name="respuesta11" class="form-control">
                                                    <option ></option>
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
                                                </select>
                                            </div>
                                            <div class="col-xs-4">
                                                <input id="pregunta11_1" name="pregunta11_1" class="text-bold form-control" readonly value="¿Cuál es el motivo de su calificación?" />
                                            </div>
                                            <div class="col-xs-8">
                                                <input id="respuesta11_1" name="respuesta11_1" type="text" class="form-control" maxlength="500">
                                            </div>

                                            <!---------------------------------------------------------PREGUNTA 6---------------------------------------------------->
                                            <div class="col-xs-12"><label>Experiencia con BGR</label></div>
                                            <div class="col-xs-10"><input id="pregunta6" name="pregunta6" class="text-bold form-control" readonly value="Si su experiencia con BGR se mantiene igual a la que ha tenido hasta ahora, consideraría seguir con nosotros, por cuánto tiempo más" /></div>
                                            <div class="col-xs-2">
                                                <select id="respuesta6" name="respuesta6" class="form-control">
                                                    <option></option>
                                                    <option>Menos de un año</option>
                                                    <option>Entre 1 a 3 años</option>
                                                    <option>Entre 3 a 5 años</option>
                                                    <option>Mas de 5 años</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-4">
                                                <input id="pregunta6_1" name="pregunta6_1" class="text-bold form-control" readonly value="¿Cuál es el motivo de su calificación?" />
                                            </div>
                                            <div class="col-xs-8">
                                                <input id="respuesta6_1" name="respuesta6_1" type="text" class="form-control" maxlength="500">
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
<script src="scripts/JS_BGRReclamo.js" type="text/javascript"></script>
<script src="scripts/funcionesGenerales.js" type="text/javascript"></script>