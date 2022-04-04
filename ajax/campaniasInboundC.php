<?php

session_start();

require '../models/campaniasInboundM.php';
$TRX = new TRX();
date_default_timezone_set("America/Lima");

$Id = isset($_POST["Id"]) ? LimpiarCadena14($_POST["Id"]) : ""; //Dato estraido de la funcion mostrar_uno js

$Agent = $_SESSION['usu'];
if (isset($_POST["chkHoraFin"]) == 'checkeado') {
    $Tmstmp = isset($_POST["horaFin"]) ? LimpiarCadena14($_POST["horaFin"]) : "";
} else {
    $Tmstmp = date('Y-m-d H:i:s');
}
$time = isset($_POST["horaInicio"]) ? LimpiarCadena14($_POST["horaInicio"]) : "";
$IdCliente = isset($_POST["IDC"]) ? LimpiarCadena14($_POST["IDC"]) : "";

$txtCooperativa = isset($_POST["txtCooperativa"]) ? LimpiarCadena14($_POST["txtCooperativa"]) : "";
$txtTipoLlamada = isset($_POST["txtTipoLlamada"]) ? LimpiarCadena14($_POST["txtTipoLlamada"]) : "";
$txtEstadoLlamada = isset($_POST["txtEstadoLlamada"]) ? LimpiarCadena2($_POST["txtEstadoLlamada"]) : "";
$txtIdentificacion = isset($_POST["txtIdentificacion"]) ? LimpiarCadena14($_POST["txtIdentificacion"]) : "";
$txtNombreCliente = isset($_POST["txtNombreCliente"]) ? LimpiarCadena14($_POST["txtNombreCliente"]) : "";
$txtCiudadCliente = isset($_POST["txtCiudadCliente"]) ? LimpiarCadena14($_POST["txtCiudadCliente"]) : "";
$txtBarrioSector = isset($_POST["txtBarrioSector"]) ? LimpiarCadena14($_POST["txtBarrioSector"]) : "";
$txtCelular = isset($_POST["txtCelular"]) ? LimpiarCadena14($_POST["txtCelular"]) : "";
$txtConvencional = isset($_POST["txtConvencional"]) ? LimpiarCadena14($_POST["txtConvencional"]) : "";
$txtCorreo = isset($_POST["txtCorreo"]) ? LimpiarCadena14($_POST["txtCorreo"]) : "";
$txtFechaNacimiento = isset($_POST["txtFechaNacimiento"]) ? LimpiarCadena14($_POST["txtFechaNacimiento"]) : "";
$txtTipoCliente = isset($_POST["txtTipoCliente"]) ? LimpiarCadena14($_POST["txtTipoCliente"]) : "";
$txtTerceraPersona = isset($_POST["txtTerceraPersona"]) ? LimpiarCadena14($_POST["txtTerceraPersona"]) : "";
$txtMotivoLlamada = isset($_POST["txtMotivoLlamada"]) ? LimpiarCadena14($_POST["txtMotivoLlamada"]) : "";
$txtSubmotivoLlamada = isset($_POST["txtSubmotivoLlamada"]) ? LimpiarCadena14($_POST["txtSubmotivoLlamada"]) : "";
$txtMonto = isset($_POST["txtMonto"]) ? LimpiarCadena14($_POST["txtMonto"]) : "";
$txtPlazo = isset($_POST["txtPlazo"]) ? LimpiarCadena14($_POST["txtPlazo"]) : "";
$txtObservacionSolicitud = isset($_POST["txtObservacionSolicitud"]) ? LimpiarCadena14($_POST["txtObservacionSolicitud"]) : "";
$txtObservaciones = isset($_POST["txtObservaciones"]) ? LimpiarCadena14($_POST["txtObservaciones"]) : "";
$txtEstadoCliente = isset($_POST["txtEstadoCliente"]) ? LimpiarCadena14($_POST["txtEstadoCliente"]) : "";
$txtEstadoEncuesta = isset($_POST["txtEstadoEncuesta"]) ? LimpiarCadena14($_POST["txtEstadoEncuesta"]) : "";
$txtObservacionesEncuesta = isset($_POST["txtObservacionesEncuesta"]) ? LimpiarCadena14($_POST["txtObservacionesEncuesta"]) : "";
$txtTranferencia = isset($_POST["txtTranferencia"]) ? LimpiarCadena14($_POST["txtTranferencia"]) : "";
$txtObsTranferencia = isset($_POST["txtObsTranferencia"]) ? LimpiarCadena14($_POST["txtObsTranferencia"]) : "";
$txtTipoTransaccion = isset($_POST["txtTipoTransaccion"]) ? LimpiarCadena14($_POST["txtTipoTransaccion"]) : "";
$txtTipoSocio = isset($_POST["txtTipoSocio"]) ? LimpiarCadena14($_POST["txtTipoSocio"]) : "";
$pregunta1 = isset($_POST["pregunta1"]) ? LimpiarCadena14($_POST["pregunta1"]) : "";
$respuesta1 = isset($_POST["respuesta1"]) ? LimpiarCadena14($_POST["respuesta1"]) : "";
$pregunta2 = isset($_POST["pregunta2"]) ? LimpiarCadena14($_POST["pregunta2"]) : "";
$respuesta2 = isset($_POST["respuesta2"]) ? LimpiarCadena14($_POST["respuesta2"]) : "";
$pregunta3 = isset($_POST["pregunta3"]) ? LimpiarCadena14($_POST["pregunta3"]) : "";
$respuesta3 = isset($_POST["respuesta3"]) ? LimpiarCadena14($_POST["respuesta3"]) : "";
$pregunta4 = isset($_POST["pregunta4"]) ? LimpiarCadena14($_POST["pregunta4"]) : "";
$respuesta4 = isset($_POST["respuesta4"]) ? LimpiarCadena14($_POST["respuesta4"]) : "";
$pregunta5 = isset($_POST["pregunta5"]) ? LimpiarCadena14($_POST["pregunta5"]) : "";
$respuesta5 = isset($_POST["respuesta5"]) ? LimpiarCadena14($_POST["respuesta5"]) : "";
$pregunta6 = isset($_POST["pregunta6"]) ? LimpiarCadena14($_POST["pregunta6"]) : "";
$respuesta6 = isset($_POST["respuesta6"]) ? LimpiarCadena14($_POST["respuesta6"]) : "";
$pregunta7 = isset($_POST["pregunta7"]) ? LimpiarCadena14($_POST["pregunta7"]) : "";
$respuesta7 = isset($_POST["respuesta7"]) ? LimpiarCadena14($_POST["respuesta7"]) : "";
$pregunta8 = isset($_POST["pregunta8"]) ? LimpiarCadena14($_POST["pregunta8"]) : "";
$respuesta8 = isset($_POST["respuesta8"]) ? LimpiarCadena14($_POST["respuesta8"]) : "";
$pregunta9 = isset($_POST["pregunta9"]) ? LimpiarCadena14($_POST["pregunta9"]) : "";
$respuesta9 = isset($_POST["respuesta9"]) ? LimpiarCadena14($_POST["respuesta9"]) : "";
$pregunta10 = isset($_POST["pregunta10"]) ? LimpiarCadena14($_POST["pregunta10"]) : "";
$respuesta10 = isset($_POST["respuesta10"]) ? LimpiarCadena14($_POST["respuesta10"]) : "";
$procesoValidacion = isset($_POST["txtProcesoValidacion"]) ? LimpiarCadena14($_POST["txtProcesoValidacion"]) : "";
$preguntavalidacion1 = isset($_POST["preguntavalidacion1"]) ? LimpiarCadena14($_POST["preguntavalidacion1"]) : "";
$preguntavalidacion2 = isset($_POST["preguntavalidacion2"]) ? LimpiarCadena14($_POST["preguntavalidacion2"]) : "";
$preguntavalidacion3 = isset($_POST["preguntavalidacion3"]) ? LimpiarCadena14($_POST["preguntavalidacion3"]) : "";
$preguntavalidacion4 = isset($_POST["preguntavalidacion4"]) ? LimpiarCadena14($_POST["preguntavalidacion4"]) : "";
$preguntavalidacion5 = isset($_POST["preguntavalidacion5"]) ? LimpiarCadena14($_POST["preguntavalidacion5"]) : "";
$preguntavalidacion6 = isset($_POST["preguntavalidacion6"]) ? LimpiarCadena14($_POST["preguntavalidacion6"]) : "";
$preguntavalidacion7 = isset($_POST["preguntavalidacion7"]) ? LimpiarCadena14($_POST["preguntavalidacion7"]) : "";
$respuestavalidacion1 = isset($_POST["respuestavalidacion1"]) ? LimpiarCadena14($_POST["respuestavalidacion1"]) : "";
$respuestavalidacion2 = isset($_POST["respuestavalidacion2"]) ? LimpiarCadena14($_POST["respuestavalidacion2"]) : "";
$respuestavalidacion3 = isset($_POST["respuestavalidacion3"]) ? LimpiarCadena14($_POST["respuestavalidacion3"]) : "";
$respuestavalidacion4 = isset($_POST["respuestavalidacion4"]) ? LimpiarCadena14($_POST["respuestavalidacion4"]) : "";
$respuestavalidacion5 = isset($_POST["respuestavalidacion5"]) ? LimpiarCadena14($_POST["respuestavalidacion5"]) : "";
$respuestavalidacion6 = isset($_POST["respuestavalidacion6"]) ? LimpiarCadena14($_POST["respuestavalidacion6"]) : "";
$respuestavalidacion7 = isset($_POST["respuestavalidacion7"]) ? LimpiarCadena14($_POST["respuestavalidacion7"]) : "";
$validacion1 = isset($_POST["validacion1"]) ? LimpiarCadena14($_POST["validacion1"]) : "";
$validacion2 = isset($_POST["validacion2"]) ? LimpiarCadena14($_POST["validacion2"]) : "";
$validacion3 = isset($_POST["validacion3"]) ? LimpiarCadena14($_POST["validacion3"]) : "";
$validacion4 = isset($_POST["validacion4"]) ? LimpiarCadena14($_POST["validacion4"]) : "";
$validacion5 = isset($_POST["validacion5"]) ? LimpiarCadena14($_POST["validacion5"]) : "";
$validacion6 = isset($_POST["validacion6"]) ? LimpiarCadena14($_POST["validacion6"]) : "";
$validacion7 = isset($_POST["validacion7"]) ? LimpiarCadena14($_POST["validacion7"]) : "";

