<?php

session_start();

require '../models/verificacionDeDatosM.php';
$camp = new verificacionDeDatos();
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
//Información actualizada
$IDENTIFICACION_VRF = isset($_POST["IDENTIFICACION_VRF"]) ? LimpiarCadena12($_POST["IDENTIFICACION_VRF"]) : "";
$NOMBRE_CLIENTE_VRF = isset($_POST["NOMBRE_CLIENTE_VRF"]) ? LimpiarCadena12($_POST["NOMBRE_CLIENTE_VRF"]) : "";
$GENERO_VRF = isset($_POST["GENERO_VRF"]) ? LimpiarCadena12($_POST["GENERO_VRF"]) : "";
$FECHA_INGRESO_VRF = isset($_POST["FECHA_INGRESO_VRF"]) ? LimpiarCadena12($_POST["FECHA_INGRESO_VRF"]) : "";
$EDAD_VRF = isset($_POST["EDAD_VRF"]) ? LimpiarCadena12($_POST["EDAD_VRF"]) : "";
$TIPO_VRF = isset($_POST["TIPO_VRF"]) ? LimpiarCadena12($_POST["TIPO_VRF"]) : "";
$ESTADO_CUENTA_VRF = isset($_POST["ESTADO_CUENTA_VRF"]) ? LimpiarCadena12($_POST["ESTADO_CUENTA_VRF"]) : "";
$DIRECCION_VRF = isset($_POST["DIRECCION_VRF"]) ? LimpiarCadena12($_POST["DIRECCION_VRF"]) : "";
$PRIMER_NOMBRE_VRF = isset($_POST["PRIMER_NOMBRE_VRF"]) ? LimpiarCadena12($_POST["PRIMER_NOMBRE_VRF"]) : "";
$SEGUNDO_NOMBRE_VRF = isset($_POST["SEGUNDO_NOMBRE_VRF"]) ? LimpiarCadena12($_POST["SEGUNDO_NOMBRE_VRF"]) : "";
$PRIMER_APELLIDO_VRF = isset($_POST["PRIMER_APELLIDO_VRF"]) ? LimpiarCadena12($_POST["PRIMER_APELLIDO_VRF"]) : "";
$SEGUNDO_APELLIDO_VRF = isset($_POST["SEGUNDO_APELLIDO_VRF"]) ? LimpiarCadena12($_POST["SEGUNDO_APELLIDO_VRF"]) : "";
$FECHA_NACIMIENTO_VRF = isset($_POST["FECHA_NACIMIENTO_VRF"]) ? LimpiarCadena12($_POST["FECHA_NACIMIENTO_VRF"]) : "";
$PAIS_DOMICILIO_VRF = isset($_POST["PAIS_DOMICILIO_VRF"]) ? LimpiarCadena12($_POST["PAIS_DOMICILIO_VRF"]) : "";
$PROVINCIA_DOMICILIO_VRF = isset($_POST["PROVINCIA_DOMICILIO_VRF"]) ? LimpiarCadena12($_POST["PROVINCIA_DOMICILIO_VRF"]) : "";
$CANTON_DOMICILIO_VRF = isset($_POST["CANTON_DOMICILIO_VRF"]) ? LimpiarCadena12($_POST["CANTON_DOMICILIO_VRF"]) : "";
$PARROQUIA_DOMICILIO_VRF = isset($_POST["PARROQUIA_DOMICILIO_VRF"]) ? LimpiarCadena12($_POST["PARROQUIA_DOMICILIO_VRF"]) : "";
$SECTOR_DOMICILIO_VRF = isset($_POST["SECTOR_DOMICILIO_VRF"]) ? LimpiarCadena12($_POST["SECTOR_DOMICILIO_VRF"]) : "";
$AV_PRINCIPAL_DOMICILIO_VRF = isset($_POST["AV_PRINCIPAL_DOMICILIO_VRF"]) ? LimpiarCadena12($_POST["AV_PRINCIPAL_DOMICILIO_VRF"]) : "";
$AV_SECUNDARIA_DOMICILIO_VRF = isset($_POST["AV_SECUNDARIA_DOMICILIO_VRF"]) ? LimpiarCadena12($_POST["AV_SECUNDARIA_DOMICILIO_VRF"]) : "";
$REFERENCIA_DOMICILIO_VRF = isset($_POST["REFERENCIA_DOMICILIO_VRF"]) ? LimpiarCadena12($_POST["REFERENCIA_DOMICILIO_VRF"]) : "";
$NOMENCLATURA_DOMICILIO_VRF = isset($_POST["NOMENCLATURA_DOMICILIO_VRF"]) ? LimpiarCadena12($_POST["NOMENCLATURA_DOMICILIO_VRF"]) : "";
$CORREO_PERSONAL_VRF = isset($_POST["CORREO_PERSONAL_VRF"]) ? LimpiarCadena12($_POST["CORREO_PERSONAL_VRF"]) : "";
$TELEFONO_1_VRF = isset($_POST["TELEFONO_1_VRF"]) ? LimpiarCadena12($_POST["TELEFONO_1_VRF"]) : "";
$TELEFONO_2_VRF = isset($_POST["TELEFONO_2_VRF"]) ? LimpiarCadena12($_POST["TELEFONO_2_VRF"]) : "";
$PAIS_TRABAJO_VRF = isset($_POST["PAIS_TRABAJO_VRF"]) ? LimpiarCadena12($_POST["PAIS_TRABAJO_VRF"]) : "";
$PROVINCIA_TRABAJO_VRF = isset($_POST["PROVINCIA_TRABAJO_VRF"]) ? LimpiarCadena12($_POST["PROVINCIA_TRABAJO_VRF"]) : "";
$CANTON_TRABAJO_VRF = isset($_POST["CANTON_TRABAJO_VRF"]) ? LimpiarCadena12($_POST["CANTON_TRABAJO_VRF"]) : "";
$PARROQUIA_TRABAJO_VRF = isset($_POST["PARROQUIA_TRABAJO_VRF"]) ? LimpiarCadena12($_POST["PARROQUIA_TRABAJO_VRF"]) : "";
$SECTOR_TRABAJO_VRF = isset($_POST["SECTOR_TRABAJO_VRF"]) ? LimpiarCadena12($_POST["SECTOR_TRABAJO_VRF"]) : "";
$AV_PRINCIPAL_TRABAJO_VRF = isset($_POST["AV_PRINCIPAL_TRABAJO_VRF"]) ? LimpiarCadena12($_POST["AV_PRINCIPAL_TRABAJO_VRF"]) : "";
$AV_SECUNDARIA_TRABAJO_VRF = isset($_POST["AV_SECUNDARIA_TRABAJO_VRF"]) ? LimpiarCadena12($_POST["AV_SECUNDARIA_TRABAJO_VRF"]) : "";
$REFERENCIA_TRABAJO_VRF = isset($_POST["REFERENCIA_TRABAJO_VRF"]) ? LimpiarCadena12($_POST["REFERENCIA_TRABAJO_VRF"]) : "";
$NOMENCLATURA_TRABAJO_VRF = isset($_POST["NOMENCLATURA_TRABAJO_VRF"]) ? LimpiarCadena12($_POST["NOMENCLATURA_TRABAJO_VRF"]) : "";
$CORREO_TRABAJO_VRF = isset($_POST["CORREO_TRABAJO_VRF"]) ? LimpiarCadena12($_POST["CORREO_TRABAJO_VRF"]) : "";
$TELEFONO_3_VRF = isset($_POST["TELEFONO_3_VRF"]) ? LimpiarCadena12($_POST["TELEFONO_3_VRF"]) : "";
$TELEFONO_4_VRF = isset($_POST["TELEFONO_4_VRF"]) ? LimpiarCadena12($_POST["TELEFONO_4_VRF"]) : "";
$REFERENCIA_PERSONAL_VRF = isset($_POST["REFERENCIA_PERSONAL_VRF"]) ? LimpiarCadena12($_POST["REFERENCIA_PERSONAL_VRF"]) : "";
$PARENTESCO_REFERENCIA_VRF = isset($_POST["PARENTESCO_REFERENCIA_VRF"]) ? LimpiarCadena12($_POST["PARENTESCO_REFERENCIA_VRF"]) : "";
$TELEFONO_REFERENCIA_VRF = isset($_POST["TELEFONO_REFERENCIA_VRF"]) ? LimpiarCadena12($_POST["TELEFONO_REFERENCIA_VRF"]) : "";
//Pesos de la información
$NOMBRE_CLIENTE_PS = isset($_POST["NOMBRE_CLIENTE_PS"]) ? LimpiarCadena12($_POST["NOMBRE_CLIENTE_PS"]) : "";
$GENERO_PS = isset($_POST["GENERO_PS"]) ? LimpiarCadena12($_POST["GENERO_PS"]) : "";
$FECHA_INGRESO_PS = isset($_POST["FECHA_INGRESO_PS"]) ? LimpiarCadena12($_POST["FECHA_INGRESO_PS"]) : "";
$EDAD_PS = isset($_POST["EDAD_PS"]) ? LimpiarCadena12($_POST["EDAD_PS"]) : "";
$TIPO_PS = isset($_POST["TIPO_PS"]) ? LimpiarCadena12($_POST["TIPO_PS"]) : "";
$ESTADO_CUENTA_PS = isset($_POST["ESTADO_CUENTA_PS"]) ? LimpiarCadena12($_POST["ESTADO_CUENTA_PS"]) : "";
$DIRECCION_PS = isset($_POST["DIRECCION_PS"]) ? LimpiarCadena12($_POST["DIRECCION_PS"]) : "";

