<?php

session_start();

require '../models/cccaCreditosM.php';
$camp = new cccaCreditosM();
date_default_timezone_set("America/Lima");

$Id = isset($_POST["Id"]) ? LimpiarCadena12($_POST["Id"]) : ""; //Dato estraido de la funcion mostrar_uno js

$IdCliente = isset($_POST["IDC"]) ? LimpiarCadena12($_POST["IDC"]) : "";
$Num = isset($_POST["fonos"]) ? LimpiarCadena12($_POST["fonos"]) : "";
$Agent = $_SESSION['usu'];
$Estado = isset($_POST["estatusTel"]) ? LimpiarCadena12($_POST["estatusTel"]) : "";
$Tmstmp = date('Y-m-d H:i:s');
$time = isset($_POST["horaInicio"]) ? LimpiarCadena12($_POST["horaInicio"]) : "";
$intentos = isset($_POST["intentos"]) ? LimpiarCadena12($_POST["intentos"]) : "";
$level1 = isset($_POST["level1"]) ? LimpiarCadena12($_POST["level1"]) : "";
$level2 = isset($_POST["level2"]) ? LimpiarCadena12($_POST["level2"]) : "";
$level3 = isset($_POST["level3"]) ? LimpiarCadena2($_POST["level3"]) : "";
$campaign = isset($_POST["CAMPANIA"]) ? LimpiarCadena12($_POST["CAMPANIA"]) : "";
$mangementCode = isset($_POST["code"]) ? LimpiarCadena12($_POST["code"]) : "";
$queryT = ejecutarConsulta("SELECT NumeroMarcado FROM contactimportphone WHERE ContactId = '$IdCliente' order by FechaHoraFin desc limit 1");
$rowT = mysqli_fetch_array($queryT, MYSQLI_BOTH);
$contactAddress = $rowT["NumeroMarcado"];
if ($level1 == 'DB' && $level2 = 'DADO DE BAJA POR NO VENTA') {
    $interactionId = isset($_POST["interactionIdOld"]) ? LimpiarCadena5($_POST["interactionIdOld"]) : "";
} else {
    $interactionId = isset($_POST["interactionId"]) ? LimpiarCadena5($_POST["interactionId"]) : "";
}
$contactname = isset($_POST["NOMBRE_CLIENTE"]) ? LimpiarCadena10($_POST["NOMBRE_CLIENTE"]) : "";
$FechaAgendamiento = isset($_POST["agenda"]) ? LimpiarCadena12($_POST["agenda"]) : "";
$TelefonoAd = isset($_POST["fonoAd"]) ? LimpiarCadena12($_POST["fonoAd"]) : "";
$Observaciones = isset($_POST["obs"]) ? LimpiarCadena12($_POST["obs"]) : "";
/* Campos de la campaña de crédito */
$MONTO_ACEPTADO_CRD = isset($_POST["MONTO_ACEPTADO_CRD"]) ? LimpiarCadena12($_POST["MONTO_ACEPTADO_CRD"]) : "";
$PLAZO_ACEPTADO_CRD = isset($_POST["PLAZO_ACEPTADO_CRD"]) ? LimpiarCadena12($_POST["PLAZO_ACEPTADO_CRD"]) : "";
$FECHA_AGENDA_CRD = isset($_POST["FECHA_AGENDA_CRD"]) ? LimpiarCadena12($_POST["FECHA_AGENDA_CRD"]) : "";
$HORA_AGENDA_CRD = isset($_POST["HORA_AGENDA_CRD"]) ? LimpiarCadena12($_POST["HORA_AGENDA_CRD"]) : "";
/* Campos de la campaña de encuesta CEM */
$pregunta1 = isset($_POST["pregunta1"]) ? LimpiarCadena10($_POST["pregunta1"]) : "";
$respuesta1 = isset($_POST["respuesta1"]) ? LimpiarCadena10($_POST["respuesta1"]) : "";
$pregunta1_1 = isset($_POST["pregunta1_1"]) ? LimpiarCadena10($_POST["pregunta1_1"]) : "";
$respuesta1_1 = isset($_POST["respuesta1_1"]) ? LimpiarCadena10($_POST["respuesta1_1"]) : "";
$pregunta2 = isset($_POST["pregunta2"]) ? LimpiarCadena10($_POST["pregunta2"]) : "";
$respuesta2 = isset($_POST["respuesta2"]) ? LimpiarCadena10($_POST["respuesta2"]) : "";
$pregunta2_1 = isset($_POST["pregunta2_1"]) ? LimpiarCadena10($_POST["pregunta2_1"]) : "";
$respuesta2_1 = isset($_POST["respuesta2_1"]) ? LimpiarCadena10($_POST["respuesta2_1"]) : "";
$pregunta3 = isset($_POST["pregunta3"]) ? LimpiarCadena10($_POST["pregunta3"]) : "";
$respuesta3 = isset($_POST["respuesta3"]) ? LimpiarCadena10($_POST["respuesta3"]) : "";
$pregunta3_1 = isset($_POST["pregunta3_1"]) ? LimpiarCadena10($_POST["pregunta3_1"]) : "";
$respuesta3_1 = isset($_POST["respuesta3_1"]) ? LimpiarCadena10($_POST["respuesta3_1"]) : "";
$pregunta4 = isset($_POST["pregunta4"]) ? LimpiarCadena10($_POST["pregunta4"]) : "";
$respuesta4 = isset($_POST["respuesta4"]) ? LimpiarCadena10($_POST["respuesta4"]) : "";
$pregunta4_1 = isset($_POST["pregunta4_1"]) ? LimpiarCadena10($_POST["pregunta4_1"]) : "";
$respuesta4_1 = isset($_POST["respuesta4_1"]) ? LimpiarCadena10($_POST["respuesta4_1"]) : "";
$pregunta5 = isset($_POST["pregunta5"]) ? LimpiarCadena10($_POST["pregunta5"]) : "";
$respuesta5 = isset($_POST["respuesta5"]) ? LimpiarCadena10($_POST["respuesta5"]) : "";
$pregunta5_1 = isset($_POST["pregunta5_1"]) ? LimpiarCadena10($_POST["pregunta5_1"]) : "";
$respuesta5_1 = isset($_POST["respuesta5_1"]) ? LimpiarCadena10($_POST["respuesta5_1"]) : "";
$pregunta6 = isset($_POST["pregunta6"]) ? LimpiarCadena10($_POST["pregunta6"]) : "";
$respuesta6 = isset($_POST["respuesta6"]) ? LimpiarCadena10($_POST["respuesta6"]) : "";
$pregunta6_1 = isset($_POST["pregunta6_1"]) ? LimpiarCadena10($_POST["pregunta6_1"]) : "";
$respuesta6_1 = isset($_POST["respuesta6_1"]) ? LimpiarCadena10($_POST["respuesta6_1"]) : "";
$pregunta7 = isset($_POST["pregunta7"]) ? LimpiarCadena10($_POST["pregunta7"]) : "";
$respuesta7 = isset($_POST["respuesta7"]) ? LimpiarCadena10($_POST["respuesta7"]) : "";
$pregunta7_1 = isset($_POST["pregunta7_1"]) ? LimpiarCadena10($_POST["pregunta7_1"]) : "";
$respuesta7_1 = isset($_POST["respuesta7_1"]) ? LimpiarCadena10($_POST["respuesta7_1"]) : "";
$pregunta8 = isset($_POST["pregunta8"]) ? LimpiarCadena10($_POST["pregunta8"]) : "";
$respuesta8 = isset($_POST["respuesta8"]) ? LimpiarCadena10($_POST["respuesta8"]) : "";
$pregunta8_1 = isset($_POST["pregunta8_1"]) ? LimpiarCadena10($_POST["pregunta8_1"]) : "";
$respuesta8_1 = isset($_POST["respuesta8_1"]) ? LimpiarCadena10($_POST["respuesta8_1"]) : "";
$pregunta9 = isset($_POST["pregunta9"]) ? LimpiarCadena10($_POST["pregunta9"]) : "";
$respuesta9 = isset($_POST["respuesta9"]) ? LimpiarCadena10($_POST["respuesta9"]) : "";
$pregunta9_1 = isset($_POST["pregunta9_1"]) ? LimpiarCadena10($_POST["pregunta9_1"]) : "";
$respuesta9_1 = isset($_POST["respuesta9_1"]) ? LimpiarCadena10($_POST["respuesta9_1"]) : "";
$pregunta10 = isset($_POST["pregunta10"]) ? LimpiarCadena10($_POST["pregunta10"]) : "";
$respuesta10 = isset($_POST["respuesta10"]) ? LimpiarCadena10($_POST["respuesta10"]) : "";
$pregunta10_1 = isset($_POST["pregunta10_1"]) ? LimpiarCadena10($_POST["pregunta10_1"]) : "";
$respuesta10_1 = isset($_POST["respuesta10_1"]) ? LimpiarCadena10($_POST["respuesta10_1"]) : "";
$ATRIBUTO_NPS = isset($_POST["ATRIBUTO_NPS"]) ? LimpiarCadena10($_POST["ATRIBUTO_NPS"]) : "";
$ATRIBUTO_CES = isset($_POST["ATRIBUTO_CES"]) ? LimpiarCadena10($_POST["ATRIBUTO_CES"]) : "";
$ATRIBUTO_INS = isset($_POST["ATRIBUTO_INS"]) ? LimpiarCadena10($_POST["ATRIBUTO_INS"]) : "";

