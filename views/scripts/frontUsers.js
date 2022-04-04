var tabla, tabla1;
function init() { /* función inicial */
    mostrar_formulario(false);
    mostrar_todos_activos();
    mostrar_todos_inactivos();

    $("#formulario").on("submit", function (e) {
        guardar_datos(e);
    });
}

function limpiar_formulario() { /* limpia los datos de los formularios */
    $("#btnMostrar").hide();
    $("#btnGenerar").hide();
    $("#Id").val("");
    $("#User").val("");
    $("#validar").val("");
    $("#mensaje").val("");
    $("#identificacion").val("");
    $("#Name1").val("");
    $("#Name2").val("");
    $("#Surname1").val("");
    $("#Surname2").val("");
    $("#fecha").val("");
    $("#adress").val("");
    $("#celular").val("");
    $("#telefono").val("");
    $("#correo").val("");
    $("#Password").val("");
    $("#Password2").val("");
    $("#UserGroup").val("");
    $("#country").val("");
    $("#city").val("");
    $("#gender").val("");
    $("#pnlUser").hide();
}

function mostrar_formulario(flag) { /* muestra u oculta el formulario segun la validación del bool (flag) */
    limpiar_formulario();
    if (flag) {
        $("#listadoRegistros").hide();
        $("#listadoRegistros1").hide();
        $("#pnlUsuarios").hide();
        $("#formularioRegistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnAgregar").hide();
        $("#btnActivar").hide();
        $("#btnInactivar").hide();
    } else {
        $("#listadoRegistros").show();
        $("#listadoRegistros1").show();
        $("#pnlUsuarios").show();
        $("#formularioRegistros").hide();
        $("#btnAgregar").show();
        $("#btnActivar").show();
        $("#btnInactivar").show();
    }
}

function cancelar_formulario() { /* función para cancelar la operación */
    limpiar_formulario();
    mostrar_formulario(false);
}

function mostrar_todos_activos() {
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
            url: '../ajax/userC.php?action=selectAll',
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
        "order": [[3, "asc"]]
    }).DataTable();
}

function mostrar_todos_inactivos() {
    tabla1 = $('#tblListado1').dataTable({
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
            url: '../ajax/userC.php?action=selectAll_1',
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
        "order": [[3, "asc"]]
    }).DataTable();
}

function mostrar_uno(IdUser) {
    $.post("../ajax/userC.php?action=selectById", {IdUser: IdUser}, function (datos, estado) {
        datos = JSON.parse(datos);
        mostrar_formulario(true);
        var usu = datos.Id;
        if (usu != "") {
            $("#Id").attr('readonly', true);
        } else {
            $("#Id").attr('readonly', false);
        }
        $.ajax({
            type: "POST",
            url: '../ajax/userC.php?action=desencriptarUser',
            data: {usu: usu},
            success: function (r) {
                $("#Id").val(r);
            }
        });
        $("#Id").val(datos.Id);
        $("#validar").val(datos.IdUser);
        $("#IdUser").val(datos.IdUser);
        $("#identificacion").val(datos.Identification);
        $("#Name1").val(datos.Name1);
        $("#Name2").val(datos.Name2);
        $("#Surname1").val(datos.Surname1);
        $("#Surname2").val(datos.Surname2);
        $("#fecha").val(datos.dateBirth);
        $("#adress").val(datos.Address);
        $("#celular").val(datos.ContacAddress);
        $("#telefono").val(datos.ContacAddress1);
        $("#correo").val(datos.Email);
        var pass = datos.Password;
        $.ajax({
            type: "POST",
            url: '../ajax/userC.php?action=desencriptarPass',
            data: {pass: pass},
            success: function (r) {
                $("#Password").val(r);
            }
        });
        $("#UserGroup").val(datos.UserGroup);
        $("#UserGroup").selectpicker('refresh');
        $("#country").val(datos.Country);
        $("#city").val(datos.City);
        $("#gender").val(datos.Gender);
        $("#btnMostrar").show();
        $("#btnGenerar").hide();
    });
}

function desactivar(IdUser) { /* desactivar */
    bootbox.confirm("¿Seguro quieres desactivar este usuario?", function (result) {
        if (result) {
            $.post("../ajax/userC.php?action=desactivate", {IdUser: IdUser}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
                mostrar_formulario(false);
            });
        }
    });
}

