var template = $("#template").html();
var templateComment = $("#template-comment").html();
var title = new RegExp('{{title}}', 'g');
var mainRow = $("#mainRow");
var commentRow = $("#comment-row");

var adapterSettings = {
    baseUrl: 'http://localhost:8000',
}

var adapter = {
    post: function (route, data, successFn, ctx) {
        $.ajax({
            method: "POST",
            url: adapterSettings.baseUrl + route,
            data: JSON.stringify(data),
            success: function (data) {
                successFn(data, ctx);
            },
            dataType:'json'
        });
    },
    get: function (route, successFn, ctx) {
        $.ajax({
            method: "GET",
            url: adapterSettings.baseUrl + route,
            success: function (data) {
                successFn(data, ctx);
            },
            dataType:'json'
        });
    }
};

var validator = {
    empty: function (val) {
        return val.length === 0;
    },

    name: function (val) {
        return val.length < 2 || val.length >= 40;
    },

    email: function (val) {
        return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(val);
    }

};


$(".back-to-top").click(function () {
    $("html, body").animate({scrollTop: 0}, 1500);
});


function displayProduct(filter) {
    filter.forEach(function (e) {
        var text = template.replace("{{img_src}}", e.img)
            .replace(title, e.title)
            .replace("{{description}}", e.description);
        mainRow.append(text);
    })
}
function displayComment(filter) {
    filter.forEach(function (e) {
        var text = templateComment.replace("{{name}}", e.name)
            .replace("{{text}}", e.text);
        commentRow.append(text);
    })
}




