function openWin() {
    myWindow = window.open("", "saveImage", "width=350, height=150");
    myWindow.document.write(
		"<form action=\"saveimage.php\" enctype=\"multipart/form-data\" method=\"post\"><table style=\"border-collapse: collapse; font: 12px Tahoma;\" border=\"1\" cellspacing=\"5\" cellpadding=\"5\"><tbody><tr><td><input name=\"uploadedimage\" type=\"file\"></td></tr><tr><td><input name=\"Upload Now\" type=\"submit\" onClick=\"return confirm('Upload New Profile Image?')\" value=\"Upload Image\"></td></tr></tbody></table></form>");
}