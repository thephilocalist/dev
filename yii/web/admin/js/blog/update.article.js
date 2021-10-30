(function($) {
  $('#text').redactor({
    plugins: ['video', 'alignment', 'fontsize', 'fontcolor', 'table', 'fullscreen','undo','redo'],
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

function findImage() {
  var id = $(".company-logo").data('id');
  $.ajax({
    url: 'uploads/blog/articles/' + $("meta[name=article]").attr("content") + '.200.200.jpg',
    type: 'HEAD',
    cache: false,
    error: function() {
      $('#article-photo').hide();
    },
    success: function() {
      $('#article-photo').attr('src', 'uploads/blog/articles/' + $("meta[name=article]").attr("content") + '.200.200.jpg?t=' + (new Date()).toString());
      $('#article-photo').show();
    }
  });
}
findImage();

Dropzone.options.mydropzone = {
  paramName: "imageFile",
  url: $("meta[name=path]").attr("content") + '/blog/article-image',
  maxFilesize: .5, // MB
  uploadMultiple: false,
  maxFiles: 1,
  params: {
    _csrf: $("meta[name=csrf-token]").attr("content"),
    id: $("meta[name=article]").attr("content")
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
