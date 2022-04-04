<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <label id="titulo2" class="h4 text-bold text-red">&nbsp;</label>
                        <label id="titulo" class="h4 text-bold">Campaña Banco Pichincha Incrementos</label>
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
                                    <div id="pnlProductos">
                                        <div class="col-md-12">
                                            <div class="box box-widget bg-gray">
                                                <div class="box-body">
                                                    <div class="row1">
                                                        <div class="col-xs-2">
                                                            <input type="text" class="form-control input-sm hidden" readonly/> <b class="text-bold">Desea otro producto: &nbsp; </b> </div>
                                                        <div class="col-xs-1">
                                                            <select class="form-control input-sm" id="producto" name="producto">
                                                                <option></option>
                                                                <option>SI</option>
                                                                <option>NO</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-2">
                                                            <select class="form-control input-sm" id="listadoProd" name="listadoProd" disabled>
                                                                <option></option>
                                                                <option>TARJETA DE CREDITO PRINCIPAL</option>
                                                                <option>TARJETA DE CREDITO ADICIONAL</option>
                                                                <option>CREDITO PRECISO</option>
                                                                <option>CREDITO VEHICULAR</option>
                                                                <option>CREDITO MICROFINANZAS</option>
                                                                <option>CREDITO LINEA ABIERTA HIPOTECARIA</option>
                                                                <option>CREDITO HABITAR</option>
                                                                <option>CREDITO EDUCATIVO</option>
                                                                <option>ASISTENCIA</option>
                                                                <option>CUENTA DE AHORRO/CORRIENTE</option>
                                                                <option>AHORRO FUTURO</option>
                                                                <option>INVERSION POLIZA</option>
                                                                <option>TARJETA DE DEBITO</option>
                                                                <option>OTROS</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <input type="text" class="form-control input-sm" id="otroProd" name="otroProd" readonly/> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="pnlIncrementos" class="col-xs-12 btn">
                                        <div class="box box-widget bg-gray">
                                            <div class="box-body">
                                                <div class="col-xs-4">
                                                    <b class="text-bold">Ingrese el valor del incremento: </b> <br>
                                                    <input type="text" onkeypress="return onlyNumbers(event)" class="form-control input-sm" id="valorIncremento" name="valorIncremento"> 
                                                    <input id="txtCambio" name="txtCambio" type="text" class="form-control hidden" readonly>
                                                </div>
                                                <div class="col-xs-4">
                                                    <b class="text-bold">Desea cambiar la fecha del ahorro futuro? </b><br>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="cambioFecha" name="cambioFecha" type="checkbox">
                                                        </span>
                                                        <input id="fechaIncremento" name="fechaIncremento" type="number" class="form-control" readonly>
                                                    </div>
                                                    <!--/input-group--> 
                                                </div>
                                                <div class="col-xs-4">
                                                    <b class="text-bold">Corregir el monto actual de ahorro futuro </b><br>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <input id="cambioIncremento" name="cambioIncremento" type="checkbox">
                                                        </span>
                                                        <input id="valorCambioIncremento" name="valorCambioIncremento" type="text" onkeypress="return onlyNumbers(event)" class="form-control" readonly>
                                                        <input id="txtCambioValor" name="txtCambioValor" type="hidden" class="form-control">
                                                    </div>
                                                    <!--/input-group--> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="index">
                                        <div class="col-xs-2 hidden"> <b class="text-bold text-aqua">CAMPANIA </b>
                                            <input type="text" class="form-control input-sm" id="code" name="code" readonly/>
                                            <input type="text" class="form-control input-sm" id="CAMPANIA" name="CAMPANIA" readonly/>
                                            <input type="text" class="form-control input-sm" id="IDC" name="IDC" readonly/>
                                        </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">CODIGO_CAMPANIA </b>
                                            <input type="text" class="form-control input-sm" id="CODIGO_CAMPANIA" name="CODIGO_CAMPANIA" readonly/> </div>
                                        <div class="col-xs-4"> <b class="text-bold text-aqua">NOMBRE_CAMPANIA </b>
                                            <input type="text" class="form-control input-sm" id="NOMBRE_CAMPANIA" name="NOMBRE_CAMPANIA" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">IDENTIFICACION </b>
                                            <input type="text" class="form-control input-sm" id="IDENTIFICACION" name="IDENTIFICACION" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">NOMBRE </b>
                                            <input type="text" class="form-control input-sm" id="NOMBRE_CLIENTE" name="NOMBRE_CLIENTE" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">ZONA </b>
                                            <input type="text" class="form-control input-sm" id="ZONA" name="ZONA" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">REGION </b>
                                            <input type="text" class="form-control input-sm" id="REGION" name="REGION" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">SUBSEGMENTO </b>
                                            <input type="text" class="form-control input-sm" id="SUBSEGMENTO" name="SUBSEGMENTO" readonly/> </div>
                                        <div class="col-xs-1"> <b class="text-bold text-aqua">EDAD </b>
                                            <input type="text" class="form-control input-sm" id="EDAD" name="EDAD" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">ESTADO CIVIL </b>
                                            <input type="text" class="form-control input-sm" id="ESTADO_CIVIL" name="ESTADO_CIVIL" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">SEXO </b>
                                            <input type="text" class="form-control input-sm" id="SEXO" name="SEXO" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">NOMBRE_PRODUCTO </b>
                                            <input type="text" class="form-control input-sm" id="NOMBRE_PRODUCTO" name="NOMBRE_PRODUCTO" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">NUMERO_CUENTA </b>
                                            <input type="text" class="form-control input-sm" id="NUMERO_CUENTA" name="NUMERO_CUENTA" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">EST CTA AHORRO FUT </b>
                                            <input type="text" class="form-control input-sm" id="ESTADO_DE_CTA_AHORRO_FUTURO" name="ESTADO_DE_CTA_AHORRO_FUTURO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">DESCRIPCION </b>
                                            <input type="text" class="form-control input-sm" id="DESCRIPCION" name="DESCRIPCION" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">DIA DEBITO AHORRO FUTUROO </b>
                                            <input type="text" class="form-control input-sm" id="DIA_DEBITO_AH_FUTURO" name="DIA_DEBITO_AH_FUTURO" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">MONTO </b>
                                            <input type="text" class="form-control input-sm" id="MONTO" name="MONTO" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">VALIDADOR </b>
                                            <input type="text" class="form-control input-sm" id="VALIDADOR" name="VALIDADOR" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">SALDO </b>
                                            <input type="text" class="form-control input-sm" id="SALDO" name="SALDO" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">MONTO SUGERIDO </b>
                                            <input type="text" class="form-control input-sm" id="MONTO_SUGERIDO_AH_FUT" name="MONTO_SUGERIDO_AH_FUT" readonly/> </div>
                                        <div class="col-xs-1"> <b class="text-bold text-aqua">ANIO_APERT </b>
                                            <input type="text" class="form-control input-sm" id="ANIO_APERTURA" name="ANIO_APERTURA" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">PROVINCIA_DOMICILIO </b>
                                            <input type="text" class="form-control input-sm" id="PROVINCIA_DOMICILIO" name="PROVINCIA_DOMICILIO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">CIUDAD_DOMICILIO </b>
                                            <input type="text" class="form-control input-sm" id="CIUDAD_DOMICILIO" name="CIUDAD_DOMICILIO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">DIRECCION_DOMICILIO </b>
                                            <input type="text" class="form-control input-sm" id="DIRECCION_DOMICILIO" name="DIRECCION_DOMICILIO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">PROVINCIA_TRABAJO </b>
                                            <input type="text" class="form-control input-sm" id="PROVINCIA_TRABAJO" name="PROVINCIA_TRABAJO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">CIUDAD_TRABAJO </b>
                                            <input type="text" class="form-control input-sm" id="CIUDAD_TRABAJO" name="CIUDAD_TRABAJO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">DIRECCION_TRABAJO </b>
                                            <input type="text" class="form-control input-sm" id="DIRECCION_TRABAJO" name="DIRECCION_TRABAJO" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">TIENE MC </b>
                                            <input type="text" class="form-control input-sm" id="MC" name="MC" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">TIENE VI </b>
                                            <input type="text" class="form-control input-sm" id="VI" name="VI" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">CUENTA_DEBITO </b>
                                            <input type="text" class="form-control input-sm" id="CUENTA_DEBITO" name="CUENTA_DEBITO" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">ESTADO_CTA_TRANSACCIONAL </b>
                                            <input type="text" class="form-control input-sm" id="ESTADO_CUENTA_TRANSACCIONAL" name="ESTADO_CUENTA_TRANSACCIONAL" readonly/> </div>
                                        <div class="col-xs-3"> <b class="text-bold text-aqua">DESCRIPCION1 </b>
                                            <input type="text" class="form-control input-sm" id="DESCRIPCION1" name="DESCRIPCION1" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">SALDO_PROMEDIO </b>
                                            <input type="text" class="form-control input-sm" id="SALDO_PROMEDIO" name="SALDO_PROMEDIO" readonly/> </div>
                                        <div class="col-xs-2"> <b class="text-bold text-aqua">FECHA_APERTURA </b>
                                            <input type="text" class="form-control input-sm" id="FECHA_APERTURA_AH_FUTURO" name="FECHA_APERTURA_AH_FUTURO" readonly/> </div>
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
<script src="scripts/JS_BPIncrementosCampania.js" type="text/javascript"></script>
<script src="scripts/funcionesGenerales.js" type="text/javascript"></script>