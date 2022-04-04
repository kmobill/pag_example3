var tabla;
var tablaTCA;
var id;
function init() { /* función inicial */
    mostrar_formulario(false);
    mostrar_todos();
    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
    //divs y paneles a ocultar
    $('#pnlProductos').hide();
    $('#pnlApertura').hide();
    $('#pnlBonos1').hide();
    $('#pnlBonos2').hide();
    $('#otro').attr('disabled', true);
    $('#subestatus1').attr('disabled', true);
    $('#subestatus2').attr('disabled', true);
}

function limpiar_formulario() {
    document.getElementById("formulario").reset();
    $("#titulo").text("Campaña Banco Pichincha Pasivos");
    $("#titulo1").text("");
    $("#titulo2").text("");
    $('#txtMontoIncremento1').val("");
    $('#txtMontoIncremento2').val("");
    $('#cmbBono1').val("");
    $('#cmbBono2').val("");
    $('#txtTelefono').val("");
    $("#txtCorreo").val("");
    $("#txtMonto").val("");
    $("#txtCiudad").val("");
}

function cancelar_formulario() { /* función para cancelar la operación */
    limpiar_formulario();
    mostrar_formulario(false);
    $("#titulo").text("Campaña Banco Pichincha Pasivos");
    $("#titulo1").text("");
    $("#titulo2").text("");
}

function mostrar_formulario(flag) { /* muestra u oculta el formulario segun la validación del bool (flag) */
    limpiar_formulario();
    if (flag) {
        $("#listadoRegistros").hide();
        $("#formularioRegistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnAgregar").hide();
    } else {
        $("#listadoRegistros").show();
        $("#formularioRegistros").hide();
        $("#btnAgregar").show();
    }
}

function mostrar_todos() {
    tabla = $('#tblListado').dataTable({
        "lengthMenu": [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
        "aProcessing": true, /* activa el procesamiento de DataTables */
        "aServerSide": true, /* Paginación y filtrado realizado por el servidor */
        dom: '<Bl<f>rtip>', //Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/bpPasivosC.php?action=selectAllRec',
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "language": {
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
                "copyTitle": "Tabla Copiada",
                "copySuccess": {
                    _: '%d líneas copiadas',
                    1: '1 línea copiada'
                }
            }
        },
        "bDestroy": true,
        "iDisplayLength": 10, /* paginación */
        "order": [[0, "asc"]]
    }).DataTable();
    tabla.on('order.dt search.dt', function () {
        tabla.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }
    ).draw();
}

