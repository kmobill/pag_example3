<?php

require '../config/connection.php';

Class funciones {

    public function _construct() { /* Constructor */
    }
    
    function updateTelf($IdC, $Num, $Agent, $Estado, $fechaInicio, $Tmstmp, $InteractionId) { //mostrar todos los registros
        $sql = "Update contactimportphone set Agente = '$Agent', Estado = '$Estado', FechaHoraFin ='$Tmstmp', "
                . "FechaHora ='$fechaInicio', InteractionId = '$InteractionId' "
                . "where ContactId = '$IdC' and NumeroMarcado = '$Num'";
        return ejecutarConsulta($sql);
    }
    
    function desencriptar($texto) {
        $key = '';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
        list($encrypted_data, $iv) = explode('::', base64_decode($texto), 2);
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
    }

}

?>