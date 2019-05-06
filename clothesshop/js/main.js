$(function() {
    $(".nav-toggle").on("click", function(e) {
        e.preventDefault();

        if($("#navigation").hasClass("active")) {
            $("#navigation").removeClass("active");
        } else {
            $("#navigation").addClass("active");
        }
    });
    $("#background-images .image").first().addClass("active");

    setInterval(function() {
        if($("#background-images .image.active").next(".image").length) {
            var $prevActive = $("#background-images .image.active");

            $prevActive.removeClass("active");
            $prevActive.next(".image").addClass("active");
        } else {
            $("#background-images .image").first().addClass("active");
        }
    }, 6000);
});