function mostrar_uno(Id) {
    $.post("../ajax/bpPasivosC.php?action=selectByIdRec", {Id: Id}, function (datos, estado) {
        datos = JSON.parse(datos);
        mostrar_formulario(true);
        $.ajax({
            type: "GET",
            url: '../ajax/funcionesGeneralesC.php?action=horaInicio',
            data: {camp: camp},
            success: function (r) {
                $('#horaInicio').val(r);
                $('#mostrarHora').html(r);
            }
        });
        $("#titulo").text(datos.NOMBRE_CAMPANIA);
        $("#titulo2").text(datos.NOMBRE_CLIENTE);
        if (datos.Intentos == 0) {
            $("#intentos").val(1);
        } else {
            var int = parseInt(datos.Intentos) + 1;
            $("#intentos").val(int);
        }
        var result = datos.ResultLevel1 + ' - ' + datos.ResultLevel2;
        if (result == "Pendiente - Pendiente") {
            $("#last").val("Registro sin gestión");
        } else {
            $("#last").val(datos.ResultLevel1 + ' - ' + datos.ResultLevel2);
        }
        $("#obs").val(datos.Observaciones);
        $("#agenda").val(datos.FechaAgendamiento);
        $("#IDC").val(datos.ID);
        $("#CAMPANIA").val(datos.CampaignId);
        $('#CODIGO_CAMPANIA').val(datos.CODIGO_CAMPANIA);
        $('#NOMBRE_CAMPANIA').val(datos.NOMBRE_CAMPANIA);
        $('#IDENTIFICACION').val(datos.IDENTIFICACION);
        $('#NOMBRE_CLIENTE').val(datos.NOMBRE_CLIENTE);
        $('#ZONA').val(datos.ZONA);
        $('#REGION').val(datos.REGION);
        $('#SUBSEGMENTO').val(datos.SUBSEGMENTO);
        $('#OFERTA').val(datos.OFERTA);
        $('#TIENE_AHORRO_FUTURO').val(datos.TIENE_AHORRO_FUTURO);
        $('#RANGO').val(datos.RANGO);
        $('#PREMIO_AL_FINAL_DEL_3ER_MES1').val(datos.PREMIO_AL_FINAL_DEL_3ER_MES1);
        $('#PREMIO_AL_FINAL_DEL_3ER_MES2').val(datos.PREMIO_AL_FINAL_DEL_3ER_MES2);
        $('#CUOTA_BP').val(datos.CUOTA_BP);
        $('#PRODUCTO_PREMIO').val(datos.PRODUCTO_PREMIO);
        $('#GRUPO').val(datos.GRUPO);
        $('#INCREMENTAL_EN_PASIVOS').val(datos.INCREMENTAL_EN_PASIVOS);
        $('#TIPO_TARJETA_MILLAS').val(datos.TIPO_TARJETA_MILLAS);
        $('#TASA_BENEFICIO_ADICIONAL_AHO_FUT').val(datos.TASA_BENEFICIO_ADICIONAL_AHO_FUT);
        $('#CONDICION_APORTE_MENSUAL_AHO_FUT').val(datos.CONDICION_APORTE_MENSUAL_AHO_FUT);
        $('#AGENCIA').val(datos.AGENCIA);
        $('#PROVINCIA_DOMICILIO').val(datos.PROVINCIA_DOMICILIO);
        $('#CIUDAD_DOMICILIO').val(datos.CIUDAD_DOMICILIO);
        $('#DIRECCION_DOMICILIO').val(datos.DIRECCION_DOMICILIO);
        $('#PROVINCIA_TRABAJO').val(datos.PROVINCIA_TRABAJO);
        $('#CIUDAD_TRABAJO').val(datos.CIUDAD_TRABAJO);
        $('#DIRECCION_TRABAJO').val(datos.DIRECCION_TRABAJO);
        $('#CORREO1').val(datos.CORREO1);
        $('#CORREOBAN').val(datos.CORREOBAN);
        var camp = datos.CampaignId;
        if (camp != "") {
            $.ajax({
                type: "GET",
                url: '../ajax/funcionesGeneralesC.php?action=estatus',
                data: {camp: camp},
                success: function (r) {
                    $('#level1').html(r);
                    $('#level2').val("");
                    $('#level3').val("");
                }
            });
        }
        var idC = datos.ID;
        if (idC != "") {
            $.ajax({
                type: "GET",
                url: '../ajax/funcionesGeneralesC.php?action=telefonos',
                data: {idC: idC},
                success: function (r) {
                    $('#fonos').html(r);
                }
            });
            $.ajax({
                url: '../ajax/funcionesGeneralesC.php?action=interactionIdOld',
                method: 'GET',
                data: {idC: idC},
                success: function (r) {
                    $('#interactionIdOld').val(r);
                    $('#interactionId').val("");
                }
            });
        }
    });
}

function copyToClipboard(elemento) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(elemento).text()).select();
    document.execCommand("copy");
    $temp.remove();
}

