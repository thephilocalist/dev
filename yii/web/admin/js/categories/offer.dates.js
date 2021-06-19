jQuery('#publish_from').on('change', function() {
  var newDate = jQuery(this).datepicker('getDate');
  newDate.setDate(newDate.getDate() + 1);
  jQuery("#publish_to").datepicker('setDate', newDate);
  jQuery("#publish_to").datepicker("option", "minDate", newDate);
});

jQuery('#available_from').on('change', function() {
  var newDate = jQuery(this).datepicker('getDate');
  newDate.setDate(newDate.getDate() + 1);
  jQuery("#available_to").datepicker('setDate', newDate);
  jQuery("#available_to").datepicker("option", "minDate", newDate);
});

jQuery('#permanent').on('change', function() {
  if (jQuery(this).is(":checked")) {
    jQuery('.permanent-display').hide();
  } else {
    jQuery('.permanent-display').show();
  }
});

if (jQuery('#permanent').is(":checked")) {
  jQuery('.permanent-display').hide();
} else {
  jQuery('.permanent-display').show();
}
