<?php

require '../config/connection.php';

Class cccaCreditosM {

    public function _construct() { /* Constructor */
    }

    function selectAll() { //mostrar todos los registros
        $sql = "SELECT c.ID, c.CampaignId, c.ImportId, c.IDENTIFICACION, c.NOMBRE_CLIENTE, "
                . "c.TIPO_CRD, c.MONTO_MAXIMO_CRD, c.PLAZO_CRD, cc.LastAgent 'Agent', c.ResultLevel2 "
                . "FROM cooperativasventas.clientes c, cck.contactimportcontact cc  "
                . "where c.Id = cc.id and cc.LastAgent = '$_SESSION[usu]' "
                . "and cc.Campaign = 'COOP_CRD' "
                . "and (cc.action = 'reciclar base' or cc.action = 'asignar base') and cc.action <> 'cancelar base' ";
        return ejecutarConsulta12($sql);
    }
    
    function selectAll_1() { //mostrar todos los registros
        $sql = "SELECT c.ID, c.CampaignId, c.ImportId, c.IDENTIFICACION, c.NOMBRE_CLIENTE, "
                . "c.TIPO_CRD, c.MONTO_MAXIMO_CRD, c.PLAZO_CRD, cc.LastAgent 'Agent', c.ResultLevel2 "
                . "FROM cooperativasventas.clientes c, cck.contactimportcontact cc  "
                . "where c.Id = cc.id and cc.LastAgent = '$_SESSION[usu]' "
                . "and cc.Campaign = 'CCCA_ENCUESTA' "
                . "and (cc.action = 'reciclar base' or cc.action = 'asignar base') and cc.action <> 'cancelar base' ";
        return ejecutarConsulta12($sql);
    }

    function selectById($Id) { //mostrar un registro
        $sql = "SELECT * FROM cooperativasventas.clientes where id = '$Id'";
        return ejecutarConsultaSimple12($sql);
    }

    function selectByIdRec($Id) { //mostrar un registro
        $sql = "SELECT * FROM cooperativasventas.gestionfinal where id = '$Id'";
        return ejecutarConsultaSimple12($sql);
    }

    function updateClientes($IdCliente, $Agent, $level1, $level2, $level3, $mangementCode, $Tmstmp, $intentos, $contactAddress) { //mostrar todos los registros
        $sql = "Update cooperativasventas.clientes set lastagent = '$Agent', ResultLevel1 = '$level1', "
                . " ResultLevel2 = '$level2', ResultLevel3 = '$level3', ManagementResultCode = '$mangementCode', "
                . " TmStmp = '$Tmstmp', Intentos = '$intentos', ContactAddress = '$contactAddress' "
                . " where ContactId = '$IdCliente'";
        return ejecutarConsulta12($sql);
    }

    function insertGestionFinal($IdCliente, $contactAddress, $interactionId, $Agent, $level1, $level2, $level3, $mangementCode, $time, $Tmstmp, $intentos, $FechaAgendamiento, $TelefonoAd, $Observaciones, $MONTO_ACEPTADO_CRD, $PLAZO_ACEPTADO_CRD, $FECHA_AGENDA_CRD, $HORA_AGENDA_CRD) { //mostrar todos los registros
        $sql = "INSERT INTO cooperativasventas.gestionfinal(VCC, CampaignId, ContactId, ContactAddress, InteractionId, ImportId, Agent, ResultLevel1, ResultLevel2, ResultLevel3, ManagementResultCode, ManagementResultDescription, StartedManagement, TmStmp, Intentos, ID, CODIGO_CAMPANIA, NOMBRE_CAMPANIA, NOMBRE_COOPERATIVA, IDENTIFICACION, NOMBRE_CLIENTE, ESTADO_SOCIO, CODIGO, NUMERO_SOCIO, NUMERO_CUENTA, NUMERO_TC, AGENCIA, EDAD, FECHA_NACIMIENTO, ESTADO_CIVIL, SEXO, PROVINCIA_DOMICILIO, CIUDAD_DOMICILIO, DIRECCION_DOMICILIO, PROVINCIA_TRABAJO, CIUDAD_TRABAJO, DIRECCION_TRABAJO, ACTIVIDAD_ECONOMICA, CORREO, TIPO_EMPLEADO, INGRESOS, ACTIVOS, EGRESOS, PASIVOS, PRODUCTO, TIPO_CRD, MONTO_MAXIMO_CRD, PLAZO_CRD, TIPO_TC, FAMILIA_TC, MARCA_TC, PLAN_RECOMPENSAS, CUPO_TC, CUPO_MAXIMO_TC, CUPO_DISPONIBLE_TC, PRIORIDAD_GESTION, NOMBRE1, NOMBRE2, APELLIDO1, APELLIDO2, MONTO_ACEPTADO_CRD, PLAZO_ACEPTADO_CRD, FECHA_AGENDA_CRD, HORA_AGENDA_CRD) "
                . "SELECT VCC, CampaignId, '$IdCliente', '$contactAddress', '$interactionId', ImportId, '$Agent', '$level1', '$level2', '$level3', '$mangementCode', '', '$time', '$Tmstmp', $intentos, ID, CODIGO_CAMPANIA, NOMBRE_CAMPANIA, NOMBRE_COOPERATIVA, IDENTIFICACION, NOMBRE_CLIENTE, ESTADO_SOCIO, CODIGO, NUMERO_SOCIO, NUMERO_CUENTA, NUMERO_TC, AGENCIA, EDAD, FECHA_NACIMIENTO, ESTADO_CIVIL, SEXO, PROVINCIA_DOMICILIO, CIUDAD_DOMICILIO, DIRECCION_DOMICILIO, PROVINCIA_TRABAJO, CIUDAD_TRABAJO, DIRECCION_TRABAJO, ACTIVIDAD_ECONOMICA, CORREO, TIPO_EMPLEADO, INGRESOS, ACTIVOS, EGRESOS, PASIVOS, PRODUCTO, TIPO_CRD, MONTO_MAXIMO_CRD, PLAZO_CRD, TIPO_TC, FAMILIA_TC, MARCA_TC, PLAN_RECOMPENSAS, CUPO_TC, CUPO_MAXIMO_TC, CUPO_DISPONIBLE_TC, PRIORIDAD_GESTION, NOMBRE1, NOMBRE2, APELLIDO1, APELLIDO2, '$MONTO_ACEPTADO_CRD', '$PLAZO_ACEPTADO_CRD', '$FECHA_AGENDA_CRD', '$HORA_AGENDA_CRD'  "
                . "FROM cooperativasventas.clientes where Id = '$IdCliente' ";
        return ejecutarConsulta12($sql);
    }

    function updateGestionFinal($IdCliente, $contactAddress, $interactionId, $Agent, $level1, $level2, $level3, $mangementCode, $time, $Tmstmp, $intentos, $FechaAgendamiento, $TelefonoAd, $Observaciones, $MONTO_ACEPTADO_CRD, $PLAZO_ACEPTADO_CRD, $FECHA_AGENDA_CRD, $HORA_AGENDA_CRD) {
        $sql = "UPDATE cooperativasventas.gestionfinal SET ContactAddress = '$contactAddress', InteractionId = '$interactionId',"
                . "Agent = '$Agent', ResultLevel1 = '$level1', ResultLevel2 = '$level2', ResultLevel3 = '$level3', ManagementResultDescription = '', "
                . "ManagementResultCode = '$mangementCode', StartedManagement = '$time', TmStmp = '$Tmstmp', Intentos = '$intentos', FechaAgendamiento = '$FechaAgendamiento', "
                . "Telefono2 = '$TelefonoAd', Observaciones = '$Observaciones', MONTO_ACEPTADO_CRD = '$MONTO_ACEPTADO_CRD', PLAZO_ACEPTADO_CRD = '$PLAZO_ACEPTADO_CRD', FECHA_AGENDA_CRD = '$FECHA_AGENDA_CRD', HORA_AGENDA_CRD = '$HORA_AGENDA_CRD' "
                . "where ContactId = '$IdCliente' ";
        return ejecutarConsulta12($sql);
    }

    function insertGestionHistorica($IdCliente) { //mostrar todos los registros
        $sql = "insert into cooperativasventas.gestionhistorica select * from cooperativasventas.gestionfinal where Id = '$IdCliente' ";
        return ejecutarConsulta12($sql);
    }

    function insertGestionFinalCEM($IdCliente, $contactAddress, $interactionId, $Agent, $level1, $level2, $level3, $mangementCode, $time, $Tmstmp, $intentos, $FechaAgendamiento, $TelefonoAd, $Observaciones, $pregunta1, $pregunta1_1, $pregunta2, $pregunta2_1, $pregunta3, $pregunta3_1, $pregunta4, $pregunta4_1, $pregunta5, $pregunta5_1, $pregunta6, $pregunta6_1, $pregunta7, $pregunta7_1, $pregunta8, $pregunta8_1, $pregunta9, $pregunta9_1, $pregunta10, $pregunta10_1,$respuesta1, $respuesta1_1, $respuesta2, $respuesta2_1, $respuesta3, $respuesta3_1, $respuesta4, $respuesta4_1, $respuesta5, $respuesta5_1, $respuesta6, $respuesta6_1, $respuesta7, $respuesta7_1, $respuesta8, $respuesta8_1, $respuesta9, $respuesta9_1, $respuesta10, $respuesta10_1, $ATRIBUTO_NPS, $ATRIBUTO_CES, $ATRIBUTO_INS) { //mostrar todos los registros
        $sql = "INSERT INTO cooperativasventas.gestionfinalcem(VCC, CampaignId, ContactId, ContactAddress, InteractionId, ImportId, Agent, ResultLevel1, ResultLevel2, ResultLevel3, ManagementResultCode, ManagementResultDescription, StartedManagement, TmStmp, Intentos, FechaAgendamiento, Telefono2, Observaciones, ID, CODIGO_CAMPANIA, NOMBRE_CAMPANIA, NOMBRE_COOPERATIVA, IDENTIFICACION, NOMBRE_CLIENTE, ESTADO_SOCIO, CODIGO, FECHA_SOLICITUD, NUMERO_SOLICITUD, ESTADO_SOLICITUD, NUMERO_SOCIO, NUMERO_CUENTA, NUMERO_TC, AGENCIA, EDAD, FECHA_NACIMIENTO, ESTADO_CIVIL, SEXO, PROVINCIA_DOMICILIO, CIUDAD_DOMICILIO, DIRECCION_DOMICILIO, PROVINCIA_TRABAJO, CIUDAD_TRABAJO, DIRECCION_TRABAJO, ACTIVIDAD_ECONOMICA, CORREO, TIPO_EMPLEADO, INGRESOS, ACTIVOS, EGRESOS, PASIVOS, PRODUCTO, TIPO_CRD, MONTO_MAXIMO_CRD, PLAZO_CRD, TASA_CRD, DESTINO_DETALLADO, NEGOCIACION, FECHA_MODIFICACION, OFICIAL_CUENTA, ESTADO_DESEMBOLSO, COMENTARIOS, TIPO_TC, FAMILIA_TC, MARCA_TC, PLAN_RECOMPENSAS, CUPO_TC, CUPO_MAXIMO_TC, CUPO_DISPONIBLE_TC, PRIORIDAD_GESTION, NOMBRE1, NOMBRE2, APELLIDO1, APELLIDO2, PREGUNTA_1, PREGUNTA_1_1, PREGUNTA_2, PREGUNTA_2_1, PREGUNTA_3, PREGUNTA_3_1, PREGUNTA_4, PREGUNTA_4_1, PREGUNTA_5, PREGUNTA_5_1, PREGUNTA_6, PREGUNTA_6_1, PREGUNTA_7, PREGUNTA_7_1, PREGUNTA_8, PREGUNTA_8_1, PREGUNTA_9, PREGUNTA_9_1, PREGUNTA_10, PREGUNTA_10_1, RESPUESTA_1, RESPUESTA_1_1, RESPUESTA_2, RESPUESTA_2_1, RESPUESTA_3, RESPUESTA_3_1, RESPUESTA_4, RESPUESTA_4_1, RESPUESTA_5, RESPUESTA_5_1, RESPUESTA_6, RESPUESTA_6_1, RESPUESTA_7, RESPUESTA_7_1, RESPUESTA_8, RESPUESTA_8_1, RESPUESTA_9, RESPUESTA_9_1, RESPUESTA_10, RESPUESTA_10_1, ATRIBUTO_NPS, ATRIBUTO_CES, ATRIBUTO_INS) "
                . "SELECT VCC, CampaignId, '$IdCliente', '$contactAddress', '$interactionId', ImportId, '$Agent', '$level1', '$level2', '$level3', '$mangementCode', '', '$time', '$Tmstmp', $intentos, '$FechaAgendamiento', '$TelefonoAd', '$Observaciones', ID, CODIGO_CAMPANIA, NOMBRE_CAMPANIA, NOMBRE_COOPERATIVA, IDENTIFICACION, NOMBRE_CLIENTE, ESTADO_SOCIO, CODIGO, FECHA_SOLICITUD, NUMERO_SOLICITUD, ESTADO_SOLICITUD, NUMERO_SOCIO, NUMERO_CUENTA, NUMERO_TC, AGENCIA, EDAD, FECHA_NACIMIENTO, ESTADO_CIVIL, SEXO, PROVINCIA_DOMICILIO, CIUDAD_DOMICILIO, DIRECCION_DOMICILIO, PROVINCIA_TRABAJO, CIUDAD_TRABAJO, DIRECCION_TRABAJO, ACTIVIDAD_ECONOMICA, CORREO, TIPO_EMPLEADO, INGRESOS, ACTIVOS, EGRESOS, PASIVOS, PRODUCTO, TIPO_CRD, MONTO_MAXIMO_CRD, PLAZO_CRD, TASA_CRD, DESTINO_DETALLADO, NEGOCIACION, FECHA_MODIFICACION, OFICIAL_CUENTA, ESTADO_DESEMBOLSO, COMENTARIOS, TIPO_TC, FAMILIA_TC, MARCA_TC, PLAN_RECOMPENSAS, CUPO_TC, CUPO_MAXIMO_TC, CUPO_DISPONIBLE_TC, PRIORIDAD_GESTION, NOMBRE1, NOMBRE2, APELLIDO1, APELLIDO2, '$pregunta1', '$pregunta1_1', '$pregunta2','$pregunta2_1','$pregunta3','$pregunta3_1','$pregunta4','$pregunta4_1','$pregunta5','$pregunta5_1','$pregunta6','$pregunta6_1','$pregunta7','$pregunta7_1','$pregunta8','$pregunta8_1','$pregunta9','$pregunta9_1','$pregunta10','$pregunta10_1','$respuesta1','$respuesta1_1','$respuesta2','$respuesta2_1','$respuesta3','$respuesta3_1','$respuesta4','$respuesta4_1','$respuesta5','$respuesta5_1','$respuesta6','$respuesta6_1','$respuesta7','$respuesta7_1','$respuesta8','$respuesta8_1','$respuesta9','$respuesta9_1','$respuesta10','$respuesta10_1', '$ATRIBUTO_NPS', '$ATRIBUTO_CES', '$ATRIBUTO_INS'  "
                . "FROM cooperativasventas.clientes where Id = '$IdCliente' ";
        return ejecutarConsulta12($sql);
    }

    function updateGestionFinalCEM($IdCliente, $contactAddress, $interactionId, $Agent, $level1, $level2, $level3, $mangementCode, $time, $Tmstmp, $intentos, $FechaAgendamiento, $TelefonoAd, $Observaciones, $pregunta1, $pregunta1_1, $pregunta2, $pregunta2_1, $pregunta3, $pregunta3_1, $pregunta4, $pregunta4_1, $pregunta5, $pregunta5_1, $pregunta6, $pregunta6_1, $pregunta7, $pregunta7_1, $pregunta8, $pregunta8_1, $pregunta9, $pregunta9_1, $pregunta10, $pregunta10_1,$respuesta1, $respuesta1_1, $respuesta2, $respuesta2_1, $respuesta3, $respuesta3_1, $respuesta4, $respuesta4_1, $respuesta5, $respuesta5_1, $respuesta6, $respuesta6_1, $respuesta7, $respuesta7_1, $respuesta8, $respuesta8_1, $respuesta9, $respuesta9_1, $respuesta10, $respuesta10_1, $ATRIBUTO_NPS, $ATRIBUTO_CES, $ATRIBUTO_INS) {
        $sql = "UPDATE cooperativasventas.gestionfinalcem SET ContactAddress = '$contactAddress', InteractionId = '$interactionId',"
                . "Agent = '$Agent', ResultLevel1 = '$level1', ResultLevel2 = '$level2', ResultLevel3 = '$level3', ManagementResultDescription = '', "
                . "ManagementResultCode = '$mangementCode', StartedManagement = '$time', TmStmp = '$Tmstmp', Intentos = '$intentos', FechaAgendamiento = '$FechaAgendamiento', "
                . "Telefono2 = '$TelefonoAd', Observaciones = '$Observaciones', PREGUNTA_1='$pregunta1',PREGUNTA_1_1='$pregunta1_1',PREGUNTA_2='$pregunta2',PREGUNTA_2_1='$pregunta2_1',PREGUNTA_3='$pregunta3',PREGUNTA_3_1='$pregunta3_1',PREGUNTA_4='$pregunta4',PREGUNTA_4_1='$pregunta4_1',PREGUNTA_5='$pregunta5',PREGUNTA_5_1='$pregunta5_1',PREGUNTA_6='$pregunta6',PREGUNTA_6_1='$pregunta6_1',PREGUNTA_7='$pregunta7',PREGUNTA_7_1='$pregunta7_1',PREGUNTA_8='$pregunta8',PREGUNTA_8_1='$pregunta8_1',PREGUNTA_9='$pregunta9',PREGUNTA_9_1='$pregunta9_1',PREGUNTA_10='$pregunta10',PREGUNTA_10_1='$pregunta10_1', RESPUESTA_1='$respuesta1',RESPUESTA_1_1='$respuesta1_1',RESPUESTA_2='$respuesta2',RESPUESTA_2_1='$respuesta2_1',RESPUESTA_3='$respuesta3',RESPUESTA_3_1='$respuesta3_1',RESPUESTA_4='$respuesta4',RESPUESTA_4_1='$respuesta4_1',RESPUESTA_5='$respuesta5',RESPUESTA_5_1='$respuesta5_1',RESPUESTA_6='$respuesta6',RESPUESTA_6_1='$respuesta6_1',RESPUESTA_7='$respuesta7',RESPUESTA_7_1='$respuesta7_1',RESPUESTA_8='$respuesta8',RESPUESTA_8_1='$respuesta8_1',RESPUESTA_9='$respuesta9',RESPUESTA_9_1='$respuesta9_1',RESPUESTA_10='$respuesta10',RESPUESTA_10_1='$respuesta10_1', ATRIBUTO_NPS='$ATRIBUTO_NPS', ATRIBUTO_CES='$ATRIBUTO_CES', ATRIBUTO_INS='$ATRIBUTO_INS' "
                . "where ContactId = '$IdCliente' ";
        return ejecutarConsulta12($sql);
    }
    function insertGestionHistoricaCEM($IdCliente) { //mostrar todos los registros
        $sql = "insert into cooperativasventas.gestionhistoricacem select * from cooperativasventas.gestionfinalcem where Id = '$IdCliente' ";
        return ejecutarConsulta12($sql);
    }
}

?>