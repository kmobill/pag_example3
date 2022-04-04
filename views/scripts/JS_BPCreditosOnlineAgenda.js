var tabla;
var tablaTCA;
var id;
function init() { /* función inicial */
    $("#btnGuardar").prop("disabled", true);
    mostrar_formulario(false);
    mostrar_todos();
    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
    //divs y paneles a ocultar
    $('#infoAgencia').hide();
    $('#tipoCredito').hide();
    $('#pnlCallCenter').hide();
    $('#Creditos').hide();
    $('#otro').attr('disabled', true);
    $('#fonoAd').on("paste", function (e) {
        e.preventDefault();
    });
}

function limpiar_formulario() {
    $("#titulo").text("Campañas Banco Pichincha");
    $("#titulo1").text("");
    $("#titulo2").text("");
    $('#infoAgencia').hide();
    $('#txtMonto').prop('required', false);
    $('#fechaV').prop('required', false);
    $('#horaV').prop('required', false);
    $('#tipoC').prop('required', false);
    $('#regionC').prop('required', false);
    $('#ciudadC').prop('required', false);
    $('#vAgencia').prop('required', false);
    $('#callcenter').prop('required', false);
    $('#pnlCallCenter').hide();
    $('#txtMontoOnline').prop('required', false);
    $('#txtCuotaOnline').prop('required', false);
    $('#txtFechaOnline').prop('required', false);
    $('#txtMonto').val("");
    $('#fechaV').val("");
    $('#horaV').val("");
    $('#tipoC').val("");
    $('#regionC').val("");
    $('#ciudadC').val("");
    $('#vAgencia').val("");
    $('#callcenter').val("");
    $('#txtMontoOnline').val("");
    $('#txtCuotaOnline').val("");
    $('#txtFechaOnline').val("");
    $('#txtSituacionLaboralOnline').val("");
    $("#vAgencia").prop("checked", false);
    $("#callcenter").prop("checked", false);
    $("#oferta1").prop("checked", false);
    $("#oferta2").prop("checked", false);
    $("#oferta3").prop("checked", false);
    $("#oferta4").prop("checked", false);
    $("#oferta5").prop("checked", false);
}

function cancelar_formulario() { /* función para cancelar la operación */
    limpiar_formulario();
    mostrar_formulario(false);
    $("#titulo").text("Campañas Banco Pichincha");
    $("#titulo1").text("");
    $("#titulo2").text("");
}

