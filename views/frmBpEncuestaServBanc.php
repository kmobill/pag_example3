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
                                                <div class="col-xs-9"><input id="pregunta1" name="pregunta1" class="text-bold form-control" value="1. ¿Qué es más importante para usted?" readonly/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta1" name="respuesta1" class="form-control">
                                                        <option></option>
                                                        <option>Sentirse seguro en el Banco</option>
                                                        <option>Sentirse valorado por el Banco </option>
                                                        <option>Tener una relación cercana con el Banco</option>
                                                        <option>Descubrir y utilizar las nuevas soluciones financieras del Banco</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 2---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta2" name="pregunta2" class="text-bold form-control" value="2. Del 1 al 5, donde 1 es Totalmente falso y 5 Totalmente verdadero, ¿qué tan cierta considera que es la siguiente oración?: 'Banco Pichincha se preocupa por mí'" readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta2" name="respuesta2" class="form-control">
                                                        <option></option>
                                                        <option value="1">TOTALMENTE FALSA</option>
                                                        <option value="2">FALSA</option>
                                                        <option value="3">NI FALSA NI VERDADERA</option>
                                                        <option value="4">VERDADERA</option>
                                                        <option value="5">TOTALMENTE VERDADERA</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 3---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta3" name="pregunta3" class="text-bold form-control" readonly value="3. Cuando tiene algún inconveniente o reclamo en el Banco, ¿que acción realiza?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta3" name="respuesta3" class="form-control">
                                                        <option></option>
                                                        <option>Llama al call center</option>
                                                        <option>Va a una agencia</option>
                                                        <option>Utiliza redes sociales</option>
                                                        <option>Nada, no realiza ninguna acción</option>
                                                        <option>No ha tenido inconvenientes</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 4---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta4" name="pregunta4" class="text-bold form-control" value="4. De la escala del 1 al 5, siendo 1 muy mala y 5 muy buena ¿Cómo describiría la comunicación que tiene Banco Pichincha con usted?" readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta4" name="respuesta4" class="form-control">
                                                        <option></option>
                                                        <option value="1">MUY MALA</option>
                                                        <option value="2">MALA</option>
                                                        <option value="3">NI BUENA NI MALA</option>
                                                        <option value="4">BUENA</option>
                                                        <option value="5">MUY BUENA</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 5---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta5" name="pregunta5" class="text-bold form-control" value="5. Del 1 al 5, donde 1 es Totalmente falso y 5 Totalmente verdadero, ¿Qué tan cierta considera que es la siguiente oración: 'Suelo soñar en grande respecto al uso de mi dinero'?" readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta5" name="respuesta5" class="form-control">
                                                        <option></option>
                                                        <option value="1">TOTALMENTE FALSA</option>
                                                        <option value="2">FALSA</option>
                                                        <option value="3">NI FALSA NI VERDADERA</option>
                                                        <option value="4">VERDADERA</option>
                                                        <option value="5">TOTALMENTE VERDADERA</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 6---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta6" name="pregunta6" class="text-bold form-control" value="6. Del 1 al 5, donde 1 es Totalmente falso y 5 Totalmente verdadero, ¿Qué tan cierta considera que es la siguiente oración: 'Las actividades fuera de mis gastos básicos del día a día, son lujos'?" readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta6" name="respuesta6" class="form-control">
                                                        <option></option>
                                                        <option value="1">TOTALMENTE FALSA</option>
                                                        <option value="2">FALSA</option>
                                                        <option value="3">NI FALSA NI VERDADERA</option>
                                                        <option value="4">VERDADERA</option>
                                                        <option value="5">TOTALMENTE VERDADERA</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 7---------------------------------------------------->
                                                <div class="col-xs-8"><input id="pregunta7" name="pregunta7" class="text-bold form-control" value="7. Sin considerar gastos básicos del día a día ¿Cuáles son las dos necesidades a las que aspiraría destinar sus ingresos?" readonly /></div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta7" name="respuesta7" class="form-control">
                                                        <option></option>
                                                        <option>Educación</option>
                                                        <option>Arriendo/pago crédito vivienda</option>
                                                        <option>Vacaciones o entretenimiento</option>
                                                        <option>Retiro para la jubilación</option>
                                                        <option>Vehículo</option>
                                                        <option>Salud</option>
                                                        <option>Pago de tarjeta</option>
                                                        <option>Negocio</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-2">
                                                    <select id="respuesta8" name="respuesta8" class="form-control">
                                                        <option></option>
                                                        <option>Educación</option>
                                                        <option>Arriendo/pago crédito vivienda</option>
                                                        <option>Vacaciones o entretenimiento</option>
                                                        <option>Retiro para la jubilación</option>
                                                        <option>Vehículo</option>
                                                        <option>Salud</option>
                                                        <option>Pago de tarjeta</option>
                                                        <option>Negocio</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 9---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta9" name="pregunta9" class="text-bold form-control" value="8. ¿De qué manera realiza sus transacciones con mayor frecuencia?" readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta9" name="respuesta9" class="form-control">
                                                        <option></option>
                                                        <option>Utiliza servicios Banco Pichincha (App, Banca web, tarjeta de débito)</option>
                                                        <option>Utiliza servicios de otros Bancos o cooperativas</option>
                                                        <option>Solo utiliza efectivo</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 10---------------------------------------------------->
                                                <div class="col-xs-12"><input id="pregunta10" name="pregunta10" class="text-bold form-control" value="9. ¿Qué metas a largo plazo relacionadas con el dinero tiene actualmente? Por ejemplo: ahorro para un carro)" readonly /></div>
                                                <div class="col-xs-12">
                                                    <input id="respuesta10" name="respuesta10" class="form-control" maxlength="500"/>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 11---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta11" name="pregunta11" class="text-bold form-control" value="10. Respecto a la pregunta anterior, ¿cómo planea alcanzar aquellas metas" readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta11" name="respuesta11" class="form-control">
                                                        <option></option>
                                                        <option>Ahorrando en el Banco</option>
                                                        <option>Ahorrando de una forma personal como por ejemplo en una alcancía</option>
                                                        <option>No suele ahorrar</option>
                                                        <option>Invertir el dinero en una póliza</option>
                                                        <option>Invertir en un negocio</option>
                                                        <option>No aplica o no está seguro/a</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 12---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta12" name="pregunta12" class="text-bold form-control" value="11. En los últimos 12 meses ¿sus ingresos pudieron cubrir todos sus gastos?" readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta12" name="respuesta12" class="form-control">
                                                        <option></option>
                                                        <option>Si todos</option>
                                                        <option>Parcialmente</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 13---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta13" name="pregunta13" class="text-bold form-control" value="12. En los últimos 12 meses ¿Cómo ha solventado sus gastos?" readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta13" name="respuesta13" class="form-control">
                                                        <option></option>
                                                        <option>Por medio de mis ingresos o ahorros de mi cuenta</option>
                                                        <option>Al acudir a una entidad financiera en busca de un préstamo</option>
                                                        <option>Lo solventé sin necesidad de acudir a una entidad financiera</option>
                                                        <option>No estoy seguro/a</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 14---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta14" name="pregunta14" class="text-bold form-control" value="13. ¿En el último año, experimentó algún evento que impactó sus finanzas personales como una pérdida de empleo o costos médicos significativos, etc? " readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta14" name="respuesta14" class="form-control">
                                                        <option></option>
                                                        <option>Si, pero ya me recuperé</option>
                                                        <option>Si, pero todavía no me recupero</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 15---------------------------------------------------->
                                                <div class="col-xs-6"><input id="pregunta15" name="pregunta15" class="text-bold form-control" value="13.1 ¿Cómo se recuperó?" readonly /></div>
                                                <div class="col-xs-6">
                                                    <input id="respuesta15" name="respuesta15" class="form-control" maxlength="500"/>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 16---------------------------------------------------->
                                                <div class="col-xs-6"><input id="pregunta16" name="pregunta16" class="text-bold form-control" value="13.2 ¿Qué necesita para recuperarse?" readonly /></div>
                                                <div class="col-xs-6">
                                                    <input id="respuesta16" name="respuesta16" class="form-control" maxlength="500"/>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 17---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta17" name="pregunta17" class="text-bold form-control" value="14. De la escala del 1 al 5, siendo 1 muy bajo y 5 muy alto ¿Qué nivel de confianza le da Banco Pichincha?" readonly /></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta17" name="respuesta17" class="form-control">
                                                        <option></option>
                                                        <option value="1">MUY BAJO</option>
                                                        <option value="2">BAJO</option>
                                                        <option value="3">MEDIO</option>
                                                        <option value="4">ALTO</option>
                                                        <option value="5">MUY ALTO</option>
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
<script src="scripts/JS_BPEncuestaServBanc.js" type="text/javascript"></script>
<script src="scripts/funcionesGenerales.js" type="text/javascript"></script>