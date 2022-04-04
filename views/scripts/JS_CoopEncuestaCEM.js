var tabla;
function init() { /* función inicial */
    mostrar_formulario(false);
    mostrar_todos();
    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
    //divs y paneles a ocultar
    $('#otro').attr('disabled', true);
    $('#fonoAd').on("paste", function (e) {
        e.preventDefault();
    });
    $('#level3').attr('disabled', true);
    limpiar_formulario();
}

function limpiar_formulario() {
    $("#titulo").text("Cooperativa de Cámara de Comercio de Ambato - Créditos");
    $("#titulo1").text("");
    $("#titulo2").text("");
    $('#pregunta1_1').hide();
    $('#pregunta2_1').hide();
    $('#pregunta3_1').hide();
    $('#pregunta4_1').hide();
    $('#pregunta5_1').hide();
    $('#respuesta1_1').hide();
    $('#respuesta2_1').hide();
    $('#respuesta3_1').hide();
    $('#respuesta4_1').hide();
    $('#respuesta5_1').hide();
    $('#respuesta6_1').hide();
    $('#respuesta7_1').hide();
    $('#ATRIBUTO_INS').hide();
    $('#ATRIBUTO_CES').hide();
    $('#ATRIBUTO_NPS').hide();
    $('#respuesta1').val("");
    $('#respuesta2').val("");
    $('#respuesta3').val("");
    $('#respuesta4').val("");
    $('#respuesta5').val("");
    $('#respuesta6').val("");
    $('#respuesta7').val("");
    $('#respuesta1_1').val("");
    $('#respuesta2_1').val("");
    $('#respuesta3_1').val("");
    $('#respuesta4_1').val("");
    $('#respuesta5_1').val("");
    $('#ATRIBUTO_INS').val("");
    $('#ATRIBUTO_CES').val("");
    $('#ATRIBUTO_NPS').val("");
    pnlEncuesta(false, true);
    $('#respuesta1_1').attr('required', false);
    $('#respuesta2_1').attr('required', false);
    $('#respuesta3_1').attr('required', false);
    $('#respuesta4_1').attr('required', false);
    $('#respuesta5_1').attr('required', false);
    $('#respuesta6_1').attr('required', false);
    $('#respuesta7_1').attr('required', false);
}

