<html>
<head>
<title>WYSIWYG Editor</title>
<script src = "js.js"></script>
</head>

<body onLoad = "iframe()">

<h2 style = "font-family: arial;">WYSIWYG Editor</h2>

<form method = "post" action = "submit.php" id = "rtf">

<input type = "button" value = "B" onclick = "bold()">
<input type = "button" value = "I" onclick = "italic()">
<input type = "button" value = "U" onclick = "underline()">
<input type = "button" value = "Size" onclick = "fontsize()">
<input type = "button" value = "Color" onclick = "fontcolor()">
<input type = "button" value = "Highlight" onclick = "highlight()">
<input type = "button" value = "Link" onclick = "link()">
<input type = "button" value = "Unlink" onclick = "unlink()">
<br><br>
<textarea name = "textarea" id = "textarea" style = "display: none;"></textarea>
<iframe name = "editor" id = "editor" style = "width: 500; height: 400;"></iframe>

<br><br>
<input type = "button" onclick = "formsubmit()" value = "Post">
</form>

</body>

</html>