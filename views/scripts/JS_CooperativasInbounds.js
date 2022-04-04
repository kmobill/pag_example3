var tabla, num1 = 0, num2 = 0, num3 = 0, num4 = 0, num5 = 0, num6 = 0, num7 = 0;
var p1, p2, p3, p4, p5, p6, p7;

function init() { /* función inicial */
    mostrar_formulario(false);
    $("#listadoRegistros").hide();

    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
}

function limpiar_formulario() {
    document.getElementById("formulario").reset();
    pnlTRX(false, true);
    pnlEncuestaOscus(false, true);
    limpiarValidaciones();
    $('#pnlImg').hide();
    $('#txtLeyenda').hide();
    $('#txtProcesoValidacion').hide();
    $('#respuesta2').attr('required', false);
    $('#respuesta2').attr('readonly', false);
    $('#respuesta4').attr('required', false);
    $('#respuesta4').attr('readonly', false);
    $('#respuesta6').attr('required', false);
    $('#respuesta6').attr('readonly', false);
    $('#respuesta8').attr('required', false);
    $('#respuesta8').attr('readonly', false);
    $('#respuesta10').attr('required', false);
    $('#respuesta10').attr('readonly', false);
    $('#txtIdentificacionTerceraPersona').attr('required', false);
    $('#txtIdentificacionTerceraPersona').attr('readonly', false);
    $('#txtTerceraPersona').attr('required', false);
    $('#txtTerceraPersona').attr('readonly', false);
    $('#txtConvencional').attr('required', false);
    $('#txtConvencional').attr('readonly', false);
    $("#chkHoraFin").prop("checked", false);
    $('#horaFin').attr('required', false);
    $('#horaFin').attr('readonly', true);
    $('#pnlPreguntasValidaciones').hide();
}

function limpiarValidaciones() {
    $('#txtProcesoValidacion').attr('required', false);
    $('#txtProcesoValidacion').val("");
    $('#preguntavalidacion1').hide();
    $('#encabezado').hide();
    $('#preguntavalidacion1').val("");
    $('#respuestavalidacion1').hide();
    $('#respuestavalidacion1').val("");
    $('#respuestavalidacion1').attr('required', false);
    $('#validacion1').hide();
    $('#validacion1').val("");
    $('#validacion1').attr('required', false);
    $('#preguntavalidacion2').hide();
    $('#preguntavalidacion2').val("");
    $('#respuestavalidacion2').hide();
    $('#respuestavalidacion2').val("");
    $('#respuestavalidacion2').attr('required', false);
    $('#validacion2').hide();
    $('#validacion2').val("");
    $('#validacion2').attr('required', false);
    $('#preguntavalidacion3').hide();
    $('#preguntavalidacion3').val("");
    $('#respuestavalidacion3').hide();
    $('#respuestavalidacion3').val("");
    $('#respuestavalidacion3').attr('required', false);
    $('#validacion3').hide();
    $('#validacion3').val("");
    $('#validacion3').attr('required', false);
    $('#preguntavalidacion4').hide();
    $('#preguntavalidacion4').val("");
    $('#respuestavalidacion4').hide();
    $('#respuestavalidacion4').val("");
    $('#respuestavalidacion4').attr('required', false);
    $('#validacion4').hide();
    $('#validacion4').val("");
    $('#validacion4').attr('required', false);
    $('#preguntavalidacion5').hide();
    $('#preguntavalidacion5').val("");
    $('#respuestavalidacion5').hide();
    $('#respuestavalidacion5').val("");
    $('#respuestavalidacion5').attr('required', false);
    $('#validacion5').hide();
    $('#validacion5').val("");
    $('#validacion5').attr('required', false);
    $('#preguntavalidacion6').hide();
    $('#preguntavalidacion6').val("");
    $('#respuestavalidacion6').hide();
    $('#respuestavalidacion6').val("");
    $('#respuestavalidacion6').attr('required', false);
    $('#validacion6').hide();
    $('#validacion6').val("");
    $('#validacion6').attr('required', false);
    $('#preguntavalidacion7').hide();
    $('#preguntavalidacion7').val("");
    $('#respuestavalidacion7').hide();
    $('#respuestavalidacion7').val("");
    $('#respuestavalidacion7').attr('required', false);
    $('#validacion7').hide();
    $('#validacion7').val("");
    $('#validacion7').attr('required', false);
}