function cancelar_formulario() { /* función para cancelar la operación */
    limpiar_formulario();
    mostrar_formulario(false);
    $("#titulo").text("Campaña BP Encuestas");
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
            url: '../ajax/cccaCreditosC.php?action=selectAll_1',
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
    $.post("../ajax/cccaCreditosC.php?action=selectById", {Id: Id}, function (datos, estado) {
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
        $('#CPERSONA').val(datos.CPERSONA);
        $('#FECHA_SOLICITUD').val(datos.FECHA_SOLICITUD);
        $('#NUMERO_SOLICITUD').val(datos.NUMERO_SOLICITUD);
        $('#ESTADO_SOLICITUD').val(datos.ESTADO_SOLICITUD);
        $('#NUMERO_SOCIO').val(datos.NUMERO_SOCIO);
        $('#NUMERO_CUENTA').val(datos.NUMERO_CUENTA);
        $('#NUMERO_TC').val(datos.NUMERO_TC);
        $('#AGENCIA').val(datos.AGENCIA);
        $('#EDAD').val(datos.EDAD);
        $('#FECHA_NACIMIENTO').val(datos.FECHA_NACIMIENTO);
        $('#ESTADO_CIVIL').val(datos.ESTADO_CIVIL);
        $('#GENERO').val(datos.GENERO);
        $('#PROVINCIA_DOMICILIO').val(datos.PROVINCIA_DOMICILIO);
        $('#CIUDAD_DOMICILIO').val(datos.CIUDAD_DOMICILIO);
        $('#DIRECCION_DOMICILIO').val(datos.DIRECCION_DOMICILIO);
        $('#PROVINCIA_TRABAJO').val(datos.PROVINCIA_TRABAJO);
        $('#CIUDAD_TRABAJO').val(datos.CIUDAD_TRABAJO);
        $('#DIRECCION_TRABAJO').val(datos.DIRECCION_TRABAJO);
        $('#ACTIVIDAD_ECONOMICA').val(datos.ACTIVIDAD_ECONOMICA);
        $('#CORREO').val(datos.CORREO);
        $('#TIPO_EMPLEADO').val(datos.TIPO_EMPLEADO);
        $('#INGRESOS').val(datos.INGRESOS);
        $('#EGRESOS').val(datos.EGRESOS);
        $('#ACTIVOS').val(datos.ACTIVOS);
        $('#PASIVOS').val(datos.PASIVOS);
        $('#PRODUCTO').val(datos.PRODUCTO);
        $('#TIPO_CREDITO').val(datos.TIPO_CREDITO);
        $('#MONTO_MAXIMO').val(datos.MONTO_MAXIMO);
        $('#PLAZO_CREDITO').val(datos.PLAZO_CREDITO);
        $('#TASA_CRD').val(datos.TASA_CRD);
        $('#DESTINO_DETALLADO').val(datos.DESTINO_DETALLADO);
        $('#NEGOCIACION').val(datos.NEGOCIACION);
        $('#FECHA_MODIFICACION').val(datos.FECHA_MODIFICACION);
        $('#OFICIAL_CUENTA').val(datos.OFICIAL_CUENTA);
        $('#ESTADO_DESEMBOLSO').val(datos.ESTADO_DESEMBOLSO);
        $('#COMENTARIOS').val(datos.COMENTARIOS);
        $('#TIPO_TC').val(datos.TIPO_TC);
        $('#FAMILIA_TC').val(datos.FAMILIA_TC);
        $('#MARCA_TC').val(datos.MARCA_TC);
        $('#PLAN_RECOMPENSAS').val(datos.PLAN_RECOMPENSAS);
        $('#CUPO_TC').val(datos.CUPO_TC);
        $('#CUPO_MAXIMO_TC').val(datos.CUPO_MAXIMO_TC);
        $('#CUPO_DISPONIBLE_TC').val(datos.CUPO_DISPONIBLE_TC);
        $('#PRIORIDAD_GESTION').val(datos.PRIORIDAD_GESTION);
        $('#NOMBRE1').val(datos.NOMBRE1);
        $('#NOMBRE2').val(datos.NOMBRE2);
        $('#APELLIDO1').val(datos.APELLIDO1);
        $('#APELLIDO2').val(datos.APELLIDO2);
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
                    $('#subestatus1').attr('disabled', false);
                    $('#subestatus2').attr('disabled', false);
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
                    pnlEncuesta(true, false);
                } else if (r == 100) {
                    pnlEncuesta(false, true);
                } else {
                    limpiar_formulario();
                }
            }
        });
    }
});

$("#level3").change(function () {
    var level1 = $("#level1 option:selected").text();
    var level2 = $("#level2 option:selected").text();
    var level3 = $("#level3 option:selected").text();
    var camp = $("#CAMPANIA").val();
    if (level1 !== "" && level2 !== "") {
        $.ajax({
            type: "GET",
            url: '../ajax/funcionesGeneralesC.php?action=code1',
            data: {camp: camp, level1: level1, level2: level2, level3: level3},
            success: function (r) {
                $('#code').val(r);
            }
        });
    }
});

$('#respuesta1').change(function () {
    if ($('#respuesta1').val() == '1' || $('#respuesta1').val() == '2' || $('#respuesta1').val() == '3' || $('#respuesta1').val() == '4') {
        $('#pregunta1_1').show();
        $('#respuesta1_1').show();
        $('#respuesta1_1').attr('readonly', false);
        $('#respuesta1_1').attr('required', true);
    } else {
        $('#pregunta1_1').hide();
        $('#respuesta1_1').hide();
        $('#respuesta1_1').val("");
        $('#respuesta1_1').attr('readonly', true);
        $('#respuesta1_1').attr('required', false);
    }
});

$('#respuesta2').change(function () {
    if ($('#respuesta2').val() == '1' || $('#respuesta2').val() == '2' || $('#respuesta2').val() == '3' || $('#respuesta2').val() == '4') {
        $('#pregunta2_1').show();
        $('#respuesta2_1').show();
        $('#respuesta2_1').attr('readonly', false);
        $('#respuesta2_1').attr('required', true);
    } else {
        $('#pregunta2_1').hide();
        $('#respuesta2_1').hide();
        $('#respuesta2_1').val("");
        $('#respuesta2_1').attr('readonly', true);
        $('#respuesta2_1').attr('required', false);
    }
});

