<?php

session_start();

require '../models/bpCargosM.php';
$camp = new cargosRecurrentesM();
date_default_timezone_set("America/Lima");

$Id = isset($_POST["Id"]) ? LimpiarCadena3($_POST["Id"]) : ""; //Dato estraido de la funcion mostrar_uno js

$IdCliente = isset($_POST["IDC"]) ? LimpiarCadena3($_POST["IDC"]) : "";
$Num = isset($_POST["fonos"]) ? LimpiarCadena3($_POST["fonos"]) : "";
$Agent = $_SESSION['usu'];
$Estado = isset($_POST["estatusTel"]) ? LimpiarCadena3($_POST["estatusTel"]) : "";
$Tmstmp = date('Y-m-d H:i:s');
$time = isset($_POST["horaInicio"]) ? LimpiarCadena3($_POST["horaInicio"]) : "";
$intentos = isset($_POST["intentos"]) ? LimpiarCadena3($_POST["intentos"]) : "";
$level1 = isset($_POST["level1"]) ? LimpiarCadena3($_POST["level1"]) : "";
$level2 = isset($_POST["level2"]) ? LimpiarCadena3($_POST["level2"]) : "";
$level3 = isset($_POST["level3"]) ? LimpiarCadena3($_POST["level3"]) : "";
$campaign = isset($_POST["CAMPANIA"]) ? LimpiarCadena3($_POST["CAMPANIA"]) : "";
$mangementCode = isset($_POST["code"]) ? LimpiarCadena12($_POST["code"]) : "";
$queryT = ejecutarConsulta("SELECT NumeroMarcado FROM contactimportphone WHERE ContactId = '$IdCliente' order by FechaHoraFin desc limit 1");
$rowT = mysqli_fetch_array($queryT, MYSQLI_BOTH);
$contactAddress = $rowT["NumeroMarcado"];
if ($level1 == 'DB' && $level2 = 'DADO DE BAJA POR NO VENTA'){
    $interactionId = isset($_POST["interactionIdOld"]) ? LimpiarCadena5($_POST["interactionIdOld"]) : "";
} else {
    $interactionId = isset($_POST["interactionId"]) ? LimpiarCadena5($_POST["interactionId"]) : "";
}
$contactname = isset($_POST["NOMBRE_CLIENTE"]) ? LimpiarCadena10($_POST["NOMBRE_CLIENTE"]) : "";
$FechaAgendamiento = isset($_POST["agenda"]) ? LimpiarCadena3($_POST["agenda"]) : "";
$TelefonoAd = isset($_POST["fonoAd"]) ? LimpiarCadena3($_POST["fonoAd"]) : "";
$Observaciones = isset($_POST["obs"]) ? LimpiarCadena3($_POST["obs"]) : "";

$telefonia = isset($_POST["telefonia"]) ? LimpiarCadena3($_POST["telefonia"]) : "";
$txtExcluirTelefonia = isset($_POST["txtExcluirTelefonia"]) ? LimpiarCadena3($_POST["txtExcluirTelefonia"]) : "";
$Internet = isset($_POST["Internet"]) ? LimpiarCadena3($_POST["Internet"]) : "";
$txtExcluirInternet = isset($_POST["txtExcluirInternet"]) ? LimpiarCadena3($_POST["txtExcluirInternet"]) : "";
$Television = isset($_POST["Television"]) ? LimpiarCadena3($_POST["Television"]) : "";
$txtExcluirTelevision = isset($_POST["txtExcluirTelevision"]) ? LimpiarCadena3($_POST["txtExcluirTelevision"]) : "";
$Movil = isset($_POST["Movil"]) ? LimpiarCadena3($_POST["Movil"]) : "";
$txtExcluirMovil = isset($_POST["txtExcluirMovil"]) ? LimpiarCadena3($_POST["txtExcluirMovil"]) : "";
$Triple = isset($_POST["Triple"]) ? LimpiarCadena3($_POST["Triple"]) : "";
$txtExcluirTriple = isset($_POST["txtExcluirTriple"]) ? LimpiarCadena3($_POST["txtExcluirTriple"]) : "";

$producto = isset($_POST["producto"]) ? LimpiarCadena3($_POST["producto"]) : "";
$listadoProd = isset($_POST["listadoProd"]) ? LimpiarCadena3($_POST["listadoProd"]) : "";
$otroProd = isset($_POST["otroProd"]) ? LimpiarCadena3($_POST["otroProd"]) : "";

