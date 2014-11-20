var replaceLineFeed = function(text) {
  text = text.replace(/>\r\n/g, ">");
  text = text.replace(/(>\n|>\r)/g, ">");
  text = text.replace(/\r\n/g, "<br />");
  text = text.replace(/(\n|\r)/g, "<br />");
  return text;
}

var converdJsonUseString = function(text) {
  text = text.replace(/\\/g, '\\\\');
  text = text.replace(/"/g, '\\\"');
  text = text.replace(/\//g, "\/");
  text = text.replace(/>\r\n/g, ">");
  text = text.replace(/(>\n|>\r)/g, ">");
  text = text.replace(/\r\n/g, "<br />");
  text = text.replace(/(\n|\r)/g, "<br />");
  return text;
}