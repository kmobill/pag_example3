<?php

session_start();

require '../models/campaniasRedesSocialesM.php';
$TRX = new TRXRedes();
date_default_timezone_set("America/Lima");

$Id = isset($_POST["Id"]) ? LimpiarCadena14($_POST["Id"]) : ""; //Dato estraido de la funcion mostrar_uno js

$Agent = $_SESSION['usu'];
$StartedManagement = isset($_POST["fechaInicio"]) ? LimpiarCadena14($_POST["fechaInicio"]) : "";
$Tmstmp = date('Y-m-d H:i:s');
$IdCliente = isset($_POST["IDC"]) ? LimpiarCadena14($_POST["IDC"]) : "";

$txtCooperativa = isset($_POST["txtCooperativa"]) ? LimpiarCadena14($_POST["txtCooperativa"]) : "";
$txtTipoRedSocial = isset($_POST["txtTipoRedSocial"]) ? LimpiarCadena14($_POST["txtTipoRedSocial"]) : "";
$txtTipoCliente = isset($_POST["txtTipoCliente"]) ? LimpiarCadena14($_POST["txtTipoCliente"]) : "";
$txtFechaGestion = isset($_POST["txtFechaGestion"]) ? LimpiarCadena14($_POST["txtFechaGestion"]) : "";
$txtEstadoConversacion = isset($_POST["txtEstadoConversacion"]) ? LimpiarCadena2($_POST["txtEstadoConversacion"]) : "";
$txtCelular = isset($_POST["txtCelular"]) ? LimpiarCadena14($_POST["txtCelular"]) : "";
$txtNombreCliente = isset($_POST["txtNombreCliente"]) ? LimpiarCadena14($_POST["txtNombreCliente"]) : "";
$txtMensaje = isset($_POST["txtMensaje"]) ? LimpiarCadena14($_POST["txtMensaje"]) : "";
$txtMotivoMensaje = isset($_POST["txtMotivoMensaje"]) ? LimpiarCadena14($_POST["txtMotivoMensaje"]) : "";
$txtSubmotivoMensaje = isset($_POST["txtSubmotivoMensaje"]) ? LimpiarCadena14($_POST["txtSubmotivoMensaje"]) : "";
$txtObservaciones = isset($_POST["txtObservaciones"]) ? LimpiarCadena14($_POST["txtObservaciones"]) : "";
$txtEstadoCliente = isset($_POST["txtEstadoCliente"]) ? LimpiarCadena14($_POST["txtEstadoCliente"]) : "";
$txtCantidadMensajes = isset($_POST["txtCantidadMensajes"]) ? LimpiarCadena14($_POST["txtCantidadMensajes"]) : "";

$campoImagen = ejecutarConsultaSimple14("SELECT IMAGEN FROM TRXREDES WHERE ID = '$IdCliente'");
$ubicacionImagen = $campoImagen["IMAGEN"];

switch ($_GET["action"]) {
    case 'fechaInicio':
        date_default_timezone_set("America/Lima");
        echo(date('Y-m-d H:i:s'));
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
                "1" => $registrar->COOPERATIVA,
                "2" => $registrar->AGENT,
                "3" => $registrar->Fecha,
                "4" => $registrar->Celular,
                "5" => $registrar->Nombre,
                "6" => $registrar->EstadoConversacion,
                "7" => $registrar->MotivoMensaje,
                "8" => $registrar->SubmotivoMensaje,
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
        $result = ejecutarConsulta14("SELECT DISTINCT SUBMOTIVO FROM resultadosdegestion where estado='1' AND MOTIVO = '$estatus' "
                . "ORDER BY SUBMOTIVO");
        echo '<option></option>';
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            echo '<option value="' . $row["SUBMOTIVO"] . '">' . $row["SUBMOTIVO"] . '</option>';
        }
        break;

    case 'delete':
        $respuesta = $TRX->delete($Id);
        if ($respuesta) {
            ejecutarConsulta14("insert into trxhistorico select * from trx where Id = '$IdCliente'");
            echo "Registro eliminado con éxito";
        } else {
            echo "Error: registro no se pudo eliminar";
        }
        break;

    case 'rutaImg':
        $IdCl = isset($_POST["IDC"]) ? LimpiarCadena14($_POST["IDC"]) : "";
