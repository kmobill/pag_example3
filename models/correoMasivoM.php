<?php

require '../config/connection.php';
require "../ajax/Exception.php";
require "../ajax/PHPMailer.php";
require "../ajax/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Class correoMasivoM {

    public function _construct() { /* Constructor */
    }

    function envioCorreos($ContactId, $InteractionId, $Agent, $Tmstmp, $Nombres, $Cedula, $Producto, $Monto, $Garante, $Telefonos, $Celular, $Observaciones, $Region, $Ciudad, $TipoOficina, $Agencia, $NUP, $Correo, $EnviadoD1, $EnviadoD2, $EnviadoD3, $EnviadoD4, $EnviadoCC1, $EnviadoCC2, $EnviadoCC3, $EnviadoCC4) {
        $oMail = new PHPMailer();
        $oMail->isSMTP();
//        $oMail->Host = "r135.websiteservername.com";
        $oMail->Host = "mail.kimobill.com";
//        $oMail->Host = "a2plcpnl0258.prod.iad2.secureserver.net";
        $oMail->Port = 465;
        $oMail->SMTPSecure = "ssl";
        //$oMail->SMTPDebug = 2;
        $oMail->SMTPAuth = true;
        $oMail->Username = "notificaciones@kimobill.com";
        $oMail->Password = "Notificaciones.2k2021";
        $oMail->setFrom("notificaciones@kimobill.com", "NOTIFICACIONES KIMOBILL");
        $oMail->addAddress("$EnviadoD1");
        $oMail->addAddress("$EnviadoD2");
        $oMail->addCC("$EnviadoCC1");
        $oMail->addCC("$EnviadoCC2");
        $oMail->addCC("$EnviadoCC3");
        $oMail->addCC("$EnviadoCC4");
        $oMail->Subject = "CLIENTE $Nombres CI $Cedula DESEA ACERCARSE A LA AGENCIA POR EL CREDITO";
        $oMail->msgHTML("<!DOCTYPE html>  "
                . "<html>  "
                . "	<style>"
                . "		table td{		"
                . "			font-size: 15px; '"
                . "			font-family: Segoe UI; "
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
                . "					<b>Estimado(a) Colaborador(a), </b>"
                . "				</br>"
                . "				<p style='text-align: justify;'>"
                . "					Favor su atenci&#243;n, cliente interesado en desembolsar el cr&#233;dito:"
                . "				</p>"
                . "				<table class='table table-responsive'>"
                . "					<tr>"
                . "						<td width='30%'><strong>Nombres:</strong></td>"
                . "						<td width='100%'>$Nombres</td>"
                . "						<td></td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>C&#233;dula:</b>"
                . "						<td width='100%'>$Cedula</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Producto:</b></td>"
                . "						<td width='100%'>$Producto</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Monto:</b></td>"
                . "						<td width='100%'>$Monto</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Garante:</b></td>"
                . "						<td width='100%'>$Garante</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Tel&#233;fonos:</b></td>"
                . "						<td width='100%'>$Telefonos</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Celular:</b></td>"
                . "						<td width='100%'>$Celular</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>NUP:</b></td>"
                . "						<td width='100%'>$NUP</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>EMAIL:</b></td>"
                . "						<td width='100%'>$Correo</td>"
                . "					</tr>"
                . "					<tr>"
                . "						<td width='30%'><b>Observaciones:</b></td>"
                . "						<td width='100%'>$Observaciones</td>"
                . "					</tr>"
                . "				</table>"
                . "				<p>"
                . "					<br>Recuerda contactar al cliente dentro de las 24 horas de recibida esta notificaci&#243;n, confirma hora y fecha de visita en la agencia.</br>"
                . "				</p>"
                . "				<p>"
                . "					<br>Cualquier duda o inquietud favor responder a este correo, nos comunicaremos con usted de forma inmediata.</br>"
                . "				</p>"
                . "				<table id ='table2' class='table-responsive'>"
                . "					<tr>"
                . "						<td style='font-size: 14px'><b>Asesor Comercial Call Center</b></td>"
                . "					</tr>"
                . "				</table>"
                . "				</tr>"
                . "			</tbody>  "
                . "		</div>"
                . "	</body>  "
                . "</html>");

        if ($oMail->send()) {
            echo("Mail enviado");
            $sql = "INSERT INTO enviomail(ContactId, InteractionId, Agent, Tmstmp, Nombres, Cedula, Producto, Monto, Garante, Telefonos, Celular, Observaciones, Region, Ciudad, TipoOficina, Agencia, NUP, Correo, EnviadoD1, EnviadoD2, EnviadoD3, EnviadoD4, EnviadoCC1, EnviadoCC2, EnviadoCC3, EnviadoCC4, EstadoEnvio) "
                    . "VALUES ('$ContactId','','$Agent','$Tmstmp','$Nombres','$Cedula','$Producto','$Monto','$Garante','$Telefonos','$Celular','$Observaciones','$Region','$Ciudad','$TipoOficina','$Agencia','$NUP','$Correo','$EnviadoD1','$EnviadoD2','$EnviadoD3','$EnviadoD4','$EnviadoCC1','$EnviadoCC2','$EnviadoCC3','$EnviadoCC4','ENVIADO')";
            return ejecutarConsulta1($sql);
        } else {
            echo $oMail->ErrorInfo;
            $sql = "INSERT INTO enviomail(ContactId, InteractionId, Agent, Tmstmp, Nombres, Cedula, Producto, Monto, Garante, Telefonos, Celular, Observaciones, Region, Ciudad, TipoOficina, Agencia, NUP, Correo, EnviadoD1, EnviadoD2, EnviadoD3, EnviadoD4, EnviadoCC1, EnviadoCC2, EnviadoCC3, EnviadoCC4, EstadoEnvio) "
                    . "VALUES ('$ContactId','','$Agent','$Tmstmp','$Nombres','$Cedula','$Producto','$Monto','$Garante','$Telefonos','$Celular','$Observaciones','$Region','$Ciudad','$TipoOficina','$Agencia','$NUP','$Correo','$EnviadoD1','$EnviadoD2','$EnviadoD3','$EnviadoD4','$EnviadoCC1','$EnviadoCC2','$EnviadoCC3','$EnviadoCC4','NO ENVIADO')";
            return ejecutarConsulta1($sql);
        }
    }

    function envioCorreosImg($EnviadoD1, $EnviadoD2, $EnviadoD3, $EnviadoD4, $EnviadoD5, $EnviadoCC1, $EnviadoCC2, $EnviadoCC3, $EnviadoCC4, $EnviadoCC5) {
        $oMail = new PHPMailer();
        $oMail->isSMTP();
//        $oMail->Host = "r135.websiteservername.com";
        $oMail->Host = "mail.kimobill.com";
//        $oMail->Host = "a2plcpnl0258.prod.iad2.secureserver.net";
        $oMail->Port = 465;
        $oMail->SMTPSecure = "ssl";
//        $oMail->SMTPDebug = 2;
        $oMail->SMTPAuth = true;
        $oMail->Username = "notificaciones@kimobill.com";
        $oMail->Password = "Notificaciones.2k2021";
        $oMail->setFrom("notificaciones@kimobill.com", "Daquilema Cooperativa de ahorro y credito");
        $oMail->Subject = "MANTENIMIENTO DE CANALES ELECTRONICOS Y SERVICIOS";
        if ($EnviadoD1 != '') {
            $oMail->addAddress("$EnviadoD1");
        }
        if ($EnviadoD2 != '') {
            $oMail->addAddress("$EnviadoD2");
        }
        if ($EnviadoD3 != '') {
            $oMail->addAddress("$EnviadoD3");
        }
        if ($EnviadoD4 != '') {
            $oMail->addAddress("$EnviadoD4");
        }
        if ($EnviadoD5 != '') {
            $oMail->addAddress("$EnviadoD5");
        }
        if ($EnviadoCC1 != '') {
            $oMail->addCC("$EnviadoCC1");
        }
        if ($EnviadoCC2 != '') {
            $oMail->addCC("$EnviadoCC2");
        }
        if ($EnviadoCC3 != '') {
            $oMail->addCC("$EnviadoCC3");
        }
        if ($EnviadoCC4 != '') {
            $oMail->addCC("$EnviadoCC4");
        }
        if ($EnviadoCC5 != '') {
            $oMail->addCC("$EnviadoCC5");
        }
        $oMail->msgHTML("<!DOCTYPE html>"
                . "<html>"
                . "    <head>"
                . "        <meta charset='utf-8'>"
                . "        <meta http-equiv='X-UA-Compatible' content='IE=edge'>"
                . "        <title>Contact Center Kimobill | Log in</title>"
                . "        <!-- Tell the browser to be responsive to screen width -->"
                . "        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>"
                . "    </head>"
                . "    <body>"
                . "        <iframe src='https://mailchi.mp/52c83badbb07/campaa-movistar' width='1000' height='800'></iframe>"
                . "        <table>"
                . "            <tbody>"
                . "                <tr>"
                . "                    <td style='background-color: #a91212;'>"
                . "                        <center>"
                . "                        <img style='' src='http://172.19.1.78/1logo.png' alt=''/>"
                . "                        </center>"
                . "                    </td>"
                . "                </tr>"
                . "                <tr>"
                . "                    <td style='background-color: #e8e8e8;'>"
                . "                        <center>"
                . "                        <img src='http://172.19.1.78/2 imagen 1.png' alt=''/>"
                . "                        <br>"
                . "                        <img style='' src='http://172.19.1.78/3  Canales.png' alt=''/>"
                . "                        </center>"
                . "                    </td>"
                . "                </tr>   "
                . "                <tr>"
                . "                    <td style='padding-top:20px;background-color: #ffffff;'>"
                . "                        <p style='text-align: center; line-height: 1.2; word-break: break-word; font-size: 24px; mso-line-height-alt: 29px; margin: 0;'><span style='font-size: 24px;'><strong><span style=''>Estimado Socio(a)</span></strong></span></p>"
                . "                    </td>"
                . "                </tr> "
                . "                <tr>"
                . "                    <td style='min-width: 500px; max-width: 1000px;padding-top:20px;background-color: #ffffff; border-top:0px solid transparent; border-left:13px solid transparent; border-bottom:0px solid transparent; border-right:13px solid transparent; padding-top:0px; padding-bottom:0px; padding-left: 10px; padding-right: 10px;'>"
                . "                        <p style='text-align: justify; line-height: 1.2; word-break: break-word; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 16px; mso-line-height-alt: 19px; margin: 0;'><span style='font-size: 16px;'>Dentro del plan de mejora continua de nuestros servicios, realizaremos el <b>MANTENIMIENTO</b> de todos nuestros <b>CANALES ELECTR&Oacute;NICOS y SERVICIOS</b> (DaquiOnline, DaquiApp, Cajeros Autom&aacute;ticos y Corresponsal Solidario) los d&iacute;as s&aacute;bado <b>30 de octubre</b> desde las <b>23H00</b>, hasta el domingo <b>31 de octubre 13H00</b> </span></p>"
                . "                    </td>"
                . "                </tr>"
                . "                <tr>"
                . "                    <td style='min-width: 500px; max-width: 1000px;padding-top:20px;background-color: #ffffff; border-top:20px solid transparent; border-left:13px solid transparent; border-bottom:0px solid transparent; border-right:13px solid transparent; padding-top:0px; padding-bottom:0px; padding-left: 10px; padding-right: 10px;'>"
                . "                        <img src='http://172.19.1.78/4 barra 1.png' alt=''/>"
                . "                    </td>"
                . "                "
                . "                </tr>"
                . "                <tr>"
                . "                    <td style='min-width: 500px; max-width: 1200px;padding-top:20px;background-color: #ffffff; border-top:0px solid transparent; border-left:13px solid transparent; border-bottom:0px solid transparent; border-right:13px solid transparent; padding-top:0px; padding-bottom:0px; padding-left: 10px; padding-right: 10px;'>"
                . "                        <p style='text-align: center; line-height: 1.2; word-break: break-word; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; mso-line-height-alt: 17px; margin: 0;'><span style='font-size: 14px;'><span style='font-size: 16px;'><i><b>Agradecemos por su confianza y comprensi&oacute;n.</b></i></span></span></p>"
                . "                    </td>"
                . "                </tr>"
                . "                <tr>"
                . "                    <td style='padding-top:10px; min-width: 500px; max-width: 1200px'>"
                . "                        <img src='http://172.19.1.78/5 Barra 2.png' alt=''/>"
                . "                    </td>"
                . "                </tr>"
                . "                <tr align='center' style='vertical-align: top; display: inline-block; text-align: center;' valign='top'>"
                . "                    <td><a href='https://www.coopdaquilema.com/' style='outline:none' tabindex='-1' target='_blank'> <img alt='CoopDaquilema' border='0' class='left autowidth' src='http://172.19.1.78/images/6 web.png' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 300px; display: block; padding-right: 10px; ' title='CoopDaquilema' width='320'/></a></td>"
                . "                    <td><a href='#' style='outline:none' tabindex='-1' target='_blank'> <img border='0' class='left autowidth' src='http://172.19.1.78/images/7 barra 4.png' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 45px; display: block; ' width='45' /></a></td>"
                . "                    <td><a href='https://www.facebook.com/coopdaquilema' target='_blank'><img alt='Facebook' height='32' src='http://172.19.1.78/images//facebook.png' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block; padding-left: 10px;' title='facebook' width='32'/></a></td>"
                . "                    <td><a href='https://www.twitter.com/coopdaquilema' target='_blank'><img alt='Twitter' height='32' src='http://172.19.1.78/images//twitter.png' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;' title='twitter' width='32'/></a></td>"
                . "                    <td><a href='https://www.instagram.com/coopdaquilema' target='_blank'><img alt='Instagram' height='32' src='http://172.19.1.78/images//instagram.png' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;' title='instagram' width='32'/></a></td>"
                . "                    <td><a href='https://www.youtube.com/channel/UCClky-kMi42UPOgw3SgHsew' target='_blank'><img alt='YouTube' height='32' src='http://172.19.1.78/images//youtube.png' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block; padding-right: 10px;' title='YouTube' width='32'/></a></td>"
                . "                    <td><a href='#' style='outline:none' tabindex='-1' target='_blank'> <img border='0' class='left autowidth' src='http://172.19.1.78/images/7 barra 4.png' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 45px; display: block; ' width='45'/></a></td>"
                . "                    <td><a href='https://www.coopdaquilema.com/' style='outline:none' tabindex='-1' target='_blank'> <img border='0' class='left autowidth' src='http://172.19.1.78/images/telefono.png' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 300px; display: block; padding-left: 10px;' width='300'/></a></td>"
                . "                </tr>"
                . "            </tbody>"
                . "        </table>"
                . "    </body>"
                . "</html>");

        if ($oMail->send()) {
            echo("Mail enviado");
        } else {
            echo $oMail->ErrorInfo;
        }
    }

}

?>