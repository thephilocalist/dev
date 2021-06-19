$('.texts-forms').on('beforeSubmit', function() {
  return false;
})
$('.texts-forms').on('submit', function() {
  return false;
})

function saveTextForm(lang) {
  var $yiiform = $('#text-form-' + lang);
  var $errors = $('#text-form-' + lang + ' .errors');
  var $success = $('#text-form-' + lang + ' .success-msg');
  $.ajax({
      type: $yiiform.attr('method'),
      url: $yiiform.attr('action'),
      data: $yiiform.serializeArray(),
    })
    .done(function(data) {
      $errors.hide();
      $success.hide();
      if (data.success) {
        $success.show();
        setTimeout(function() {
          $success.hide();
        }, 3000);
      } else if (data.validation) {
        $yiiform.yiiActiveForm('updateMessages', data.validation, true);
      } else {}
    })
    .fail(function() {})
  return false;
}
