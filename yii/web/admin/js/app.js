function saveForm(scenario) {
  var $yiiform = $('#ajax-submit-form');
  var $redirect = $('#ajax-submit-form').data('redirect');
  $yiiform.closest("div.box").append("<div class=\"overlay\"><i class=\"fa fa-refresh fa-spin\"></i></div>");
  $.ajax({
      type: $yiiform.attr('method'),
      url: $yiiform.attr('action'),
      data: $yiiform.serializeArray(),
    })
    .done(function(data) {
      $('.errors').hide();
      $('.success-msg').hide();
      if (data.success) {
        $('.overlay').remove();
        if ($redirect) {
          window.location.href = $("base").attr("href") + data.redirect;
        } else {
          $('.success-msg').show();
        }
        setTimeout(function() {
          $('.success-msg').hide();
        }, 3000);
      } else if (data.validation) {
        $('.overlay').remove();
        $yiiform.yiiActiveForm('updateMessages', data.validation, true);
      } else {}
    })
    .fail(function() {})
  return false;
}

$('#ajax-submit-form').on('beforeSubmit', function() {
  return false;
})
$('#ajax-submit-form').on('submit', function() {
  return false;
})

$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();
});

$("#ordered tbody").sortable({
  opacity: 0.7,
  cursor: 'move',
  scroll: false,
  update: function() {
    var order = $(this).sortable("serialize");
    $.post(window.location, order, function(theResponse) {});
  }
});

$("#orderedlist").sortable({
  opacity: 0.7,
  cursor: 'move',
  scroll: false,
  update: function() {
    var order = $(this).sortable("serialize");
    $.post(window.location, order, function(theResponse) {});
  }
});
