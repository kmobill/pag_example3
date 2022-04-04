var tabla;

function init() { /* función inicial */
    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
    mostrar_formulario(false);
    $("#listadoRegistros").hide();
}

function limpiar_formulario() {
    document.getElementById("formulario").reset();
    pnlTRX(true, false);
    pnlMensajeFinal(false, true);
    $("#pnlMensajes").hide();
    $("#vistaPrevia").attr("src", "");
}

function mostrar_formulario(flag) { /* muestra u oculta el formulario segun la validación del bool (flag) */
    limpiar_formulario();
    if (flag) {
        $("#listadoRegistros").hide();
        $("#formularioRegistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnNuevaGestion").hide();
        $("#divFiltros").hide();
        $("#pnlMensajes").show();
    } else {
        $("#formularioRegistros").hide();
        $("#btnNuevaGestion").show();
        $("#divFiltros").show();
    }
}

function cancelar_formulario() {
    mostrar_formulario(false);
    if ($("#txtCoop").val() == '' && $("#txtFechaInicio").val() == '' && $("#txtFechaFin").val() == '') {
        $("#listadoRegistros").hide();
    } else {
        $("#listadoRegistros").show();
    }
}

$("#btnNuevaGestion").click(function () {
    mostrar_formulario(true);
    $("#pnlMensajes").hide();
    $.ajax({
        type: "GET",
        url: '../ajax/campaniasRedesSocialesC.php?action=fechaInicio',
        success: function (r) {
            $("#fechaInicio").val(r);
            $("#txtFechaGestion").val(r);
            $("#mostrarHora").html(r);
        }
    });
});


$("#btnBuscar").click(function () {
    $("#pnlMensajes").hide();
    var txtCoop = $("#txtCoop").val();
    var txtFechaInicio = obtenerFecha2($("#txtFechaInicio").val());
    var txtFechaFin = obtenerFecha2($("#txtFechaFin").val());
    if ($("#txtFechaInicio").val() == "" || $("#txtFechaFin").val() == "") {
        bootbox.alert("Seleccione todos los campos!");
    } else {
        $('#listadoRegistros').show();
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
                url: '../ajax/campaniasRedesSocialesC.php?action=selectAll',
                data: {
                    txtCoop: txtCoop,
                    txtFechaInicio: txtFechaInicio,
                    txtFechaFin: txtFechaFin
                },
                type: "post",
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
            "order": [[1, "asc"]]
        }).DataTable();
    }
});

function mostrar_uno(Id) {
    $.post("../ajax/campaniasRedesSocialesC.php?action=selectById", {Id: Id}, function (datos, estado) {
        datos = JSON.parse(datos);
        mostrar_formulario(true);
        $("#IDC").val(datos.ID);
        $("#txtCooperativa").val(datos.Cooperativa);
        $("#txtTipoRedSocial").val(datos.TipoRedSocial);
        $("#txtTipoCliente").val(datos.TipoCliente);
        $("#txtFechaGestion").val(datos.FechaGestion);
        $("#horaFin").val(datos.TmStmp);
        $("#txtEstadoConversacion").val(datos.EstadoConversacion);
        $("#txtCelular").val(datos.Celular);
        $("#txtNombreCliente").val(datos.Nombre);
        $("#txtMensaje").val(datos.Mensaje);
        $("#txtMotivoMensaje").val(datos.MotivoMensaje);
        $("#txtSubmotivoMensaje").empty();
        $("#txtSubmotivoMensaje").append('<option>' + datos.SubmotivoMensaje + '</option>');
        $("#txtObservaciones").val(datos.Observaciones);
        $("#txtEstadoCliente").val(datos.EstadoCliente);
        $.ajax({
            type: "GET",
            url: '../ajax/campaniasRedesSocialesC.php?action=fechaInicio',
            success: function (r) {
                $("#fechaInicio").val(r);
                $("#mostrarHora").html(r);
            }
        });
    });
}

$('#txtMotivoMensaje').change(function () {
    var motivo = $('#txtMotivoMensaje').val();
    $.ajax({
        type: "GET",
        url: '../ajax/campaniasRedesSocialesC.php?action=estatus',
        data: {motivo: motivo},
        success: function (r) {
            $("#txtSubmotivoMensaje").html(r);
        }
    });
});

$('#txtEstadoConversacion').change(function () {
    if ($('#txtEstadoConversacion').val() == 'Activa' || $('#txtEstadoConversacion').val() == '') {
        pnlMensajeFinal(false, true);
        $('#pnlMensajes').hide();
    } else {
        pnlMensajeFinal(true, false);
        $('#pnlMensajes').show();
    }
});

$('#txtTipoRedSocial').change(function () {
    if ($('#txtTipoRedSocial').val() == 'WhatsApp') {
        $('#txtCelular').attr('required', true);
        $('#txtNombreCliente').attr('required', false);
    } else {
        $('#txtCelular').attr('required', false);
        $('#txtNombreCliente').attr('required', true);
    }
});

document.getElementById("image").onchange = function () {
    var reader = new FileReader();
    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("vistaPrevia").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};

function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/campaniasRedesSocialesC.php?action=save",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            if (datos == 'Error: registro no se pudo almacenar' || datos == "Error: registro no se pudo actualizar" || datos == "Error de almacenamiento") {
                bootbox.alert("Por favor, intente almacenar nuevamente!");
                $("#btnGuardar").prop("disabled", false);
            } else {
                bootbox.alert(datos);
                $("#btnNuevaGestion").prop("disabled", false);
                $("#btnGuardar").prop("disabled", true);
                mostrar_formulario(false);
                $('#listadoRegistros').hide();
            }
        }
    });
}

init(); /* ejecuta la función inicial */

function obtenerFecha2(text) {
    var today = new Date(text);
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();

    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd
    return today;
}

//state1 = required, state2 = readonly
function pnlTRX(state1, state2) {
    $('#txtCooperativa').attr('required', state1);
    $('#txtCooperativa').attr('readonly', state2);
    $("#txtTipoRedSocial").attr('required', state1);
    $('#txtTipoRedSocial').attr('readonly', state2);
    $('#txtTipoCliente').attr('required', state1);
    $('#txtTipoCliente').attr('readonly', state2);
    $('#txtEstadoConversacion').attr('required', state1);
    $('#txtEstadoConversacion').attr('readonly', state2);
    $('#txtCantidadMensajes').attr('required', state1);
    $('#txtCantidadMensajes').attr('readonly', state2);
}

//state1 = required, state2 = readonly
function pnlMensajeFinal(state1, state2) {
    $('#txtMotivoMensaje').attr('required', state1);
    $('#txtMotivoMensaje').attr('readonly', state2);
    $('#txtSubmotivoMensaje').attr('required', state1);
    $('#txtSubmotivoMensaje').attr('readonly', state2);
    $("#txtObservaciones").attr('required', state1);
    $('#txtObservaciones').attr('readonly', state2);
}