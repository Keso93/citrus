$( document ).ready(function(){
    adapter.get("/json/show-unapproved-comments", sFunction);
});


//Login
// $( "#loginAdmin" ).click(function(event) {
//     event.preventDefault();
//     var data = {
//         name: '',
//         password: ''
//     };
//     if (validator.empty($("#name").val())){
//         $('#name').attr('Placeholder', 'Required filed');
//     } else {
//         data.name = $("#name").val();
//     }
//     if (validator.empty($("#password").val())){
//         $('#password').attr('Placeholder', 'Required filed');
//     } else {
//         data.password = $("#password").val();
//     }
//
//     var loginSuccessFunction = function(response){
//         if (response.status) {
//             // window.location.href = 'dashboard';
//         } else {
//             alert(response.message)
//         }
//     };
//     if (!validator.empty(data.name) && !validator.empty(data.password)){
//         adapter.post('/admin/login', data, loginSuccessFunction);
//     }
// });



//Append comments
var sFunction = function(response){
    if(response) {
        response.forEach(function (item) {
            $('tbody').append('<tr class="comment-row row_' + item.id + '" data-comment-id="' + item.id + '"><td>' + item.name + '</td><td>' +item.text + '</td><td><input data-id="' + item.id + '" type="checkbox"></td></tr>')
        });
    }
};



//Approve comments
var sApprove = function(response){
    if (response){
        $("tbody").html('');
        adapter.get("/json/show-unapproved-comments", sFunction);
    }
};
$('#approve').click(function () {
    var data = [];
    $('input').each(function () {
        var id = $(this).data('id');
        var check = (this);

        if (check.checked){
            data.push({
                id: parseInt(id),
                approve: 1
            });

        }
    });
    adapter.post("/json/approve-comment", data, sApprove);
});



//Disapprove comments
var sDisapprove = function(response){
    if (response){
        $("tbody").html('');
        adapter.get("/json/show-approved-comments", sFunction);
    }
};
$('#disapprove').click(function () {
    var data = [];
    $('input').each(function () {
        var id = $(this).data('id');
        var check = (this);

        if (check.checked){
            data.push({
                id: parseInt(id),
                disapprove: 0
            });
        }
    });
    adapter.post("/json/disapprove-comment", data, sDisapprove);
});


//Show approved comments
$('#approved').click(function () {
    $(".approve").attr('hidden', true);
    $("#approved-body").html('');
    $(".disapprove").removeAttr('hidden');
    adapter.get("/json/show-approved-comments", sFunction);
});



//Show unapproved comments
$("#unapproved").click(function () {
    $(".disapprove").attr('hidden', true);
    $("#unapproved-body").html('');
    $(".approve").removeAttr('hidden');
    adapter.get("/json/show-unapproved-comments", sFunction);
});


//Logout
$("#logout").click(function (){
    var lFunction = function(response){
        if(response.status){
            window.location.href = "login";
        } else {
            alert('GRESKA');
        }
    };
    adapter.get('/admin/logout', lFunction)
});
