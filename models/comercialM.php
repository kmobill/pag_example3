<?php

require '../config/connection.php';

Class TRX {

    public function _construct() { /* Constructor */
    }

    function selectAll($txtFechaInicio, $txtFechaFin) { //mostrar todos los registros
        $sql = "SELECT ID, AGENT, NombreEntidad, TipoEntidad, PersonaContacto, 
                MotivoLlamada, SubmotivoLlamada
                FROM COMERCIAL.REGISTRO
                WHERE TMSTMP BETWEEN '$txtFechaInicio 00:00:00' AND '$txtFechaFin 23:59:59'";
        return ejecutarConsulta($sql);
    }

    function insert($Agent, $time, $Tmstmp, $txtEntidad, $txtTipoEntidad, $txtSegmento, $txtMotivoLlamada, $txtSubmotivoLlamada, $txtTelefonoContacto, $txtObservaciones, $txtPersonaContacto, $txtCiudad, $txtDireccion, $txtCelular1, $txtCelular2, $txtConvencional1, $txtConvencional2, $txtCorreo, $txtCantidadActivos, $txtCantidadTC) { //inserción de datos
        $sql = "INSERT INTO COMERCIAL.REGISTRO(Agent, StartedManagement, TmStmp, Segmento, ContactAddress, MotivoLlamada, SubmotivoLlamada, Observaciones, NombreEntidad, TipoEntidad, PersonaContacto, CiudadEntidad, DirecciónEntidad, CorreoEntidad, Celular1, Celular2, Convencional1, Convencional2, CantidadClientesActivos, CantidadTC) VALUES ("
                . " '$Agent','$time','$Tmstmp','$txtSegmento','$txtTelefonoContacto','$txtMotivoLlamada','$txtSubmotivoLlamada','$txtObservaciones','$txtEntidad','$txtTipoEntidad','$txtPersonaContacto','$txtCiudad','$txtDireccion','$txtCelular1','$txtCelular2','$txtConvencional1','$txtConvencional2','$txtCorreo','$txtCantidadActivos','$txtCantidadTC')";
        return ejecutarConsulta14($sql);
    }

    function update($IdCliente, $Agent, $time, $Tmstmp, $txtEntidad, $txtTipoEntidad, $txtSegmento, $txtMotivoLlamada, $txtSubmotivoLlamada, $txtTelefonoContacto, $txtObservaciones, $txtPersonaContacto, $txtCiudad, $txtDireccion, $txtCelular1, $txtCelular2, $txtConvencional1, $txtConvencional2, $txtCorreo, $txtCantidadActivos, $txtCantidadTC) { //actualización de datos
        $sql = "UPDATE trx SET Agent='$Agent',StartedManagement='$time',TmStmp='$Tmstmp',Segmento='$txtSegmento',ContactAddress='$txtTelefonoContacto',MotivoLlamada='$txtMotivoLlamada',SubmotivoLlamada='$txtSubmotivoLlamada',Observaciones='$txtObservaciones',NombreEntidad='$txtEntidad',TipoEntidad='$txtTipoEntidad',PersonaContacto='$txtPersonaContacto',CiudadEntidad='$txtCiudad',DirecciónEntidad='$txtDireccion',CorreoEntidad='$txtCorreo',Celular1='$txtCelular1',Celular2='$txtCelular2',Convencional1='$txtConvencional1',Convencional2='$txtConvencional2',CantidadClientesActivos='$txtCantidadActivos',CantidadTC='$txtCantidadTC' "
                . "WHERE Id = '$IdCliente' ";
        return ejecutarConsulta14($sql);
    }

    function delete($Id) { //eliminación fisica
        $sql = "DELETE FROM COMERCIAL.REGISTRO WHERE ID = '$Id'";
        return ejecutarConsulta14($sql);
    }

    function selectById($Id) { //mostrar un registro
        $sql = "SELECT * FROM COMERCIAL.REGISTRO WHERE ID = '$Id'";
        return ejecutarConsultaSimple($sql);
    }

}

?>