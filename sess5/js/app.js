/**
 * Created by Islamic on 10/17/2016.
 */
$(document).ready(function () {
    updateData();
});


function updateData() {
    var config = {
        url : "http://localhost:81/aurangzaib/sess5/data.php",
        dataType : "json",
        error: function (error) {
            setTimeout(updateData(),1000);
        },
        success : function (response) {
            if(response.age > 20){
                $(".age").text("Your are not a child");
            }else{
                $(".age").text("Your are a child");
            }
            $("body").css("background",response.bg);
            setTimeout(updateData(),1000);
        }
    };
    //config.url = "";

    $.ajax(config);
}

    

