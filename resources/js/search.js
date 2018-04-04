(function (window, document) {

    let fields = Array.from(
        document.querySelectorAll('select[data-provides="anomaly.field_type.icon"][data-search]')
    );

    fields.forEach(function (field) {

        new Choices(field);

        field.addEventListener('choice', function (event) {
            alert(event.detail.choice.value);
        });
    });
})(window, document);
