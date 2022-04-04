<?php

session_start();
require '../config/connection.php';
date_default_timezone_set("America/Lima");
$dateNow = date('Y-m-d H:i:s');

switch ($_GET["action"]) {

    case 'enriquecimientoNumeros':
        if (substr($_FILES['excel']['name'], -3) === "csv") {
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 0);
            set_time_limit(0);
            $fecha = date('Y-m-d');
            $hora = time();
            $carpeta = "../documents/";
            $excel = $fecha . "_" . $hora . "_" . $_FILES['excel']['name'];
            move_uploaded_file($_FILES['excel']['tmp_name'], "$carpeta$excel");
            $row = 0; //variable que permite discriminar el encabezado del archivo csv
            $fp = fopen("$carpeta$excel", "r"); //abrir archivo
            $users = $fp; //leo el archivo que contiene los datos del producto
            $nameExcel = isset($_POST["import"]) ? LimpiarCadena($_POST["import"]) : "";
            $campaignId = isset($_POST["campaign"]) ? LimpiarCadena($_POST["campaign"]) : "";
            while (($datos = fgetcsv($users, 100000, ";")) !== FALSE) {//Leo linea por linea del archivo hasta un maximo de 1000 caracteres por linea leida usando coma(,) o (;) como delimitador
                $row++;
                if ($row > 1) {
                    $linea[] = array(//Arreglo Bidimensional para guardar los datos de cada linea leida del archivo
                        'CAMPANIA' => utf8_encode($datos[0]),
                        'NOMBRE_IMPORTACION' => utf8_encode($datos[1]),
                        'CONTACTID' => utf8_encode($datos[2]),
                        'IDENTIFICACION' => utf8_encode($datos[3]),
                        'NOMBRE' => utf8_encode($datos[4]),
                        'TELEFONO_00' => utf8_encode($datos[5]),
                        'TELEFONO_01' => utf8_encode($datos[6]),
                        'TELEFONO_02' => utf8_encode($datos[7]),
                        'TELEFONO_03' => utf8_encode($datos[8]),
                        'TELEFONO_04' => utf8_encode($datos[9]),
                        'TELEFONO_05' => utf8_encode($datos[10]),
                        'TELEFONO_06' => utf8_encode($datos[11]),
                        'TELEFONO_07' => utf8_encode($datos[12]),
                        'TELEFONO_08' => utf8_encode($datos[13]),
                        'TELEFONO_09' => utf8_encode($datos[14]),
                        'TELEFONO_10' => utf8_encode($datos[15]),
                        'TELEFONO_11' => utf8_encode($datos[16]),
                        'TELEFONO_12' => utf8_encode($datos[17]),
                        'TELEFONO_13' => utf8_encode($datos[18]),
                        'TELEFONO_14' => utf8_encode($datos[19]),
                    );
                }
            }
            fclose($users); //Cierra el archivo
            $ingresado = 0; //Variable que almacenara los insert exitosos
            $error = 0; //Variable que almacenara los errores en almacenamiento
            $duplicado = 0; //Variable que almacenara los registros duplicados
            foreach ($linea as $indice => $value) { //Iteracion el array para extraer cada uno de los valores almacenados en cada items
                //Almacenamos info en contactimportcontact. Datos traidos del array para almacenar en la base
                $CAMPANIA = $value['CAMPANIA'];
                $NOMBRE_IMPORTACION = $value['NOMBRE_IMPORTACION'];
                $CONTACTID = $value['CONTACTID'];
                $IDENTIFICACION = $value['IDENTIFICACION'];
                $NOMBRE = $value['NOMBRE'];
                $TELEFONO_00 = $value['TELEFONO_00'];
                $TELEFONO_01 = $value['TELEFONO_01'];
                $TELEFONO_02 = $value['TELEFONO_02'];
                $TELEFONO_03 = $value['TELEFONO_03'];
                $TELEFONO_04 = $value['TELEFONO_04'];
                $TELEFONO_05 = $value['TELEFONO_05'];
                $TELEFONO_06 = $value['TELEFONO_06'];
                $TELEFONO_07 = $value['TELEFONO_07'];
                $TELEFONO_08 = $value['TELEFONO_08'];
                $TELEFONO_09 = $value['TELEFONO_09'];
                $TELEFONO_10 = $value['TELEFONO_10'];
                $TELEFONO_11 = $value['TELEFONO_11'];
                $TELEFONO_12 = $value['TELEFONO_12'];
                $TELEFONO_13 = $value['TELEFONO_13'];
                $TELEFONO_14 = $value['TELEFONO_14'];

                if ($CONTACTID != '') {
                    if ($TELEFONO_00 != '') {
                        $vTELEFONO_00 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_00','','SG','$dateNow','$dateNow','TELEFONO_00','$IDENTIFICACION')");
                        if ($vTELEFONO_00 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_00 == false || $vTELEFONO_00 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                    if ($TELEFONO_01 != '') {
                        $vTELEFONO_01 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_01','','SG','$dateNow','$dateNow','TELEFONO_01','$IDENTIFICACION')");
                        if ($vTELEFONO_01 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_01 == false || $vTELEFONO_01 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                    if ($TELEFONO_02 != '') {
                        $vTELEFONO_02 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_02','','SG','$dateNow','$dateNow','TELEFONO_02','$IDENTIFICACION')");
                        if ($vTELEFONO_02 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_02 == false || $vTELEFONO_02 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                    if ($TELEFONO_03 != '') {
                        $vTELEFONO_03 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_03','','SG','$dateNow','$dateNow','TELEFONO_03','$IDENTIFICACION')");
                        if ($vTELEFONO_03 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_03 == false || $vTELEFONO_03 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                    if ($TELEFONO_04 != '') {
                        $vTELEFONO_04 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_04','','SG','$dateNow','$dateNow','TELEFONO_04','$IDENTIFICACION')");
                        if ($vTELEFONO_04 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_04 == false || $vTELEFONO_04 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                    if ($TELEFONO_05 != '') {
                        $vTELEFONO_05 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_05','','SG','$dateNow','$dateNow','TELEFONO_05','$IDENTIFICACION')");
                        if ($vTELEFONO_05 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_05 == false || $vTELEFONO_05 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                    if ($TELEFONO_06 != '') {
                        $vTELEFONO_06 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_06','','SG','$dateNow','$dateNow','TELEFONO_06','$IDENTIFICACION')");
                        if ($vTELEFONO_06 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_06 == false || $vTELEFONO_06 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                    if ($TELEFONO_07 != '') {
                        $vTELEFONO_07 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_07','','SG','$dateNow','$dateNow','TELEFONO_07','$IDENTIFICACION')");
                        if ($vTELEFONO_07 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_07 == false || $vTELEFONO_07 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                    if ($TELEFONO_08 != '') {
                        $vTELEFONO_08 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_08','','SG','$dateNow','$dateNow','TELEFONO_08','$IDENTIFICACION')");
                        if ($vTELEFONO_08 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_08 == false || $vTELEFONO_08 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                    if ($TELEFONO_09 != '') {
                        $vTELEFONO_09 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_09','','SG','$dateNow','$dateNow','TELEFONO_09','$IDENTIFICACION')");
                        if ($vTELEFONO_09 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_09 == false || $vTELEFONO_09 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                    if ($TELEFONO_10 != '') {
                        $vTELEFONO_10 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_10','','SG','$dateNow','$dateNow','TELEFONO_10','$IDENTIFICACION')");
                        if ($vTELEFONO_10 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_10 == false || $vTELEFONO_10 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                    if ($TELEFONO_11 != '') {
                        $vTELEFONO_11 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_11','','SG','$dateNow','$dateNow','TELEFONO_11','$IDENTIFICACION')");
                        if ($vTELEFONO_11 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_11 == false || $vTELEFONO_11 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                    if ($TELEFONO_12 != '') {
                        $vTELEFONO_12 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_12','','SG','$dateNow','$dateNow','TELEFONO_12','$IDENTIFICACION')");
                        if ($vTELEFONO_12 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_12 == false || $vTELEFONO_12 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                    if ($TELEFONO_13 != '') {
                        $vTELEFONO_13 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_13','','SG','$dateNow','$dateNow','TELEFONO_13','$IDENTIFICACION')");
                        if ($vTELEFONO_13 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_13 == false || $vTELEFONO_13 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                    if ($TELEFONO_14 != '') {
                        $vTELEFONO_14 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                . "VALUES ('$CONTACTID','','$TELEFONO_14','','SG','$dateNow','$dateNow','TELEFONO_14','$IDENTIFICACION')");
                        if ($vTELEFONO_14 == true) {
                            $ingresado += 1;
                        } else if ($vTELEFONO_14 == false || $vTELEFONO_14 == "") {
                            echo $msj = '<font color=red>Dato <b> ID: ' . $CONTACTID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                            $error += 1;
                        }
                    }
                } else {
                    $result = ejecutarConsulta("SELECT Id FROM `contactimportcontact` WHERE Campaign = '$CAMPANIA' and LastUpdate like '%$NOMBRE_IMPORTACION%' and Identification = '$IDENTIFICACION' and Action <> 'cancelar base'");
                    $numRow = $result->num_rows;
                    if ($numRow == 0) {
                        echo $msj = '<font color=purple>Dato <b>' . ' Identificación: ' . $IDENTIFICACION . ' Campaña: ' . $CAMPANIA . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no encontrado </font><br/>';
                    } else {
                        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                            $ID = $row['Id'];
                            if ($TELEFONO_00 != '') {
                                $vTELEFONO_00 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_00','','SG','$dateNow','$dateNow','TELEFONO_00','$Identification')");
                                if ($vTELEFONO_00 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_00 == false || $vTELEFONO_00 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                            if ($TELEFONO_01 != '') {
                                $vTELEFONO_01 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_01','','SG','$dateNow','$dateNow','TELEFONO_01','$IDENTIFICACION')");
                                if ($vTELEFONO_01 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_01 == false || $vTELEFONO_01 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                            if ($TELEFONO_02 != '') {
                                $vTELEFONO_02 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_02','','SG','$dateNow','$dateNow','TELEFONO_02','$IDENTIFICACION')");
                                if ($vTELEFONO_02 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_02 == false || $vTELEFONO_02 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                            if ($TELEFONO_03 != '') {
                                $vTELEFONO_03 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_03','','SG','$dateNow','$dateNow','TELEFONO_03','$IDENTIFICACION')");
                                if ($vTELEFONO_03 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_03 == false || $vTELEFONO_03 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                            if ($TELEFONO_04 != '') {
                                $vTELEFONO_04 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_04','','SG','$dateNow','$dateNow','TELEFONO_04','$IDENTIFICACION')");
                                if ($vTELEFONO_04 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_04 == false || $vTELEFONO_04 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                            if ($TELEFONO_05 != '') {
                                $vTELEFONO_05 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_05','','SG','$dateNow','$dateNow','TELEFONO_05','$IDENTIFICACION')");
                                if ($vTELEFONO_05 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_05 == false || $vTELEFONO_05 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                            if ($TELEFONO_06 != '') {
                                $vTELEFONO_06 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_06','','SG','$dateNow','$dateNow','TELEFONO_06','$IDENTIFICACION')");
                                if ($vTELEFONO_06 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_06 == false || $vTELEFONO_06 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                            if ($TELEFONO_07 != '') {
                                $vTELEFONO_07 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_07','','SG','$dateNow','$dateNow','TELEFONO_07','$IDENTIFICACION')");
                                if ($vTELEFONO_07 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_07 == false || $vTELEFONO_07 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                            if ($TELEFONO_08 != '') {
                                $vTELEFONO_08 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_08','','SG','$dateNow','$dateNow','TELEFONO_08','$IDENTIFICACION')");
                                if ($vTELEFONO_08 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_08 == false || $vTELEFONO_08 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                            if ($TELEFONO_09 != '') {
                                $vTELEFONO_09 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_09','','SG','$dateNow','$dateNow','TELEFONO_09','$IDENTIFICACION')");
                                if ($vTELEFONO_09 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_09 == false || $vTELEFONO_09 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                            if ($TELEFONO_10 != '') {
                                $vTELEFONO_10 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_10','','SG','$dateNow','$dateNow','TELEFONO_10','$IDENTIFICACION')");
                                if ($vTELEFONO_10 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_10 == false || $vTELEFONO_10 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                            if ($TELEFONO_11 != '') {
                                $vTELEFONO_11 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_11','','SG','$dateNow','$dateNow','TELEFONO_11','$IDENTIFICACION')");
                                if ($vTELEFONO_11 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_11 == false || $vTELEFONO_11 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                            if ($TELEFONO_12 != '') {
                                $vTELEFONO_12 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_12','','SG','$dateNow','$dateNow','TELEFONO_12','$IDENTIFICACION')");
                                if ($vTELEFONO_12 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_12 == false || $vTELEFONO_12 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                            if ($TELEFONO_13 != '') {
                                $vTELEFONO_13 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_13','','SG','$dateNow','$dateNow','TELEFONO_13','$IDENTIFICACION')");
                                if ($vTELEFONO_13 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_13 == false || $vTELEFONO_13 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                            if ($TELEFONO_14 != '') {
                                $vTELEFONO_14 = ejecutarConsulta("INSERT INTO contactimportphone(ContactId, InteractionId, NumeroMarcado, Agente, Estado, FechaHora, FechaHoraFin, DescripcionTelefono, IdentificacionCliente) "
                                        . "VALUES ('$ID','','$TELEFONO_14','','SG','$dateNow','$dateNow','TELEFONO_14','$IDENTIFICACION')");
                                if ($vTELEFONO_14 == true) {
                                    $ingresado += 1;
                                } else if ($vTELEFONO_14 == false || $vTELEFONO_14 == "") {
                                    echo $msj = '<font color=red>Dato <b> ID: ' . $ID . ' Identificación: ' . $IDENTIFICACION . ' Importación: ' . $NOMBRE_IMPORTACION . ' </b> no almacenado </font><br/>';
                                    $error += 1;
                                }
                            }
                        }
                    }
                }
            }
            echo "<b>El enriquecimiento de base $nameExcel tiene el siguiente detalle:</b><br/>";
            echo "<font color=green>" . $ingresado . " Datos almacenados con éxito<br/>";
            echo "<font color=red>" . $error . " Errores de almacenamiento o no encontrados<br/>";
        }
        break;
}
?>