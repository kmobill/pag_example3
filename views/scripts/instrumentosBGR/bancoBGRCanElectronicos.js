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
    $('#pregunta1_1').hide();
    $('#pregunta2_1').hide();
    $('#pregunta3_1').hide();
    $('#pregunta4_1').hide();
    $('#pregunta5_1').hide();
    $('#pregunta6_1').hide();
    $('#pregunta7_1').hide();
    $('#pregunta8_1').hide();
    $('#pregunta9_1').hide();
    $('#pregunta10_1').hide();
    $('#pregunta11_1').hide();
    $('#pregunta12_1').hide();
    $('#pregunta13_1').hide();
    $('#pregunta14_1').hide();
    $('#pregunta15_1').hide();
    $('#respuesta1_1').hide();
    $('#respuesta2_1').hide();
    $('#respuesta3_1').hide();
    $('#respuesta4_1').hide();
    $('#respuesta5_1').hide();
    $('#respuesta6_1').hide();
    $('#respuesta7_1').hide();
    $('#respuesta8_1').hide();
    $('#respuesta9_1').hide();
    $('#respuesta10_1').hide();
    $('#respuesta11_1').hide();
    $('#respuesta12_1').hide();
    $('#respuesta13_1').hide();
    $('#respuesta14_1').hide();
    $('#respuesta15_1').hide();
}

function limpiar_formulario() {
    $("#titulo").text("Campaña BGR Encuestas");
    $("#titulo1").text("");
    $("#titulo2").text("");
    $('#respuesta1').val("");
    $('#respuesta2').val("");
    $('#respuesta3').val("");
    $('#respuesta4').val("");
    $('#respuesta5').val("");
    $('#respuesta6').val("");
    $('#respuesta7').val("");
    $('#respuesta8').val("");
    $('#respuesta9').val("");
    $('#respuesta10').val("");
    $('#respuesta11').val("");
    $('#respuesta12').val("");
    $('#respuesta13').val("");
    $('#respuesta14').val("");
    $('#respuesta15').val("");
    $('#respuesta1_1').val("");
    $('#respuesta2_1').val("");
    $('#respuesta3_1').val("");
    $('#respuesta4_1').val("");
    $('#respuesta5_1').val("");
    $('#respuesta6_1').val("");
    $('#respuesta7_1').val("");
    $('#respuesta8_1').val("");
    $('#respuesta9_1').val("");
    $('#respuesta10_1').val("");
    $('#respuesta11_1').val("");
    $('#respuesta12_1').val("");
    $('#respuesta13_1').val("");
    $('#respuesta14_1').val("");
    $('#respuesta15_1').val("");
    $('#pregunta1_1').hide();
    $('#pregunta2_1').hide();
    $('#pregunta3_1').hide();
    $('#pregunta4_1').hide();
    $('#pregunta5_1').hide();
    $('#pregunta6_1').hide();
    $('#pregunta7_1').hide();
    $('#pregunta8_1').hide();
    $('#pregunta9_1').hide();
    $('#pregunta10_1').hide();
    $('#pregunta11_1').hide();
    $('#pregunta12_1').hide();
    $('#pregunta13_1').hide();
    $('#pregunta14_1').hide();
    $('#pregunta15_1').hide();
    $('#respuesta1_1').hide();
    $('#respuesta2_1').hide();
    $('#respuesta3_1').hide();
    $('#respuesta4_1').hide();
    $('#respuesta5_1').hide();
    $('#respuesta6_1').hide();
    $('#respuesta7_1').hide();
    $('#respuesta8_1').hide();
    $('#respuesta9_1').hide();
    $('#respuesta10_1').hide();
    $('#respuesta11_1').hide();
    $('#respuesta12_1').hide();
    $('#respuesta13_1').hide();
    $('#respuesta14_1').hide();
    $('#respuesta15_1').hide();
    pnlEncuesta(false);
    $('#respuesta4').attr('required', false);
    $('#respuesta5').attr('required', false);
    $('#respuesta6').attr('required', false);
    $('#respuesta8').attr('required', false);
    $('#respuesta10').attr('required', false);
    $('#respuesta11').attr('required', false);
    $('#respuesta12').attr('required', false);
    $('#respuesta1_1').attr('required', false);
    $('#respuesta2_1').attr('required', false);
    $('#respuesta3_1').attr('required', false);
    $('#respuesta4_1').attr('required', false);
    $('#respuesta5_1').attr('required', false);
    $('#respuesta6_1').attr('required', false);
    $('#respuesta7_1').attr('required', false);
    $('#respuesta8_1').attr('required', false);
    $('#respuesta9_1').attr('required', false);
    $('#respuesta10_1').attr('required', false);
    $('#respuesta11_1').attr('required', false);
    $('#respuesta12_1').attr('required', false);
    $('#respuesta13_1').attr('required', false);
    $('#respuesta14_1').attr('required', false);
    $('#respuesta15_1').attr('required', false);
}

