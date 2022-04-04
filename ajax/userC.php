<?php

session_start();

require '../models/userM.php';
$user = new User();
date_default_timezone_set("America/Lima");
$date = date('Y-m-d H:i:s');
$userId = $_SESSION['usu'];

$Id = isset($_POST["Id"]) ? LimpiarCadena($_POST["Id"]) : "";
$IdUser = isset($_POST["IdUser"]) ? LimpiarCadena($_POST["IdUser"]) : "";
$identificacion = isset($_POST["identificacion"]) ? LimpiarCadena($_POST["identificacion"]) : "";
$Name1 = isset($_POST["Name1"]) ? LimpiarCadena($_POST["Name1"]) : "";
$Name2 = isset($_POST["Name2"]) ? LimpiarCadena($_POST["Name2"]) : "";
$Surname1 = isset($_POST["Surname1"]) ? LimpiarCadena($_POST["Surname1"]) : "";
$Surname2 = isset($_POST["Surname2"]) ? LimpiarCadena($_POST["Surname2"]) : "";
$country = isset($_POST["country"]) ? LimpiarCadena($_POST["country"]) : "";
$city = isset($_POST["city"]) ? LimpiarCadena($_POST["city"]) : "";
$gender = isset($_POST["gender"]) ? LimpiarCadena($_POST["gender"]) : "";
$fecha = isset($_POST["fecha"]) ? LimpiarCadena($_POST["fecha"]) : "";
$adress = isset($_POST["adress"]) ? LimpiarCadena($_POST["adress"]) : "";
$celular = isset($_POST["celular"]) ? LimpiarCadena($_POST["celular"]) : "";
$telefono = isset($_POST["telefono"]) ? LimpiarCadena($_POST["telefono"]) : "";
$email = isset($_POST["correo"]) ? LimpiarCadena($_POST["correo"]) : "";
$password = isset($_POST["Password"]) ? LimpiarCadena($_POST["Password"]) : "";
$userGroup = isset($_POST["UserGroup"]) ? LimpiarCadena($_POST["UserGroup"]) : "";
$state = '1';

