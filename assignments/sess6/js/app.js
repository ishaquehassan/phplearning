/**
 * Created by Islamic on 10/17/2016.
 */
$(document).ready(function () {
    updateData();
});

var count = 0;

function updateData() {
    var config = {
        url: "http://localhost/aurangzaib/sess6/data.php",
        dataType: "json",
        error: function (error) {
            setTimeout(updateData(), 1000);
        },
        success: function (messages) {
            for (var i = 0; i < messages.length; i++) {
                var message = messages[i];
                if (message.id > count) {
                    var msgTemplate = '<div class="message"><p><strong class="header">' + message.name + " " + message.time + '</strong></p><p class="msg-text">' + message.message + '</p></div>';
                    $(".messages").append(msgTemplate);
                }
                if (count < message.id) {
                    count = message.id;
                }
            }
            setTimeout(updateData(), 1000);
        }
    };
    //config.url = "";

    $.ajax(config);
}

    

