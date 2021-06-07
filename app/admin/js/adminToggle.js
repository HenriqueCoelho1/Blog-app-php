$(document).ready(function () {
    $("#toggle-button").click(function () {

        $(".text").toggle("hide");
        $("aside").toggleClass("sidebar");
    })
})