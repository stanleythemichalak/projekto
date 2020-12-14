'use strict'

app.provider('translationHelper', function () {
    this.translations = {};

    this.$get = function () {
        return {
            translations: this.translations
        }
    };
});