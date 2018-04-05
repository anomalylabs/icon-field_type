(function (window, document) {

    let fields = Array.from(
        document.querySelectorAll('select[data-provides="anomaly.field_type.icon"][data-search]')
    );

    fields.forEach(function (field) {

        new Choices(field, {
            searchResultLimit: 10,
            callbackOnCreateTemplates: function (template) {
                return {
                    item: function(classNames, data) {
                        return template('\
                <div\
                  class="'+ String(classNames.item) + ' ' + String(data.highlighted ? classNames.highlightedState : classNames.itemSelectable) + '"\
                  data-item\
                  data-id="'+ String(data.id) + '"\
                  data-value="'+ String(data.value) + '"\
                  '+ String(data.active ? 'aria-selected="true"' : '') + '\
                  '+ String(data.disabled ? 'aria-disabled="true"' : '') + '\
                  >\
                  <i class="' + data.value + '"></i> ' + String(data.label) + '\
                </div>\
              ');
                    },
                    choice: function(classNames, data) {
                        return template('\
                <div\
                  class="'+ String(classNames.item) + ' ' + String(classNames.itemChoice) + ' ' + String(data.disabled ? classNames.itemDisabled : classNames.itemSelectable) + '"\
                  data-select-text="'+ String(this.config.itemSelectText) + '"\
                  data-choice \
                  '+ String(data.disabled ? 'data-choice-disabled aria-disabled="true"' : 'data-choice-selectable') + '\
                  data-id="'+ String(data.id) + '"\
                  data-value="'+ String(data.value) + '"\
                  '+ String(data.groupId > 0 ? 'role="treeitem"' : 'role="option"') + '\
                  >\
                  <i class="' + data.value + '"></i> ' + String(data.label) + '\
                </div>\
              ');
                    },
                };
            }
        });
    });
})(window, document);
