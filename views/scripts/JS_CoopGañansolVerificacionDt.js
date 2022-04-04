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
    $("#titulo").text("Campaña Verificación Telefónica");
    $("#titulo1").text("");
    $("#titulo2").text("");
    checks(false, true);
}

function cancelar_formulario() { /* función para cancelar la operación */
    limpiar_formulario();
    mostrar_formulario(false);
    $("#titulo").text("Campaña Verificación Telefónica");
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
            url: '../ajax/verificacionDeDatosC.php?action=selectAll',
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
    $.post("../ajax/verificacionDeDatosC.php?action=selectById", {Id: Id}, function (datos, estado) {
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
        $('#GENERO').val(datos.GENERO);
        $('#FECHA_INGRESO').val(datos.FECHA_INGRESO);
        $('#EDAD').val(datos.EDAD);
        $('#TIPO').val(datos.TIPO);
        $('#ESTADO_CUENTA').val(datos.ESTADO_CUENTA);
        $('#PRIMER_NOMBRE').val(datos.PRIMER_NOMBRE);
        $('#SEGUNDO_NOMBRE').val(datos.SEGUNDO_NOMBRE);
        $('#PRIMER_APELLIDO').val(datos.PRIMER_APELLIDO);
        $('#SEGUNDO_APELLIDO').val(datos.SEGUNDO_APELLIDO);
        $('#FECHA_NACIMIENTO').val(datos.FECHA_NACIMIENTO);
        $('#DIRECCION').val(datos.DIRECCION);
        $('#PAIS_DOMICILIO').val(datos.PAIS_DOMICILIO);
        $('#PROVINCIA_DOMICILIO').val(datos.PROVINCIA_DOMICILIO);
        $('#CANTON_DOMICILIO').val(datos.CANTON_DOMICILIO);
        $('#PARROQUIA_DOMICILIO').val(datos.PARROQUIA_DOMICILIO);
        $('#SECTOR_DOMICILIO').val(datos.SECTOR_DOMICILIO);
        $('#AV_PRINCIPAL_DOMICILIO').val(datos.AV_PRINCIPAL_DOMICILIO);
        $('#AV_SECUNDARIA_DOMICILIO').val(datos.AV_SECUNDARIA_DOMICILIO);
        $('#REFERENCIA_DOMICILIO').val(datos.REFERENCIA_DOMICILIO);
        $('#NOMENCLATURA_DOMICILIO').val(datos.NOMENCLATURA_DOMICILIO);
        $('#CORREO_PERSONAL').val(datos.CORREO);
        $('#PAIS_TRABAJO').val(datos.PAIS_TRABAJO);
        $('#PROVINCIA_TRABAJO').val(datos.PROVINCIA_TRABAJO);
        $('#CANTON_TRABAJO').val(datos.CANTON_TRABAJO);
        $('#PARROQUIA_TRABAJO').val(datos.PARROQUIA_TRABAJO);
        $('#SECTOR_TRABAJO').val(datos.SECTOR_TRABAJO);
        $('#AV_PRINCIPAL_TRABAJO').val(datos.AV_PRINCIPAL_TRABAJO);
        $('#AV_SECUNDARIA_TRABAJO').val(datos.AV_SECUNDARIA_TRABAJO);
        $('#REFERENCIA_TRABAJO').val(datos.REFERENCIA_TRABAJO);
        $('#NOMENCLATURA_TRABAJO').val(datos.NOMENCLATURA_TRABAJO);
        $('#CORREO_TRABAJO').val(datos.CORREO_PERSONAL);
        $('#REFERENCIA_PERSONAL').val(datos.REFERENCIA_PERSONAL);
        $('#PARENTESCO_REFERENCIA').val(datos.PARENTESCO_REFERENCIA);
        $('#TELEFONO_REFERENCIA').val(datos.TELEFONO_REFERENCIA);
        $('#TELEFONO_1').val(datos.TELEFONO_1);
        $('#TELEFONO_2').val(datos.TELEFONO_2);
        $('#TELEFONO_3').val(datos.TELEFONO_3);
        $('#TELEFONO_4').val(datos.TELEFONO_4);

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
                if (r == 1 || r == 2) {
                    console.log("Puede llenar información");
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

$('#chk1').change(function () {
    if ($(this).is(":checked")) {
        $('#IDENTIFICACION_VRF').attr('required', true);
        $('#IDENTIFICACION_VRF').attr('readonly', false);
    } else {
        $('#IDENTIFICACION_VRF').attr('required', false);
        $('#IDENTIFICACION_VRF').attr('readonly', true);
        $('#IDENTIFICACION_VRF').val("");
    }
});

$('#chk2').change(function () {
    if ($(this).is(":checked")) {
        $('#PRIMER_NOMBRE_VRF').attr('required', true);
        $('#PRIMER_NOMBRE_VRF').attr('readonly', false);
    } else {
        $('#PRIMER_NOMBRE_VRF').attr('required', false);
        $('#PRIMER_NOMBRE_VRF').attr('readonly', true);
        $('#PRIMER_NOMBRE_VRF').val("");
    }
});

$('#chk3').change(function () {
    if ($(this).is(":checked")) {
        $('#SEGUNDO_NOMBRE_VRF').attr('required', true);
        $('#SEGUNDO_NOMBRE_VRF').attr('readonly', false);
    } else {
        $('#SEGUNDO_NOMBRE_VRF').attr('required', false);
        $('#SEGUNDO_NOMBRE_VRF').attr('readonly', true);
        $('#SEGUNDO_NOMBRE_VRF').val("");
    }
});

$('#chk4').change(function () {
    if ($(this).is(":checked")) {
        $('#PRIMER_APELLIDO_VRF').attr('required', true);
        $('#PRIMER_APELLIDO_VRF').attr('readonly', false);
    } else {
        $('#PRIMER_APELLIDO_VRF').attr('required', false);
        $('#PRIMER_APELLIDO_VRF').attr('readonly', true);
        $('#PRIMER_APELLIDO_VRF').val("");
    }
});

$('#chk5').change(function () {
    if ($(this).is(":checked")) {
        $('#SEGUNDO_APELLIDO_VRF').attr('required', true);
        $('#SEGUNDO_APELLIDO_VRF').attr('readonly', false);
    } else {
        $('#SEGUNDO_APELLIDO_VRF').attr('required', false);
        $('#SEGUNDO_APELLIDO_VRF').attr('readonly', true);
        $('#SEGUNDO_APELLIDO_VRF').val("");
    }
});

$('#chk6').change(function () {
    if ($(this).is(":checked")) {
        $('#FECHA_NACIMIENTO_VRF').attr('required', true);
        $('#FECHA_NACIMIENTO_VRF').attr('readonly', false);
    } else {
        $('#FECHA_NACIMIENTO_VRF').attr('required', false);
        $('#FECHA_NACIMIENTO_VRF').attr('readonly', true);
        $('#FECHA_NACIMIENTO_VRF').val("");
    }
});

$('#chk7').change(function () {
    if ($(this).is(":checked")) {
        $('#PAIS_DOMICILIO_VRF').attr('required', true);
        $('#PAIS_DOMICILIO_VRF').attr('readonly', false);
    } else {
        $('#PAIS_DOMICILIO_VRF').attr('required', false);
        $('#PAIS_DOMICILIO_VRF').attr('readonly', true);
        $('#PAIS_DOMICILIO_VRF').val("");
    }
});

$('#chk8').change(function () {
    if ($(this).is(":checked")) {
        $('#PROVINCIA_DOMICILIO_VRF').attr('required', true);
        $('#PROVINCIA_DOMICILIO_VRF').attr('readonly', false);
    } else {
        $('#PROVINCIA_DOMICILIO_VRF').attr('required', false);
        $('#PROVINCIA_DOMICILIO_VRF').attr('readonly', true);
        $('#PROVINCIA_DOMICILIO_VRF').val("");
    }
});

$('#chk9').change(function () {
    if ($(this).is(":checked")) {
        $('#CANTON_DOMICILIO_VRF').attr('required', true);
        $('#CANTON_DOMICILIO_VRF').attr('readonly', false);
    } else {
        $('#CANTON_DOMICILIO_VRF').attr('required', false);
        $('#CANTON_DOMICILIO_VRF').attr('readonly', true);
        $('#CANTON_DOMICILIO_VRF').val("");
    }
});

$('#chk10').change(function () {
    if ($(this).is(":checked")) {
        $('#PARROQUIA_DOMICILIO_VRF').attr('required', true);
        $('#PARROQUIA_DOMICILIO_VRF').attr('readonly', false);
    } else {
        $('#PARROQUIA_DOMICILIO_VRF').attr('required', false);
        $('#PARROQUIA_DOMICILIO_VRF').attr('readonly', true);
        $('#PARROQUIA_DOMICILIO_VRF').val("");
    }
});

$('#chk11').change(function () {
    if ($(this).is(":checked")) {
        $('#SECTOR_DOMICILIO_VRF').attr('required', true);
        $('#SECTOR_DOMICILIO_VRF').attr('readonly', false);
    } else {
        $('#SECTOR_DOMICILIO_VRF').attr('required', false);
        $('#SECTOR_DOMICILIO_VRF').attr('readonly', true);
        $('#SECTOR_DOMICILIO_VRF').val("");
    }
});

$('#chk12').change(function () {
    if ($(this).is(":checked")) {
        $('#AV_PRINCIPAL_DOMICILIO_VRF').attr('required', true);
        $('#AV_PRINCIPAL_DOMICILIO_VRF').attr('readonly', false);
    } else {
        $('#AV_PRINCIPAL_DOMICILIO_VRF').attr('required', false);
        $('#AV_PRINCIPAL_DOMICILIO_VRF').attr('readonly', true);
        $('#AV_PRINCIPAL_DOMICILIO_VRF').val("");
    }
});

$('#chk13').change(function () {
    if ($(this).is(":checked")) {
        $('#AV_SECUNDARIA_DOMICILIO_VRF').attr('required', true);
        $('#AV_SECUNDARIA_DOMICILIO_VRF').attr('readonly', false);
    } else {
        $('#AV_SECUNDARIA_DOMICILIO_VRF').attr('required', false);
        $('#AV_SECUNDARIA_DOMICILIO_VRF').attr('readonly', true);
        $('#AV_SECUNDARIA_DOMICILIO_VRF').val("");
    }
});

$('#chk14').change(function () {
    if ($(this).is(":checked")) {
        $('#REFERENCIA_DOMICILIO_VRF').attr('required', true);
        $('#REFERENCIA_DOMICILIO_VRF').attr('readonly', false);
    } else {
        $('#REFERENCIA_DOMICILIO_VRF').attr('required', false);
        $('#REFERENCIA_DOMICILIO_VRF').attr('readonly', true);
        $('#REFERENCIA_DOMICILIO_VRF').val("");
    }
});

$('#chk15').change(function () {
    if ($(this).is(":checked")) {
        $('#NOMENCLATURA_DOMICILIO_VRF').attr('required', true);
        $('#NOMENCLATURA_DOMICILIO_VRF').attr('readonly', false);
    } else {
        $('#NOMENCLATURA_DOMICILIO_VRF').attr('required', false);
        $('#NOMENCLATURA_DOMICILIO_VRF').attr('readonly', true);
        $('#NOMENCLATURA_DOMICILIO_VRF').val("");
    }
});

$('#chk16').change(function () {
    if ($(this).is(":checked")) {
        $('#CORREO_PERSONAL_VRF').attr('required', true);
        $('#CORREO_PERSONAL_VRF').attr('readonly', false);
    } else {
        $('#CORREO_PERSONAL_VRF').attr('required', false);
        $('#CORREO_PERSONAL_VRF').attr('readonly', true);
        $('#CORREO_PERSONAL_VRF').val("");
    }
});

$('#chk17').change(function () {
    if ($(this).is(":checked")) {
        $('#TELEFONO_1_VRF').attr('required', true);
        $('#TELEFONO_1_VRF').attr('readonly', false);
    } else {
        $('#TELEFONO_1_VRF').attr('required', false);
        $('#TELEFONO_1_VRF').attr('readonly', true);
        $('#TELEFONO_1_VRF').val("");
    }
});

$('#chk18').change(function () {
    if ($(this).is(":checked")) {
        $('#TELEFONO_2_VRF').attr('required', true);
        $('#TELEFONO_2_VRF').attr('readonly', false);
    } else {
        $('#TELEFONO_2_VRF').attr('required', false);
        $('#TELEFONO_2_VRF').attr('readonly', true);
        $('#TELEFONO_2_VRF').val("");
    }
});

$('#chk19').change(function () {
    if ($(this).is(":checked")) {
        $('#PAIS_TRABAJO_VRF').attr('required', true);
        $('#PAIS_TRABAJO_VRF').attr('readonly', false);
    } else {
        $('#PAIS_TRABAJO_VRF').attr('required', false);
        $('#PAIS_TRABAJO_VRF').attr('readonly', true);
        $('#PAIS_TRABAJO_VRF').val("");
    }
});

$('#chk20').change(function () {
    if ($(this).is(":checked")) {
        $('#PROVINCIA_TRABAJO_VRF').attr('required', true);
        $('#PROVINCIA_TRABAJO_VRF').attr('readonly', false);
    } else {
        $('#PROVINCIA_TRABAJO_VRF').attr('required', false);
        $('#PROVINCIA_TRABAJO_VRF').attr('readonly', true);
        $('#PROVINCIA_TRABAJO_VRF').val("");
    }
});

$('#chk21').change(function () {
    if ($(this).is(":checked")) {
        $('#CANTON_TRABAJO_VRF').attr('required', true);
        $('#CANTON_TRABAJO_VRF').attr('readonly', false);
    } else {
        $('#CANTON_TRABAJO_VRF').attr('required', false);
        $('#CANTON_TRABAJO_VRF').attr('readonly', true);
        $('#CANTON_TRABAJO_VRF').val("");
    }
});

$('#chk22').change(function () {
    if ($(this).is(":checked")) {
        $('#PARROQUIA_TRABAJO_VRF').attr('required', true);
        $('#PARROQUIA_TRABAJO_VRF').attr('readonly', false);
    } else {
        $('#PARROQUIA_TRABAJO_VRF').attr('required', false);
        $('#PARROQUIA_TRABAJO_VRF').attr('readonly', true);
        $('#PARROQUIA_TRABAJO_VRF').val("");
    }
});

$('#chk23').change(function () {
    if ($(this).is(":checked")) {
        $('#SECTOR_TRABAJO_VRF').attr('required', true);
        $('#SECTOR_TRABAJO_VRF').attr('readonly', false);
    } else {
        $('#SECTOR_TRABAJO_VRF').attr('required', false);
        $('#SECTOR_TRABAJO_VRF').attr('readonly', true);
        $('#SECTOR_TRABAJO_VRF').val("");
    }
});

$('#chk24').change(function () {
    if ($(this).is(":checked")) {
        $('#AV_PRINCIPAL_TRABAJO_VRF').attr('required', true);
        $('#AV_PRINCIPAL_TRABAJO_VRF').attr('readonly', false);
    } else {
        $('#AV_PRINCIPAL_TRABAJO_VRF').attr('required', false);
        $('#AV_PRINCIPAL_TRABAJO_VRF').attr('readonly', true);
        $('#AV_PRINCIPAL_TRABAJO_VRF').val("");
    }
});

$('#chk25').change(function () {
    if ($(this).is(":checked")) {
        $('#AV_SECUNDARIA_TRABAJO_VRF').attr('required', true);
        $('#AV_SECUNDARIA_TRABAJO_VRF').attr('readonly', false);
    } else {
        $('#AV_SECUNDARIA_TRABAJO_VRF').attr('required', false);
        $('#AV_SECUNDARIA_TRABAJO_VRF').attr('readonly', true);
        $('#AV_SECUNDARIA_TRABAJO_VRF').val("");
    }
});

$('#chk26').change(function () {
    if ($(this).is(":checked")) {
        $('#REFERENCIA_TRABAJO_VRF').attr('required', true);
        $('#REFERENCIA_TRABAJO_VRF').attr('readonly', false);
    } else {
        $('#REFERENCIA_TRABAJO_VRF').attr('required', false);
        $('#REFERENCIA_TRABAJO_VRF').attr('readonly', true);
        $('#REFERENCIA_TRABAJO_VRF').val("");
    }
});

$('#chk27').change(function () {
    if ($(this).is(":checked")) {
        $('#NOMENCLATURA_TRABAJO_VRF').attr('required', true);
        $('#NOMENCLATURA_TRABAJO_VRF').attr('readonly', false);
    } else {
        $('#NOMENCLATURA_TRABAJO_VRF').attr('required', false);
        $('#NOMENCLATURA_TRABAJO_VRF').attr('readonly', true);
        $('#NOMENCLATURA_TRABAJO_VRF').val("");
    }
});

$('#chk28').change(function () {
    if ($(this).is(":checked")) {
        $('#CORREO_TRABAJO_VRF').attr('required', true);
        $('#CORREO_TRABAJO_VRF').attr('readonly', false);
    } else {
        $('#CORREO_TRABAJO_VRF').attr('required', false);
        $('#CORREO_TRABAJO_VRF').attr('readonly', true);
        $('#CORREO_TRABAJO_VRF').val("");
    }
});

$('#chk29').change(function () {
    if ($(this).is(":checked")) {
        $('#TELEFONO_3_VRF').attr('required', true);
        $('#TELEFONO_3_VRF').attr('readonly', false);
    } else {
        $('#TELEFONO_3_VRF').attr('required', false);
        $('#TELEFONO_3_VRF').attr('readonly', true);
        $('#TELEFONO_3_VRF').val("");
    }
});

$('#chk30').change(function () {
    if ($(this).is(":checked")) {
        $('#TELEFONO_4_VRF').attr('required', true);
        $('#TELEFONO_4_VRF').attr('readonly', false);
    } else {
        $('#TELEFONO_4_VRF').attr('required', false);
        $('#TELEFONO_4_VRF').attr('readonly', true);
        $('#TELEFONO_4_VRF').val("");
    }
});

$('#chk31').change(function () {
    if ($(this).is(":checked")) {
        $('#REFERENCIA_PERSONAL_VRF').attr('required', true);
        $('#REFERENCIA_PERSONAL_VRF').attr('readonly', false);
    } else {
        $('#REFERENCIA_PERSONAL_VRF').attr('required', false);
        $('#REFERENCIA_PERSONAL_VRF').attr('readonly', true);
        $('#REFERENCIA_PERSONAL_VRF').val("");
    }
});

$('#chk32').change(function () {
    if ($(this).is(":checked")) {
        $('#PARENTESCO_REFERENCIA_VRF').attr('required', true);
        $('#PARENTESCO_REFERENCIA_VRF').attr('readonly', false);
    } else {
        $('#PARENTESCO_REFERENCIA_VRF').attr('required', false);
        $('#PARENTESCO_REFERENCIA_VRF').attr('readonly', true);
        $('#PARENTESCO_REFERENCIA_VRF').val("");
    }
});

$('#chk33').change(function () {
    if ($(this).is(":checked")) {
        $('#TELEFONO_REFERENCIA_VRF').attr('required', true);
        $('#TELEFONO_REFERENCIA_VRF').attr('readonly', false);
    } else {
        $('#TELEFONO_REFERENCIA_VRF').attr('required', false);
        $('#TELEFONO_REFERENCIA_VRF').attr('readonly', true);
        $('#TELEFONO_REFERENCIA_VRF').val("");
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
            url: "../ajax/verificacionDeDatosC.php?action=save",
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
                        url: "../ajax/verificacionDeDatosC.php?action=save",
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
                        url: "../ajax/verificacionDeDatosC.php?action=save",
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

function checks(state1, state2) {
    $("#chk1").prop("checked", false);
    $('#IDENTIFICACION_VRF').attr('required', state1);
    $('#IDENTIFICACION_VRF').attr('readonly', state2);
    $('#IDENTIFICACION_VRF').val("");
    $("#chk2").prop("checked", false);
    $('#PRIMER_NOMBRE_VRF').attr('required', state1);
    $('#PRIMER_NOMBRE_VRF').attr('readonly', state2);
    $('#PRIMER_NOMBRE_VRF').val("");
    $("#chk3").prop("checked", false);
    $('#SEGUNDO_NOMBRE_VRF').attr('required', state1);
    $('#SEGUNDO_NOMBRE_VRF').attr('readonly', state2);
    $('#SEGUNDO_NOMBRE_VRF').val("");
    $("#chk4").prop("checked", false);
    $('#PRIMER_APELLIDO_VRF').attr('required', state1);
    $('#PRIMER_APELLIDO_VRF').attr('readonly', state2);
    $('#PRIMER_APELLIDO_VRF').val("");
    $("#chk5").prop("checked", false);
    $('#SEGUNDO_APELLIDO_VRF').attr('required', state1);
    $('#SEGUNDO_APELLIDO_VRF').attr('readonly', state2);
    $('#SEGUNDO_APELLIDO_VRF').val("");
    $("#chk6").prop("checked", false);
    $('#FECHA_NACIMIENTO_VRF').attr('required', state1);
    $('#FECHA_NACIMIENTO_VRF').attr('readonly', state2);
    $('#FECHA_NACIMIENTO_VRF').val("");
    $("#chk7").prop("checked", false);
    $('#PAIS_DOMICILIO_VRF').attr('required', state1);
    $('#PAIS_DOMICILIO_VRF').attr('readonly', state2);
    $('#PAIS_DOMICILIO_VRF').val("");
    $("#chk8").prop("checked", false);
    $('#PROVINCIA_DOMICILIO_VRF').attr('required', state1);
    $('#PROVINCIA_DOMICILIO_VRF').attr('readonly', state2);
    $('#PROVINCIA_DOMICILIO_VRF').val("");
    $("#chk9").prop("checked", false);
    $('#CANTON_DOMICILIO_VRF').attr('required', state1);
    $('#CANTON_DOMICILIO_VRF').attr('readonly', state2);
    $('#CANTON_DOMICILIO_VRF').val("");
    $("#chk10").prop("checked", false);
    $('#PARROQUIA_DOMICILIO_VRF').attr('required', state1);
    $('#PARROQUIA_DOMICILIO_VRF').attr('readonly', state2);
    $('#PARROQUIA_DOMICILIO_VRF').val("");
    $("#chk11").prop("checked", false);
    $('#SECTOR_DOMICILIO_VRF').attr('required', state1);
    $('#SECTOR_DOMICILIO_VRF').attr('readonly', state2);
    $('#SECTOR_DOMICILIO_VRF').val("");
    $("#chk12").prop("checked", false);
    $('#AV_PRINCIPAL_DOMICILIO_VRF').attr('required', state1);
    $('#AV_PRINCIPAL_DOMICILIO_VRF').attr('readonly', state2);
    $('#AV_PRINCIPAL_DOMICILIO_VRF').val("");
    $("#chk13").prop("checked", false);
    $('#AV_SECUNDARIA_DOMICILIO_VRF').attr('required', state1);
    $('#AV_SECUNDARIA_DOMICILIO_VRF').attr('readonly', state2);
    $('#AV_SECUNDARIA_DOMICILIO_VRF').val("");
    $("#chk14").prop("checked", false);
    $('#REFERENCIA_DOMICILIO_VRF').attr('required', state1);
    $('#REFERENCIA_DOMICILIO_VRF').attr('readonly', state2);
    $('#REFERENCIA_DOMICILIO_VRF').val("");
    $("#chk15").prop("checked", false);
    $('#NOMENCLATURA_DOMICILIO_VRF').attr('required', state1);
    $('#NOMENCLATURA_DOMICILIO_VRF').attr('readonly', state2);
    $('#NOMENCLATURA_DOMICILIO_VRF').val("");
    $("#chk16").prop("checked", false);
    $('#CORREO_PERSONAL_VRF').attr('required', state1);
    $('#CORREO_PERSONAL_VRF').attr('readonly', state2);
    $('#CORREO_PERSONAL_VRF').val("");
    $("#chk17").prop("checked", false);
    $('#TELEFONO_1_VRF').attr('required', state1);
    $('#TELEFONO_1_VRF').attr('readonly', state2);
    $('#TELEFONO_1_VRF').val("");
    $("#chk18").prop("checked", false);
    $('#TELEFONO_2_VRF').attr('required', state1);
    $('#TELEFONO_2_VRF').attr('readonly', state2);
    $('#TELEFONO_2_VRF').val("");
    $("#chk19").prop("checked", false);
    $('#PAIS_TRABAJO_VRF').attr('required', state1);
    $('#PAIS_TRABAJO_VRF').attr('readonly', state2);
    $('#PAIS_TRABAJO_VRF').val("");
    $("#chk20").prop("checked", false);
    $('#PROVINCIA_TRABAJO_VRF').attr('required', state1);
    $('#PROVINCIA_TRABAJO_VRF').attr('readonly', state2);
    $('#PROVINCIA_TRABAJO_VRF').val("");
    $("#chk21").prop("checked", false);
    $('#CANTON_TRABAJO_VRF').attr('required', state1);
    $('#CANTON_TRABAJO_VRF').attr('readonly', state2);
    $('#CANTON_TRABAJO_VRF').val("");
    $("#chk22").prop("checked", false);
    $('#PARROQUIA_TRABAJO_VRF').attr('required', state1);
    $('#PARROQUIA_TRABAJO_VRF').attr('readonly', state2);
    $('#PARROQUIA_TRABAJO_VRF').val("");
    $("#chk23").prop("checked", false);
    $('#SECTOR_TRABAJO_VRF').attr('required', state1);
    $('#SECTOR_TRABAJO_VRF').attr('readonly', state2);
    $('#SECTOR_TRABAJO_VRF').val("");
    $("#chk24").prop("checked", false);
    $('#AV_PRINCIPAL_TRABAJO_VRF').attr('required', state1);
    $('#AV_PRINCIPAL_TRABAJO_VRF').attr('readonly', state2);
    $('#AV_PRINCIPAL_TRABAJO_VRF').val("");
    $("#chk25").prop("checked", false);
    $('#AV_SECUNDARIA_TRABAJO_VRF').attr('required', state1);
    $('#AV_SECUNDARIA_TRABAJO_VRF').attr('readonly', state2);
    $('#AV_SECUNDARIA_TRABAJO_VRF').val("");
    $("#chk26").prop("checked", false);
    $('#REFERENCIA_TRABAJO_VRF').attr('required', state1);
    $('#REFERENCIA_TRABAJO_VRF').attr('readonly', state2);
    $('#REFERENCIA_TRABAJO_VRF').val("");
    $("#chk27").prop("checked", false);
    $('#NOMENCLATURA_TRABAJO_VRF').attr('required', state1);
    $('#NOMENCLATURA_TRABAJO_VRF').attr('readonly', state2);
    $('#NOMENCLATURA_TRABAJO_VRF').val("");
    $("#chk28").prop("checked", false);
    $('#CORREO_TRABAJO_VRF').attr('required', state1);
    $('#CORREO_TRABAJO_VRF').attr('readonly', state2);
    $('#CORREO_TRABAJO_VRF').val("");
    $("#chk29").prop("checked", false);
    $('#TELEFONO_3_VRF').attr('required', state1);
    $('#TELEFONO_3_VRF').attr('readonly', state2);
    $('#TELEFONO_3_VRF').val("");
    $("#chk30").prop("checked", false);
    $('#TELEFONO_4_VRF').attr('required', state1);
    $('#TELEFONO_4_VRF').attr('readonly', state2);
    $('#TELEFONO_4_VRF').val("");
    $("#chk31").prop("checked", false);
    $('#REFERENCIA_PERSONAL_VRF').attr('required', state1);
    $('#REFERENCIA_PERSONAL_VRF').attr('readonly', state2);
    $('#REFERENCIA_PERSONAL_VRF').val("");
    $("#chk32").prop("checked", false);
    $('#PARENTESCO_REFERENCIA_VRF').attr('required', state1);
    $('#PARENTESCO_REFERENCIA_VRF').attr('readonly', state2);
    $('#PARENTESCO_REFERENCIA_VRF').val("");
    $("#chk33").prop("checked", false);
    $('#TELEFONO_REFERENCIA_VRF').attr('required', state1);
    $('#TELEFONO_REFERENCIA_VRF').attr('readonly', state2);
    $('#TELEFONO_REFERENCIA_VRF').val("");
}

init(); /* ejecuta la función inicial */

