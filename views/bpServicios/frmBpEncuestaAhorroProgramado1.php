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
                            <div class="col-xs-12">
                                <div class="box box-widget bg-gray-light">
                                    <div class="box-header with-border bg-gray">
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
                                    <div class="box-body">
                                        <input type="text" class="form-control input-sm hidden" id="horaInicio" name="horaInicio" readonly/>
                                        <div class="row">
                                            <div class="row1">
                                                <div class=" col-xs-6"> <b class="text-bold text-left text-bold">Resultados de gestión </b> </div>
                                                <div class="col-xs-6 text-left"> <b class="text-bold text-left text-bold">Teléfonos por marcar </b> </div>
                                            </div>
                                            <div class="row1">
                                                <div class=" col-xs-2">
                                                    <select class="form-control input-sm" id="level1" name="level1" required>
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class=" col-xs-2">
                                                    <select class="form-control input-sm" id="level2" name="level2" required>
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class=" col-xs-2">
                                                    <select class="form-control input-sm" id="level3" name="level3">
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
                                                <div class="col-xs-1">
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
                                                        <?php
                                                        require '../config/connection.php';
                                                        $result = ejecutarConsulta("SELECT Id FROM user where usergroup >='3' and state='1' ORDER BY id");
                                                        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                                            echo '<option value="' . $row["Id"] . '">' . $row["Id"] . '</option>';
                                                        }
                                                        ?>
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
                                    </div>
                                </div>
                            </div>
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
                                <div class="col-xs-1"> <b>EDAD </b>
                                    <input type="text" class="form-control input-sm" id="EDAD" name="EDAD" readonly/>
                                </div>
                                <div class="col-xs-3"> <b>REGION </b>
                                    <input type="text" class="form-control input-sm" id="REGION" name="REGION" readonly/>
                                </div>
                                <div class="col-xs-2"> <b>LOCALIDAD </b>
                                    <input type="text" class="form-control input-sm" id="LOCALIDAD" name="LOCALIDAD" readonly/>
                                </div>
                            </div>

                            <div id="pnlEncuesta2" class="col-xs-12 btn">
                                <div class="box box-widget bg-gray">
                                    <div class="box-body col-xs-12 btn">
                                        <!---------------------------------------------------------PREGUNTA 1---------------------------------------------------->
                                        <div class="col-xs-12"><textarea id="pregunta1" name="pregunta1" class="text-bold form-control" readonly>1. De los siguientes productos financieros de ahorro o inversión, ¿cuáles conoce Ud. que ofrece Banco Pichincha a sus clientes? </textarea></div>
                                        <div class="col-xs-3">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input id="chk_ENC1" name="chk_ENC1" value="chk_ENC1" type="checkbox">
                                                </span>
                                                <input id="respuesta1" name="respuesta1" type="text" value="Cuenta de ahorros" class="form-control" readonly>
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input id="chk_ENC2" name="chk_ENC2" value="chk_ENC2" type="checkbox">
                                                </span>
                                                <input id="respuesta2" name="respuesta2" type="text" value="Cuenta corriente" class="form-control" readonly>
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input id="chk_ENC3" name="chk_ENC3" value="chk_ENC3" type="checkbox">
                                                </span>
                                                <input id="respuesta3" name="respuesta3" type="text" value="Inversiones / Pólizas / Plazo fijo" class="form-control" readonly>
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input id="chk_ENC4" name="chk_ENC4" value="chk_ENC4" type="checkbox">
                                                </span>
                                                <input id="respuesta4" name="respuesta4" type="text" value="Cuenta Ahorro Programado- Ahorro Futuro" class="form-control" readonly>
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                        <!---------------------------------------------------------PREGUNTA 2---------------------------------------------------->
                                        <div class="col-xs-10"><textarea id="pregunta5" name="pregunta5" class="text-bold form-control" readonly>2. Conociendo ahora de que se trata, ¿Qué tan atractivo le resulta la propuesta del producto Cuenta de Ahorro Programado de Banco Pichincha? Utilice una escala de 1 a 5 donde 1 significa Nada Atractivo y 5 significa Muy Atractivo. Recuerde que Ud. puede utilizar valores intermedios.</textarea></div>
                                        <div class="col-xs-2">
                                            <select id="respuesta5" name="respuesta5" class="form-control">
                                                <option value=""></option>
                                                <option >1</option>
                                                <option >2</option>
                                                <option >3</option>
                                                <option >4</option>
                                                <option >5</option>
                                            </select> 
                                        </div>

                                        <!---------------------------------------------------------PREGUNTA 3---------------------------------------------------->
                                        <div class="col-xs-6"><input id="pregunta6" name="pregunta6" class="text-bold form-control" value="¿Por qué no le parece atractivo el producto?" readonly/></div>
                                        <div class="col-xs-6">
                                            <input id="respuesta6" name="respuesta6" type="text" class="form-control">
                                        </div>

                                        <!---------------------------------------------------------PREGUNTA 4---------------------------------------------------->
                                        <div class="col-xs-12"><textarea id="pregunta7" name="pregunta7" class="text-bold form-control" readonly>3. ¿Cuál sería la razón principal para destinar su dinero a un fondo de ahorro programado?</textarea></div>
                                        <div class="col-xs-12">
                                            <input id="respuesta7" name="respuesta7" type="text" class="form-control">
                                        </div>
                                        <!---------------------------------------------------------PREGUNTA 5---------------------------------------------------->
                                        <div class="col-xs-12"><textarea id="pregunta8" name="pregunta8" class="text-bold form-control" readonly>4. ¿Cuál sería un motivo potencial por el que usted retiraría su dinero antes de la fecha pactada?</textarea></div>
                                        <div class="col-xs-12">
                                            <input id="respuesta8" name="respuesta8" type="text" class="form-control">
                                        </div>
                                        <!---------------------------------------------------------PREGUNTA 6---------------------------------------------------->
                                        <div class="col-xs-12"><textarea id="pregunta9" name="pregunta9" class="text-bold form-control" readonly>5. ¿Cuál sería un factor determinante para que no decida abrir una cuenta de Ahorro programado?</textarea></div>
                                        <div class="col-xs-12">
                                            <input id="respuesta9" name="respuesta9" type="text" class="form-control">
                                        </div>
                                        <!---------------------------------------------------------PREGUNTA 7---------------------------------------------------->            
                                        <div class="col-xs-12"><input id="pregunta10" name="pregunta10" class="text-bold form-control" readonly value="Para que el producto Ahorro Programado se adapte a sus necesidades, por favor, responda cómo preferiría que fueran las condiciones en cuanto a las siguientes características:"/></div>
                                        <div class="col-xs-9"><input id="pregunta11" name="pregunta11" class="text-bold form-control" readonly value="6. Cuál es el saldo promedio, dispuesto a ahorrar:"/></div>
                                        <div class="col-xs-3">
                                            <select id="respuesta11" name="respuesta11" class="form-control">
                                                <option></option>
                                                <option>De $5 a $14</option>
                                                <option>De $15 a $29</option>
                                                <option>De $30 a 45$</option>
                                                <option>Mayor a $46</option>
                                            </select>
                                        </div>
                                        <!---------------------------------------------------------PREGUNTA 12---------------------------------------------------->
                                        <div class="col-xs-9"><input id="pregunta12" name="pregunta12" class="text-bold form-control" readonly value="7. Plazo o tiempo de ahorro de su saldo:"/></div>
                                        <div class="col-xs-3">
                                            <select id="respuesta12" name="respuesta12" class="form-control">
                                                <option></option>
                                                <option>3 meses</option>
                                                <option>6 meses</option>
                                                <option>9 meses</option>
                                                <option>12 meses</option>
                                            </select>
                                        </div>
                                        <!---------------------------------------------------------PREGUNTA 13---------------------------------------------------->
                                        <div class="col-xs-9"><input id="pregunta13" name="pregunta13" class="text-bold form-control" readonly value="8. Condiciones por retiro de dinero anticipado:"/></div>
                                        <div class="col-xs-3">
                                            <select id="respuesta13" name="respuesta13" class="form-control">
                                                <option value=""></option>
                                                <option >Penalización por pronto retiro</option>
                                                <option >No se pague la Bonificación</option>
                                                <option >Calamidad Doméstica</option>
                                                <option >Motivos Personales</option>
                                            </select> 
                                        </div>
                                        <!---------------------------------------------------------PREGUNTA 15---------------------------------------------------->
                                        <div class="col-xs-12"><input id="pregunta14" name="pregunta14" class="text-bold form-control" readonly value="9. Por cuál medio quisiera obtener información sobre este producto: "/></div>
                                        <div class="col-xs-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input id="chk_ENC6" name="chk_ENC6" value="chk_ENC6" type="checkbox">
                                                </span>
                                                <input id="respuesta14" name="respuesta14" type="text" value="Ejecutivo en agencia" class="form-control" readonly>
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input id="chk_ENC7" name="chk_ENC7" value="chk_ENC7" type="checkbox">
                                                </span>
                                                <input id="respuesta15" name="respuesta15" type="text" value="Radio, televisión y prensa" class="form-control" readonly>
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input id="chk_ENC8" name="chk_ENC8" value="chk_ENC8" type="checkbox">
                                                </span>
                                                <input id="respuesta16" name="respuesta16" type="text" value="Redes Sociales" class="form-control" readonly>
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input id="chk_ENC9" name="chk_ENC9" value="chk_ENC9" type="checkbox">
                                                </span>
                                                <input id="respuesta17" name="respuesta17" type="text" value="Correo Electrónico" class="form-control" readonly>
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input id="chk_ENC10" name="chk_ENC10" value="chk_ENC10" type="checkbox">
                                                </span>
                                                <input id="respuesta18" name="respuesta18" type="text" value="Call Center" class="form-control" readonly>
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input id="chk_ENC11" name="chk_ENC11" value="chk_ENC11" type="checkbox">
                                                </span>
                                                <input id="respuesta19" name="respuesta19" type="text" value="App" class="form-control" readonly>
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <input id="chk_ENC12" name="chk_ENC12" value="chk_ENC12" type="checkbox">
                                                </span>
                                                <input id="respuesta20" name="respuesta20" type="text" value="Ninguna" class="form-control" readonly>
                                            </div>
                                            <!-- /input-group -->
                                        </div>
                                        <!---------------------------------------------------------PREGUNTA 16---------------------------------------------------->
                                        <div class="col-xs-12"><input id="pregunta21" name="pregunta21" class="text-bold form-control" readonly value="10. Si tuviera que incluir un beneficio adicional a esta cuenta de ahorro, para que se adapte a sus necesidades ¿cuál sería?"/></div>
                                        <div class="col-xs-12">
                                            <input id="respuesta21" name="respuesta21" type="text" class="form-control">
                                        </div>
                                        <!---------------------------------------------------------PREGUNTA 17---------------------------------------------------->
                                        <div class="col-xs-12"><input id="pregunta22" name="pregunta22" class="text-bold form-control" readonly value="11. Para finalizar: En caso de un sorteo o promoción, ¿qué tipo de obsequio o premio por ahorro le sería atractivo?"/></div>
                                        <div class="col-xs-12">
                                            <input id="respuesta22" name="respuesta22" type="text" class="form-control">
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
<script src="scripts/bpEncuestaAhorroProgramado2.js" type="text/javascript"></script>
<script src="scripts/funcions.js" type="text/javascript"></script>