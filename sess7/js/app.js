/**
 * Created by Ishaq Hassan on 10/19/2016.
 */
function method1(param) {
    //alert(param);
    param("Hello world form variable method with parameter from another method");
}


var myFunctionVariable = function (msg) {
  alert(msg);
};

//myFunctionVariable("Hello world form variable method with parameter");

//method1(myFunctionVariable);


////Ajax Duplicate demo function

function ajax(config) {
    var success = config.success;
    success("demo response from server");
    config.error("demo error from server");
}


var cfg = {
    success: function (response) {
        alert(response);
    },
    error:function (error) {
        console.log(error);
    }
};

ajax(cfg);