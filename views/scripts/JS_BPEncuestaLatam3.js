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
    $('#pregunta2').hide();
    $('#respuesta2').hide();
    $('#respuesta2').attr('required', false);
    $('#respuesta2').attr('readonly', true);
    $('#pregunta3').hide();
    $('#respuesta3').hide();
    $('#respuesta3').attr('required', false);
    $('#respuesta3').attr('readonly', true);
    $('#pregunta4').hide();
    $('#respuesta4').hide();
    $('#respuesta4').attr('required', false);
    $('#respuesta4').attr('readonly', true);
    $('#pregunta5').hide();
    $('#respuesta5').hide();
    $('#respuesta5').attr('required', false);
    $('#respuesta5').attr('readonly', true);
    $('#pregunta6').hide();
    $('#respuesta6').hide();
    $('#respuesta6').attr('required', false);
    $('#respuesta6').attr('readonly', true);
    $('#pregunta7').hide();
    $('#respuesta7').hide();
    $('#respuesta7').attr('required', false);
    $('#respuesta7').attr('readonly', true);
    $('#pregunta8').hide();
    $('#respuesta8').hide();
    $('#respuesta8').attr('required', false);
    $('#respuesta8').attr('readonly', true);
    $('#pregunta9').hide();
    $('#respuesta9').hide();
    $('#respuesta9').attr('required', false);
    $('#respuesta9').attr('readonly', true);
    $('#pregunta10').hide();
    $('#respuesta10').hide();
    $('#respuesta10').attr('required', false);
    $('#respuesta10').attr('readonly', true);
    $('#pregunta11').hide();
    $('#respuesta11').hide();
    $('#respuesta11').attr('required', false);
    $('#respuesta11').attr('readonly', true);
    $('#pregunta12').hide();
    $('#respuesta12').hide();
    $('#respuesta12').attr('required', false);
    $('#respuesta12').attr('readonly', true);
    $('#pregunta13').hide();
    $('#respuesta13').hide();
    $('#respuesta13').attr('required', false);
    $('#respuesta13').attr('readonly', true);
    $('#pregunta14').hide();
    $('#respuesta14').hide();
    $('#respuesta14').attr('required', false);
    $('#respuesta14').attr('readonly', true);
    $('#pregunta15').hide();
    $('#respuesta15').hide();
    $('#respuesta15').attr('required', false);
    $('#respuesta15').attr('readonly', true);
    $('#pregunta16').hide();
    $('#respuesta16').hide();
    $('#respuesta16').attr('required', false);
    $('#respuesta16').attr('readonly', true);
    $('#pregunta17').hide();
    $('#respuesta17').hide();
    $('#respuesta17').attr('required', false);
    $('#respuesta17').attr('readonly', true);
    $('#pregunta18').hide();
    $('#respuesta18').hide();
    $('#respuesta18').attr('required', false);
    $('#respuesta18').attr('readonly', true);
    $('#pregunta19').hide();
    $('#respuesta19').hide();
    $('#respuesta19').attr('required', false);
    $('#respuesta19').attr('readonly', true);
    $('#pregunta20').hide();
    $('#respuesta20').hide();
    $('#respuesta20').attr('required', false);
    $('#respuesta20').attr('readonly', true);

}

