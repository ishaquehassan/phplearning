$(document).ready(function () {
    updateMsg();
});
var count = 0;
function updateMsg() {
    var config = {
        url: "http://localhost:81/aurangzaib/assignments/sess6/data1.php",
        dataType: "json",
        error: function (error) {
            setTimeout(updateMsg(), 1000);
        },
        success: function (messages) {
            for (var i = 0; i < messages.length; i++) {
                var message = messages[i];
                if (message.id > count) {
                    var msgTemplate = '<div class="message"><p><strong>' + message.name + " At " + message.time + '</strong></p><p>' + message.message + '</p></div>';
                    $(".messages").append(msgTemplate);
                }
                if (count < message.id) {
                    count = message.id;
                }
            }
            setTimeout(updateMsg(), 1000);
        }

    };
    $.ajax(config);
}