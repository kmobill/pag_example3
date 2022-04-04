var tabla;
function init() { /* función inicial */
    mostrar_formulario(false);
    mostrar_todos();
    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });

    $('#otro').attr('disabled', true);
    $('#fonoAd').on("paste", function (e) {
        e.preventDefault();
    });
    $('#level3').attr('disabled', true);
}

function limpiar_formulario() {
    $("#titulo").text("Campaña BGR Encuestas");
    $("#titulo1").text("");
    $("#titulo2").text("");
    $('#respuesta13').val("");
    $('#respuesta14').val("");
    $('#respuesta15').val("");
    $('#respuesta19').val("");
    pnlEncuesta(false,true);
    $('#respuesta13_1').attr('required', false);
    $('#respuesta14_1').attr('required', false);
    $('#respuesta15_1').attr('required', false);
    $('#respuesta19_1').attr('required', false);
    $('#pregunta7_1').hide();
    $('#respuesta7_1').hide();
    $('#pregunta13_1').hide();
    $('#respuesta13_1').hide();
    $('#pregunta14_1').hide();
    $('#respuesta14_1').hide();
    $('#pregunta15_1').hide();
    $('#respuesta15_1').hide();
}

function cancelar_formulario() { /* función para cancelar la operación */
    limpiar_formulario();
    mostrar_formulario(false);
    $("#titulo").text("Campaña BGR Encuestas");
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
            url: '../ajax/bancoBGRCanalesElectronicosC.php?action=selectAll_1',
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
    $('#pregunta8').val("");
    $.post("../ajax/bancoBGRCanalesElectronicosC.php?action=selectById", {Id: Id}, function (datos, estado) {
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
        $('#IDENTIFICACION').val(datos.IDENTIFICACION);
        $('#NOMBRE_CLIENTE').val(datos.NOMBRE_CLIENTE);
        $('#TIPO_CLIENTE').val(datos.TIPO_CLIENTE);
        $('#SEGMENTO').val(datos.SEGMENTO);
        $('#CODIGO_AGENCIA').val(datos.CODIGO_AGENCIA);
        $('#AGENCIA').val(datos.AGENCIA);
        $('#SECCION').val(datos.SECCION);
        $('#AREA').val(datos.AREA);
        $('#USUARIO').val(datos.USUARIO);
        $('#CAJERO').val(datos.CAJERO);
        $('#TRAMITES').val(datos.TRAMITES);
        $('#TIPO_TRANSACCION').val(datos.TIPO_TRANSACCION);
        if (datos.TRAMITES == "") {
            var concepto = datos.TIPO_TRANSACCION;
        } else {
            var concepto = datos.TRAMITES;
        }
        $('#TITULAR_TERCERO').val(datos.TITULAR_TERCERO);
        $('#CUENTA').val(datos.CUENTA);
        $('#FECHA_ATENCION').val(datos.FECHA_ATENCION);
        $('#HORA_ATENCION').val(datos.HORA_ATENCION);
        var camp = datos.CampaignId;
        if (camp != "") {
            $.ajax({
                type: "GET",
                url: '../ajax/bancoBGRCanalesElectronicosC.php?action=estatus',
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
                url: '../ajax/bancoBGRCanalesElectronicosC.php?action=telefonos',
                data: {idC: idC},
                success: function (r) {
                    $('#fonos').html(r);
                }
            });
        }
        if (datos.SEGMENTO == 'BANCA DIGITAL APP') {
            $('#pregunta13').val("Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido en Banca Digital App");
            $('#pregunta15').text("En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría califique: En base a su experiencia al transaccionar con la Banca Digital, en qué grado recomendaría a un familiar, amigo o colega de trabajo?");
        } else if (datos.SEGMENTO == 'BANCA DIGITAL WEB') {
            $('#pregunta13').val("Califique del 1 al 10 siendo 1 poco satisfecho y 10 muy satisfecho: Su grado de satisfacción con el servicio recibido en Banca Digital Web");
            $('#pregunta15').text("En escala de 0 a 10 siendo 0 no lo recomendaría y 10 si lo recomendaría califique: En base a su experiencia en qué grado recomendaría a la Banca Digital a un familiar, amigo o colega de trabajo?");
        }
    });
}

