$( document ).ready(function(){
    var sFunctionComments = function(response){
        displayComment(response)
    };
    adapter.get("/json/show-approved-comments", sFunctionComments);
});

var data;
var successToast = Toastify({
    text: "Successfully sent comment!",
    duration: 3000
});


//Add comment
$("#comment").click(function () {
    data = {
        name: '',
        email: '',
        text: '',
        date: new Date().toJSON().slice(0, 10),
        approve: 0
    };
    console.log(validator.name($("#name").val()))

    if (validator.empty($("#name").val())){
        $('#name').attr('Placeholder', 'Required filed');
    } else if (validator.name($("#name").val())){
        $("#name").val('');
        $('#name').attr('Placeholder', 'Name must be between 2 and 40 characters');
    } else {
        data.name = $("#name").val();
    }

    if (validator.empty($("#email").val())){
        $('#email').attr('Placeholder', 'Required filed');
    } else if (!validator.email($("#email").val())){
        $("#email").val('');
        $('#email').attr('Placeholder', 'Invalid email');
    } else {
        data.email = $("#email").val();
    }

    if (validator.empty($("#text").val())){
        $('#text').attr('Placeholder', 'Required filed');
    } else {
        data.text = $("#text").val();
    }

    var sFunction = function (response) {
        if (response.status) {
            $("#email").val('');
            $("#name").val('');
            $("#text").val('');
            successToast.showToast();
        } else {
            alert(response.message)
        }
    };

    if (!validator.empty(data.name) && !validator.empty(data.email) && !validator.empty(data.text)){
        adapter.post("/json/add-comment", data, sFunction);
    }
});