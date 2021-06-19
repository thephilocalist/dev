$('.texts-forms').each(function() {
  var lang = $(this).data('lang');
  (function($) {
    $('#text_' + lang).redactor({
      plugins: ['video', 'alignment', 'fontsize', 'fontcolor', 'table', 'fullscreen', 'bookingButton', 'hotelBar', 'sliderButton'],
      imageUpload: $("meta[name=path]").attr("content") + '/blog/editor-insert-image',
      imageUploadParam: 'imageFile',
      imageUploadFields: {
        _csrf: $("meta[name=csrf-token]").attr("content"),
      },
      imageResizable: true,
      minHeight: 300,
      imagePosition: true,
    });
  })(jQuery);
});

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
