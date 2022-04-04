var tabla;
function init() { /* función inicial */
    mostrar_formulario(false);
    mostrar_todos();
    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
    //divs y paneles a ocultar
    $('#pnlEncuesta').hide();
    $('#pnlEncuestaAntiguaLegal').hide();
    $('#pnlEncuestaAntiguaVIP').hide();
    $('#pnlEncuestaVehicularEq').hide();
    $('#vehicular').hide();
    $('#hogar').hide();
    $('#personas').hide();
    $('#legal').hide();
    $('#pregunta1_1').hide();
    $('#respuesta1_1').hide();
    $('#pregunta2_1').hide();
    $('#pregunta3_1').hide();
    $('#pregunta3_2').hide();
    $('#respuesta3_1').hide();
    $('#pregunta4_VEH').hide();
    $('#pregunta4_HOG').hide();
    $('#pregunta4_PER').hide();
    $('#pregunta4_LEG').hide();
    $('#pregunta6_1_VIP').hide();
    $('#respuesta6_1_VIP').hide();
    $('#pregunta7_1_VIP').hide();
    $('#respuesta7_1_VIP').hide();
    $('#pregunta8_1_VIP').hide();
    $('#pregunta8_2_VIP').hide();
    $('#respuesta8_1_VIP').hide();
    $('#pregunta9_1_VIP').hide();
    $('#respuesta9_1_VIP').hide();
    $('#otro').attr('disabled', true);
    $('#fonoAd').on("paste", function (e) {
        e.preventDefault();
    });
    $('#level3').attr('disabled', true);
}

function limpiar_formulario() {
    document.getElementById("formulario").reset();
    $("#titulo").text("Campaña Ecuasistencias Encuestas");
    $("#titulo1").text("");
    $("#titulo2").text("");
    $('#pnlEncuesta').hide();
    $('#vehicular').hide();
    $('#hogar').hide();
    $('#personas').hide();
    $('#legal').hide();
    $('#pregunta1_1').hide();
    $('#respuesta1_1').hide();
    $('#pregunta2_1').hide();
    $('#pregunta3_1').hide();
    $('#pregunta3_2').hide();
    $('#respuesta3_1').hide();
    $('#pregunta4_VEH').hide();
    $('#pregunta4_HOG').hide();
    $('#pregunta4_PER').hide();
    $('#pregunta4_LEG').hide();
    $("#respuesta1").val("");
    $("#respuesta1_1").val("");
    $("#respuesta2").val("");
    $("#respuesta3").val("");
    $("#respuesta4").val("");
    $("#respuesta2_VEH1").prop("checked", false);
    $("#respuesta2_VEH2").prop("checked", false);
    $("#respuesta2_VEH3").prop("checked", false);
    $("#respuesta2_VEH4").prop("checked", false);
    $("#respuesta2_VEH5").prop("checked", false);
    $("#respuesta2_VEH6").prop("checked", false);
    $("#respuesta2_HOG1").prop("checked", false);
    $("#respuesta2_HOG2").prop("checked", false);
    $("#respuesta2_HOG3").prop("checked", false);
    $("#respuesta2_HOG4").prop("checked", false);
    $("#respuesta2_HOG5").prop("checked", false);
    $("#respuesta2_PER1").prop("checked", false);
    $("#respuesta2_PER2").prop("checked", false);
    $("#respuesta2_PER3").prop("checked", false);
    $("#respuesta2_PER4").prop("checked", false);
    $("#respuesta2_PER5").prop("checked", false);
    $("#respuesta2_LEG1").prop("checked", false);
    $("#respuesta2_LEG2").prop("checked", false);
    $("#respuesta2_LEG3").prop("checked", false);
    $('#respuesta1').attr('required', false);
    $('#respuesta1_1').attr('required', false);
    $('#respuesta2').attr('required', false);
    $('#respuesta3').attr('required', false);
    $('#respuesta3_1').attr('required', false);
    $('#respuesta4').attr('required', false);
    $("#agenda").attr("readonly", true);
    $("#agenda").attr("required", false);
    $("#obs").attr("required", false);
    $('#respuesta1_1').attr('required', false);
    $('#respuesta3_1').attr('required', false);
    pnlEncuestaAntiguaLegal(false);
    pnlEncuestaAntiguaVIP(false);
    pnlEncuestaVehicularEq(false);
    $('#pregunta6_1_VIP').attr('required', false);
    $('#respuesta6_1_VIP').attr('required', false);
    $('#pregunta7_1_VIP').attr('required', false);
    $('#respuesta7_1_VIP').attr('required', false);
    $('#pregunta8_1_VIP').attr('required', false);
    $('#pregunta8_2_VIP').attr('required', false);
    $('#respuesta8_1_VIP').attr('required', false);
    $('#pregunta9_1_VIP').attr('required', false);
    $('#respuesta9_1_VIP').attr('required', false);
    $('#pnlEncuestaAntiguaLegal').hide();
    $('#pnlEncuestaAntiguaVIP').hide();
    $('#pnlEncuestaVehicularEq').hide();
    $('#pregunta6_1_VIP').hide();
    $('#respuesta6_1_VIP').hide();
    $('#pregunta7_1_VIP').hide();
    $('#respuesta7_1_VIP').hide();
    $('#pregunta8_1_VIP').hide();
    $('#pregunta8_2_VIP').hide();
    $('#respuesta8_1_VIP').hide();
    $('#pregunta9_1_VIP').hide();
    $('#respuesta9_1_VIP').hide();
    $('#pregunta5_1_VEH_EQ').attr('required', false);
    $('#respuesta5_1_VEH_EQ').attr('required', false);
    $('#pregunta6_1_VEH_EQ').attr('required', false);
    $('#respuesta6_1_VEH_EQ').attr('required', false);
    $('#pregunta7_1_VEH_EQ').attr('required', false);
    $('#respuesta7_1_VEH_EQ').attr('required', false);
    $('#pregunta8_1_VEH_EQ').attr('required', false);
    $('#pregunta8_2_VEH_EQ').attr('required', false);
    $('#respuesta8_1_VEH_EQ').attr('required', false);
    $('#pregunta9_1_VEH_EQ').attr('required', false);
    $('#respuesta9_1_VEH_EQ').attr('required', false);
    $('#pregunta5_1_VEH_EQ').hide();
    $('#respuesta5_1_VEH_EQ').hide();
    $('#pregunta6_1_VEH_EQ').hide();
    $('#respuesta6_1_VEH_EQ').hide();
    $('#pregunta7_1_VEH_EQ').hide();
    $('#respuesta7_1_VEH_EQ').hide();
    $('#pregunta8_1_VEH_EQ').hide();
    $('#pregunta8_2_VEH_EQ').hide();
    $('#respuesta8_1_VEH_EQ').hide();
    $('#pregunta9_1_VEH_EQ').hide();
    $('#respuesta9_1_VEH_EQ').hide();
}