$("#level1").change(function () {
    var level1 = $("#level1 option:selected").text();
    var camp = $("#CAMPANIA").val();
    if (level1 != "") {
        $.ajax({
            type: "GET",
            url: '../ajax/funcionesGeneralesC.php?action=level2',
            data: {level1: level1, camp: camp},
            success: function (r) {
                $('#level2').html(r);
            }
        });
    }
    var text = $("#level1").val().substring(0, 3);
    if (text == "CU4") {
        $("#agenda").attr("readonly", false);
        $("#agenda").attr("required", true);
        $("#obs").attr("required", true);
    } else {
        $("#agenda").attr("readonly", true);
        $("#agenda").attr("required", false);
        $("#obs").attr("required", false);
    }
    if (text == "CU4" || text == "CU5" || text == "CU6" || text == "CU7" || text == "NU1" || text == "NU2") {
        $('#pnlApertura').hide();
        $('#txtTelefono').attr('required', false);
        $('#txtCorreo').attr('required', false);
        $('#txtMonto').attr('required', false);
        $('#txtCiudad').attr('required', false);
        $('#pnlApertura').hide();
        $('#pnlBonos1').hide();
        $('#cmbBono1').empty();
        $('#txtMontoIncremento1').attr('required', false);
        $('#cmbBono1').attr('required', false);
        $('#txtTelefono').attr('required', false);
        $('#txtCorreo').attr('required', false);
        $('#txtMonto').attr('required', false);
        $('#txtCiudad').attr('required', false);
        $('#txtTelefono').val("");
        $('#txtCorreo').val("");
        $('#txtMonto').val("");
        $('#txtCiudad').val("");
        $('#pnlBonos2').hide();
        $('#cmbBono2').empty();
        $('#txtMontoIncremento2').attr('required', false);
        $('#cmbBono2').attr('required', false);
    }
//    if (text == "CU5") {
//        $('#pnlProductos').show();
//        $('#producto').attr("required", true);
//    } else {
//        $('#pnlProductos').hide();
//        $('#producto').attr("required", false);
//        $('#listadoProd').attr('disabled', true);
//        $('#listadoProd').attr('required', false);
//        $('#otroProd').attr('required', false);
//        $('#otroProd').attr('readonly', true);
//        $('#otroProd').attr('required', false);
//    }
});

