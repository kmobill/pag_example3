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

                            <div class="box-body">
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
                                    <div class="col-xs-2 hidden"> <b>CODIGO_AGENCIA </b>
                                        <input type="text" class="form-control input-sm" id="CODIGO_AGENCIA" name="CODIGO_AGENCIA" readonly/>
                                    </div>
                                    <div class="col-xs-2"> <b>AGENCIA </b>
                                        <input type="text" class="form-control input-sm" id="CAMPO1" name="CAMPO1" readonly/>
                                    </div>
                                    <div class="col-xs-2"> <b>SECCION </b>
                                        <input type="text" class="form-control input-sm" id="CAMPO3" name="CAMPO3" readonly/>
                                    </div>
                                    <div class="col-xs-2"> <b>AREA </b>
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
                                    <!--                                    <div class="col-xs-2"> <b>TITULAR/TERCERO </b>
                                                                            <input type="text" class="form-control input-sm" id="TITULAR_TERCERO" name="TITULAR_TERCERO" readonly/>
                                                                        </div>
                                                                        <div class="col-xs-2"> <b>CUENTA </b>
                                                                            <input type="text" class="form-control input-sm" id="CUENTA" name="CUENTA" readonly/>
                                                                        </div>-->
                                    <div class="col-xs-2"> <b>FECHA ATENCION </b>
                                        <input type="text" class="form-control input-sm" id="CAMPO9" name="CAMPO9" readonly/>
                                    </div>
                                    <div class="col-xs-4"> <b>TIPO </b>
                                        <input type="text" class="form-control input-sm" id="CAMPO10" name="CAMPO10" readonly/>
                                    </div>
                                    <!--                                    <div class="col-xs-2"> <b>HORA ATENCION </b>
                                                                            <input type="text" class="form-control input-sm" id="HORA_ATENCION" name="HORA_ATENCION" readonly/>
                                                                        </div>-->
                                </div>
                            </div>
                            <div id="pnlEncuesta" class="col-xs-12 btn">
                                <div class="box box-widget bg-gray">
                                    <div class="box-body">
                                        <!---------------------------------------------------------PREGUNTA 1---------------------------------------------------->                                        
                                        <div class="col-xs-4">
                                            <input id="pregunta1" name="pregunta1" class="text-bold form-control" readonly value="Motivo por el que se visitó la agencia" />
                                        </div>
                                        <div class="col-xs-8">
                                            <input id="respuesta1" name="respuesta1" type="text" class="form-control">
                                        </div>
                                        <div class="col-xs-8">
                                            <input id="pregunta2" name="pregunta2" class="text-bold form-control" readonly value="Su requerimiento fue atendido satisfactoriamente. (SI/NO)" />
                                        </div>
                                        <div class="col-xs-4">
                                            <select id="respuesta2" name="respuesta2" class="form-control">
                                                <option value=""></option>
                                                <option>SI</option>
                                                <option>NO</option>
                                            </select>                                            
                                        </div>
                                        <div class="col-xs-4">
                                            <input id="pregunta3" name="pregunta3" class="text-bold form-control" readonly value="Requerimiento no resuelto" />
                                        </div>
                                        <div class="col-xs-8">
                                            <input id="respuesta3" name="respuesta3" type="text" class="form-control">
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
<script src="scripts/bancoBGREmergenciaS.js" type="text/javascript"></script>
<script src="scripts/funcions.js" type="text/javascript"></script>