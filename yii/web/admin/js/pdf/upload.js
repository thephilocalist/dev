Dropzone.options.mydropzone = {
  paramName: "pdfFile",
  url: $("meta[name=path]").attr("content") + '/pdf/upload',
  maxFilesize: 10,
  parallelUploads: 1,
  autoProcessQueue: true,
  params: {
    _csrf: $("meta[name=csrf-token]").attr("content"),
  },
  maxfilesreached: function() {},
  acceptedFiles: 'application/pdf',
  accept: function(file, done) {
    done();
  },
  success: function(file, done) {
    var $container = $("#pdfs");
    $container.load("adminajfglsfgsdfg123134j/pdf #pdfs > *");
  }
};