$("#level2").change(function () {
    var level1 = $("#level1 option:selected").text();
    var level2 = $("#level2 option:selected").text();
    var camp = $("#CAMPANIA").val();
    if (level1 !== "" && level2 !== "") {
        id = $.ajax({
            type: "GET",
            url: '../ajax/funcionesGeneralesC.php?action=code',
            data: {camp: camp, level1: level1, level2: level2},
            success: function (r) {
                $('#code').val(r);
                if (r == 4) {
                    $('#pnlApertura').hide();
                    $('#txtTelefono').attr('required', false);
                    $('#txtCorreo').attr('required', false);
                    $('#txtMonto').attr('required', false);
                    $('#txtCiudad').attr('required', false);
                    $('#pnlBonos1').show();
                    $('#cmbBono1').empty();
                    $('#txtMontoIncremento1').attr('required', false);
                    $('#cmbBono1').attr('required', false);
                    $('#pnlBonos2').hide();
                    $('#cmbBono2').empty();
                    $('#txtMontoIncremento2').attr('required', false);
                    $('#cmbBono2').attr('required', false);
                } else if ((r == 7) && $('#TIENE_AHORRO_FUTURO').val() == "APERTURAR") {
                    $('#pnlApertura').show();
                    $('#txtTelefono').attr('required', true);
                    $('#txtCorreo').attr('required', true);
                    $('#txtMonto').attr('required', true);
                    $('#txtCiudad').attr('required', true);
                    $('#pnlBonos1').hide();
                    $('#cmbBono1').empty();
                    $('#txtMontoIncremento1').attr('required', false);
                    $('#cmbBono1').attr('required', false);
                    $('#pnlBonos2').hide();
                    $('#cmbBono2').empty();
                    $('#txtMontoIncremento2').attr('required', false);
                    $('#cmbBono2').attr('required', false);
                } else if ((r == 8 || r == 9 || r == 10) && $('#TIENE_AHORRO_FUTURO').val() == "APERTURAR") {
                    $('#pnlApertura').show();
                    $('#txtTelefono').attr('required', true);
                    $('#txtCorreo').attr('required', true);
                    $('#txtMonto').attr('required', true);
                    $('#txtCiudad').attr('required', true);
                    $('#pnlBonos1').show();
                    $('#cmbBono1').empty();
                    $('#txtMontoIncremento1').attr('required', true);
                    $('#cmbBono1').attr('required', true);
                    $('#pnlBonos2').hide();
                    $('#cmbBono2').empty();
                    $('#txtMontoIncremento2').attr('required', false);
                    $('#cmbBono2').attr('required', false);
                } else if ((r == 4 || r == 7) && $('#TIENE_AHORRO_FUTURO').val() == "VIGENTE") {
                    $('#pnlApertura').hide();
                    $('#txtTelefono').attr('required', false);
                    $('#txtCorreo').attr('required', false);
                    $('#txtMonto').attr('required', false);
                    $('#txtCiudad').attr('required', false);
                    $('#pnlBonos1').show();
                    $('#cmbBono1').empty();
                    $('#txtMontoIncremento1').attr('required', true);
                    $('#cmbBono1').attr('required', true);
                    $('#pnlBonos2').hide();
                    $('#cmbBono2').empty();
                    $('#txtMontoIncremento2').attr('required', false);
                    $('#cmbBono2').attr('required', false);
                } else if ((r == 8 || r == 9 || r == 10) && $('#TIENE_AHORRO_FUTURO').val() == "VIGENTE") {
                    $('#pnlApertura').hide();
                    $('#txtTelefono').attr('required', false);
                    $('#txtCorreo').attr('required', false);
                    $('#txtMonto').attr('required', false);
                    $('#txtCiudad').attr('required', false);
                    $('#pnlBonos1').show();
                    $('#cmbBono1').empty();
                    $('#txtMontoIncremento1').attr('required', true);
                    $('#cmbBono1').attr('required', true);
                    $('#pnlBonos2').show();
                    $('#cmbBono2').empty();
                    $('#txtMontoIncremento2').attr('required', true);
                    $('#cmbBono2').attr('required', true);
                } else if (r == 2 || r == 3 || r == 5 || r == 6) {
                    $('#pnlApertura').hide();
                    $('#txtTelefono').attr('required', false);
                    $('#txtCorreo').attr('required', false);
                    $('#txtMonto').attr('required', false);
                    $('#txtCiudad').attr('required', false);
                    $('#pnlBonos1').show();
                    $('#cmbBono1').empty();
                    $('#txtMontoIncremento1').attr('required', true);
                    $('#cmbBono1').attr('required', true);
                    $('#pnlBonos2').hide();
                    $('#cmbBono2').empty();
                    $('#txtMontoIncremento2').attr('required', false);
                    $('#cmbBono2').attr('required', false);
                } else {
                    $('#pnlApertura').hide();
                    $('#pnlBonos1').hide();
                    $('#cmbBono1').empty();
                    $('#txtMontoIncremento1').attr('required', false);
                    $('#cmbBono1').attr('required', false);
                    $('#txtTelefono').attr('required', false);
                    $('#txtCorreo').attr('required', false);
                    $('#txtMonto').attr('required', false);
                    $('#txtCiudad').attr('required', false);
                    $('#txtTelefono').val("");
                    $('#txtCorreo').val("");
                    $('#txtMonto').val("");
                    $('#txtCiudad').val("");
                    $('#pnlBonos2').hide();
                    $('#cmbBono2').empty();
                    $('#txtMontoIncremento2').attr('required', false);
                    $('#cmbBono2').attr('required', false);
                }
            }
        });
    }
});

