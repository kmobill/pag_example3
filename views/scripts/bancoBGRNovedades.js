var tabla;
function init() { /* función inicial */
    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
    $("#btnGuardar").prop("disabled", true);
    pnlNovedades(true);
}

function limpiar_formulario() {
    document.getElementById("formulario").reset();
    pnlNovedades(true);
}

function cancelar_formulario() {
    $("#btnNuevaGestion").prop("disabled", false);
    $("#btnGuardar").prop("disabled", true);
    limpiar_formulario();
}

function nuevaGestion() {
    $("#btnGuardar").prop("disabled", false);
    $("#btnNuevaGestion").prop("disabled", true);
    document.getElementById("formulario").reset();
    pnlNovedades(false);
    $.ajax({
        type: "GET",
        url: '../ajax/bancoBGRNovedadesC.php?action=fechaInicio',
        success: function (r) {
            $("#horaInicio").val(r);
            $("#mostrarHora").html(r);
        }
    });
    $.ajax({
        type: "GET",
        url: '../ajax/bancoBGRNovedadesC.php?action=idCliente',
        success: function (r) {
            var id = parseInt(r) + 1;
            $("#IDC").val(id);
        }
    });
}

$('#txtIdentificacion').blur(function () {
    var identificacion = $('#txtIdentificacion').val();
    if (identificacion == '9999999999') {
        $('#txtNombreCliente').val("Sin Nombres");
    }
});

function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/bancoBGRNovedadesC.php?action=save",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            if (datos == 'Error: registro no se pudo almacenar' || datos == "Error: registro no se pudo actualizar" || datos == "Error de almacenamiento") {
                bootbox.alert("Por favor, intente almacenar nuevamente!");
                $("#btnGuardar").prop("disabled", false);
            } else {
                $.ajax({
                    url: "../ajax/bancoBGRNovedadesC.php?action=envioMail",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (datos) {
                        //bootbox.alert(datos);
                    }
                });
                bootbox.alert(datos);
                $("#btnNuevaGestion").prop("disabled", false);
                $("#btnGuardar").prop("disabled", true);
                limpiar_formulario();
            }
        }
    });
}

init(); /* ejecuta la función inicial */

//state1 = required, state2 = readonly
function pnlNovedades(state1) {
    $('#txtIdentificacion').attr('readonly', state1);
    $('#txtAgencia').attr('readonly', state1);
    $('#txtCampania').attr('readonly', state1);
    $('#txtSeccion').attr('readonly', state1);
    $('#txtFechaAtencion').attr('readonly', state1);
    $('#txtTelefonoContacto').attr('readonly', state1);
    $('#txtObservaciones').attr('readonly', state1);
}

