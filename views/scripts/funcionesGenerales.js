
function init() { /* función inicial */
    $('#estatusTel').attr("disabled", "true");
    $.ajax({
        url: '../ajax/funcionesGeneralesC.php?action=estadoTelefonos',
        method: 'POST',
        success: function (r) {
            $('#estatusTel').html(r);
        }
    });
    $.ajax({
        url: '../ajax/funcionesGeneralesC.php?action=otroAsesor',
        method: 'POST',
        success: function (r) {
            $('#otro').html(r);
        }
    });
}

function copyToClipboard(elemento) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(elemento).text()).select();
    document.execCommand("copy");
    $temp.remove();
}

$('#fonos').change(function () {
    var telefono = $("#fonos").val();
    $.ajax({
        url: '../ajax/funcionesGeneralesC.php?action=horaInicio',
        method: 'POST',
        success: function (r) {
            $('#horaInicioLlamada').val(r);
        }
    });
    var idC = $("#IDC").val();
    $.ajax({
        url: '../ajax/funcionesGeneralesC.php?action=interactionIdOld',
        method: 'GET',
        data: {idC: idC},
        success: function (r) {
            $('#interactionId').val(r);
        }
    });
    var idC = $("#IDC").val();
    $.ajax({
        url: '../ajax/funcionesGeneralesC.php?action=ultimoEstadoTelefono',
        method: 'GET',
        data: {idC: idC, telefono: telefono},
        success: function (r) {
            $('#ultimoEstatusFono').val(r);
            $('#estatusTel').attr("disabled", false);
        }
    });
});

$('#estatusTel').change(function () {
    $.ajax({
        url: '../ajax/funcionesGeneralesC.php?action=interactionId',
        method: 'POST',
        success: function (r) {
            $('#interactionId').val(r);
            var phones = $("#fonos option:selected").text();
            var estatusTel = $("#estatusTel option:selected").text();
            var horaInicioLlamada = $('#horaInicioLlamada').val();
            var interactionId = r;

            if (phones != "" && estatusTel != "") {
                var IDC = $("#IDC").val();
                $.ajax({
                    url: '../ajax/funcionesGeneralesC.php?action=updatePhones',
                    method: 'POST',
                    data: {
                        IDC: IDC,
                        fonos: phones,
                        estatusTel: estatusTel,
                        horaInicioLlamada: horaInicioLlamada,
                        interactionId: interactionId
                    },
                    success: function (r) {
                        bootbox.alert(r);
                        $.ajax({
                            type: "GET",
                            url: '../ajax/funcionesGeneralesC.php?action=telefonos',
                            data: {idC: IDC},
                            success: function (r) {
                                $('#fonos').html(r);
                            }
                        });
                        $('#estatusTel option:selected').prop('selected', false).find('option:first').prop('selected', true);
                        $('#ultimoEstatusFono').val("");
                    }
                });
            } else {
                bootbox.alert({
                    message: "Seleccione un número y estado para continuar!",
                    size: 'medium'

                });
            }
        }
    });
});

$('#cbox2').change(function () {
    if (!$(this).is(":checked")) {
        $('#otro').attr('disabled', true);
        $('#otro').attr('required', false);
    } else {
        $('#otro').attr('disabled', false);
        $('#otro').attr('required', true);
    }
});

/* funciones para validaciones de datos */
function onlyLetters(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46-48-49-50-51-52-53-54-55-56-57";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function onlyNumbers(e) {
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48 && key <= 57) || (key == 8));
}

function validatePhoneCelular(phone) {
    var re = /^(\0)?[ -]*(09)[ -]*([0-9][ -]*){8}$/;
    return re.test(phone);
}

function validatePhoneConvencional(phone) {
    var re = /^(\0)?[ -]*(0[2-7])[ -]*([0-9][ -]*){7}$/;
    return re.test(phone)
}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function obtenerFecha() {
    var today = new Date();
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

function obtenerFecha1(txt) {
    return txt.replace(/^(\d{4})-(\d{2})-(\d{2})$/g, '$3-$2-$1');
}

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

function obtenerHora() {
    var d = new Date();
    var h = addZero(d.getHours());
    var m = addZero(d.getMinutes());
    var s = addZero(d.getSeconds());
    var horaString = h + ":" + m + ":" + s;
    horaString = horaString.toString();
    return horaString
}

function validarcedula(cedula) {
    var i;
    var acumulado;
    var instancia;
    acumulado = 0;
    for (i = 1; i <= 9; i++) {
        if (i % 2 != 0) {
            instancia = cedula.substring(i - 1, i) * 2;
            if (instancia > 9)
                instancia -= 9;
        } else
            instancia = cedula.substring(i - 1, i);
        acumulado += parseInt(instancia);
    }
    while (acumulado > 0)
        acumulado -= 10;
    if (cedula.substring(9, 10) != (acumulado * -1)) {
        return false
    } else {
        return true
    }
    console.log("Cedula: " + cedula)
    console.log("Digito Verificador: " + acumulado * -1)
    console.log("--------------------------------------------------")
}

function calculateAge(birthday) {
    var birthday_arr = birthday.split("/");
    var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
    var ageDifMs = Date.now() - birthday_date.getTime();
    var ageDate = new Date(ageDifMs);
    return Math.abs(ageDate.getUTCFullYear() - 1970);
}

init(); /* ejecuta la función inicial */
