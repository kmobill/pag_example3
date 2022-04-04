var tabla;
function init() { /* función inicial */
    mostrar_formulario(false);
    mostrar_todos();
    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
    //divs y paneles a ocultar
    $('#pnlEncuesta').hide();
    pnlEncuesta(false);
    $('#otro').attr('disabled', true);
    $('#fonoAd').on("paste", function (e) {
        e.preventDefault();
    });
    $('#level3').attr('disabled', true);
    $('#respuesta5').attr('readonly', true);
    $('#respuesta6').attr('readonly', true);
    $('#respuesta7').attr('readonly', true);
    $('#respuesta8').attr('readonly', true);
    $('#respuesta9').attr('readonly', true);
    $('#respuesta10').attr('readonly', true);
    $('#respuesta11').attr('readonly', true);
    $('#respuesta12').attr('readonly', true);
    $('#respuesta13').attr('readonly', true);
    $('#respuesta21').attr('readonly', true);
    $('#respuesta22').attr('readonly', true);
}

function limpiar_formulario() {
    $("#titulo").text("Campaña BP Encuestas");
    $("#titulo1").text("");
    $("#titulo2").text("");
    $('#pnlEncuesta').hide();
    $('#respuesta5').attr('required', false);
    $('#respuesta5').attr('readonly', true);
    $('#respuesta6').attr('required', false);
    $('#respuesta6').attr('readonly', true);
    $('#respuesta7').attr('required', false);
    $('#respuesta7').attr('readonly', true);
    $('#respuesta8').attr('required', false);
    $('#respuesta8').attr('readonly', true);
    $('#respuesta9').attr('required', false);
    $('#respuesta9').attr('readonly', true);
    $('#respuesta11').attr('required', false);
    $('#respuesta11').attr('readonly', true);
    $('#respuesta12').attr('required', false);
    $('#respuesta12').attr('readonly', true);
    $('#respuesta13').attr('required', false);
    $('#respuesta13').attr('readonly', true);
    $('#respuesta21').attr('required', false);
    $('#respuesta21').attr('readonly', true);
    $('#respuesta22').attr('required', false);
    $('#respuesta22').attr('readonly', true);
    $('#respuesta5').val("");
    $('#respuesta6').val("");
    $('#respuesta7').val("");
    $('#respuesta8').val("");
    $('#respuesta9').val("");
    $('#respuesta11').val("");
    $('#respuesta12').val("");
    $('#respuesta13').val("");
    $('#respuesta21').val("");
    $('#respuesta22').val("");
    $("#chk_ENC1").prop("checked", false);
    $("#chk_ENC2").prop("checked", false);
    $("#chk_ENC3").prop("checked", false);
    $("#chk_ENC4").prop("checked", false);
    $("#chk_ENC6").prop("checked", false);
    $("#chk_ENC7").prop("checked", false);
    $("#chk_ENC8").prop("checked", false);
    $("#chk_ENC9").prop("checked", false);
    $("#chk_ENC10").prop("checked", false);
    $("#chk_ENC11").prop("checked", false);
    $("#chk_ENC12").prop("checked", false);
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
            url: '../ajax/bpEncuestaAhorroProgramado1.php?action=selectAll',
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
    $.post("../ajax/bpEncuestaAhorroProgramado1.php?action=selectById", {Id: Id}, function (datos, estado) {
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
        $('#CAMPO1').val(datos.CAMPO1);
        $('#CAMPO2').val(datos.CAMPO2);
        $('#CAMPO3').val(datos.CAMPO3);
        $('#CAMPO4').val(datos.CAMPO4);
        $('#CAMPO5').val(datos.CAMPO5);
        $('#CAMPO6').val(datos.CAMPO6);
        $('#CAMPO7').val(datos.CAMPO7);
        $('#CAMPO8').val(datos.CAMPO8);
        $('#CAMPO9').val(datos.CAMPO9);
        $('#CAMPO10').val(datos.CAMPO10);
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
            url: '../ajax/bpEncuestaAhorroProgramado1.php?action=code',
            data: {camp: camp, level1: level1, level2: level2},
            success: function (r) {
                $('#code').val(r);
                if (r == 1) {
//                    $('#respuesta5').attr('required', true);
                    $('#respuesta5').attr('readonly', false);
//                    $('#respuesta7').attr('required', true);
                    $('#respuesta7').attr('readonly', false);
//                    $('#respuesta8').attr('required', true);
                    $('#respuesta8').attr('readonly', false);
//                    $('#respuesta9').attr('required', true);
                    $('#respuesta9').attr('readonly', false);
//                    $('#respuesta11').attr('required', true);
                    $('#respuesta11').attr('readonly', false);
//                    $('#respuesta12').attr('required', true);
                    $('#respuesta12').attr('readonly', false);
//                    $('#respuesta13').attr('required', true);
                    $('#respuesta13').attr('readonly', false);
//                    $('#respuesta21').attr('required', true);
                    $('#respuesta21').attr('readonly', false);
//                    $('#respuesta22').attr('required', true);
                    $('#respuesta22').attr('readonly', false);
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
            url: '../ajax/bpEncuestaAhorroProgramado1.php?action=code1',
            data: {camp: camp, level1: level1, level2: level2, level3: level3},
            success: function (r) {
                $('#code').val(r);
            }
        });
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

$('#respuesta5').change(function () {
    if ($('#respuesta5').val() == '1' || $('#respuesta5').val() == '2' || $('#respuesta5').val() == '3') {
        $('#pregunta6').val("¿Por qué no le parece atractivo el producto?");
        $('#respuesta6').attr('required', true);
        $('#respuesta6').attr('readonly', false);

    } else {
        $('#respuesta6').attr('required', false);
        $('#respuesta6').attr('readonly', true);
        $('#respuesta6').val("");
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
            url: "../ajax/bpEncuestaAhorroProgramado1.php?action=save",
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
                        url: "../ajax/bpEncuestaAhorroProgramado1.php?action=save",
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
                        url: "../ajax/bpEncuestaAhorroProgramado1.php?action=save",
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