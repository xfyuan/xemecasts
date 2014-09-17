$(function(){
  if ($('#editor').length) {
    var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
      mode: 'markdown',
      lineNumbers: true,
      theme: "default",
      extraKeys: {"Enter": "newlineAndIndentContinueMarkdownList"}
    });
  }

  Dropzone.options.xeDropzone = {
    maxFilesize: 200, // MB
    maxFiles: 1,
    acceptedFiles: 'image/*, video/mp4'
  };
});
