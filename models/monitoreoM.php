<?php

require '../config/connection.php';

Class monitoreoM {

    public function _construct() { /* Constructor */
    }

    function selectAll() { //mostrar todos los registros
        $sql = "SELECT Id, AGENT, STATUS, IDENTIFICACION, FECHACALIFICACION, PRODUCTO, CAMPANIA, REGION, AGENCIA, AREA, 
                       SECCION, TRANSACCION, EVALUADOR, ESTADOMONITOREO, CRITERIO, TMA, CASE WHEN ESTADO = 1 THEN 'ACTIVO' ELSE 'INACTIVO' END AS ESTADO
                FROM monitoreo.calificaciones";
        return ejecutarConsulta($sql);
    }

    function insert($USUARIO, $FECHA_ATENCION, $ESTATUS, $IDENTIFICACION, $PRODUCTO, $CAMPANIA, $REGION, $AGENCIA, $AREA, $SECCION, $TRANSACCION, $userId, $date, $FECHA_CALIFICACION, $ESTADO_MONITOREO, $CRITERIO, $TMA, $SALUDO_1, $SALUDO_2, $SALUDO_3, $PRESENTACION_1, $PRESENTACION_2, $PRESENTACION_3, $CIERRE_1, $CIERRE_2, $CIERRE_3, $COMUNICACION_1, $COMUNICACION_2, $COMUNICACION_3, $COMUNICACION_4, $COMUNICACION_5, $ERRORES_CRITICOS_1, $ERRORES_CRITICOS_2, $ERRORES_CRITICOS_3, $ERRORES_CRITICOS_4, $ERRORES_CRITICOS_5, $ERRORES_CRITICOS_CUMPLIMIENTO_1, $ERRORES_CRITICOS_CUMPLIMIENTO_2, $ERRORES_CRITICOS_CUMPLIMIENTO_3, $ERRORES_CRITICOS_CUMPLIMIENTO_4, $ERRORES_CRITICOS_CUMPLIMIENTO_5, $MANEJO_GESTION, $MEJORAS, $Nota_ECUF, $Nota_ECN, $Nota_ENC, $TOTAL, $ESTADO) { //inserción de datos
        $sql = "INSERT INTO MONITOREO.calificaciones(Agent, FechaAtencion, Status, Identificacion, Producto, Campania, Region, Agencia, Area, Seccion, Transaccion, Evaluador, TmStmp, fechaCalificacion, EstadoMonitoreo, Criterio, TMA, Saludo1, Saludo2, Saludo3, Presentacion1, Presentacion2, Presentacion3, Cierre1, Cierre2, Cierre3, Comunicacion1, Comunicacion2, Comunicacion3, Comunicacion4, Comunicacion5, ErroresCriticos1, ErroresCriticos2, ErroresCriticos3, ErroresCriticos4, ErroresCriticos5, ErroresCriticosCumplimiento1, ErroresCriticosCumplimiento2, ErroresCriticosCumplimiento3, ErroresCriticosCumplimiento4, ErroresCriticosCumplimiento5, ManejoGestion, Mejoras, Nota_ECUF, Nota_ECN, Nota_ENC, Total, estado) VALUES "
                . "('$USUARIO', '$FECHA_ATENCION','$ESTATUS', '$IDENTIFICACION', '$PRODUCTO', '$CAMPANIA', '$REGION', '$AGENCIA', '$AREA', '$SECCION', '$TRANSACCION','$userId','$date','$FECHA_CALIFICACION','$ESTADO_MONITOREO','$CRITERIO','$TMA','$SALUDO_1','$SALUDO_2','$SALUDO_3','$PRESENTACION_1','$PRESENTACION_2','$PRESENTACION_3','$CIERRE_1','$CIERRE_2','$CIERRE_3','$COMUNICACION_1','$COMUNICACION_2','$COMUNICACION_3','$COMUNICACION_4','$COMUNICACION_5','$ERRORES_CRITICOS_1','$ERRORES_CRITICOS_2','$ERRORES_CRITICOS_3','$ERRORES_CRITICOS_4','$ERRORES_CRITICOS_5','$ERRORES_CRITICOS_CUMPLIMIENTO_1','$ERRORES_CRITICOS_CUMPLIMIENTO_2','$ERRORES_CRITICOS_CUMPLIMIENTO_3','$ERRORES_CRITICOS_CUMPLIMIENTO_4','$ERRORES_CRITICOS_CUMPLIMIENTO_5','$MANEJO_GESTION','$MEJORAS','$Nota_ECUF','$Nota_ECN','$Nota_ENC','$TOTAL','$ESTADO')";
        return ejecutarConsulta($sql);
    }

    function update($Id, $USUARIO, $FECHA_ATENCION, $ESTATUS, $IDENTIFICACION, $PRODUCTO, $CAMPANIA, $REGION, $AGENCIA, $AREA, $SECCION, $TRANSACCION, $userId, $date, $ESTADO_MONITOREO, $CRITERIO, $TMA, $SALUDO_1, $SALUDO_2, $SALUDO_3, $PRESENTACION_1, $PRESENTACION_2, $PRESENTACION_3, $CIERRE_1, $CIERRE_2, $CIERRE_3, $COMUNICACION_1, $COMUNICACION_2, $COMUNICACION_3, $COMUNICACION_4, $COMUNICACION_5, $ERRORES_CRITICOS_1, $ERRORES_CRITICOS_2, $ERRORES_CRITICOS_3, $ERRORES_CRITICOS_4, $ERRORES_CRITICOS_5, $ERRORES_CRITICOS_CUMPLIMIENTO_1, $ERRORES_CRITICOS_CUMPLIMIENTO_2, $ERRORES_CRITICOS_CUMPLIMIENTO_3, $ERRORES_CRITICOS_CUMPLIMIENTO_4, $ERRORES_CRITICOS_CUMPLIMIENTO_5, $MANEJO_GESTION, $MEJORAS, $Nota_ECUF, $Nota_ECN, $Nota_ENC, $TOTAL, $ESTADO) { //actualización de datos
        $sql = "UPDATE monitoreo.calificaciones SET Agent='$USUARIO',fechaCalificacion='$date',FechaAtencion='$FECHA_ATENCION',Status='$ESTATUS',Identificacion='$IDENTIFICACION',Producto='$PRODUCTO',Campania='$CAMPANIA',Region='$REGION',Agencia='$AGENCIA',Area='$AREA',Seccion='$SECCION',Transaccion='$TRANSACCION',Evaluador='$userId',EstadoMonitoreo='$ESTADO_MONITOREO',Criterio='$CRITERIO',TMA='$TMA',Saludo1='$SALUDO_1',Saludo2='$SALUDO_2',Saludo3='$SALUDO_3',Presentacion1='$PRESENTACION_1',Presentacion2='$PRESENTACION_2',Presentacion3='$PRESENTACION_3',Cierre1='$CIERRE_1',Cierre2='$CIERRE_2',Cierre3='$CIERRE_3',Comunicacion1='$COMUNICACION_1',Comunicacion2='$COMUNICACION_2',Comunicacion3='$COMUNICACION_3',Comunicacion4='$COMUNICACION_4',Comunicacion5='$COMUNICACION_5',ErroresCriticos1='$ERRORES_CRITICOS_1',ErroresCriticos2='$ERRORES_CRITICOS_2',ErroresCriticos3='$ERRORES_CRITICOS_3',ErroresCriticos4='$ERRORES_CRITICOS_4',ErroresCriticos5='$ERRORES_CRITICOS_5',ErroresCriticosCumplimiento1='$ERRORES_CRITICOS_CUMPLIMIENTO_1',ErroresCriticosCumplimiento2='$ERRORES_CRITICOS_CUMPLIMIENTO_2',ErroresCriticosCumplimiento3='$ERRORES_CRITICOS_CUMPLIMIENTO_3',ErroresCriticosCumplimiento4='$ERRORES_CRITICOS_CUMPLIMIENTO_4',ErroresCriticosCumplimiento5='$ERRORES_CRITICOS_CUMPLIMIENTO_5',ManejoGestion='$MANEJO_GESTION',Mejoras='$MEJORAS',Nota_ECUF='$Nota_ECUF',Nota_ECN='$Nota_ECN',Nota_ENC='$Nota_ENC',Total='$TOTAL',estado='$ESTADO' WHERE Id = '$Id'";
        return ejecutarConsulta($sql);
    }

    function desactivate($Id) { //eliminación lógica
        $sql = "UPDATE monitoreo.calificaciones SET State= '0' WHERE Id = '$Id'";
        return ejecutarConsulta($sql);
    }

    function active($Id) { //activación lógica
        $sql = "UPDATE monitoreo.calificaciones SET State= '1' WHERE Id = '$Id'";
        return ejecutarConsulta($sql);
    }

    function selectById($Id) { //mostrar un registro
        $sql = "SELECT * FROM monitoreo.calificaciones where id = '$Id'";
        return ejecutarConsultaSimple($sql);
    }
    
    function insertCalificacionHistorica($IDC) { //mostrar todos los registros
        $sql = "insert into monitoreo.calificacioneshistorico select * from monitoreo.calificaciones where id = '$IDC' ";
        return ejecutarConsulta11($sql);
    }

}

?>