if (isset($_POST["chk1"]) == 'ok') {
    $IDENTIFICACION_PS = isset($_POST["IDENTIFICACION_PS"]) ? LimpiarCadena12($_POST["IDENTIFICACION_PS"]) : "";
} else {
    $IDENTIFICACION_PS = "0";
}

if (isset($_POST["chk2"]) == 'ok') {
    $PRIMER_NOMBRE_PS = isset($_POST["PRIMER_NOMBRE_PS"]) ? LimpiarCadena12($_POST["PRIMER_NOMBRE_PS"]) : "";
} else {
    $PRIMER_NOMBRE_PS = "0";
}

if (isset($_POST["chk3"]) == 'ok') {
    $SEGUNDO_NOMBRE_PS = isset($_POST["SEGUNDO_NOMBRE_PS"]) ? LimpiarCadena12($_POST["SEGUNDO_NOMBRE_PS"]) : "";
} else {
    $SEGUNDO_NOMBRE_PS = "0";
}

if (isset($_POST["chk4"]) == 'ok') {
    $PRIMER_APELLIDO_PS = isset($_POST["PRIMER_APELLIDO_PS"]) ? LimpiarCadena12($_POST["PRIMER_APELLIDO_PS"]) : "";
} else {
    $PRIMER_APELLIDO_PS = "0";
}

