function findImage() {
  var id = $(".company-logo").data('id');
  $.ajax({
    url: 'uploads/program-category/' + $("meta[name=category]").attr("content") + '.200.200.jpg',
    type: 'HEAD',
    cache: false,
    error: function() {
      $('#article-photo').hide();
    },
    success: function() {
      $('#article-photo').attr('src', 'uploads/program-category/' + $("meta[name=category]").attr("content") + '.200.200.jpg?t=' + (new Date()).toString());
      $('#article-photo').show();
    }
  });
}
findImage();

Dropzone.options.mydropzone = {
  paramName: "imageFile",
  url: $("meta[name=path]").attr("content") + '/program-categories/image',
  maxFilesize: .5, // MB
  uploadMultiple: false,
  maxFiles: 1,
  params: {
    _csrf: $("meta[name=csrf-token]").attr("content"),
    id: $("meta[name=category]").attr("content")
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
