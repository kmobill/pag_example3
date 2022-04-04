<?php
session_start();
if ($_SESSION['usu'] == "") {
    header('location: ../views/login.php');
    session_unset($_SESSION['usu']);
    session_unset($_SESSION['name']);
}
?>
<body class="hold-transition skin-blue sidebar-mini sidebar">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="../views/blank.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>CC</b>K</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>CC Kimobill</b></span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <?php if ($_SESSION['workgroup'] >= "3") { ?>
                        <ul class="nav navbar-nav">
                            <li class="well-sm">
                                <select onchange="valores()" name="estatus" id="estatus" class="show-menu-arrow form-control btn-primary" >
                                    <option>Disponible</option>
                                    <?php
                                    require '../config/connection.php';
                                    $result = ejecutarConsulta("SELECT idState, Description FROM userstates ORDER BY idstate");
                                    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                        echo '<option value="' . $row["idState"] . '">' . $row["Description"] . '</option>';
                                    }
                                    ?>
                                </select>
                                <!--</div>-->
                            </li>
                        </ul>
                    <?php } ?>
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../public/admin/images/logo.jpg" class="user-image" alt="User Image"/>
                                <span class="hidden-xs">
                                    <?php echo $_SESSION['name']; ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <p>
                                        <small></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" onclick="" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../ajax/logoutC.php" class="btn btn-default btn-flat">Cerrar sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <ul class="sidebar-menu" data-widget="tree">
                    <?php if ($_SESSION['workgroup'] >= "3") { ?>
                        <li><a href="../views/rolesDePago.php"><i class="fa fa-user"></i> <span>Roles de pago</span></a></li>
                            <!--<li><a href="../views/encuestaAsesores.php"><i class="fa fa-user"></i> <span>Encuesta Easy Life</span></a></li>-->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pencil-square-o"></i> <span>Comercial</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../views/frmRegistroComercial.php"><i class="fa fa-users"></i>Registro de actividades</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-headphones"></i> <span>Cooperativas Inbound</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../views/frmInboundSanFrancisco.php"><i class="fa fa-users"></i> Gestión San Francisco </a></li>
                                <li><a href="../views/frmCampaniasInbound.php"><i class="fa fa-users"></i> Gestión Inbound </a></li>
                                <li><a href="../views/frmCampaniasRedes.php"><i class="fa fa-comment"></i> Gestión Redes Sociales </a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-microphone"></i> <span>Cooperativas Outbound</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../views/frmCoopCCCACobranzas.php"><i class="fa fa-users"></i> CCCA Cobranzas </a></li>
                                <li><a href="../views/frmCoopGañansolCobranzas.php"><i class="fa fa-users"></i> Gañansol Cobranzas </a></li>
                                <li><a href="../views/frmCoopGualaquizaCobranzas.php"><i class="fa fa-users"></i> Gualaquiza Cobranzas </a></li>
                                <li><a href="../views/frmCoopPatutanCobranzas.php"><i class="fa fa-users"></i> Patután Cobranzas </a></li>
                                <li><a href="../views/frmCoopMushucRunaCobranzas.php"><i class="fa fa-users"></i> Mushuc Runa Cobranzas </a></li>
                                <li><a href="../views/frmCCCA_DPF.php"><i class="fa fa-users"></i> CCCA DPF </a></li>
                                <li><a href="../views/frmCCCACreditos.php"><i class="fa fa-users"></i> CCCA Microcrédito </a></li>
                                <li><a href="../views/frmCoopDaquilemaAgencias.php"><i class="fa fa-users"></i> Daquilema Agencias </a></li>
                                <li><a href="../views/frmCoopMushucRunaCreditos.php"><i class="fa fa-users"></i> Mushuc Runa Créditos </a></li>
                                <li><a href="../views/frmCoopGañansolVerificacion.php"><i class="fa fa-users"></i> Gañansol Verificación de datos</a></li>
                                <!--<li><a href="../views/frmEncuestasCEM.php"><i class="fa fa-users"></i> Encuesta- CEM CCCA </a></li>-->
                                <li><a href="../views/frmCoopTulcanTD.php"><i class="fa fa-users"></i> Tulcán - TD </a></li>
                                <li><a href="../views/frmCoopTulcanCtaFacil.php"><i class="fa fa-users"></i> Tulcán - CTA Fácil</a></li>
                                <!--<li><a href="../views/frmSaludsa.php"><i class="fa fa-users"></i> Saludsa </a></li>-->
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-object-group"></i> <span>Banco Pichincha</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-microphone"></i> <span>Cancelaciones</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="../views/frmBpCancelacionesCampania.php"><i class="fa fa-users"></i> Nuevos Clientes </a></li>
                                        <li><a href="../views/frmBpCancelacionesAgenda.php"><i class="fa fa-headphones"></i> Agendamiento </a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-microphone"></i> <span>Cargos Recurrentes</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="../views/frmBpCargosCampania.php"><i class="fa fa-users"></i> Nuevos Clientes </a></li>
                                        <li><a href="../views/frmBpCargosAgenda.php"><i class="fa fa-headphones"></i> Agendamiento </a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-microphone"></i> <span>Comunicación</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="../views/frmBpComunicacion.php"><i class="fa fa-users"></i> Comunicación</a></li>
                                        <li><a href="../views/frmBpAfiliacion.php"><i class="fa fa-users"></i> Afiliación Banca/Billetera</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-microphone"></i> <span>Encuestas</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="../views/frmBpContencion.php"><i class="fa fa-users"></i> Contención</a></li>
                                        <li><a href="../views/frmBpEncCentroAcopio1.php"><i class="fa fa-users"></i> Centro de Acopio 348</a></li>
                                        <li><a href="../views/frmBpEncCentroAcopio.php"><i class="fa fa-users"></i> Centro de Acopio 349</a></li>
                                        <li><a href="../views/frmBpEncuestaMicrofinanzas.php"><i class="fa fa-users"></i> Microfinanzas</a></li>
                                        <li><a href="../views/frmBpEncuestaNomina.php"><i class="fa fa-users"></i> Nómina</a></li>
                                        <li><a href="../views/frmBpEncuestaPreciso.php"><i class="fa fa-users"></i> Preciso</a></li>
                                        <li><a href="../views/frmBpEncuestaCuentas.php"><i class="fa fa-users"></i> Cuentas</a></li>
                                        <li><a href="../views/frmBpEncuestaHipotecaria.php"><i class="fa fa-users"></i> Hipotecaria</a></li>
                                        <!--<li><a href="../views/frmBpEncuestaDesercion.php"><i class="fa fa-users"></i> Encuesta Deserción</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaNoDiferido.php"><i class="fa fa-users"></i> No diferido</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaNoAdicionales.php"><i class="fa fa-users"></i> No Adicionales</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaNoOnline.php"><i class="fa fa-users"></i> No Online</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaVocClientesBuzon.php"><i class="fa fa-users"></i> VOC Clientes Buzones</a></li>-->
                                        <!--<li><a href="../views/frmEncEducacionFinanciera.php"><i class="fa fa-users"></i> Educacion Financiera</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaVacunacion.php"><i class="fa fa-users"></i>Encuesta Vacunación</a></li>-->
                                        <!--<li><a href="../views/frmVieWorld.php"><i class="fa fa-users"></i> Vie World</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaBono.php"><i class="fa fa-users"></i> Encuesta Bono</a></li>-->
                                        <!--<li><a href="../views/frmBpMigracionTel.php"><i class="fa fa-users"></i> Migración Telefónica</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaDepositos.php"><i class="fa fa-users"></i> Encuesta Depósitos</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaServBanc.php"><i class="fa fa-users"></i> Enc. Servicios Bancarios</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaVehicular2.php"><i class="fa fa-users"></i> Encuesta Vehicular</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaNoPDPConv.php"><i class="fa fa-users"></i> No acepta PDP conversiones</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaNoConversiones.php"><i class="fa fa-users"></i> No acepta conversiones</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaNoAutomas.php"><i class="fa fa-users"></i> No acepta Automas</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaNoEfectivoExpress.php"><i class="fa fa-users"></i> No efectivo express</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaVehicular.php"><i class="fa fa-users"></i> Encuesta Vehicular</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaLatam.php"><i class="fa fa-users"></i> Encuesta Latam</a></li>-->
                                        <!--<li><a href="../views/frmBpNoTC.php"><i class="fa fa-users"></i> Encuesta No TC</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaPrivilegio.php"><i class="fa fa-users"></i> Encuesta Privilegio</a></li>-->
                                        <!--<li><a href="../views/frmBpHabitar.php"><i class="fa fa-users"></i> Encuesta Habitar</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaCompraVivienda.php"><i class="fa fa-users"></i> Compra Vivienda</a></li>-->
                                        <!--<li><a href="../views/frmBpPrecisoAhorro.php"><i class="fa fa-users"></i> Preciso Ahorro</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaCreditoEducativo.php"><i class="fa fa-users"></i> Crédito educativo</a></li>-->
                                        <!--<li><a href="../views/frmBpDiferidos.php"><i class="fa fa-users"></i> Nuevos Clientes</a></li>-->
                                        <!--<li><a href="../views/frmBpEntrevistaAUsuarios.php"><i class="fa fa-users"></i> Entrevista a Usuarios</a></li>-->
                                        <!--<li><a href="../views/frmBpRecordacionNova.php"><i class="fa fa-users"></i> Recordación Nova</a></li>-->
                                        <!--<li><a href="../views/frmBpSoporteWeb.php"><i class="fa fa-users"></i> Clientes Soporte Web</a></li>-->
                                        <!--<li><a href="../views/frmBpSaldosMovimientos.php"><i class="fa fa-users"></i> Clientes Saldos y Mov.</a></li>-->
                                        <!--<li><a href="../views/frmBpNormalizacion.php"><i class="fa fa-users"></i> Clientes Normalización</a></li>-->
                                        <!--<li><a href="../views/frmBpExtraCupo.php"><i class="fa fa-users"></i> Extra Cupo</a></li>-->
                                        <!--<li><a href="../views/frmBpAfiliacionNuevaApp.php"><i class="fa fa-users"></i> Afiliación Nueva App</a></li>-->
                                        <!--<li><a href="../views/frmBpClientesExtInt.php"><i class="fa fa-users"></i> Clientes Internos y Ext.</a></li>-->
                                        <!--<li><a href="../views/frmBpInversiones4.php"><i class="fa fa-users"></i> Inversiones</a></li>-->
                                        <!--<li><a href="../views/frmBancaWebOcasional.php"><i class="fa fa-users"></i> Usuarios Banca Web</a></li>-->
                                        <!--<li><a href="../views/frmBpProbabilidad.php"><i class="fa fa-users"></i> Probabilidad de deserción</a></li>-->
                                        <!--<li><a href="../views/frmBpAhorroProgramado.php"><i class="fa fa-users"></i> Clientes Ahorro Prog.</a></li>-->
                                        <!--<li><a href="../views/frmBpInversionesIII.php"><i class="fa fa-users"></i> Clientes Inversiones</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaPricing.php"><i class="fa fa-users"></i> Estados de Cta.</a></li>-->
                                        <!--<li><a href="../views/frmBpEstadosDeCuenta.php"><i class="fa fa-users"></i> Clientes Cta C.</a></li>-->
                                        <!--<li><a href="../views/frmClientesEnMora90Dias.php"><i class="fa fa-users"></i> Clientes en mora > 90 dias</a></li>-->
                                        <!--<li><a href="../views/frmBpInversiones.php"><i class="fa fa-users"></i> Clientes Inversiones</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaAhorroCredito.php"><i class="fa fa-users"></i> Ahorro + Crédito</a></li>-->
                                        <!--<li><a href="../views/frmBpPymes.php"><i class="fa fa-users"></i> Clientes MENTORIA BOX</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaAhorroProgramado2.php"><i class="fa fa-users"></i> Nuevos Clientes Enc_3</a></li>-->
                                        <!--<li><a href="../views/frmBpEncuestaAhorroProgramado3.php"><i class="fa fa-users"></i> Nuevos Clientes Enc_4</a></li>-->
                                        <!--<li><a href="../views/frmBpIncrementosAgenda.php"><i class="fa fa-headphones"></i> Agendamiento </a></li>-->
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-microphone"></i> <span>Incrementos</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="../views/frmBpIncrementosCamp.php"><i class="fa fa-users"></i> Nuevos Clientes </a></li>
                                        <li><a href="../views/frmBpIncrementosAgenda.php"><i class="fa fa-headphones"></i> Agendamiento </a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-microphone"></i> <span>Multioferta</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="../views/frmBpCreditoOnline.php"><i class="fa fa-users"></i> Crédito On-line </a></li>
                                        <li><a href="../views/frmBpCreditoOnlineAgenda.php"><i class="fa fa-headphones"></i> Agenda On line </a></li>
                                        <li><a href="../views/frmBpMOCampania.php"><i class="fa fa-users"></i> Multi oferta</a></li>
                                        <li><a href="../views/frmBpMOAgenda.php"><i class="fa fa-headphones"></i> Agenda Multi oferta </a></li>
                                    </ul>
                                </li>
                                <!--                                <li class="treeview">
                                                                    <a href="#">
                                                                        <i class="fa fa-microphone"></i> <span>Pasivos</span>
                                                                        <span class="pull-right-container">
                                                                            <i class="fa fa-angle-left pull-right"></i>
                                                                        </span>
                                                                    </a>
                                                                    <ul class="treeview-menu">
                                                                        <li><a href="../views/frmBpPasivos.php"><i class="fa fa-users"></i> Nuevos Clientes </a></li>
                                                                        <li><a href="../views/frmBpPasivosAgenda.php"><i class="fa fa-headphones"></i> Agendamiento </a></li>
                                                                    </ul>
                                                                </li>-->
                                <!--                                <li class="treeview">
                                                                    <a href="#">
                                                                        <i class="fa fa-microphone"></i> <span>Variaciones</span>
                                                                        <span class="pull-right-container">
                                                                            <i class="fa fa-angle-left pull-right"></i>
                                                                        </span>
                                                                    </a>
                                                                    <ul class="treeview-menu">
                                                                        <li><a href="../views/frmEncuesta.php"><i class="fa fa-users"></i> Nuevos Clientes </a></li>
                                                                        <li><a href="../views/frmEncuestaAgenda.php"><i class="fa fa-headphones"></i> Agendamiento </a></li>
                                                                    </ul>
                                                                </li>-->
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-object-group"></i> <span>BGR</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-microphone"></i> <span>Novedades BGR</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="../views/frmBGRNovedades.php"><i class="fa fa-users"></i>Ingreso de novedades BGR</a></li>
                                    </ul>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-microphone"></i> <span>Encuesta</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="../views/frmBGRCampania_V3.php"><i class="fa fa-users"></i>Calidad</a></li>
                                        <li><a href="../views/frmBGRCanalesElectronicos_V2.php"><i class="fa fa-users"></i>Canales Electrónicos</a></li>
                                        <li><a href="../views/frmBGRCanalRemoto.php"><i class="fa fa-users"></i>Canal Remoto</a></li>
                                        <li><a href="../views/frmBGRDigital_V2.php"><i class="fa fa-users"></i>Digital</a></li>
                                        <li><a href="../views/frmBGRReclamos.php"><i class="fa fa-users"></i>Reclamos</a></li>
                                        <li><a href="../views/frmBGRInversiones.php"><i class="fa fa-users"></i>Inversiones</a></li>
                                        <li><a href="../views/frmBGRRecuperaciones.php"><i class="fa fa-users"></i>Recuperaciones</a></li>
                                        <li><a href="../views/frmBGRCobranzas.php"><i class="fa fa-users"></i>Cobranzas</a></li>
                                        <li><a href="../views/frmBGREmpresarial.php"><i class="fa fa-users"></i>Empresarial</a></li>
                                        <li><a href="../views/frmBGRServipagos.php"><i class="fa fa-users"></i>Servipagos</a></li>
                                        <li><a href="../views/frmBGRTC.php"><i class="fa fa-users"></i>Tarjetas de crédito</a></li>
                                        <!--<li><a href="../views/frmBGRCitasCanceladas.php"><i class="fa fa-users"></i>Citas Canceladas</a></li>-->
    <!--                                        <li><a href="../views/frmBGRCitasEfectivas.php"><i class="fa fa-users"></i>Citas Efectivas</a></li>
                                        <li><a href="../views/frmBGRCitasPendientes.php"><i class="fa fa-users"></i>Citas Pendientes</a></li>-->

                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-object-group"></i> <span>Otras campañas</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-microphone"></i> <span>Claro</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="../views/frmClaroCampania.php"><i class="fa fa-users"></i> Nuevos Clientes </a></li>
                                        <li><a href="../views/frmClaroAgenda.php"><i class="fa fa-headphones"></i> Agendamiento </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-microphone"></i> <span>Ecuasistencias Ventas</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="../views/frmEcuasistencias.php"><i class="fa fa-users"></i> Nuevos Clientes </a></li>
                                        <li><a href="../views/frmEcuasistenciaAgenda.php"><i class="fa fa-headphones"></i> Agendamiento </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-microphone"></i> <span>Ecuasistencias Encuestas</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="../views/frmEcuaEncCampania.php"><i class="fa fa-users"></i> Nuevos Clientes </a></li>
                                        <li><a href="../views/frmEcuaEncAgenda.php"><i class="fa fa-headphones"></i> Agendamiento </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-microphone"></i> <span>IP TV</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="../views/frmIPTV.php"><i class="fa fa-users"></i> Gestión Clientes </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-microphone"></i> <span>Jardines del Valle</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="../views/frmJardinesDelValleCampania.php"><i class="fa fa-users"></i> Nuevos Clientes </a></li>
                                        <li><a href="../views/frmJardinesDelValleAgenda.php"><i class="fa fa-headphones"></i> Agendamiento </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-microphone"></i> <span>Practi Plan</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="../views/frmPractiPlan.php"><i class="fa fa-users"></i> Gestión Clientes </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <?php if ($_SESSION['workgroup'] == "1") { ?>
                            <li><a href="../views/cargarRoles.php"><i class="fa fa-street-view"></i> <span>Administrar roles de Pago</span></a></li>
                        <?php } ?>
                        <?php if ($_SESSION['workgroup'] == "2") { ?>
                            <li><a href="../views/rolesDePago.php"><i class="fa fa-street-view"></i> <span>Roles de Pago</span></a></li>
                        <?php } ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-sort"></i> <span>Administración General</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <!--<li><a href="../views/loadUsers.php"><i class="fa fa-users"></i> Carga masiva de asesores </a></li>-->
                                <li><a href="../views/users.php"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
                                <li><a href="../views/userByCampaign.php"><i class="fa fa-headphones"></i> Usuarios y Campañas </a></li>
                                <li><a href="../views/resultCampaign.php"><i class="fa fa-area-chart"></i> Resultados de Campaña </a></li>
                                <li><a href="../views/correosMasivosBP.php"><i class="fa fa-mail-reply"></i> Envío de correos BP </a></li>
                                <li><a href="../views/correosMasivosGenericos.php"><i class="fa fa-mail-reply"></i> Envío de correos </a></li>
                            </ul>
                        </li>
                        <li><a href="../views/baseManagement.php"><i class="fa  fa-cog"></i> <span>Administración de bases</span></a></li>
                        <li><a href="../views/enriquecimientoBases.php"><i class="fa fa-bank"></i> <span>Enriquecimiento de bases</span></a></li>
                        <li><a href="../views/importation.php"><i class="fa fa-book"></i> <span>Importaciones</span></a></li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-sort"></i> <span>Detalles de bases</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../views/detalleBase.php"><i class="fa fa-tag"></i> Detalle por bases</a></li>
                                <li><a href="../views/detalleAsesor.php"><i class="fa fa-tag"></i> Detalle por asesor</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-headphones"></i> <span>Bitácoras</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../views/bitacoraMensajes.php"><i class="fa fa-tag"></i> Bitácora de mensajes</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-headphones"></i> <span>Monitoreo</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../views/frmMonitoreoBGR.php"><i class="fa fa-tag"></i> Monitoreo BGR</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-microphone"></i> <span>Novedades BGR</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../views/frmBGRNovedades.php"><i class="fa fa-users"></i>Ingreso de novedades BGR</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-sort"></i> <span>Archivos planos</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../views/tramaEcuasistencia.php"><i class="fa fa-user"></i> <span>Trama Ecuasistencias</span></a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>

            </section>
            <!-- /.sidebar -->
        </aside>

        <script src="scripts/userStates.js" type="text/javascript"></script>