function cancelar_formulario() { /* función para cancelar la operación */
    limpiar_formulario();
    mostrar_formulario(false);
    $("#titulo").text("Campaña BGR Encuestas");
    $("#titulo1").text("");
    $("#titulo2").text("");
}

function mostrar_formulario(flag) { /* muestra u oculta el formulario segun la validación del bool (flag) */
    $('#level1').val("");
    $('#level2').val("");
    $('#level3').val("");
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
            url: '../ajax/bancoBGRCanalesElectronicosC.php?action=selectAll',
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
        if (datos.SEGMENTO == 'CALL CENTER') {
            $('#pregunta1').val("Califique del 1 al 7: El nivel de asesoría que recibió del agente que atendió su requerimiento");
            $('#pregunta2').val("Califique del 1 al 7: ¿Qué tan clara fue la información qué recibió por parte del agente que atendio su requerimiento?");
            $('#pregunta3').val("Califique del 1 al 7: ¿Qué tan útil fue la guía que recibió del agente que atendió su requerimiento?");
            $('#pilar4').show();
            $('#pregunta4').show();
            $('#respuesta4').show();
            $('#pregunta4').val("Califique del 1 al 7: La amabilidad demostrada del agente que atendió su requerimiento");
            $('#pilar5').show();
            $('#pregunta5').show();
            $('#respuesta5').show();
            $('#pregunta5').val("Califique del 1 al 7: El interés desmostrado por el agente que atendió su requerimiento");
            $('#pilar6').show();
            $('#pregunta6').show();
            $('#respuesta6').show();
            $('#pregunta6').val("Califique del 1 al 7: El tiempo de espera para ser atendido por un agente");
            $('#pregunta7').val("Califique del 1 al 7: la solución recibida por parte del agente que atendió su requerimiento");
            $('#pilar8').show();
            $('#pregunta8').show();
            $('#respuesta8').show();
            $('#pregunta8').val("Califique del 1 al 7: La iniciativa demostrada por el agente que atendió su requerimiento");
            $('#pregunta9').val("Califique del 1 al 7: La agilidad demostrada por el agente que atendió su requerimiento");
            $('#pilar10').show();
            $('#pregunta10').show();
            $('#respuesta10').show();
            $('#pregunta10').val("Califique del 1 al 7: Las alternativas brindadas por el agente que atendió su requerimiento");
            $('#pilar11').hide();
            $('#pregunta11').hide();
            $('#respuesta11').hide();
            $('#pilar12').hide();
            $('#pregunta12').hide();
            $('#respuesta12').hide();
            $('#pregunta14').val("¿Que tan fácil es para usted gestionar su requerimiento de Call Center?");
        } else if (datos.SEGMENTO == 'BGR NET APP') {
            $('#pregunta1').val("Califique del 1 al 7: Los servicios presentados en la aplicación móvil para la solución de su requerimiento.");
            $('#pregunta2').val("Califique del 1 al 7: Si la información presentada en la aplicación móvil fue clara");
            $('#pregunta3').val("Califique del 1 al 7: ¿Qué tan útil es la información que se presenta en la aplicación móvil?");
            $('#pilar4').hide();
            $('#pregunta4').hide();
            $('#respuesta4').hide();
            $('#pilar5').hide();
            $('#pregunta5').hide();
            $('#respuesta5').hide();
            $('#pilar6').hide();
            $('#pregunta6').hide();
            $('#respuesta6').hide();
            $('#pregunta7').val("Califique del 1 al 7: Los servicios disponibles en la aplicación móvil cubren sus necesidades");
            $('#pilar8').hide();
            $('#pregunta8').hide();
            $('#respuesta8').hide();
            $('#pregunta9').val("Califique del 1 al 7: ¿Qué tan rápido pudo realizar su transacción/consulta en la aplicación móvil");
            $('#pilar10').hide();
            $('#pregunta10').hide();
            $('#respuesta10').hide();
            $('#pilar11').show();
            $('#pregunta11').show();
            $('#respuesta11').show();
            $('#pregunta11').val("Califique del 1 al 7: La facilidad para acceder a los servicios de la Aplicación Móvil");
            $('#pilar12').show();
            $('#pregunta12').show();
            $('#respuesta12').show();
            $('#pregunta12').val("Califique del 1 al 7: El nivel de innovación que ve en la aplicación móvil");
            $('#pregunta14').val("¿Qué tan facil es para usted realizar una transacción/consulta en la aplicación móvil?");
        } else if (datos.SEGMENTO == 'BGR NET WEB') {
            $('#pregunta1').val("Califique del 1 al 7: Los servicios presentados en la banca electrónica para la solución de su requerimiento");
            $('#pregunta2').val("Califique del 1 al 7: Si la información presentada en la banca electrónica fue clara");
            $('#pregunta3').val("Califique del 1 al 7: ¿Qué tan útil es la información que se presenta en la banca electrónica?");
            $('#pilar4').hide();
            $('#pregunta4').hide();
            $('#respuesta4').hide();
            $('#pilar5').hide();
            $('#pregunta5').hide();
            $('#respuesta5').hide();
            $('#pilar6').hide();
            $('#pregunta6').hide();
            $('#respuesta6').hide();
            $('#pregunta7').val("Califique del 1 al 7: Los servicios disponibles en la banca electrónica cubren sus necesidades");
            $('#pilar8').hide();
            $('#pregunta8').hide();
            $('#respuesta8').hide();
            $('#pregunta9').val("Califique del 1 al 7: ¿Qué tan rápido pudo realizar su transacción/consulta en la banca electrónica?");
            $('#pilar10').hide();
            $('#pregunta10').hide();
            $('#respuesta10').hide();
            $('#pilar11').show();
            $('#pregunta11').show();
            $('#respuesta11').show();
            $('#pregunta11').val("Califique del 1 al 7: La facilidad para acceder a los servicios de la banca electrónica");
            $('#pilar12').show();
            $('#pregunta12').show();
            $('#respuesta12').show();
            $('#pregunta12').val("Califique del 1 al 7: El nivel de innovación que ve en la banca electrónica");
            $('#pregunta14').val("¿Qué tan facil es para usted realizar una transacción/consulta en la banca electrónica?");
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
                    if ($('#SEGMENTO').val() == "CALL CENTER") {
                        pnlEncuesta(true);
                        $('#pilar11').hide();
                        $('#pregunta11').hide();
                        $('#respuesta11').hide();
                        $('#respuesta11').attr('required', false);
                        $('#pilar12').hide();
                        $('#pregunta12').hide();
                        $('#respuesta12').hide();
                        $('#respuesta12').attr('required', false);
                    } else if ($('#SEGMENTO').val() == "BGR NET APP") {
                        pnlEncuesta(true);
                        $('#pilar4').hide();
                        $('#pregunta4').hide();
                        $('#respuesta4').hide();
                        $('#respuesta4').attr('required', false);
                        $('#pilar5').hide();
                        $('#pregunta5').hide();
                        $('#respuesta5').hide();
                        $('#respuesta5').attr('required', false);
                        $('#pilar6').hide();
                        $('#pregunta6').hide();
                        $('#respuesta6').hide();
                        $('#respuesta6').attr('required', false);
                        $('#pilar8').hide();
                        $('#pregunta8').hide();
                        $('#respuesta8').hide();
                        $('#respuesta8').attr('required', false);
                        $('#pilar10').hide();
                        $('#pregunta10').hide();
                        $('#respuesta10').hide();
                        $('#respuesta10').attr('required', false);
                    } else if ($('#SEGMENTO').val() == "BGR NET WEB") {
                        pnlEncuesta(true);
                        $('#pilar4').hide();
                        $('#pregunta4').hide();
                        $('#respuesta4').hide();
                        $('#respuesta4').attr('required', false);
                        $('#pilar5').hide();
                        $('#pregunta5').hide();
                        $('#respuesta5').hide();
                        $('#respuesta5').attr('required', false);
                        $('#pilar6').hide();
                        $('#pregunta6').hide();
                        $('#respuesta6').hide();
                        $('#respuesta6').attr('required', false);
                        $('#pilar8').hide();
                        $('#pregunta8').hide();
                        $('#respuesta8').hide();
                        $('#respuesta8').attr('required', false);
                        $('#pilar10').hide();
                        $('#pregunta10').hide();
                        $('#respuesta10').hide();
                        $('#respuesta10').attr('required', false);
                    }
                } else {
                    limpiar_formulario();
                }
            }
        });
    }
});

