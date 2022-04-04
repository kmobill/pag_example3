<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<style></style>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="text-bold">Campaña Verificación Telefónica</h4> </div>
                    <div class="panel-body table-responsive" id="listadoRegistros">
                        <table id="tblListado" class="table table-condensed table-hover table-responsive">
                            <thead>
                            <th>Num</th>
                            <th>Campaña</th>
                            <th>ImportId</th>
                            <th>Asesor</th>
                            <th>Identificación</th>
                            <th>Nombres cliente</th>
                            <th>Código campaña</th>
                            <th>Nombre campaña</th>
                            <th>Nombre cooperativa</th>
                            <th>Resultado de gestión</th>
                            <th>Accines</th>
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
                                    </div>

                                    <div id="pnlEncuesta" class="col-xs-12 btn bg-gray">
                                        <!---------------------------------------------------------IDENTIFICACION---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Identificación</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="number" id="IDENTIFICACION" name="IDENTIFICACION" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="5" id="IDENTIFICACION_PS" name="IDENTIFICACION_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk1" name="chk1" value="ok">
                                                    </span>
                                                    <input type="number" maxlength="13" class="form-control" id="IDENTIFICACION_VRF" name="IDENTIFICACION_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------NOMBRE_CLIENTE---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Nombre cliente</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <input type="text" id="NOMBRE_CLIENTE" name="NOMBRE_CLIENTE" class="text-bold form-control" readonly/>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------GENERO---------------------------------------------------->
                                        <div class="col-xs-3 col-md-3 col-lg-3">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Género</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <input type="text" id="GENERO" name="GENERO" class="text-bold form-control" readonly/>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------FECHA_INGRESO---------------------------------------------------->
                                        <div class="col-xs-3 col-md-3 col-lg-3">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Fecha ingreso</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <input type="text" id="FECHA_INGRESO" name="FECHA_INGRESO" class="text-bold form-control" readonly/>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------EDAD---------------------------------------------------->
                                        <div class="col-xs-3 col-md-3 col-lg-3">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Edad</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <input type="text" id="EDAD" name="EDAD" class="text-bold form-control" readonly/>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------TIPO---------------------------------------------------->
                                        <div class="hidden col-xs-3 col-md-3 col-lg-3">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Tipo</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <input type="text" id="TIPO" name="TIPO" class="text-bold form-control" readonly/>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------ESTADO_CUENTA---------------------------------------------------->
                                        <div class="col-xs-3 col-md-3 col-lg-3">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Estado de cuenta</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <input type="text" id="ESTADO_CUENTA" name="ESTADO_CUENTA" class="text-bold form-control" readonly/>
                                            </div>
                                        </div>
                                        
                                        <!---------------------------------------------------------PRIMER_NOMBRE---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Primer nombre</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="PRIMER_NOMBRE" name="PRIMER_NOMBRE" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="4" id="PRIMER_NOMBRE_PS" name="PRIMER_NOMBRE_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk2" name="chk2" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="PRIMER_NOMBRE_VRF" name="PRIMER_NOMBRE_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------SEGUNDO_NOMBRE---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Segundo nombre</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="SEGUNDO_NOMBRE" name="SEGUNDO_NOMBRE" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="SEGUNDO_NOMBRE_PS" name="SEGUNDO_NOMBRE_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk3" name="chk3" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="SEGUNDO_NOMBRE_VRF" name="SEGUNDO_NOMBRE_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------PRIMER_APELLIDO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Primer apellido</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="PRIMER_APELLIDO" name="PRIMER_APELLIDO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="4" id="PRIMER_APELLIDO_PS" name="PRIMER_APELLIDO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk4" name="chk4" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="PRIMER_APELLIDO_VRF" name="PRIMER_APELLIDO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------SEGUNDO_APELLIDO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Segundo apellido</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="SEGUNDO_APELLIDO" name="SEGUNDO_APELLIDO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="SEGUNDO_APELLIDO_PS" name="SEGUNDO_APELLIDO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk5" name="chk5" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="SEGUNDO_APELLIDO_VRF" name="SEGUNDO_APELLIDO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------FECHA_NACIMIENTO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Fecha de nacimiento</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="FECHA_NACIMIENTO" name="FECHA_NACIMIENTO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="5" id="FECHA_NACIMIENTO_PS" name="FECHA_NACIMIENTO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk6" name="chk6" value="ok">
                                                    </span>
                                                    <input type="date" class="form-control" id="FECHA_NACIMIENTO_VRF" name="FECHA_NACIMIENTO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------DIRECCION---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Dirección</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <input type="text" id="DIRECCION" name="DIRECCION" class="text-bold form-control" readonly/>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------PAIS_DOMICILIO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Pais domicilio</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="PAIS_DOMICILIO" name="PAIS_DOMICILIO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="PAIS_DOMICILIO_PS" name="PAIS_DOMICILIO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk7" name="chk7" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="PAIS_DOMICILIO_VRF" name="PAIS_DOMICILIO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------PROVINCIA_DOMICILIO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Provincia domicilio</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="PROVINCIA_DOMICILIO" name="PROVINCIA_DOMICILIO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="PROVINCIA_DOMICILIO_PS" name="PROVINCIA_DOMICILIO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk8" name="chk8" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="PROVINCIA_DOMICILIO_VRF" name="PROVINCIA_DOMICILIO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------CANTON_DOMICILIO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Cantón domicilio</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="CANTON_DOMICILIO" name="CANTON_DOMICILIO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="CANTON_DOMICILIO_PS" name="CANTON_DOMICILIO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk9" name="chk9" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="CANTON_DOMICILIO_VRF" name="CANTON_DOMICILIO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------PARROQUIA_DOMICILIO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Parroquia domicilio</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="PARROQUIA_DOMICILIO" name="PARROQUIA_DOMICILIO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="PARROQUIA_DOMICILIO_PS" name="PARROQUIA_DOMICILIO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk10" name="chk10" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="PARROQUIA_DOMICILIO_VRF" name="PARROQUIA_DOMICILIO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------SECTOR_DOMICILIO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Sector domicilio</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="SECTOR_DOMICILIO" name="SECTOR_DOMICILIO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="4" id="SECTOR_DOMICILIO_PS" name="SECTOR_DOMICILIO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk11" name="chk11" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="SECTOR_DOMICILIO_VRF" name="SECTOR_DOMICILIO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------AV_PRINCIPAL_DOMICILIO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Av. Principal domicilio</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="AV_PRINCIPAL_DOMICILIO" name="AV_PRINCIPAL_DOMICILIO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="5" id="AV_PRINCIPAL_DOMICILIO_PS" name="AV_PRINCIPAL_DOMICILIO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk12" name="chk12" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="AV_PRINCIPAL_DOMICILIO_VRF" name="AV_PRINCIPAL_DOMICILIO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------AV_SECUNDARIA_DOMICILIO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Av. Secundaria domicilio</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="AV_SECUNDARIA_DOMICILIO" name="AV_SECUNDARIA_DOMICILIO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="4" id="AV_SECUNDARIA_DOMICILIO_PS" name="AV_SECUNDARIA_DOMICILIO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk13" name="chk13" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="AV_SECUNDARIA_DOMICILIO_VRF" name="AV_SECUNDARIA_DOMICILIO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------REFERENCIA_DOMICILIO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Referencia domicilio</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="REFERENCIA_DOMICILIO" name="REFERENCIA_DOMICILIO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="REFERENCIA_DOMICILIO_PS" name="REFERENCIA_DOMICILIO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk14" name="chk14" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="REFERENCIA_DOMICILIO_VRF" name="REFERENCIA_DOMICILIO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------NOMENCLATURA_DOMICILIO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Nomenclatura domicilio</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="NOMENCLATURA_DOMICILIO" name="NOMENCLATURA_DOMICILIO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="2" id="NOMENCLATURA_DOMICILIO_PS" name="NOMENCLATURA_DOMICILIO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk15" name="chk15" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="NOMENCLATURA_DOMICILIO_VRF" name="NOMENCLATURA_DOMICILIO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------CORREO_PERSONAL---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Correo personal</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="CORREO_PERSONAL" name="CORREO_PERSONAL" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="CORREO_PERSONAL_PS" name="CORREO_PERSONAL_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk16" name="chk16" value="ok">
                                                    </span>
                                                    <input type="email" maxlength="150" class="form-control" id="CORREO_PERSONAL_VRF" name="CORREO_PERSONAL_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------TELEFONO_1---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Celular</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="number" id="TELEFONO_1" name="TELEFONO_1" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="TELEFONO_1_PS" name="TELEFONO_1_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk17" name="chk17" value="ok">
                                                    </span>
                                                    <input type="number" class="form-control" id="TELEFONO_1_VRF" name="TELEFONO_1_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------TELEFONO_2---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-22 col-md-22 col-lg-22">
                                                <label class="text-light-blue">Teléfono domicilio</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="number" id="TELEFONO_2" name="TELEFONO_2" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="TELEFONO_2_PS" name="TELEFONO_2_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk18" name="chk18" value="ok">
                                                    </span>
                                                    <input type="number" class="form-control" id="TELEFONO_2_VRF" name="TELEFONO_2_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------PAIS_TRABAJO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Pais trabajo</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="PAIS_TRABAJO" name="PAIS_TRABAJO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="2" id="PAIS_TRABAJO_PS" name="PAIS_TRABAJO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk19" name="chk19" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="PAIS_TRABAJO_VRF" name="PAIS_TRABAJO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------PROVINCIA_TRABAJO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Provincia trabajo</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="PROVINCIA_TRABAJO" name="PROVINCIA_TRABAJO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="2" id="PROVINCIA_TRABAJO_PS" name="PROVINCIA_TRABAJO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk20" name="chk20" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="PROVINCIA_TRABAJO_VRF" name="PROVINCIA_TRABAJO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------CANTON_TRABAJO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Cantón trabajo</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="CANTON_TRABAJO" name="CANTON_TRABAJO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="2" id="CANTON_TRABAJO_PS" name="CANTON_TRABAJO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk21" name="chk21" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="CANTON_TRABAJO_VRF" name="CANTON_TRABAJO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------PARROQUIA_TRABAJO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Parroquia trabajo</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="PARROQUIA_TRABAJO" name="PARROQUIA_TRABAJO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="2" id="PARROQUIA_TRABAJO_PS" name="PARROQUIA_TRABAJO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk22" name="chk22" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="PARROQUIA_TRABAJO_VRF" name="PARROQUIA_TRABAJO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------SECTOR_TRABAJO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Sector trabajo</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="SECTOR_TRABAJO" name="SECTOR_TRABAJO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="2" id="SECTOR_TRABAJO_PS" name="SECTOR_TRABAJO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk23" name="chk23" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="SECTOR_TRABAJO_VRF" name="SECTOR_TRABAJO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------AV_PRINCIPAL_TRABAJO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Av. Principal trabajo</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="AV_PRINCIPAL_TRABAJO" name="AV_PRINCIPAL_TRABAJO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="AV_PRINCIPAL_TRABAJO_PS" name="AV_PRINCIPAL_TRABAJO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk24" name="chk24" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="AV_PRINCIPAL_TRABAJO_VRF" name="AV_PRINCIPAL_TRABAJO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------AV_SECUNDARIA_TRABAJO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Av. Secundaria trabajo</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="AV_SECUNDARIA_TRABAJO" name="AV_SECUNDARIA_TRABAJO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="2" id="AV_SECUNDARIA_TRABAJO_PS" name="AV_SECUNDARIA_TRABAJO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk25" name="chk25" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="AV_SECUNDARIA_TRABAJO_VRF" name="AV_SECUNDARIA_TRABAJO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------REFERENCIA_TRABAJO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Referencia trabajo</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="REFERENCIA_TRABAJO" name="REFERENCIA_TRABAJO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="2" id="REFERENCIA_TRABAJO_PS" name="REFERENCIA_TRABAJO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk26" name="chk26" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="REFERENCIA_TRABAJO_VRF" name="REFERENCIA_TRABAJO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------NOMENCLATURA_TRABAJO---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Nomenclatura trabajo</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="NOMENCLATURA_TRABAJO" name="NOMENCLATURA_TRABAJO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="2" id="NOMENCLATURA_TRABAJO_PS" name="NOMENCLATURA_TRABAJO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk27" name="chk27" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="NOMENCLATURA_TRABAJO_VRF" name="NOMENCLATURA_TRABAJO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------CORREO_PERSONAL---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Correo trabajo</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="CORREO_PERSONAL" name="CORREO_TRABAJO" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="CORREO_TRABAJO_PS" name="CORREO_TRABAJO_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk28" name="chk28" value="ok">
                                                    </span>
                                                    <input type="email" maxlength="150" class="form-control" id="CORREO_TRABAJO_VRF" name="CORREO_TRABAJO_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------TELEFONO_3---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-22 col-md-22 col-lg-22">
                                                <label class="text-light-blue">Teléfono trabajo 1</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="number" id="TELEFONO_3" name="TELEFONO_3" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="TELEFONO_3_PS" name="TELEFONO_3_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk29" name="chk29" value="ok">
                                                    </span>
                                                    <input type="number" class="form-control" id="TELEFONO_3_VRF" name="TELEFONO_3_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------TELEFONO_4---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-22 col-md-22 col-lg-22">
                                                <label class="text-light-blue">Teléfono trabajo 2</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="number" id="TELEFONO_4" name="TELEFONO_4" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="TELEFONO_4_PS" name="TELEFONO_4_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk30" name="chk30" value="ok">
                                                    </span>
                                                    <input type="number" class="form-control" id="TELEFONO_4_VRF" name="TELEFONO_4_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------REFERENCIA_PERSONAL---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Referencia personal</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="REFERENCIA_PERSONAL" name="REFERENCIA_PERSONAL" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="4" id="REFERENCIA_PERSONAL_PS" name="REFERENCIA_PERSONAL_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk31" name="chk31" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="REFERENCIA_PERSONAL_VRF" name="REFERENCIA_PERSONAL_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------PARENTESCO_REFERENCIA---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Parentesco referencia</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="text" id="PARENTESCO_REFERENCIA" name="PARENTESCO_REFERENCIA" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="2" id="PARENTESCO_REFERENCIA_PS" name="PARENTESCO_REFERENCIA_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk32" name="chk32" value="ok">
                                                    </span>
                                                    <input type="text" maxlength="100" class="form-control" id="PARENTESCO_REFERENCIA_VRF" name="PARENTESCO_REFERENCIA_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------TELEFONO_REFERENCIA---------------------------------------------------->
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <label class="text-light-blue">Teléfono referencia</label>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <input type="number" id="TELEFONO_REFERENCIA" name="TELEFONO_REFERENCIA" class="text-bold form-control" readonly/>
                                                <input type="hidden" value="3" id="TELEFONO_REFERENCIA_PS" name="TELEFONO_REFERENCIA_PS" class="text-bold form-control"/>
                                            </div>
                                            <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" id="chk33" name="chk33" value="ok">
                                                    </span>
                                                    <input type="number" maxlength="100" class="form-control" id="TELEFONO_REFERENCIA_VRF" name="TELEFONO_REFERENCIA_VRF"/>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="PORCENTAJE_ACTUALIZACION" name="PORCENTAJE_ACTUALIZACION" class="text-bold form-control"/>
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
<script src="scripts/JS_CoopGañansolVerificacionDt.js" type="text/javascript"></script>
<script src="scripts/funcionesGenerales.js" type="text/javascript"></script>