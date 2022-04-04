var tabla;
function init() { /* función inicial */
    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
    mostrar_todos();
    mostrar_formulario(false);
}

function limpiar_formulario() {
    $("#IDC").val("");
    $('#NOMBRE_EMPLEADO').text("");
    $('#FECHA_INGRESO').text("");
    $('#CEDULA').text("");
    $('#DIAS').text("");
    $('#SUELDO').text("");
    $('#SUELDO_GANADO').text("");
    $('#HORAS_EXTRAS').text("");
    $('#SUBTOTAL_INGRESOS').text("");
    $('#FONDO_RESERVA').text("");
    $('#OTROS_INGRESOS').text("");
    $('#TOTAL_INGRESOS').text("");
    $('#APORTE_PERSONAL').text("");
    $('#PRESTAMOS_Q_IESS').text("");
    $('#PRESTAMOS_H_IESS').text("");
    $('#PRESTAMO_OFICINA').text("");
    $('#ATRASOS').text("");
    $('#FALTAS').text("");
    $('#TOTAL_EGRESOS').text("");
    $('#TOTAL_A_PAGAR').text("");
    $('#DECIMO_TERCER').text("");
    $('#DECIMO_CUARTO').text("");
    $('#APORTE_PATRONAL').text("");
    $('#IMPUESTO_RENTA').text("");
    $('#COMISION').text("");
    $('#TIPO_EMPLEADO').text("");
    $('#MES').text("");
    $("#titulo").show();
    $('#BONOS').text("");
    $('#RECARGO_NOCTURNO').text("");
    $('#ANTICIPO').text("");
    $('#DECIMO_TERCER').text("");
    $('#LLAMADO_DE_ATENCION').text("");
    $('#DECIMO_CUARTO').text("");
    $('#VIATICOS').text("");
    $('#CREDENCIAL_TARJETA').text("");
    $('#PENSION_ALIMENTICIA').text("");
    $('#VACACIONES').text("");
    $('#SUBSIDIOS_OCACIONALES').text("");
    $('#FORMA_PAGO').text("");
}