switch ($_GET["action"]) {
    case 'fechaInicio':
        date_default_timezone_set("America/Lima");
        echo(date('Y-m-d H:i:s'));
        break;

    case 'selectAll':
        $respuesta = $camp->selectAll(); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->ID, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => $registrar->CampaignId,
                "2" => $registrar->ImportId,
                "3" => $registrar->Agent,
                "4" => $registrar->IDENTIFICACION,
                "5" => $registrar->NOMBRE_CLIENTE,
                "6" => $registrar->TIPO_CRD,
                "7" => $registrar->MONTO_MAXIMO_CRD,
                "8" => $registrar->PLAZO_CRD,
                "9" => $registrar->ResultLevel2,
                "10" => '<a href="#" style="color: #3C8DBC;" onclick="mostrar_uno(\'' . $registrar->ID . '\')">Gestionar</a>',
            );
        }
        $resultados = array(
            "sEcho" => 1, /* informacion para la herramienta datatables */
            "iTotalRecords" => count($datos), /* envía el total de columnas a visualizar */
            "iTotalDisplayRecords" => count($datos), /* envia el total de filas a visualizar */
            "aaData" => $datos /* envía el arreglo completo que se llenó con el while */
        );
        echo json_encode($resultados);
        break;

    case 'selectAll_1':
        $respuesta = $camp->selectAll_1(); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->ID, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => $registrar->CampaignId,
                "2" => $registrar->ImportId,
                "3" => $registrar->Agent,
                "4" => $registrar->IDENTIFICACION,
                "5" => $registrar->NOMBRE_CLIENTE,
                "6" => $registrar->TIPO_CRD,
                "7" => $registrar->MONTO_MAXIMO_CRD,
                "8" => $registrar->PLAZO_CRD,
                "9" => $registrar->ResultLevel2,
                "10" => '<a href="#" style="color: #3C8DBC;" onclick="mostrar_uno(\'' . $registrar->ID . '\')">Gestionar</a>',
            );
        }
        $resultados = array(
            "sEcho" => 1, /* informacion para la herramienta datatables */
            "iTotalRecords" => count($datos), /* envía el total de columnas a visualizar */
            "iTotalDisplayRecords" => count($datos), /* envia el total de filas a visualizar */
            "aaData" => $datos /* envía el arreglo completo que se llenó con el while */
        );
        echo json_encode($resultados);
        break;

    case 'selectById':
        $respuesta = $camp->selectById($Id);
        echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;

    case 'selectByIdRec':
        $respuesta = $camp->selectByIdRec($Id);
        echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;

    case 'save':
        if ($IdCliente != "") {
            $saveById = ejecutarConsulta12("select contactid from cooperativasventas.gestionfinal where contactid = '$IdCliente'");
            $valid = mysqli_fetch_array($saveById, MYSQLI_BOTH);
            $numRowC = $saveById->num_rows;
            if ($numRowC == 0) {
                if ($camp->insertGestionFinal($IdCliente, $contactAddress, $interactionId, $Agent, $level1, $level2, $level3, $mangementCode, $time, $Tmstmp, $intentos, $FechaAgendamiento, $TelefonoAd, $Observaciones, $MONTO_ACEPTADO_CRD, $PLAZO_ACEPTADO_CRD, $FECHA_AGENDA_CRD, $HORA_AGENDA_CRD)) {
                    $respuesta = $camp->updateClientes($IdCliente, $Agent, $level1, $level2, $level3, $mangementCode, $Tmstmp, $intentos, $contactAddress, $interactionId);
                    ejecutarConsulta("Update contactimportcontact set LastAgent = '$Agent', LastManagementResult = '$mangementCode', Number = '$intentos', Action = 'Gestionado' where id = '$IdCliente' ");
                    $camp->insertGestionHistorica($IdCliente);
                    echo "Registro almacenado con éxito";
                } else {
                    echo "Error: registro no se pudo almacenar";
                }
            } else {
                if ($camp->updateGestionFinal($IdCliente, $contactAddress, $interactionId, $Agent, $level1, $level2, $level3, $mangementCode, $time, $Tmstmp, $intentos, $FechaAgendamiento, $TelefonoAd, $Observaciones, $MONTO_ACEPTADO_CRD, $PLAZO_ACEPTADO_CRD, $FECHA_AGENDA_CRD, $HORA_AGENDA_CRD)) {
                    $respuesta = $camp->updateClientes($IdCliente, $Agent, $level1, $level2, $level3, $mangementCode, $Tmstmp, $intentos, $contactAddress, $interactionId);
                    ejecutarConsulta("Update contactimportcontact set LastAgent = '$Agent', LastManagementResult = '$mangementCode', Number = '$intentos', Action = 'Gestionado' where id = '$IdCliente' ");
                    $camp->insertGestionHistorica($IdCliente);
                    echo "Registro actualizado con éxito";
                } else {
                    echo "Error: registro no se pudo actualizar";
                }
            }
        } else {
            echo "Error de almacenamiento";
        }
        break;

    case 'saveCEM':
        if ($IdCliente != "") {
            $saveById = ejecutarConsulta12("select contactid from cooperativasventas.gestionfinalcem where contactid = '$IdCliente'");
            $valid = mysqli_fetch_array($saveById, MYSQLI_BOTH);
            $numRowC = $saveById->num_rows;
            if ($numRowC == 0) {
                if ($camp->insertGestionFinalCEM($IdCliente, $contactAddress, $interactionId, $Agent, $level1, $level2, $level3, $mangementCode, $time, $Tmstmp, $intentos, $FechaAgendamiento, $TelefonoAd, $Observaciones, $pregunta1, $pregunta1_1, $pregunta2, $pregunta2_1, $pregunta3, $pregunta3_1, $pregunta4, $pregunta4_1, $pregunta5, $pregunta5_1, $pregunta6, $pregunta6_1, $pregunta7, $pregunta7_1, $pregunta8, $pregunta8_1, $pregunta9, $pregunta9_1, $pregunta10, $pregunta10_1, $respuesta1, $respuesta1_1, $respuesta2, $respuesta2_1, $respuesta3, $respuesta3_1, $respuesta4, $respuesta4_1, $respuesta5, $respuesta5_1, $respuesta6, $respuesta6_1, $respuesta7, $respuesta7_1, $respuesta8, $respuesta8_1, $respuesta9, $respuesta9_1, $respuesta10, $respuesta10_1, $ATRIBUTO_NPS, $ATRIBUTO_CES, $ATRIBUTO_INS)) {
                    $respuesta = $camp->updateClientes($IdCliente, $Agent, $level1, $level2, $level3, $mangementCode, $Tmstmp, $intentos, $contactAddress, $interactionId);
                    ejecutarConsulta("Update contactimportcontact set LastAgent = '$Agent', LastManagementResult = '$mangementCode', Number = '$intentos', Action = 'Gestionado' where id = '$IdCliente' ");
                    $camp->insertGestionHistoricaCEM($IdCliente);
                    echo "Registro almacenado con éxito";
                } else {
                    echo "Error: registro no se pudo almacenar";
                }
            } else {
                if ($camp->updateGestionFinalCEM($IdCliente, $contactAddress, $interactionId, $Agent, $level1, $level2, $level3, $mangementCode, $time, $Tmstmp, $intentos, $FechaAgendamiento, $TelefonoAd, $Observaciones, $pregunta1, $pregunta1_1, $pregunta2, $pregunta2_1, $pregunta3, $pregunta3_1, $pregunta4, $pregunta4_1, $pregunta5, $pregunta5_1, $pregunta6, $pregunta6_1, $pregunta7, $pregunta7_1, $pregunta8, $pregunta8_1, $pregunta9, $pregunta9_1, $pregunta10, $pregunta10_1, $respuesta1, $respuesta1_1, $respuesta2, $respuesta2_1, $respuesta3, $respuesta3_1, $respuesta4, $respuesta4_1, $respuesta5, $respuesta5_1, $respuesta6, $respuesta6_1, $respuesta7, $respuesta7_1, $respuesta8, $respuesta8_1, $respuesta9, $respuesta9_1, $respuesta10, $respuesta10_1, $ATRIBUTO_NPS, $ATRIBUTO_CES, $ATRIBUTO_INS)) {
                    $respuesta = $camp->updateClientes($IdCliente, $Agent, $level1, $level2, $level3, $mangementCode, $Tmstmp, $intentos, $contactAddress, $interactionId);
                    ejecutarConsulta("Update contactimportcontact set LastAgent = '$Agent', LastManagementResult = '$mangementCode', Number = '$intentos', Action = 'Gestionado' where id = '$IdCliente' ");
                    $camp->insertGestionHistoricaCEM($IdCliente);
                    echo "Registro actualizado con éxito";
                } else {
                    echo "Error: registro no se pudo actualizar";
                }
            }
        } else {
            echo "Error de almacenamiento";
        }
        break;
}
?>