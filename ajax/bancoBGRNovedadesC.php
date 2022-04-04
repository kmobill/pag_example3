<?php

session_start();

require '../models/bancoBGRNovedadesM.php';
$bancoBGRNovedades = new bancoBGRNovedadesM();
date_default_timezone_set("America/Lima");

$Id = isset($_POST["Id"]) ? LimpiarCadena14($_POST["Id"]) : ""; //Dato estraido de la funcion mostrar_uno js

$Agent = $_SESSION['usu'];
$Tmstmp = date('Y-m-d H:i:s');
$IdCliente = isset($_POST["IDC"]) ? LimpiarCadena14($_POST["IDC"]) : "";
$txtIdentificacion = isset($_POST["txtIdentificacion"]) ? LimpiarCadena14($_POST["txtIdentificacion"]) : "";
$txtAgencia = isset($_POST["txtAgencia"]) ? LimpiarCadena14($_POST["txtAgencia"]) : "";
$txtCampania = isset($_POST["txtCampania"]) ? LimpiarCadena14($_POST["txtCampania"]) : "";
$txtSeccion = isset($_POST["txtSeccion"]) ? LimpiarCadena2($_POST["txtSeccion"]) : "";
$txtSegmento = isset($_POST["txtSegmento"]) ? LimpiarCadena14($_POST["txtSegmento"]) : "";
$txtFechaAtencion = isset($_POST["txtFechaAtencion"]) ? LimpiarCadena14($_POST["txtFechaAtencion"]) : "";
$txtTelefonoContacto = isset($_POST["txtTelefonoContacto"]) ? LimpiarCadena14($_POST["txtTelefonoContacto"]) : "";
$txtObservaciones =  isset($_POST["txtObservaciones"]) ? LimpiarCadena14($_POST["txtObservaciones"]) : "";
$search = array("á","é","í","ó","ú","ñ","Á","É","Í","Ó","Ú","Ñ");
$replace = array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;","&Aacute;","&Eacute;","&Iacute;","&Oacute;","&Uacute;","&Ntilde;");
$txtObs = str_replace($search,$replace,$txtObservaciones); // se utilizaron los array para reemplazar el texto al momento de mostrar en el correo
        
switch ($_GET["action"]) {
    case 'fechaInicio':
        date_default_timezone_set("America/Lima");
        echo(date('Y-m-d H:i:s'));
        break;
    
    case 'idCliente':
        $result = ejecutarConsultaSimple11("SELECT ID FROM NOVEDADES ORDER BY ID DESC LIMIT 1 ");
        if ($result["ID"] == '') {
            echo "0";
        } else {
            echo$result["ID"];
        }
        break;

    case 'selectAll':
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";
        $respuesta = $bancoBGRNovedades->selectAll($txtFechaInicio, $txtFechaFin, $Agent); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->ID, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => $registrar->Agencia,
                "2" => $registrar->Agente,
                "3" => $registrar->Fecha,
                "4" => $registrar->EstadoLlamada,
                "5" => $registrar->Identificacion,
                "6" => $registrar->NombreCliente,
                "7" => $registrar->CiudadCliente,
                "8" => $registrar->EstadoCliente,
                "9" => $registrar->MotivoLlamada,
                "10" => $registrar->SubmotivoLlamada,
                '<center><li title="Editar" class="fa fa-edit" style="color: purple;" onclick="mostrar_uno(' . $registrar->ID . ')"></i>&nbsp;&nbsp;&nbsp; '
                . '<li title="Eliminar" class="fa fa-trash" style="color: #3C8DBC;;" onclick="eliminar(' . $registrar->ID . ')"></i></center>'
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
        $respuesta = $bancoBGRNovedades->selectById($Id);
        echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;

    case 'save':
        $result = ejecutarConsultaSimple11("SELECT ID FROM NOVEDADES WHERE ID = '$IdCliente' ");
        if ($result["ID"] == '') {
            if ($bancoBGRNovedades->insert($Agent, $Tmstmp, $txtIdentificacion, $txtAgencia, $txtCampania, $txtSeccion, $txtSegmento, $txtFechaAtencion, $txtTelefonoContacto, $txtObservaciones)) {
                echo "Registro almacenado con éxito";
                ejecutarConsulta11("insert into novedadeshistorico select * from novedades where Id = '$IdCliente' ");
            } else {
                echo "Error: registro no se pudo almacenar";
            }
        } else {
            $respuesta = $bancoBGRNovedades->update($IdCliente, $Agent, $Tmstmp, $txtIdentificacion, $txtAgencia, $txtCampania, $txtSeccion, $txtSegmento, $txtFechaAtencion, $txtTelefonoContacto, $txtObservaciones);
            if ($respuesta) {
                ejecutarConsulta11("insert into novedadeshistorico select * from novedades where Id = '$IdCliente'");
                echo "Registro actualizado con éxito";
            } else {
                echo "Error: registro no se pudo actualizar";
            }
        }
        break;
    
    case 'envioMail':
        $correos = ejecutarConsulta11("SELECT Mail FROM Mails");
        $json = [];
        while ($row = $correos->fetch_assoc()) {
            $json[] = $row['Mail'];
        }
        $principalMail = $json[0];
        $copiaMail = $json[1];
        $CC1 = "calidadcck@kimobill.com";
        $CC2 = "quality_analyst@kimobill.com";
        $CC3 = "operations_manager@kimobill.com";
        $CC4 = "innovation_leader@kimobill.com";
        $envioMail = $bancoBGRNovedades->envioCorreos($IdCliente, $Agent, $Tmstmp, $txtIdentificacion, $txtAgencia, $txtCampania, $txtSeccion, $txtSegmento, $txtFechaAtencion, $txtTelefonoContacto, $txtObs, $principalMail, $copiaMail, $CC1, $CC2, $CC3, $CC4);
        echo($envioMail);
        break;
}
?>