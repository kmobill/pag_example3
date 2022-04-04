<?php

require '../config/connection.php';

Class TRX {

    public function _construct() { /* Constructor */
    }

    function selectAll($txtFechaInicio, $txtFechaFin, $txtCoop, $Agent) { //mostrar todos los registros
        $sql = "SELECT ID,COOPERATIVA, AGENT,substr(tmstmp,1,10) as Fecha,
                EstadoLlamada, Identificacion, NombreCliente, CiudadCliente,
                EstadoCliente, MotivoLlamada, SubmotivoLlamada
                FROM campaniasinbound.trx
                WHERE TMSTMP BETWEEN '$txtFechaInicio 00:00:00' AND '$txtFechaFin 23:59:59'
                AND Cooperativa like '%$txtCoop%' and agent = '$Agent' ";
        return ejecutarConsulta($sql);
    }

    function insert($Agent, $time, $Tmstmp, $txtCooperativa, $txtTipoLlamada, $txtEstadoLlamada, $txtIdentificacion, $txtNombreCliente, $txtCiudadCliente, $txtBarrioSector, $txtCelular, $txtConvencional, $txtTipoCliente, $txtTipoTransaccion, $txtTipoSocio, $txtTerceraPersona, $txtMotivoLlamada, $txtSubmotivoLlamada, $txtMonto, $txtPlazo, $txtObservacionSolicitud, $txtObservaciones, $txtEstadoCliente, $txtEstadoEncuesta, $txtObservacionesEncuesta, $txtTranferencia, $txtObsTranferencia, $pregunta1, $respuesta1, $pregunta2, $respuesta2, $pregunta3, $respuesta3, $pregunta4, $respuesta4, $pregunta5, $respuesta5, $pregunta6, $respuesta6, $pregunta7, $respuesta7, $pregunta8, $respuesta8, $pregunta9, $respuesta9, $pregunta10, $respuesta10, $procesoValidacion, $preguntavalidacion1, $preguntavalidacion2, $preguntavalidacion3, $preguntavalidacion4, $preguntavalidacion5, $preguntavalidacion6, $preguntavalidacion7, $respuestavalidacion1, $respuestavalidacion2, $respuestavalidacion3, $respuestavalidacion4, $respuestavalidacion5, $respuestavalidacion6, $respuestavalidacion7, $validacion1, $validacion2, $validacion3, $validacion4, $validacion5, $validacion6, $validacion7, $ubicacion) { //inserción de datos
        $sql = "INSERT INTO trx(Agent, StartedManagement, TmStmp, Cooperativa, TipoLlamada, EstadoLlamada, Identificacion, NombreCliente, CiudadCliente, BarrioSectorCliente, Celular, Convencional, TipoCliente, TipoTransaccion, TipoSocio, Transferencia, ObservacionTransferencia, TerceraPersona, MotivoLlamada, SubmotivoLlamada, MontoProducto, PlazoProducto, ObservacionProducto, Observaciones, EstadoCliente, EstadoEncuesta, ObservacionesEncuesta, pregunta1, respuesta1, pregunta2, respuesta2, pregunta3, respuesta3, pregunta4, respuesta4, pregunta5, respuesta5, pregunta6, respuesta6, pregunta7, respuesta7, pregunta8, respuesta8, pregunta9, respuesta9, pregunta10, respuesta10, procesoValidacion, PreguntaValidacion1, PreguntaValidacion2, PreguntaValidacion3, PreguntaValidacion4, PreguntaValidacion5, PreguntaValidacion6, PreguntaValidacion7, RespuestaValidacion1, RespuestaValidacion2, RespuestaValidacion3, RespuestaValidacion4, RespuestaValidacion5, RespuestaValidacion6, RespuestaValidacion7, Validacion1, Validacion2, Validacion3, Validacion4, Validacion5, Validacion6, Validacion7, Imagen, AgentShift, TmStmpShift) VALUES ("
                . " '$Agent','$time','$Tmstmp','$txtCooperativa','$txtTipoLlamada','$txtEstadoLlamada','$txtIdentificacion','$txtNombreCliente','$txtCiudadCliente','$txtBarrioSector','$txtCelular','$txtConvencional','$txtTipoCliente','$txtTipoTransaccion','$txtTipoSocio','$txtTranferencia','$txtObsTranferencia','$txtTerceraPersona','$txtMotivoLlamada','$txtSubmotivoLlamada','$txtMonto','$txtPlazo','$txtObservacionSolicitud','$txtObservaciones','$txtEstadoCliente','$txtEstadoEncuesta','$txtObservacionesEncuesta','$pregunta1','$respuesta1','$pregunta2','$respuesta2','$pregunta3','$respuesta3','$pregunta4','$respuesta4','$pregunta5','$respuesta5','$pregunta6','$respuesta6','$pregunta7','$respuesta7','$pregunta8','$respuesta8','$pregunta9','$respuesta9','$pregunta10','$respuesta10','$procesoValidacion','$preguntavalidacion1','$preguntavalidacion2','$preguntavalidacion3','$preguntavalidacion4','$preguntavalidacion5','$preguntavalidacion6','$preguntavalidacion7','$respuestavalidacion1','$respuestavalidacion2','$respuestavalidacion3','$respuestavalidacion4','$respuestavalidacion5','$respuestavalidacion6','$respuestavalidacion7','$validacion1','$validacion2','$validacion3','$validacion4','$validacion5','$validacion6','$validacion7','$ubicacion','$Agent','$Tmstmp')";
        return ejecutarConsulta14($sql);
    }

    function update($IdCliente, $Agent, $time, $Tmstmp, $txtCooperativa, $txtTipoLlamada, $txtEstadoLlamada, $txtIdentificacion, $txtNombreCliente, $txtCiudadCliente, $txtBarrioSector, $txtCelular, $txtConvencional, $txtTipoCliente, $txtTipoTransaccion, $txtTipoSocio, $txtTerceraPersona, $txtMotivoLlamada, $txtSubmotivoLlamada, $txtMonto, $txtPlazo, $txtObservacionSolicitud, $txtObservaciones, $txtEstadoCliente, $txtEstadoEncuesta, $txtObservacionesEncuesta, $txtTranferencia, $txtObsTranferencia, $pregunta1, $respuesta1, $pregunta2, $respuesta2, $pregunta3, $respuesta3, $pregunta4, $respuesta4, $pregunta5, $respuesta5, $pregunta6, $respuesta6, $pregunta7, $respuesta7, $pregunta8, $respuesta8, $pregunta9, $respuesta9, $pregunta10, $respuesta10, $procesoValidacion, $preguntavalidacion1, $preguntavalidacion2, $preguntavalidacion3, $preguntavalidacion4, $preguntavalidacion5, $preguntavalidacion6, $preguntavalidacion7, $respuestavalidacion1, $respuestavalidacion2, $respuestavalidacion3, $respuestavalidacion4, $respuestavalidacion5, $respuestavalidacion6, $respuestavalidacion7, $validacion1, $validacion2, $validacion3, $validacion4, $validacion5, $validacion6, $validacion7, $ubicacion) { //actualización de datos
        $sql = "UPDATE trx SET Agent='$Agent',StartedManagement='$time',TmStmp='$Tmstmp',Cooperativa='$txtCooperativa',TipoLlamada='$txtTipoLlamada', EstadoLlamada='$txtEstadoLlamada',Identificacion='$txtIdentificacion',NombreCliente='$txtNombreCliente',CiudadCliente='$txtCiudadCliente',BarrioSectorCliente='$txtBarrioSector',Celular='$txtCelular',Convencional='$txtConvencional',TipoCliente='$txtTipoCliente',TipoTransaccion='$txtTipoTransaccion',TipoSocio='$txtTipoSocio',Transferencia='$txtTranferencia',ObservacionTransferencia='$txtObsTranferencia',TerceraPersona='$txtTerceraPersona',MotivoLlamada='$txtMotivoLlamada',SubmotivoLlamada='$txtSubmotivoLlamada', MontoProducto='$txtMonto',PlazoProducto='$txtPlazo',ObservacionProducto='$txtObservacionSolicitud', Observaciones='$txtObservaciones',EstadoCliente='$txtEstadoCliente',EstadoEncuesta='$txtEstadoEncuesta',ObservacionesEncuesta='$txtObservacionesEncuesta',pregunta1='$pregunta1',respuesta1='$respuesta1',pregunta2='$pregunta2',respuesta2='$respuesta2',pregunta3='$pregunta3',respuesta3='$respuesta3',pregunta4='$pregunta4',respuesta4='$respuesta4',pregunta5='$pregunta5',respuesta5='$respuesta5',pregunta6='$pregunta6',respuesta6='$respuesta6',pregunta7='$pregunta7',respuesta7='$respuesta7',pregunta8='$pregunta8',respuesta8='$respuesta8',pregunta9='$pregunta9',respuesta9='$respuesta9',pregunta10='$pregunta10',respuesta10='$respuesta10',procesoValidacion='$procesoValidacion',PreguntaValidacion1='$preguntavalidacion1',PreguntaValidacion2='$preguntavalidacion2',PreguntaValidacion3='$preguntavalidacion3',PreguntaValidacion4='$preguntavalidacion4',PreguntaValidacion5='$preguntavalidacion5',PreguntaValidacion6='$preguntavalidacion6',PreguntaValidacion7='$preguntavalidacion7',RespuestaValidacion1='$respuestavalidacion1',RespuestaValidacion2='$respuestavalidacion2',RespuestaValidacion3='$respuestavalidacion3',RespuestaValidacion4='$respuestavalidacion4',RespuestaValidacion5='$respuestavalidacion5',RespuestaValidacion6='$respuestavalidacion6',RespuestaValidacion7='$respuestavalidacion7',Validacion1='$validacion1',Validacion2='$validacion2',Validacion3='$validacion3',Validacion4='$validacion4',Validacion5='$validacion5',Validacion6='$validacion6',Validacion7='$validacion7',Imagen='$ubicacion',AgentShift='$Agent',TmStmpShift='$Tmstmp' "
                . "WHERE Id = '$IdCliente' ";
        return ejecutarConsulta14($sql);
    }

    function insertSocio($Agent, $Tmstmp, $txtIdentificacion, $txtNombreCliente, $txtCiudadCliente, $txtBarrioSector, $txtCelular, $txtConvencional) { //inserción de datos
        $sql = "INSERT INTO socios(Identificacion, Nombres, Ciudad, BarrioSector, Celular, Convencional, TmStmp, Agent) VALUES ("
                . " '$txtIdentificacion','$txtNombreCliente','$txtCiudadCliente','$txtBarrioSector','$txtCelular','$txtConvencional','$Tmstmp','$Agent')";
        return ejecutarConsulta14($sql);
    }

    function updateSocio($Agent, $Tmstmp, $txtIdentificacion, $txtNombreCliente, $txtCiudadCliente, $txtBarrioSector, $txtCelular, $txtConvencional) { //actualización de datos
        $sql = "UPDATE socios SET Identificacion='$txtIdentificacion',Nombres='$txtNombreCliente',Ciudad='$txtCiudadCliente', BarrioSector='$txtBarrioSector', Celular='$txtCelular',Convencional='$txtConvencional',TmStmp='$Tmstmp',Agent='$Agent'  "
                . "WHERE Identificacion = '$txtIdentificacion' ";
        return ejecutarConsulta14($sql);
    }

    function delete($Id) { //eliminación fisica
        $sql = "DELETE FROM TRX WHERE ID = '$Id'";
        return ejecutarConsulta14($sql);
    }

    function selectById($Id) { //mostrar un registro
        $sql = "SELECT * FROM campaniasinbound.trx where id = '$Id'";
        return ejecutarConsultaSimple($sql);
    }

    function selectByIdentificacion($Identificacion) { //mostrar un registro
        $sql = "SELECT * FROM campaniasinbound.socios where Identificacion = '$Identificacion'";
        return ejecutarConsultaSimple($sql);
    }

}

?>