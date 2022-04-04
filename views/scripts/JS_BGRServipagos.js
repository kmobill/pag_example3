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
    $('#respuesta1').val("");
    $('#respuesta2').val("");
    $('#respuesta3').val("");
    $('#respuesta4').val("");
    $('#respuesta1_1').val("");
    $('#respuesta2_1').val("");
    $('#respuesta3_1').val("");
    $('#respuesta4_1').val("");
    $('#pregunta1_1').hide();
    $('#respuesta1_1').hide();
    $('#pregunta2_1').hide();
    $('#respuesta2_1').hide();
    $('#pregunta3_1').hide();
    $('#respuesta3_1').hide();
    $('#pregunta4_1').hide();
    $('#respuesta4_1').hide();
    $('#pregunta2').hide();
    $('#respuesta2').hide();
    $('#pregunta3').hide();
    $('#respuesta3').hide();
    $('#pregunta4').hide();
    $('#respuesta4').hide();
    $('#lbl').hide();
    pnlEncuesta(false);
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
            url: '../ajax/bancoBGROtrosCanalesC.php?action=selectAll',
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
    $.post("../ajax/bancoBGROtrosCanalesC.php?action=selectById", {Id: Id}, function (datos, estado) {
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
        $('#REGION').val(datos.REGION);
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
                url: '../ajax/bancoBGROtrosCanalesC.php?action=estatus',
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
                url: '../ajax/bancoBGROtrosCanalesC.php?action=telefonos',
                data: {idC: idC},
                success: function (r) {
                    $('#fonos').html(r);
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
        pnlEncuesta(false);
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
                    pnlEncuesta(true);
                } else {
                    pnlEncuesta(false);
                }
            }
        });
    }
});

$('#respuesta1').change(function () {
    if ($('#respuesta1').val() == 'Servipagos') {
        $('#pregunta2').show();
        $('#respuesta2').show();
        $('#pregunta3').show();
        $('#respuesta3').show();
        $('#pregunta4').show();
        $('#respuesta4').show();
        $('#respuesta2').attr('readonly', false);
        $('#respuesta2').attr('required', true);
        $('#respuesta3').attr('readonly', false);
        $('#respuesta3').attr('required', true);
        $('#respuesta4').attr('readonly', false);
        $('#respuesta4').attr('required', true);
        $('#lbl').show();
    } else {
        $('#pregunta2').hide();
        $('#respuesta2').hide();
        $('#pregunta3').hide();
        $('#respuesta3').hide();
        $('#pregunta4').hide();
        $('#respuesta4').hide();
        $('#lbl').hide();
        $('#respuesta2').attr('readonly', true);
        $('#respuesta2').attr('required', false);
        $('#respuesta3').attr('readonly', true);
        $('#respuesta3').attr('required', false);
        $('#respuesta4').attr('readonly', true);
        $('#respuesta4').attr('required', false);
        $('#respuesta2').val("");
        $('#respuesta3').val("");
        $('#respuesta4').val("");
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
    if ($('#respuesta3').val() == 'Si') {
        $('#pregunta3_1').show();
        $('#respuesta3_1').show();
        $('#pregunta3_1').val("¿Por qué mejoró su experiencia?");
        $('#respuesta3_1').attr('readonly', false);
        $('#respuesta3_1').attr('required', true);
    }else if ($('#respuesta3').val() == 'No') {
        $('#pregunta3_1').show();
        $('#respuesta3_1').show();
        $('#pregunta3_1').val("¿Por qué no mejoró su experiencia?");
        $('#respuesta3_1').attr('readonly', false);
        $('#respuesta3_1').attr('required', true);
    } else {
        $('#pregunta3_1').hide();
        $('#respuesta3_1').hide();
        $('#respuesta3_1').val("");
        $('#respuesta3_1').attr('readonly', true);
        $('#respuesta3_1').attr('required', false);
    }
});

function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var IdClient = $("#IDC").val();
    $.ajax({
        type: "GET",
        url: '../ajax/bancoBGROtrosCanalesC.php?action=validePhone',
        data: {IdClient: IdClient},
        success: function (v) {
            var r = $("#code").val();
            if (v == "Almacene un número de teléfono para continuar!") {
                event.preventDefault();
                bootbox.alert(v);
            } else {
                var formData = new FormData($("#formulario")[0]);
                $.ajax({
                    url: "../ajax/bancoBGROtrosCanalesC.php?action=save",
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

function pnlEncuesta(state) {
    $('#respuesta1').attr('required', state);
    $('#respuesta2').attr('required', state);
    $('#respuesta3').attr('required', state);
    $('#respuesta4').attr('required', state);
}