$(document).ready(function () {

     /* method 1:

     $.ajax({
        url : "http://localhost/myclasses/sess5/data.php",
        success : function (ttt) {
        $(".updateContentDiv").html(ttt);
    }

    });
*/

    /*method 2


var config = {
    url:"http://localhost/myclasses/sess5/data.php",
    success:function (ppp) {
        $(".updateContentDiv").html(ppp);
    }
}
    $.ajax(config)

    */
/* method 3

 */
    var config = {url:"http://localhost/myclasses/sess5/data.php"};
    config.success = function (ooo) {
        $(".updateContentDiv").html(ooo);
    };

    $.ajax(config);

    
    

});
