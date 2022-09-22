(function ($) {
    var oRegisterApiKey = {
        init: function () {
            this.cacheDom();
            this.bindEvents();
        },
        cacheDom: function () {
            this.oSaveButton = $("#validateApi");
            this.oApiKeyInput = $("#api_key");
        },
        bindEvents: function () {
            this.oSaveButton.on("click", oRegisterApiKey.validateApiKey);
        },
        validateApiKey: function () {
            if ($("#api_key").val() === "") {
                alert("Api key should not be empty!");
                return;
            }
            $.ajax({
                method: "POST",
                url: "/validateapi",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    api_key: btoa(
                        window.unescape(encodeURIComponent($("#api_key").val()))
                    ),
                },
                success: function (aResponse) {
                    console.log(aResponse === "200");
                    if (aResponse !== "200") {
                        alert("Api key is not valid");
                        return;
                    }
                    alert("Api key is valid");
                    location.replace("/displayweather");
                },
            });
        },
    };
    oRegisterApiKey.init();
})(jQuery);
