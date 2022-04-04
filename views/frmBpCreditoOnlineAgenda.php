<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <label id="titulo2" class="h4 text-bold text-red">&nbsp;</label>
                        <label id="titulo" class="h4 text-bold">Campañas Banco Pichincha</label>
                        <label id="titulo1" class="h4 text-bold text-red"></label>
                    </div>
                    <div class="panel-body table-responsive" id="listadoRegistros">
                        <table id="tblListado" class="table table-condensed table-hover table-responsive">
                            <thead>
                            <th>Num</th>
                            <th>Campaña</th>
                            <th>ImportId</th>
                            <th>Asesor</th>
                            <th>Código Campaña</th>
                            <th>Nombre Campaña</th>
                            <th>Identificacion</th>
                            <th>Nombres</th>
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
                                    <div id="verOfertas" class="btn col-xs-12">
                                        <div class="box box-widget bg-gray">
                                            <div class="box-header with-border">
                                                <div class="col-xs-1"></div>
                                                <div class="col-xs-2">
                                                    <input name="ofertaBp" id="oferta1" type="radio" /> </div>
                                                <div class="col-xs-2">
                                                    <input name="ofertaBp" id="oferta2" type="radio" /> </div>
                                                <div class="col-xs-2">
                                                    <input name="ofertaBp" id="oferta3" type="radio" /> </div>
                                                <div class="col-xs-2">
                                                    <input name="ofertaBp" id="oferta4" type="radio" /> </div>
                                                <div class="col-xs-2">
                                                    <input name="ofertaBp" id="oferta5" type="radio" /> </div>
                                                <div class="col-xs-1"></div>
                                                <div class="box-tools">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <input id="of" name="of" class="form-control input-sm hidden" />
                                                <input id="tip" name="tip" class="form-control input-sm hidden" />
                                                <div class="col-xs-12">
                                                    <div class="col-xs-1"></div>
                                                    <div class="col-xs-2"> <b>CREDITO_CONSUMO </b>
                                                        <input type="text" class="form-control input-sm" id="CREDITO_CONSUMO_ESCENARIO_1" name="CREDITO_CONSUMO_ESCENARIO_1" readonly/> </div>
                                                    <div class="col-xs-2"> <b>TARJETA </b>
                                                        <input type="text" class="form-control input-sm" id="TARJETA_ESCENARIO_1" name="TARJETA_ESCENARIO_1" readonly/> </div>
                                                    <div class="col-xs-2"> <b>CONSUMO EXCLUSIVO </b>
                                                        <input type="text" class="form-control input-sm" id="CREDITO_CONSUMO_EXCLUSIVO" name="CREDITO_CONSUMO_EXCLUSIVO" readonly/> </div>
                                                    <div class="col-xs-2"> <b>TARJETA EXCLUSIVA </b>
                                                        <input type="text" class="form-control input-sm" id="TARJETA_EXCLUSIVA" name="TARJETA_EXCLUSIVA" readonly/> </div>
                                                    <div class="col-xs-2"> <b>CONSUMO ROL </b>
                                                        <input type="text" class="form-control input-sm" id="CREDITO_CONSUMO_ROL" name="CREDITO_CONSUMO_ROL" readonly/> </div>
                                                    <div class="col-xs-1"></div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-1"></div>
                                                    <div class="col-xs-2"> <b>CUOTA CONSUMO </b>
                                                        <input type="text" class="form-control input-sm" id="CUOTA_CONSUMO_ESCENARIO_1" name="CUOTA_CONSUMO_ESCENARIO_1" readonly/> </div>
                                                    <div class="col-xs-2"> <b>PLASTICO TARJETA </b>
                                                        <input type="text" class="form-control input-sm" id="PLASTICO_1_TARJETA_ESCENARIO_1" name="PLASTICO_1_TARJETA_ESCENARIO_1" readonly/> </div>
                                                    <div class="col-xs-2"> <b>CUOTA EXCLUSIVO </b>
                                                        <input type="text" class="form-control input-sm" id="CUOTA_CONSUMO_EXCLUSIVO" name="CUOTA_CONSUMO_EXCLUSIVO" readonly/> </div>
                                                    <div class="col-xs-2"> <b>PLASTICO EXCLUSIVA </b>
                                                        <input type="text" class="form-control input-sm" id="PLASTICO_1_TARJETA_EXCLUSIVA" name="PLASTICO_1_TARJETA_EXCLUSIVA" readonly/> </div>
                                                    <div class="col-xs-2"> <b>CUOTA CONSUMO ROL </b>
                                                        <input type="text" class="form-control input-sm" id="CUOTA_CONSUMO_ROL" name="CUOTA_CONSUMO_ROL" readonly/> </div>
                                                    <div class="col-xs-1"></div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-1"></div>
                                                    <div class="col-xs-2"> <b>PLAZO CONSUMO </b>
                                                        <input type="text" class="form-control input-sm" id="PLAZO_CONSUMO_ESCENARIO_1" name="PLAZO_CONSUMO_ESCENARIO_1" readonly/> </div>
                                                    <div class="col-xs-2"> <b>MARCA </b>
                                                        <input type="text" class="form-control input-sm" id="MARCA_ESCENARIO_1" name="MARCA_ESCENARIO_1" readonly/> </div>
                                                    <div class="col-xs-2"> <b>PLAZO EXCLUSIVO </b>
                                                        <input type="text" class="form-control input-sm" id="PLAZO_CONSUMO_EXCLUSIVO" name="PLAZO_CONSUMO_EXCLUSIVO" readonly/> </div>
                                                    <div class="col-xs-2"> <b>MARCA EXCLUSIVA </b>
                                                        <input type="text" class="form-control input-sm" id="MARCA_TARJETA_EXCLUSIVA" name="MARCA_TARJETA_EXCLUSIVA" readonly/> </div>
                                                    <div class="col-xs-2"> <b>PLAZO CONSUMO ROL </b>
                                                        <input type="text" class="form-control input-sm" id="PLAZO_CONSUMO_ROL" name="PLAZO_CONSUMO_EXCLUSIVO" readonly/> </div>
                                                    <div class="col-xs-1"></div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-1"></div>
                                                    <div class="col-xs-2"> <b>GARANTE CONSUMO </b>
                                                        <input type="text" class="form-control input-sm" id="GARANTE_CONSUMO_ESCENARIO_1" name="GARANTE_CONSUMO_ESCENARIO_1" readonly/> </div>
                                                    <div class="col-xs-2"> <b>PRODUCTO </b>
                                                        <input type="text" class="form-control input-sm" id="PRODUCTO_ESCENARIO_1" name="PRODUCTO_ESCENARIO_1" readonly/> </div>
                                                    <div class="col-xs-2"> <b>GARANTE EXCLUSIVO </b>
                                                        <input type="text" class="form-control input-sm" id="GARANTE_CONSUMO_EXCLUSIVO" name="GARANTE_CONSUMO_EXCLUSIVO" readonly/> </div>
                                                    <div class="col-xs-2"> <b>PRODUCTO EXCLUSIVA </b>
                                                        <input type="text" class="form-control input-sm" id="PRODUCTO_TARJETA_EXCLUSIVA" name="PRODUCTO_TARJETA_EXCLUSIVA" readonly/> </div>
                                                    <div class="col-xs-2"> <b>GARANTE CONS ROL </b>
                                                        <input type="text" class="form-control input-sm" id="GARANTE_CONSUMO_ROL" name="GARANTE_CONSUMO_ROL" readonly/> </div>
                                                    <div class="col-xs-1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Creditos" class="col-xs-12 btn">
                                        <div class="box box-widget bg-gray">
                                            <div class="box-header with-border">
                                                <div id="tipoCredito" class="col-xs-12">
                                                    <div class="col-xs-6">
                                                        <input name="opccredito" id="vAgencia" type="radio" />
                                                        <label class="text-bold">&nbsp; Visita Agencia </label>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <input name="opccredito" id="callcenter" type="radio" />
                                                        <label class="text-bold">&nbsp; Call Center </label>
                                                    </div>
                                                </div>
                                                <div class="box-tools">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div id="pnlCallCenter" class="row">
                                                    <div class="col-xs-2">
                                                        <b class="text-bold">Monto del crédito</b> 
                                                        <input type="number" class="form-control input-sm" id="txtMontoOnline" name="txtMontoOnline" />
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <b class="text-bold">Cuota del crédito</b> 
                                                        <input type="number" class="form-control input-sm" id="txtCuotaOnline" name="txtCuotaOnline" />
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <b class="text-bold">Fecha de pago del crédito</b> 
                                                        <input type="date" class="form-control input-sm" id="txtFechaOnline" name="txtFechaOnline" />
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <b class="text-bold">Situación laboral </b>
                                                        <select class="form-control" id="txtSituacionLaboralOnline" name="txtSituacionLaboralOnline">
                                                            <option></option>
                                                            <option>DEPENDIENTE</option>
                                                            <option>INDEPENDIENTE</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <b class="text-bold">Dirección </b>
                                                        <input type="text" id="txtDireccionOnline" name="txtDireccionOnline" class="form-control input-sm" />
                                                    </div>

                                                </div>
                                                <div class="row" id="infoAgencia">
                                                    <div class="col-xs-2">
                                                        <b class="text-bold">Monto del cliente</b> 
                                                        <input type="number" class="form-control input-sm" id="txtMonto" name="txtMonto" /> </div>
                                                    <div class="col-xs-2">
                                                        <b class="text-bold">Fecha Visita </b>
                                                        <input type="date" class="form-control input-sm" id="fechaV" name="fechaV" /> </div>
                                                    <div class="col-xs-2">
                                                        <b class="text-bold">Hora Visita </b>
                                                        <input type="time" class="form-control input-sm" id="horaV" name="horaV" /> </div>
                                                    <div class="col-xs-2">
                                                        <b class="text-bold">Tipo cliente </b>
                                                        <select class="form-control input-sm" id="tipoC" name="tipoC">
                                                            <option></option>
                                                            <option>Dependiente</option>
                                                            <option>Independiente</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <b class="text-bold">Region </b>
                                                        <select class="form-control input-sm" id="regionC" name="regionC">
                                                            <option></option>
                                                            <?php
                                                            require '../config/connection.php';
                                                            $result = ejecutarConsulta1("SELECT distinct(regional) 'regional' FROM cat_agencias ORDER BY regional");
                                                            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                                                echo '<option value="' . $row["regional"] . '">' . $row["regional"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <b class="text-bold">Ciudad </b>
                                                        <select class="form-control input-sm" id="ciudadC" name="ciudadC">
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <br>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <b class="text-bold">Tipo Oficina </b> 
                                                        <select class="form-control input-sm" id="tipoOfC" name="tipoOfC">
                                                            <option></option>
                                                            <?php
                                                            require '../config/connection.php';
                                                            $result = ejecutarConsulta1("SELECT distinct(tipooficina) 'tipooficina' FROM cat_agencias ORDER BY tipooficina");
                                                            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                                                echo '<option value="' . $row["tipooficina"] . '">' . $row["tipooficina"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <b class="text-bold">Agencia </b>
                                                        <select class="form-control input-sm" id="agenciaC" name="agenciaC">
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-2" id="telf1"> </div>
                                                    <div class="col-xs-2" id="telf2">
                                                        <b class="text-bold">Teléfono </b> 
                                                        <input type="text" onkeypress="return onlyNumbers(event)" id="tlfC" name="tlfC" class="form-control input-sm" readonly/>
                                                    </div>
                                                    <div class="col-xs-2" id="horario1"></div>
                                                    <div class="col-xs-2" id="horario2">
                                                        <b class="text-bold">Horario </b>
                                                        <input type="text" id="horarioC" name="horarioC" class="form-control input-sm" readonly/>
                                                    </div>
                                                    <div class="col-xs-4" id="dir1"></div>
                                                    <div class="col-xs-4" id="dir2">
                                                        <b class="text-bold">Dirección </b>
                                                        <input type="text" id="direccionC" name="direccionC" class="form-control input-sm" readonly/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="index">
                                        <div class="col-xs-2 hidden"> <b class="text-bold text-aqua">CAMPANIA </b>
                                            <input type="text" class="form-control input-sm" id="code" name="code" readonly/>
                                            <input type="text" class="form-control input-sm" id="CAMPANIA" name="CAMPANIA" readonly/></div>
                                        <div class="col-xs-2 hidden"> <b class="text-bold text-aqua">ID </b>
                                            <input type="text" class="form-control input-sm" id="IDC" name="IDC" readonly/>
                                        </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">PRIORIDAD_GESTION </b>
                                            <input type="text" class="form-control input-sm" id="PRIORIDAD_GESTION" name="PRIORIDAD_GESTION" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">CODIGO_CAMPANIA </b>
                                            <input type="text" class="form-control input-sm" id="CODIGO_CAMPANIA" name="CODIGO_CAMPANIA" readonly/> </div>
                                        <div class="col-xs-4"> <b class="text-bold text-aqua">NOMBRE_CAMPANIA </b>
                                            <input type="text" class="form-control input-sm" id="NOMBRE_CAMPANIA" name="NOMBRE_CAMPANIA" readonly/> </div>
                                        <div class="col-xs-1"> <b class="text-bold text-aqua">EDAD </b>
                                            <input type="text" class="form-control input-sm" id="EDAD" name="EDAD" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">FECHA_NACIMIENTO </b>
                                            <input type="text" class="form-control input-sm" id="FECHA_NACIMIENTO" name="FECHA_NACIMIENTO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">IDENTIFICACION </b>
                                            <input type="text" class="form-control input-sm" id="IDENTIFICACION" name="IDENTIFICACION" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">NOMBRE </b>
                                            <input type="text" class="form-control input-sm" id="NOMBRE" name="NOMBRE" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">CORREO1 </b>
                                            <input type="text" class="form-control input-sm" id="CORREO1" name="CORREO1" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">FECH NACIMIENTO1 </b>
                                            <input type="text" class="form-control input-sm" id="FECH_NAC" name="FECH_NAC" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">HUELLA DACTILAR </b>
                                            <input type="text" class="form-control input-sm" id="TIENE_DEUDA_PROTEGIDA" name="TIENE_DEUDA_PROTEGIDA" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">FECHA EXPEDICION CEDULA </b>
                                            <input type="text" class="form-control input-sm" id="TIENE_TDC" name="TIENE_TDC" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">CUENTA </b>
                                            <input type="text" class="form-control input-sm" id="CUENTA" name="CUENTA" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">SEXO </b>
                                            <input type="text" class="form-control input-sm" id="SEXO" name="SEXO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">ESTADO_CIVIL </b>
                                            <input type="text" class="form-control input-sm" id="ESTADO_CIVIL" name="ESTADO_CIVIL" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">PAIS_DOM_CAL_DAT </b>
                                            <input type="text" class="form-control input-sm" id="PAIS_DOM_CAL_DAT" name="PAIS_DOM_CAL_DAT" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">PROV_DOM_CAL_DAT </b>
                                            <input type="text" class="form-control input-sm" id="PROV_DOM_CAL_DAT" name="PROV_DOM_CAL_DAT" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">CIUDAD_DOM_CAL_DAT </b>
                                            <input type="text" class="form-control input-sm" id="CIUDAD_DOM_CAL_DAT" name="CIUDAD_DOM_CAL_DAT" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">DIR_DOM_CAL_DAT </b>
                                            <input type="text" class="form-control input-sm" id="DIR_DOM_CAL_DAT" name="DIR_DOM_CAL_DAT" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">PAIS_TRAB_1_CAL_DAT </b>
                                            <input type="text" class="form-control input-sm" id="PAIS_TRAB_1_CAL_DAT" name="PAIS_TRAB_1_CAL_DAT" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">PROV_TRAB_1_CAL_DAT </b>
                                            <input type="text" class="form-control input-sm" id="PROV_TRAB_1_CAL_DAT" name="PROV_TRAB_1_CAL_DAT" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">CIUDAD_TRAB_1_CAL_DAT </b>
                                            <input type="text" class="form-control input-sm" id="CIUDAD_TRAB_1_CAL_DAT" name="CIUDAD_TRAB_1_CAL_DAT" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">DIR_TRAB_1_CAL_DAT </b>
                                            <input type="text" class="form-control input-sm" id="DIR_TRAB_1_CAL_DAT" name="DIR_TRAB_1_CAL_DAT" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">NUMERO_TARJETA </b>
                                            <input type="text" class="form-control input-sm" id="NUMERO_TARJETA" name="NUMERO_TARJETA" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">PRODUCTO </b>
                                            <input type="text" class="form-control input-sm" id="PRODUCTO" name="PRODUCTO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">TIPOTC </b>
                                            <input type="text" class="form-control input-sm" id="TIPOTC" name="TIPOTC" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">FAMILIA </b>
                                            <input type="text" class="form-control input-sm" id="FAMILIA" name="FAMILIA" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">CUPO </b>
                                            <input type="text" class="form-control input-sm" id="CUPO" name="CUPO" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">CUPO_DISPONIBLE </b>
                                            <input type="text" class="form-control input-sm" id="CUPO_DISPONIBLE" name="CUPO_DISPONIBLE" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">MAXIMO_CONSUMO </b>
                                            <input type="text" class="form-control input-sm" id="MAXIMO_CONSUMO" name="MAXIMO_CONSUMO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">MAXIMA_TARJETA </b>
                                            <input type="text" class="form-control input-sm" id="MAXIMA_TARJETA" name="MAXIMA_TARJETA" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">NUPS </b>
                                            <input type="text" class="form-control input-sm" id="NUPS" name="NUPS" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">PERFILRIESGOENDEUDAMIENTO </b>
                                            <input type="text" class="form-control input-sm" id="PERFILRIESGOENDEUDAMIENTO" name="PERFILRIESGOENDEUDAMIENTO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">SUBSEGMENTO </b>
                                            <input type="text" class="form-control input-sm" id="SUBSEGMENTO" name="SUBSEGMENTO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">BANCA </b>
                                            <input type="text" class="form-control input-sm" id="BANCA" name="BANCA" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">SEGMENTO </b>
                                            <input type="text" class="form-control input-sm" id="SEGMENTO" name="SEGMENTO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">SEGMENTO_N_2 </b>
                                            <input type="text" class="form-control input-sm" id="SEGMENTO_N_2" name="SEGMENTO_N_2" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">SUBSEGMENTO1 </b>
                                            <input type="text" class="form-control input-sm" id="SUBSEGMENTO1" name="SUBSEGMENTO1" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">REGION </b>
                                            <input type="text" class="form-control input-sm" id="REGION" name="REGION" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">ZONA </b>
                                            <input type="text" class="form-control input-sm" id="ZONA" name="ZONA" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">AGENCIA </b>
                                            <input type="text" class="form-control input-sm" id="AGENCIA" name="AGENCIA" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">CALIFICACION_BURO </b>
                                            <input type="text" class="form-control input-sm" id="CALIFICACION_BURO" name="CALIFICACION_BURO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">COD_MARCA </b>
                                            <input type="text" class="form-control input-sm" id="COD_MARCA" name="COD_MARCA" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">PLAN_RECOMPENSAS </b>
                                            <input type="text" class="form-control input-sm" id="PLAN_RECOMPENSAS" name="PLAN_RECOMPENSAS" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">FECHA_INGRESO_SOCIO </b>
                                            <input type="text" class="form-control input-sm" id="FECHA_INGRESO_SOCIO" name="FECHA_INGRESO_SOCIO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">NUMERO_CUENTA1 </b>
                                            <input type="text" class="form-control input-sm" id="NUMERO_CUENTA1" name="NUMERO_CUENTA1" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">PRODUCTO_CTA1 </b>
                                            <input type="text" class="form-control input-sm" id="PRODUCTO_CTA1" name="PRODUCTO_CTA1" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">DESCRIPCION1 </b>
                                            <input type="text" class="form-control input-sm" id="DESCRIPCION1" name="DESCRIPCION1" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">CANAL </b>
                                            <input type="text" class="form-control input-sm" id="CANAL" name="CANAL" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">DIFERENCIA_CUPOS </b>
                                            <input type="text" class="form-control input-sm" id="DIFERENCIA_CUPOS" name="DIFERENCIA_CUPOS" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">CATEGORIZACION </b>
                                            <input type="text" class="form-control input-sm" id="CATEGORIZACION" name="CATEGORIZACION" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">TIPO_BASE </b>
                                            <input type="text" class="form-control input-sm" id="TIPO_BASE" name="TIPO_BASE" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">REGION_ANCLAJE </b>
                                            <input type="text" class="form-control input-sm" id="REGION_ANCLAJE" name="REGION_ANCLAJE" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">DES_NACIONALID </b>
                                            <input type="text" class="form-control input-sm" id="DES_NACIONALID" name="DES_NACIONALID" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">CANT_NAC </b>
                                            <input type="text" class="form-control input-sm" id="CANT_NAC" name="CANT_NAC" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">ACTIVIDAD_ECONOMICA </b>
                                            <input type="text" class="form-control input-sm" id="ACTIVIDAD_ECONOMICA" name="ACTIVIDAD_ECONOMICA" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">DES_CANAL </b>
                                            <input type="text" class="form-control input-sm" id="DES_CANAL" name="DES_CANAL" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">MARCA_CUPO </b>
                                            <input type="text" class="form-control input-sm" id="MARCA_CUPO" name="MARCA_CUPO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">NRO_TDC_COMPETENCIA </b>
                                            <input type="text" class="form-control input-sm" id="NRO_TDC_COMPETENCIA" name="NRO_TDC_COMPETENCIA" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">CUPO_MAX_COMP </b>
                                            <input type="text" class="form-control input-sm" id="CUPO_MAX_COMP" name="CUPO_MAX_COMP" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">CONSUMO_PROMEDIO </b>
                                            <input type="text" class="form-control input-sm" id="CONSUMO_PROMEDIO" name="CONSUMO_PROMEDIO" readonly/> </div>
                                        <div id="ocultos" class="hidden">
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">CORREO2 </b>
                                                <input type="text" class="form-control input-sm" id="CORREO2" name="CORREO2" readonly/> </div>
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">CORREO3 </b>
                                                <input type="text" class="form-control input-sm" id="CORREO3" name="CORREO3" readonly/> </div>
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">CORREO4 </b>
                                                <input type="text" class="form-control input-sm" id="CORREO4" name="CORREO4" readonly/> </div>
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">CORREO5 </b>
                                                <input type="text" class="form-control input-sm" id="CORREO5" name="CORREO5" readonly/> </div>
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">CORREO6 </b>
                                                <input type="text" class="form-control input-sm" id="CORREO6" name="CORREO6" readonly/> </div>
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">HIJOS_MAS_18 </b>
                                                <input type="text" class="form-control input-sm" id="HIJOS_MAS_18" name="HIJOS_MAS_18" readonly/> </div>
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">HIJOS_MENOS_18 </b>
                                                <input type="text" class="form-control input-sm" id="HIJOS_MENOS_18" name="HIJOS_MENOS_18" readonly/> </div>
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">HERMANOS_MENOS_18 </b>
                                                <input type="text" class="form-control input-sm" id="HERMANOS_MENOS_18" name="HERMANOS_MENOS_18" readonly/> </div>
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">HERMANOS_MAS_18 </b>
                                                <input type="text" class="form-control input-sm" id="HERMANOS_MAS_18" name="HERMANOS_MAS_18" readonly/> </div>
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">MAMA </b>
                                                <input type="text" class="form-control input-sm" id="MAMA" name="MAMA" readonly/> </div>
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">PAPA </b>
                                                <input type="text" class="form-control input-sm" id="PAPA" name="PAPA" readonly/> </div>
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">NOMBRES </b>
                                                <input type="text" class="form-control input-sm" id="NOMBRES" name="NOMBRES" readonly/> </div>
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">DES_SEXO </b>
                                                <input type="text" class="form-control input-sm" id="DES_SEXO" name="DES_SEXO" readonly/> </div>
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">NUMERO_CARGAS_FAMILIARES </b>
                                                <input type="text" class="form-control input-sm" id="NUMERO_CARGAS_FAMILIARES" name="NUMERO_CARGAS_FAMILIARES" readonly/> </div>
                                            <div class="col-xs-3"> <b class="text-bold text-aqua">IDENTIFICACION_PARENTEZCO </b>
                                                <input type="text" class="form-control input-sm" id="IDENTIFICACION_PARENTEZCO" name="IDENTIFICACION_PARENTEZCO" readonly/> </div>                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>
<?php require 'footer.php'; ?>
<script src="scripts/JS_BPCreditosOnlineAgenda.js" type="text/javascript"></script>
<script src="scripts/funcionesGenerales.js" type="text/javascript"></script>