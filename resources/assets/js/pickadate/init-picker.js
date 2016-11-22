/**
 * Created by kutas on 20.11.16.
 */
(function ($) {
    'use strict';
    var shiftDateField = $('#shift-date');
    if (shiftDateField.length){
        shiftDateField.pickadate({
            'format': 'yyyy-m-d'
        });
    }

})(jQuery);