function mostrar_formulario(flag) { /* muestra u oculta el formulario segun la validación del bool (flag) */
    limpiar_formulario();
    if (flag) {
        $("#listadoRegistros").hide();
        $("#formularioRegistros").show();
    } else {
        $("#listadoRegistros").show();
        $("#formularioRegistros").hide();
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
            url: '../ajax/campaignBPC.php?action=selectAllRec_1',
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
    $.post("../ajax/campaignBPC.php?action=selectById", {Id: Id}, function (datos, estado) {
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
        $("#titulo1").text(datos.TIENE_DEUDA_PROTEGIDA);
        $("#titulo2").text(datos.NOMBRE);
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
        $("#CODIGO_CAMPANIA").val(datos.CODIGO_CAMPANIA);
        $("#NOMBRE_CAMPANIA").val(datos.NOMBRE_CAMPANIA);
        $("#NUPS").val(datos.NUPS);
        $("#IDENTIFICACION").val(datos.IDENTIFICACION);
        var nombres = datos.NOMBRE;
        var txt = nombres.replace('?', 'Ñ');
        $("#NOMBRE").val(txt.replace('?', 'Ñ'));
        $("#PERFILRIESGOENDEUDAMIENTO").val(datos.PERFILRIESGOENDEUDAMIENTO);
        $("#SUBSEGMENTO").val(datos.SUBSEGMENTO);
        $("#EDAD").val(datos.EDAD);
        $("#CREDITO_CONSUMO_ESCENARIO_1").val(datos.CREDITO_CONSUMO_ESCENARIO_1);
        if (datos.CREDITO_CONSUMO_ESCENARIO_1 == '' || datos.CREDITO_CONSUMO_ESCENARIO_1 == '0') {
            $("#oferta1").attr('disabled', true);
        } else {
            $("#oferta1").attr('disabled', false);
        }
        $("#CUOTA_CONSUMO_ESCENARIO_1").val(datos.CUOTA_CONSUMO_ESCENARIO_1);
        $("#PLAZO_CONSUMO_ESCENARIO_1").val(datos.PLAZO_CONSUMO_ESCENARIO_1);
        $("#GARANTE_CONSUMO_ESCENARIO_1").val(datos.GARANTE_CONSUMO_ESCENARIO_1);
        $("#TARJETA_ESCENARIO_1").val(datos.TARJETA_ESCENARIO_1);
        if (datos.TARJETA_ESCENARIO_1 == '' || datos.TARJETA_ESCENARIO_1 == '0') {
            $("#oferta2").attr('disabled', true);
        } else {
            $("#oferta2").attr('disabled', false);
        }
        $("#PLASTICO_1_TARJETA_ESCENARIO_1").val(datos.PLASTICO_1_TARJETA_ESCENARIO_1);
        $("#MARCA_ESCENARIO_1").val(datos.MARCA_ESCENARIO_1);
        $("#PRODUCTO_ESCENARIO_1").val(datos.PRODUCTO_ESCENARIO_1);
        $("#CREDITO_CONSUMO_EXCLUSIVO").val(datos.CREDITO_CONSUMO_EXCLUSIVO);
        if (datos.CREDITO_CONSUMO_EXCLUSIVO == '' || datos.CREDITO_CONSUMO_EXCLUSIVO == '0') {
            $("#oferta3").attr('disabled', true);
        } else {
            $("#oferta3").attr('disabled', false);
        }
        $("#CUOTA_CONSUMO_EXCLUSIVO").val(datos.CUOTA_CONSUMO_EXCLUSIVO);
        $("#PLAZO_CONSUMO_EXCLUSIVO").val(datos.PLAZO_CONSUMO_EXCLUSIVO);
        $("#GARANTE_CONSUMO_EXCLUSIVO").val(datos.GARANTE_CONSUMO_EXCLUSIVO);
        $("#CREDITO_CONSUMO_ROL").val(datos.CREDITO_CONSUMO_ROL);
        if (datos.CREDITO_CONSUMO_ROL == '' || datos.CREDITO_CONSUMO_ROL == '0') {
            $("#oferta5").attr('disabled', true);
        } else {
            $("#oferta5").attr('disabled', false);
        }
        $("#CUOTA_CONSUMO_ROL").val(datos.CUOTA_CONSUMO_ROL);
        $("#GARANTE_CONSUMO_ROL").val(datos.GARANTE_CONSUMO_ROL);
        $("#TARJETA_EXCLUSIVA").val(datos.TARJETA_EXCLUSIVA);
        if (datos.TARJETA_EXCLUSIVA == '' || datos.TARJETA_EXCLUSIVA == '0') {
            $("#oferta4").attr('disabled', true);
        } else {
            $("#oferta4").attr('disabled', false);
        }
        $("#PLASTICO_1_TARJETA_EXCLUSIVA").val(datos.PLASTICO_1_TARJETA_EXCLUSIVA);
        $("#MARCA_TARJETA_EXCLUSIVA").val(datos.MARCA_TARJETA_EXCLUSIVA);
        $("#PRODUCTO_TARJETA_EXCLUSIVA").val(datos.PRODUCTO_TARJETA_EXCLUSIVA);
        $("#MAXIMO_CONSUMO").val(datos.MAXIMO_CONSUMO);
        $("#MAXIMA_TARJETA").val(datos.MAXIMA_TARJETA);
        $("#BANCA").val(datos.BANCA);
        $("#SEGMENTO").val(datos.SEGMENTO);
        $("#SEGMENTO_N_2").val(datos.SEGMENTO_N_2);
        $("#SUBSEGMENTO1").val(datos.SUBSEGMENTO1);
        $("#REGION").val(datos.REGION);
        $("#ZONA").val(datos.ZONA);
        $("#AGENCIA").val(datos.AGENCIA);
        $("#FECHA_NACIMIENTO").val(datos.FECHA_NACIMIENTO);
        $("#SEXO").val(datos.SEXO);
        $("#ESTADO_CIVIL").val(datos.ESTADO_CIVIL);
        $("#PAIS_DOM_CAL_DAT").val(datos.PAIS_DOM_CAL_DAT);
        $("#PROV_DOM_CAL_DAT").val(datos.PROV_DOM_CAL_DAT);
        $("#CIUDAD_DOM_CAL_DAT").val(datos.CIUDAD_DOM_CAL_DAT);
        $("#DIR_DOM_CAL_DAT").val(datos.DIR_DOM_CAL_DAT);
        $("#PAIS_TRAB_1_CAL_DAT").val(datos.PAIS_TRAB_1_CAL_DAT);
        $("#PROV_TRAB_1_CAL_DAT").val(datos.PROV_TRAB_1_CAL_DAT);
        $("#CIUDAD_TRAB_1_CAL_DAT").val(datos.CIUDAD_TRAB_1_CAL_DAT);
        $("#DIR_TRAB_1_CAL_DAT").val(datos.DIR_TRAB_1_CAL_DAT);
        $("#IDENTIFICACION_PARENTEZCO").val(datos.IDENTIFICACION_PARENTEZCO);
        $("#CALIFICACION_BURO").val(datos.CALIFICACION_BURO);
        $("#NOMBRES").val(datos.NOMBRES);
        $("#DES_SEXO").val(datos.DES_SEXO);
        $("#FECH_NAC").val(datos.FECH_NAC);
        $("#NUMERO_CARGAS_FAMILIARES").val(datos.NUMERO_CARGAS_FAMILIARES);
        $("#TIENE_DEUDA_PROTEGIDA").val(datos.TIENE_DEUDA_PROTEGIDA);
        $("#TIENE_TDC").val(datos.TIENE_TDC);
        $("#COD_MARCA").val(datos.COD_MARCA);
        $("#PLAN_RECOMPENSAS").val(datos.PLAN_RECOMPENSAS);
        $("#FECHA_INGRESO_SOCIO").val(datos.FECHA_INGRESO_SOCIO);
        $("#NUMERO_CUENTA1").val(datos.NUMERO_CUENTA1);
        $("#PRODUCTO_CTA1").val(datos.PRODUCTO_CTA1);
        $("#DESCRIPCION1").val(datos.DESCRIPCION1);
        $("#CANAL").val(datos.CANAL);
        $("#DIFERENCIA_CUPOS").val(datos.DIFERENCIA_CUPOS);
        $("#CATEGORIZACION").val(datos.CATEGORIZACION);
        $("#TIPO_BASE").val(datos.TIPO_BASE);
        $("#REGION_ANCLAJE").val(datos.REGION_ANCLAJE);
        $("#PLAZO_CONSUMO_ROL").val(datos.PLAZO_CONSUMO_ROL);
        $("#CORREO1").val(datos.CORREO1);
        $("#CORREO2").val(datos.CORREO2);
        $("#CORREO3").val(datos.CORREO3);
        $("#CORREO4").val(datos.CORREO4);
        $("#CORREO5").val(datos.CORREO5);
        $("#CORREO6").val(datos.CORREO6);
        $("#DES_NACIONALID").val(datos.DES_NACIONALID);
        $("#CANT_NAC").val(datos.CANT_NAC);
        $("#ACTIVIDAD_ECONOMICA").val(datos.ACTIVIDAD_ECONOMICA);
        $("#DES_CANAL").val(datos.DES_CANAL);
        $("#CUENTA").val(datos.CUENTA);
        $("#NUMERO_TARJETA").val(datos.NUMERO_TARJETA);
        $("#PRODUCTO").val(datos.PRODUCTO);
        $("#TIPOTC").val(datos.TIPOTC);
        $("#FAMILIA").val(datos.FAMILIA);
        $("#CUPO").val(datos.CUPO);
        $("#CUPO_DISPONIBLE").val(datos.CUPO_DISPONIBLE);
        $("#HIJOS_MAS_18").val(datos.HIJOS_MAS_18);
        $("#HIJOS_MENOS_18").val(datos.HIJOS_MENOS_18);
        $("#HERMANOS_MENOS_18").val(datos.HERMANOS_MENOS_18);
        $("#HERMANOS_MAS_18").val(datos.HERMANOS_MAS_18);
        $("#MAMA").val(datos.MAMA);
        $("#PAPA").val(datos.PAPA);
        $("#CONYUG").val(datos.CONYUG);
        $("#MARCA_CUPO").val(datos.MARCA_CUPO);
        $("#NRO_TDC_COMPETENCIA").val(datos.NRO_TDC_COMPETENCIA);
        $("#CUPO_MAX_COMP").val(datos.CUPO_MAX_COMP);
        $("#CONSUMO_PROMEDIO").val(datos.CONSUMO_PROMEDIO);
        $("#PRIORIDAD_GESTION").val(datos.PRIORIDAD_GESTION);
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
    if (text == "CU5" || text == "CU4" || text == "CU6" || text == "CU7" || text == "NU1" || text == "NU2") {
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
    $("#btnGuardar").prop("disabled", false);
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
                if (r == 2) {
                    $('#verOfertas').show();
                    $('#tipoCredito').show();
                    $('#Creditos').show();
                    if ($("#of").val() == "") {
                        bootbox.alert("Seleccione una oferta");
                        $('#oferta1').prop('required', true);
                        $('#oferta2').prop('required', true);
                        $('#oferta3').prop('required', true);
                        $('#oferta4').prop('required', true);
                        $('#oferta5').prop('required', true);
                    }
                    $('#vAgencia').prop('required', true);
                    $('#callcenter').prop('required', true);
                }
            }
        });
    }
});

