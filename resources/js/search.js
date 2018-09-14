(function (window, document) {

    let fields = Array.prototype.slice.call(
        document.querySelectorAll('select[data-provides="anomaly.field_type.icon"][data-search]')
    );

    fields.forEach(function (field) {

        new Choices(field, {
            shouldSort: false,
            searchResultLimit: 20,
            callbackOnCreateTemplates: function (template) {

                let  config = this.config;

                return {
                    item: function(data) {

                        return template('\
                <div\
                  class="'+ String(config.classNames.item) + ' ' + String(data.highlighted ? config.classNames.highlightedState : config.classNames.itemSelectable) + '"\
                  data-item\
                  data-id="'+ String(data.id) + '"\
                  data-value="'+ String(data.value) + '"\
                  '+ String(data.active ? 'aria-selected="true"' : '') + '\
                  '+ String(data.disabled ? 'aria-disabled="true"' : '') + '\
                  >\
                  <i class="' + data.value + '"></i> ' + String(data.label) + '\
                  <button type="button" class="choices__button" data-button="">Remove item</button>\
                </div>\
              ');
                    },
                    choice: function(data) {

                        return template('\
                <div\
                  class="'+ String(config.classNames.item) + ' ' + String(config.classNames.itemChoice) + ' ' + String(data.disabled ? config.classNames.itemDisabled : config.classNames.itemSelectable) + '"\
                  data-select-text="'+ String(config.itemSelectText) + '"\
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