function limpiar_formulario() {
    $("#titulo").text("Campaña BP Encuestas");
    $("#titulo1").text("");
    $("#titulo2").text("");
    $('#respuesta1').attr('required', false);
    $('#respuesta1').attr('readonly', true);
    $('#pregunta2').hide();
    $('#respuesta2').hide();
    $('#respuesta2').attr('required', false);
    $('#respuesta2').attr('readonly', true);
    $('#pregunta3').hide();
    $('#respuesta3').hide();
    $('#respuesta3').attr('required', false);
    $('#respuesta3').attr('readonly', true);
    $('#pregunta4').hide();
    $('#respuesta4').hide();
    $('#respuesta4').attr('required', false);
    $('#respuesta4').attr('readonly', true);
    $('#pregunta5').hide();
    $('#respuesta5').hide();
    $('#respuesta5').attr('required', false);
    $('#respuesta5').attr('readonly', true);
    $('#pregunta6').hide();
    $('#respuesta6').hide();
    $('#respuesta6').attr('required', false);
    $('#respuesta6').attr('readonly', true);
    $('#pregunta7').hide();
    $('#respuesta7').hide();
    $('#respuesta7').attr('required', false);
    $('#respuesta7').attr('readonly', true);
    $('#pregunta8').hide();
    $('#respuesta8').hide();
    $('#respuesta8').attr('required', false);
    $('#respuesta8').attr('readonly', true);
    $('#pregunta9').hide();
    $('#respuesta9').hide();
    $('#respuesta9').attr('required', false);
    $('#respuesta9').attr('readonly', true);
    $('#pregunta10').hide();
    $('#respuesta10').hide();
    $('#respuesta10').attr('required', false);
    $('#respuesta10').attr('readonly', true);
    $('#pregunta11').hide();
    $('#respuesta11').hide();
    $('#respuesta11').attr('required', false);
    $('#respuesta11').attr('readonly', true);
    $('#pregunta12').hide();
    $('#respuesta12').hide();
    $('#respuesta12').attr('required', false);
    $('#respuesta12').attr('readonly', true);
    $('#pregunta13').hide();
    $('#respuesta13').hide();
    $('#respuesta13').attr('required', false);
    $('#respuesta13').attr('readonly', true);
    $('#pregunta14').hide();
    $('#respuesta14').hide();
    $('#respuesta14').attr('required', false);
    $('#respuesta14').attr('readonly', true);
    $('#pregunta15').hide();
    $('#respuesta15').hide();
    $('#respuesta15').attr('required', false);
    $('#respuesta15').attr('readonly', true);
    $('#pregunta16').hide();
    $('#respuesta16').hide();
    $('#respuesta16').attr('required', false);
    $('#respuesta16').attr('readonly', true);
    $('#pregunta17').hide();
    $('#respuesta17').hide();
    $('#respuesta17').attr('required', false);
    $('#respuesta17').attr('readonly', true);
    $('#pregunta18').hide();
    $('#respuesta18').hide();
    $('#respuesta18').attr('required', false);
    $('#respuesta18').attr('readonly', true);
    $('#pregunta19').hide();
    $('#respuesta19').hide();
    $('#respuesta19').attr('required', false);
    $('#respuesta19').attr('readonly', true);
    $('#pregunta20').hide();
    $('#respuesta20').hide();
    $('#respuesta20').attr('required', false);
    $('#respuesta20').attr('readonly', true);
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
    $('#respuesta16').val("");
    $('#respuesta17').val("");
    $('#respuesta18').val("");
    $('#respuesta19').val("");
    $('#respuesta20').val("");
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
            url: '../ajax/bpEncuestaGenerica.php?action=selectAll_1',
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
    $.post("../ajax/bpEncuestaGenerica.php?action=selectById", {Id: Id}, function (datos, estado) {
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
                var text = $("#level1").val().substring(0, 3);
                if (r == 1) {
                    $('#respuesta1').attr('required', true);
                    $('#respuesta1').attr('readonly', false);
                    $('#respuesta2').attr('required', true);
                    $('#respuesta2').attr('readonly', false);
                    $('#respuesta3').attr('required', false);
                    $('#respuesta4').attr('required', false);
                    $('#respuesta5').attr('required', false);
                    $('#respuesta6').attr('required', false);
                    $('#respuesta7').attr('required', false);
                    $('#respuesta8').attr('required', false);
                    $('#respuesta9').attr('required', false);
                    $('#respuesta10').attr('required', false);
                    $('#respuesta11').attr('required', false);
                    $('#respuesta12').attr('required', false);
                    $('#respuesta13').attr('required', false);
                    $('#respuesta14').attr('required', false);
                    $('#respuesta15').attr('required', false);
                    $('#respuesta16').attr('required', false);
                    $('#respuesta17').attr('required', false);
                    $('#respuesta18').attr('required', false);
                    $('#respuesta19').attr('required', false);
                    $('#respuesta20').attr('required', false);
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
    if ($('#respuesta1').val() == 'Si') {
        $('#pregunta2').show();
        $('#respuesta2').show();
        $('#pregunta2').val("2. ¿Con que frecuencia usted accede a los beneficios del programa y uso de millas de Latampass Banco Pichincha?");
        $('#respuesta2').attr('readonly', false);
        $('#pregunta7').show();
        $('#respuesta7').show();
        $('#respuesta7').attr('readonly', false);
        $('#pregunta4').show();
        $('#respuesta4').show();
        $('#pregunta4').val("3.	¿Del 0 al 10 que tanto recomienda usted a sus amigos o familiares el programa de recompensas y uso de millas de la tarjeta Latampass Banco Pichincha? Siendo 0 No lo recomienda y 10, si lo recomienda");
        $('#respuesta4').attr('readonly', false);
        $('#pregunta5').val("3.1.¿Cuál fue el motivo principal para darnos esa calificación?");
        $('#pregunta5').show();
        $('#respuesta5').show();
        $('#respuesta5').attr('readonly', false);
        $('#pregunta6').val("4.	Si su experiencia con el programa de recompensas y uso de millas de la tarjeta Latampass Banco Pichincha se mantiene igual a la que ha tenido hasta ahora, ¿por cuánto tiempo más consideraría seguir usándola?");
        $('#pregunta6').show();
        $('#respuesta6').show(); 
        $('#respuesta6').attr('readonly', false);
        
    } else {
        $('#pregunta2').show();
        $('#respuesta2').show();
        $('#pregunta2').val("9.	¿Con que frecuencia usted usa la tarjeta Latampass Banco Pichincha?");
        $('#respuesta2').attr('required', true);
        $('#respuesta2').attr('readonly', false);
        $('#pregunta7').show();
        $('#respuesta7').show();
        $('#respuesta7').attr('readonly', false);
        $('#pregunta4').show();
        $('#respuesta4').show();
        $('#pregunta4').val("10. ¿Del 0 al 10 que tanto recomienda usted a sus amigos o familiares el uso de la tarjeta Latampass Banco Pichincha? Siendo 0 No lo recomienda y 10, si lo recomienda.");
        $('#respuesta4').attr('readonly', false);
        $('#pregunta5').show();
        $('#respuesta5').show();
        $('#pregunta5').val("10.1.¿Cuál fue el motivo principal para darnos esa calificación?");
        $('#respuesta5').attr('readonly', false);
        $('#pregunta6').show();
        $('#respuesta6').show();
        $('#pregunta6').val("11. Si su experiencia con la tarjeta Latampass Banco Pichincha se mantiene igual a la que ha tenido hasta ahora, ¿por cuánto tiempo más consideraría seguir usándola?: Señale con X la respuesta correcta.");
        $('#respuesta6').attr('readonly', false);
    }
});


$('#respuesta4').change(function () {
    if ($('#respuesta4').val() == '0' || $('#respuesta4').val() == '1' || $('#respuesta4').val() == '2' || $('#respuesta4').val() == '3' ||
            $('#respuesta4').val() == '4' || $('#respuesta4').val() == '5' || $('#respuesta4').val() == '6') {
        $('#pregunta5').show();
        $('#respuesta5').show();
        $('#respuesta5').attr('readonly', false);
    } else if ($('#respuesta4').val() == '7' || $('#respuesta4').val() == '8') {
        $('#pregunta5').show();
        $('#respuesta5').show();
        $('#respuesta5').attr('readonly', false); 
    } else if ($('#respuesta4').val() == '9' || $('#respuesta4').val() == '10') {
        $('#pregunta5').show();
        $('#respuesta5').show();
        $('#respuesta5').attr('readonly', false);
    } else {
        $('#pregunta5').hide();
        $('#respuesta5').hide();
        $('#respuesta5').val("");
        $('#respuesta5').attr('readonly', true);
        $('#respuesta5').attr('required', false);
    }
});

$('#respuesta7').change(function () {
    if ($('#respuesta7').val() == 'Si') {
        $('#pregunta8').show();
        $('#respuesta8').show();
        $('#respuesta8').attr('readonly', false);
        $('#pregunta9').hide();
        $('#respuesta9').hide();
        $('#respuesta9').attr('readonly', false);
        $('#pregunta10').show();
        $('#respuesta10').show();
        $('#respuesta10').attr('readonly', false);
        $('#pregunta11').show();
        $('#respuesta11').show();
        $('#respuesta11').attr('readonly', false);
        $('#pregunta12').show();
        $('#respuesta12').show();
        $('#respuesta12').attr('readonly', false);
        
    } else {
        $('#pregunta8').hide();
        $('#respuesta8').hide();
        $('#respuesta8').attr('readonly', false);
        $('#pregunta9').show();
        $('#respuesta9').show();
        $('#respuesta9').attr('readonly', false);
        $('#pregunta10').hide();
        $('#respuesta10').hide();
        $('#respuesta10').attr('readonly', false);
        $('#pregunta11').hide();
        $('#respuesta11').hide();
        $('#respuesta11').attr('readonly', false);
        $('#pregunta12').hide();
        $('#respuesta12').hide();
        $('#respuesta12').attr('readonly', false);
        
    }
});


$('#respuesta10').change(function () {
    if ($('#respuesta10').val() == '0' || $('#respuesta10').val() == '1' || $('#respuesta10').val() == '2' || $('#respuesta10').val() == '3' ||
            $('#respuesta10').val() == '4' || $('#respuesta10').val() == '5' || $('#respuesta10').val() == '6') {
        $('#pregunta11').show();
        $('#respuesta11').show();
        $('#respuesta11').attr('readonly', false);
    } else if ($('#respuesta10').val() == '7' || $('#respuesta10').val() == '8') {
        $('#pregunta11').show();
        $('#respuesta11').show();
        $('#respuesta11').attr('readonly', false);
    } else if ($('#respuesta10').val() == '9' || $('#respuesta10').val() == '10') {
        $('#pregunta11').show();
        $('#respuesta11').show();
        $('#respuesta11').attr('readonly', false);
    } else {
        $('#pregunta11').hide();
        $('#respuesta11').hide();
        $('#respuesta11').val("");
        $('#respuesta11').attr('readonly', true);
    }
});


$('#respuesta13').change(function () {
    if ($('#respuesta13').val() == '0' || $('#respuesta13').val() == '1' || $('#respuesta13').val() == '2' || $('#respuesta13').val() == '3' ||
            $('#respuesta13').val() == '4' || $('#respuesta13').val() == '5' || $('#respuesta13').val() == '6') {
        $('#pregunta14').show();
        $('#respuesta14').show();
        $('#respuesta14').attr('readonly', false);
    } else if ($('#respuesta13').val() == '7' || $('#respuesta13').val() == '8') {
        $('#pregunta14').show();
        $('#respuesta14').show();
        $('#respuesta14').attr('readonly', false);
    } else if ($('#respuesta13').val() == '9' || $('#respuesta13').val() == '10') {
        $('#pregunta14').show();
        $('#respuesta14').show();
        $('#respuesta14').attr('readonly', false); 
    } else {
        $('#pregunta14').hide();
        $('#respuesta14').hide();
        $('#respuesta14').val("");
        $('#respuesta14').attr('readonly', false);
    }
});


$('#respuesta9').change(function () {
    if ($('#respuesta9').val() == 'Si') {
        $('#pregunta13').show();
        $('#respuesta13').show();
        $('#respuesta13').attr('readonly', false);
        $('#pregunta14').show();
        $('#respuesta14').show();
        $('#respuesta14').attr('readonly', false);
        $('#pregunta15').show();
        $('#respuesta15').show();
        $('#respuesta15').attr('readonly', false);
        $('#pregunta16').hide();
        $('#respuesta16').hide();
        $('#respuesta16').attr('readonly', false);
    } else {
        $('#pregunta13').hide();
        $('#respuesta13').hide();
        $('#respuesta13').attr('readonly', false);
        $('#pregunta14').hide();
        $('#respuesta14').hide();
        $('#respuesta14').attr('readonly', false);
        $('#pregunta15').hide();
        $('#respuesta15').hide();
        $('#respuesta15').attr('readonly', false);
        $('#pregunta16').show();
        $('#respuesta16').show();
        $('#respuesta16').attr('readonly', false);
    }
});


$('#respuesta16').change(function () {
    if ($('#respuesta16').val() == 'Si') {
        $('#pregunta17').show();
        $('#respuesta17').show();
        $('#respuesta17').attr('readonly', false);
    } else {
        $('#pregunta17').hide();
        $('#respuesta17').hide();
        $('#respuesta17').attr('readonly', false);
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
            url: "../ajax/bpEncuestaGenerica.php?action=save",
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
                        url: "../ajax/bpEncuestaGenerica.php?action=save",
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
                        url: "../ajax/bpEncuestaGenerica.php?action=save",
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

