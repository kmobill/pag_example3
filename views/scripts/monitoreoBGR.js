var tabla;
function init() { /* función inicial */
    mostrar_formulario(false);
    mostrar_todos();

    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
}

function limpiar_formulario() { /* limpia los datos de los formularios */
    $("#Id").val("");
    $("#CONTACTID").val("");
    $('#FECHA_LLAMADA').val('');
    $('#ESTATUS').val('');
    $('#REGION').val('');
    $('#AGENCIA').val('');
    $('#SECCION').val('');
    $('#TRANSACCION').val('');
    $('#USUARIO').val('');
    $('#IDENTIFICACION').val('');
    $('#PRODUCTO').val('');
    $('#CAMPANIA').val('');
    $('#EVALUADOR').val('');
    $('#FECHA_CALIFICACION').val('');
    $('#ESTADO_MONITOREO').val('');
    $('#CRITERIO').val('');
    $('#TMA').val('');
    $('#SALUDO_1').val('');
    $('#SALUDO_2').val('');
    $('#SALUDO_3').val('');
    $('#PRESENTACION_1').val('');
    $('#PRESENTACION_2').val('');
    $('#PRESENTACION_3').val('');
    $('#CIERRE_1').val('');
    $('#CIERRE_2').val('');
    $('#CIERRE_3').val('');
    $('#COMUNICACION_1').val('');
    $('#COMUNICACION_2').val('');
    $('#COMUNICACION_3').val('');
    $('#COMUNICACION_4').val('');
    $('#COMUNICACION_5').val('');
    $('#ERRORES_CRITICOS_1').val('');
    $('#ERRORES_CRITICOS_2').val('');
    $('#ERRORES_CRITICOS_3').val('');
    $('#ERRORES_CRITICOS_4').val('');
    $('#ERRORES_CRITICOS_5').val('');
    $('#ERRORES_CRITICOS_CUMPLIMIENTO_1').val('');
    $('#ERRORES_CRITICOS_CUMPLIMIENTO_2').val('');
    $('#ERRORES_CRITICOS_CUMPLIMIENTO_3').val('');
    $('#ERRORES_CRITICOS_CUMPLIMIENTO_4').val('');
    $('#ERRORES_CRITICOS_CUMPLIMIENTO_5').val('');
    $('#MANEJO_GESTION').val('');
    $('#MEJORAS').val('');
    $('#Nota_ECUF').val('');
    $('#Nota_ECN').val('');
    $('#Nota_ENC').val('');
    $('#TOTAL').val('');
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

function cancelar_formulario() { /* función para cancelar la operación */
    limpiar_formulario();
    mostrar_formulario(false);
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
            url: '../ajax/monitoreoC.php?action=selectAll',
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
        "order": [[5, "asc"]]
    }).DataTable();
    tabla.on('order.dt search.dt', function () {
        tabla.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
}

function mostrar_uno(Id) {
    $.post("../ajax/monitoreoC.php?action=selectById", {Id: Id}, function (datos, estado) {
        datos = JSON.parse(datos);
        mostrar_formulario(true);
        $("#IDC").val(datos.Id);
        $("#CONTACTID").val(datos.ContactId);
        $('#FECHA_ATENCION').val(datos.FechaAtencion);
        $('#ESTATUS').val(datos.Status);
        $('#AREA').val(datos.Area);
        $('#REGION').val(datos.Region);
        $('#AGENCIA').val(datos.Agencia);
        $('#SECCION').val(datos.Seccion);
        $('#TRANSACCION').val(datos.Transaccion);
        $('#USUARIO').val(datos.Agent);
        $('#IDENTIFICACION').val(datos.Identificacion);
        $('#PRODUCTO').val(datos.Producto);
        $('#CAMPANIA').val(datos.Campania);
        $('#EVALUADOR').val(datos.Evaluador);
        $('#FECHA_CALIFICACION').val(datos.fechaCalificacion);
        $('#ESTADO_MONITOREO').val(datos.EstadoMonitoreo);
        $('#CRITERIO').val(datos.Criterio);
        $('#TMA').val(datos.TMA);
        $('#SALUDO_1').val(datos.Saludo1);
        $('#SALUDO_2').val(datos.Saludo2);
        $('#SALUDO_3').val(datos.Saludo3);
        $('#PRESENTACION_1').val(datos.Presentacion1);
        $('#PRESENTACION_2').val(datos.Presentacion2);
        $('#PRESENTACION_3').val(datos.Presentacion3);
        $('#CIERRE_1').val(datos.Cierre1);
        $('#CIERRE_2').val(datos.Cierre2);
        $('#CIERRE_3').val(datos.Cierre3);
        $('#COMUNICACION_1').val(datos.Comunicacion1);
        $('#COMUNICACION_2').val(datos.Comunicacion2);
        $('#COMUNICACION_3').val(datos.Comunicacion3);
        $('#COMUNICACION_4').val(datos.Comunicacion4);
        $('#COMUNICACION_5').val(datos.Comunicacion5);
        $('#ERRORES_CRITICOS_1').val(datos.ErroresCriticos1);
        $('#ERRORES_CRITICOS_2').val(datos.ErroresCriticos2);
        $('#ERRORES_CRITICOS_3').val(datos.ErroresCriticos3);
        $('#ERRORES_CRITICOS_4').val(datos.ErroresCriticos4);
        $('#ERRORES_CRITICOS_5').val(datos.ErroresCriticos5);
        $('#ERRORES_CRITICOS_CUMPLIMIENTO_1').val(datos.ErroresCriticosCumplimiento1);
        $('#ERRORES_CRITICOS_CUMPLIMIENTO_2').val(datos.ErroresCriticosCumplimiento2);
        $('#ERRORES_CRITICOS_CUMPLIMIENTO_3').val(datos.ErroresCriticosCumplimiento3);
        $('#ERRORES_CRITICOS_CUMPLIMIENTO_4').val(datos.ErroresCriticosCumplimiento4);
        $('#ERRORES_CRITICOS_CUMPLIMIENTO_5').val(datos.ErroresCriticosCumplimiento5);
        $('#MANEJO_GESTION').val(datos.ManejoGestion);
        $('#MEJORAS').val(datos.Mejoras);
        $('#Nota_ECUF').val(datos.Nota_ECUF);
        $('#Nota_ECN').val(datos.Nota_ECN);
        $('#Nota_ENC').val(datos.Nota_ENC);
        $('#TOTAL').val(datos.Total);
    });
}

function desactivar(Id) { /* desactivar */
    bootbox.confirm("¿Seguro quieres desactivar este usuario?", function (result) {
        if (result) {
            $.post("../ajax/monitoreoC.php?action=desactivate", {Id: Id}, function (e) {
                bootbox.alert(e);
                location.reload();
                mostrar_formulario(false);
            });
        }
    });
}

function activar(Id) { /* activar */
    bootbox.confirm("¿Seguro quieres activar este usuario?", function (result) {
        mostrar_formulario(false);
        if (result) {
            $.post("../ajax/monitoreoC.php?action=activate", {Id: Id}, function (e) {
                bootbox.alert(e);
                location.reload();
                mostrar_formulario(false);
            });
        }
    });
}

$("#btnAgregar").click(function () {
    limpiar_formulario();
    $("#IDC").attr('readonly', false);
});

$("#btnCalificaciones").click(function () {
    var SALUDO_1 = isNaN(parseFloat($("#SALUDO_1").val())) ? 0 : parseFloat($("#SALUDO_1").val());
    var SALUDO_2 = isNaN(parseFloat($("#SALUDO_2").val())) ? 0 : parseFloat($("#SALUDO_2").val());
    var SALUDO_3 = isNaN(parseFloat($("#SALUDO_3").val())) ? 0 : parseFloat($("#SALUDO_3").val());
    var PRESENTACION_1 = isNaN(parseFloat($("#PRESENTACION_1").val())) ? 0 : parseFloat($("#PRESENTACION_1").val());
    var PRESENTACION_2 = isNaN(parseFloat($("#PRESENTACION_2").val())) ? 0 : parseFloat($("#PRESENTACION_2").val());
    var PRESENTACION_3 = isNaN(parseFloat($("#PRESENTACION_3").val())) ? 0 : parseFloat($("#PRESENTACION_3").val());
    var CIERRE_1 = isNaN(parseFloat($("#CIERRE_1").val())) ? 0 : parseFloat($("#CIERRE_1").val());
    var CIERRE_2 = isNaN(parseFloat($("#CIERRE_2").val())) ? 0 : parseFloat($("#CIERRE_2").val());
    var CIERRE_3 = isNaN(parseFloat($("#CIERRE_3").val())) ? 0 : parseFloat($("#CIERRE_3").val());
    var COMUNICACION_1 = isNaN(parseFloat($("#COMUNICACION_1").val())) ? 0 : parseFloat($("#COMUNICACION_1").val());
    var COMUNICACION_2 = isNaN(parseFloat($("#COMUNICACION_2").val())) ? 0 : parseFloat($("#COMUNICACION_2").val());
    var COMUNICACION_3 = isNaN(parseFloat($("#COMUNICACION_3").val())) ? 0 : parseFloat($("#COMUNICACION_3").val());
    var COMUNICACION_4 = isNaN(parseFloat($("#COMUNICACION_4").val())) ? 0 : parseFloat($("#COMUNICACION_4").val());
    var COMUNICACION_5 = isNaN(parseFloat($("#COMUNICACION_5").val())) ? 0 : parseFloat($("#COMUNICACION_5").val());
    var ERRORES_CRITICOS_1 = isNaN(parseFloat($("#ERRORES_CRITICOS_1").val())) ? 0 : parseFloat($("#ERRORES_CRITICOS_1").val());
    var ERRORES_CRITICOS_2 = isNaN(parseFloat($("#ERRORES_CRITICOS_2").val())) ? 0 : parseFloat($("#ERRORES_CRITICOS_2").val());
    var ERRORES_CRITICOS_3 = isNaN(parseFloat($("#ERRORES_CRITICOS_3").val())) ? 0 : parseFloat($("#ERRORES_CRITICOS_3").val());
    var ERRORES_CRITICOS_4 = isNaN(parseFloat($("#ERRORES_CRITICOS_4").val())) ? 0 : parseFloat($("#ERRORES_CRITICOS_4").val());
    var ERRORES_CRITICOS_5 = isNaN(parseFloat($("#ERRORES_CRITICOS_5").val())) ? 0 : parseFloat($("#ERRORES_CRITICOS_5").val());
    var ERRORES_CRITICOS_CUMPLIMIENTO_1 = isNaN(parseFloat($("#ERRORES_CRITICOS_CUMPLIMIENTO_1").val())) ? 0 : parseFloat($("#ERRORES_CRITICOS_CUMPLIMIENTO_1").val());
    var ERRORES_CRITICOS_CUMPLIMIENTO_2 = isNaN(parseFloat($("#ERRORES_CRITICOS_CUMPLIMIENTO_2").val())) ? 0 : parseFloat($("#ERRORES_CRITICOS_CUMPLIMIENTO_2").val());
    var ERRORES_CRITICOS_CUMPLIMIENTO_3 = isNaN(parseFloat($("#ERRORES_CRITICOS_CUMPLIMIENTO_3").val())) ? 0 : parseFloat($("#ERRORES_CRITICOS_CUMPLIMIENTO_3").val());
    var ERRORES_CRITICOS_CUMPLIMIENTO_4 = isNaN(parseFloat($("#ERRORES_CRITICOS_CUMPLIMIENTO_4").val())) ? 0 : parseFloat($("#ERRORES_CRITICOS_CUMPLIMIENTO_4").val());
    var ERRORES_CRITICOS_CUMPLIMIENTO_5 = isNaN(parseFloat($("#ERRORES_CRITICOS_CUMPLIMIENTO_5").val())) ? 0 : parseFloat($("#ERRORES_CRITICOS_CUMPLIMIENTO_5").val());
    var Nota_ENC = SALUDO_1 + SALUDO_2 + SALUDO_3 + PRESENTACION_1 + PRESENTACION_2 + PRESENTACION_3 + CIERRE_1 +
            CIERRE_2 + CIERRE_3 + COMUNICACION_1 + COMUNICACION_2 + COMUNICACION_3 + COMUNICACION_4 + COMUNICACION_5;
    var Nota_ECUF = ERRORES_CRITICOS_1 + ERRORES_CRITICOS_2 + ERRORES_CRITICOS_3 + ERRORES_CRITICOS_4 + ERRORES_CRITICOS_5;
    var Nota_ECN = ERRORES_CRITICOS_CUMPLIMIENTO_1 + ERRORES_CRITICOS_CUMPLIMIENTO_2 + ERRORES_CRITICOS_CUMPLIMIENTO_3 + ERRORES_CRITICOS_CUMPLIMIENTO_4 +
            ERRORES_CRITICOS_CUMPLIMIENTO_5;
    var Total = Nota_ENC + Nota_ECUF + Nota_ECN;
    $("#Nota_ENC").val(Nota_ENC + "%");
    $("#Nota_ECUF").val(Nota_ECUF + "%");
    $("#Nota_ECN").val(Nota_ECN + "%");
    $("#TOTAL").val(Total + "%");
});

function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnCalificaciones").trigger("click");
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/monitoreoC.php?action=save",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            bootbox.alert(datos);
            mostrar_formulario(false);
            tabla.ajax.reload();
            limpiar_formulario();
        }
    });
}

init(); /* ejecuta la función inicial */