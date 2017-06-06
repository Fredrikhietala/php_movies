/**
 * Created by Fredrik Hietala on 2017-06-05.
 */

$("body").on("load", function() {
    console.log("Body loaded");
});

$(document).ready(function () {
    console.log("Document ready");
    var fields = $(this).find("input:text");
    var checkField = function (field) {
        var fieldValue = $.trim($(field).val());
        return (fieldValue !== "");
    };

    fields.on("keyup", function (e) {
        if (checkField(this)) {
            $(this).removeClass("error");
            $(this).addClass("done");
        }
    });

    fields.on("focus", function(e) {
        if (checkField(this)) {
            $(this).addClass("done");
        }
    });

    fields.on("blur", function(e) {
        if (!checkField(this)) {
            $(this).addClass("error");
        }
    });

    $(".create_movie").on("submit", function(e) {
        var valid = true;
        e.preventDefault();

        $("#error_message").hide();
        fields.removeClass("error");


        if (!valid) {
            e.preventDefault();
            $("#error_message").show();
        }
        else {
            $.post("/index.php?page=create",
                $(this).serialize(),
                function (response) {

                }
            );
        }

    });
});