(function ($) {

Drupal.behaviors.noderecur = {};
Drupal.noderecur = Drupal.noderecur || {};

/**
 * Attach behavior to node recur form
 */
Drupal.behaviors.noderecur = {
  attach: function (context) {
    // Attach the date popup to the 'recur until' field
    $('#edit-until', context).datepicker({
        dateFormat: 'dd.mm.yy',
        changeMonth: true,
        changeYear: true,
      });
  }
};

})(jQuery);