$('#btnFonos').click(function () {
    var phones = $("#fonos option:selected").text();
    var estatusTel = $("#estatusTel option:selected").text();
    if (phones != "" && estatusTel != "") {
        var IDC = $("#IDC").val();
        $.ajax({
            url: '../ajax/bancoBGRCanalesElectronicosC.php?action=updatePhones',
            method: 'POST',
            data: {IDC: IDC, fonos: phones, estatusTel: estatusTel},
            success: function (r) {
                bootbox.alert(r);
                $.ajax({
                    type: "GET",
                    url: '../ajax/bancoBGRCanalesElectronicosC.php?action=telefonos',
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
        $('#pregunta3_1').show();
        $('#respuesta3_1').show();
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

$('#respuesta4').change(function () {
    if ($('#respuesta4').val() == '1' || $('#respuesta4').val() == '2' || $('#respuesta4').val() == '3' || $('#respuesta4').val() == '4') {
        $('#pregunta4_1').show();
        $('#respuesta4_1').show();
        $('#respuesta4_1').attr('readonly', false);
        $('#respuesta4_1').attr('required', true);
    } else {
        $('#pregunta4_1').hide();
        $('#respuesta4_1').hide();
        $('#respuesta4_1').val("");
        $('#respuesta4_1').attr('readonly', true);
        $('#respuesta4_1').attr('required', false);
    }
});

$('#respuesta5').change(function () {
    if ($('#respuesta5').val() == '1' || $('#respuesta5').val() == '2' || $('#respuesta5').val() == '3' || $('#respuesta5').val() == '4') {
        $('#pregunta5_1').show();
        $('#respuesta5_1').show();
        $('#respuesta5_1').attr('readonly', false);
        $('#respuesta5_1').attr('required', true);
    } else {
        $('#pregunta5_1').hide();
        $('#respuesta5_1').hide();
        $('#respuesta5_1').val("");
        $('#respuesta5_1').attr('readonly', true);
        $('#respuesta5_1').attr('required', false);
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

$('#respuesta8').change(function () {
    if ($('#respuesta8').val() == '1' || $('#respuesta8').val() == '2' || $('#respuesta8').val() == '3' || $('#respuesta8').val() == '4') {
        $('#pregunta8_1').show();
        $('#respuesta8_1').show();
        $('#respuesta8_1').attr('readonly', false);
        $('#respuesta8_1').attr('required', true);
    } else {
        $('#pregunta8_1').hide();
        $('#respuesta8_1').hide();
        $('#respuesta8_1').val("");
        $('#respuesta8_1').attr('readonly', true);
        $('#respuesta8_1').attr('required', false);
    }
});

$('#respuesta9').change(function () {
    if ($('#respuesta9').val() == '1' || $('#respuesta9').val() == '2' || $('#respuesta9').val() == '3' || $('#respuesta9').val() == '4') {
        $('#pregunta9_1').show();
        $('#respuesta9_1').show();
        $('#respuesta9_1').attr('readonly', false);
        $('#respuesta9_1').attr('required', true);
    } else {
        $('#pregunta9_1').hide();
        $('#respuesta9_1').hide();
        $('#respuesta9_1').val("");
        $('#respuesta9_1').attr('readonly', true);
        $('#respuesta9_1').attr('required', false);
    }
});

$('#respuesta10').change(function () {
    if ($('#respuesta10').val() == '1' || $('#respuesta10').val() == '2' || $('#respuesta10').val() == '3' || $('#respuesta10').val() == '4') {
        $('#pregunta10_1').show();
        $('#respuesta10_1').show();
        $('#respuesta10_1').attr('readonly', false);
        $('#respuesta10_1').attr('required', true);
    } else {
        $('#pregunta10_1').hide();
        $('#respuesta10_1').hide();
        $('#respuesta10_1').val("");
        $('#respuesta10_1').attr('readonly', true);
        $('#respuesta10_1').attr('required', false);
    }
});

$('#respuesta11').change(function () {
    if ($('#respuesta11').val() == '1' || $('#respuesta11').val() == '2' || $('#respuesta11').val() == '3' || $('#respuesta11').val() == '4') {
        $('#pregunta11_1').show();
        $('#respuesta11_1').show();
        $('#respuesta11_1').attr('readonly', false);
        $('#respuesta11_1').attr('required', true);
    } else {
        $('#pregunta11_1').hide();
        $('#respuesta11_1').hide();
        $('#respuesta11_1').val("");
        $('#respuesta11_1').attr('readonly', true);
        $('#respuesta11_1').attr('required', false);
    }
});

$('#respuesta12').change(function () {
    if ($('#respuesta12').val() == '1' || $('#respuesta12').val() == '2' || $('#respuesta12').val() == '3' || $('#respuesta12').val() == '4') {
        $('#pregunta12_1').show();
        $('#respuesta12_1').show();
        $('#respuesta12_1').attr('readonly', false);
        $('#respuesta12_1').attr('required', true);
    } else {
        $('#pregunta12_1').hide();
        $('#respuesta12_1').hide();
        $('#respuesta12_1').val("");
        $('#respuesta12_1').attr('readonly', true);
        $('#respuesta12_1').attr('required', false);
    }
});

$('#respuesta13').change(function () {
    if ($('#respuesta13').val() == '1' || $('#respuesta13').val() == '2' || $('#respuesta13').val() == '3' || $('#respuesta13').val() == '4') {
        $('#pregunta13_1').val("Cuál es el motivo de su calificación?");
        $('#pregunta13_1').show();
        $('#respuesta13_1').show();
        $('#respuesta13_1').attr('readonly', false);
        $('#respuesta13_1').attr('required', true);
    } else if ($('#respuesta13').val() == '5' || $('#respuesta13').val() == '6' || $('#respuesta13').val() == '7') {
        $('#pregunta13_1').val("Qué podriamos mejorar?");
        $('#pregunta13_1').show();
        $('#respuesta13_1').show();
        $('#respuesta13_1').attr('readonly', false);
        $('#respuesta13_1').attr('required', true);
    } else if ($('#respuesta13').val() == '8' || $('#respuesta13').val() == '9' || $('#respuesta13').val() == '10') {
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

$('#cbox2').change(function () {
    if (!$(this).is(":checked")) {
        $('#otro').attr('disabled', true);
        $('#otro').attr('required', false);
    } else {
        $('#otro').attr('disabled', false);
        $('#otro').attr('required', true);
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

function pnlEncuesta(state) {
    $('#respuesta1').attr('required', state);
    $('#respuesta2').attr('required', state);
    $('#respuesta3').attr('required', state);
    $('#respuesta7').attr('required', state);
    $('#respuesta9').attr('required', state);
    $('#respuesta13').attr('required', state);
    $('#respuesta14').attr('required', state);
    $('#respuesta15').attr('required', state);
}