$('#cbox1').change(function () {
    if ($(this).is(":checked")) {
        $('#verOfertas').show();
        $('#espOfertas').show();
    } else {
        $('#verOfertas').hide();
        $('#espOfertas').hide();
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

$('#oferta1').change(function () {
    $("#of").val("OFERTA 1");
    $("#ofertaTDC").val("OFERTA 1");
    $('#oferta1').prop('required', false);
    $('#oferta2').prop('required', false);
    $('#oferta3').prop('required', false);
    $('#oferta4').prop('required', false);
    $('#oferta5').prop('required', false);
});

$('#oferta2').change(function () {
    $("#of").val("OFERTA 1");
    $("#ofertaTDC").val("OFERTA 1");
    $('#oferta1').prop('required', false);
    $('#oferta2').prop('required', false);
    $('#oferta3').prop('required', false);
    $('#oferta4').prop('required', false);
    $('#oferta5').prop('required', false);
});

$('#oferta3').change(function () {
    $("#of").val("OFERTA 2");
    $("#ofertaTDC").val("OFERTA 2");
    $('#oferta1').prop('required', false);
    $('#oferta2').prop('required', false);
    $('#oferta3').prop('required', false);
    $('#oferta4').prop('required', false);
    $('#oferta5').prop('required', false);
});

$('#oferta4').change(function () {
    $("#of").val("OFERTA 4");
    $("#ofertaTDC").val("OFERTA 4");
    $('#oferta1').prop('required', false);
    $('#oferta2').prop('required', false);
    $('#oferta3').prop('required', false);
    $('#oferta4').prop('required', false);
    $('#oferta5').prop('required', false);
});

$('#oferta5').change(function () {
    $("#of").val("OFERTA 3");
    $("#ofertaTDC").val("OFERTA 3");
    $('#oferta1').prop('required', false);
    $('#oferta2').prop('required', false);
    $('#oferta3').prop('required', false);
    $('#oferta4').prop('required', false);
    $('#oferta5').prop('required', false);
});

$('#vAgencia').change(function () {
    if ($(this).is(":checked")) {
        $("#tip").val("AGENCIA");
        $('#infoAgencia').show();
        $('#txtMonto').prop('required', true);
        $('#fechaV').prop('required', true);
        $('#horaV').prop('required', true);
        $('#tipoC').prop('required', true);
        $('#regionC').prop('required', true);
        $('#ciudadC').prop('required', true);
        $('#telf1').hide();
        $('#horario1').hide();
        $('#dir1').hide();
        $('#vAgencia').prop('required', false);
        $('#callcenter').prop('required', false);
        $('#pnlCallCenter').hide();
        $('#txtMontoOnline').prop('required', false);
        $('#txtCuotaOnline').prop('required', false);
        $('#txtFechaOnline').prop('required', false);
        $('#txtMontoOnline').val("");
        $('#txtCuotaOnline').val("");
        $('#txtFechaOnline').val("");
        $('#txtSituacionLaboralOnline').val("");
    }
});

$('#callcenter').change(function () {
    if ($(this).is(":checked")) {
        $("#tip").val("FVT");
        $('#infoAgencia').hide();
        $('#txtMonto').prop('required', false);
        $('#fechaV').prop('required', false);
        $('#horaV').prop('required', false);
        $('#tipoC').prop('required', false);
        $('#regionC').prop('required', false);
        $('#ciudadC').prop('required', false);
        $('#vAgencia').prop('required', false);
        $('#callcenter').prop('required', false);
        $('#pnlCallCenter').show();
        $('#txtMontoOnline').prop('required', true);
        $('#txtCuotaOnline').prop('required', true);
        $('#txtFechaOnline').prop('required', true);
        $('#txtMonto').val("");
        $('#fechaV').val("");
        $('#horaV').val("");
        $('#tipoC').val("");
        $('#regionC').val("");
        $('#ciudadC').val("");
        $('#vAgencia').val("");
    }
});

$("#regionC").change(function () {
    var regionC = $("#regionC option:selected").text();
    if (regionC != "") {
        $.ajax({
            type: "GET",
            url: '../ajax/campaignBPC.php?action=cuidadAgencia',
            data: {regionC: regionC},
            success: function (r) {
                $('#ciudadC').html(r);
            }
        });
    }
});

$("#tipoOfC").change(function () {
    var regionC = $("#regionC option:selected").text();
    var ciudadC = $("#ciudadC option:selected").text();
    var tipoOfC = $("#tipoOfC option:selected").text();
    if (regionC != "" && ciudadC != "" && tipoOfC != "") {
        $.ajax({
            type: "GET",
            url: '../ajax/campaignBPC.php?action=agencia',
            data: {ciudadC: ciudadC, regionC: regionC, tipoOfC: tipoOfC},
            success: function (r) {
                $('#agenciaC').html(r);
            }
        });
    }
});

$("#agenciaC").change(function () {
    var regionC = $("#regionC option:selected").text();
    var ciudadC = $("#ciudadC option:selected").text();
    var tipoOfC = $("#tipoOfC option:selected").text();
    var agenciaC = $("#agenciaC option:selected").text();
    if (regionC != "" && ciudadC != "" && tipoOfC != "") {
        $.ajax({
            type: "GET",
            url: '../ajax/campaignBPC.php?action=dirAgencia',
            data: {agenciaC: agenciaC, ciudadC: ciudadC, regionC: regionC, tipoOfC: tipoOfC},
            success: function (r) {
                $('#dir2').hide();
                $('#dir1').show();
                $('#dir1').html(r);
            }
        });
        $.ajax({
            type: "GET",
            url: '../ajax/campaignBPC.php?action=horAgencia',
            data: {agenciaC: agenciaC, ciudadC: ciudadC, regionC: regionC, tipoOfC: tipoOfC},
            success: function (r) {
                $('#horario2').hide();
                $('#horario1').show();
                $('#horario1').html(r);
            }
        });
        $.ajax({
            type: "GET",
            url: '../ajax/campaignBPC.php?action=telAgencia',
            data: {agenciaC: agenciaC, ciudadC: ciudadC, regionC: regionC, tipoOfC: tipoOfC},
            success: function (r) {
                $('#telf2').hide();
                $('#telf1').show();
                $('#telf1').html(r);
            }
        });
    }
});

/**************************************FUNCIONES A UTILIZAR******************************************************/
function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var InteractionIdOld = $("#interactionIdOld").val();
    var InteractionId = $("#interactionId").val();
    var estatus1 = $("#level1").val();
    var estatus2 = $("#level2").val();
    var idC = $("#IDC").val();
    var campania = $("#CAMPANIA").val();
    var code = $("#code").val();

    if (InteractionIdOld == '' && InteractionId == "" && estatus1 != 'NU2 INUBICABLES' && estatus2 != 'Cliente sin telefono') { //Registro gestionado con anterioridad sin almacenado de teléfono
        bootbox.alert("Almacene un número de teléfono para continuar!!");
    } else if (InteractionIdOld == '' && InteractionId == "" && estatus1 == 'NU2 INUBICABLES' && estatus2 == 'Cliente sin telefono') { //Registro que aún no tiene gestión
        var formData = new FormData($("#formulario")[0]);
        $.ajax({
            url: "../ajax/campaignBPC.php?action=save",
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
        if (code == 2) {
            var visitaAgencia = $("#tip").val();
            if (visitaAgencia == "AGENCIA") {
                $.ajax({
                    url: "../ajax/campaignBPC.php?action=envioMailOnLine",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (datos) {
                        //bootbox.alert(datos);
                    }
                });
            }
        }
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
                        url: "../ajax/campaignBPC.php?action=save",
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
                    if (code == 2) {
                        var visitaAgencia = $("#tip").val();
                        if (visitaAgencia == "AGENCIA") {
                            $.ajax({
                                url: "../ajax/campaignBPC.php?action=envioMailOnLine",
                                type: "POST",
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function (datos) {
                                    //bootbox.alert(datos);
                                }
                            });
                        }
                    }
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
                        url: "../ajax/campaignBPC.php?action=save",
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
                    if (code == 2) {
                        var visitaAgencia = $("#tip").val();
                        if (visitaAgencia == "AGENCIA") {
                            $.ajax({
                                url: "../ajax/campaignBPC.php?action=envioMailOnLine",
                                type: "POST",
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function (datos) {
                                    //bootbox.alert(datos);
                                }
                            });
                        }
                    }
                }
            }
        });
    }
}

init(); /* ejecuta la función inicial */