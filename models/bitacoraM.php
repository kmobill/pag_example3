<?php

require '../config/connection.php';

Class bitacora {

    public function _construct() { /* Constructor */
    }

    function selectAll($txtFechaInicio, $txtFechaFin, $txtCoop) { //mostrar todos los registros
        $sql = "SELECT Id, Cooperativa, TipoCampania, TipoMensaje, Cantidad, Observacion, Fecha, Usuario, Estado
                FROM bitacoras.mensajes
                WHERE Fecha BETWEEN '$txtFechaInicio 00:00:00' AND '$txtFechaFin 23:59:59'
                AND Cooperativa like '%$txtCoop%' ";
        return ejecutarConsulta($sql);
    }

    function insert($txtCooperativa, $txtTipoCampania, $txtTipoEnvio, $txtCantidad, $txtObservaciones, $date, $Agent) { //inserción de datos
        $sql = "INSERT INTO bitacoras.mensajes(Cooperativa, TipoCampania, TipoMensaje, Cantidad, Observacion, Fecha, Usuario, Estado) VALUES ("
                . " '$txtCooperativa','$txtTipoCampania','$txtTipoEnvio','$txtCantidad','$txtObservaciones','$date','$Agent','1')";
        return ejecutarConsulta14($sql);
    }

    function update($IdCliente,$txtCooperativa, $txtTipoCampania, $txtTipoEnvio, $txtCantidad, $txtObservaciones, $date, $Agent) { //actualización de datos
        $sql = "UPDATE bitacoras.mensajes SET Usuario='$Agent',Fecha='$date',Cooperativa='$txtCooperativa',TipoCampania='$txtTipoCampania', TipoMensaje='$txtTipoEnvio',Cantidad='$txtCantidad',Observacion='$txtObservaciones' "
                . "WHERE Id = '$IdCliente' ";
        return ejecutarConsulta14($sql);
    }

    function delete($Id) { //eliminación fisica
        $sql = "DELETE FROM bitacoras.mensajes WHERE ID = '$Id'";
        return ejecutarConsulta14($sql);
    }

    function selectById($Id) { //mostrar un registro
        $sql = "SELECT * FROM bitacoras.mensajes where id = '$Id'";
        return ejecutarConsultaSimple($sql);
    }

}

?>