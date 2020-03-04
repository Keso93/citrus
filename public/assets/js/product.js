$( document ).ready(function(){
    var sFunction = function (response) {
        displayProduct(response);
    };

    adapter.get("/json/show-products", sFunction);
});