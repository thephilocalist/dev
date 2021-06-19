switch (jQuery("input[type='radio']:checked").val()) {
  case '1':
    jQuery('.email-display').show();
    jQuery('.voucher-display').hide();
    jQuery('.special-url-display').hide();
    break;
  case '2':
    jQuery('.email-display').hide();
    jQuery('.voucher-display').show();
    jQuery('.special-url-display').hide();
    break;
  case '3':
    jQuery('.email-display').hide();
    jQuery('.voucher-display').hide();
    jQuery('.special-url-display').show();
    break;
  default:
}
jQuery("input[type='radio']").click(function() {
  $('.errors').hide();
  switch (jQuery(this).val()) {
    case '1':
      jQuery('.email-display').show();
      jQuery('.voucher-display').hide();
      jQuery('.special-url-display').hide();
      break;
    case '2':
      jQuery('.email-display').hide();
      jQuery('.voucher-display').show();
      jQuery('.special-url-display').hide();
      break;
    case '3':
      jQuery('.email-display').hide();
      jQuery('.voucher-display').hide();
      jQuery('.special-url-display').show();
      break;
    default:
  }
});