function cancelar_formulario() { /* función para cancelar la operación */
    $("#titulo").show();
    limpiar_formulario();
    mostrar_formulario(false);
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
            url: '../ajax/importRolesC.php?action=selectAll',
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
    $("#titulo").hide();
    $.post("../ajax/importRolesC.php?action=selectById", {Id: Id}, function (datos, estado) {
        datos = JSON.parse(datos);
        mostrar_formulario(true);
        $.ajax({
            type: "GET",
            url: '../ajax/funcionesGeneralesC.php?action=horaInicio',
            success: function (r) {
                $('#horaInicio').val(r);
            }
        });
        $("#IDC").val(datos.Id);
        var nombres = datos.NOMBRE_EMPLEADO;
        var txt = nombres.replace('?', 'Ñ');
        $("#NOMBRE_EMPLEADO").text(txt.replace('?', 'Ñ'));
        $('#FECHA_INGRESO').text(datos.FECHA_INGRESO);
        $('#CEDULA').text(datos.CEDULA);
        $('#DIAS').text(datos.DIAS);
        $('#SUELDO').text(datos.SUELDO);
        $('#SUELDO_GANADO').text(datos.SUELDO);
        $('#MES').text(datos.MES + ' ' + datos.ANIO);
        $('#TIPO_EMPLEADO').text(datos.TIPO_EMPLEADO);
        $('#CUENTA').text(datos.MES + ' ' + datos.ANIO);
        if(datos.HORAS_EXTRAS == ''){
            $('#HORAS_EXTRAS').text("-");
        } else {
            $('#HORAS_EXTRAS').text(datos.HORAS_EXTRAS);
        }
        if(datos.SUBTOTAL_INGRESOS == ''){
            $('#SUBTOTAL_INGRESOS').text("-");
        } else {
            $('#SUBTOTAL_INGRESOS').text(datos.SUBTOTAL_INGRESOS);
        }
        if(datos.FONDO_RESERVA == ''){
            $('#FONDO_RESERVA').text("-");
        } else {
            $('#FONDO_RESERVA').text(datos.FONDOS_RESERVA);
        }
        if(datos.OTROS_INGRESOS == ''){
            $('#OTROS_INGRESOS').text("-");
        } else {
            $('#OTROS_INGRESOS').text(datos.OTROS_INGRESOS);
        }
        if(datos.TOTAL_INGRESOS == ''){
            $('#TOTAL_INGRESOS').text("-");
        } else {
            $('#TOTAL_INGRESOS').text(datos.TOTAL_INGRESOS);
        }
        if(datos.APORTE_PERSONAL == ''){
            $('#APORTE_PERSONAL').text("-");
        } else {
            $('#APORTE_PERSONAL').text(datos.APORTE_PERSONAL);
        }
        if(datos.PRESTAMOS_Q_IESS == ''){
            $('#PRESTAMOS_Q_IESS').text("-");
        } else {
            $('#PRESTAMOS_Q_IESS').text(datos.PRESTAMOS_Q_IESS);
        }
        if(datos.PRESTAMOS_H_IESS == ''){
            $('#PRESTAMOS_H_IESS').text("-");
        } else {
            $('#PRESTAMOS_H_IESS').text(datos.PRESTAMOS_H_IESS);
        }
        if(datos.PRESTAMO_OFICINA == ''){
            $('#PRESTAMO_OFICINA').text("-");
        } else {
            $('#PRESTAMO_OFICINA').text(datos.PRESTAMO_OFICINA);
        }
        if(datos.ATRASOS == ''){
            $('#ATRASOS').text("-");
        } else {
            $('#ATRASOS').text(datos.ATRASOS);
        }
        if(datos.FALTAS == ''){
            $('#FALTAS').text("-");
        } else {
            $('#FALTAS').text(datos.FALTAS);
        }
        if(datos.TOTAL_EGRESOS == ''){
            $('#TOTAL_EGRESOS').text("-");
        } else {
            $('#TOTAL_EGRESOS').text(datos.TOTAL_EGRESOS);
        }
        if(datos.TOTAL_A_PAGAR == ''){
            $('#TOTAL_A_PAGAR').text("-");
        } else {
            $('#TOTAL_A_PAGAR').text(datos.TOTAL_A_PAGAR);
        }
        if(datos.DECIMO_TERCER == ''){
            $('#DECIMO_TERCER').text("-");
        } else {
            $('#DECIMO_TERCER').text(datos.DECIMO_TERCER_SUELDO);
        }
        if(datos.DECIMO_CUARTO == ''){
            $('#DECIMO_CUARTO').text("-");
        } else {
            $('#DECIMO_CUARTO').text(datos.DECIMO_CUARTO_SUELDO);
        }
        if(datos.APORTE_PATRONAL == ''){
            $('#APORTE_PATRONAL').text("-");
        } else {
            $('#APORTE_PATRONAL').text(datos.APORTE_PATRONAL);
        }
        if(datos.IMPUESTO_RENTA == ''){
            $('#IMPUESTO_RENTA').text("-");
        } else {
            $('#IMPUESTO_RENTA').text(datos.IMPUESTO_RENTA);
        }
        if(datos.COMISION == ''){
            $('#COMISION').text("-");
        } else {
            $('#COMISION').text(datos.COMISION);
        }
        if(datos.OTROS_EGRESOS == ''){
            $('#OTROS_EGRESOS').text("-");
        } else {
            $('#OTROS_EGRESOS').text(datos.MES + ' ' + datos.OTROS_EGRESOS);
        }
        if(datos.BONOS == ''){
            $('#BONOS').text("-");
        } else {
            $('#BONOS').text(datos.BONOS);
        }
        if(datos.RECARGO_NOCTURNO == ''){
            $('#RECARGO_NOCTURNO').text("-");
        } else {
            $('#RECARGO_NOCTURNO').text(datos.RECARGO_NOCTURNO);
        }
        if(datos.ANTICIPO == ''){
            $('#ANTICIPO').text("-");
        } else {
            $('#ANTICIPO').text(datos.ANTICIPO);
        }
        if(datos.LLAMADO_DE_ATENCION == ''){
            $('#LLAMADO_DE_ATENCION').text("-");
        } else {
            $('#LLAMADO_DE_ATENCION').text(datos.LLAMADO_DE_ATENCION);
        }
        if(datos.VIATICOS == ''){
            $('#VIATICOS').text("-");
        } else {
            $('#VIATICOS').text(datos.VIATICOS);
        }
        if(datos.CREDENCIAL_TARJETA == ''){
            $('#CREDENCIAL_TARJETA').text("-");
        } else {
            $('#CREDENCIAL_TARJETA').text(datos.CREDENCIAL_TARJETA);
        }
        if(datos.PENSION_ALIMENTICIA == ''){
            $('#PENSION_ALIMENTICIA').text("-");
        } else {
            $('#PENSION_ALIMENTICIA').text(datos.PENSION_ALIMENTICIA);
        }
        if(datos.VACACIONES == ''){
            $('#VACACIONES').text("-");
        } else {
            $('#VACACIONES').text(datos.VACACIONES);
        }
        if(datos.SUBSIDIOS_OCACIONALES == ''){
            $('#SUBSIDIOS_OCACIONALES').text("-");
        } else {
            $('#SUBSIDIOS_OCACIONALES').text(datos.SUBSIDIOS_OCACIONALES);
        }
        if(datos.FORMA_PAGO == ''){
            $('#FORMA_PAGO').text("-");
        } else {
            $('#FORMA_PAGO').text(datos.FORMA_PAGO);
        }
        if(datos.ACEPTA_ROL == 'SI'){
            $("#acepta").attr("disabled", true);
            $("#btnGuardar").attr("disabled", true);
        }
        else{
            $("#acepta").attr("disabled", false);
            $("#btnGuardar").attr("disabled", false);
        }
    });
}

function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/importRolesC.php?action=save",
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
init(); /* ejecuta la función inicial */