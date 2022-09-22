(function ($) {
    var sDays = "";
    var oDisplayWeather = {
        init: function () {
            this.cacheDom();
            this.bindEvents();
        },
        cacheDom: function () {
            this.oDropDownButton = $("#dayDropDown li");
            this.oSubmitButton = $("#submitLocation");
        },
        bindEvents: function () {
            this.oDropDownButton.on("click", oDisplayWeather.getSelectedDay);
            this.oSubmitButton.on("click", oDisplayWeather.getWeather);
        },
        getSelectedDay: function (event) {
            event.preventDefault();
            sDays = $(this).data("value");
            $(this).addClass("active");
            $(this).siblings().removeClass("active");
        },
        getWeather: function () {
            if ($("#location").val() === "") {
                alert("Location should not be empty");
                return;
            }
            if (sDays === "") {
                alert("Please pick how many days should be displayed");
                return;
            }
            $.ajax({
                method: "POST",
                url: "/getforecast",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    location: $("#location").val(),
                    day: sDays,
                },
                success: function (aResponse) {
                    if (aResponse["error_code"] === "404") {
                        alert(
                            "Api key has expired, please insert it again on Register Api Key"
                        );
                        return;
                    } else if (aResponse["error_code"] !== "200") {
                        alert("An issue has occured! Please try again");
                        return;
                    }
                    if (aResponse["data"] === null) {
                        return;
                    }
                    $(".insertIframe").html("");
                    $.each(
                        aResponse["data"]["DailyForecasts"],
                        function (key, value) {
                            $(".insertIframe").append(
                                '<iframe src="' +
                                    value["Link"] +
                                    '" style="width: 350px; height: 300px; margin: 10px"> </iframe>'
                            );
                        }
                    );
                },
            });
        },
    };
    oDisplayWeather.init();
})(jQuery);
