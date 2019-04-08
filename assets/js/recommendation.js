$(document).ready(function () {
    var count = 1;
    var search_results = [{
            place: "Seoul Tower, Korea",
            desc: "One of the nicest views in Korea",
            map: "Korea"
        },
        {
            place: "Jeju Island, Korea",
            desc: "The best island there is in the world",
            map: "Korea"
        }
    ];
    var itemId;

    $("#search_button").click(function () {
        var value = $("#place_search:text").val();
        console.log(value);
        for (var count = 0; count < search_results.length; count++) {
            $("#item-cl").append('<div class="col-md-4">' +
                '<div class="destination">' +
                '<div class="text p-3">' +
                '<div class="d-flex">' +
                '<div class="one">' +
                '<h3>' + search_results[count].place + '</h3>' +
                '</div>' +
                '</div>' +
                '<p>' + search_results[count].desc + '</p>' +
                '<label for="check' + count + '">' + value + '</label>' +
                '<hr>' +
                '<p class="bottom-area d-flex"><span><i class="icon-map-o"</i>' + search_results[count].map + '</span>' +
                '<span class="ml-auto"><a href="#">Add</a></span>' +
                '</p>' +
                '</div>' +
                '</div>' +
                '</div>');
        }
    });

    $(".modi-edit .modi-btn-save").click(function () {
        var value = $(".modi-input-field:text").val();
        $("label[for='" + itemId + "']").text(value);
        // $(".modi-edit label[for='" + itemId + "']").prepend("<div><i class='fa fa-check'></i></div>");
        $(".modi-edit").fadeOut(300);
        $(".modi-edit .modi-input-field").val("");
        console.log(value);
    });

});