if (isset($_POST["chk5"]) == 'ok') {
    $SEGUNDO_APELLIDO_PS = isset($_POST["SEGUNDO_APELLIDO_PS"]) ? LimpiarCadena12($_POST["SEGUNDO_APELLIDO_PS"]) : "";
} else {
    $SEGUNDO_APELLIDO_PS = "0";
}

if (isset($_POST["chk6"]) == 'ok') {
    $FECHA_NACIMIENTO_PS = isset($_POST["FECHA_NACIMIENTO_PS"]) ? LimpiarCadena12($_POST["FECHA_NACIMIENTO_PS"]) : "";
} else {
    $FECHA_NACIMIENTO_PS = "0";
}

if (isset($_POST["chk7"]) == 'ok') {
    $PAIS_DOMICILIO_PS = isset($_POST["PAIS_DOMICILIO_PS"]) ? LimpiarCadena12($_POST["PAIS_DOMICILIO_PS"]) : "";
} else {
    $PAIS_DOMICILIO_PS = "0";
}

if (isset($_POST["chk8"]) == 'ok') {
    $PROVINCIA_DOMICILIO_PS = isset($_POST["PROVINCIA_DOMICILIO_PS"]) ? LimpiarCadena12($_POST["PROVINCIA_DOMICILIO_PS"]) : "";
} else {
    $PROVINCIA_DOMICILIO_PS = "0";
}

