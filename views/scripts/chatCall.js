var rol, INDEX = 0;
function init() { /* función inicial */
    $.ajax({
        type: "GET",
        url: '../ajax/chatC.php?action=rol',
        success: function (r) {
            rol = r;
            if (r === '1' || r === '2') {
                $("#footChat").show();
            } else {
                $("#footChat").hide();
            }
        }
    });

    $.ajax({
        type: "post",
        url: '../ajax/chatC.php?action=mensajes',
        success: function (r) {
            $(".chat-logs").append(r);
        }
    });

    $("#notificacionMensaje").hide();
}

function actualizar() {
    if (rol > 2) {
        $.ajax({
            type: "post",
            url: '../ajax/chatC.php?action=tiempoEspera',
            success: function (data) {
                if (data >= 1 && data <= 3) {
                    $(".chat-logs").html("");
                    $("#notificacionMensaje").show();
                    $.ajax({
                        type: "post",
                        url: '../ajax/chatC.php?action=mensajes',
                        success: function (r) {
                            $(".chat-logs").append(r);
                        }
                    });
                } else {
                    $("#notificacionMensaje").hide();
                }
            }
        });
    }
}

$("#chat-submit").click(function (e) {
    e.preventDefault();
    var msg = $("#chat-input").val();
    if (msg.trim() == '') {
        return false;
    }

    $.ajax({
        type: "POST",
        url: '../ajax/chatC.php?action=save',
        data: {msg: msg},
        success: function (data) {
            if (data == 'Exitoso') {
                generate_message(msg, 'self');
            } else {
                generate_message("error", 'self');
            }

        }
    });
});

window.addEventListener("load", function () {
    setInterval(actualizar, 60000);
});

function generate_message(msg, type) {
    INDEX++;
    var str = "";
    str += "<div class=\"chat-msg " + type + "\">";
    str += "<div id='div-msg-" + INDEX + "' class=\"cm-msg-text\">";
    str += msg;
    str += "<\/div>";

    $(".chat-logs").append(str);
    $("#div-msg-" + INDEX).hide().fadeIn(300);
    if (type == 'self') {
        $("#chat-input").val('');
    }
    $(".chat-logs").stop().animate({scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
}

$(document).delegate(".chat-btn", "click", function () {
    var value = $(this).attr("chat-value");
    var name = $(this).html();
    $("#chat-input").attr("disabled", false);
    generate_message(name, 'self');
});

$("#chat-circle").click(function () {
    $("#chat-circle").toggle('scale');
    $(".chat-box").toggle('scale');
    $("#notificacionMensaje").hide();
});

$(".chat-box-toggle").click(function () {
    $("#chat-circle").toggle('scale');
    $(".chat-box").toggle('scale');

});


init(); /* ejecuta la función inicial */