$('#respuesta3').change(function () {
    if ($('#respuesta3').val() == '1' || $('#respuesta3').val() == '2' || $('#respuesta3').val() == '3' || $('#respuesta3').val() == '4') {
        $('#pregunta3_1').val("Cuál es el motivo de su calificación?");
        $('#pregunta3_1').show();
        $('#respuesta3_1').show();
        $('#respuesta3_1').attr('readonly', false);
        $('#respuesta3_1').attr('required', true);
        $('#ATRIBUTO_INS').show();
        $('#ATRIBUTO_INS').attr('readonly', false);
        $('#ATRIBUTO_INS').attr('required', true);
    } else if ($('#respuesta3').val() == '5' || $('#respuesta3').val() == '6' || $('#respuesta3').val() == '7') {
        $('#pregunta3_1').val("Qué podriamos mejorar?");
        $('#pregunta3_1').show();
        $('#respuesta3_1').show();
        $('#respuesta3_1').attr('readonly', false);
        $('#respuesta3_1').attr('required', true);
        $('#ATRIBUTO_INS').show();
        $('#ATRIBUTO_INS').attr('readonly', false);
        $('#ATRIBUTO_INS').attr('required', true);
    } else if ($('#respuesta3').val() == '8' || $('#respuesta3').val() == '9' || $('#respuesta3').val() == '10') {
        $('#pregunta3_1').val("Qué fue lo que mas le gustó?");
        $('#pregunta3_1').show();
        $('#respuesta3_1').show();
        $('#respuesta3_1').attr('readonly', false);
        $('#respuesta3_1').attr('required', true);
        $('#ATRIBUTO_INS').show();
        $('#ATRIBUTO_INS').attr('readonly', false);
        $('#ATRIBUTO_INS').attr('required', true);
    } else {
        $('#pregunta3_1').hide();
        $('#respuesta3_1').hide();
        $('#respuesta3_1').val("");
        $('#respuesta3_1').attr('readonly', true);
        $('#respuesta3_1').attr('required', false);
        $('#ATRIBUTO_INS').hide();
        $('#ATRIBUTO_INS').val("");
        $('#ATRIBUTO_INS').attr('readonly', true);
        $('#ATRIBUTO_INS').attr('required', false);
    }
});

$('#respuesta4').change(function () {
    if ($('#respuesta4').val() == 'MUY FACIL' || $('#respuesta4').val() == 'FACIL') {
        $('#pregunta4_1').val("Qué lo hizo Muy fácil/ fácil?");
        $('#pregunta4_1').show();
        $('#respuesta4_1').show();
        $('#respuesta4_1').attr('readonly', false);
        $('#respuesta4_1').attr('required', true);
        $('#ATRIBUTO_CES').show();
        $('#ATRIBUTO_CES').attr('readonly', false);
        $('#ATRIBUTO_CES').attr('required', true);
    } else if ($('#respuesta4').val() == 'POCO FACIL' || $('#respuesta4').val() == 'DIFICIL' || $('#respuesta4').val() == 'MUY DIFICIL') {
        $('#pregunta4_1').val("Cuál es el motivo de su calificación?");
        $('#pregunta4_1').show();
        $('#respuesta4_1').show();
        $('#respuesta4_1').attr('readonly', false);
        $('#respuesta4_1').attr('required', true);
        $('#ATRIBUTO_CES').show();
        $('#ATRIBUTO_CES').attr('readonly', false);
        $('#ATRIBUTO_CES').attr('required', true);
    } else {
        $('#pregunta4_1').hide();
        $('#respuesta4_1').hide();
        $('#respuesta4_1').val("");
        $('#respuesta4_1').attr('readonly', true);
        $('#respuesta4_1').attr('required', false);
        $('#ATRIBUTO_CES').hide();
        $('#ATRIBUTO_CES').val("");
        $('#ATRIBUTO_CES').attr('readonly', true);
        $('#ATRIBUTO_CES').attr('required', false);
    }
});