switch ($_GET["action"]) {
    case 'selectAll':
        $respuesta = $user->selectAll(); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            if ($user->desencriptar($registrar->Id) != $userId) {
                $datos[] = array(/* llena los resultados con los datos */
                    '<input type="checkbox" name="Id[\'' . $registrar->IdUser . '\']" id="Id[\'' . $registrar->IdUser . '\']" value="' . $registrar->IdUser . '" />',
                    '<center><li title="Editar" class="fa fa-edit" style="color: purple;" onclick="mostrar_uno(\'' . $registrar->IdUser . '\')"></i></center>',
                    "2" => $user->desencriptar($registrar->Id),
                    "3" => $registrar->Identification,
                    "4" => $registrar->Name1,
                    "5" => $registrar->Name2,
                    "6" => $registrar->Surname1,
                    "7" => $registrar->Surname2,
                    "8" => $registrar->UserGroup,
                    "9" => $registrar->State,
                );
            }
        }

        $resultados = array(
            "sEcho" => 1, /* informacion para la herramienta datatables */
            "iTotalRecords" => count($datos), /* envía el total de columnas a visualizar */
            "iTotalDisplayRecords" => count($datos), /* envia el total de filas a visualizar */
            "aaData" => $datos /* envía el arreglo completo que se llenó con el while */
        );
        echo json_encode($resultados);
        break;

    case 'selectAll_1':
        $respuesta = $user->selectAll_1(); /* llama a la función del modelo */
        $datos = Array(); /* crea un aray para guardar los resultados */
        while ($registrar = $respuesta->fetch_object()) { /* recorre el array */
            $datos[] = array(/* llena los resultados con los datos */
                '<input type="checkbox" name="Id[\'' . $registrar->IdUser . '\']" id="Id[\'' . $registrar->IdUser . '\']" value="' . $registrar->IdUser . '" />',
                '<center><li title="Editar" class="fa fa-edit" style="color: purple;" onclick="mostrar_uno(\'' . $registrar->IdUser . '\')"></i></center>',
                "2" => $user->desencriptar($registrar->Id),
                "3" => $registrar->Identification,
                "4" => $registrar->Name1,
                "5" => $registrar->Name2,
                "6" => $registrar->Surname1,
                "7" => $registrar->Surname2,
                "8" => $registrar->UserGroup,
                "9" => $registrar->State,
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

    case 'activar':
        foreach ($_POST["Ids"] as $IdUser) {
            $result = ejecutarConsulta("SELECT IdUser FROM user WHERE IdUser = '$IdUser' ");
            $data = mysqli_fetch_array($result, MYSQLI_BOTH);
            if ($data['IdUser'] == '') {
                echo("Usuario no encontrado");
            } else {
                $respuesta = $user->active($userId, $date, $IdUser);
            }
        }
        echo $respuesta ? "Usuario restaurado" : "Error: usuario no se pudo restaurar";
        break;

    case 'inactivar':
        foreach ($_POST["Ids"] as $IdUser) {
            $result = ejecutarConsulta("SELECT IdUser FROM user WHERE IdUser = '$IdUser' ");
            $data = mysqli_fetch_array($result, MYSQLI_BOTH);
            if ($data['IdUser'] == '') {
                echo("Usuario no encontrado");
            } else {
                $respuesta = $user->desactivate($userId, $date, $IdUser);
            }
        }
        echo $respuesta ? "Usuarios eliminados" : "Error: usuarios no se pudieron eliminar";
        break;

    case 'selectById':
        $respuesta = $user->selectById($IdUser);
        echo json_encode($respuesta); /* envia los datos a mostrar mediante json */
        break;

    case 'desencriptarUser':
        $texto = isset($_POST["usu"]) ? LimpiarCadena1($_POST["usu"]) : "";
        $respuesta = $user->desencriptar($texto);
        echo $respuesta;
        break;

    case 'desencriptarPass':
        $texto = isset($_POST["pass"]) ? LimpiarCadena1($_POST["pass"]) : "";
        $respuesta = $user->desencriptar($texto);
        echo $respuesta;
        break;

    case 'validarUsuario':
        $IdUsers = isset($_POST["IdUser"]) ? LimpiarCadena1($_POST["IdUser"]) : "";
        $data = ejecutarConsulta("SELECT ID FROM USER");

        while ($row = mysqli_fetch_array($data, MYSQLI_BOTH)) {
            if ($IdUsers == $user->desencriptar($row["ID"])) {
                echo 'Generar otro usuario';
            }
        }
        break;

    case 'generateUser':
        $name = isset($_POST["name"]) ? LimpiarCadena1($_POST["name"]) : "";
        $surname = isset($_POST["surname"]) ? LimpiarCadena1($_POST["surname"]) : "";
        $usuario = strtoupper(substr($name, 0, 1)) . strtolower($surname) . substr(rand() . "\n", 0, 1);
        echo $usuario;
        break;

    case 'generatePass':
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $contraseña = $randomString . substr(rand() . "\n", 0, 3);
        echo $contraseña;
        break;

    case 'save':
        $texto1 = $Id;
        $texto2 = $password;
        $usuario = $user->encriptar($texto1);
        $clave = $user->encriptar($texto2);

        $validate = ejecutarConsulta("select IdUser from user where IdUser = '$IdUser'");
        $valid = mysqli_fetch_array($validate, MYSQLI_BOTH);
        $numRowC = $validate->num_rows;
        if ($numRowC == 0 || $numRowC == '') {
            $respuesta = $user->insert($usuario, $identificacion, $Name1, $Name2, $Surname1, $Surname2, $country, $city, $gender, $fecha, $clave, $adress, $celular, $telefono, $email, $state, $userId, $date, $userGroup);
            echo $respuesta ? "Usuario registrado" : "Error: usuario no se pudo registrar";
        } else {
            $respuesta = $user->update($IdUser, $identificacion, $Name1, $Name2, $Surname1, $Surname2, $country, $city, $gender, $fecha, $clave, $adress, $celular, $telefono, $email, $state, $userId, $date, $userGroup);
            echo $respuesta ? "Usuario actualizado" : "Error: usuario no se pudo actualizar";
        }
        break;
}
?>