if (isset($_POST["chk9"]) == 'ok') {
    $CANTON_DOMICILIO_PS = isset($_POST["CANTON_DOMICILIO_PS"]) ? LimpiarCadena12($_POST["CANTON_DOMICILIO_PS"]) : "";
} else {
    $CANTON_DOMICILIO_PS = "0";
}

if (isset($_POST["chk10"]) == 'ok') {
    $PARROQUIA_DOMICILIO_PS = isset($_POST["PARROQUIA_DOMICILIO_PS"]) ? LimpiarCadena12($_POST["PARROQUIA_DOMICILIO_PS"]) : "";
} else {
    $PARROQUIA_DOMICILIO_PS = "0";
}

if (isset($_POST["chk11"]) == 'ok') {
    $SECTOR_DOMICILIO_PS = isset($_POST["SECTOR_DOMICILIO_PS"]) ? LimpiarCadena12($_POST["SECTOR_DOMICILIO_PS"]) : "";
} else {
    $SECTOR_DOMICILIO_PS = "0";
}

if (isset($_POST["chk12"]) == 'ok') {
    $AV_PRINCIPAL_DOMICILIO_PS = isset($_POST["AV_PRINCIPAL_DOMICILIO_PS"]) ? LimpiarCadena12($_POST["AV_PRINCIPAL_DOMICILIO_PS"]) : "";
} else {
    $AV_PRINCIPAL_DOMICILIO_PS = "0";
}

if (isset($_POST["chk13"]) == 'ok') {
    $AV_SECUNDARIA_DOMICILIO_PS = isset($_POST["AV_SECUNDARIA_DOMICILIO_PS"]) ? LimpiarCadena12($_POST["AV_SECUNDARIA_DOMICILIO_PS"]) : "";
} else {
    $AV_SECUNDARIA_DOMICILIO_PS = "0";
}

if (isset($_POST["chk14"]) == 'ok') {
    $REFERENCIA_DOMICILIO_PS = isset($_POST["REFERENCIA_DOMICILIO_PS"]) ? LimpiarCadena12($_POST["REFERENCIA_DOMICILIO_PS"]) : "";
} else {
    $REFERENCIA_DOMICILIO_PS = "0";
}

if (isset($_POST["chk15"]) == 'ok') {
    $NOMENCLATURA_DOMICILIO_PS = isset($_POST["NOMENCLATURA_DOMICILIO_PS"]) ? LimpiarCadena12($_POST["NOMENCLATURA_DOMICILIO_PS"]) : "";
} else {
    $NOMENCLATURA_DOMICILIO_PS = "0";
}

if (isset($_POST["chk16"]) == 'ok') {
    $CORREO_PERSONAL_PS = isset($_POST["CORREO_PERSONAL_PS"]) ? LimpiarCadena12($_POST["CORREO_PERSONAL_PS"]) : "";
} else {
    $CORREO_PERSONAL_PS = "0";
}

if (isset($_POST["chk17"]) == 'ok') {
    $TELEFONO_1_PS = isset($_POST["TELEFONO_1_PS"]) ? LimpiarCadena12($_POST["TELEFONO_1_PS"]) : "";
} else {
    $TELEFONO_1_PS = "0";
}

if (isset($_POST["chk18"]) == 'ok') {
    $TELEFONO_2_PS = isset($_POST["TELEFONO_2_PS"]) ? LimpiarCadena12($_POST["TELEFONO_2_PS"]) : "";
} else {
    $TELEFONO_2_PS = "0";
}

if (isset($_POST["chk19"]) == 'ok') {
    $PAIS_TRABAJO_PS = isset($_POST["PAIS_TRABAJO_PS"]) ? LimpiarCadena12($_POST["PAIS_TRABAJO_PS"]) : "";
} else {
    $PAIS_TRABAJO_PS = "0";
}

