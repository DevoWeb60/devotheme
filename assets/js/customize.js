(function ($) {
    const toUpdate = [
        {
            id: "header_background_color",
            className: "custom_header_bg",
            attributeName: "background-color",
        },
        {
            id: "header_text_color",
            className: "custom_header_text",
            attributeName: "color",
        },
        {
            id: "footer_background_color",
            className: "custom_footer_bg",
            attributeName: "background-color",
        },
    ];

    toUpdate.forEach((item) => {
        updateValue(item.id, item.className, item.attributeName);
    });

    function updateValue(id, className, attributeName) {
        wp.customize("devotheme" + id, function (value) {
            value.bind(function (newValue) {
                $(className).css(attributeName, newValue);
            });
        });
    }
})(jQuery);