$('#txtMontoIncremento1').keyup(function () {
    var txt = $('#txtMontoIncremento1').val();
    console.log(txt);
    var grp = $('#GRUPO').val();
    console.log(grp);
    var prd = $('#OFERTA').val();
    console.log(prd);
    if (txt >= 1500 && txt <= 4000) {
        if (grp == "ELITE") {
            if (prd == "TARJETA") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "20000").text("20000").appendTo('#cmbBono1');
            } else if (prd == "CREDITO") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "100").text("100").appendTo('#cmbBono1');
            } else if (prd == "AHORROS") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "80").text("80").appendTo('#cmbBono1');
            } else {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
            }
        } else if (grp == "PREMIUM") {
            if (prd == "TARJETA") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "15000").text("15000").appendTo('#cmbBono1');
            } else if (prd == "CREDITO") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "80").text("80").appendTo('#cmbBono1');
            } else if (prd == "AHORROS") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "60").text("60").appendTo('#cmbBono1');
            } else {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
            }
        } else if (grp == "STANDARD") {
            if (prd == "TARJETA") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "10000").text("10000").appendTo('#cmbBono1');
            } else if (prd == "CREDITO") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "40").text("40").appendTo('#cmbBono1');
            } else if (prd == "AHORROS") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "50").text("50").appendTo('#cmbBono1');
            } else {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
            }
        } else {
            $('#cmbBono1').empty();
            $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
        }
    } else if (txt >= 4001 && txt <= 12000) {
        if (grp == "ELITE") {
            if (prd == "TARJETA") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "30000").text("30000").appendTo('#cmbBono1');
            } else if (prd == "CREDITO") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "120").text("120").appendTo('#cmbBono1');
            } else if (prd == "AHORROS") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "100").text("100").appendTo('#cmbBono1');
            } else {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
            }
        } else if (grp == "PREMIUM") {
            if (prd == "TARJETA") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "20000").text("20000").appendTo('#cmbBono1');
            } else if (prd == "CREDITO") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "100").text("100").appendTo('#cmbBono1');
            } else if (prd == "AHORROS") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "80").text("80").appendTo('#cmbBono1');
            } else {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
            }
        } else if (grp == "STANDARD") {
            if (prd == "TARJETA") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "15000").text("15000").appendTo('#cmbBono1');
            } else if (prd == "CREDITO") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "60").text("60").appendTo('#cmbBono1');
            } else if (prd == "AHORROS") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "60").text("60").appendTo('#cmbBono1');
            } else {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
            }
        } else {
            $('#cmbBono1').empty();
            $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
        }
    } else if (txt >= 12001 && txt <= 20000) {
        if (grp == "ELITE") {
            if (prd == "TARJETA") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "40000").text("40000").appendTo('#cmbBono1');
            } else if (prd == "CREDITO") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "140").text("140").appendTo('#cmbBono1');
            } else if (prd == "AHORROS") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "120").text("120").appendTo('#cmbBono1');
            } else {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
            }
        } else if (grp == "PREMIUM") {
            if (prd == "TARJETA") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "25000").text("25000").appendTo('#cmbBono1');
            } else if (prd == "CREDITO") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "120").text("120").appendTo('#cmbBono1');
            } else if (prd == "AHORROS") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "100").text("100").appendTo('#cmbBono1');
            } else {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
            }
        } else if (grp == "STANDARD") {
            if (prd == "TARJETA") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "17500").text("17500").appendTo('#cmbBono1');
            } else if (prd == "CREDITO") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "80").text("80").appendTo('#cmbBono1');
            } else if (prd == "AHORROS") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "70").text("70").appendTo('#cmbBono1');
            } else {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
            }
        } else {
            $('#cmbBono1').empty();
            $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
        }
    } else if (txt >= 20001 && txt <= 25000) {
        if (grp == "ELITE") {
            if (prd == "TARJETA") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "50000").text("50000").appendTo('#cmbBono1');
            } else if (prd == "CREDITO") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "160").text("160").appendTo('#cmbBono1');
            } else if (prd == "AHORROS") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "140").text("140").appendTo('#cmbBono1');
            } else {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
            }
        } else if (grp == "PREMIUM") {
            if (prd == "TARJETA") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "30000").text("30000").appendTo('#cmbBono1');
            } else if (prd == "CREDITO") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "140").text("140").appendTo('#cmbBono1');
            } else if (prd == "AHORROS") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "120").text("120").appendTo('#cmbBono1');
            } else {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
            }
        } else if (grp == "STANDARD") {
            if (prd == "TARJETA") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "20000").text("20000").appendTo('#cmbBono1');
            } else if (prd == "CREDITO") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "100").text("100").appendTo('#cmbBono1');
            } else if (prd == "AHORROS") {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "80").text("80").appendTo('#cmbBono1');
            } else {
                $('#cmbBono1').empty();
                $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
            }
        } else {
            $('#cmbBono1').empty();
            $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
        }
    } else {
        $('#cmbBono1').empty();
        $("<option></option>").attr("value", "NO ACCEDE A BONIFICACION").text("NO ACCEDE A BONIFICACION").appendTo('#cmbBono1');
    }
});

