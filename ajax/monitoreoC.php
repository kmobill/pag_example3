<?php

session_start();

require '../models/monitoreoM.php';
$monitoreo = new monitoreoM();
date_default_timezone_set("America/Lima");
$date = date('Y-m-d H:i:s');
$userId = $_SESSION['usu'];

$Id = isset($_POST["Id"]) ? LimpiarCadena($_POST["Id"]) : "";
$FECHA_ATENCION = isset($_POST["FECHA_ATENCION"]) ? LimpiarCadena($_POST["FECHA_ATENCION"]) : "";
$ESTATUS = isset($_POST["ESTATUS"]) ? LimpiarCadena($_POST["ESTATUS"]) : "";
$REGION = isset($_POST["REGION"]) ? LimpiarCadena($_POST["REGION"]) : "";
$AGENCIA = isset($_POST["AGENCIA"]) ? LimpiarCadena($_POST["AGENCIA"]) : "";
$AREA = isset($_POST["AREA"]) ? LimpiarCadena($_POST["AREA"]) : "";
$SECCION = isset($_POST["SECCION"]) ? LimpiarCadena($_POST["SECCION"]) : "";
$TRANSACCION = isset($_POST["TRANSACCION"]) ? LimpiarCadena($_POST["TRANSACCION"]) : "";
$USUARIO = isset($_POST["USUARIO"]) ? LimpiarCadena($_POST["USUARIO"]) : "";
$IDENTIFICACION = isset($_POST["IDENTIFICACION"]) ? LimpiarCadena($_POST["IDENTIFICACION"]) : "";
$PRODUCTO = isset($_POST["PRODUCTO"]) ? LimpiarCadena($_POST["PRODUCTO"]) : "";
$CAMPANIA = isset($_POST["CAMPANIA"]) ? LimpiarCadena($_POST["CAMPANIA"]) : "";
$FECHA_CALIFICACION = isset($_POST["FECHA_CALIFICACION"]) ? LimpiarCadena($_POST["FECHA_CALIFICACION"]) : "";
$ESTADO_MONITOREO = isset($_POST["ESTADO_MONITOREO"]) ? LimpiarCadena($_POST["ESTADO_MONITOREO"]) : "";
$CRITERIO = isset($_POST["CRITERIO"]) ? LimpiarCadena($_POST["CRITERIO"]) : "";
$TMA = isset($_POST["TMA"]) ? LimpiarCadena($_POST["TMA"]) : "";
$SALUDO_1 = isset($_POST["SALUDO_1"]) ? LimpiarCadena($_POST["SALUDO_1"]) : "";
$SALUDO_2 = isset($_POST["SALUDO_2"]) ? LimpiarCadena($_POST["SALUDO_2"]) : "";
$SALUDO_3 = isset($_POST["SALUDO_3"]) ? LimpiarCadena($_POST["SALUDO_3"]) : "";
$PRESENTACION_1 = isset($_POST["PRESENTACION_1"]) ? LimpiarCadena($_POST["PRESENTACION_1"]) : "";
$PRESENTACION_2 = isset($_POST["PRESENTACION_2"]) ? LimpiarCadena($_POST["PRESENTACION_2"]) : "";
$PRESENTACION_3 = isset($_POST["PRESENTACION_3"]) ? LimpiarCadena($_POST["PRESENTACION_3"]) : "";
$CIERRE_1 = isset($_POST["CIERRE_1"]) ? LimpiarCadena($_POST["CIERRE_1"]) : "";
$CIERRE_2 = isset($_POST["CIERRE_2"]) ? LimpiarCadena($_POST["CIERRE_2"]) : "";
$CIERRE_3 = isset($_POST["CIERRE_3"]) ? LimpiarCadena($_POST["CIERRE_3"]) : "";
$COMUNICACION_1 = isset($_POST["COMUNICACION_1"]) ? LimpiarCadena($_POST["COMUNICACION_1"]) : "";
$COMUNICACION_2 = isset($_POST["COMUNICACION_2"]) ? LimpiarCadena($_POST["COMUNICACION_2"]) : "";
$COMUNICACION_3 = isset($_POST["COMUNICACION_3"]) ? LimpiarCadena($_POST["COMUNICACION_3"]) : "";
$COMUNICACION_4 = isset($_POST["COMUNICACION_4"]) ? LimpiarCadena($_POST["COMUNICACION_4"]) : "";
$COMUNICACION_5 = isset($_POST["COMUNICACION_5"]) ? LimpiarCadena($_POST["COMUNICACION_5"]) : "";
$ERRORES_CRITICOS_1 = isset($_POST["ERRORES_CRITICOS_1"]) ? LimpiarCadena($_POST["ERRORES_CRITICOS_1"]) : "";
$ERRORES_CRITICOS_2 = isset($_POST["ERRORES_CRITICOS_2"]) ? LimpiarCadena($_POST["ERRORES_CRITICOS_2"]) : "";
$ERRORES_CRITICOS_3 = isset($_POST["ERRORES_CRITICOS_3"]) ? LimpiarCadena($_POST["ERRORES_CRITICOS_3"]) : "";
$ERRORES_CRITICOS_4 = isset($_POST["ERRORES_CRITICOS_4"]) ? LimpiarCadena($_POST["ERRORES_CRITICOS_4"]) : "";
$ERRORES_CRITICOS_5 = isset($_POST["ERRORES_CRITICOS_5"]) ? LimpiarCadena($_POST["ERRORES_CRITICOS_5"]) : "";
$ERRORES_CRITICOS_CUMPLIMIENTO_1 = isset($_POST["ERRORES_CRITICOS_CUMPLIMIENTO_1"]) ? LimpiarCadena($_POST["ERRORES_CRITICOS_CUMPLIMIENTO_1"]) : "";
$ERRORES_CRITICOS_CUMPLIMIENTO_2 = isset($_POST["ERRORES_CRITICOS_CUMPLIMIENTO_2"]) ? LimpiarCadena($_POST["ERRORES_CRITICOS_CUMPLIMIENTO_2"]) : "";
$ERRORES_CRITICOS_CUMPLIMIENTO_3 = isset($_POST["ERRORES_CRITICOS_CUMPLIMIENTO_3"]) ? LimpiarCadena($_POST["ERRORES_CRITICOS_CUMPLIMIENTO_3"]) : "";
$ERRORES_CRITICOS_CUMPLIMIENTO_4 = isset($_POST["ERRORES_CRITICOS_CUMPLIMIENTO_4"]) ? LimpiarCadena($_POST["ERRORES_CRITICOS_CUMPLIMIENTO_4"]) : "";
$ERRORES_CRITICOS_CUMPLIMIENTO_5 = isset($_POST["ERRORES_CRITICOS_CUMPLIMIENTO_5"]) ? LimpiarCadena($_POST["ERRORES_CRITICOS_CUMPLIMIENTO_5"]) : "";
$MANEJO_GESTION = isset($_POST["MANEJO_GESTION"]) ? LimpiarCadena($_POST["MANEJO_GESTION"]) : "";
$MEJORAS = isset($_POST["MEJORAS"]) ? LimpiarCadena($_POST["MEJORAS"]) : "";
$Nota_ECUF = isset($_POST["Nota_ECUF"]) ? LimpiarCadena($_POST["Nota_ECUF"]) : "";
$Nota_ECN = isset($_POST["Nota_ECN"]) ? LimpiarCadena($_POST["Nota_ECN"]) : "";
$Nota_ENC = isset($_POST["Nota_ENC"]) ? LimpiarCadena($_POST["Nota_ENC"]) : "";
$TOTAL = isset($_POST["TOTAL"]) ? LimpiarCadena($_POST["TOTAL"]) : "";
$ESTADO = '1';

