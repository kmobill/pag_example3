<?php

require '../config/connection.php';

Class TRXRedes {

    public function _construct() { /* Constructor */
    }

    function selectAll($txtFechaInicio, $txtFechaFin, $txtCoop, $Agent) { //mostrar todos los registros
        $sql = "SELECT ID, COOPERATIVA, AGENT, FechaGestion as Fecha, Celular, Nombre,
                EstadoConversacion, MotivoMensaje, SubmotivoMensaje
                FROM campaniasinbound.trxredes
                WHERE TMSTMP BETWEEN '$txtFechaInicio 00:00:00' AND '$txtFechaFin 23:59:59'
                AND Cooperativa like '%$txtCoop%' and agent = '$Agent' ";
        return ejecutarConsulta($sql);
    }

    function insert($Agent, $StartedManagement, $Tmstmp, $txtFechaGestion, $txtCooperativa, $txtTipoRedSocial, $txtTipoCliente, $txtEstadoConversacion, $txtCelular, $txtNombreCliente, $txtMensaje, $ubicacion, $txtCantidadMensajes, $txtMotivoMensaje, $txtSubmotivoMensaje, $txtObservaciones, $txtEstadoCliente) { //inserción de datos
        $sql = "INSERT INTO trxredes(Agent, StartedManagement, TmStmp, FechaGestion, Cooperativa, TipoRedSocial, TipoCliente, EstadoConversacion, Celular, Nombre, Mensaje, Imagen, CantidadMensajes, MotivoMensaje, SubmotivoMensaje, Observaciones, EstadoCliente, AgentShift, TmStmpShift) VALUES ("
                . " '$Agent','$StartedManagement','$Tmstmp','$txtFechaGestion','$txtCooperativa','$txtTipoRedSocial','$txtTipoCliente','$txtEstadoConversacion','$txtCelular','$txtNombreCliente','$txtMensaje','$ubicacion','$txtCantidadMensajes','$txtMotivoMensaje','$txtSubmotivoMensaje','$txtObservaciones','$txtEstadoCliente','$Agent','$Tmstmp')";
        return ejecutarConsulta14($sql);
    }

    function update($IdCliente, $Agent, $Tmstmp, $StartedManagement, $txtFechaGestion, $txtCooperativa, $txtTipoRedSocial, $txtTipoCliente, $txtEstadoConversacion, $txtCelular, $txtNombreCliente, $txtMensaje, $ubicacion, $txtCantidadMensajes, $txtMotivoMensaje, $txtSubmotivoMensaje, $txtObservaciones, $txtEstadoCliente) { //actualización de datos
        $sql = "UPDATE trxredes SET Agent='$Agent',StartedManagement='$StartedManagement',TmStmp= '$Tmstmp',FechaGestion='$txtFechaGestion',Cooperativa='$txtCooperativa',TipoRedSocial='$txtTipoRedSocial',TipoCliente='$txtTipoCliente',EstadoConversacion='$txtEstadoConversacion',Celular='$txtCelular',Nombre='$txtNombreCliente',Mensaje='$txtMensaje',Imagen='$ubicacion', CantidadMensajes='$txtCantidadMensajes',MotivoMensaje='$txtMotivoMensaje',SubmotivoMensaje='$txtSubmotivoMensaje',Observaciones='$txtObservaciones',EstadoCliente='$txtEstadoCliente',AgentShift='$Agent',TmStmpShift='$Tmstmp' "
                . "WHERE Id = '$IdCliente' ";
        return ejecutarConsulta14($sql);
    }

    function delete($Id) { //eliminación fisica
        $sql = "DELETE FROM trxredes WHERE ID = '$Id'";
        return ejecutarConsulta14($sql);
    }

    function selectById($Id) { //mostrar un registro
        $sql = "SELECT * FROM campaniasinbound.trxredes where id = '$Id'";
        return ejecutarConsultaSimple($sql);
    }

}

?>