function activar(IdUser) { /* activar */
    bootbox.confirm("¿Seguro quieres activar este usuario?", function (result) {
        mostrar_formulario(false);
        if (result) {
            $.post("../ajax/userC.php?action=activate", {IdUser: IdUser}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
                mostrar_formulario(false);
            });
        }
    });
}

$("#btnAgregar").click(function () {
    limpiar_formulario();
    $("#Id").attr('readonly', false);
    $("#btnMostrar").hide();
    $("#btnGenerar").show();
    $("#btnGuardar").hide();
});

$('#btnActivar').click(function () {
    var Id = [];
    $(':checkbox:checked').each(function (i) {
        Id[i] = $(this).val();
    });
    if (Id.length === 0) //tell you if the array is empty
    {
        bootbox.alert({
            message: "Usted no ha realizado ninguna selección!",
            size: 'medium'
        });
    } else {
        if (confirm("Desea activar los usuarios seleccionados?"))
        {
            $.ajax({
                url: '../ajax/userC.php?action=activar',
                method: 'POST',
                data: {Ids: Id},
                success: function (datos) {
                    bootbox.alert(datos);
                    tabla.ajax.reload();
                    tabla1.ajax.reload();
                }
            });

        }
    }
});

$('#btnInactivar').click(function () {
    var Id = [];
    $(':checkbox:checked').each(function (i) {
        Id[i] = $(this).val();
    });
    if (Id.length === 0) //tell you if the array is empty
    {
        bootbox.alert({
            message: "Usted no ha realizado ninguna selección!",
            size: 'medium'
        });
    } else {
        if (confirm("Desea inactivar los usuarios seleccionados?"))
        {
            $.ajax({
                url: '../ajax/userC.php?action=inactivar',
                method: 'POST',
                data: {Ids: Id},
                success: function (datos) {
                    bootbox.alert(datos);
                    tabla.ajax.reload();
                    tabla1.ajax.reload();
                }
            });
        }
    }
});


$('#btnGenerar').click(function () {
    var name = $("#Name1").val();
    var surname = $("#Surname1").val();
    if (name == '' || surname == '') {
        bootbox.alert("Complete todos los campos solicitados");
    } else {
        $("#pnlUser").show();
        $("#btnGuardar").show();
        $.ajax({
            type: "POST",
            url: '../ajax/userC.php?action=generateUser',
            data: {name: name, surname: surname},
            success: function (r) {
                var IdUser = $("#Id").val();

                $.ajax({
                    type: "POST",
                    url: '../ajax/userC.php?action=validarUsuario',
                    data: {IdUser: IdUser},
                    success: function (data) {
                        if (data == 'Generar otro usuario') {
                            bootbox.alert("El usuario ya existe, por favor genere otro usuario!...");
                        } else {
                            $("#mensaje").val(data);
                            $("#Id").val(r);
                        }
                    }
                });
            }
        });
        $.ajax({
            type: "POST",
            url: '../ajax/userC.php?action=generatePass',
            success: function (r) {
                $("#Password").val(r);
            }
        });
    }
});

$('#btnMostrar').click(function () {
    bootbox.prompt({
        title: "Coloque la contraseña para visualizar!...",
        inputType: 'password',
        callback: function (result) {
            if (result == 'KMB.2k2021.') {
                $("#pnlUser").show();
            } else {
                $("#pnlUser").hide();
            }
        }
    });
});

function guardar_datos(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    if ($("#validar").val() == "") {
        if ($("#Id").val() == '' || $("#Password").val() == '') {
            bootbox.alert("Completar todos los datos para continuar!...");
        } else {
            var respuesta = $("#mensaje").val();
            if (respuesta == "Generar otro usuario") {
                bootbox.alert("El usuario ya existe, por favor genere otro usuario!...");
            } else {
                var formData = new FormData($("#formulario")[0]);
                $.ajax({
                    url: "../ajax/userC.php?action=save",
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
        }
    } else {
        var formData = new FormData($("#formulario")[0]);
        $.ajax({
            url: "../ajax/userC.php?action=save",
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
}

init(); /* ejecuta la función inicial */