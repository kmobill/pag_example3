<?php

session_start();

require '../models/funcionesGeneralesM.php';
$funciones = new funciones();
date_default_timezone_set("America/Lima");
$date = date('Y-m-d H:i:s');

switch ($_GET["action"]) {
    case 'horaInicio':
        echo(date('Y-m-d H:i:s'));
        break;

    case 'interactionIdOld':
        $IdC = $_GET['idC'];
        $interactionId = ejecutarConsulta("SELECT interactionid FROM contactimportphone WHERE ContactId = '$IdC' order by FechaHoraFin desc limit 1");
        $data = mysqli_fetch_array($interactionId, MYSQLI_BOTH);
        echo ($data["interactionid"]);
        break;

    case 'validarEstatus':
        $IdC = $_GET['idC'];
        $campania = $_GET['campania'];
        ejecutarConsulta("CREATE TEMPORARY TABLE bancopichinchacargosrec.TMP AS (
                        SELECT ResultLevel1 FROM bancopichinchacancelaciones.gestionfinal
                        where ContactID = '$IdC' AND CAMPAIGNID = '$campania');");
        ejecutarConsulta("INSERT INTO bancopichinchacargosrec.TMP
                        SELECT ResultLevel1 FROM bancopichinchacargosrec.gestionfinal
                        where ContactID = '$IdC' AND CAMPAIGNID = '$campania';");
        ejecutarConsulta("INSERT INTO bancopichinchacargosrec.TMP
                        SELECT ResultLevel1 FROM bancopichinchaencuesta.gestionfinal
                        where ContactID = '$IdC' AND CAMPAIGNID = '$campania';");
        ejecutarConsulta("INSERT INTO bancopichinchacargosrec.TMP
                        SELECT ResultLevel1 FROM bancopichinchaincrementos.gestionfinal
                        where ContactID = '$IdC' AND CAMPAIGNID = '$campania';");
        ejecutarConsulta("INSERT INTO bancopichinchacargosrec.TMP
                        SELECT ResultLevel1 FROM bancopichinchamo.gestionfinal
                        where ContactID = '$IdC' AND CAMPAIGNID = '$campania';");
        ejecutarConsulta("INSERT INTO bancopichinchacargosrec.TMP
                        SELECT ResultLevel1 FROM bancopichinchapasivos.gestionfinal
                        where ContactID = '$IdC' AND CAMPAIGNID = '$campania';");
        ejecutarConsulta("INSERT INTO bancopichinchacargosrec.TMP
                        SELECT ResultLevel1 FROM bancopichinchavariaciones.gestionfinal
                        where ContactID = '$IdC' AND CAMPAIGNID = '$campania';");

        $ResultLevel = ejecutarConsulta("SELECT resultlevel1 FROM bancopichinchacargosrec.TMP");
        $result = mysqli_fetch_array($ResultLevel, MYSQLI_BOTH);
        echo ($result["resultlevel1"]);
        break;

    case 'interactionId':
        //hora sin puntos
        $hour = date("H:i:s");
        $hour_imp = str_replace(":", "", $hour);
        //fecha sin guiones
        $date_imp = str_replace("-", "", date('Y-m-d'));

        $txt1 = ejecutarConsulta("SELECT concat('-',substr(RAND()*10000000000,1,8),'-') AS ID;");
        $txt2 = ejecutarConsulta("SELECT substr(RAND()*10000000000,1,8) AS ID;");
        $data1 = mysqli_fetch_array($txt1, MYSQLI_BOTH);
        $data2 = mysqli_fetch_array($txt2, MYSQLI_BOTH);
        $ahora = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''));
        $formateado = $ahora->format("su");
        echo $hour_imp . $formateado . $data1["ID"] . $date_imp;
        break;

    case 'desencriptar':
        $texto = isset($_POST["pass"]) ? LimpiarCadena1($_POST["pass"]) : "";
        $respuesta = $funciones->desencriptar($texto);
        echo $respuesta;
        break;

    case 'updatePhones':
        $IdC = isset($_POST["IDC"]) ? LimpiarCadena($_POST["IDC"]) : "";
        $Num = isset($_POST["fonos"]) ? LimpiarCadena($_POST["fonos"]) : "";
        $Agent = $_SESSION['usu'];
        $Estado = isset($_POST["estatusTel"]) ? LimpiarCadena($_POST["estatusTel"]) : "";
        $fechaInicio = isset($_POST["horaInicioLlamada"]) ? LimpiarCadena($_POST["horaInicioLlamada"]) : "";
        $InteractionId = isset($_POST["interactionId"]) ? LimpiarCadena($_POST["interactionId"]) : "";
        $Tmstmp = date('Y-m-d H:i:s');
        $respuesta = $funciones->updateTelf($IdC, $Num, $Agent, $Estado, $fechaInicio, $Tmstmp, $InteractionId);
        echo $respuesta ? "Teléfono gestionado con éxito" : "Error: no se pudo almacenar la información!";
        break;

    case 'estatus':
        $idcamp = $_GET['camp'];
        $result = ejecutarConsulta("SELECT distinct(level1) 'level1' "
                . "FROM campaignresultmanagement where campaignid = '$idcamp' ORDER BY Level1");
        echo '<option></option>';
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            echo '<option value="' . $row["level1"] . '">' . $row["level1"] . '</option>';
        }
        break;

    case 'level2':
        $level1 = $_GET['level1'];
        $idcamp = $_GET['camp'];
        $result = ejecutarConsulta("SELECT distinct(level2) 'level2' "
                . "FROM campaignresultmanagement where level1 = '$level1' "
                . "and campaignid = '$idcamp' ORDER BY level2");
        echo '<option></option>';
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            echo '<option value="' . $row["level2"] . '">' . $row["level2"] . '</option>';
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

    case 'telefonos':
        $idC = $_GET['idC'];
        $phonesById = ejecutarConsulta2("select contactid from gestionfinal where contactid = '$idC'");
        $valid = mysqli_fetch_array($phonesById, MYSQLI_BOTH);
        if ($valid["contactid"] == "") {
            $result = ejecutarConsulta("SELECT NumeroMarcado FROM contactimportphone where contactid = '$idC' ORDER BY DESCRIPCIONTELEFONO ");
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

    case 'ultimoEstadoTelefono':
        $idC = $_GET['idC'];
        $telefono = $_GET['telefono'];
        $estado = ejecutarConsultaSimple("select Estado from cck.contactimportphone where contactid = '$idC' and numeromarcado = '$telefono' ");
        echo $estado["Estado"];
        break;

    case 'estadoTelefonos':
        $result = ejecutarConsulta("SELECT Descripcion FROM cck.statephones order by Id");
        echo '<option></option>';
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            echo '<option value="' . $row["Descripcion"] . '">' . $row["Descripcion"] . '</option>';
        }
        break;
        
    case 'otroAsesor':
        $result = ejecutarConsulta("SELECT Id FROM user where usergroup >='3' and state='1' ORDER BY name1, surname1");
        echo '<option></option>';
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            $respuesta = $funciones->desencriptar($row["Id"]);
            echo '<option value="' . $respuesta . '">' . $respuesta . '</option>';
        }        
        break;
}
?>

