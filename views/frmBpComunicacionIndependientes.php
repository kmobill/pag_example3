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
                                        <div class="col-xs-4"> <b>TIPO INDEPENDIENTE </b>
                                            <input type="text" class="form-control input-sm" id="CAMPO1" name="CAMPO1" readonly/>
                                        </div>
                                    </div>

                                    <div id="pnlEncuesta" class="col-xs-12 btn">
                                        <div class="box box-widget bg-gray">
                                            <div class="box-body col-xs-12 btn">
                                                <!---------------------------------------------------------PREGUNTA 1---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta1" name="pregunta1" class="text-bold form-control" value="1. ¿Cuál es su actividad económica actual?" readonly/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta1" name="respuesta1" class="form-control">
                                                        <option value=""></option>
                                                        <option>Dependiente</option>
                                                        <option>Independiente</option>
                                                        <option>Jubilado</option>
                                                        <option>Tengo 2 actividades económicas: independiente + dependiente</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 2---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta2" name="pregunta2" class="text-bold form-control" value="2. Como INDEPENDIENTE ¿A qué se dedica? " readonly/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta2" name="respuesta2" class="form-control">
                                                        <option value=""></option>
                                                        <option>Comerciante</option>
                                                        <option>Rentista</option>
                                                        <option>Profesional Independiente</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 3---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta3" name="pregunta3" class="text-bold form-control" value="3. ¿Dispone de RUC o RISE vigente en este momento?" readonly/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta3" name="respuesta3" class="form-control">
                                                        <option value=""></option>
                                                        <option>Si</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 4---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta4" name="pregunta4" class="text-bold form-control" readonly value="4. A la hora de solicitar un préstamo personal ¿Cuál es su primera opción?"/></div>                                        
                                                <div class="col-xs-3">
                                                    <select id="respuesta4" name="respuesta4" class="form-control">
                                                        <option value=""></option>
                                                        <option>Banco</option>
                                                        <option>Cooperativa</option>
                                                        <option>IESS</option>
                                                        <option>Amigo o familiar</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 5---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta5" name="pregunta5" class="text-bold form-control" readonly value="4.1 ¿Por qué SERÍA ESTA SU PRIMERA OPCIÓN?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta5" name="respuesta5" class="form-control">
                                                        <option value=""></option>
                                                        <option>Tasa de interés más conveniente</option>
                                                        <option>Me da más confianza</option>
                                                        <option>Ya he solicitado anteriormente</option>
                                                        <option>Me dan respuesta más rápido y proceso es más fácil</option>
                                                        <option>No me piden muchos requisitos</option>
                                                        <option>Tengo cuenta ahorros/corriente en la institución</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 6---------------------------------------------------->
                                                <div class="col-xs-12"><textarea id="txtEnunciado" class="text-bold form-control" readonly>5.- Si en este momento usted hiciera una solicitud de préstamo en Banco Pichincha ¿Qué documentos de los que le voy a mencionar podría entregar de forma inmediata para justificar su actividad e ingresos?</textarea></div>
                                                <div class="col-xs-9"><input id="pregunta6" name="pregunta6" class="text-bold form-control" readonly value="5.1. RUC o RISE ¿Dispone?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta6" name="respuesta6" class="form-control">
                                                        <option value=""></option>
                                                        <option>Si</option>
                                                        <option>No</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 7---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta7" name="pregunta7" class="text-bold form-control" readonly value="¿En cuánto tiempo puede entregarlo?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta7" name="respuesta7" class="form-control">
                                                        <option value=""></option>
                                                        <option>Inmediatamente</option>
                                                        <option>Menos de 24 horas</option>
                                                        <option>Menos de 48 horas</option>
                                                        <option>Entre 2 a 5 días</option>
                                                        <option>Más de 5 días</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 8---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta8" name="pregunta8" class="text-bold form-control" readonly value="5.2. Declaraciones de IVA, (de los últimos 3 meses ó semestral dependiendo la actividad ¿Dispone?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta8" name="respuesta8" class="form-control">
                                                        <option value=""></option>
                                                        <option>Si</option>
                                                        <option>No</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 9---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta9" name="pregunta9" class="text-bold form-control" readonly value="¿En cuánto tiempo puede entregarlo?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta9" name="respuesta9" class="form-control">
                                                        <option value=""></option>
                                                        <option>Inmediatamente</option>
                                                        <option>Menos de 24 horas</option>
                                                        <option>Menos de 48 horas</option>
                                                        <option>Entre 2 a 5 días</option>
                                                        <option>Más de 5 días</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 10---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta10" name="pregunta10" class="text-bold form-control" readonly value="5.3. Declaraciones de Impuesto a la Renta, últimos 3 años ¿Dispone?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta10" name="respuesta10" class="form-control">
                                                        <option value=""></option>
                                                        <option>Si</option>
                                                        <option>No</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 11---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta11" name="pregunta11" class="text-bold form-control" readonly value="¿En cuánto tiempo puede entregarlo?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta11" name="respuesta11" class="form-control">
                                                        <option value=""></option>
                                                        <option>Inmediatamente</option>
                                                        <option>Menos de 24 horas</option>
                                                        <option>Menos de 48 horas</option>
                                                        <option>Entre 2 a 5 días</option>
                                                        <option>Más de 5 días</option>
                                                    </select> 
                                                </div>

                                                <!---------------------------------------------------------PREGUNTA 12---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta12" name="pregunta12" class="text-bold form-control" readonly value="5.4. Referencias comerciales (clientes y/o proveedores) ¿Dispone?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta12" name="respuesta12" class="form-control">
                                                        <option value=""></option>
                                                        <option>Si</option>
                                                        <option>No</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 13---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta13" name="pregunta13" class="text-bold form-control" readonly value="¿En cuánto tiempo puede entregarlo?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta13" name="respuesta13" class="form-control">
                                                        <option value=""></option>
                                                        <option>Inmediatamente</option>
                                                        <option>Menos de 24 horas</option>
                                                        <option>Menos de 48 horas</option>
                                                        <option>Entre 2 a 5 días</option>
                                                        <option>Más de 5 días</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 14---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta14" name="pregunta14" class="text-bold form-control" readonly value="5.5. Referencias bancarias ¿Dispone?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta14" name="respuesta14" class="form-control">
                                                        <option value=""></option>
                                                        <option>Si</option>
                                                        <option>No</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 15---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta15" name="pregunta15" class="text-bold form-control" readonly value="¿En cuánto tiempo puede entregarlo?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta15" name="respuesta15" class="form-control">
                                                        <option value=""></option>
                                                        <option>Inmediatamente</option>
                                                        <option>Menos de 24 horas</option>
                                                        <option>Menos de 48 horas</option>
                                                        <option>Entre 2 a 5 días</option>
                                                        <option>Más de 5 días</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 16---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta16" name="pregunta16" class="text-bold form-control" readonly value="5.6. Movimientos de cuentas de otros bancos ¿Dispone?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta16" name="respuesta16" class="form-control">
                                                        <option value=""></option>
                                                        <option>Si</option>
                                                        <option>No</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 17---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta17" name="pregunta17" class="text-bold form-control" readonly value="¿En cuánto tiempo puede entregarlo?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta17" name="respuesta17" class="form-control">
                                                        <option value=""></option>
                                                        <option>Inmediatamente</option>
                                                        <option>Menos de 24 horas</option>
                                                        <option>Menos de 48 horas</option>
                                                        <option>Entre 2 a 5 días</option>
                                                        <option>Más de 5 días</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 18---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta18" name="pregunta18" class="text-bold form-control" readonly value="6. De los documentos que le voy a mencionar ¿Cuál considera que es el más complejo de conseguir? "/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta18" name="respuesta18" class="form-control">
                                                        <option value=""></option>
                                                        <option>RUC o RISE</option>
                                                        <option>Declaraciones de IVA</option>
                                                        <option>Declaraciones de Impuesto a la Renta</option>
                                                        <option>Referencias comerciales (clientes y/o proveedores)</option>
                                                        <option>Referencias bancarias</option>
                                                        <option>Movimientos de cuentas de otros bancos</option>
                                                        <option>Todos</option>
                                                        <option>Ninguno</option>
                                                    </select> 
                                                </div>
                                                <!---------------------------------------------------------PREGUNTA 19---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta19" name="pregunta19" class="text-bold form-control" readonly value="6.1 ¿Por qué le resultaría complejo conseguirlo?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta19" name="respuesta19" class="form-control">
                                                        <option value=""></option>
                                                        <option>No sé cómo conseguirlos</option>
                                                        <option>Requieren de mucho tiempo</option>
                                                        <option>Tengo que buscarlos/obtenerlos en varios lugares</option>
                                                        <option>Debo pedirle ayuda a alguien</option>
                                                        <option>Residencia fuera del país</option>
                                                        <option>Motivos económicos</option>
                                                        <option>No aplica</option>
                                                    </select> 
                                                </div>


                                                <!---------------------------------------------------------PREGUNTA 6---------------------------------------------------->
                                                <div class="col-xs-9"><input id="pregunta20" name="pregunta20" class="text-bold form-control" readonly value="7. En caso de estar interesado en este momento en un crédito ¿Cuál sería el destino del mismo?"/></div>
                                                <div class="col-xs-3">
                                                    <select id="respuesta20" name="respuesta20" class="form-control">
                                                        <option value=""></option>
                                                        <option>Vivienda (construcción o ampliación)</option>
                                                        <option>Pago de deudas</option>
                                                        <option>Negocio (capital)</option>
                                                        <option>Estudios (propios o familiares)</option>
                                                        <option>Vehículo (nuevo o usado)</option>
                                                        <option>Viaje</option>
                                                        <option>Remodelación del hogar/lugar de trabajo</option>
                                                        <option>No necesito un crédito</option>
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
<script src="scripts/bpComunicacionIndependientes.js" type="text/javascript"></script>
<script src="scripts/funcionesGenerales.js" type="text/javascript"></script>