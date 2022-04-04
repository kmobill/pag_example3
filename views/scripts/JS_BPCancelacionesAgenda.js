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
    $('#pnlCancelaciones').hide();
    $('#otro').attr('disabled', true);
    $('#subestatus1').attr('disabled', true);
    $('#subestatus2').attr('disabled', true);
    $('#pregunta1_1').hide();
    $('#respuesta1_1').hide();
    $('#respuesta1_2').hide();
}

function limpiar_formulario() {
//    document.getElementById("formulario").reset();
    $("#titulo").text("Campaña Banco Pichincha Cancelaciones");
    $("#titulo1").text("");
    $("#titulo2").text("");
    $('#pnlCancelaciones').hide();
    $('#respuesta1').attr('required', false);
    $('#respuesta2').attr('required', false);
    $('#respuesta3').attr('required', false);
    $('#respuesta1_1').attr('required', false);
    $('#respuesta1_2').attr('readonly', true);
    $('#respuesta1_2').attr('required', false);
    $('#pregunta1_1').hide();
    $('#respuesta1_1').hide();
    $('#respuesta1_2').hide();
    $('#respuesta1').val("");
    $('#respuesta2').val("");
    $('#respuesta3').val("");
    $('#respuesta1_1').val("");
    $('#respuesta1_2').val("");
}

function cancelar_formulario() { /* función para cancelar la operación */
    limpiar_formulario();
    mostrar_formulario(false);
    $("#titulo").text("Campaña Banco Pichincha Cancelaciones");
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
            url: '../ajax/bpCancelacionesC.php?action=selectAllRec',
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
    $.post("../ajax/bpCancelacionesC.php?action=selectByIdRec", {Id: Id}, function (datos, estado) {
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
        $('#TARJETA_SOCIO').val(datos.TARJETA_SOCIO);
        $('#ESTADO').val(datos.ESTADO);
        $('#MARCA').val(datos.MARCA);
        $('#TIPO').val(datos.TIPO);
        $('#FAMILIA').val(datos.FAMILIA);
        $('#PRODUCTO').val(datos.PRODUCTO);
        $('#SUBSEGMENTO').val(datos.SUBSEGMENTO);
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
    var text1 = $("#level1").val().substring(0, 4);
    var text2 = $("#level1").val().substring(0, 2);
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
        limpiar_formulario();
    }
    if (text1 == "CU10" || text1 == "CU11" || text1 == "CU12") {
        limpiar_formulario();
    }
    if (text2 == "DB") {
        limpiar_formulario();
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
                if (r == 1) {
                    $('#pnlCancelaciones').show();
                    $('#respuesta1').attr('required', true);
                    $('#respuesta2').attr('required', true);
                    $('#respuesta3').attr('required', true);
                } else {
                    $('#pnlCancelaciones').hide();
                    $('#respuesta1').attr('required', false);
                    $('#respuesta2').attr('required', false);
                    $('#respuesta3').attr('required', false);
                    $('#respuesta1_1').attr('required', false);
                    $('#respuesta1_2').attr('readonly', true);
                    $('#respuesta1_2').attr('required', false);
                    $('#pregunta1_1').hide();
                    $('#respuesta1_1').hide();
                    $('#respuesta1_2').hide();
                }
            }
        });
    }
});

$('#respuesta1').change(function () {
    if ($('#respuesta1').val() == "OTROS") {
        $('#pregunta1_1').show();
        $('#respuesta1_1').show();
        $('#respuesta1_2').show();
        $('#respuesta1_1').attr('required', true);
    } else {
        $('#pregunta1_1').hide();
        $('#respuesta1_1').hide();
        $('#respuesta1_2').hide();
        $('#respuesta1_1').val("");
        $('#respuesta1_2').val("");
        $('#respuesta1_1').attr('required', false);
    }
});

$('#respuesta1_1').change(function () {
    if ($('#respuesta1_1').val() == "OTRO") {
        $('#respuesta1_2').attr('readonly', false);
        $('#respuesta1_2').attr('required', true);
    } else {
        $('#respuesta1_2').val("");
        $('#respuesta1_2').attr('readonly', true);
        $('#respuesta1_2').attr('required', false);
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
            url: "../ajax/bpCancelacionesC.php?action=save",
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
                        url: "../ajax/bpCancelacionesC.php?action=save",
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
                        url: "../ajax/bpCancelacionesC.php?action=save",
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