function mostrar_formulario(flag) { /* muestra u oculta el formulario segun la validación del bool (flag) */
    limpiar_formulario();
    if (flag) {
        $("#listadoRegistros").hide();
        $("#formularioRegistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnNuevaGestion").hide();
        $("#divFiltros").hide();
        pnlTRX(false, false);
        pnlEncuestaOscus(false, false);
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
    limpiarValidaciones();
    $("#listadoRegistros").hide();
}

$("#btnNuevaGestion").click(function () {
    mostrar_formulario(true);
    pnlEncuestaOscus(false, false);
    pnlTRX(true, false);
    $("#pnlEncuestaOscus").hide();
    $('#encuestaOscus').hide();
    $('#txtConvencional').attr('readonly', false);
    $('#txtCorreo').attr('readonly', false);
    $.ajax({
        type: "GET",
        url: '../ajax/campaniasInboundC.php?action=fechaInicio',
        success: function (r) {
            $("#horaInicio").val(r);
            $("#mostrarHora").html(r);
        }
    });
});


$("#btnBuscar").click(function () {
    $("#pnlEncuestaOscus").show();
    $('#encuestaOscus').show();
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
                url: '../ajax/campaniasInboundC.php?action=selectAll',
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
    $.ajax({
        type: "GET",
        url: '../ajax/campaniasInboundC.php?action=motivo',
        success: function (r) {
            $('#txtMotivoLlamada').html(r);
        }
    });
    
    $.ajax({
        type: "GET",
        url: '../ajax/campaniasInboundC.php?action=fechaInicio',
        success: function (r) {
            $("#horaInicio").val(r);
            $("#mostrarHora").html(r);
        }
    });

    $.post("../ajax/campaniasInboundC.php?action=selectById", {Id: Id}, function (datos, estado) {
        datos = JSON.parse(datos);
        mostrar_formulario(true);
        $("#IDC").val(datos.ID);
        $("#txtCooperativa").val(datos.Cooperativa);
        $("#txtTipoLlamada").val(datos.TipoLlamada);
        $("#txtEstadoLlamada").val(datos.EstadoLlamada);
        $("#horaInicio").val(datos.StartedManagement);
        $("#horaFin").val(datos.TmStmp);
        $("#txtIdentificacion").val(datos.Identificacion);
        $("#txtNombreCliente").val(datos.NombreCliente);
        $("#txtCiudadCliente").val(datos.CiudadCliente);
        $("#txtBarrioSector").val(datos.BarrioSectorCliente);
        $("#txtCelular").val(datos.Celular);
        $("#txtConvencional").val(datos.Convencional);
        $("#txtCorreo").val(datos.Correo);
        $("#txtFechaNacimiento").val(datos.FechaNacimiento);
        $("#txtTipoCliente").val(datos.TipoCliente);
        $("#txtIdentificacionTerceraPersona").val(datos.IdentificacionTerceraPersona);
        $("#txtTerceraPersona").val(datos.TerceraPersona);
        $("#txtTranferencia").val(datos.Transferencia);
        $("#txtObsTranferencia").val(datos.ObservacionTransferencia);
        $("#txtMotivoLlamada").val(datos.MotivoLlamada);
        var motivo = datos.MotivoLlamada;
        $.ajax({
            type: "GET",
            url: '../ajax/campaniasInboundC.php?action=estatus',
            data: {motivo: motivo},
            success: function (r) {
                $("#txtSubmotivoLlamada").html(r);
                $("#txtSubmotivoLlamada").val(datos.SubmotivoLlamada).select();
            }
        });
        if (datos.TipoTransaccion == 'Primera Gestión'){
            $("#txtTipoTransaccion1").prop("checked", true);
        } else {
            $("#txtTipoTransaccion2").prop("checked", true);
        }
        if (datos.TipoSocio == 'Socio'){
            $("#txtTipoSocio1").prop("checked", true);
        } else {
            $("#txtTipoSocio2").prop("checked", true);
        }
        $("#txtObservaciones").val(datos.Observaciones);
        $("#txtEstadoCliente").val(datos.EstadoCliente);
        $("#txtEstadoEncuesta").val(datos.EstadoEncuesta);
        $("#txtObservacionesEncuesta").val(datos.ObservacionesEncuesta);
        $("#respuesta1").val(datos.respuesta1);
        $("#respuesta2").val(datos.respuesta2);
        $("#respuesta3").val(datos.respuesta3);
        $("#respuesta4").val(datos.respuesta4);
        $("#respuesta5").val(datos.respuesta5);
        $("#respuesta6").val(datos.respuesta6);
        $("#respuesta7").val(datos.respuesta7);
        $("#respuesta8").val(datos.respuesta8);
        $("#respuesta9").val(datos.respuesta9);
        $("#respuesta10").val(datos.respuesta10);
        $("#txtProcesoValidacion").val(datos.procesoValidacion);
        $("#preguntavalidacion1").val(datos.PreguntaValidacion1);
        $("#respuestavalidacion1").val(datos.RespuestaValidacion1);
        $("#preguntavalidacion2").val(datos.PreguntaValidacion2);
        $("#respuestavalidacion2").val(datos.RespuestaValidacion2);
        $("#preguntavalidacion3").val(datos.PreguntaValidacion3);
        $("#respuestavalidacion3").val(datos.RespuestaValidacion3);
        $("#preguntavalidacion4").val(datos.PreguntaValidacion4);
        $("#respuestavalidacion4").val(datos.RespuestaValidacion4);
        $("#preguntavalidacion5").val(datos.PreguntaValidacion5);
        $("#respuestavalidacion5").val(datos.RespuestaValidacion5);
        $("#preguntavalidacion6").val(datos.PreguntaValidacion6);
        $("#respuestavalidacion6").val(datos.RespuestaValidacion6);
        $("#preguntavalidacion7").val(datos.PreguntaValidacion7);
        $("#respuestavalidacion7").val(datos.RespuestaValidacion7);
        $("#validacion1").val(datos.Validacion1);
        $("#validacion2").val(datos.Validacion2);
        $("#validacion3").val(datos.Validacion3);
        $("#validacion4").val(datos.Validacion4);
        $("#validacion5").val(datos.Validacion5);
        $("#validacion6").val(datos.Validacion6);
        $("#validacion7").val(datos.Validacion7);
    });
}

$('#chkHoraFin').change(function () {
    if (!$(this).is(":checked")) {
        $('#horaFin').attr('readonly', true);
        $('#horaFin').attr('required', false);
    } else {
        $('#horaFin').attr('readonly', false);
        $('#horaFin').attr('required', true);
    }
});

$('#txtMotivoLlamada').change(function () {
    var motivo = $('#txtMotivoLlamada').val();
    var cooperativa = $('#txtCooperativa').val();
    $.ajax({
        type: "GET",
        url: '../ajax/campaniasInboundC.php?action=estatus',
        data: {motivo: motivo},
        success: function (r) {
            $("#txtSubmotivoLlamada").html(r);
        }
    });
    if (cooperativa == '') {
        bootbox.alert("Seleccione una cooperativa para acceder a las preguntas de validación!...");
        $('#txtMotivoLlamada').val("");
    } else {
        if (motivo == 'VALIDACIÓN DE DATOS') {
            limpiarValidaciones();
            $('#modalValidaciones').modal('show');
            $.ajax({
                type: "GET",
                url: '../ajax/campaniasInboundC.php?action=procesoValidacion',
                data: {cooperativa: cooperativa},
                success: function (r) {
                    if (r == '<option></option><option value=""></option>') { //preguntamos si es vacío la data extraída
                        $('#txtLeyenda').hide();
                        $('#txtProcesoValidacion').hide();
                        var motivo = "";
                        var cooperativa = $('#txtCooperativa').val();
                        $('#encabezado').show();
                        $('#preguntavalidacion1').show();
                        $('#respuestavalidacion1').show();
                        $('#validacion1').show();
//                        $('#validacion1').attr('required', true);
//                        $('#respuestavalidacion1').attr('required', true);
                        /********Visualización de pregunta básica por cooperativa*********/
                        $.ajax({
                            type: "post",
                            dataType: "json",
                            data: {cooperativa: cooperativa, motivo: motivo},
                            url: '../ajax/campaniasInboundC.php?action=preguntaBasica',
                            success: function (r) {
                                $("#preguntavalidacion1").val(r[0][1]);
                            }
                        });
                        /********Visualización de preguntas medias por cooperativa*********/
                        $.ajax({
                            type: "post",
                            dataType: "json",
                            data: {cooperativa: cooperativa, motivo: motivo},
                            url: '../ajax/campaniasInboundC.php?action=preguntaMedia',
                            success: function (r) {
                                if (r[0][1] != '') {
                                    $("#preguntavalidacion2").val(r[0][1]);
                                }
                                if (r[1][1] != '') {
                                    $("#preguntavalidacion4").val(r[1][1]);
                                }
                                if (r[2][1] != '') {
                                    $("#preguntavalidacion5").val(r[2][1]);
                                }
                            }
                        });
                        /********Visualización de preguntas avanzadas por cooperativa*********/
                        $.ajax({
                            type: "post",
                            dataType: "json",
                            data: {cooperativa: cooperativa, motivo: motivo},
                            url: '../ajax/campaniasInboundC.php?action=preguntaAvanzada',
                            success: function (r) {
                                if (r[0][1] != '') {
                                    $("#preguntavalidacion3").val(r[0][1]);
                                }
                                if (r[1][1] != '') {
                                    $("#preguntavalidacion6").val(r[1][1]);
                                }
                                if (r[2][1] != '') {
                                    $("#preguntavalidacion7").val(r[2][1]);
                                }
                            }
                        });
                    } else {
                        $('#txtLeyenda').show();
                        $('#txtProcesoValidacion').show();
                        $("#txtProcesoValidacion").html(r);
                    }
                }
            });
        } else if (motivo == 'SOLICITUD DE PRODUCTOS' || motivo == 'SOLICITUD DE SERVICIOS'){
            $('#txtMonto').show();
            $('#txtPlazo').show();
            $('#txtObservacionSolicitud').show();
            $('#txtMonto').attr('required', true);
            $('#txtPlazo').attr('required', true);
            $('#txtObservacionSolicitud').attr('required', true);
        }else{
            limpiarValidaciones();
            $('#modalValidaciones').modal('hide');
            $('#txtMonto').hide();
            $('#txtPlazo').hide();
            $('#txtObservacionSolicitud').hide();
            $('#txtMonto').attr('required', false);
            $('#txtPlazo').attr('required', false);
            $('#txtObservacionSolicitud').attr('required', false);
        }
    }
    if (motivo == 'PROCESOS DE TD' || motivo == 'PROCESOS DE BANCA VIRTUAL' || motivo == 'PROCESOS DE TC' || motivo == 'PROCESOS DE TC ADICIONAL') {
        $('#pnlImg').show();
    } else {
        $('#pnlImg').hide();
    }
});

$('#txtProcesoValidacion').change(function () {
    var motivo = $('#txtProcesoValidacion').val();
    var cooperativa = $('#txtCooperativa').val();
    $('#encabezado').show();
    $('#preguntavalidacion1').show();
    $('#respuestavalidacion1').show();
    $('#validacion1').show();
//    $('#validacion1').attr('required', true);
//    $('#respuestavalidacion1').attr('required', true);
    /********Visualización de pregunta básica por cooperativa*********/
    $.ajax({
        type: "post",
        dataType: "json",
        data: {cooperativa: cooperativa, motivo: motivo},
        url: '../ajax/campaniasInboundC.php?action=preguntaBasica',
        success: function (r) {
            $("#preguntavalidacion1").val(r[0][1]);
        }
    });
    /********Visualización de preguntas medias por cooperativa*********/
    $.ajax({
        type: "post",
        dataType: "json",
        data: {cooperativa: cooperativa, motivo: motivo},
        url: '../ajax/campaniasInboundC.php?action=preguntaMedia',
        success: function (r) {
            if (r[0][1] != '') {
                $("#preguntavalidacion2").val(r[0][1]);
            }
            if (r[1][1] != '') {
                $("#preguntavalidacion4").val(r[1][1]);
            }
            if (r[2][1] != '') {
                $("#preguntavalidacion5").val(r[2][1]);
            }
        }
    });
    /********Visualización de preguntas avanzadas por cooperativa*********/
    $.ajax({
        type: "post",
        dataType: "json",
        data: {cooperativa: cooperativa, motivo: motivo},
        url: '../ajax/campaniasInboundC.php?action=preguntaAvanzada',
        success: function (r) {
            if (r[0][1] != '') {
                $("#preguntavalidacion3").val(r[0][1]);
            }
            if (r[1][1] != '') {
                $("#preguntavalidacion6").val(r[1][1]);
            }
            if (r[2][1] != '') {
                $("#preguntavalidacion7").val(r[2][1]);
            }
        }
    });
});

$('#txtIdentificacion').blur(function () {
    var identificacion = $('#txtIdentificacion').val();
    var longitud = identificacion.length;
    if (longitud >= 10) {
        if (identificacion == '0999999999' || identificacion == '9999999999') {
            $("#txtNombreCliente").val("Sin nombres");
            $("#txtCiudadCliente").val("No aplica");
            $("#txtBarrioSector").val("No aplica");
            $("#txtCelular").val("0999999999");
            $("#txtConvencional").val("022222222");
            $("#txtCorreo").val("noaplica@kimobill.com");
        } else {
            $.post("../ajax/campaniasInboundC.php?action=selectByIdentificacion", {identificacion: identificacion}, function (datos, estado) {
                datos = JSON.parse(datos);
                if (datos == '' || datos == null) {
                    $("#txtNombreCliente").val("");
                    $("#txtCiudadCliente").val("");
                    $("#txtBarrioSector").val("");
                    $("#txtCelular").val("");
                    $("#txtConvencional").val("");
                    $("#txtCorreo").val("");
                    $("#txtFechaNacimiento").val("");
                } else {
                    $("#txtIdentificacion").val(datos.Identificacion);
                    $("#txtNombreCliente").val(datos.Nombres);
                    $("#txtCiudadCliente").val(datos.Ciudad);
                    $("#txtBarrioSector").val(datos.BarrioSector);
                    $("#txtCelular").val(datos.Celular);
                    $("#txtConvencional").val(datos.Convencional);
                    $("#txtCorreo").val(datos.Correo);
                    $("#txtFechaNacimiento").val(datos.FechaNacimiento);
                }
            });
        }
    } else {
        bootbox.alert("La identificación del socio debe tener 10 o más caracteres!!!...");
    }
});

$('#txtTipoCliente').change(function () {
    var tipoCliente = $('#txtTipoCliente').val();
    if (tipoCliente == 'Tercera Persona') {
        $('#txtTerceraPersona').attr('required', true);
        $('#txtTerceraPersona').attr('readonly', false);
        $('#txtIdentificacionTerceraPersona').attr('required', true);
        $('#txtIdentificacionTerceraPersona').attr('readonly', false);
    } else {
        $('#txtTerceraPersona').attr('required', false);
        $('#txtTerceraPersona').attr('readonly', true);
        $('#txtIdentificacionTerceraPersona').attr('required', false);
        $('#txtIdentificacionTerceraPersona').attr('readonly', true);
    }
});

$('#txtCooperativa').change(function () {
    var cooperativa = $('#txtCooperativa').val();
    if (cooperativa != '') {
        $.ajax({
            type: "GET",
            url: '../ajax/campaniasInboundC.php?action=motivo',
            data: {cooperativa: cooperativa},
            success: function (r) {
                $('#txtMotivoLlamada').html(r);
                $('#txtSubmotivoLlamada').val("");
            }
        });
        $('#encuestaOscus').show();
        $('#pnlEncuestaOscus').show();
        pnlEncuestaOscus(true, false);
        $('#respuesta2').attr('required', false);
        $('#respuesta2').attr('readonly', true);
        $('#respuesta4').attr('required', false);
        $('#respuesta4').attr('readonly', true);
        $('#respuesta6').attr('required', false);
        $('#respuesta6').attr('readonly', true);
        $('#respuesta8').attr('required', false);
        $('#respuesta8').attr('readonly', true);
        $('#respuesta10').attr('required', false);
        $('#respuesta10').attr('readonly', true);

    } else {
        $('#encuestaOscus').hide();
        $('#pnlEncuestaOscus').hide();
        pnlEncuestaOscus(false, true);
        $('#respuesta2').attr('required', false);
        $('#respuesta2').attr('readonly', true);
        $('#respuesta4').attr('required', false);
        $('#respuesta4').attr('readonly', true);
        $('#respuesta6').attr('required', false);
        $('#respuesta6').attr('readonly', true);
        $('#respuesta8').attr('required', false);
        $('#respuesta8').attr('readonly', true);
        $('#respuesta10').attr('required', false);
        $('#respuesta10').attr('readonly', true);
    }
});

$('#validacion1').change(function () {
    if ($("#preguntavalidacion2").val() != '') {
        num2 = 0;
        $('#preguntavalidacion2').show();
        $('#respuestavalidacion2').show();
        $('#validacion2').show();
//        $('#validacion2').attr('required', true);
//        $('#respuestavalidacion2').attr('required', true);
    } else {
        num2 = 0;
        $('#preguntavalidacion2').hide();
        $('#respuestavalidacion2').hide();
        $('#validacion2').hide();
        $('#validacion2').attr('required', false);
        $('#respuestavalidacion2').attr('required', false);
        $('#validacion2').val("");
        $('#respuestavalidacion2').val("");
    }
    if ($('#validacion1').val() == 'Incorrecto') {
        num1 = 1;
        if ($("#preguntavalidacion4").val() != '') {
            num4 = 0;
            $('#preguntavalidacion4').show();
            $('#respuestavalidacion4').show();
            $('#validacion4').show();
//            $('#validacion4').attr('required', true);
//            $('#respuestavalidacion4').attr('required', true);
        } else {
            num4 = 0;
            $('#preguntavalidacion4').hide();
            $('#respuestavalidacion4').hide();
            $('#validacion4').hide();
            $('#validacion4').attr('required', false);
            $('#respuestavalidacion4').attr('required', false);
            $('#validacion4').val("");
            $('#respuestavalidacion4').val("");
        }
    } else {
        num1 = 0;
        $('#preguntavalidacion4').hide();
        $('#validacion4').hide();
        $('#respuestavalidacion4').hide();
        $('#validacion4').attr('required', false);
        $('#validacion4').attr('required', false);
        $('#validacion4').val("");
        $('#respuestavalidacion4').val("");
    }
});

$('#validacion2').change(function () {
    if ($("#preguntavalidacion3").val() != '') {
        num3 = 0;
        $('#preguntavalidacion3').show();
        $('#respuestavalidacion3').show();
        $('#validacion3').show();
//        $('#validacion3').attr('required', true);
//        $('#respuestavalidacion3').attr('required', true);
    } else {
        num3 = 0;
        $('#preguntavalidacion3').hide();
        $('#respuestavalidacion3').hide();
        $('#validacion3').hide();
        $('#validacion3').attr('required', false);
        $('#respuestavalidacion3').attr('required', false);
        $('#validacion3').val("");
        $('#respuestavalidacion3').val("");
    }
    if ($('#validacion2').val() == 'Incorrecto') {
        num2 = 1;
        if ($("#preguntavalidacion5").val() != '') {
            num5 = 0;
            $('#preguntavalidacion5').show();
            $('#respuestavalidacion5').show();
            $('#validacion5').show();
//            $('#validacion5').attr('required', true);
//            $('#respuestavalidacion5').attr('required', true);
        } else {
            num5 = 0;
            $('#preguntavalidacion5').hide();
            $('#respuestavalidacion5').hide();
            $('#validacion5').hide();
            $('#validacion5').attr('required', false);
            $('#respuestavalidacion5').attr('required', false);
            $('#validacion5').val("");
            $('#respuestavalidacion5').val("");
        }
    } else {
        num2 = 0;
        $('#preguntavalidacion5').hide();
        $('#respuestavalidacion5').hide();
        $('#validacion5').hide();
        $('#validacion5').attr('required', false);
        $('#respuestavalidacion5').attr('required', false);
        $('#validacion5').val("");
        $('#respuestavalidacion5').val("");
    }
});

$('#validacion3').change(function () {
    var txtCooperativa = $("#txtCooperativa").val();
    if (txtCooperativa == 'COOPERATIVA CCCA') {
        num6 = 0;
        $('#preguntavalidacion6').show();
        $('#respuestavalidacion6').show();
        $('#validacion6').show();
    } else if ($('#validacion3').val() == 'Incorrecto') {
        num3 = 1;
        if ($("#preguntavalidacion6").val() != '') {
            num6 = 0;
            $('#preguntavalidacion6').show();
            $('#respuestavalidacion6').show();
            $('#validacion6').show();
//            $('#validacion6').attr('required', true);
        } else {
            num6 = 0;
            $('#preguntavalidacion6').hide();
            $('#validacion6').hide();
            $('#respuestavalidacion6').hide();
            $('#validacion6').attr('required', false);
            $('#preguntavalidacion6').val("");
            $('#validacion6').val("");
            $('#respuestavalidacion6').val("");
        }
        if ($("#preguntavalidacion7").val() != '') {
            num7 = 0;
            $('#preguntavalidacion7').show();
            $('#validacion7').show();
            $('#respuestavalidacion7').show();
//            $('#validacion7').attr('required', true);
        } else {
            num7 = 0;
            $('#preguntavalidacion7').hide();
            $('#validacion7').hide();
            $('#respuestavalidacion7').hide();
            $('#validacion7').attr('required', false);
            $('#preguntavalidacion7').val("");
            $('#validacion7').val("");
            $('#respuestavalidacion7').val("");
        }
    } else {
        num3 = 0;
        $('#preguntavalidacion6').hide();
        $('#validacion6').hide();
        $('#respuestavalidacion6').hide();
        $('#validacion6').attr('required', false);
        $('#respuestavalidacion6').attr('required', false);
        $('#validacion6').val("");
        $('#respuestavalidacion6').val("");
        $('#preguntavalidacion7').hide();
        $('#validacion7').hide();
        $('#respuestavalidacion7').hide();
        $('#validacion7').attr('required', false);
        $('#respuestavalidacion7').attr('required', false);
        $('#validacion7').val("");
        $('#respuestavalidacion7').val("");
    }
});

$('#validacion4').change(function () {
    if ($('#validacion4').val() == 'Incorrecto') {
        num4 = 1;
    } else {
        num4 = 0;
    }
});

$('#validacion5').change(function () {
    if ($('#validacion5').val() == 'Incorrecto') {
        num5 = 1;
    } else {
        num5 = 0;
    }
});

$('#validacion6').change(function () {
    if ($('#validacion6').val() == 'Incorrecto') {
        num6 = 1;
    } else {
        num6 = 0;
    }
});

$('#validacion7').change(function () {
    if ($('#validacion7').val() == 'Incorrecto') {
        num7 = 1;
    } else {
        num7 = 0;
    }
});

$("#btnValidador").click(function () {
    var cooperativa = $('#txtCooperativa').val();
    $.ajax({
        type: "post",
        dataType: "json",
        data: {cooperativa: cooperativa},
        url: '../ajax/campaniasInboundC.php?action=preguntaporcoop',
        success: function (r) {
            if ($("#validacion1").val() == "") {
                bootbox.alert("Llene las respuestas por favor!...");
            } else {
                if (r <= 2) {
                    var sumar = num1 + num2 + num3 + num4 + num5 + num6 + num7;
                    if (sumar >= 1) {
                        $('#modalValidaciones').modal('toggle');
                        bootbox.alert("No pasa validación");
                        $('#txtSubmotivoLlamada').val("NO EXITOSO");
                    } else {
                        $('#modalValidaciones').modal('toggle');
                        bootbox.alert("Pasa validación");
                        $('#txtSubmotivoLlamada').val("EXITOSO");
                    }
                } else {
                    var sumar = num1 + num2 + num3 + num4 + num5 + num6 + num7;
                    if (sumar >= 2) {
                        $('#modalValidaciones').modal('toggle');
                        bootbox.alert("No pasa validación");
                        $('#txtSubmotivoLlamada').val("NO EXITOSO");
                    } else {
                        $('#modalValidaciones').modal('toggle');
                        bootbox.alert("Pasa validación");
                        $('#txtSubmotivoLlamada').val("EXITOSO");
                    }
                }
            }
        }
    });

});

$('#respuesta1').change(function () {
    if ($('#respuesta1').val() == '1' || $('#respuesta1').val() == '2' || $('#respuesta1').val() == '3' ||
            $('#respuesta1').val() == '4' || $('#respuesta1').val() == '5' || $('#respuesta1').val() == '6') {
        $('#pregunta2').show();
        $('#respuesta2').show();
        $('#respuesta2').attr('required', true);
        $('#respuesta2').attr('readonly', false);

    } else {
        $('#pregunta2').hide();
        $('#respuesta2').hide();
        $('#respuesta2').attr('required', false);
        $('#respuesta2').attr('readonly', true);
    }
});

$('#respuesta3').change(function () {
    if ($('#respuesta3').val() == '0' || $('#respuesta3').val() == '1' || $('#respuesta3').val() == '2' || $('#respuesta3').val() == '3' ||
            $('#respuesta3').val() == '4' || $('#respuesta3').val() == '5' || $('#respuesta3').val() == '6') {
        $('#pregunta4').val("¿Por qué seleccionó ese grado de recomendación?");
        $('#pregunta4').show();
        $('#respuesta4').show();
        $('#respuesta4').attr('required', true);
        $('#respuesta4').attr('readonly', false);
    } else if ($('#respuesta3').val() == '7' || $('#respuesta3').val() == '8' || $('#respuesta3').val() == '9') {
        $('#pregunta4').val("¿Me puede indicar qué hizo falta para llegar al 10 y que nos recomiende? ");
        $('#pregunta4').show();
        $('#respuesta4').show();
        $('#respuesta4').attr('required', true);
        $('#respuesta4').attr('readonly', false);
    } else {
        $('#pregunta4').val("");
        $('#pregunta4').hide();
        $('#respuesta4').hide();
        $('#respuesta4').attr('required', false);
        $('#respuesta4').attr('readonly', true);
    }
});

$('#respuesta5').change(function () {
    if ($('#respuesta5').val() == 'Poco fácil' || $('#respuesta5').val() == 'Difícil' || $('#respuesta5').val() == 'Muy difícil') {
        $('#pregunta6').show();
        $('#respuesta6').show();
        $('#respuesta6').attr('required', true);
        $('#respuesta6').attr('readonly', false);

    } else {
        $('#pregunta6').hide();
        $('#respuesta6').hide();
        $('#respuesta6').attr('required', false);
        $('#respuesta6').attr('readonly', true);
    }
});

$('#respuesta7').change(function () {
    if ($('#respuesta7').val() == 'Hasta 1 año' || $('#respuesta7').val() == 'No quiero seguir') {
        $('#pregunta8').show();
        $('#respuesta8').show();
        $('#respuesta8').attr('required', true);
        $('#respuesta8').attr('readonly', false);

    } else {
        $('#pregunta8').hide();
        $('#respuesta8').hide();
        $('#respuesta8').attr('required', false);
        $('#respuesta8').attr('readonly', true);
    }
});

$('#respuesta9').change(function () {
    if ($('#respuesta9').val() == '1' || $('#respuesta9').val() == '2' || $('#respuesta9').val() == '3' || $('#respuesta9').val() == '4') {
        $('#pregunta10').show();
        $('#respuesta10').show();
        $('#respuesta10').attr('required', true);
        $('#respuesta10').attr('readonly', false);

    } else {
        $('#pregunta10').hide();
        $('#respuesta10').hide();
        $('#respuesta10').attr('required', false);
        $('#respuesta10').attr('readonly', true);
    }
});

$('#txtEstadoEncuesta').change(function () {
    if ($('#txtEstadoEncuesta').val() != 'No aplica') {
        $('#pnlEncuestaOscus').show();
        pnlEncuestaOscus(true, false);
    } else {
        $('#pnlEncuestaOscus').hide();
        pnlEncuestaOscus(false, true);
        $('#respuesta2').attr('required', false);
        $('#respuesta2').attr('readonly', true);
        $('#respuesta4').attr('required', false);
        $('#respuesta4').attr('readonly', true);
        $('#respuesta6').attr('required', false);
        $('#respuesta6').attr('readonly', true);
        $('#respuesta8').attr('required', false);
        $('#respuesta8').attr('readonly', true);
        $('#respuesta10').attr('required', false);
        $('#respuesta10').attr('readonly', true);
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
    }
});

function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    var identificacion = $('#txtIdentificacion').val();
    var longitud = identificacion.length;
    if (longitud >= 10 && identificacion != "") {
        if ($("#formulario input[name='txtTipoTransaccion']:radio").is(':checked') && $("#formulario input[name='txtTipoSocio']:radio").is(':checked')) {
            $.post("../ajax/campaniasInboundC.php?action=selectByIdentificacion", {identificacion: identificacion}, function (datos, estado) {
                datos = JSON.parse(datos);
                if (datos == '' || datos == null) {
                    $.ajax({
                        url: "../ajax/campaniasInboundC.php?action=insertSocio",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (datos) {
                            if (datos == 'Error: registro no se pudo almacenar') {
                                bootbox.alert("Contáctese con el administrador");
                            } else {
                                $.ajax({
                                    url: "../ajax/campaniasInboundC.php?action=save",
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
                        }
                    });
                } else {
                    $.ajax({
                        url: "../ajax/campaniasInboundC.php?action=updateSocio",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (datos) {
                            if (datos == 'Error: registro no se pudo actualizar') {
                                bootbox.alert("Contáctese con el administrador");
                            } else {
                                $.ajax({
                                    url: "../ajax/campaniasInboundC.php?action=save",
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
                        }
                    });
                }
            });
        } else {
            alert("Seleccione el tipo de transacción y/o tipo socio por favor!!!");
        }
    } else {
        bootbox.alert("Ingrese un número correcto de identificación!...")
    }
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
    $('#chkHoraFin').attr('disabled', state2);
    $('#horaInicio').attr('required', state1);
    $('#horaInicio').attr('readonly', state2);
    $('#txtCooperativa').attr('required', state1);
    $('#txtCooperativa').attr('readonly', state2);
    $('#txtTipoLlamada').attr('required', state1);
    $('#txtTipoLlamada').attr('readonly', state2);
    $('#txtEstadoLlamada').attr('required', state1);
    $('#txtEstadoLlamada').attr('readonly', state2);
    $('#txtIdentificacion').attr('required', state1);
    $('#txtIdentificacion').attr('readonly', state2);
    $('#txtNombreCliente').attr('required', state1);
    $('#txtNombreCliente').attr('readonly', state2);
    $('#txtCiudadCliente').attr('required', state1);
    $('#txtCiudadCliente').attr('readonly', state2);
    $('#txtCelular').attr('required', state1);
    $('#txtCelular').attr('readonly', state2);
    $('#txtCorreo').attr('required', state1);
    $('#txtCorreo').attr('readonly', state2);
    $('#txtFechaNacimiento').attr('required', state1);
    $('#txtFechaNacimiento').attr('readonly', state2);
    $('#txtTipoCliente').attr('required', state1);
    $('#txtTipoCliente').attr('readonly', state2);
    $('#txtMotivoLlamada').attr('required', state1);
    $('#txtMotivoLlamada').attr('readonly', state2);
    $('#txtSubmotivoLlamada').attr('required', state1);
    $('#txtSubmotivoLlamada').attr('readonly', state2);
    $('#txtObservaciones').attr('required', state1);
    $('#txtObservaciones').attr('readonly', state2);
    $('#txtEstadoCliente').attr('required', state1);
    $('#txtEstadoCliente').attr('readonly', state2);
    $('#txtTranferencia').attr('required', state1);
    $('#txtTranferencia').attr('readonly', state2);
    $('#txtObsTranferencia').attr('required', state1);
    $('#txtObsTranferencia').attr('readonly', state2);
}

function pnlEncuestaOscus(state1, state2) {
    $('#txtEstadoEncuesta').attr('required', state1);
    $('#txtEstadoEncuesta').attr('readonly', state2);
    $('#respuesta1').attr('required', state1);
    $('#respuesta1').attr('readonly', state2);
    $('#pregunta2').hide();
    $('#respuesta2').hide();
    $('#respuesta3').attr('required', state1);
    $('#respuesta3').attr('readonly', state2);
    $('#pregunta4').hide();
    $('#respuesta4').hide();
    $('#respuesta5').attr('required', state1);
    $('#respuesta5').attr('readonly', state2);
    $('#pregunta6').hide();
    $('#respuesta6').hide();
    $('#respuesta7').attr('required', state1);
    $('#respuesta7').attr('readonly', state2);
    $('#pregunta8').hide();
    $('#respuesta8').hide();
    $('#respuesta9').attr('required', state1);
    $('#respuesta9').attr('readonly', state2);
    $('#pregunta10').hide();
    $('#respuesta10').hide();
}