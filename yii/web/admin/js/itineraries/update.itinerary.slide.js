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

function findImage() {
  var id = $(".company-logo").data('id');
  $.ajax({
    url: 'uploads/itinerary-slides/' + $("meta[name=slide]").attr("content") + '.200.200.jpg',
    type: 'HEAD',
    cache: false,
    error: function() {
      $('#article-photo').hide();
    },
    success: function() {
      $('#article-photo').attr('src', 'uploads/itinerary-slides/' + $("meta[name=slide]").attr("content") + '.200.200.jpg?t=' + (new Date()).toString());
      $('#article-photo').show();
    }
  });
}
findImage();

Dropzone.options.mydropzone = {
  paramName: "imageFile",
  url: $("meta[name=path]").attr("content") + '/itinerary-slides/image',
  maxFilesize: .5, // MB
  uploadMultiple: false,
  maxFiles: 1,
  params: {
    _csrf: $("meta[name=csrf-token]").attr("content"),
    id: $("meta[name=slide]").attr("content")
  },
  maxfilesreached: function() {},
  acceptedFiles: 'image/jpeg,image/jpg,image/png',
  accept: function(file, done) {
    done();
  },
  success: function(file, done) {
    this.removeAllFiles();
    findImage();
  }
};
