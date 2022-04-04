var tabla;

function init() { /* función inicial */
    mostrar_formulario(false);
    $("#listadoRegistros").hide();

    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
}

function limpiar_formulario() {
    document.getElementById("formulario").reset();
    pnlTRX(false, false);
}

function mostrar_formulario(flag) { /* muestra u oculta el formulario segun la validación del bool (flag) */
    limpiar_formulario();
    if (flag) {
        $("#listadoRegistros").hide();
        $("#formularioRegistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnNuevaGestion").hide();
        $("#divFiltros").hide();
    } else {
        $("#listadoRegistros").show();
        $("#formularioRegistros").hide();
        $("#btnNuevaGestion").show();
        $("#divFiltros").show();
    }
}

function cancelar_formulario() {
    limpiar_formulario();
    mostrar_formulario(false);
    if ($("#txtFechaInicio").val() == '' && $("#txtFechaFin").val() == '') {
        $("#listadoRegistros").hide();
    } else {
        $("#listadoRegistros").show();
    }
}

$("#btnNuevaGestion").click(function () {
    mostrar_formulario(true);
    pnlTRX(true, false);
    $("#pnlEncuestaOscus").hide();
    $('#encuestaOscus').hide();
    $('#txtConvencional').attr('readonly', false);
    $('#txtCorreo').attr('readonly', false);
    $.ajax({
        type: "GET",
        url: '../ajax/comercialC.php?action=fechaInicio',
        success: function (r) {
            $("#horaInicio").val(r);
            $("#mostrarHora").html(r);
        }
    });
});


$("#btnBuscar").click(function () {
    $("#pnlEncuestaOscus").show();
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
                url: '../ajax/comercialC.php?action=selectAll',
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
    $.post("../ajax/comercialC.php?action=selectById", {Id: Id}, function (datos, estado) {
        datos = JSON.parse(datos);
        mostrar_formulario(true);
        $("#IDC").val(datos.Id);
        $("#txtEntidad").val(datos.NombreEntidad);
        $("#txtTipoEntidad").val(datos.TipoEntidad);
        $("#txtSegmento").val(datos.Segmento);
        $("#txtMotivoLlamada").val(datos.MotivoLlamada);
        $("#txtSubmotivoLlamada").empty();
        $("#txtSubmotivoLlamada").append('<option>' + datos.SubmotivoLlamada + '</option>');
        $("#txtTelefonoContacto").val(datos.ContactAddress);
        $("#txtObservaciones").val(datos.Observaciones);
        $("#txtPersonaContacto").val(datos.PersonaContacto);
        $("#txtCiudad").val(datos.CiudadEntidad);
        $("#txtDireccion").val(datos.DirecciónEntidad);
        $("#txtCelular1").val(datos.Celular1);
        $("#txtCelular2").val(datos.Celular2);
        $("#txtConvencional1").val(datos.Convencional1);
        $("#txtConvencional2").val(datos.Convencional2);
        $("#txtCorreo").val(datos.CorreoEntidad);
        $("#txtCantidadActivos").val(datos.CantidadClientesActivos);
        $("#txtCantidadTC").val(datos.CantidadTC);
        $.ajax({
            type: "GET",
            url: '../ajax/comercialC.php?action=fechaInicio',
            success: function (r) {
                $("#horaInicio").val(r);
                $("#mostrarHora").html(r);
            }
        });
    });
}

function eliminar(Id) {
    if (confirm("Desea eliminar el registro seleccionado?")) {
        $.ajax({
            url: '../ajax/comercialC.php?action=delete',
            method: 'POST',
            data: {Id: Id},
            success: function (datos) {
                bootbox.alert(datos);
                tabla.ajax.reload();
            }
        });
    }
};

$('#txtMotivoLlamada').change(function () {
    var motivo = $('#txtMotivoLlamada').val();
    $.ajax({
        type: "GET",
        url: '../ajax/comercialC.php?action=estatus',
        data: {motivo: motivo},
        success: function (r) {
            $("#txtSubmotivoLlamada").html(r);
        }
    });
});

function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/comercialC.php?action=save",
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
                limpiar_formulario();
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
    $('#txtEntidad').attr('required', state1);
    $('#txtEntidad').attr('readonly', state2);
    $('#txtTipoEntidad').attr('required', state1);
    $('#txtTipoEntidad').attr('readonly', state2);
    $('#txtMotivoLlamada').attr('required', state1);
    $('#txtMotivoLlamada').attr('readonly', state2);
    $('#txtSubmotivoLlamada').attr('required', state1);
    $('#txtSubmotivoLlamada').attr('readonly', state2);
    $('#txtTelefonoContacto').attr('required', state1);
    $('#txtTelefonoContacto').attr('readonly', state2);
    $('#txtObservaciones').attr('required', state1);
    $('#txtObservaciones').attr('readonly', state2);
    $('#txtPersonaContacto').attr('required', state1);
    $('#txtPersonaContacto').attr('readonly', state2);
    $('#txtCiudad').attr('required', state1);
    $('#txtCiudad').attr('readonly', state2);
    $('#txtDireccion').attr('required', state1);
    $('#txtDireccion').attr('readonly', state2);
}