$('#cambioFecha').change(function () {
    if (!$(this).is(":checked")) {
        $('#txtCambio').val("NO");
        $('#fechaIncremento').attr('readonly', true);
        $('#fechaIncremento').attr('required', false);
    } else {
        $('#txtCambio').val("SI");
        $('#fechaIncremento').val("");
        $('#fechaIncremento').attr('readonly', false);
        $('#fechaIncremento').attr('required', true);
    }
});

$('#producto').change(function () {
    if ($('#producto').val() == "SI") {
        $('#listadoProd').attr('disabled', false);
        $('#listadoProd').attr('required', true);
    } else {
        $('#listadoProd').attr('disabled', true);
        $('#listadoProd').attr('required', false);
    }
});

$('#listadoProd').change(function () {
    if ($('#listadoProd').val() == "OTROS") {
        $('#otroProd').attr('readonly', false);
        $('#otroProd').attr('required', true);
    } else {
        $('#otroProd').attr('readonly', true);
        $('#otroProd').attr('required', false);
    }
});

$('#cbox2').change(function () {
    if ($(this).is(":checked")) {
        $('#otro').attr('disabled', false);
        $('#otro').attr('required', true);
    } else {
        $('#otro').attr('disabled', true);
        $('#otro').attr('required', false);
    }
});

$('#fonos').change(function () {
    $.ajax({
        url: '../ajax/funcionesGeneralesC.php?action=horaInicio',
        method: 'POST',
        success: function (r) {
            $('#horaInicioLlamada').val(r);
        }
    });
    var idC = $("#IDC").val();
    $.ajax({
        url: '../ajax/funcionesGeneralesC.php?action=interactionIdOld',
        method: 'GET',
        data: {idC: idC},
        success: function (r) {
            $('#interactionId').val(r);
        }
    });
});

$('#btnFonos').click(function () {
    $.ajax({
        url: '../ajax/funcionesGeneralesC.php?action=interactionId',
        method: 'POST',
        success: function (r) {
            $('#interactionId').val(r);
            var phones = $("#fonos option:selected").text();
            var estatusTel = $("#estatusTel option:selected").text();
            var horaInicioLlamada = $('#horaInicioLlamada').val();
            var interactionId = r;

            if (phones != "" && estatusTel != "") {
                var IDC = $("#IDC").val();
                $.ajax({
                    url: '../ajax/funcionesGeneralesC.php?action=updatePhones',
                    method: 'POST',
                    data: {
                        IDC: IDC,
                        fonos: phones,
                        estatusTel: estatusTel,
                        horaInicioLlamada: horaInicioLlamada,
                        interactionId: interactionId
                    },
                    success: function (r) {
                        bootbox.alert(r);
                        $.ajax({
                            type: "GET",
                            url: '../ajax/funcionesGeneralesC.php?action=telefonos',
                            data: {idC: IDC},
                            success: function (r) {
                                $('#fonos').html(r);
                            }
                        });
                        $('#estatusTel option:selected').prop('selected', false).find('option:first').prop('selected', true);
                    }
                });
            } else {
                bootbox.alert({
                    message: "Seleccione un número y estado para continuar!",
                    size: 'medium'

                });
            }
        }
    });
});

