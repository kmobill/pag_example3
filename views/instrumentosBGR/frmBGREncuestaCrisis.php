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
                                            <div class="col-xs-12">
                                                <br>
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
                                <div class="col-xs-1"> <b>CAMPO1 </b>
                                    <input type="text" class="form-control input-sm" id="CAMPO1" name="CAMPO1" readonly/>
                                </div>
                                <div class="col-xs-3"> <b>CAMPO2 </b>
                                    <input type="text" class="form-control input-sm" id="CAMPO2" name="CAMPO2" readonly/>
                                </div>
                                <div class="col-xs-2"> <b>CAMPO3 </b>
                                    <input type="text" class="form-control input-sm" id="CAMPO3" name="CAMPO3" readonly/>
                                </div>
                            </div>
                            <div id="pnlEncuestaPrincipal" class="col-xs-12 btn">
                                <div class="box box-widget bg-gray">
                                    <div class="box-body col-xs-12 btn">
                                        <!---------------------------------------------------------PREGUNTA 1---------------------------------------------------->
                                        <div class="col-xs-9"><input id="pregunta1" name="pregunta1" class="text-bold form-control" value="En que ciudad vive?" readonly/></div>
                                        <div class="col-xs-3">
                                            <input id="respuesta1" name="respuesta1" type="text" class="form-control">
                                        </div>
                                        <!---------------------------------------------------------PREGUNTA 2---------------------------------------------------->
                                        <div class="col-xs-9"><input id="pregunta2" name="pregunta2" class="text-bold form-control" value="1. ¿Tiene algún seguro contratado?" readonly/></div>
                                        <div class="col-xs-3">
                                            <select id="respuesta2" name="respuesta2" class="form-control">
                                                <option value=""></option>
                                                <option >Si</option>
                                                <option >No</option>
                                            </select>
                                        </div>
                                        <div id="pnlEncuesta1" class="col-xs-12 btn">
                                            <!---------------------------------------------------------PREGUNTA 2---------------------------------------------------->
                                            <div class="col-xs-9"><input id="pregunta3" name="pregunta3" class="text-bold form-control" value="2. ¿Qué seguro tiene contratado?" readonly/></div>
                                            <div class="col-xs-3">
                                                <select id="respuesta3" name="respuesta3" class="form-control">
                                                    <option value=""></option>
                                                    <option >Salud</option>
                                                    <option >Vida</option>
                                                    <option >Dental</option>
                                                    <option >Asistencias</option>
                                                </select>
                                            </div>

                                            <!---------------------------------------------------------PREGUNTA 3---------------------------------------------------->
                                            <div class="col-xs-9"><input id="pregunta4" name="pregunta4" class="text-bold form-control" value="3.- ¿El seguro contratado tiene cobertura solo para ti o incluye a algun familiar?" readonly/></div>
                                            <div class="col-xs-3">
                                                <select id="respuesta4" name="respuesta4" class="form-control">
                                                    <option value=""></option>
                                                    <option >Individual</option>
                                                    <option >Familiar</option>
                                                </select>
                                            </div>
                                            <!---------------------------------------------------------PREGUNTA 4---------------------------------------------------->
                                            <div class="col-xs-6"><input id="pregunta5" name="pregunta5" class="text-bold form-control" value="4. ¿Cuánto pagas por tu seguro?" readonly/></div>
                                            <div class="col-xs-6">
                                                <input id="respuesta5" name="respuesta5" type="text" class="form-control">
                                            </div>
                                            <!---------------------------------------------------------PREGUNTA 5---------------------------------------------------->           
                                            <div class="col-xs-9"><input id="pregunta6" name="pregunta6" class="text-bold form-control" value="5. Del 1 al 10, ¿Qué tan satisfecho te encuentras con el servicio contratado?" readonly/></div>
                                            <div class="col-xs-3">
                                                <select id="respuesta6" name="respuesta6" class="form-control">
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
                                            <!---------------------------------------------------------PREGUNTA 4---------------------------------------------------->
                                            <div class="col-xs-6"><input id="pregunta7" name="pregunta7" class="text-bold form-control" value="6.- Que es lo que mas te gusta del seguro?" readonly/></div>
                                            <div class="col-xs-6">
                                                <input id="respuesta7" name="respuesta7" type="text" class="form-control">
                                            </div>
                                            <!---------------------------------------------------------PREGUNTA 4---------------------------------------------------->
                                            <div class="col-xs-6"><input id="pregunta8" name="pregunta8" class="text-bold form-control" value="7.- Que es lo que menos te gusta del seguro?" readonly/></div>
                                            <div class="col-xs-6">
                                                <input id="respuesta8" name="respuesta8" type="text" class="form-control">
                                            </div>
                                            <!---------------------------------------------------------PREGUNTA 5---------------------------------------------------->           
                                            <div class="col-xs-9"><input id="pregunta9" name="pregunta9" class="text-bold form-control" value="8. ¿Por qué canal quisieras ser contactado para acceder a un seguro?" readonly/></div>
                                            <div class="col-xs-3">
                                                <select id="respuesta9" name="respuesta9" class="form-control">
                                                    <option value=""></option>
                                                    <option >Call Center</option>
                                                    <option >Redes Sociales</option>
                                                    <option >Mensaje de Texto</option>
                                                    <option >Visita de un asesor</option>
                                                    <option >Correo electrónico</option>
                                                    <option >Whatsapp</option>
                                                </select>
                                            </div>
                                            <!---------------------------------------------------------PREGUNTA 4---------------------------------------------------->
                                            <div class="col-xs-12"><input id="pregunta10" name="pregunta10" class="text-bold form-control" value="9. Cuáles son los productos o servicios bancarios que usted más usa (no debe ser necesariamente de BGR)" readonly/></div>
                                            <div class="col-xs-12">
                                                <input id="respuesta10" name="respuesta10" type="text" class="form-control">
                                            </div>
                                            <!---------------------------------------------------------PREGUNTA 4---------------------------------------------------->
                                            <div class="col-xs-6"><input id="pregunta11" name="pregunta11" class="text-bold form-control" value="10.- ¿ Que deberia tener tu seguro de salud/vida ideal?" readonly/></div>
                                            <div class="col-xs-6">
                                                <input id="respuesta11" name="respuesta11" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div id="pnlEncuesta2" class="col-xs-12 btn">
                                            <!---------------------------------------------------------PREGUNTA 4---------------------------------------------------->
                                            <div class="col-xs-6"><input id="pregunta12" name="pregunta12" class="text-bold form-control" value="2. ¿Por qué razón no has contratado un seguro?" readonly/></div>
                                            <div class="col-xs-6">
                                                <input id="respuesta12" name="respuesta12" type="text" class="form-control">
                                            </div>
                                            <!---------------------------------------------------------PREGUNTA 4---------------------------------------------------->
                                            <div class="col-xs-6"><input id="pregunta13" name="pregunta13" class="text-bold form-control" value="3.- ¿ Que deberia tener tu seguro de salud/vida ideal?" readonly/></div>
                                            <div class="col-xs-6">
                                                <input id="respuesta13" name="respuesta13" type="text" class="form-control">
                                            </div>
                                            <!---------------------------------------------------------PREGUNTA 5---------------------------------------------------->           
                                            <div class="col-xs-9"><input id="pregunta14" name="pregunta14" class="text-bold form-control" value="4. ¿Por qué canal quisieras ser contactado para acceder a un seguro?" readonly/></div>
                                            <div class="col-xs-3">
                                                <select id="respuesta14" name="respuesta14" class="form-control">
                                                    <option value=""></option>
                                                    <option >Call Center</option>
                                                    <option >Redes Sociales</option>
                                                    <option >Mensaje de Texto</option>
                                                    <option >Visita de un asesor</option>
                                                    <option >Correo electrónico</option>
                                                    <option >Whatsapp</option>
                                                </select>
                                            </div>
                                            <!---------------------------------------------------------PREGUNTA 4---------------------------------------------------->
                                            <div class="col-xs-12"><input id="pregunta15" name="pregunta15" class="text-bold form-control" value="5. Cuáles son los productos o servicios bancarios que usted más usa (no debe ser necesariamente de BGR)" readonly/></div>
                                            <div class="col-xs-12">
                                                <input id="respuesta15" name="respuesta15" type="text" class="form-control">
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
<script src="scripts/bancoBGRCrisis.js" type="text/javascript"></script>
<script src="scripts/funcions.js" type="text/javascript"></script>