if (isset($_POST["chk20"]) == 'ok') {
    $PROVINCIA_TRABAJO_PS = isset($_POST["PROVINCIA_TRABAJO_PS"]) ? LimpiarCadena12($_POST["PROVINCIA_TRABAJO_PS"]) : "";
} else {
    $PROVINCIA_TRABAJO_PS = "0";
}

if (isset($_POST["chk21"]) == 'ok') {
    $CANTON_TRABAJO_PS = isset($_POST["CANTON_TRABAJO_PS"]) ? LimpiarCadena12($_POST["CANTON_TRABAJO_PS"]) : "";
} else {
    $CANTON_TRABAJO_PS = "0";
}

if (isset($_POST["chk22"]) == 'ok') {
    $PARROQUIA_TRABAJO_PS = isset($_POST["PARROQUIA_TRABAJO_PS"]) ? LimpiarCadena12($_POST["PARROQUIA_TRABAJO_PS"]) : "";
} else {
    $PARROQUIA_TRABAJO_PS = "0";
}

if (isset($_POST["chk23"]) == 'ok') {
    $SECTOR_TRABAJO_PS = isset($_POST["SECTOR_TRABAJO_PS"]) ? LimpiarCadena12($_POST["SECTOR_TRABAJO_PS"]) : "";
} else {
    $SECTOR_TRABAJO_PS = "0";
}

if (isset($_POST["chk24"]) == 'ok') {
    $AV_PRINCIPAL_TRABAJO_PS = isset($_POST["AV_PRINCIPAL_TRABAJO_PS"]) ? LimpiarCadena12($_POST["AV_PRINCIPAL_TRABAJO_PS"]) : "";
} else {
    $AV_PRINCIPAL_TRABAJO_PS = "0";
}

if (isset($_POST["chk25"]) == 'ok') {
    $AV_SECUNDARIA_TRABAJO_PS = isset($_POST["AV_SECUNDARIA_TRABAJO_PS"]) ? LimpiarCadena12($_POST["AV_SECUNDARIA_TRABAJO_PS"]) : "";
} else {
    $AV_SECUNDARIA_TRABAJO_PS = "0";
}

if (isset($_POST["chk26"]) == 'ok') {
    $REFERENCIA_TRABAJO_PS = isset($_POST["REFERENCIA_TRABAJO_PS"]) ? LimpiarCadena12($_POST["REFERENCIA_TRABAJO_PS"]) : "";
} else {
    $REFERENCIA_TRABAJO_PS = "0";
}

if (isset($_POST["chk27"]) == 'ok') {
    $NOMENCLATURA_TRABAJO_PS = isset($_POST["NOMENCLATURA_TRABAJO_PS"]) ? LimpiarCadena12($_POST["NOMENCLATURA_TRABAJO_PS"]) : "";
} else {
    $NOMENCLATURA_TRABAJO_PS = "0";
}

if (isset($_POST["chk28"]) == 'ok') {
    $CORREO_TRABAJO_PS = isset($_POST["CORREO_TRABAJO_PS"]) ? LimpiarCadena12($_POST["CORREO_TRABAJO_PS"]) : "";
} else {
    $CORREO_TRABAJO_PS = "0";
}

if (isset($_POST["chk29"]) == 'ok') {
    $TELEFONO_3_PS = isset($_POST["TELEFONO_3_PS"]) ? LimpiarCadena12($_POST["TELEFONO_3_PS"]) : "";
} else {
    $TELEFONO_3_PS = "0";
}

if (isset($_POST["chk30"]) == 'ok') {
    $TELEFONO_4_PS = isset($_POST["TELEFONO_4_PS"]) ? LimpiarCadena12($_POST["TELEFONO_4_PS"]) : "";
} else {
    $TELEFONO_4_PS = "0";
}

