<?php

require '../config/connection.php';
require "../ajax/Exception.php";
require "../ajax/PHPMailer.php";
require "../ajax/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Class bancoBGRNovedadesM {

    public function _construct() { /* Constructor */
    }

    function selectAll($txtFechaInicio, $txtFechaFin, $Agent) { //mostrar todos los registros
        $sql = "SELECT Id, IDENTIFICACION, TMSTMP, AGENCIA, SECCION, SEGMENTO, 
                FECHA_ATENCION, AGENTE, TELEFONO_CONTACTO, CAMPANIA, OBSERVACION
                FROM BGR.novedades
                WHERE TMSTMP BETWEEN '$txtFechaInicio 00:00:00' AND '$txtFechaFin 23:59:59'
                AND AGENTE = '$Agent' ";
        return ejecutarConsulta11($sql);
    }

    function insert($Agent, $Tmstmp, $txtIdentificacion, $txtAgencia, $txtCampania, $txtSeccion, $txtSegmento, $txtFechaAtencion, $txtTelefonoContacto, $txtObservaciones) { //inserción de datos
        $sql = "INSERT INTO novedades(IDENTIFICACION, TMSTMP, AGENCIA, SECCION, SEGMENTO, FECHA_ATENCION, AGENTE, TELEFONO_CONTACTO, CAMPANIA, OBSERVACION) VALUES ("
                . " '$txtIdentificacion','$Tmstmp','$txtAgencia','$txtSeccion','$txtSegmento','$txtFechaAtencion', '$Agent','$txtTelefonoContacto','$txtCampania','$txtObservaciones')";
        return ejecutarConsulta11($sql);
    }

    function update($IdCliente, $Agent, $Tmstmp, $txtIdentificacion, $txtAgencia, $txtCampania, $txtSeccion, $txtSegmento, $txtFechaAtencion, $txtTelefonoContacto, $txtObservaciones) { //actualización de datos
        $sql = "UPDATE novedades SET IDENTIFICACION='$txtIdentificacion',TMSTMP='$Tmstmp',AGENCIA='$txtAgencia',SECCION='$txtSeccion',SEGMENTO='$txtSegmento',FECHA_ATENCION='$txtFechaAtencion',AGENTE='$Agent',TELEFONO_CONTACTO='$txtTelefonoContacto',CAMPANIA='$txtCampania',OBSERVACION='$txtObservaciones' "
                . "WHERE Id = '$IdCliente' ";
        return ejecutarConsulta11($sql);
    }

    function selectById($Id) { //mostrar un registro
        $sql = "SELECT * FROM BGR.novedades where id = '$Id'";
        return ejecutarConsultaSimple11($sql);
    }

    function envioCorreos($IdCliente, $Agent, $Tmstmp, $txtIdentificacion, $txtAgencia, $txtCampania, $txtSeccion, $txtSegmento, $txtFechaAtencion, $txtTelefonoContacto, $txtObs, $principalMail, $copiaMail, $CC1, $CC2, $CC3, $CC4) {
        $oMail = new PHPMailer();
        $oMail->isSMTP();
//        $oMail->Host = "r135.websiteservername.com";
//        $oMail->Host = "a2plcpnl0258.prod.iad2.secureserver.net";
        $oMail->Host = "mail.kimobill.com";
        $oMail->Port = 465;
        $oMail->SMTPSecure = "ssl";
//        $oMail->SMTPDebug = 2;
//        $oMail->SMTPAuth = true;
        $oMail->Username = "notificaciones@kimobill.com";
        $oMail->Password = "Notificaciones.2k2021";
        $oMail->setFrom("notificaciones@kimobill.com", "NOTIFICACIONES KIMOBILL");
        $oMail->addAddress("$principalMail");
        $oMail->addAddress("$copiaMail");
        $oMail->addAddress("$CC3");
        $oMail->addCC("$CC1");
        $oMail->addCC("$CC2");
        $oMail->addCC("$CC4");
        $oMail->Subject = "CLIENTE CON CI $txtIdentificacion PRESENTA UNA NOVEDAD CON EL SERVICIO RECIBIDO";
        $oMail->msgHTML("<!DOCTYPE html>  "
                . "<html>  "
                . "	<style>"
                . "		table td{		"
                . "			font-size: 15px;"
                . "			font-family: Segoe UI;"
                . "		}"
                . "		#caja{"
                . "			width: 550px;"
                . "			height: 530px;"
                . "			border-radius: 30px;"
                . "			padding: 10px;"
                . "			text-align: justify-all;"
                . "			font-family: Segoe UI;"
                . "			font-size: 15px;"
                . "		}"
                . "		#table2{"
                . "			font-family: Segoe UI;"
                . "		}"
                . "	</style>"
                . "	<head> "
                . "		<title>Sentinel</title>"
                . "	</head>"
                . "	<body>"
                . "		<div id ='caja'>"
                . "			<tbody>"
                . "				<br>"
                . "					<b>Estimado Marco L&#243;pez, </b>"
                . "				</br>"
                . "				<p style='text-align: justify;'>"
                . "					El cliente que detallamos a continuaci&#243;n ha sido contactado por nuestro call center y desea informar una novedad con respecto al servicio de BGR."
                . "				</p>"
                . "				<table class='table table-responsive'>"
                . "					<tr>"
                . "						<td width='30%'><b>C&#233;dula:</b></td>"
                . "						<td width='100%'>$txtIdentificacion</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Agencia:</b></td>"
                . "						<td width='100%'><b>$txtAgencia</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Campania:</b></td>"
                . "						<td width='100%'>$txtCampania</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Secci&#243;n:</b></td>"
                . "						<td width='100%'>$txtSeccion</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Fecha de atenci&#243;n:</b></td>"
                . "						<td width='100%'>$txtFechaAtencion</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Usuario KMB:</b></td>"
                . "						<td width='100%'>$Agent</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Tel&#233;fonos:</td>"
                . "						<td width='100%'>$txtTelefonoContacto</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Observaciones:</b></td>"
                . "						<td width='100%'> $txtObs</td>"
                . "					</tr>"
                . "				</table>"
                . "				<p>"
                . "					<br></br>"
                . "				</p>"
                . "				<table id ='table2' class='table-responsive'>"
                . "					<tr>"
                . "						<td style='font-size: 14px'><b>Cordialmente,</b></td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td style='font-size: 14px'>Asesor Call Center</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td style='font-size: 14px'>Nota: Este es un mail autom&#225;tico, por favor no responda este mensaje</td>"
                . "					</tr>"
                . "				</table>"
                . "				</tr>"
                . "			</tbody>  "
                . "		</div>"
                . "	</body>  "
                . "</html>");
        
        if ($oMail->send()) {
            echo("Mail enviado");
//            $sql = "INSERT INTO enviomail(ContactId, InteractionId, Agent, Tmstmp, Nombres, Cedula, Producto, Monto, Garante, Telefonos, Celular, Observaciones, Region, Ciudad, TipoOficina, Agencia, NUP, Correo, EnviadoD1, EnviadoD2, EnviadoCC1, EnviadoCC2, EnviadoCC3, EnviadoCC4, EstadoEnvio) "
//                    . "VALUES ('$IdCliente','','$Agent','$Tmstmp','$contactname','$cedulaMail','$productoMail','$montoMail','$garanteMail','$telefonoMail','$celularMail','$Observaciones','$regionC','$ciudadC','$tipoC','$agenciaC','$nup','$correoCliente','$principalMail','$copiaMail','$CC1','$CC2','$CC3','$CC4','ENVIADO')";
//            return ejecutarConsulta11($sql);
        } else {
            echo $oMail->ErrorInfo;
//            $sql = "INSERT INTO enviomail(ContactId, InteractionId, Agent, Tmstmp, Nombres, Cedula, Producto, Monto, Garante, Telefonos, Celular, Observaciones, Region, Ciudad, TipoOficina, Agencia, NUP, Correo, EnviadoD1, EnviadoD2, EnviadoCC1, EnviadoCC2, EnviadoCC3, EnviadoCC4, EstadoEnvio) "
//                    . "VALUES ('$IdCliente','','$Agent','$Tmstmp','$contactname','$cedulaMail','$productoMail','$montoMail','$garanteMail','$telefonoMail','$celularMail','$Observaciones','$regionC','$ciudadC','$tipoC','$agenciaC','$nup','$correoCliente','$principalMail','$copiaMail','$CC1','$CC2','$CC3','$CC4','NO ENVIADO')";
//            return ejecutarConsulta11($sql);
        }
    }

}

?>