$('#respuesta5').change(function () {
    if ($('#respuesta5').val() == '0' || $('#respuesta5').val() == '1' || $('#respuesta5').val() == '2' || $('#respuesta5').val() == '3' ||
            $('#respuesta5').val() == '4' || $('#respuesta5').val() == '5' || $('#respuesta5').val() == '6') {
        $('#pregunta5_1').val("Cuál es el motivo de su calificación?");
        $('#pregunta5_1').show();
        $('#respuesta5_1').show();
        $('#respuesta5_1').attr('readonly', false);
        $('#respuesta5_1').attr('required', true);
        $('#ATRIBUTO_NPS').show();
        $('#ATRIBUTO_NPS').attr('readonly', false);
        $('#ATRIBUTO_NPS').attr('required', true);
    } else if ($('#respuesta5').val() == '7' || $('#respuesta5').val() == '8') {
        $('#pregunta5_1').val("Qué podriamos mejorar?");
        $('#pregunta5_1').show();
        $('#respuesta5_1').show();
        $('#respuesta5_1').attr('readonly', false);
        $('#respuesta5_1').attr('required', true);
        $('#ATRIBUTO_NPS').show();
        $('#ATRIBUTO_NPS').attr('readonly', false);
        $('#ATRIBUTO_NPS').attr('required', true);
    } else if ($('#respuesta5').val() == '9' || $('#respuesta5').val() == '10') {
        $('#pregunta5_1').val("Qué fue lo que mas le gustó para recomendarnos?");
        $('#pregunta5_1').show();
        $('#respuesta5_1').show();
        $('#respuesta5_1').attr('readonly', false);
        $('#respuesta5_1').attr('required', true);
        $('#ATRIBUTO_NPS').show();
        $('#ATRIBUTO_NPS').attr('readonly', false);
        $('#ATRIBUTO_NPS').attr('required', true);
    } else {
        $('#pregunta5_1').hide();
        $('#respuesta5_1').hide();
        $('#respuesta5_1').val("");
        $('#respuesta5_1').attr('readonly', true);
        $('#respuesta5_1').attr('required', false);
        $('#ATRIBUTO_NPS').hide();
        $('#ATRIBUTO_NPS').val("");
        $('#ATRIBUTO_NPS').attr('readonly', true);
        $('#ATRIBUTO_NPS').attr('required', false);
    }
});

$('#respuesta6').change(function () {
    if ($('#respuesta6').val() == '1' || $('#respuesta6').val() == '2' || $('#respuesta6').val() == '3' || $('#respuesta6').val() == '4') {
        $('#pregunta6_1').show();
        $('#respuesta6_1').show();
        $('#respuesta6_1').attr('readonly', false);
        $('#respuesta6_1').attr('required', true);
    } else {
        $('#pregunta6_1').hide();
        $('#respuesta6_1').hide();
        $('#respuesta6_1').val("");
        $('#respuesta6_1').attr('readonly', true);
        $('#respuesta6_1').attr('required', false);
    }
});

$('#respuesta7').change(function () {
    if ($('#respuesta7').val() == '1' || $('#respuesta7').val() == '2' || $('#respuesta7').val() == '3' || $('#respuesta7').val() == '4') {
        $('#pregunta7_1').show();
        $('#respuesta7_1').show();
        $('#respuesta7_1').attr('readonly', false);
        $('#respuesta7_1').attr('required', true);
    } else {
        $('#pregunta7_1').hide();
        $('#respuesta7_1').hide();
        $('#respuesta7_1').val("");
        $('#respuesta7_1').attr('readonly', true);
        $('#respuesta7_1').attr('required', false);
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
            url: "../ajax/cccaCreditosC.php?action=saveCEM",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                bootbox.alert(datos);
                mostrar_formulario(false);
                tabla.ajax.reload();
                $("#btnGuardar").prop("disabled", true);
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
                        url: "../ajax/cccaCreditosC.php?action=saveCEM",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (datos) {
                            bootbox.alert(datos);
                            mostrar_formulario(false);
                            tabla.ajax.reload();
                            $("#btnGuardar").prop("disabled", true);
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
                        url: "../ajax/cccaCreditosC.php?action=saveCEM",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (datos) {
                            bootbox.alert(datos);
                            mostrar_formulario(false);
                            tabla.ajax.reload();
                            $("#btnGuardar").prop("disabled", true);
                        }
                    });
                }
            }
        });
    }
}

init(); /* ejecuta la función inicial */

function pnlEncuesta(state1, state2) {
    $('#respuesta1').attr('required', state1);
    $('#respuesta2').attr('required', state1);
    $('#respuesta3').attr('required', state1);
    $('#respuesta4').attr('required', state1);
    $('#respuesta5').attr('required', state1);
    $('#respuesta6').attr('required', state1);
    $('#respuesta7').attr('required', state1);
    $('#respuesta1').attr('readonly', state2);
    $('#respuesta2').attr('readonly', state2);
    $('#respuesta3').attr('readonly', state2);
    $('#respuesta4').attr('readonly', state2);
    $('#respuesta5').attr('readonly', state2);
    $('#respuesta6').attr('readonly', state2);
    $('#respuesta7').attr('readonly', state2);
}