function cancelar_formulario() { /* función para cancelar la operación */
    limpiar_formulario();
    mostrar_formulario(false);
    $("#titulo").text("Campaña Ecuasistencias Encuestas");
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
            url: '../ajax/ecuasistenciaEncuestaC.php?action=selectAllRec',
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
    $.post("../ajax/ecuasistenciaEncuestaC.php?action=selectByIdRec", {Id: Id}, function (datos, estado) {
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
        $('#TIPO_CONTRATO').val(datos.TIPO_CONTRATO);
        var tipo_contrato = datos.TIPO_CONTRATO;
        if (tipo_contrato == 'VEHICULAR') {
            $('#pregunta4_VEH').show();
            $('#pregunta4_HOG').hide();
            $('#pregunta4_PER').hide();
            $('#pregunta4_LEG').hide();
        }
        if (tipo_contrato == 'HOGAR') {
            $('#pregunta4_VEH').hide();
            $('#pregunta4_HOG').show();
            $('#pregunta4_PER').hide();
            $('#pregunta4_LEG').hide();
        }
        if (tipo_contrato == 'PERSONAS') {
            $('#pregunta4_VEH').hide();
            $('#pregunta4_HOG').hide();
            $('#pregunta4_PER').show();
            $('#pregunta4_LEG').hide();
        }
        if (tipo_contrato == 'LEGAL') {
            $('#pregunta4_VEH').hide();
            $('#pregunta4_HOG').hide();
            $('#pregunta4_PER').hide();
            $('#pregunta4_LEG').show();
        }
        $('#CONTRATO').val(datos.CONTRATO);
        $('#ASISTENCIA').val(datos.ASISTENCIA);
        $('#FECHA_ALTA').val(datos.FECHA_ALTA);
        $('#TITULAR').val(datos.TITULAR);
        $('#BENEFICIARIO').val(datos.BENEFICIARIO);
        $('#PROVINCIA').val(datos.PROVINCIA);
        $('#LOCALIDAD').val(datos.LOCALIDAD);
        $('#LUGAR_DE_ASISTENCIA').val(datos.LUGAR_DE_ASISTENCIA);
        $('#PLACA').val(datos.PLACA);
        $('#BASTIDOR').val(datos.BASTIDOR);
        $('#MARCA').val(datos.MARCA);
        $('#COLOR').val(datos.COLOR);
        $('#MODELO').val(datos.MODELO);
        $('#SERVICIO').val(datos.SERVICIO);
        $('#CAUSA').val(datos.CAUSA);
        $('#AVERIA').val(datos.AVERIA);
        $('#EN_CARTERA').val(datos.EN_CARTERA);
        $('#FECHA_COORDINACION').val(datos.FECHA_COORDINACION);
        $('#OPERADOR_COORDINACION').val(datos.OPERADOR_COORDINACION);
        $('#MOVIMIENTO_ECONOMICO').val(datos.MOVIMIENTO_ECONOMICO);
        $('#IMPORTE').val(datos.IMPORTE);
        $('#TIPO_MOV').val(datos.TIPO_MOV);
        $('#ESTADO_MOV').val(datos.ESTADO_MOV);
        $('#CANCELADO').val(datos.CANCELADO);
        $('#TIPO').val(datos.TIPO);
        var camp = datos.CampaignId;
        if (camp != "") {
            $.ajax({
                type: "GET",
                url: '../ajax/ecuasistenciaEncuestaC.php?action=estatus',
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
                url: '../ajax/ecuasistenciaEncuestaC.php?action=telefonos',
                data: {idC: idC},
                success: function (r) {
                    $('#fonos').html(r);
                }
            });
        }
        $('#pregunta1_VIP').val("La facilidad para contactarse con el servicio de " + datos.SERVICIO);
        $('#pregunta2_VIP').val("El asesoramiento brindado por el asesor telefónico");
        $('#pregunta3_VIP').val("El seguimiento brindado por el asesor telefónico hasta la llegada de la asistencia " + datos.SERVICIO);
        $('#pregunta4_VIP').val("El tiempo de espera para recibir la asistencia " + datos.SERVICIO);
        $('#pregunta5_VIP').val("El estado de la unidad que le otorgó el servicio " + datos.SERVICIO);
        $('#pregunta6_VIP').val("Su grado de satisfacción con el proceso de Asistencia " + datos.SERVICIO);
        $('#pregunta7_VIP').val("Su grado de satisfacción general con " + datos.CONTRATO);
        $('#pregunta8_VIP').val("En escala de 0 a 10 ¿en qué grado recomendaría Seguros " + datos.CONTRATO + " a un familiar, amigo o colega de trabajo?");
        $('#pregunta9_VIP').val("Califique: su nivel de esfuerzo o facilidad para solicitar el servicio de asistencia " + datos.SERVICIO);
        $('#pregunta10_VIP').val("Si su experiencia con Seguros " + datos.CONTRATO + " se mantiene igual a la que ha tenido hasta ahora, consideraría seguir con nosotros, por cuánto tiempo más:");
        $('#pregunta11_VIP').val("SEGUROS " + datos.CONTRATO + " como podría superar sus expectativas al momento de solicitar una asistencia " + datos.SERVICIO);
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
            url: '../ajax/ecuasistenciaEncuestaC.php?action=level2',
            data: {level1: level1, camp: camp},
            success: function (r) {
                $('#level2').html(r);
            }
        });
    }
});

