<?php

require '../config/connection.php';

Class User {

    public function _construct() { /* Constructor */
    }

    function selectAll() { //mostrar todos los registros
        $sql = "SELECT u.IdUser, u.Id, u.Identification, u.Name1, u.Name2, u.Surname1, u.Surname2, u.dateBirth, u.Password, u.Address, 
                u.ContacAddress, u.ContacAddress1, u.Email, u.State, w.Description 'UserGroup',
                case when u.State = 1 then 'ACTIVO' else 'INACTIVO' end 'State'  
                FROM user u, workgroup w
                where u.UserGroup = w.Id and u.state = 1 ";
        return ejecutarConsulta($sql);
    }
    
    function selectAll_1() { //mostrar todos los registros
        $sql = "SELECT u.IdUser, u.Id, u.Identification, u.Name1, u.Name2, u.Surname1, u.Surname2, u.dateBirth, u.Password, u.Address, 
                u.ContacAddress, u.ContacAddress1, u.Email, u.State, w.Description 'UserGroup',
                case when u.State = 1 then 'ACTIVO' else 'INACTIVO' end 'State'  
                FROM user u, workgroup w
                where u.UserGroup = w.Id and u.state = 0";
        return ejecutarConsulta($sql);
    }

    function insert($usuario, $identificacion, $Name1, $Name2, $Surname1, $Surname2, $country, $city, $gender, $fecha, $clave, $adress, $celular, $telefono, $email, $state, $userId, $date, $userGroup) { //inserción de datos
        $sql = "INSERT INTO user(Id, VCC, Identification, Name1, Name2, Surname1, Surname2, Gender, Country, City, dateBirth, Password, Address, ContacAddress, ContacAddress1, Email, State, UserGroup, UserCreate, TmStmpCreate) VALUES "
                . "('$usuario','1','$identificacion','$Name1','$Name2','$Surname1','$Surname2','$gender','$country','$city','$fecha','$clave','$adress','$celular','$telefono','$email','$state','$userGroup','$userId','$date')";
        return ejecutarConsulta($sql);
    }

    function update($IdUser, $identificacion, $Name1, $Name2, $Surname1, $Surname2, $country, $city, $gender, $fecha, $clave, $adress, $celular, $telefono, $email, $state, $userId, $date, $userGroup) { //actualización de datos
        $sql = "UPDATE user SET Identification='$identificacion',Name1='$Name1',Name2='$Name2',Surname1='$Surname1',Surname2='$Surname2', Gender='$gender',Country='$country',City='$city',dateBirth='$fecha',Password='$clave',Address='$adress',ContacAddress='$celular',ContacAddress1='$telefono',Email='$email',State='$state',UserGroup='$userGroup',UserShift='$userId',TmStmpShift='$date' WHERE IdUser = '$IdUser'";
        return ejecutarConsulta($sql);
    }

    function desactivate($userId, $date, $IdUser) { //eliminación lógica
        $sql = "UPDATE user SET UserShift='$userId',TmStmpShift='$date',State='0' WHERE IdUser = '$IdUser'";
        return ejecutarConsulta($sql);
    }

    function active($userId, $date, $IdUser) { //activación lógica
        $sql = "UPDATE user SET UserShift='$userId', TmStmpShift='$date', State='1' WHERE IdUser = '$IdUser'";
        return ejecutarConsulta($sql);
    }

    function selectById($IdUser) { //mostrar un registro
        $sql = "SELECT * FROM user where IdUser = '$IdUser'";
        return ejecutarConsultaSimple($sql);
    }

    function encriptar($texto) {
        $key = '';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($texto, 'aes-256-cbc', $key, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }

    function desencriptar($texto) {
        $key = '';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
        list($encrypted_data, $iv) = explode('::', base64_decode($texto), 2);
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
    }

}

?>