function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var InteractionIdOld = $("#interactionIdOld").val();
    var InteractionId = $("#interactionId").val();
    var estatus1 = $("#level1").val();
    var estatus2 = $("#level2").val();
    var idC = $("#IDC").val();
    var campania = $("#CAMPANIA").val();

    if (InteractionIdOld == '' && InteractionId == "" && estatus1 != 'NU2 INUBICABLES' && estatus2 != 'Cliente sin telefono') { //Registro gestionado con anterioridad sin almacenado de teléfono
        bootbox.alert("Almacene un número de teléfono para continuar!!");
    } else if (InteractionIdOld == '' && InteractionId == "" && estatus1 == 'NU2 INUBICABLES' && estatus2 == 'Cliente sin telefono') { //Registro que aún no tiene gestión
        var formData = new FormData($("#formulario")[0]);
        $.ajax({
            url: "../ajax/bpPasivosC.php?action=save",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                if (datos == 'Error: registro no se pudo almacenar' || datos == "Error: registro no se pudo actualizar" || datos == "Error de almacenamiento") {
                    e.preventDefault();
                    bootbox.alert("Por favor, intente almacenar nuevamente!");
                } else {
                    bootbox.alert(datos);
                    mostrar_formulario(false);
                    tabla.ajax.reload();
                    $("#btnGuardar").prop("disabled", true);
                }
            }
        });
    } else if (InteractionId == '' && estatus1 != 'DB') { //Registro gestionado con anterioridad sin almacenado de teléfono
        bootbox.alert("Almacene un número de teléfono para continuar!!");
    } else if ((InteractionIdOld == InteractionId) && estatus1 != 'DB') { //Registro gestionado con anterioridad sin almacenado de teléfono
        bootbox.alert("Almacene un número de teléfono para continuar!!!");
    } else if (estatus1 == 'DB') {//Registro gestionado con anterioridad que no debe almacenar teléfono por estar dados de baja
        $.ajax({
            url: '../ajax/funcionesGeneralesC.php?action=validarEstatus',
            method: 'GET',
            data: {
                idC: idC,
                campania: campania
            },
            success: function (r) {
                var value = r.substr(0, 4);
                if (value == "CU1 " || value == "CU2 " || value == "CU3 ") {
                    var formData = new FormData($("#formulario")[0]);
                    $.ajax({
                        url: "../ajax/bpPasivosC.php?action=save",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (datos) {
                            if (datos == 'Error: registro no se pudo almacenar' || datos == "Error: registro no se pudo actualizar" || datos == "Error de almacenamiento") {
                                e.preventDefault();
                                bootbox.alert("Por favor, intente almacenar nuevamente!");
                            } else {
                                bootbox.alert(datos);
                                mostrar_formulario(false);
                                tabla.ajax.reload();
                                $("#btnGuardar").prop("disabled", true);
                            }
                        }
                    });
                } else {
                    bootbox.alert("Este registro no necesita ser dado de baja!!!");
                }
            }
        });
    } else {
        $.ajax({
            url: '../ajax/funcionesGeneralesC.php?action=validarEstatus',
            method: 'GET',
            data: {
                idC: idC,
                campania: campania
            },
            success: function (r) {
                var value = r.substr(0, 4);
                if (value == "CU1 " || value == "CU2 " || value == "CU3 ") {
                    bootbox.alert("Solicitar a calidad dar de baja el registro!!!");
                } else {
                    var formData = new FormData($("#formulario")[0]);
                    $.ajax({
                        url: "../ajax/bpPasivosC.php?action=save",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (datos) {
                            if (datos == 'Error: registro no se pudo almacenar' || datos == "Error: registro no se pudo actualizar" || datos == "Error de almacenamiento") {
                                e.preventDefault();
                                bootbox.alert("Por favor, intente almacenar nuevamente!");
                            } else {
                                bootbox.alert(datos);
                                mostrar_formulario(false);
                                tabla.ajax.reload();
                                $("#btnGuardar").prop("disabled", true);
                            }
                        }
                    });
                }
            }
        });
    }
}

init(); /* ejecuta la función inicial */