$("#level1").change(function () {
    var level1 = $("#level1 option:selected").text();
    var camp = $("#CAMPANIA").val();
    if (level1 != "") {
        $.ajax({
            type: "GET",
            url: '../ajax/encuestaC.php?action=level2',
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
            url: '../ajax/encuestaC.php?action=code',
            data: {camp: camp, level1: level1, level2: level2},
            success: function (r) {
                $('#code').val(r);
                if (r == 1) {
                    pnlEncuesta(true,false);
                } else {
                    limpiar_formulario();
                }
            }
        });
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

$('#respuesta13').change(function () {
    if ($('#respuesta13').val() == '1' || $('#respuesta13').val() == '2' || $('#respuesta13').val() == '3' || $('#respuesta13').val() == '4') {
        $('#pregunta13_1').val("Cuál es el motivo de su calificación?");
        $('#pregunta13_1').show();
        $('#respuesta13_1').show();
        $('#respuesta13_1').attr('readonly', false);
        $('#respuesta13_1').attr('required', true);
    } else if ($('#respuesta13').val() == '5' || $('#respuesta13').val() == '6' || $('#respuesta13').val() == '7' || $('#respuesta13').val() == '8') {
        $('#pregunta13_1').val("Qué podriamos mejorar?");
        $('#pregunta13_1').show();
        $('#respuesta13_1').show();
        $('#respuesta13_1').attr('readonly', false);
        $('#respuesta13_1').attr('required', true);
    } else if ($('#respuesta13').val() == '9' || $('#respuesta13').val() == '10') {
        $('#pregunta13_1').val("Qué fue lo que mas le gustó?");
        $('#pregunta13_1').show();
        $('#respuesta13_1').show();
        $('#respuesta13_1').attr('readonly', false);
        $('#respuesta13_1').attr('required', true);
    } else {
        $('#pregunta13_1').hide();
        $('#respuesta13_1').hide();
        $('#respuesta13_1').val("");
        $('#respuesta13_1').attr('readonly', true);
        $('#respuesta13_1').attr('required', false);
    }
});

$('#respuesta14').change(function () {
    if ($('#respuesta14').val() == 'MUY FACIL' || $('#respuesta14').val() == 'FACIL') {
        $('#pregunta14_1').val("Qué lo hizo Muy fácil/ fácil?");
        $('#pregunta14_1').show();
        $('#respuesta14_1').show();
        $('#respuesta14_1').attr('readonly', false);
        $('#respuesta14_1').attr('required', true);
    } else if ($('#respuesta14').val() == 'POCO FACIL' || $('#respuesta14').val() == 'DIFICIL' || $('#respuesta14').val() == 'MUY DIFICIL') {
        $('#pregunta14_1').val("Cuál es el motivo de su calificación?");
        $('#pregunta14_1').show();
        $('#respuesta14_1').show();
        $('#respuesta14_1').attr('readonly', false);
        $('#respuesta14_1').attr('required', true);
    } else {
        $('#pregunta14_1').hide();
        $('#respuesta14_1').hide();
        $('#respuesta14_1').val("");
        $('#respuesta14_1').attr('readonly', true);
        $('#respuesta14_1').attr('required', false);
    }
});

$('#respuesta15').change(function () {
    if ($('#respuesta15').val() == '0' || $('#respuesta15').val() == '1' || $('#respuesta15').val() == '2' || $('#respuesta15').val() == '3' ||
            $('#respuesta15').val() == '4' || $('#respuesta15').val() == '5' || $('#respuesta15').val() == '6') {
        $('#pregunta15_1').val("Cuál es el motivo de su calificación?");
        $('#pregunta15_1').show();
        $('#respuesta15_1').show();
        $('#respuesta15_1').attr('readonly', false);
        $('#respuesta15_1').attr('required', true);
    } else if ($('#respuesta15').val() == '7' || $('#respuesta15').val() == '8') {
        $('#pregunta15_1').val("Qué podriamos mejorar?");
        $('#pregunta15_1').show();
        $('#respuesta15_1').show();
        $('#respuesta15_1').attr('readonly', false);
        $('#respuesta15_1').attr('required', true);
    } else if ($('#respuesta15').val() == '9' || $('#respuesta15').val() == '10') {
        $('#pregunta15_1').val("Qué fue lo que mas le gustó para recomendarnos?");
        $('#pregunta15_1').show();
        $('#respuesta15_1').show();
        $('#respuesta15_1').attr('readonly', false);
        $('#respuesta15_1').attr('required', true);
    } else {
        $('#pregunta15_1').hide();
        $('#respuesta15_1').hide();
        $('#respuesta15_1').val("");
        $('#respuesta15_1').attr('readonly', true);
        $('#respuesta15_1').attr('required', false);
    }
});

function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var IdClient = $("#IDC").val();
    $.ajax({
        type: "GET",
        url: '../ajax/bancoBGRCanalesElectronicosC.php?action=validePhone',
        data: {IdClient: IdClient},
        success: function (v) {
            var r = $("#code").val();
            if (v == "Almacene un número de teléfono para continuar!") {
                event.preventDefault();
                bootbox.alert(v);
            } else {
                var formData = new FormData($("#formulario")[0]);
                $.ajax({
                    url: "../ajax/bancoBGRCanalesElectronicosC.php?action=save",
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

init(); /* ejecuta la función inicial */

function pnlEncuesta(state1, state2) {
    $('#respuesta7').attr('required', state1);
    $('#respuesta13').attr('required', state1);
    $('#respuesta14').attr('required', state1);
    $('#respuesta15').attr('required', state1);
    $('#respuesta19').attr('required', state1);
    $('#respuesta7').attr('readonly', state2);
    $('#respuesta13').attr('readonly', state2);
    $('#respuesta14').attr('readonly', state2);
    $('#respuesta15').attr('readonly', state2);
    $('#respuesta19').attr('readonly', state2);
}