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
    pnlEnvio(true, false);
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
});


$("#btnBuscar").click(function () {
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
                url: '../ajax/bitacoraC.php?action=selectAll',
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
    $.post("../ajax/bitacoraC.php?action=selectById", {Id: Id}, function (datos, estado) {
        datos = JSON.parse(datos);
        mostrar_formulario(true);
        $("#IDC").val(datos.Id);
        $("#txtCooperativa").val(datos.Cooperativa);
        $("#txtTipoCampania").val(datos.TipoCampania);
        $("#txtTipoEnvio").val(datos.TipoMensaje);
        $("#txtCantidad").val(datos.Cantidad);
        $("#txtObservaciones").text(datos.Observacion);
       
    });
}

function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/bitacoraC.php?action=save",
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
function pnlEnvio(state1, state2) {
    $('#txtCooperativa').attr('required', state1);
    $('#txtCooperativa').attr('readonly', state2);
    $('#txtTipoCampania').attr('required', state1);
    $('#txtTipoCampania').attr('readonly', state2);
    $("#txtTipoEnvio").attr('required', state1);
    $('#txtTipoEnvio').attr('readonly', state2);
    $("#txtCantidad").attr('required', state1);
    $('#txtCantidad').attr('readonly', state2);
}