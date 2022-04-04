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
                                        <div class="col-xs-4"> <b>CAMPO 1 </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO1" name="CAMPO1" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>CAMPO 2 </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO2" name="CAMPO2" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>CAMPO 3 </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO3" name="CAMPO3" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>CAMPO 4 </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO4" name="CAMPO4" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>CAMPO 5 </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO5" name="CAMPO5" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>CAMPO 6 </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO6" name="CAMPO6" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>CAMPO 7 </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO7" name="CAMPO7" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>CAMPO 8 </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO8" name="CAMPO8" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>CAMPO 9 </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO9" name="CAMPO9" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b>CAMPO 10 </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO10" name="CAMPO10" readonly/>
                                        </div>
                                    </div>

                                    <div id="pnlEncuesta" class="col-xs-12 btn">
                                        <div class="box box-widget bg-gray">
                                            <div class="box-body col-xs-12 btn">
                                                <!---------------------------------------------------------PREGUNTA 1---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta1" name="pregunta1" class="text-bold form-control" value="1. Coménteme, ¿Cuál fue la razón porque no aceptó el efectivo express?" readonly/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta1" name="respuesta1" class="form-control">
                                                        <option></option>
                                                        <option>Por tarifa de avance</option>
                                                        <option>Tasa de interés</option>
                                                        <option>Por valor de Solca</option>
                                                        <option>No lo requiero</option>
                                                        <option>El cupo no es lo suficiente</option>
                                                        <option>Por la demora en el servicio</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 2---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta2" name="pregunta2" class="text-bold form-control" value="2. Si tuviese que elegir un efectivo express porque la elegiría? " readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta2" name="respuesta2" class="form-control">
                                                        <option></option>
                                                        <option>Capacitación o información de cómo invertir – Educación financiera</option>
                                                        <option>Necesidad</option>
                                                        <option>Respaldo</option>
                                                        <option>Moda</option>
                                                        <option>Estudios</option>
                                                        <option>Status</option>
                                                        <option>Tasa preferenciales</option>
                                                        <option>Tecnología</option>
                                                        <option>Hogar</option>
                                                        <option>Salud</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 3---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta3" name="pregunta3" class="text-bold form-control" readonly value="3. Si usted pudiese elegir el cupo monto de su efectivo express cual sería?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta3" name="respuesta3" class="form-control">
                                                        <option></option>
                                                        <option>100% del cupo de su tarjeta</option>
                                                        <option>80% del cupo de su tarjeta</option>
                                                        <option>50% del cupo de su tarjeta</option>
                                                        <option>Ninguna de las anteriores</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 4---------------------------------------------------->
                                                <div class="col-xs-6"><input id="pregunta4" name="pregunta4" class="text-bold form-control" value="3.1. ¿Por qué?" readonly /></div>
                                                <div class="col-xs-6">
                                                    <input id="respuesta4" name="respuesta4" class="form-control" maxlength="500"/>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 5---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta5" name="pregunta5" class="text-bold form-control" value="4. ¿Qué tipo de atributos consideraría atractivos para que pueda aceptar un efectivo express con Banco Pichincha?" readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta5" name="respuesta5" class="form-control">
                                                        <option></option>
                                                        <option>Capacitación</option>
                                                        <option>Descuentos</option>
                                                        <option>Premios</option>
                                                        <option>Bonos de bienvenida</option>
                                                        <option>Cash back (es decir devolverle un porcentaje de dinero por sus consumos)</option>
                                                        <option>Millas para LATAM</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 6---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta6" name="pregunta6" class="text-bold form-control" value="5. ¿Qué le motivaría a usar un efectivo express" readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta6" name="respuesta6" class="form-control">
                                                        <option></option>
                                                        <option>Moda</option>
                                                        <option>Meses gratis</option>
                                                        <option>Premios</option>
                                                        <option>Bonos de bienvenida</option>
                                                        <option>Facilidad de pagos</option>
                                                        <option>Escases de efectivo</option>
                                                        <option>Acceso a descuentos</option>
                                                        <option>Pago de servicios</option>
                                                        <option>Pago por cuotas</option>
                                                        <option>Ninguno</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 7---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta7" name="pregunta7" class="text-bold form-control" value="6. ¿Cuáles son las razones por las que no desearía aceptar un efectivo express?" readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta7" name="respuesta7" class="form-control">
                                                        <option></option>
                                                        <option>Es muy caro</option>
                                                        <option>Es de baja calidad</option>
                                                        <option>No quiero algo como eso</option>
                                                        <option>Tengo algo similar</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 8---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta8" name="pregunta8" class="text-bold form-control" value="7. Que productos le gustaría recibir de parte de nosotros?" readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta8" name="respuesta8" class="form-control">
                                                        <option></option>
                                                        <option>Crédito</option>
                                                        <option>Tarjeta de crédito</option>
                                                        <option>Inversión</option>
                                                        <option>Cuentas de ahorros</option>
                                                        <option>Cuentas de ahorros futuro</option>
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
<script src="scripts/JS_BPEncuestaNoDiferido_EfecExp.js" type="text/javascript"></script>
<script src="scripts/funcionesGenerales.js" type="text/javascript"></script>