<?php

session_start();

require '../models/bpComunicacionM.php';
$camp = new bpComunicacionM();
date_default_timezone_set("America/Lima");

$Agent = $_SESSION['usu'];
$rol = $_SESSION['workgroup'];
$Tmstmp = date('Y-m-d H:i:s');
$date = date('Y-m-d');


$Observaciones = isset($_POST["obs"]) ? LimpiarCadena10($_POST["obs"]) : "";

switch ($_GET["action"]) {
    case 'rol':
        echo $rol;
        break;

    case 'mensajes':
        $type = 'self';
        $INDEX = 0;
        $respuesta = ejecutarConsulta("select message from cck.chat where tmstmp like '$date%'");
        while ($registrar = mysqli_fetch_array($respuesta, MYSQLI_BOTH)) { /* recorre el array */
            $INDEX++;
            $str = "<div id='cm-msg-$INDEX' class='chat-msg $type'>"
                    . "<div class=\"cm-msg-text\">"
                    . $registrar['message']
                    . "</div>"
                    . "</div>";
            echo $str;
        }
        break;
    
    case 'tiempoEspera':
        $respuesta = ejecutarConsultaSimple("select tmstmp from cck.chat where tmstmp like '$date%' order by tmstmp desc limit 1");
        $fechaUltimoSMS = $respuesta["tmstmp"];
        $tiempo = ejecutarConsultaSimple("SELECT TIMESTAMPDIFF(MINUTE,'$Tmstmp', '$fechaUltimoSMS') AS MINUTO");
        echo $tiempo["MINUTO"];
        break;

    case 'save':
        $mensaje = isset($_POST["msg"]) ? LimpiarCadena14($_POST["msg"]) : "";
        $insertar = ejecutarConsulta("INSERT INTO chat(Message, TmStmp) VALUES ('$mensaje','$Tmstmp')");
        echo $insertar ? "Exitoso":"No exitoso";
        break;
}
?>