switch ($_GET["action"]) {
    case 'selectAll':
        $respuesta = $monitoreo->selectAll(); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->Id, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => $registrar->AGENT,
                "2" => $registrar->STATUS,
                "3" => $registrar->IDENTIFICACION,
                "4" => $registrar->FECHACALIFICACION,
                "5" => $registrar->PRODUCTO,
                "6" => $registrar->CAMPANIA,
                "7" => $registrar->AGENCIA,
                "8" => $registrar->SECCION,
                "9" => $registrar->TRANSACCION,
                "10" => $registrar->EVALUADOR,
                "11" => $registrar->ESTADOMONITOREO,
                "12" => $registrar->TMA,
                "13" => ($registrar->ESTADO == 'ACTIVO') ?
                '<center><li title="Editar" class="fa fa-edit" style="color: purple;" onclick="mostrar_uno(\'' . $registrar->Id . '\')"></i></center>' :
                '<center><li title="Editar" class="fa fa-edit" style="color: purple;" onclick="mostrar_uno(\'' . $registrar->Id . '\')"></i></center>',
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
        $respuesta = $monitoreo->selectById($Id);
        echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        ejecutarConsulta("UPDATE MONITOREO.CALIFICACIONES SET ESTADOMONITOREO = 'EN PROCESO' WHERE ID = '$Id' ");
        break;

    case 'desactivate':
        $respuesta = $monitoreo->desactivate($Id);
        echo $respuesta ? "Registro eliminado" : "Error: registro no se pudo eliminar";
        break;

    case 'activate':
        $respuesta = $monitoreo->active($Id);
        echo $respuesta ? "Registro restaurado" : "Error: registro no se pudo restaurar";
        break;

    case 'save':
        $IDC = isset($_POST["IDC"]) ? LimpiarCadena($_POST["IDC"]) : "";
        $CONTACTID = isset($_POST["CONTACTID"]) ? LimpiarCadena($_POST["CONTACTID"]) : "";
        $validate = ejecutarConsulta("select Id from MONITOREO.calificaciones where Id = '$IDC'");
        $valid = mysqli_fetch_array($validate, MYSQLI_BOTH);
        $numRowC = $validate->num_rows;
        if ($numRowC == 0 || $numRowC == '') {
            $respuesta = $monitoreo->insert($USUARIO, $FECHA_ATENCION, $ESTATUS, $IDENTIFICACION, $PRODUCTO, $CAMPANIA, $REGION, $AGENCIA, $AREA, $SECCION, $TRANSACCION, $userId, $date, $FECHA_CALIFICACION, $ESTADO_MONITOREO, $CRITERIO, $TMA, $SALUDO_1, $SALUDO_2, $SALUDO_3, $PRESENTACION_1, $PRESENTACION_2, $PRESENTACION_3, $CIERRE_1, $CIERRE_2, $CIERRE_3, $COMUNICACION_1, $COMUNICACION_2, $COMUNICACION_3, $COMUNICACION_4, $COMUNICACION_5, $ERRORES_CRITICOS_1, $ERRORES_CRITICOS_2, $ERRORES_CRITICOS_3, $ERRORES_CRITICOS_4, $ERRORES_CRITICOS_5, $ERRORES_CRITICOS_CUMPLIMIENTO_1, $ERRORES_CRITICOS_CUMPLIMIENTO_2, $ERRORES_CRITICOS_CUMPLIMIENTO_3, $ERRORES_CRITICOS_CUMPLIMIENTO_4, $ERRORES_CRITICOS_CUMPLIMIENTO_5, $MANEJO_GESTION, $MEJORAS, $Nota_ECUF, $Nota_ECN, $Nota_ENC, $TOTAL, $ESTADO);
            $monitoreo->insertCalificacionHistorica($IDC);
            if ($ESTADO_MONITOREO == 'REEMPLAZO' || $ESTADO_MONITOREO == 'DADO DE BAJA') {
                $sql = "UPDATE BGR.GESTIONFINAL SET TMSTMP = '$date', RESULTLEVEL1 ='DB', RESULTLEVEL2 = 'DADO DE BAJA', ESTADO_AUDITORIA='$ESTADO_MONITOREO' WHERE CONTACTID = '$CONTACTID' ";
                ejecutarConsulta($sql);
                echo $respuesta ? "Registro registrado" : "Error: registro no se pudo registrar";
            } else {
                $sql = "UPDATE BGR.GESTIONFINAL SET ESTADO_AUDITORIA='$ESTADO_MONITOREO' WHERE CONTACTID = '$CONTACTID' ";
                ejecutarConsulta($sql);
                echo $respuesta ? "Registro registrado" : "Error: registro no se pudo registrar";
            }
        } else {
            $respuesta = $monitoreo->update($IDC, $USUARIO, $FECHA_ATENCION, $ESTATUS, $IDENTIFICACION, $PRODUCTO, $CAMPANIA, $REGION, $AGENCIA, $AREA, $SECCION, $TRANSACCION, $userId, $date, $FECHA_CALIFICACION, $ESTADO_MONITOREO, $CRITERIO, $TMA, $SALUDO_1, $SALUDO_2, $SALUDO_3, $PRESENTACION_1, $PRESENTACION_2, $PRESENTACION_3, $CIERRE_1, $CIERRE_2, $CIERRE_3, $COMUNICACION_1, $COMUNICACION_2, $COMUNICACION_3, $COMUNICACION_4, $COMUNICACION_5, $ERRORES_CRITICOS_1, $ERRORES_CRITICOS_2, $ERRORES_CRITICOS_3, $ERRORES_CRITICOS_4, $ERRORES_CRITICOS_5, $ERRORES_CRITICOS_CUMPLIMIENTO_1, $ERRORES_CRITICOS_CUMPLIMIENTO_2, $ERRORES_CRITICOS_CUMPLIMIENTO_3, $ERRORES_CRITICOS_CUMPLIMIENTO_4, $ERRORES_CRITICOS_CUMPLIMIENTO_5, $MANEJO_GESTION, $MEJORAS, $Nota_ECUF, $Nota_ECN, $Nota_ENC, $TOTAL, $ESTADO);
            $monitoreo->insertCalificacionHistorica($IDC);
            if ($ESTADO_MONITOREO == 'REEMPLAZO' || $ESTADO_MONITOREO == 'DADO DE BAJA') {
                $sql = "UPDATE BGR.GESTIONFINAL SET TMSTMP = '$date', RESULTLEVEL1 ='DB', RESULTLEVEL2 = 'DADO DE BAJA', ESTADO_AUDITORIA='$ESTADO_MONITOREO' WHERE CONTACTID = '$CONTACTID' ";
                ejecutarConsulta($sql);
                echo $respuesta ? "Registro actualizado" : "Error: registro no se pudo actualizar";
            } else {
                $sql = "UPDATE BGR.GESTIONFINAL SET ESTADO_AUDITORIA='$ESTADO_MONITOREO' WHERE CONTACTID = '$CONTACTID' ";
                ejecutarConsulta($sql);
                echo $respuesta ? "Registro actualizado" : "Error: registro no se pudo actualizar";
            }
        }
        break;
}
?>

