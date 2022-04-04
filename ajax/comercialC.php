<?php

session_start();

require '../models/comercialM.php';
$TRX = new TRX();
date_default_timezone_set("America/Lima");

$Id = isset($_POST["Id"]) ? LimpiarCadena14($_POST["Id"]) : ""; //Dato estraido de la funcion mostrar_uno js

$Agent = $_SESSION['usu'];
$Tmstmp = date('Y-m-d H:i:s');
$time = isset($_POST["horaInicio"]) ? LimpiarCadena14($_POST["horaInicio"]) : "";
$IdCliente = isset($_POST["IDC"]) ? LimpiarCadena14($_POST["IDC"]) : "";
$txtEntidad = isset($_POST["txtEntidad"]) ? LimpiarCadena14($_POST["txtEntidad"]) : "";
$txtTipoEntidad = isset($_POST["txtTipoEntidad"]) ? LimpiarCadena14($_POST["txtTipoEntidad"]) : "";
$txtSegmento = isset($_POST["txtSegmento"]) ? LimpiarCadena14($_POST["txtSegmento"]) : "";
$txtMotivoLlamada = isset($_POST["txtMotivoLlamada"]) ? LimpiarCadena2($_POST["txtMotivoLlamada"]) : "";
$txtSubmotivoLlamada = isset($_POST["txtSubmotivoLlamada"]) ? LimpiarCadena14($_POST["txtSubmotivoLlamada"]) : "";
$txtTelefonoContacto = isset($_POST["txtTelefonoContacto"]) ? LimpiarCadena14($_POST["txtTelefonoContacto"]) : "";
$txtObservaciones = isset($_POST["txtObservaciones"]) ? LimpiarCadena14($_POST["txtObservaciones"]) : "";
$txtPersonaContacto = isset($_POST["txtPersonaContacto"]) ? LimpiarCadena14($_POST["txtPersonaContacto"]) : "";
$txtCiudad = isset($_POST["txtCiudad"]) ? LimpiarCadena14($_POST["txtCiudad"]) : "";
$txtDireccion = isset($_POST["txtDireccion"]) ? LimpiarCadena14($_POST["txtDireccion"]) : "";
$txtCelular1 = isset($_POST["txtCelular1"]) ? LimpiarCadena14($_POST["txtCelular1"]) : "";
$txtCelular2 = isset($_POST["txtCelular2"]) ? LimpiarCadena14($_POST["txtCelular2"]) : "";
$txtConvencional1 = isset($_POST["txtConvencional1"]) ? LimpiarCadena14($_POST["txtConvencional1"]) : "";
$txtConvencional2 = isset($_POST["txtConvencional2"]) ? LimpiarCadena14($_POST["txtConvencional2"]) : "";
$txtCorreo = isset($_POST["txtCorreo"]) ? LimpiarCadena14($_POST["txtCorreo"]) : "";
$txtCantidadActivos = isset($_POST["txtCantidadActivos"]) ? LimpiarCadena14($_POST["txtCantidadActivos"]) : "";
$txtCantidadTC = isset($_POST["txtCantidadTC"]) ? LimpiarCadena14($_POST["txtCantidadTC"]) : "";

switch ($_GET["action"]) {
    case 'fechaInicio':
        date_default_timezone_set("America/Lima");
        echo(date('Y-m-d H:i:s'));
        break;

    case 'idCliente':
        $result = ejecutarConsultaSimple14("SELECT ID FROM COMERCIAL.TRX ORDER BY ID DESC LIMIT 1 ");
        if ($result["ID"] == '') {
            echo "0";
        } else {
            echo$result["ID"];
        }
        break;

    case 'selectAll':
        $txtCoop = isset($_POST["txtCoop"]) ? LimpiarCadena($_POST["txtCoop"]) : "";
        $txtFechaInicio = isset($_POST["txtFechaInicio"]) ? LimpiarCadena($_POST["txtFechaInicio"]) : "";
        $txtFechaFin = isset($_POST["txtFechaFin"]) ? LimpiarCadena($_POST["txtFechaFin"]) : "";
        $respuesta = $TRX->selectAll($txtFechaInicio, $txtFechaFin, $txtCoop, $Agent); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->ID, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => $registrar->AGENT,
                "2" => $registrar->NombreEntidad,
                "3" => $registrar->TipoEntidad,
                "4" => $registrar->PersonaContacto,
                "5" => $registrar->MotivoLlamada,
                "6" => $registrar->SubmotivoLlamada,
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
        $respuesta = $TRX->selectById($Id);
        echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;

    case 'estatus':
        $estatus = $_GET["motivo"];
        $result = ejecutarConsulta14("SELECT DISTINCT SUBMOTIVO FROM comercial.resultadosdegestion where estado='1' AND MOTIVO = '$estatus' "
                . "ORDER BY SUBMOTIVO");
        echo '<option></option>';
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            echo '<option value="' . $row["SUBMOTIVO"] . '">' . $row["SUBMOTIVO"] . '</option>';
        }
        break;

    case 'delete':
        $respuesta = $TRX->delete($Id);
        if ($respuesta) {
            ejecutarConsulta14("insert into registrohistorico select Id, Agent, $Tmstmp, $Tmstmp, Segmento, ContactAddress, MotivoLlamada, SubmotivoLlamada, 'REGISTRO ELIMINADO', NombreEntidad, TipoEntidad, PersonaContacto, CiudadEntidad, DirecciónEntidad, CorreoEntidad, Celular1, Celular2, Convencional1, Convencional2, CantidadClientesActivos, CantidadTC "
                    . "from comercial.registro where Id = '$Id'");
            echo "Registro eliminado con éxito";
        } else {
            echo "Error: registro no se pudo eliminar";
        }
        break;

    case 'save':
        if ($IdCliente == '') {
            $respuesta = $TRX->insert($Agent, $time, $Tmstmp, $txtEntidad, $txtTipoEntidad, $txtSegmento, $txtMotivoLlamada, $txtSubmotivoLlamada, $txtTelefonoContacto, $txtObservaciones, $txtPersonaContacto, $txtCiudad, $txtDireccion, $txtCelular1, $txtCelular2, $txtConvencional1, $txtConvencional2, $txtCorreo, $txtCantidadActivos, $txtCantidadTC);
            if ($respuesta) {
                echo "Registro almacenado con éxito";
            } else {
                echo "Error: registro no se pudo almacenar";
            }
        } else {
            $respuesta = $TRX->update($IdCliente, $Agent, $time, $Tmstmp, $txtEntidad, $txtTipoEntidad, $txtSegmento, $txtMotivoLlamada, $txtSubmotivoLlamada, $txtTelefonoContacto, $txtObservaciones, $txtPersonaContacto, $txtCiudad, $txtDireccion, $txtCelular1, $txtCelular2, $txtConvencional1, $txtConvencional2, $txtCorreo, $txtCantidadActivos, $txtCantidadTC);
            if ($respuesta) {
                echo "Registro actualizado con éxito";
            } else {
                echo "Error: registro no se pudo actualizar";
            }
        }
        break;
}
?>