//        $dirImagen = ejecutarConsultaSimple14("SELECT IMAGEN FROM TRXREDES WHERE ID = '$IdCl'");
//        $dataImagen = $dirImagen["IMAGEN"];
        echo "SELECT IMAGEN FROM TRXREDES WHERE ID = '$IdCl'";
        break;

    case 'save':
        if ($IdCliente == '') {
            if ($txtTipoRedSocial == 'WhatsApp') {
                $fechaImagen = date('Y-m-d');
                $horaImagen = time();
                $carpeta = "../imagenesRedes/";
                $imgContenido = $Agent . "_" . $txtTipoRedSocial . "_" . $txtCelular . "_" . $fechaImagen . "_" . $horaImagen . ".jpeg";
                $ubicacion = $carpeta . $imgContenido;
                move_uploaded_file($_FILES['image']['tmp_name'], "$ubicacion");
                $respuesta = $TRX->insert($Agent, $StartedManagement, $Tmstmp, $txtFechaGestion, $txtCooperativa, $txtTipoRedSocial, $txtTipoCliente, $txtEstadoConversacion, $txtCelular, $txtNombreCliente, $txtMensaje, $ubicacion, $txtCantidadMensajes, $txtMotivoMensaje, $txtSubmotivoMensaje, $txtObservaciones, $txtEstadoCliente);
                if ($respuesta) {
                    echo "Registro almacenado con éxito";
                } else {
                    echo "Error: registro no se pudo almacenar";
                }
            } else {
                $fechaImagen = date('Y-m-d');
                $horaImagen = time();
                $carpeta = "../imagenesRedes/";
                $imgContenido = $Agent . "_" . $txtTipoRedSocial . "_" . $txtNombreCliente . "_" . $fechaImagen . "_" . $horaImagen . ".jpeg";
                $ubicacion = $carpeta . $imgContenido;
                move_uploaded_file($_FILES['image']['tmp_name'], "$ubicacion");
                $respuesta = $TRX->insert($Agent, $StartedManagement, $Tmstmp, $txtFechaGestion, $txtCooperativa, $txtTipoRedSocial, $txtTipoCliente, $txtEstadoConversacion, $txtCelular, $txtNombreCliente, $txtMensaje, $ubicacion, $txtCantidadMensajes, $txtMotivoMensaje, $txtSubmotivoMensaje, $txtObservaciones, $txtEstadoCliente);
                if ($respuesta) {
                    echo "Registro almacenado con éxito";
                } else {
                    echo "Error: registro no se pudo almacenar";
                }
            }
        } else {
            if ($txtTipoRedSocial == 'WhatsApp') {
                if ($_FILES['image']['tmp_name'] == '') {
                    $ubicacion = $ubicacionImagen;
                    $respuesta = $TRX->update($IdCliente, $Agent, $StartedManagement, $Tmstmp, $txtFechaGestion, $txtCooperativa, $txtTipoRedSocial, $txtTipoCliente, $txtEstadoConversacion, $txtCelular, $txtNombreCliente, $txtMensaje, $ubicacion, $txtCantidadMensajes, $txtMotivoMensaje, $txtSubmotivoMensaje, $txtObservaciones, $txtEstadoCliente);
                    if ($respuesta) {
                        echo "Registro almacenado con éxito";
                    } else {
                        echo "Error: registro no se pudo almacenar";
                    }
                } else {
                    $fechaImagen = date('Y-m-d');
                    $horaImagen = time();
                    $carpeta = "../imagenesRedes/";
                    $imgContenido = $Agent . "_" . $txtTipoRedSocial . "_" . $txtCelular . "_" . $fechaImagen . "_" . $horaImagen . ".jpeg";
                    $ubicacion = $carpeta . $imgContenido;
                    move_uploaded_file($_FILES['image']['tmp_name'], "$ubicacion");
                    $respuesta = $TRX->update($IdCliente, $Agent, $StartedManagement, $Tmstmp, $txtFechaGestion, $txtCooperativa, $txtTipoRedSocial, $txtTipoCliente, $txtEstadoConversacion, $txtCelular, $txtNombreCliente, $txtMensaje, $ubicacion, $txtCantidadMensajes, $txtMotivoMensaje, $txtSubmotivoMensaje, $txtObservaciones, $txtEstadoCliente);
                    if ($respuesta) {
                        echo "Registro almacenado con éxito";
                    } else {
                        echo "Error: registro no se pudo almacenar";
                    }
                }
            } else {
                if ($_FILES['image']['tmp_name'] == '') {
                    $ubicacion = $ubicacionImagen;
                    $respuesta = $TRX->update($IdCliente, $Agent, $StartedManagement, $Tmstmp, $txtFechaGestion, $txtCooperativa, $txtTipoRedSocial, $txtTipoCliente, $txtEstadoConversacion, $txtCelular, $txtNombreCliente, $txtMensaje, $ubicacion, $txtCantidadMensajes, $txtMotivoMensaje, $txtSubmotivoMensaje, $txtObservaciones, $txtEstadoCliente);
                    if ($respuesta) {
                        echo "Registro almacenado con éxito";
                    } else {
                        echo "Error: registro no se pudo almacenar";
                    }
                } else {
                    $fechaImagen = date('Y-m-d');
                    $horaImagen = time();
                    $carpeta = "../imagenesRedes/";
                    $imgContenido = $Agent . "_" . $txtTipoRedSocial . "_" . $txtCelular . "_" . $fechaImagen . "_" . $horaImagen . ".jpeg";
                    $ubicacion = $carpeta . $imgContenido;
                    move_uploaded_file($_FILES['image']['tmp_name'], "$ubicacion");
                    $respuesta = $TRX->update($IdCliente, $Agent, $StartedManagement, $Tmstmp, $txtFechaGestion, $txtCooperativa, $txtTipoRedSocial, $txtTipoCliente, $txtEstadoConversacion, $txtCelular, $txtNombreCliente, $txtMensaje, $ubicacion, $txtCantidadMensajes, $txtMotivoMensaje, $txtSubmotivoMensaje, $txtObservaciones, $txtEstadoCliente);
                    if ($respuesta) {
                        echo "Registro almacenado con éxito";
                    } else {
                        echo "Error: registro no se pudo almacenar";
                    }
                }
            }
        }
        break;
}
?>