switch ($_GET["action"]) {
    case 'selectAll':
        $respuesta = $camp->selectAll(); /* llama a la funci??n del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->ID, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => $registrar->CampaignId,
                "2" => $registrar->ImportId,
                "3" => $registrar->Agent,
                "4" => $registrar->CODIGO_CAMPANIA,
                "5" => $registrar->NOMBRE_CAMPANIA,
                "6" => $registrar->IDENTIFICACION,
                "7" => $registrar->NOMBRE_CLIENTE,
                "8" => $registrar->ResultLevel2,
                "9" => '<a href="#" style="color: #3C8DBC;" onclick="mostrar_uno(\'' . $registrar->ID . '\')">Gestionar</a>',
            );
        }
        $resultados = array(
            "sEcho" => 1, /* informacion para la herramienta datatables */
            "iTotalRecords" => count($datos), /* env??a el total de columnas a visualizar */
            "iTotalDisplayRecords" => count($datos), /* envia el total de filas a visualizar */
            "aaData" => $datos /* env??a el arreglo completo que se llen?? con el while */
        );
        echo json_encode($resultados);
        break;

    case 'selectAllRec':
        $respuesta = $camp->selectAllRec(); /* llama a la funci??n del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            if ($registrar->managementresultcode == 34) {
                $datos[] = array(/* llena los resultados con los datos */
                    "0" => '<p style="color: red">' . $registrar->ID . '</p>', /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                    "1" => '<p style="color: red">' . $registrar->CampaignId . '</p>',
                    "2" => '<p style="color: red">' . $registrar->ImportId . '</p>',
                    "3" => '<p style="color: red">' . $registrar->Agent . '</p>',
                    "4" => '<p style="color: red">' . $registrar->CODIGO_CAMPANIA . '</p>',
                    "5" => '<p style="color: red">' . $registrar->NOMBRE_CAMPANIA . '</p>',
                    "6" => '<p style="color: red">' . $registrar->IDENTIFICACION . '</p>',
                    "7" => '<p style="color: red">' . $registrar->NOMBRE_CLIENTE . '</p>',
                    "8" => '<p style="color: red">' . $registrar->ResultLevel2 . '</p>',
                    "9" => '<a href="#" style="color: #3C8DBC;" onclick="mostrar_uno(\'' . $registrar->ID . '\')">Gestionar</a>',
                );
            } else {
                $datos[] = array(/* llena los resultados con los datos */
                    "0" => $registrar->ID, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                    "1" => $registrar->CampaignId,
                    "2" => $registrar->ImportId,
                    "3" => $registrar->Agent,
                    "4" => $registrar->CODIGO_CAMPANIA,
                    "5" => $registrar->NOMBRE_CAMPANIA,
                    "6" => $registrar->IDENTIFICACION,
                    "7" => $registrar->NOMBRE_CLIENTE,
                    "8" => $registrar->ResultLevel2,
                    "9" => '<a href="#" style="color: #3C8DBC;" onclick="mostrar_uno(\'' . $registrar->ID . '\')">Gestionar</a>',
                );
            }
        }

        $resultados = array(
            "sEcho" => 1, /* informacion para la herramienta datatables */
            "iTotalRecords" => count($datos), /* env??a el total de columnas a visualizar */
            "iTotalDisplayRecords" => count($datos), /* envia el total de filas a visualizar */
            "aaData" => $datos /* env??a el arreglo completo que se llen?? con el while */
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

    case 'estatus':
        $idcamp = $_GET['camp'];
        $result = ejecutarConsulta("SELECT distinct(level1) 'level1' "
                . "FROM campaignresultmanagement where campaignid = '$idcamp' ORDER BY Level1");
        echo '<option></option>';
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            echo"ingresa";
            echo '<option value="' . $row["level1"] . '">' . $row["level1"] . '</option>';
        }
        break;

    case 'level2':
        $level1 = $_GET['level1'];
        $idcamp = $_GET['camp'];
        $result = ejecutarConsulta("SELECT distinct(level2) 'level2' "
                . "FROM campaignresultmanagement where level1 = '$level1' "
                . "and campaignid = '$idcamp' ORDER BY Code");
        echo '<option></option>';
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            echo '<option value="' . $row["level2"] . '">' . $row["level2"] . '</option>';
        }
        break;

    case 'telefonos':
        $idC = $_GET['idC'];
        $phonesById = ejecutarConsulta2("select contactid from gestionfinal where contactid = '$idC'");
        $valid = mysqli_fetch_array($phonesById, MYSQLI_BOTH);
        if ($valid["contactid"] == "") {
            $result = ejecutarConsulta("SELECT NumeroMarcado "
                    . "FROM contactimportphone where contactid = '$idC'");
            echo '<option></option>';
            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                echo '<option value="' . $row["NumeroMarcado"] . '">' . $row["NumeroMarcado"] . '</option>';
            }
        } else {
            $result1 = ejecutarConsulta("SELECT NumeroMarcado "
                    . "FROM contactimportphone where contactid = '$idC'");
            echo '<option></option>';
            while ($row = mysqli_fetch_array($result1, MYSQLI_BOTH)) {
                echo '<option value="' . $row["NumeroMarcado"] . '">' . $row["NumeroMarcado"] . '</option>';
            }
        }
        break;

    case 'updatePhones':
        $IdC = isset($_POST["IDC"]) ? LimpiarCadena3($_POST["IDC"]) : "";
        $respuesta = $camp->updateTelf($IdC, $Num, $Agent, $Estado, $Tmstmp);
        echo $respuesta ? "Tel??fono gestionado con ??xito" : "Error: no se pudo almacenar la informaci??n!";
        break;

    case 'validePhone';
        $IdClient = $_GET["IdClient"];
        $estadoTelf = ejecutarConsulta("SELECT distinct(estado)'estado' FROM `contactimportphone` WHERE contactid = '$IdClient'");
        $data = mysqli_fetch_array($estadoTelf, MYSQLI_BOTH);
        $numRow = $estadoTelf->num_rows;
        if ($numRow == "1" && $data["estado"] == "SG") {
            echo "Almacene un n??mero de tel??fono para continuar!";
        } else {
            echo "Si hay telefonos";
        }
        break;

    case 'code':
        $c = $_GET["camp"];
        $level1 = $_GET["level1"];
        $level2 = $_GET["level2"];
        $findCode = ejecutarConsulta("SELECT Code FROM campaignresultmanagement where "
                . "CampaignId = '$c' and Level1 = '$level1' and Level2 = '$level2'");
        $row = mysqli_fetch_array($findCode, MYSQLI_BOTH);
        $Code = $row["Code"];
        echo($Code);
        break;

    case 'save':
        if ($IdCliente != "") {
            $saveById = ejecutarConsulta4("select contactid from gestionfinal where contactid = '$IdCliente'");
            $valid = mysqli_fetch_array($saveById, MYSQLI_BOTH);
            $numRowC = $saveById->num_rows;
            if ($numRowC == 0) {
                $camp->insertGestionFinal($IdCliente, $Agent, $level1, $level2, $mangementCode, $Tmstmp, $time, $intentos, $contactAddress, $interactionId, $FechaAgendamiento, $TelefonoAd, $Observaciones, $telefonia, $txtExcluirTelefonia, $Internet, $txtExcluirInternet, $Television, $txtExcluirTelevision, $Movil, $txtExcluirMovil, $Triple, $txtExcluirTriple);
                $validarId = ejecutarConsultaSimple4("select contactid from gestionfinal where contactid = '$IdCliente'");
                if ($validarId["contactid"] != "") {
                    $respuesta = $camp->updateClientes($IdCliente, $Agent, $level1, $level2, $level3, $mangementCode, $Tmstmp, $intentos, $contactAddress, $interactionId);
                    ejecutarConsulta("Update contactimportcontact set LastAgent = '$Agent', LastManagementResult = '$mangementCode', Number = '$intentos', Action = 'Gestionado' where id = '$IdCliente' ");
                    $camp->insertGestionHistorica($IdCliente);
                    echo "Registro almacenado con ??xito";
                } else {
                    echo "Error: registro no se pudo almacenar";
                }
            } else {
                $camp->updateGestionFinal($IdCliente, $Agent, $level1, $level2, $mangementCode, $Tmstmp, $time, $intentos, $contactAddress, $interactionId, $FechaAgendamiento, $TelefonoAd, $Observaciones, $telefonia, $txtExcluirTelefonia, $Internet, $txtExcluirInternet, $Television, $txtExcluirTelevision, $Movil, $txtExcluirMovil, $Triple, $txtExcluirTriple);
                $validarId = ejecutarConsultaSimple4("select contactid from gestionfinal where contactid = '$IdCliente'");
                if ($validarId["contactid"] != "") {
                    $respuesta = $camp->updateClientes($IdCliente, $Agent, $level1, $level2, $level3, $mangementCode, $Tmstmp, $intentos, $contactAddress, $interactionId);
                    ejecutarConsulta("Update contactimportcontact set LastAgent = '$Agent', LastManagementResult = '$mangementCode', Number = '$intentos', Action = 'Gestionado' where id = '$IdCliente' ");
                    $camp->insertGestionHistorica($IdCliente);
                    echo "Registro actualizado con ??xito";
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