$("#level2").change(function () {
    var level1 = $("#level1 option:selected").text();
    var level2 = $("#level2 option:selected").text();
    var camp = $("#CAMPANIA").val();
    if (level1 !== "" && level2 !== "") {
        $.ajax({
            type: "GET",
            url: '../ajax/ecuasistenciaEncuestaC.php?action=level3',
            data: {camp: camp, level1: level1, level2: level2},
            success: function (r) {
                $('#level3').html(r);
            }
        });
        $.ajax({
            type: "GET",
            url: '../ajax/ecuasistenciaEncuestaC.php?action=code',
            data: {camp: camp, level1: level1, level2: level2},
            success: function (r) {
                $('#code').val(r);
                if (r == "") {
                    $('#level3').attr('disabled', false);
                    $('#level3').attr('required', true);
                } else {
                    $('#level3').attr('disabled', true);
                    $('#level3').attr('required', false);
                }
                if (r == 1) {
                    var tipoContrato = $('#TIPO_CONTRATO').val();
                    if (tipoContrato == "VEHICULAR_EQ") {
                        $("#agenda").attr("readonly", true);
                        $("#agenda").attr("required", false);
                        $("#obs").attr("required", false);
                        $('#pnlEncuesta').hide();
                        $('#pnlEncuestaAntiguaLegal').hide();
                        $('#pnlEncuestaAntiguaVIP').hide();
                        $('#pnlEncuestaVehicularEq').show();
                        pnlEncuestaAntiguaLegal(false);
                        pnlEncuestaAntiguaVIP(false);
                        pnlEncuestaVehicularEq(true);
                        $('#respuesta1').attr('required', false);
                        $('#respuesta1_1').attr('required', false);
                        $('#respuesta2').attr('required', false);
                        $('#respuesta3').attr('required', false);
                        $('#respuesta3_1').attr('required', false);
                        $('#respuesta4').attr('required', false);
                        $('#respuesta6_1_VIP').attr('required', false);
                        $('#respuesta7_1_VIP').attr('required', false);
                        $('#respuesta8_1_VIP').attr('required', false);
                        $('#respuesta9_1_VIP').attr('required', false);
                    } else if (tipoContrato == "LEGAL_EQ") {
                        $("#agenda").attr("readonly", true);
                        $("#agenda").attr("required", false);
                        $("#obs").attr("required", false);
                        $('#pnlEncuesta').hide();
                        $('#pnlEncuestaAntiguaLegal').show();
                        $('#pnlEncuestaAntiguaVIP').hide();
                        $('#pnlEncuestaVehicularEq').hide();
                        pnlEncuestaAntiguaLegal(true);
                        pnlEncuestaAntiguaVIP(false);
                        pnlEncuestaVehicularEq(false);
                        $('#respuesta1').attr('required', false);
                        $('#respuesta1_1').attr('required', false);
                        $('#respuesta2').attr('required', false);
                        $('#respuesta3').attr('required', false);
                        $('#respuesta3_1').attr('required', false);
                        $('#respuesta4').attr('required', false);
                        $('#respuesta6_1_VIP').attr('required', false);
                        $('#respuesta7_1_VIP').attr('required', false);
                        $('#respuesta8_1_VIP').attr('required', false);
                        $('#respuesta9_1_VIP').attr('required', false);
                        $('#respuesta5_1_VEH_EQ').attr('required', false);
                        $('#respuesta6_1_VEH_EQ').attr('required', false);
                        $('#respuesta7_1_VEH_EQ').attr('required', false);
                        $('#respuesta8_1_VEH_EQ').attr('required', false);
                        $('#respuesta9_1_VEH_EQ').attr('required', false);
                    } else if (tipoContrato == "VIP_EQ") {
                        $("#agenda").attr("readonly", true);
                        $("#agenda").attr("required", false);
                        $("#obs").attr("required", false);
                        $('#pnlEncuesta').hide();
                        $('#pnlEncuestaAntiguaLegal').hide();
                        $('#pnlEncuestaAntiguaVIP').show();
                        $('#pnlEncuestaVehicularEq').hide();
                        pnlEncuestaAntiguaLegal(false);
                        pnlEncuestaAntiguaVIP(true);
                        pnlEncuestaVehicularEq(false);
                        $('#respuesta1').attr('required', false);
                        $('#respuesta1_1').attr('required', false);
                        $('#respuesta2').attr('required', false);
                        $('#respuesta3').attr('required', false);
                        $('#respuesta3_1').attr('required', false);
                        $('#respuesta4').attr('required', false);
                        $('#respuesta5_1_VEH_EQ').attr('required', false);
                        $('#respuesta6_1_VEH_EQ').attr('required', false);
                        $('#respuesta7_1_VEH_EQ').attr('required', false);
                        $('#respuesta8_1_VEH_EQ').attr('required', false);
                        $('#respuesta9_1_VEH_EQ').attr('required', false);
                    } else {
                        $("#agenda").attr("readonly", true);
                        $("#agenda").attr("required", false);
                        $("#obs").attr("required", false);
                        $('#pnlEncuesta').show();
                        $('#pnlEncuestaAntiguaLegal').hide();
                        $('#pnlEncuestaAntiguaVIP').hide();
                        $('#pnlEncuestaVehicularEq').hide();
                        pnlEncuestaAntiguaLegal(false);
                        pnlEncuestaAntiguaVIP(false);
                        pnlEncuestaVehicularEq(false);
                        $('#respuesta1').attr('required', true);
                        $('#respuesta2').attr('required', true);
                        $('#respuesta3').attr('required', true);
                        $('#respuesta4').attr('required', true);
                        $('#respuesta6_1_VIP').attr('required', false);
                        $('#respuesta7_1_VIP').attr('required', false);
                        $('#respuesta8_1_VIP').attr('required', false);
                        $('#respuesta9_1_VIP').attr('required', false);
                        $('#respuesta5_1_VEH_EQ').attr('required', false);
                        $('#respuesta6_1_VEH_EQ').attr('required', false);
                        $('#respuesta7_1_VEH_EQ').attr('required', false);
                        $('#respuesta8_1_VEH_EQ').attr('required', false);
                        $('#respuesta9_1_VEH_EQ').attr('required', false);
                    }
                } else if (r == 18 || r == 20) {
                    $("#agenda").attr("readonly", false);
                    $("#agenda").attr("required", true);
                    $("#obs").attr("required", true);
                    $('#pnlEncuesta').hide();
                    $('#pnlEncuestaAntiguaLegal').hide();
                    $('#pnlEncuestaAntiguaVIP').hide();
                    $('#pnlEncuestaVehicularEq').hide();
                    $('#respuesta1').attr('required', false);
                    $('#respuesta1_1').attr('required', false);
                    $('#respuesta2').attr('required', false);
                    $('#respuesta3').attr('required', false);
                    $('#respuesta3_1').attr('required', false);
                    $('#respuesta4').attr('required', false);
                    pnlEncuestaAntiguaLegal(false);
                    pnlEncuestaAntiguaVIP(false);
                    pnlEncuestaVehicularEq(false);
                    $('#respuesta6_1_VIP').attr('required', false);
                    $('#respuesta7_1_VIP').attr('required', false);
                    $('#respuesta8_1_VIP').attr('required', false);
                    $('#respuesta9_1_VIP').attr('required', false);
                    $('#respuesta5_1_VEH_EQ').attr('required', false);
                    $('#respuesta6_1_VEH_EQ').attr('required', false);
                    $('#respuesta7_1_VEH_EQ').attr('required', false);
                    $('#respuesta8_1_VEH_EQ').attr('required', false);
                    $('#respuesta9_1_VEH_EQ').attr('required', false);
                } else {
                    $('#pnlEncuesta').hide();
                    $("#agenda").attr("readonly", true);
                    $("#agenda").attr("required", false);
                    $("#obs").attr("required", false);
                    $('#respuesta1').attr('required', false);
                    $('#respuesta1_1').attr('required', false);
                    $('#respuesta2').attr('required', false);
                    $('#respuesta3').attr('required', false);
                    $('#respuesta3_1').attr('required', false);
                    $('#respuesta4').attr('required', false);
                    pnlEncuestaAntiguaLegal(false);
                    pnlEncuestaAntiguaVIP(false);
                    pnlEncuestaVehicularEq(false);
                    $('#respuesta6_1_VIP').attr('required', false);
                    $('#respuesta7_1_VIP').attr('required', false);
                    $('#respuesta8_1_VIP').attr('required', false);
                    $('#respuesta9_1_VIP').attr('required', false);
                    $('#respuesta5_1_VEH_EQ').attr('required', false);
                    $('#respuesta6_1_VEH_EQ').attr('required', false);
                    $('#respuesta7_1_VEH_EQ').attr('required', false);
                    $('#respuesta8_1_VEH_EQ').attr('required', false);
                    $('#respuesta9_1_VEH_EQ').attr('required', false);
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
            url: '../ajax/ecuasistenciaEncuestaC.php?action=code1',
            data: {camp: camp, level1: level1, level2: level2, level3: level3},
            success: function (r) {
                $('#code').val(r);
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
            url: '../ajax/ecuasistenciaEncuestaC.php?action=updatePhones',
            method: 'POST',
            data: {IDC: IDC, fonos: phones, estatusTel: estatusTel},
            success: function (r) {
                bootbox.alert(r);
                $.ajax({
                    type: "GET",
                    url: '../ajax/ecuasistenciaEncuestaC.php?action=telefonos',
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
    if ($('#respuesta1').val() == '1' || $('#respuesta1').val() == '2' || $('#respuesta1').val() == '3') {
        $('#pregunta1_1').show();
        $('#respuesta1_1').show();
        $('#respuesta1_1').attr('readonly', false);
        $('#respuesta1_1').attr('required', true);
    } else {
        $('#respuesta1_1').val("");
        $('#pregunta1_1').hide();
        $('#respuesta1_1').hide();
        $('#respuesta1_1').attr('readonly', true);
        $('#respuesta1_1').attr('required', false);
    }
});

$('#respuesta2').change(function () {
    var tipo_contrato = $('#TIPO_CONTRATO').val();
    if ($('#respuesta2').val() == '1' || $('#respuesta2').val() == '2' || $('#respuesta2').val() == '3' || $('#respuesta2').val() == '4' ||
            $('#respuesta2').val() == '5' || $('#respuesta2').val() == '6' || $('#respuesta2').val() == '7') {
        $('#pregunta2_1').show();
        if (tipo_contrato == 'VEHICULAR') {
            $('#vehicular').show();
        } else {
            $('#vehicular').hide();
        }
        if (tipo_contrato == 'HOGAR') {
            $('#hogar').show();
        } else {
            $('#hogar').hide();
        }
        if (tipo_contrato == 'PERSONAS') {
            $('#personas').show();
        } else {
            $('#personas').hide();
        }
        if (tipo_contrato == 'LEGAL') {
            $('#legal').show();
        } else {
            $('#legal').hide();
        }
    } else if ($('#respuesta2').val() == '8' || $('#respuesta2').val() == '9' || $('#respuesta2').val() == '10' ||
            $('#respuesta2').val() == '' || $('#respuesta2').val() == 'NO PROPORCIONA INFORMACION') {
        $('#pregunta2_1').hide();
        $('#vehicular').hide();
        $('#hogar').hide();
        $('#personas').hide();
        $('#legal').hide();
    }
});

$('#rad_LEG1').change(function () {
    var txt = $('#rad_LEG1').val();
    if ($("#rad_LEG1").is(":checked")) {
        $('#rad_txt').val(txt);
    } else {
        $('#rad_txt').val("");
    }
});

$('#rad_LEG2').change(function () {
    var txt = $('#rad_LEG2').val();
    if ($("#rad_LEG2").is(":checked")) {
        $('#rad_txt').val(txt);
    } else {
        $('#rad_txt').val("");
    }
});

$('#rad_LEG3').change(function () {
    var txt = $('#rad_LEG3').val();
    if ($("#rad_LEG3").is(":checked")) {
        $('#rad_txt').val(txt);
    } else {
        $('#rad_txt').val("");
    }
});

$('#respuesta3').change(function () {
    if ($('#respuesta3').val() == '0' || $('#respuesta3').val() == '1' || $('#respuesta3').val() == '2' ||
            $('#respuesta3').val() == '3' || $('#respuesta3').val() == '4' || $('#respuesta3').val() == '5' ||
            $('#respuesta3').val() == '6' || $('#respuesta3').val() == '7') {
        $('#pregunta3_2').show();
        $('#respuesta3_1').show();
        $('#pregunta3_1').hide();
        $('#respuesta3_1').attr('required', true);
    } else if ($('#respuesta3').val() == '') {
        $('#pregunta3_1').hide();
        $('#respuesta3_1').hide();
        $('#pregunta3_2').hide();
        $('#respuesta3_1').attr('required', true);
    } else if ($('#respuesta3').val() == 'NO PROPORCIONA INFORMACION') {
        $('#pregunta3_1').hide();
        $('#respuesta3_1').hide();
        $('#pregunta3_2').hide();
        $('#respuesta3_1').attr('required', false);
    } else if ($('#respuesta3').val() == '8' || $('#respuesta3').val() == '9' || $('#respuesta3').val() == '10') {
        $('#pregunta3_1').show();
        $('#respuesta3_1').show();
        $('#pregunta3_2').hide();
        $('#respuesta3_1').attr('required', true);
    }
});

$('#respuesta6_VIP').change(function () {
    if ($('#respuesta6_VIP').val() == '1' || $('#respuesta6_VIP').val() == '2' || $('#respuesta6_VIP').val() == '3' ||
            $('#respuesta6_VIP').val() == '4' || $('#respuesta6_VIP').val() == '5' || $('#respuesta6_VIP').val() == '6' ||
            $('#respuesta6_VIP').val() == '7') {
        $('#pregunta6_1_VIP').show();
        $('#respuesta6_1_VIP').show();
        $('#respuesta6_1_VIP').attr('required', true);
    } else {
        $('#respuesta6_1_VIP').val("");
        $('#pregunta6_1_VIP').hide();
        $('#respuesta6_1_VIP').hide();
        $('#respuesta6_1_VIP').attr('required', false);
    }
});

$('#respuesta7_VIP').change(function () {
    if ($('#respuesta7_VIP').val() == '1' || $('#respuesta7_VIP').val() == '2' || $('#respuesta7_VIP').val() == '3' ||
            $('#respuesta7_VIP').val() == '4' || $('#respuesta7_VIP').val() == '5' || $('#respuesta7_VIP').val() == '6' ||
            $('#respuesta7_VIP').val() == '7') {
        $('#pregunta7_1_VIP').show();
        $('#respuesta7_1_VIP').show();
        $('#respuesta7_1_VIP').attr('required', true);
    } else {
        $('#respuesta7_1_VIP').val("");
        $('#pregunta7_1_VIP').hide();
        $('#respuesta7_1_VIP').hide();
        $('#respuesta7_1_VIP').attr('required', false);
    }
});

$('#respuesta8_VIP').change(function () {
    if ($('#respuesta8_VIP').val() == '0' || $('#respuesta8_VIP').val() == '1' || $('#respuesta8_VIP').val() == '2' ||
            $('#respuesta8_VIP').val() == '3' || $('#respuesta8_VIP').val() == '4' || $('#respuesta8_VIP').val() == '5' ||
            $('#respuesta8_VIP').val() == '6' || $('#respuesta8_VIP').val() == '7') {
        $('#pregunta8_2_VIP').show();
        $('#respuesta8_1_VIP').show();
        $('#pregunta8_1_VIP').hide();
        $('#respuesta8_1_VIP').attr('required', true);
    } else if ($('#respuesta8_VIP').val() == '') {
        $('#pregunta8_1_VIP').hide();
        $('#respuesta8_1_VIP').hide();
        $('#pregunta8_2_VIP').hide();
        $('#respuesta8_1_VIP').attr('required', true);
    } else if ($('#respuesta8_VIP').val() == 'NO PROPORCIONA INFORMACION' || $('#respuesta8_VIP').val() == 'SOLICITO SU BROADCAST') {
        $('#pregunta8_1_VIP').hide();
        $('#respuesta8_1_VIP').hide();
        $('#pregunta8_2_VIP').hide();
        $('#respuesta8_1_VIP').attr('required', false);
    } else if ($('#respuesta8_VIP').val() == '8' || $('#respuesta8_VIP').val() == '9' || $('#respuesta8_VIP').val() == '10') {
        $('#pregunta8_1_VIP').show();
        $('#respuesta8_1_VIP').show();
        $('#pregunta8_2_VIP').hide();
        $('#respuesta8_1_VIP').attr('required', true);
    }
});

$('#respuesta9_VIP').change(function () {
    if ($('#respuesta9_VIP').val() == 'POCO FACIL' || $('#respuesta9_VIP').val() == 'DIFICIL' || $('#respuesta9_VIP').val() == 'MUY DIFICIL') {
        $('#pregunta9_1_VIP').show();
        $('#respuesta9_1_VIP').show();
        $('#respuesta9_1_VIP').attr('required', true);
    } else {
        $('#respuesta9_1_VIP').val("");
        $('#pregunta9_1_VIP').hide();
        $('#respuesta9_1_VIP').hide();
        $('#respuesta9_1_VIP').attr('required', false);
    }
});

$('#respuesta5_VEH_EQ').change(function () {
    if ($('#respuesta5_VEH_EQ').val() == '1' || $('#respuesta5_VEH_EQ').val() == '2' || $('#respuesta5_VEH_EQ').val() == '3' ||
            $('#respuesta5_VEH_EQ').val() == '4' || $('#respuesta5_VEH_EQ').val() == '5' || $('#respuesta5_VEH_EQ').val() == '6' ||
            $('#respuesta5_VEH_EQ').val() == '7') {
        $('#pregunta5_1_VEH_EQ').show();
        $('#respuesta5_1_VEH_EQ').show();
        $('#respuesta5_1_VEH_EQ').attr('required', true);
    } else {
        $('#respuesta5_1_VEH_EQ').val("");
        $('#pregunta5_1_VEH_EQ').hide();
        $('#respuesta5_1_VEH_EQ').hide();
        $('#respuesta5_1_VEH_EQ').attr('required', false);
    }
});

$('#respuesta6_VEH_EQ').change(function () {
    if ($('#respuesta6_VEH_EQ').val() == '1' || $('#respuesta6_VEH_EQ').val() == '2' || $('#respuesta6_VEH_EQ').val() == '3' ||
            $('#respuesta6_VEH_EQ').val() == '4' || $('#respuesta6_VEH_EQ').val() == '5' || $('#respuesta6_VEH_EQ').val() == '6' ||
            $('#respuesta6_VEH_EQ').val() == '7') {
        $('#pregunta6_1_VEH_EQ').show();
        $('#respuesta6_1_VEH_EQ').show();
        $('#respuesta6_1_VEH_EQ').attr('required', true);
    } else {
        $('#respuesta6_1_VEH_EQ').val("");
        $('#pregunta6_1_VEH_EQ').hide();
        $('#respuesta6_1_VEH_EQ').hide();
        $('#respuesta6_1_VEH_EQ').attr('required', false);
    }
});

$('#respuesta7_VEH_EQ').change(function () {
    if ($('#respuesta7_VEH_EQ').val() == '1' || $('#respuesta7_VEH_EQ').val() == '2' ||
            $('#respuesta7_VEH_EQ').val() == '3' || $('#respuesta7_VEH_EQ').val() == '4' || $('#respuesta7_VEH_EQ').val() == '5' ||
            $('#respuesta7_VEH_EQ').val() == '6' || $('#respuesta7_VEH_EQ').val() == '7' || $('#respuesta7_VEH_EQ').val() == '8') {
        $('#respuesta7_1_VEH_EQ').show();
        $('#pregunta7_1_VEH_EQ').show();
        $('#respuesta7_1_VEH_EQ').attr('required', true);
    } else if ($('#respuesta7_VEH_EQ').val() == 'NO PROPORCIONA INFORMACION' || $('#respuesta7_VEH_EQ').val() == 'SOLICITO SU BROADCAST'
            || $('#respuesta7_VEH_EQ').val() == '9' || $('#respuesta7_VEH_EQ').val() == '10' || $('#respuesta7_VEH_EQ').val() == '0'
            || $('#respuesta7_VEH_EQ').val() == '') {
        $('#pregunta7_1_VEH_EQ').hide();
        $('#respuesta7_1_VEH_EQ').hide();
        $('#respuesta7_1_VEH_EQ').attr('required', false);
    }
});

$('#respuesta8_VEH_EQ').change(function () {
    if ($('#respuesta8_VEH_EQ').val() == 'POCO FACIL' || $('#respuesta8_VEH_EQ').val() == 'DIFICIL' || $('#respuesta8_VEH_EQ').val() == 'MUY DIFICIL') {
        $('#pregunta8_1_VEH_EQ').show();
        $('#respuesta8_1_VEH_EQ').show();
        $('#respuesta8_1_VEH_EQ').attr('required', true);
    } else {
        $('#respuesta8_1_VEH_EQ').val("");
        $('#pregunta8_1_VEH_EQ').hide();
        $('#respuesta8_1_VEH_EQ').hide();
        $('#respuesta8_1_VEH_EQ').attr('required', false);
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
    var tipo_contrato = $('#TIPO_CONTRATO').val();
    var code = $('#code').val();
    if (code == "1") {
        if (tipo_contrato == 'VIP_EQ' || tipo_contrato == 'LEGAL_EQ' || tipo_contrato == "VEHICULAR_EQ") {
            $.ajax({
                type: "GET",
                url: '../ajax/ecuasistenciaEncuestaC.php?action=validePhone',
                data: {IdClient: IdClient},
                success: function (v) {
                    var r = $("#code").val();
                    if (v == "Almacene un número de teléfono para continuar!") {
                        event.preventDefault();
                        bootbox.alert(v);
                    } else {

                        var formData = new FormData($("#formulario")[0]);
                        $.ajax({
                            url: "../ajax/ecuasistenciaEncuestaC.php?action=save",
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
        if (tipo_contrato == 'VEHICULAR') {
            if ($('#respuesta2').val() == '1' || $('#respuesta2').val() == '2' || $('#respuesta2').val() == '3' || $('#respuesta2').val() == '4' ||
                    $('#respuesta2').val() == '5' || $('#respuesta2').val() == '6' || $('#respuesta2').val() == '7') {
                if (!$('#chk_VEH1').is(":checked") && !$('#chk_VEH2').is(":checked") && !$('#chk_VEH3').is(":checked") &&
                        !$('#chk_VEH4').is(":checked") && !$('#chk_VEH5').is(":checked") && !$('#chk_VEH6').is(":checked")) {
                    bootbox.alert("Debe seleccionar al menos una opción en la pregunta 2.1");
                } else {
                    $.ajax({
                        type: "GET",
                        url: '../ajax/ecuasistenciaEncuestaC.php?action=validePhone',
                        data: {IdClient: IdClient},
                        success: function (v) {
                            var r = $("#code").val();
                            if (v == "Almacene un número de teléfono para continuar!") {
                                event.preventDefault();
                                bootbox.alert(v);
                            } else {

                                var formData = new FormData($("#formulario")[0]);
                                $.ajax({
                                    url: "../ajax/ecuasistenciaEncuestaC.php?action=save",
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
            } else if ($('#respuesta2').val() == '8' || $('#respuesta2').val() == '9' || $('#respuesta2').val() == '10' || $('#respuesta2').val() == 'NO PROPORCIONA INFORMACION') {
                $.ajax({
                    type: "GET",
                    url: '../ajax/ecuasistenciaEncuestaC.php?action=validePhone',
                    data: {IdClient: IdClient},
                    success: function (v) {
                        var r = $("#code").val();
                        if (v == "Almacene un número de teléfono para continuar!") {
                            event.preventDefault();
                            bootbox.alert(v);
                        } else {

                            var formData = new FormData($("#formulario")[0]);
                            $.ajax({
                                url: "../ajax/ecuasistenciaEncuestaC.php?action=save",
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
        if (tipo_contrato == 'HOGAR') {
            if ($('#respuesta2').val() == '1' || $('#respuesta2').val() == '2' || $('#respuesta2').val() == '3' || $('#respuesta2').val() == '4' ||
                    $('#respuesta2').val() == '5' || $('#respuesta2').val() == '6' || $('#respuesta2').val() == '7') {
                if (!$('#chk_HOG1').is(":checked") && !$('#chk_HOG2').is(":checked") && !$('#chk_HOG3').is(":checked") &&
                        !$('#chk_HOG4').is(":checked") && !$('#chk_HOG5').is(":checked")) {
                    bootbox.alert("Debe seleccionar al menos una opción en la pregunta 2.1");
                } else {
                    $.ajax({
                        type: "GET",
                        url: '../ajax/ecuasistenciaEncuestaC.php?action=validePhone',
                        data: {IdClient: IdClient},
                        success: function (v) {
                            var r = $("#code").val();
                            if (v == "Almacene un número de teléfono para continuar!") {
                                event.preventDefault();
                                bootbox.alert(v);
                            } else {

                                var formData = new FormData($("#formulario")[0]);
                                $.ajax({
                                    url: "../ajax/ecuasistenciaEncuestaC.php?action=save",
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
            } else if ($('#respuesta2').val() == '8' || $('#respuesta2').val() == '9' || $('#respuesta2').val() == '10' || $('#respuesta2').val() == 'NO PROPORCIONA INFORMACION') {
                $.ajax({
                    type: "GET",
                    url: '../ajax/ecuasistenciaEncuestaC.php?action=validePhone',
                    data: {IdClient: IdClient},
                    success: function (v) {
                        var r = $("#code").val();
                        if (v == "Almacene un número de teléfono para continuar!") {
                            event.preventDefault();
                            bootbox.alert(v);
                        } else {

                            var formData = new FormData($("#formulario")[0]);
                            $.ajax({
                                url: "../ajax/ecuasistenciaEncuestaC.php?action=save",
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
        if (tipo_contrato == 'PERSONAS') {
            if ($('#respuesta2').val() == '1' || $('#respuesta2').val() == '2' || $('#respuesta2').val() == '3' || $('#respuesta2').val() == '4' ||
                    $('#respuesta2').val() == '5' || $('#respuesta2').val() == '6' || $('#respuesta2').val() == '7') {
                if (!$('#chk_PER1').is(":checked") && !$('#chk_PER2').is(":checked") && !$('#chk_PER3').is(":checked") &&
                        !$('#chk_PER4').is(":checked") && !$('#chk_PER5').is(":checked")) {
                    bootbox.alert("Debe seleccionar al menos una opción en la pregunta 2.1");
                } else {
                    $.ajax({
                        type: "GET",
                        url: '../ajax/ecuasistenciaEncuestaC.php?action=validePhone',
                        data: {IdClient: IdClient},
                        success: function (v) {
                            var r = $("#code").val();
                            if (v == "Almacene un número de teléfono para continuar!") {
                                event.preventDefault();
                                bootbox.alert(v);
                            } else {

                                var formData = new FormData($("#formulario")[0]);
                                $.ajax({
                                    url: "../ajax/ecuasistenciaEncuestaC.php?action=save",
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
            } else if ($('#respuesta2').val() == '8' || $('#respuesta2').val() == '9' || $('#respuesta2').val() == '10' || $('#respuesta2').val() == 'NO PROPORCIONA INFORMACION') {
                $.ajax({
                    type: "GET",
                    url: '../ajax/ecuasistenciaEncuestaC.php?action=validePhone',
                    data: {IdClient: IdClient},
                    success: function (v) {
                        var r = $("#code").val();
                        if (v == "Almacene un número de teléfono para continuar!") {
                            event.preventDefault();
                            bootbox.alert(v);
                        } else {

                            var formData = new FormData($("#formulario")[0]);
                            $.ajax({
                                url: "../ajax/ecuasistenciaEncuestaC.php?action=save",
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
        if (tipo_contrato == 'LEGAL') {
            if ($('#respuesta2').val() == '1' || $('#respuesta2').val() == '2' || $('#respuesta2').val() == '3' || $('#respuesta2').val() == '4' ||
                    $('#respuesta2').val() == '5' || $('#respuesta2').val() == '6' || $('#respuesta2').val() == '7') {
                if (!$('#rad_LEG1').is(":checked") && !$('#rad_LEG2').is(":checked") && !$('#rad_LEG3').is(":checked")) {
                    bootbox.alert("Debe seleccionar al menos una opción en la pregunta 2.1");
                } else {
                    $.ajax({
                        type: "GET",
                        url: '../ajax/ecuasistenciaEncuestaC.php?action=validePhone',
                        data: {IdClient: IdClient},
                        success: function (v) {
                            var r = $("#code").val();
                            if (v == "Almacene un número de teléfono para continuar!") {
                                event.preventDefault();
                                bootbox.alert(v);
                            } else {

                                var formData = new FormData($("#formulario")[0]);
                                $.ajax({
                                    url: "../ajax/ecuasistenciaEncuestaC.php?action=save",
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
            } else if ($('#respuesta2').val() == '8' || $('#respuesta2').val() == '9' || $('#respuesta2').val() == '10' || $('#respuesta2').val() == 'NO PROPORCIONA INFORMACION') {
                $.ajax({
                    type: "GET",
                    url: '../ajax/ecuasistenciaEncuestaC.php?action=validePhone',
                    data: {IdClient: IdClient},
                    success: function (v) {
                        var r = $("#code").val();
                        if (v == "Almacene un número de teléfono para continuar!") {
                            event.preventDefault();
                            bootbox.alert(v);
                        } else {

                            var formData = new FormData($("#formulario")[0]);
                            $.ajax({
                                url: "../ajax/ecuasistenciaEncuestaC.php?action=save",
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
    } else {
        $.ajax({
            type: "GET",
            url: '../ajax/ecuasistenciaEncuestaC.php?action=validePhone',
            data: {IdClient: IdClient},
            success: function (v) {
                var r = $("#code").val();
                if (v == "Almacene un número de teléfono para continuar!") {
                    event.preventDefault();
                    bootbox.alert(v);
                } else {

                    var formData = new FormData($("#formulario")[0]);
                    $.ajax({
                        url: "../ajax/ecuasistenciaEncuestaC.php?action=save",
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

function pnlEncuestaAntiguaLegal(state) {
    $('#respuesta1_LEGAL').attr('required', state);
    $('#respuesta2_LEGAL').attr('required', state);
    $('#respuesta3_LEGAL').attr('required', state);
    $('#respuesta4_LEGAL').attr('required', state);
    $('#respuesta5_LEGAL').attr('required', state);
    $('#respuesta6_LEGAL').attr('required', state);
    $('#respuesta7_LEGAL').attr('required', state);
    $('#respuesta8_LEGAL').attr('required', state);
    $('#respuesta9_LEGAL').attr('required', state);
    $('#respuesta10_LEGAL').attr('required', state);
}

function pnlEncuestaAntiguaVIP(state) {
    $('#respuesta1_VIP').attr('required', state);
    $('#respuesta2_VIP').attr('required', state);
    $('#respuesta3_VIP').attr('required', state);
    $('#respuesta4_VIP').attr('required', state);
    $('#respuesta5_VIP').attr('required', state);
    $('#respuesta6_VIP').attr('required', state);
    $('#respuesta7_VIP').attr('required', state);
    $('#respuesta8_VIP').attr('required', state);
    $('#respuesta9_VIP').attr('required', state);
    $('#respuesta10_VIP').attr('required', state);
    $('#respuesta11_VIP').attr('required', state);
}

function pnlEncuestaVehicularEq(state) {
    $('#respuesta1_VEH_EQ').attr('required', state);
    $('#respuesta2_VEH_EQ').attr('required', state);
    $('#respuesta3_VEH_EQ').attr('required', state);
    $('#respuesta4_VEH_EQ').attr('required', state);
    $('#respuesta5_VEH_EQ').attr('required', state);
    $('#respuesta6_VEH_EQ').attr('required', state);
    $('#respuesta7_VEH_EQ').attr('required', state);
    $('#respuesta8_VEH_EQ').attr('required', state);
    $('#respuesta9_VEH_EQ').attr('required', state);
    $('#respuesta10_VEH_EQ').attr('required', state);
}