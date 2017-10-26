$("#myBtn").click(function () {
    $("#myModal").modal();
});
$("#myBtn1").click(function () {
    $("#myModal").modal();
});
$("#myBtn2").click(function () {
    $("#myModal").modal();
});

function date() {

    $(".byoccurence").css({"display": "none"});
    $(".wrapper").css({"display": "block"});
    $(".wrapper").slideDown();



}
function date2() {

    $(".wrapper").css({"display": "none"});
    $(".byoccurence").css({"display": "block"});
    $(".byoccurence").slideDown();


}
