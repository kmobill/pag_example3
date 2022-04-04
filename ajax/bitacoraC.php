<?php

session_start();

require '../models/bitacoraM.php';
$bitacora = new bitacora();
date_default_timezone_set("America/Lima");

$Id = isset($_POST["Id"]) ? LimpiarCadena14($_POST["Id"]) : ""; //Dato estraido de la funcion mostrar_uno js

$Agent = $_SESSION['usu'];
$date = date('Y-m-d H:i:s');
$IdCliente = isset($_POST["IDC"]) ? LimpiarCadena14($_POST["IDC"]) : "";
$txtCooperativa = isset($_POST["txtCooperativa"]) ? LimpiarCadena14($_POST["txtCooperativa"]) : "";
$txtTipoCampania = isset($_POST["txtTipoCampania"]) ? LimpiarCadena14($_POST["txtTipoCampania"]) : "";
$txtTipoEnvio = isset($_POST["txtTipoEnvio"]) ? LimpiarCadena2($_POST["txtTipoEnvio"]) : "";
$txtCantidad = isset($_POST["txtCantidad"]) ? LimpiarCadena14($_POST["txtCantidad"]) : "";
$txtObservaciones = isset($_POST["txtObservaciones"]) ? LimpiarCadena14($_POST["txtObservaciones"]) : "";


switch ($_GET["action"]) {

    case 'idCliente':
        $result = ejecutarConsultaSimple14("SELECT ID FROM bitacora ORDER BY ID DESC LIMIT 1 ");
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
        $respuesta = $bitacora->selectAll($txtFechaInicio, $txtFechaFin, $txtCoop); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->Id, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => $registrar->Cooperativa,
                "2" => $registrar->TipoCampania,
                "3" => $registrar->TipoMensaje,
                "4" => $registrar->Cantidad,
                "5" => $registrar->Observacion,
                "6" => $registrar->Usuario,
                "7" => $registrar->Fecha,
                '<center><li title="Editar" class="fa fa-edit" style="color: purple;" onclick="mostrar_uno(' . $registrar->Id . ')"></i>&nbsp;&nbsp;&nbsp; '
                . '<li title="Eliminar" class="fa fa-trash" style="color: #3C8DBC;;" onclick="eliminar(' . $registrar->Id . ')"></i></center>'
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
        $respuesta = $bitacora->selectById($Id);
        echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;


    case 'delete':
//        $respuesta = $bitacora->delete($Id);
//        if ($respuesta) {
//            ejecutarConsulta14("insert into trxhistorico select * from trx where Id = '$IdCliente'");
//            echo "Registro eliminado con éxito";
//        } else {
//            echo "Error: registro no se pudo eliminar";
//        }
        break;

    case 'save':
        if ($IdCliente == '') {
            $respuesta = $bitacora->insert($txtCooperativa, $txtTipoCampania, $txtTipoEnvio, $txtCantidad, $txtObservaciones, $date, $Agent);
            if ($respuesta) {
                echo "Registro almacenado con éxito";
            } else {
                echo "Error: registro no se pudo almacenar";
            }
        } else {
            $respuesta = $bitacora->update($IdCliente,$txtCooperativa, $txtTipoCampania, $txtTipoEnvio, $txtCantidad, $txtObservaciones, $date, $Agent);
            if ($respuesta) {
                echo "Registro actualizado con éxito";
            } else {
                echo "Error: registro no se pudo actualizar";
            }
        }
        break;
}
?>