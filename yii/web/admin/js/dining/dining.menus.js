Dropzone.options.mydropzoneEn = {
  paramName: "pdfFile",
  url: $("meta[name=path]").attr("content") + '/dining/dinings/menus',
  uploadMultiple: false,
  maxFiles: 1,
  params: {
    _csrf: $("meta[name=csrf-token]").attr("content"),
    id: $("meta[name=dining]").attr("content"),
    lang: 'en',
  },
  maxfilesreached: function() {},
  acceptedFiles: 'application/pdf',
  accept: function(file, done) {
    done();
  },
  success: function(file, done) {
    this.removeAllFiles();
  }
};


Dropzone.options.mydropzoneGr = {
  paramName: "pdfFile",
  url: $("meta[name=path]").attr("content") + '/dining/dinings/menus',
  uploadMultiple: false,
  maxFiles: 1,
  params: {
    _csrf: $("meta[name=csrf-token]").attr("content"),
    id: $("meta[name=dining]").attr("content"),
    lang: 'gr',
  },
  maxfilesreached: function() {},
  acceptedFiles: 'application/pdf',
  accept: function(file, done) {
    done();
  },
  success: function(file, done) {
    this.removeAllFiles();
  }
};
