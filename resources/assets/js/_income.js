jQuery(document).ready(function ($) {
   'use strict';
   var form = $('.income-create-form'),
       type = form.find('#income_type_slug'),
       songGroups = form.find('.song-groups'),
       salaryType = form.find('.salary-type'),
       rateType = form.find('.rate-type'),
       typeContainers = [salaryType, rateType, songGroups];

   songGroups.show();
   toggleRulesFields(type.val());

   function toggleRulesFields(slug){
        console.log(slug);

        $.each(typeContainers, function (i, type) {
            type.hide()
        });
        switch (slug){
            case 'song':
                songGroups.fadeToggle();
                break;
            case 'salary':
                salaryType.fadeToggle();
                break;
            case 'rate':
                rateType.fadeToggle();
                break;
            case 'bonus':
                break;
        }
   }

   type.change(function () {
      toggleRulesFields($(this).val());
   });
});