if (isset($_POST["chk31"]) == 'ok') {
    $REFERENCIA_PERSONAL_PS = isset($_POST["REFERENCIA_PERSONAL_PS"]) ? LimpiarCadena12($_POST["REFERENCIA_PERSONAL_PS"]) : "";
} else {
    $REFERENCIA_PERSONAL_PS = "0";
}

if (isset($_POST["chk32"]) == 'ok') {
    $PARENTESCO_REFERENCIA_PS = isset($_POST["PARENTESCO_REFERENCIA_PS"]) ? LimpiarCadena12($_POST["PARENTESCO_REFERENCIA_PS"]) : "";
} else {
    $PARENTESCO_REFERENCIA_PS = "0";
}

if (isset($_POST["chk33"]) == 'ok') {
    $TELEFONO_REFERENCIA_PS = isset($_POST["TELEFONO_REFERENCIA_PS"]) ? LimpiarCadena12($_POST["TELEFONO_REFERENCIA_PS"]) : "";
} else {
    $TELEFONO_REFERENCIA_PS = "0";
}

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
                "6" => $registrar->CODIGO_CAMPANIA,
                "7" => $registrar->NOMBRE_CAMPANIA,
                "8" => $registrar->NOMBRE_COOPERATIVA,
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

    case 'selectByIdGestionFinal':
        $respuesta = $camp->selectByIdGestionFinal($Id);
        echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;

    case 'save':
        $PORCENTAJE_ACTUALIZACION = intval($IDENTIFICACION_PS) + intval($NOMBRE_CLIENTE_PS) + intval($GENERO_PS) + intval($FECHA_INGRESO_PS) + intval($EDAD_PS) + intval($TIPO_PS) + intval($ESTADO_CUENTA_PS) + intval($PRIMER_NOMBRE_PS) + intval($SEGUNDO_NOMBRE_PS) + intval($PRIMER_APELLIDO_PS) + intval($SEGUNDO_APELLIDO_PS) + intval($FECHA_NACIMIENTO_PS) + intval($DIRECCION_PS) + intval($PAIS_DOMICILIO_PS) + intval($PROVINCIA_DOMICILIO_PS) + intval($CANTON_DOMICILIO_PS) + intval($PARROQUIA_DOMICILIO_PS) + intval($SECTOR_DOMICILIO_PS) + intval($AV_PRINCIPAL_DOMICILIO_PS) + intval($AV_SECUNDARIA_DOMICILIO_PS) + intval($REFERENCIA_DOMICILIO_PS) + intval($NOMENCLATURA_DOMICILIO_PS) + intval($CORREO_PERSONAL_PS) + intval($PAIS_TRABAJO_PS) + intval($PROVINCIA_TRABAJO_PS) + intval($CANTON_TRABAJO_PS) + intval($PARROQUIA_TRABAJO_PS) + intval($SECTOR_TRABAJO_PS) + intval($AV_PRINCIPAL_TRABAJO_PS) + intval($AV_SECUNDARIA_TRABAJO_PS) + intval($REFERENCIA_TRABAJO_PS) + intval($NOMENCLATURA_TRABAJO_PS) + intval($CORREO_TRABAJO_PS) + intval($REFERENCIA_PERSONAL_PS) + intval($PARENTESCO_REFERENCIA_PS) + intval($TELEFONO_REFERENCIA_PS) + intval($TELEFONO_1_PS) + intval($TELEFONO_2_PS) + intval($TELEFONO_3_PS) + intval($TELEFONO_4_PS);
        if ($IdCliente != "") {
            $saveById = ejecutarConsulta12("select contactid from verificaciondedatos.gestionfinal where contactid = '$IdCliente'");
            $valid = mysqli_fetch_array($saveById, MYSQLI_BOTH);
            $numRowC = $saveById->num_rows;
            if ($numRowC == 0) {
                if ($camp->insertGestionFinal($IdCliente, $contactAddress, $interactionId, $Agent, $level1, $level2, $level3, $mangementCode, $time, $Tmstmp, $intentos, $FechaAgendamiento, $TelefonoAd, $Observaciones, $IDENTIFICACION_VRF, $NOMBRE_CLIENTE_VRF, $GENERO_VRF, $FECHA_INGRESO_VRF, $EDAD_VRF, $TIPO_VRF, $ESTADO_CUENTA_VRF, $PRIMER_NOMBRE_VRF, $SEGUNDO_NOMBRE_VRF, $PRIMER_APELLIDO_VRF, $SEGUNDO_APELLIDO_VRF, $FECHA_NACIMIENTO_VRF, $DIRECCION_VRF, $PAIS_DOMICILIO_VRF, $PROVINCIA_DOMICILIO_VRF, $CANTON_DOMICILIO_VRF, $PARROQUIA_DOMICILIO_VRF, $SECTOR_DOMICILIO_VRF, $AV_PRINCIPAL_DOMICILIO_VRF, $AV_SECUNDARIA_DOMICILIO_VRF, $REFERENCIA_DOMICILIO_VRF, $NOMENCLATURA_DOMICILIO_VRF, $CORREO_PERSONAL_VRF, $PAIS_TRABAJO_VRF, $PROVINCIA_TRABAJO_VRF, $CANTON_TRABAJO_VRF, $PARROQUIA_TRABAJO_VRF, $SECTOR_TRABAJO_VRF, $AV_PRINCIPAL_TRABAJO_VRF, $AV_SECUNDARIA_TRABAJO_VRF, $REFERENCIA_TRABAJO_VRF, $NOMENCLATURA_TRABAJO_VRF, $CORREO_TRABAJO_VRF, $REFERENCIA_PERSONAL_VRF, $PARENTESCO_REFERENCIA_VRF, $TELEFONO_REFERENCIA_VRF, $TELEFONO_1_VRF, $TELEFONO_2_VRF, $TELEFONO_3_VRF, $TELEFONO_4_VRF, $IDENTIFICACION_PS, $NOMBRE_CLIENTE_PS, $GENERO_PS, $FECHA_INGRESO_PS, $EDAD_PS, $TIPO_PS, $ESTADO_CUENTA_PS, $PRIMER_NOMBRE_PS, $SEGUNDO_NOMBRE_PS, $PRIMER_APELLIDO_PS, $SEGUNDO_APELLIDO_PS, $FECHA_NACIMIENTO_PS, $DIRECCION_PS, $PAIS_DOMICILIO_PS, $PROVINCIA_DOMICILIO_PS, $CANTON_DOMICILIO_PS, $PARROQUIA_DOMICILIO_PS, $SECTOR_DOMICILIO_PS, $AV_PRINCIPAL_DOMICILIO_PS, $AV_SECUNDARIA_DOMICILIO_PS, $REFERENCIA_DOMICILIO_PS, $NOMENCLATURA_DOMICILIO_PS, $CORREO_PERSONAL_PS, $PAIS_TRABAJO_PS, $PROVINCIA_TRABAJO_PS, $CANTON_TRABAJO_PS, $PARROQUIA_TRABAJO_PS, $SECTOR_TRABAJO_PS, $AV_PRINCIPAL_TRABAJO_PS, $AV_SECUNDARIA_TRABAJO_PS, $REFERENCIA_TRABAJO_PS, $NOMENCLATURA_TRABAJO_PS, $CORREO_TRABAJO_PS, $REFERENCIA_PERSONAL_PS, $PARENTESCO_REFERENCIA_PS, $TELEFONO_REFERENCIA_PS, $TELEFONO_1_PS, $TELEFONO_2_PS, $TELEFONO_3_PS, $TELEFONO_4_PS, $PORCENTAJE_ACTUALIZACION)) {
                    $respuesta = $camp->updateClientes($IdCliente, $Agent, $level1, $level2, $level3, $mangementCode, $Tmstmp, $intentos, $contactAddress, $interactionId);
                    ejecutarConsulta("Update contactimportcontact set LastAgent = '$Agent', LastManagementResult = '$mangementCode', Number = '$intentos', Action = 'Gestionado' where id = '$IdCliente' ");
                    $camp->insertGestionHistorica($IdCliente);
                    echo "Registro almacenado con éxito";
                } else {
                    echo "Error: registro no se pudo almacenar";
                }
            } else {
                if ($camp->updateGestionFinal($IdCliente, $contactAddress, $interactionId, $Agent, $level1, $level2, $level3, $mangementCode, $time, $Tmstmp, $intentos, $FechaAgendamiento, $TelefonoAd, $Observaciones, $IDENTIFICACION_VRF, $NOMBRE_CLIENTE_VRF, $GENERO_VRF, $FECHA_INGRESO_VRF, $EDAD_VRF, $TIPO_VRF, $ESTADO_CUENTA_VRF, $PRIMER_NOMBRE_VRF, $SEGUNDO_NOMBRE_VRF, $PRIMER_APELLIDO_VRF, $SEGUNDO_APELLIDO_VRF, $FECHA_NACIMIENTO_VRF, $DIRECCION_VRF, $PAIS_DOMICILIO_VRF, $PROVINCIA_DOMICILIO_VRF, $CANTON_DOMICILIO_VRF, $PARROQUIA_DOMICILIO_VRF, $SECTOR_DOMICILIO_VRF, $AV_PRINCIPAL_DOMICILIO_VRF, $AV_SECUNDARIA_DOMICILIO_VRF, $REFERENCIA_DOMICILIO_VRF, $NOMENCLATURA_DOMICILIO_VRF, $CORREO_PERSONAL_VRF, $PAIS_TRABAJO_VRF, $PROVINCIA_TRABAJO_VRF, $CANTON_TRABAJO_VRF, $PARROQUIA_TRABAJO_VRF, $SECTOR_TRABAJO_VRF, $AV_PRINCIPAL_TRABAJO_VRF, $AV_SECUNDARIA_TRABAJO_VRF, $REFERENCIA_TRABAJO_VRF, $NOMENCLATURA_TRABAJO_VRF, $CORREO_TRABAJO_VRF, $REFERENCIA_PERSONAL_VRF, $PARENTESCO_REFERENCIA_VRF, $TELEFONO_REFERENCIA_VRF, $TELEFONO_1_VRF, $TELEFONO_2_VRF, $TELEFONO_3_VRF, $TELEFONO_4_VRF, $IDENTIFICACION_PS, $NOMBRE_CLIENTE_PS, $GENERO_PS, $FECHA_INGRESO_PS, $EDAD_PS, $TIPO_PS, $ESTADO_CUENTA_PS, $PRIMER_NOMBRE_PS, $SEGUNDO_NOMBRE_PS, $PRIMER_APELLIDO_PS, $SEGUNDO_APELLIDO_PS, $FECHA_NACIMIENTO_PS, $DIRECCION_PS, $PAIS_DOMICILIO_PS, $PROVINCIA_DOMICILIO_PS, $CANTON_DOMICILIO_PS, $PARROQUIA_DOMICILIO_PS, $SECTOR_DOMICILIO_PS, $AV_PRINCIPAL_DOMICILIO_PS, $AV_SECUNDARIA_DOMICILIO_PS, $REFERENCIA_DOMICILIO_PS, $NOMENCLATURA_DOMICILIO_PS, $CORREO_PERSONAL_PS, $PAIS_TRABAJO_PS, $PROVINCIA_TRABAJO_PS, $CANTON_TRABAJO_PS, $PARROQUIA_TRABAJO_PS, $SECTOR_TRABAJO_PS, $AV_PRINCIPAL_TRABAJO_PS, $AV_SECUNDARIA_TRABAJO_PS, $REFERENCIA_TRABAJO_PS, $NOMENCLATURA_TRABAJO_PS, $CORREO_TRABAJO_PS, $REFERENCIA_PERSONAL_PS, $PARENTESCO_REFERENCIA_PS, $TELEFONO_REFERENCIA_PS, $TELEFONO_1_PS, $TELEFONO_2_PS, $TELEFONO_3_PS, $TELEFONO_4_PS, $PORCENTAJE_ACTUALIZACION)) {
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
}
?>