switch ($_GET["action"]) {
    case 'fechaInicio':
        date_default_timezone_set("America/Lima");
        echo(date('Y-m-d H:i:s'));
        break;

    case 'idCliente':
        $result = ejecutarConsultaSimple14("SELECT ID FROM TRX ORDER BY ID DESC LIMIT 1 ");
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
                "1" => $registrar->COOPERATIVA,
                "2" => $registrar->AGENT,
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
        $respuesta = $TRX->selectById($Id);
        echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;

    case 'selectByIdentificacion':
        $Identificacion = isset($_POST["identificacion"]) ? LimpiarCadena14($_POST["identificacion"]) : "";
        $respuesta = $TRX->selectByIdentificacion($Identificacion);
        echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;

    case 'insertSocio':
        $respuesta = $TRX->insertSocio($Agent, $Tmstmp, $txtIdentificacion, $txtNombreCliente, $txtCiudadCliente, $txtBarrioSector, $txtCelular, $txtConvencional);
        if ($respuesta) {
            echo "Registro almacenado con éxito";
        } else {
            echo "Error: registro no se pudo almacenar";
        }
        break;

    case 'updateSocio':
        $respuesta = $TRX->updateSocio($Agent, $Tmstmp, $txtIdentificacion, $txtNombreCliente, $txtCiudadCliente, $txtBarrioSector, $txtCelular, $txtConvencional);
        if ($respuesta) {
            echo "Registro actualizado con éxito";
        } else {
            echo "Error: registro no se pudo actualizar";
        }
        break;

    case 'motivo':
        $cooperativa= $_GET["cooperativa"];
        $result = ejecutarConsulta14("SELECT DISTINCT MOTIVO FROM resultadosdegestion where estado='1' AND COOPERATIVA = '$cooperativa' ORDER BY MOTIVO");
        echo '<option></option>';
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            echo '<option value="' . $row["MOTIVO"] . '">' . $row["MOTIVO"] . '</option>';
        }
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

    case 'procesoValidacion':
        $cooperativa = $_GET["cooperativa"];
        $result = ejecutarConsulta14("select distinct motivollamada from campaniasinbound.preguntasvalidacion where Cooperativa = '$cooperativa' and estado = 1");
        if ($result == '' || $result == null) {
            echo "<option value = ''>Otra validación</option>";
        } else {
            echo "<option></option>";
            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                echo '<option value="' . $row["motivollamada"] . '">' . $row["motivollamada"] . '</option>';
            }
        }
        break;

    case 'preguntaBasica':
        $cooperativa = isset($_POST["cooperativa"]) ? LimpiarCadena14($_POST["cooperativa"]) : "";
        $proceso = isset($_POST["motivo"]) ? LimpiarCadena14($_POST["motivo"]) : "";
        $respuesta = ejecutarConsulta("SELECT ID, PREGUNTA FROM CAMPANIASINBOUND.PREGUNTASVALIDACION WHERE ESTADO = '1' AND DIFICULTAD = 'BAJA' AND COOPERATIVA LIKE '$cooperativa%' AND MOTIVOLLAMADA LIKE '$proceso' ORDER BY RAND() LIMIT 1; ");
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->ID, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => $registrar->PREGUNTA
            );
        }
        echo json_encode($datos);
        break;

    case 'preguntaMedia':
        $cooperativa = isset($_POST["cooperativa"]) ? LimpiarCadena14($_POST["cooperativa"]) : "";
        $proceso = isset($_POST["motivo"]) ? LimpiarCadena14($_POST["motivo"]) : "";
        $respuesta = ejecutarConsulta("SELECT ID, PREGUNTA FROM CAMPANIASINBOUND.PREGUNTASVALIDACION WHERE ESTADO = '1' AND DIFICULTAD = 'MEDIA' AND COOPERATIVA LIKE '%$cooperativa%' AND MOTIVOLLAMADA LIKE '$proceso' ORDER BY RAND() LIMIT 3; ");
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->ID, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => $registrar->PREGUNTA
            );
        }
        echo json_encode($datos);
        break;

    case 'preguntaAvanzada':
        $cooperativa = isset($_POST["cooperativa"]) ? LimpiarCadena14($_POST["cooperativa"]) : "";
        $proceso = isset($_POST["motivo"]) ? LimpiarCadena14($_POST["motivo"]) : "";
        $respuesta = ejecutarConsulta("SELECT ID, PREGUNTA FROM CAMPANIASINBOUND.PREGUNTASVALIDACION WHERE ESTADO = '1' AND DIFICULTAD = 'AVANZADA' AND COOPERATIVA LIKE '%$cooperativa%' AND MOTIVOLLAMADA LIKE '$proceso' ORDER BY RAND() LIMIT 3; ");
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                "0" => $registrar->ID, /* recoge los datos segun los indices de la tabla, iniciando con 0 */
                "1" => $registrar->PREGUNTA
            );
        }
        echo json_encode($datos);
        break;

    case 'preguntaporcoop':
        $cooperativa = isset($_POST["cooperativa"]) ? LimpiarCadena14($_POST["cooperativa"]) : "";
        $respuesta = ejecutarConsultaSimple("SELECT COUNT(ID) ID FROM CAMPANIASINBOUND.PREGUNTASVALIDACION WHERE ESTADO = '1' AND COOPERATIVA LIKE '%$cooperativa%'; ");
        echo $respuesta["ID"];
        break;

    case 'save':
        $campoImagen = ejecutarConsultaSimple14("SELECT IMAGEN FROM TRX WHERE ID = '$IdCliente'");
        $ubicacionImagen = $campoImagen["IMAGEN"];
        if ($ubicacionImagen == '') {
            $fechaImagen = date('Y-m-d');
            $horaImagen = time();
            $carpeta = "../imagenesInbound/";
            $imgContenido = $Agent . "_" . $txtIdentificacion . "_" . $txtCooperativa . "_" . $txtMotivoLlamada . "_" . $fechaImagen . "_" . $horaImagen . ".jpeg";
            $ubicacion = $carpeta . $imgContenido;
            move_uploaded_file($_FILES['image']['tmp_name'], "$ubicacion");
        } else {
            $ubicacion = $ubicacionImagen;
        }
        
        if ($IdCliente == '') {
            $respuesta = $TRX->insert($Agent, $time, $Tmstmp, $txtCooperativa, $txtTipoLlamada, $txtEstadoLlamada, $txtIdentificacion, $txtNombreCliente, $txtCiudadCliente, $txtBarrioSector, $txtCelular, $txtConvencional, $txtTipoCliente, $txtTipoTransaccion, $txtTipoSocio, $txtTerceraPersona, $txtMotivoLlamada, $txtSubmotivoLlamada, $txtMonto, $txtPlazo, $txtObservacionSolicitud, $txtObservaciones, $txtEstadoCliente, $txtEstadoEncuesta, $txtObservacionesEncuesta, $txtTranferencia, $txtObsTranferencia, $pregunta1, $respuesta1, $pregunta2, $respuesta2, $pregunta3, $respuesta3, $pregunta4, $respuesta4, $pregunta5, $respuesta5, $pregunta6, $respuesta6, $pregunta7, $respuesta7, $pregunta8, $respuesta8, $pregunta9, $respuesta9, $pregunta10, $respuesta10, $procesoValidacion, $preguntavalidacion1, $preguntavalidacion2, $preguntavalidacion3, $preguntavalidacion4, $preguntavalidacion5, $preguntavalidacion6, $preguntavalidacion7, $respuestavalidacion1, $respuestavalidacion2, $respuestavalidacion3, $respuestavalidacion4, $respuestavalidacion5, $respuestavalidacion6, $respuestavalidacion7, $validacion1, $validacion2, $validacion3, $validacion4, $validacion5, $validacion6, $validacion7, $ubicacion);
            if ($respuesta) {
                echo "Registro almacenado con éxito";
            } else {
                echo "Error: registro no se pudo almacenar";
            }
        } else {
            $respuesta = $TRX->update($IdCliente, $Agent, $time, $Tmstmp, $txtCooperativa, $txtTipoLlamada, $txtEstadoLlamada, $txtIdentificacion, $txtNombreCliente, $txtCiudadCliente, $txtBarrioSector, $txtCelular, $txtConvencional, $txtTipoCliente, $txtTipoTransaccion, $txtTipoSocio, $txtTerceraPersona, $txtMotivoLlamada, $txtSubmotivoLlamada, $txtMonto, $txtPlazo, $txtObservacionSolicitud, $txtObservaciones, $txtEstadoCliente, $txtEstadoEncuesta, $txtObservacionesEncuesta, $txtTranferencia, $txtObsTranferencia, $pregunta1, $respuesta1, $pregunta2, $respuesta2, $pregunta3, $respuesta3, $pregunta4, $respuesta4, $pregunta5, $respuesta5, $pregunta6, $respuesta6, $pregunta7, $respuesta7, $pregunta8, $respuesta8, $pregunta9, $respuesta9, $pregunta10, $respuesta10, $procesoValidacion, $preguntavalidacion1, $preguntavalidacion2, $preguntavalidacion3, $preguntavalidacion4, $preguntavalidacion5, $preguntavalidacion6, $preguntavalidacion7, $respuestavalidacion1, $respuestavalidacion2, $respuestavalidacion3, $respuestavalidacion4, $respuestavalidacion5, $respuestavalidacion6, $respuestavalidacion7, $validacion1, $validacion2, $validacion3, $validacion4, $validacion5, $validacion6, $validacion7, $ubicacion);
            if ($respuesta) {
                echo "Registro actualizado con éxito";
            } else {
                echo "Error: registro no se pudo actualizar";
            }
        }
        break;
}
?>